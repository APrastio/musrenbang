<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {

        if ($this->session->userdata('user_name')) {
            redirect('admin');
        }
        $this->form_validation->set_rules(
            'user_name',
            'User name',
            'trim|required',
            array('required' => 'Field username tidak boleh kosong')
        );


        $this->form_validation->set_rules(
            'password',
            'Password',
            'trim|required',
            array('required' => 'Field password tidak boleh kosong')
        );
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login');
        } else {
            // valid succes
            $this->_login();
        }
    }


    private function _login()
    {
        $user_name = $this->input->post('user_name');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['user_name' => $user_name])->row_array();
        //jika user ada
        if ($user) {

            //cek password
            if (password_verify($password, $user['password'])) {
                $data = [
                    'user_id' => $user['user_id'],
                    'user_name' => $user['user_name'],
                    'role_id' => $user['role_id'],
                    'name' => $user['name'],
                ];
                $this->session->set_userdata($data);

                redirect('admin');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password salah</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Username tidak terdaftar</div>');
            redirect('auth');
        }
    }

    public function admin()
    {
        $this->load->view('templates/header');
        $this->load->view('admin/index');
        $this->load->view('templates/footer');
    }
    public function regis()
    {
        $this->form_validation->set_rules(
            'name',
            'Name',
            'required|trim',
            array('required' => 'Field nama tidak boleh kosong')
        );
        $this->form_validation->set_rules(
            'user_name',
            'User name',
            'required|trim|is_unique[user.user_name]',
            array('required' => 'Field username tidak boleh kosong'),
            [
                'is_unique' => 'Username ini telah terdaftar'
            ]
        );
        $this->form_validation->set_rules(
            'password',
            'password',
            'required|trim|min_length[3]',
            ['min_length' => 'Password terlalu pendek'],
            array('required' => 'Field password tidak boleh kosong')
        );
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admin/tambah_user');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'user_name' => htmlspecialchars($this->input->post('user_name', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'kecamatan' => htmlspecialchars($this->input->post('kecamatan')),
                'role_id' => htmlspecialchars($this->input->post('role_id')),
                'instasi_id' => htmlspecialchars($this->input->post('instasi'))
            ];
            $this->db->insert('user', $data);


            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Selamat user baru berhasil dibuat!
            </div>');
            redirect('admin/data_user');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('user_name');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Anda berhasil keluar
        </div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('templates/header');
        $this->load->view('auth/blocked');
        $this->load->view('templates/footer');
    }
}
