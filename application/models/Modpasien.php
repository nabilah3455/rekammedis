<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Modpasien extends CI_Model
{
    function get_pasien($tanggal)
    {
        $data = $this->db->query("SELECT p.*, r.id as id_pasien, r.status FROM pasien p, rekam_medis r WHERE p.no_medis=r.no_medis AND r.status='antrian' ORDER BY r.id DESC");
        return $data->result_array();
    }

    function get_pasien1()
    {
        $data = $this->db->query("SELECT *,@no:=@no+1 as nomor, DATE_FORMAT(tanggal_daftar, ('%d %M %Y')) as tanggal_masuk FROM pasien ORDER BY id DESC");
        return $data->result_array();
    }

    function get_data_berobat()
    {
        $data = $this->db->query("SELECT p.*, r.id, r.status, DATE_FORMAT(r.tanggal, ('%d %M %Y')) as tanggal FROM pasien p, rekam_medis r, (SELECT @no:= 0) AS nomor WHERE p.no_medis=r.no_medis AND r.status='antrian' ORDER BY r.id DESC");
        return $data->result_array();
    }

    function data_pasien()
    {
        $data = $this->db->query("SELECT *, @no:=@no+1 as nomor, DATE_FORMAT(tanggal_daftar, ('%d %M %Y')) as tanggal_masuk FROM pasien, (SELECT @no:= 0) AS nomor ");
        return $data->result_array();
    }

    function get_data_pasien($seri)
    {
        $data = $this->db->query("SELECT * , DATE_FORMAT(tanggal_daftar, '%d %M %Y') as tanggal_daftar FROM pasien WHERE no_medis='$seri'");
        return $data->result_array();
    }

    function pasien($id)
    {
        $data = $this->db->query("SELECT * FROM pasien WHERE id='$id'");
        return $data->result_array();
    }

    function get_data_medis($id)
    {
        $data = $this->db->query("SELECT * FROM rekam_medis WHERE id='$id'");
        return $data->result_array();
    }

    function get_rekam_medis($id)
    {
        $data = $this->db->query("SELECT r.id, r.no_medis, r.tensi, DATE_FORMAT(r.tanggal, ('%d %M %Y')) as tanggal, r.diagnosa, r.terapi, p.nama_pasien FROM rekam_medis r, pasien p WHERE p.no_medis=r.no_medis AND r.no_medis='$id' ORDER BY r.id DESC");
        return $data->result_array();
    }

    function data_medis($id)
    {
        $data = $this->db->query("SELECT r.id, r.no_medis, r.tensi, u.name, DATE_FORMAT(r.tanggal, ('%d %M %Y')) as tanggal, r.diagnosa, r.terapi FROM rekam_medis r, user u WHERE r.id='$id' LIMIT 1");
        return $data->result_array();
    }

    function update_rekam_pasien($id, $data)
    {
        $this->db->where('id', $id);
        $q = $this->db->update('rekam_medis', $data);

        return $q;
    }

    function update_pasien($data, $id)
    {
        $this->db->where('id', $id);
        $q = $this->db->update('pasien', $data);

        return $q;
    }

    function update_sesi($id, $data)
    {
        $this->db->where('id', $id);
        $q = $this->db->update('rekam_medis', $data);

        return $q;
    }

    function update_medis($data, $id)
    {
        $this->db->where('id', $id);
        $q = $this->db->update('rekam_medis', $data);

        return $q;
    }

    function hapus_pasien($id)
    {
        $q = $this->db->where('id', $id)->delete('pasien');
        return $q;
    }

    function hapus_rujukan($id)
    {
        $q = $this->db->where('id', $id)->delete('data_rujukan');
        return $q;
    }

    function hapus_medis($id)
    {
        $q = $this->db->where('id', $id)->delete('rekam_medis');
        return $q;
    }

    function hapus_antrian($id)
    {
        $q = $this->db->where('id', $id)->delete('rekam_medis');
        return $q;
    }

    function kartu_pasien($id)
    {
        $data = $this->db->query("SELECT p.nama_pasien, p.umur, p.alamat, r.tensi, r.diagnosa, r.terapi, DATE_FORMAT(p.tanggal_daftar, ('%d %M %Y')) as tanggal_masuk FROM pasien p, rekam_medis r WHERE p.no_medis=r.no_medis AND r.id='$id'");
        return $data->result_array();
    }

    function data_kartu_pasien($no_medis)
    {
        $data = $this->db->query("SELECT *, DATE_FORMAT(tanggal_daftar, ('%d %M %Y')) as tanggal_masuk FROM pasien WHERE no_medis='$no_medis'");
        return $data->result_array();
    }

    function ambil_obat()
    {
        $data = $this->db->query("SELECT p.*, r.* FROM pasien p, rekam_medis r WHERE p.no_medis=r.no_medis AND r.status='ambil obat'");
        return $data->result_array();
    }

    function data_rekam($id)
    {
        $data = $this->db->query("SELECT p.*, r.*, r.id as id_rekam FROM pasien p, rekam_medis r WHERE p.no_medis=r.no_medis AND r.status='ambil obat' AND r.id='$id'");
        return $data->result_array();
    }

    function catatan_medis($id)
    {
        $data = $this->db->query("SELECT * FROM rekam_medis WHERE no_medis='$id' GROUP BY id");
        return $data->result_array();
    }

    function get_riwayat_berobat()
    {
        $data = $this->db->query("SELECT p.*, r.id, r.diagnosa, r.terapi, DATE_FORMAT(r.tanggal, ('%d %M %Y')) as tanggal FROM pasien p, rekam_medis r, (SELECT @no:= 0) AS nomor WHERE p.no_medis=r.no_medis AND r.status='selesai' ORDER BY r.id DESC");
        return $data->result_array();
    }

    function no_rekam_medis()
    {
        $q = $this->db->query("SELECT max(no_medis) as kode FROM pasien");

        return $q->row()->kode;
    }

    function get_riwayat_periksa()
    {
        $data = $this->db->query("SELECT p.*, r.id, r.status, DATE_FORMAT(r.tanggal, ('%d %M %Y')) as tanggal FROM pasien p, rekam_medis r, (SELECT @no:= 0) AS nomor WHERE p.no_medis=r.no_medis AND r.status='ambil obat' ORDER BY r.id DESC");
        return $data->result_array();
    }
}
