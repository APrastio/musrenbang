<?php


defined('BASEPATH') or exit('No direct script access allowed');

class MusrenbangModel extends CI_Model
{
    public function getMusrenbang($a)
    {

        $query = "SELECT `musrenbang`.*,`user`.`kecamatan`,`pengesahan`.`keputusan`
                FROM `musrenbang` JOIN `user`
                ON `musrenbang`.`user_id`=`user`.`user_id`
                JOIN `pengesahan` ON `musrenbang`.`musrenbang_id`=`pengesahan`.`musrenbang_id`
                WHERE `musrenbang`.`user_id`='$a'";
        return $this->db->query($query)->result_array();
    }
    public function getMusrenbanga()
    {
        $query = "SELECT `musrenbang`.*,`user`.`kecamatan`,`pengesahan`.`keputusan`
                FROM `musrenbang` JOIN `user`
                ON `musrenbang`.`user_id`=`user`.`user_id`
                JOIN `pengesahan` ON `musrenbang`.`musrenbang_id`=`pengesahan`.`musrenbang_id`";
        return $this->db->query($query)->result_array();
    }
    public function getMusrenbangi()
    {

        $query = "SELECT `musrenbang`.*,`pengesahan`.`keputusan`,`user`.`kecamatan`
                FROM `musrenbang` JOIN `pengesahan`
                ON `musrenbang`.`musrenbang_id`=`pengesahan`.`musrenbang_id`
                JOIN`user` ON `musrenbang`.`user_id`=`user`.`user_id`
                WHERE `pengesahan`.`keputusan`='Diproses'";
        return $this->db->query($query)->result_array();
    }

    public function getMusrenbangDiterima()
    {
        $query = "SELECT `musrenbang`.*,`user`.`kecamatan`,`pengesahan`.`keputusan`
        FROM `musrenbang` JOIN `user`
        ON `musrenbang`.`user_id`=`user`.`user_id`
        JOIN `pengesahan` ON `musrenbang`.`musrenbang_id`=`pengesahan`.`musrenbang_id`
        WHERE `pengesahan`.`keputusan`='Disetujui'";
        return $this->db->query($query)->result_array();
    }

    public function getMusrenbangDitolak()
    {
        $query = "SELECT `musrenbang`.*,`user`.`kecamatan`,`pengesahan`.`keputusan`
                FROM `musrenbang` JOIN `user`
                ON `musrenbang`.`user_id`=`user`.`user_id`
                JOIN `pengesahan` ON `musrenbang`.`musrenbang_id`=`pengesahan`.`musrenbang_id`
                WHERE `pengesahan`.`keputusan`='Ditolak'";
        return $this->db->query($query)->result_array();
    }

    public function getMusrenbangMenunggu()
    {
        $query = "SELECT `musrenbang`.*,`user`.`kecamatan`,`pengesahan`.`keputusan`
                FROM `musrenbang` JOIN `user`
                ON `musrenbang`.`user_id`=`user`.`user_id`
                JOIN `pengesahan` ON `musrenbang`.`musrenbang_id`=`pengesahan`.`musrenbang_id`
                WHERE `pengesahan`.`keputusan`='Diproses'";
        return $this->db->query($query)->result_array();
    }
    public function getMusrenbangMenungguDetail($id)
    {
        $query = "SELECT `musrenbang`.*,`user`.`kecamatan`,`pengesahan`.`pengesahan_id`,`pengesahan`.`keputusan`
                FROM `musrenbang` JOIN `user`
                ON `musrenbang`.`user_id`=`user`.`user_id`
                JOIN `pengesahan` ON `musrenbang`.`musrenbang_id`=`pengesahan`.`musrenbang_id`
                WHERE `pengesahan`.`keputusan`='Diproses'AND `musrenbang`.`musrenbang_id`=$id";
        return $this->db->query($query)->row_array();
    }
    public function getMusrenbangDiterimaDetail($id)
    {
        $query = "SELECT `musrenbang`.*,`user`.`kecamatan`,`pengesahan`.`keputusan`
                FROM `musrenbang` JOIN `user`
                ON `musrenbang`.`user_id`=`user`.`user_id`
                JOIN `pengesahan` ON `musrenbang`.`musrenbang_id`=`pengesahan`.`musrenbang_id`
                WHERE `pengesahan`.`keputusan`='Disetujui'AND `musrenbang`.`musrenbang_id`=$id";
        return $this->db->query($query)->row_array();
    }

    public function getMusrenbangDitolakDetail($id)
    {
        $query = "SELECT `musrenbang`.*,`user`.`kecamatan`,`pengesahan`.`keputusan`
                FROM `musrenbang` JOIN `user`
                ON `musrenbang`.`user_id`=`user`.`user_id`
                JOIN `pengesahan` ON `musrenbang`.`musrenbang_id`=`pengesahan`.`musrenbang_id`
                WHERE `pengesahan`.`keputusan`='Ditolak'AND `musrenbang`.`musrenbang_id`=$id";
        return $this->db->query($query)->row_array();
    }

    public function getinstansi($id)
    {
        $this->db->where('musrenbang_id', $id);
        $data['cek'] = $this->db->get('persetujuan')->row_array();
        if ($data['cek'] == 0) {
            $data['persetujuan'] = [
                [
                    'nama_instansi' => 'Bidang Perencanaan,Data dan Evaluasi Pembangunan',
                    'status' => '',
                    'keterangan' => '-'
                ], [
                    'nama_instansi' => 'Bidang Ekonomi dan Sosial Kemasyarakatan',
                    'status' => '',
                    'keterangan' => '-'
                ], [
                    'nama_instansi' => 'Bidang Fisik dan Prasarana',
                    'status' => '',
                    'keterangan' => '-'
                ], [
                    'nama_instansi' => 'Bidang Penelitian, Pengembangan dan Pemerintahan Umum',
                    'status' => '',
                    'keterangan' => '-'
                ]
            ];
            return $data['persetujuan'];
        } else {
            $query = "SELECT `persetujuan`.`status`,persetujuan.keterangan,`instasi`.`nama_instansi` FROM `persetujuan` JOIN `instasi` ON `instasi`.`instasi_id`=`persetujuan`.`instasi_id` WHERE `musrenbang_id`=$id ";
            return $this->db->query($query)->result_array();
        }
    }
}
