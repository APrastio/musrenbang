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
    }

    public function index()
    {

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/index');
        $this->load->view('templates/footer');
    }

    public function data_user()
    {
        $data['user'] = $this->db->get('user')->result_array();
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
        $this->data_user();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat data berhasil dihapus</div>');
    }

    public function edit_user()
    {
        $id = $this->input->get('id');
        $this->db->where('user_id', $id);
        $data['user'] = $this->db->get('user')->row_array();

        $data['posisi'] = $this->db->get('posisi')->result_array();
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
