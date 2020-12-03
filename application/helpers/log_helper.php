<?php
function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('user_name')) {
        redirect('admin');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);
        if ($menu == 'admin') {
            $menu = $ci->uri->segment(2);
            if ($menu == 'data_user' || $menu == 'tambah_user' || $menu == 'hapus_user' || $menu == 'edit_user' || $menu == 'ubah') {
                if ($role_id != 3) {
                    redirect('auth/blocked');
                }
            }
        } else {
            if ($role_id == 1) {
                if ($menu != 'kecamatan') {
                    redirect('auth/blocked');
                }
            }
            if ($role_id == 2) {
                if ($menu != 'verifikator') {
                    redirect('auth/blocked');
                }
            }
            if ($role_id == 4) {
                if ($menu != 'instasi') {
                    redirect('auth/blocked');
                }
            }
        }
    }
}
