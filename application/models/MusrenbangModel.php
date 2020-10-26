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
}
