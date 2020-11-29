<?php


defined('BASEPATH') or exit('No direct script access allowed');

class AdminModel extends CI_Model
{
    public function getUser()
    {
        $query = "SELECT `user`.*,`instasi`.`nama_instansi`
                FROM `user` JOIN `instasi`
                ON `user`.`instasi_id`=`instasi`.`instasi_id`";
        return $this->db->query($query)->result_array();
    }
}
