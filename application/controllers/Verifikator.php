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
        $data['musrenbang'] = $this->db->get('musrenbang')->result_array();
        $this->load->model('MusrenbangModel', 'musrenbang');
        $data['musrenbang'] = $this->musrenbang->getMusrenbangMenunggu();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('verifikator/vMusrenbang', $data);
        $this->load->view('templates/footer');
    }

    public function musrenbangDiterima()
    {
        $data['musrenbang'] = $this->db->get('musrenbang')->result_array();
        $this->load->model('MusrenbangModel', 'musrenbang');
        $data['musrenbang'] = $this->musrenbang->getMusrenbangDiterima();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('verifikator/musrenbangDiterima', $data);
        $this->load->view('templates/footer');
    }

    public function musrenbangDitolak()
    {
        $data['musrenbang'] = $this->db->get('musrenbang')->result_array();
        $this->load->model('MusrenbangModel', 'musrenbang');
        $data['musrenbang'] = $this->musrenbang->getMusrenbangDitolak();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('verifikator/musrenbangDitolak', $data);
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
    public function verifyMusrenbang()
    {
        $diak = $this->input->get('diak');
        if ($diak == "Diakomodir") {
            $data = [
                'musrenbang_id' => $this->input->get('id'),
                'diakomodir' => $diak
            ];
            $this->db->where('musrenbang_id', $data['musrenbang_id']);
            $this->db->update('musrenbang', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Musrenbang berhasil disetujui
            </div>');
            redirect('verifikator/musrenbangDiterima');
        } else {
            $this->form_validation->set_rules('alasan', 'keterangan', 'required|trim');
            if ($this->form_validation->run() == false) {

                $this->load->view('templates/header');
                $this->load->view('templates/sidebar');
                $this->load->view('templates/topbar');
                $this->load->view('verifikator/keterangan');
                $this->load->view('templates/footer');
            } else {
                $data = [
                    'musrenbang_id' =>  htmlspecialchars($this->input->post('id', true)),
                    'diakomodir' =>  htmlspecialchars($this->input->post('diakomodir', true)),
                    'alasan' => htmlspecialchars($this->input->post('alasan', true))
                ];
                $this->db->where('musrenbang_id', $data['musrenbang_id']);
                $this->db->update('musrenbang', $data);

                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Musrenbang berhasil ditolak
            </div>');
                redirect('verifikator/musrenbangDitolak');
            }
        }
    }
}
