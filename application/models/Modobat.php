<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Modobat extends CI_Model
{
    function get_kategori()
    {
        $q = $this->db->query("SELECT * FROM kategori_obat");
        return $q->result_array();
    }

    function hapus_obat($id)
    {
        $q = $this->db->where('id', $id)->delete('obat');
        return $q;
    }

    //MOD KATEGORI OBAT
    function get_kategori_obat()
    {
        $data = $this->db->query("SELECT * FROM kategori_obat");
        return $data->result_array();
    }

    function hapus_kategori_obat($id)
    {
        $q = $this->db->where('id', $id)->delete('kategori_obat');
        return $q;
    }

    function update_obat($data, $id)
    {
        $this->db->where('id', $id);
        $q = $this->db->update('obat', $data);

        return $q;
    }

    function update_kategori($data, $id)
    {
        $this->db->where('id', $id);
        $q = $this->db->update('kategori_obat', $data);

        return $q;
    }

    //MOD OBAT
    function get_obat()
    {
        $data = $this->db->query("
            SELECT @no:=@no+1 as nomor, o.*, k.nama_kategori as kategori, DATE_FORMAT(o.tanggal_masuk, ('%d %M %Y')) as tanggal_masuk
            FROM obat o, kategori_obat k , (SELECT @no:= 0) AS nomor 
            WHERE k.id=o.kategori
            ORDER BY o.id DESC");
        return $data->result_array();
    }

    public function get_data_obat($id)
    {
        $q = $this->db->query("
            SELECT o.*, k.nama_kategori, k.id as kode 
            FROM obat o, kategori_obat k 
            WHERE k.id=o.kategori AND o.id=$id");
        return $q->result_array();
    }

    public function get_catatan()
    {
        $q = $this->db->query("SELECT r.catatan, r.catatan_1, r.id, m.diagnosa, m.terapi, m.tensi, p.no_medis, p.nama_pasien, p.umur 
        FROM data_report r, rekam_medis m, pasien p
        WHERE m.id=r.id_rekam_medis AND p.no_medis=m.no_medis
        ORDER BY r.id DESC
        ");
        return $q->result_array();
    }

    public function catatan_obat($id)
    {
        $q = $this->db->query("SELECT r.catatan,r.catatan_1, r.id, p.id as id_rekam, m.diagnosa, m.terapi, m.tensi, p.no_medis, p.nama_pasien, p.umur 
        FROM data_report r, rekam_medis m, pasien p
        WHERE m.id=r.id_rekam_medis AND p.no_medis=m.no_medis AND r.id='$id'
        ");

        return $q->result_array();
    }

    public function update_jml_obat($kode_obat, $jml, $stok)
    {
        $q = $this->db->query("UPDATE obat SET stok= $stok-$jml WHERE kode_obat='$kode_obat'");

        return $q;
    }

    public function update_catatan($data, $id)
    {
        $this->db->where('id', $id);
        $q = $this->db->update('data_report', $data);

        return $q;
    }

    function hapus_catatan($id)
    {
        $q = $this->db->where('id', $id)->delete('data_report');
        return $q;
    }
}
