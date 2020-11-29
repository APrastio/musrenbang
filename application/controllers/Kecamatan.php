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
        if ($_SESSION['role_id'] == 3) {
            $this->load->model('MusrenbangModel', 'musrenbang');
            $data['musrenbang'] = $this->musrenbang->getMusrenbanga();
        } else {
            $a = $_SESSION['user_id'];
            $data['musrenbang'] = $this->db->get('musrenbang')->result_array();
            $this->load->model('MusrenbangModel', 'musrenbang');
            $data['musrenbang'] = $this->musrenbang->getMusrenbang($a);
        }
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('kecamatan/musrenbang', $data);
        $this->load->view('templates/footer');
    }

    public function editMusrenbang($id)
    {
        $id = $id;
        $this->db->where('musrenbang_id', $id);
        $data['musrenbang'] = $this->db->get('musrenbang')->row_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('kecamatan/editMusrenbang', $data);
        $this->load->view('templates/footer');
    }

    public function detailMusrenbang($id)
    {
        $data['musrenbang'] = $this->db->select('musrenbang.*, user.Kecamatan')
            ->from('musrenbang')
            ->join('user', 'user.user_id = musrenbang.user_id')
            ->where('musrenbang_id', intval($id))
            ->get()->row_array();
        $this->db->where('musrenbang_id', $id);
        $data['pengesahan'] = $this->db->get('pengesahan')->row_array();
        $this->db->where('musrenbang_id', $id);
        $data['cek'] = $this->db->get('persetujuan')->row_array();
        $this->load->model('MusrenbangModel', 'musrenbang');
        $data['persetujuan'] = $this->musrenbang->getinstansi($id);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('kecamatan/detailMusrenbang', $data);
        $this->load->view('templates/footer');
    }

    public function printMusrenbang($id)
    {
        $data['musrenbang'] = $this->db->select('musrenbang.*, user.Kecamatan')
            ->from('musrenbang')
            ->join('user', 'user.user_id = musrenbang.user_id')
            ->where('musrenbang_id', intval($id))
            ->get()->row_array();

        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = 'ID' . $data['musrenbang']['musrenbang_id'] . '-' . $data['musrenbang']['Kecamatan'] . '.pdf';
        $this->pdf->load_view('kecamatan/printMusrenbang', $data);
    }
}
