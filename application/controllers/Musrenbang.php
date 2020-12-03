<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Musrenbang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('user_name')) {
            redirect('admin');
        }
    }

    public function tambahMusrenbang()
    {
        $this->form_validation->set_rules(
            'sasaran',
            'sasaran',
            'required|trim',
            array('required' => 'Field sasaran tidak boleh kosong')
        );
        $this->form_validation->set_rules(
            'Ksasaran',
            'keterangan sasaran',
            'required|trim',
            array('required' => 'Field keterangan sasaran tidak boleh kosong')
        );
        $this->form_validation->set_rules(
            'volume',
            'volume',
            'required|trim',
            array('required' => 'Field volume tidak boleh kosong')
        );
        $this->form_validation->set_rules(
            'lokasi',
            'lokasi',
            'required|trim',
            array('required' => 'Field lokasi tidak boleh kosong')
        );
        $this->form_validation->set_rules(
            'biaya',
            'biaya',
            'required|trim',
            array('required' => 'Field biaya tidak boleh kosong')
        );
        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('kecamatan/inputMusrenbang');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'jenis_kegiatan' => htmlspecialchars($this->input->post('jenis', true)),
                'sasaran' => htmlspecialchars($this->input->post('sasaran', true)),
                'keterangan' => htmlspecialchars($this->input->post('Ksasaran', true)),
                'volume' => htmlspecialchars($this->input->post('volume', true)),
                'lokasi' => htmlspecialchars($this->input->post('lokasi', true)),
                'biaya' => htmlspecialchars($this->input->post('biaya', true)),
                'date' => time(),
                'user_id' => $_SESSION['user_id']
            ];

            $this->db->insert('musrenbang', $data);
            $this->db->select_max('musrenbang_id');
            $this->db->from('musrenbang');
            $b = $this->db->get()->row_array();
            $a = ['musrenbang_id' => $b['musrenbang_id'], 'keputusan' => 'Diproses'];
            $this->db->insert('pengesahan', $a);


            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Musrenbang baru telah dibuat harap tunggu konfirmasi
            </div>');
            redirect('kecamatan/musrenbang');
        }
    }

    public function ubahMusrenbang()
    {

        $data = [
            'musrenbang_id' => $this->input->post('id'),
            'jenis_kegiatan' => htmlspecialchars($this->input->post('jenis', true)),
            'sasaran' => htmlspecialchars($this->input->post('sasaran', true)),
            'keterangan' => htmlspecialchars($this->input->post('Ksasaran', true)),
            'volume' => htmlspecialchars($this->input->post('volume', true)),
            'lokasi' => htmlspecialchars($this->input->post('lokasi', true)),
            'biaya' => htmlspecialchars($this->input->post('biaya', true)),
            'date' => time(),
            'user_id' => $_SESSION['user_id']
        ];
        $this->db->where('musrenbang_id', $data['musrenbang_id']);
        $this->db->update('musrenbang', $data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Musrenbang berhasil diubah
            </div>');
        redirect('kecamatan/musrenbang');
    }
    public function hapus($id)
    {
        $this->db->where('musrenbang_id', $id);
        $this->db->delete('musrenbang');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat data berhasil dihapus</div>');
        redirect('kecamatan/musrenbang');
    }
}
