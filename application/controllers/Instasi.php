<?php

use phpDocumentor\Reflection\Types\This;

defined('BASEPATH') or exit('No direct script access allowed');

class Instasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $this->load->model('MusrenbangModel', 'musrenbang');
        $data['musrenbang'] = $this->musrenbang->getMusrenbangi();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('instasi/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['musrenbang'] = $this->db->select('musrenbang.*,user.kecamatan')
            ->from('musrenbang')
            ->join('user', 'user.user_id=musrenbang.user_id')
            ->where('musrenbang_id', intval($id))
            ->get()->row_array();
        $this->db->select('instasi_id')->from('user')->where('user_id', $_SESSION['user_id']);
        $data['instasi'] = $this->db->get()->row_array();
        $this->db->select('status')->from('persetujuan')->where('musrenbang_id', $id)->where(' instasi_id', $data['instasi']['instasi_id']);
        $data['status'] = $this->db->get()->row_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('instasi/instasidetail', $data);
        $this->load->view('templates/footer');
    }

    public function keterangan($id, $status, $musrenbang_id)
    {
        $data['instasi_id'] = $id;
        $data['status'] = $status;
        $data['musrenbang_id'] = $musrenbang_id;
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('instasi/instasiketerangan', $data);
        $this->load->view('templates/footer');
    }
    public function persetujuan()
    {
        $data = [
            'instasi_id' => htmlspecialchars($this->input->post('instasi_id', true)),
            'status' => htmlspecialchars($this->input->post('status', true)),
            'musrenbang_id' => htmlspecialchars($this->input->post('musren', true)),
            'keterangan' => htmlspecialchars($this->input->post('keterangan', true))
        ];
        $this->db->insert("persetujuan", $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Musrenbang berhasil diubah
            </div>');
        redirect('instasi');
    }

    public function tidakterkait($instasi_id, $musrenbang_id)
    {
        $data = [
            'instasi_id' => $instasi_id,
            'status' => "Tidak Terkait",
            'musrenbang_id' =>  $musrenbang_id,
            'keterangan' => "Instasi tidak terkait dengan musrenbang yanga ada"
        ];

        $this->db->insert("persetujuan", $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Musrenbang berhasil diubah
            </div>');
        redirect('instasi');
    }

    public function printMusrenbang($id)
    {
        $data['musrenbang'] = $this->db->select('musrenbang.*,user.kecamatan')
            ->from('musrenbang')
            ->join('user', 'user.user_id=musrenbang.user_id')
            ->where('musrenbang_id', intval($id))
            ->get()->row_array();
        $this->db->select('instasi_id')->from('user')->where('user_id', $_SESSION['user_id']);
        $data['instasi'] = $this->db->get()->row_array();
        $this->db->select('status')->from('persetujuan')->where('musrenbang_id', $id)->where(' instasi_id', $data['instasi']['instasi_id']);
        $data['status'] = $this->db->get()->row_array();

        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = 'ID-' . $data['musrenbang']['kecamatan'] . '-' . $data['musrenbang']['musrenbang_id'] . '.pdf';
        $this->pdf->load_view('instasi/printMusrenbangI', $data);
    }
}
