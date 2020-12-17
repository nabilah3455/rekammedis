<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Moduser extends CI_Model
{
    function get_nama($user)
    {
        $data = $this->db->query("SELECT name FROM user WHERE name='$user'");
        return $data->result();
    }

    function get_dokter()
    {
        $data = $this->db->query("SELECT nama FROM data_dokter");
        return $data->result_array();
    }

    function get_rujukan()
    {
        $data = $this->db->query("SELECT r.*, m.diagnosa, p.nama_pasien, p.no_medis, p.umur, DATE_FORMAT(r.tanggal, '%d %M %Y') as tanggal 
            FROM data_rujukan r, rekam_medis m, pasien p
            WHERE p.no_medis=m.no_medis AND m.id=r.id_rekam_medis ORDER BY r.id DESC
        ");
        return $data->result_array();
    }

    function cetak_rujukan($id)
    {
        $data = $this->db->query("SELECT r.*, m.diagnosa, p.nama_pasien, p.no_medis, p.umur, DATE_FORMAT(r.tanggal, '%d %M %Y') as tanggal 
            FROM data_rujukan r, rekam_medis m, pasien p
            WHERE p.no_medis=m.no_medis AND m.id=r.id_rekam_medis AND r.id = '$id'
        ");
        return $data->result_array();
    }
}
