<?php


defined('BASEPATH') or exit('No direct script access allowed');

class MusrenbangModel extends CI_Model
{
    public function getMusrenbang()
    {
        $query = "SELECT `musrenbang`.*,`user`.`kecamatan`
                FROM `musrenbang` JOIN `user`
                ON `musrenbang`.`user_id`=`user`.`user_id`";
        return $this->db->query($query)->result_array();
    }

    public function getMusrenbangDiterima()
    {
        $query = "SELECT `musrenbang`.*,`user`.`kecamatan`
        FROM `musrenbang` JOIN `user`
        ON `musrenbang`.`user_id`=`user`.`user_id`
        WHERE `musrenbang`.`diakomodir`='Diakomodir'";
        return $this->db->query($query)->result_array();
    }

    public function getMusrenbangDitolak()
    {
        $query = "SELECT `musrenbang`.*,`user`.`kecamatan`
                FROM `musrenbang` JOIN `user`
                ON `musrenbang`.`user_id`=`user`.`user_id`
                WHERE `musrenbang`.`diakomodir`='Tidak Diakomodir'";
        return $this->db->query($query)->result_array();
    }

    public function getMusrenbangMenunggu()
    {
        $query = "SELECT `musrenbang`.*,`user`.`kecamatan`
                FROM `musrenbang` JOIN `user`
                ON `musrenbang`.`user_id`=`user`.`user_id`
                WHERE `musrenbang`.`diakomodir`='Menunggu Konfirmasi'";
        return $this->db->query($query)->result_array();
    }
}
