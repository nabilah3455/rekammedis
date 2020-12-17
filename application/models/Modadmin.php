<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Modadmin extends CI_Model
{
    //function get_nama($user)
    //{

    //$data = $this->db->query("
    //SELECT name 
    //FROM user
    //WHERE name='$user'
    //");
    //return $data->result();
    //}

    //Get User
    public function get_nama($id)
    {
        $q = $this->db->query("SELECT name FROM user WHERE id=$id");
        return $q->row()->name;
    }

    public function get_email($id)
    {
        $q = $this->db->query("SELECT email FROM user WHERE id=$id");
        return $q->row()->email;
    }

    public function get_password($id)
    {
        $q = $this->db->query("SELECT password FROM user WHERE id=$id");
        return $q->row()->password;
    }

    public function get_role($id)
    {
        $q = $this->db->query("SELECT role_id FROM user WHERE id=$id");
        return $q->row()->role_id;
    }

    public function get_status($id)
    {
        $q = $this->db->query("SELECT role FROM user_role, user WHERE user.role_id=user_role.id AND user.id=$id");
        return $q->row()->role;
    }

    function get_catatan()
    {
        $data = $this->db->query("
            SELECT COUNT(*) as total
            FROM data_report
            WHERE status='unread'");

        return $data->row()->total;
    }

    function get_user()
    {
        $data = $this->db->query("
            SELECT u.id, u.name, u.email, u.password, r.role as status
            FROM user u, user_role r 
            WHERE r.id=u.role_id
            ORDER BY id DESC 
            ");
        return $data->result();
    }

    function update_user($data, $id)
    {
        $this->db->where('id', $id);
        $q = $this->db->update('user', $data);

        return $q;
    }

    function hapus_user($id)
    {
        $q = $this->db->where('id', $id)->delete('user');
        return $q;
    }

    public function jml_user()
    {
        $query = $this->db->get('user');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function jml_obat()
    {
        $query = $this->db->get('obat');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function jml_pasien()
    {
        $query = $this->db->get('pasien');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function jml_dokter()
    {
        $query = $this->db->get('data_dokter');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    //GRAFIK PASIEN
    // function get_grafik()
    // {
    //     $data =  $this->db->query("
    //         SELECT COUNT(*) total ,'Januari' as bulan  FROM rekam_medis WHERE (EXTRACT(YEAR_MONTH FROM tanggal)= CONCAT (YEAR(CURRENT_DATE()),'01')) union
    // 		SELECT COUNT(*) total ,'Febuari' as bulan FROM rekam_medis WHERE (EXTRACT(YEAR_MONTH FROM tanggal)= CONCAT (YEAR(CURRENT_DATE()),'02')) union
    // 		SELECT COUNT(*) total ,'Maret' as bulan FROM rekam_medis WHERE (EXTRACT(YEAR_MONTH FROM tanggal)= CONCAT (YEAR(CURRENT_DATE()),'03')) union
    // 		SELECT COUNT(*) total ,'April' as bulan FROM rekam_medis WHERE (EXTRACT(YEAR_MONTH FROM tanggal)= CONCAT (YEAR(CURRENT_DATE()),'04')) union
    // 		SELECT COUNT(*) total ,'Mei' as bulan FROM rekam_medis WHERE (EXTRACT(YEAR_MONTH FROM tanggal)= CONCAT (YEAR(CURRENT_DATE()),'05')) union
    // 		SELECT COUNT(*) total ,'Juni' as bulan FROM rekam_medis WHERE (EXTRACT(YEAR_MONTH FROM tanggal)= CONCAT (YEAR(CURRENT_DATE()),'06')) union
    // 		SELECT COUNT(*) total ,'Juli' as bulan FROM rekam_medis WHERE (EXTRACT(YEAR_MONTH FROM tanggal)= CONCAT (YEAR(CURRENT_DATE()),'07')) union
    // 		SELECT COUNT(*) total ,'Agustus' as bulan FROM rekam_medis WHERE (EXTRACT(YEAR_MONTH FROM tanggal)= CONCAT (YEAR(CURRENT_DATE()),'08')) union
    // 		SELECT COUNT(*) total ,'September' as bulan FROM rekam_medis WHERE (EXTRACT(YEAR_MONTH FROM tanggal)= CONCAT (YEAR(CURRENT_DATE()),'09')) union
    // 		SELECT COUNT(*) total ,'Oktober' as bulan FROM rekam_medis WHERE (EXTRACT(YEAR_MONTH FROM tanggal)= CONCAT (YEAR(CURRENT_DATE()),'10')) union
    // 		SELECT COUNT(*) total ,'November' as bulan FROM rekam_medis WHERE (EXTRACT(YEAR_MONTH FROM tanggal)= CONCAT (YEAR(CURRENT_DATE()),'11')) union
    //         SELECT COUNT(*) total ,'Desember' as bulan FROM rekam_medis WHERE (EXTRACT(YEAR_MONTH FROM tanggal)= CONCAT (YEAR(CURRENT_DATE()),'12'))
    //         ");

    //     return $data->result_array('total');
    //     // $hasil = $)row->total;
    //     // return $hasil;
    // }

    function get_grafik()
    {
        $data =  $this->db->query("SELECT * FROM 
        (
         SELECT COUNT(*) total FROM rekam_medis WHERE (EXTRACT(YEAR_MONTH FROM tanggal)=CONCAT(YEAR (CURRENT_DATE()),'01'))AND status='selesai'
        )a");

        $row = $data->row();
        $hasil = $row->total;
        return $hasil;
    }

    function get_grafik2()
    {
        $data =  $this->db->query("SELECT * FROM 
        (
         SELECT COUNT(*) total FROM rekam_medis WHERE (EXTRACT(YEAR_MONTH FROM tanggal)=CONCAT(YEAR (CURRENT_DATE()),'02'))AND status='selesai' 
        )a");

        $row = $data->row();
        $hasil = $row->total;
        return $hasil;
    }

    function get_grafik3()
    {
        $data =  $this->db->query("SELECT * FROM 
        (
         SELECT COUNT(*) total FROM rekam_medis WHERE (EXTRACT(YEAR_MONTH FROM tanggal)=CONCAT(YEAR (CURRENT_DATE()),'03'))AND status='selesai' 
        )a");

        $row = $data->row();
        $hasil = $row->total;
        return $hasil;
    }

    function get_grafik4()
    {
        $data =  $this->db->query("SELECT * FROM 
        (
         SELECT COUNT(*) total FROM rekam_medis WHERE (EXTRACT(YEAR_MONTH FROM tanggal)=CONCAT(YEAR (CURRENT_DATE()),'04'))AND status='selesai' 
        )a");

        $row = $data->row();
        $hasil = $row->total;
        return $hasil;
    }

    function get_grafik5()
    {
        $data =  $this->db->query("SELECT * FROM 
        (
         SELECT COUNT(*) total FROM rekam_medis WHERE (EXTRACT(YEAR_MONTH FROM tanggal)=CONCAT(YEAR (CURRENT_DATE()),'05'))AND status='selesai' 
        )a");

        $row = $data->row();
        $hasil = $row->total;
        return $hasil;
    }

    function get_grafik6()
    {
        $data =  $this->db->query("SELECT * FROM 
        (
        SELECT COUNT(*) total FROM rekam_medis WHERE (EXTRACT(YEAR_MONTH FROM tanggal)=CONCAT(YEAR (CURRENT_DATE()),'06'))AND status='selesai' 
        )a");

        $row = $data->row();
        $hasil = $row->total;
        return $hasil;
    }

    function get_grafik7()
    {
        $data =  $this->db->query("SELECT * FROM 
        (
         SELECT COUNT(*) total FROM rekam_medis WHERE (EXTRACT(YEAR_MONTH FROM tanggal)=CONCAT(YEAR (CURRENT_DATE()),'07'))AND status='selesai' 
        )a");

        $row = $data->row();
        $hasil = $row->total;
        return $hasil;
    }

    function get_grafik8()
    {
        $data =  $this->db->query("SELECT * FROM 
        (
         SELECT COUNT(*) total FROM rekam_medis WHERE (EXTRACT(YEAR_MONTH FROM tanggal)=CONCAT(YEAR (CURRENT_DATE()),'08'))AND status='selesai' 
        )a");

        $row = $data->row();
        $hasil = $row->total;
        return $hasil;
    }

    function get_grafik9()
    {
        $data =  $this->db->query("SELECT * FROM 
        (
         SELECT COUNT(*) total FROM rekam_medis WHERE (EXTRACT(YEAR_MONTH FROM tanggal)=CONCAT(YEAR (CURRENT_DATE()),'09'))AND status='selesai' 
        )a");

        $row = $data->row();
        $hasil = $row->total;
        return $hasil;
    }

    function get_grafik10()
    {
        $data =  $this->db->query("SELECT * FROM 
        (
         SELECT COUNT(*) total FROM rekam_medis WHERE (EXTRACT(YEAR_MONTH FROM tanggal)=CONCAT(YEAR (CURRENT_DATE()),'10'))AND status='selesai' 
        )a");

        $row = $data->row();
        $hasil = $row->total;
        return $hasil;
    }

    function get_grafik11()
    {
        $data =  $this->db->query("SELECT * FROM 
        (
         SELECT COUNT(*) total FROM rekam_medis WHERE (EXTRACT(YEAR_MONTH FROM tanggal)=CONCAT(YEAR (CURRENT_DATE()),'11'))AND status='selesai' 
        )a");

        $row = $data->row();
        $hasil = $row->total;
        return $hasil;
    }

    function get_grafik12()
    {
        $data =  $this->db->query("SELECT * FROM 
        (
         SELECT COUNT(*) total FROM rekam_medis WHERE (EXTRACT(YEAR_MONTH FROM tanggal)=CONCAT(YEAR (CURRENT_DATE()),'12'))AND status='selesai' 
        )a");

        $row = $data->row();
        $hasil = $row->total;
        return $hasil;
    }
    function data_pasien()
    {
        $data = $this->db->query("SELECT *, @no:=@no+1 as nomor, DATE_FORMAT(tanggal_daftar, ('%d %M %Y')) as tanggal_masuk FROM pasien, (SELECT @no:= 0) AS nomor ");
        return $data->result_array();
    }


    // function get_dokter()
    // {
    //     $data = $this->db->query("
    //     SELECT * FROM data_dokter
    //         ");
    //     return $data->result();
    // }
}
