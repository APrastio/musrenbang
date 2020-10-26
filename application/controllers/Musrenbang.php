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
        $this->form_validation->set_rules('kegiatan', 'kegiatan', 'required|trim');
        $this->form_validation->set_rules('sasaran', 'sasaran', 'required|trim');
        $this->form_validation->set_rules('volume', 'volume', 'required|trim');
        $this->form_validation->set_rules('lokasi', 'lokasi', 'required|trim');
        $this->form_validation->set_rules('biaya', 'biaya', 'required|trim');
        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('kecamatan/inputMusrenbang');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kegiatan' => htmlspecialchars($this->input->post('kegiatan', true)),
                'sasaran' => htmlspecialchars($this->input->post('sasaran', true)),
                'volume' => htmlspecialchars($this->input->post('volume', true)),
                'lokasi' => htmlspecialchars($this->input->post('lokasi', true)),
                'biaya' => htmlspecialchars($this->input->post('biaya', true)),
                'date' => time(),
                'diakomodir' => "Menunggu Konfirmasi",
                'alasan' => "",
                'user_id' => $_SESSION['user_id']
            ];
            $this->db->insert('musrenbang', $data);


            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Musrenbang baru telah dibuat harap tunggu konfirmasi
            </div>');
            redirect('kecamatan/musrenbang');
        }
    }
}
