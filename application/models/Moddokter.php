<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Moddokter extends CI_Model
{
    function get_dokter()
    {
        $data = $this->db->query("
            SELECT *
            FROM data_dokter
            ORDER BY id DESC");
        return $data->result_array();
    }

    function get_catatan()
    {
        $data = $this->db->query("
            SELECT COUNT(*) as total
            FROM data_report
            WHERE status='read'");

        return $data->row()->total;
    }

    function edit_dokter($id)
    {
        $data = $this->db->query("
            SELECT *, IF(
                jk='P','Perempuan','Laki-laki'
            ) AS jenis_kelamin
            FROM data_dokter 
            WHERE id='$id'
            ORDER BY id DESC");
        return $data->result_array();
    }

    function update_dokter($data, $id)
    {
        $this->db->where('id', $id);
        $q = $this->db->update('data_dokter', $data);

        return $q;
    }

    function hapus_dokter($id)
    {
        $q = $this->db->where('id', $id)->delete('data_dokter');
        return $q;
    }

    function get_report_dokter($tgl_awal, $tgl_akhir, $dokter)
    {
        $data = $this->db->query("
        SELECT p.nama_pasien, r.diagnosa, r.terapi, DATE_FORMAT(r.tanggal, ('%d %M %Y')) as tanggal 
        FROM pasien p, rekam_medis r
        WHERE p.no_medis=r.no_medis AND r.tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir' AND r.dokter='$dokter' AND r.status='selesai'
        ORDER BY r.id");
        return $data->result_array();
    }
}
