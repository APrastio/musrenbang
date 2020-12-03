<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('user_name')) {
            redirect('auth');
        }
        is_logged_in();
    }

    public function index()
    {
        if ($_SESSION['role_id'] == 1) {
            $a = $_SESSION['user_id'];
            $this->load->model('MusrenbangModel', 'musrenbang');
            $data['musren'] = $this->musrenbang->getMusrenbang($a);
            $this->db->select('pengesahan`.`keputusan')->from('musrenbang')->join('pengesahan', 'musrenbang.musrenbang_id = pengesahan.musrenbang_id')->join('user', 'user.user_id=musrenbang.`user_id')->where('pengesahan.keputusan', 'Ditolak')->where('user.user_id', $a);
            $data['tolak'] = $this->db->get()->result_array();
            $this->db->select('pengesahan`.`keputusan')->from('musrenbang')->join('pengesahan', 'musrenbang.musrenbang_id = pengesahan.musrenbang_id')->join('user', 'user.user_id=musrenbang.`user_id')->where('pengesahan.keputusan', 'Disetujui')->where('user.user_id', $a);
            $data['setuju'] = $this->db->get()->result_array();
            $this->db->select('kecamatan')->where('role_id', 1);
            $data['kecamatan'] = $this->db->get('user')->result_array();
        } else {

            $this->load->model('MusrenbangModel', 'musrenbang');
            $data['musren'] = $this->musrenbang->getMusrenbanga();
            $data['tolak'] = $this->musrenbang->getMusrenbangDitolak();
            $data['setuju'] = $this->musrenbang->getMusrenbangDiterima();
            $this->db->select('kecamatan')->where('role_id', 1);
            $data['kecamatan'] = $this->db->get('user')->result_array();
        }
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function data_user()
    {
        $data['user'] = $this->db->get('user')->result_array();
        $this->load->model('AdminModel', 'user');
        $data['user'] = $this->user->getUser();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/data_user', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_user()
    {

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/tambah_user');
        $this->load->view('templates/footer');
    }

    public function hapus_user()
    {
        $id = $this->input->get('id');
        $this->db->where('user_id', $id);
        $this->db->delete('user');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat data berhasil dihapus</div>');
        $this->data_user();
    }

    public function edit_user()
    {
        $id = $this->input->get('id');
        $this->db->where('user_id', $id);
        $data['user'] = $this->db->get('user')->row_array();
        $data['posisi'] = [['role_id' => '3', 'posisi' => 'Administrator'], ['role_id' => '1', 'posisi' => 'Kecamatan'], ['role_id' => '2', 'posisi' => 'Verifikator'], ['role_id' => '4', 'posisi' => 'Instasi']];
        $data['instasi'] = $this->db->get('instasi')->result_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/edit_user', $data);
        $this->load->view('templates/footer');
    }
    public function ubah()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('user_name', 'User name', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[3]', ['min_length' => 'password to sort']);
        if ($this->form_validation->run() == false) {
            $id = $this->input->post('id');
            $this->db->where('user_id', $id);
            $data['user'] = $this->db->get('user')->row_array();

            $data['posisi'] = $this->db->get('posisi')->result_array();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admin/edit_user', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'user_id' => htmlspecialchars($this->input->post('id', true)),
                'name' => htmlspecialchars($this->input->post('name', true)),
                'user_name' => htmlspecialchars($this->input->post('user_name', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'kecamatan' => htmlspecialchars($this->input->post('kecamatan')),
                'role_id' => htmlspecialchars($this->input->post('role_id'))
            ];
            $this->db->where('user_id', $data['user_id']);
            $this->db->update('user', $data);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Selamat data berhasil diubah
            </div>');
            redirect('admin/data_user');
        }
    }
}
