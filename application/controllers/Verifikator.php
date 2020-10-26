<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Verifikator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('user_name')) {
            redirect('admin');
        }
    }


    public function vMusrenbang()
    {
        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('verifikator/vMusrenbang');
        $this->load->view('templates/footer');
    }

    public function musrenbangDiterima()
    {
        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('verifikator/musrenbangDiterima');
        $this->load->view('templates/footer');
    }

    public function musrenbangDitolak()
    {
        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('verifikator/musrenbangDitolak');
        $this->load->view('templates/footer');
    }
    public function keterangan()
    {
        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('verifikator/keterangan');
        $this->load->view('templates/footer');
    }
}
