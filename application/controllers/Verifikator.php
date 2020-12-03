<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Verifikator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
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
    public function vMusrenbangDetail($id)
    {
        $this->load->model('MusrenbangModel', 'musrenbang');
        $data['musrenbang'] = $this->musrenbang->getMusrenbangMenungguDetail($id);
        $data['persetujuan'] = $this->musrenbang->getinstansi($id);
        $this->db->where('musrenbang_id', $id);
        $data['cek'] = $this->db->get('persetujuan')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('verifikator/vMusrenbangDetail', $data);
        $this->load->view('templates/footer');
    }

    public function musrenbangDisetujui()
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
    public function musrenbangDiterimaDetail($id)
    {
        $this->load->model('MusrenbangModel', 'musrenbang');
        $data['musrenbang'] = $this->musrenbang->getMusrenbangDiterimaDetail($id);
        $data['persetujuan'] = $this->musrenbang->getinstansi($id);
        $this->db->where('musrenbang_id', $id);
        $data['cek'] = $this->db->get('persetujuan')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('verifikator/musrenbangDiterimaDetail', $data);
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

    public function musrenbangDitolakDetail($id)
    {
        $this->load->model('MusrenbangModel', 'musrenbang');
        $data['musrenbang'] = $this->musrenbang->getMusrenbangDitolakDetail($id);
        $data['persetujuan'] = $this->musrenbang->getinstansi($id);
        $this->db->where('musrenbang_id', $id);
        $data['cek'] = $this->db->get('persetujuan')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('verifikator/musrenbangDitolakDetail', $data);
        $this->load->view('templates/footer');
    }

    public function verifyMusrenbang($musren_id, $keputusan, $pengesahan_id)
    {
        $data = [
            'musrenbang_id' => $musren_id,
            'keputusan' => $keputusan,
            'date' => time()
        ];
        $this->db->where('pengesahan_id', $pengesahan_id);
        $this->db->update('pengesahan', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Musrenbang berhasil ' . strtolower($keputusan) . '
            </div>');
        redirect('verifikator/musrenbang' . $keputusan);
    }

    public function printMusrenbang($id)
    {
        $this->load->model('MusrenbangModel', 'musrenbang');
        $data['musrenbang'] = $this->musrenbang->getMusrenbangMenungguDetail($id);
        $data['persetujuan'] = $this->musrenbang->getinstansi($id);
        $data['verifikator'] = $this->db->get_where('user', ['role_id' => 2])->row_array();

        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = 'ID-' . $data['musrenbang']['kecamatan'] . '-' . $data['musrenbang']['musrenbang_id'] . '.pdf';
        $this->pdf->load_view('verifikator/printMusrenbangV', $data);
    }

    public function printDiterima($id)
    {
        $this->load->model('MusrenbangModel', 'musrenbang');
        $data['musrenbang'] = $this->musrenbang->getMusrenbangDiterimaDetail($id);
        $data['persetujuan'] = $this->musrenbang->getinstansi($id);
        $data['verifikator'] = $this->db->get_where('user', ['role_id' => 2])->row_array();

        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = 'ID-' . $data['musrenbang']['kecamatan'] . '-' . $data['musrenbang']['musrenbang_id'] . '.pdf';
        $this->pdf->load_view('verifikator/printDiterima', $data);
    }
    public function printDitolak($id)
    {
        $this->load->model('MusrenbangModel', 'musrenbang');
        $data['musrenbang'] = $this->musrenbang->getMusrenbangDitolakDetail($id);
        $data['persetujuan'] = $this->musrenbang->getinstansi($id);
        $data['verifikator'] = $this->db->get_where('user', ['role_id' => 2])->row_array();

        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = 'ID-' . $data['musrenbang']['kecamatan'] . '-' . $data['musrenbang']['musrenbang_id'] . '.pdf';
        $this->pdf->load_view('verifikator/printDitolak', $data);
    }
}
