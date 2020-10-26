<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kecamatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('user_name')) {
            redirect('admin');
        }
    }

    public function musrenbang()
    {
        $data['musrenbang'] = $this->db->get('musrenbang')->result_array();
        $this->load->model('MusrenbangModel', 'musrenbang');
        $data['musrenbang'] = $this->musrenbang->getMusrenbang();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('kecamatan/musrenbang', $data);
        $this->load->view('templates/footer');
    }


    public function inputMusrenbang()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('kecamatan/inputMusrenbang');
        $this->load->view('templates/footer');
    }
}
