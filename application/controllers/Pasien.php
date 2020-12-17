<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('role_id')) {
            redirect('auth');
        }
        $this->load->model('Modpasien');
        // $this->load->model('Modadmin');
        $this->load->library('form_validation');
    }

    //CRUD DATA PASIEN
    public function tampil_pasien()
    {
        $kode_seri = $this->Modpasien->no_rekam_medis();
        // $seri = $kode_seri['kode'];
        // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
        // dan diubah ke integer dengan (int)
        $urutan = (int) substr($kode_seri, 7, 7);

        // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
        $urutan++;

        // membentuk kode barang baru
        // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
        // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
        // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
        $tanggal = date('Ym');
        $kodeseri = $tanggal . sprintf("%03s", $urutan);
        // echo $kodeseri;

        // var_dump($kodeseri);
        // die();

        $nama['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data = array(
            'title' => 'Data Pasien',
            'name' =>  $nama['user']['name'],
            'email' =>  $nama['user']['email'],
            'date' => $nama['user']['date_created'],
            'avatar' => $nama['user']['image'],
            'label' => base_url('assets/dist/img/avatar3.png'),
            'catatan' => $this->Modadmin->get_catatan(),
            'items' => $this->Modpasien->get_pasien1(),
            'no_medis' => $kodeseri
        );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('admin/tampil_pasien', $data);
    }

    public function tambah_pasien()
    {
        $this->form_validation->set_rules('no_rekam_medis', 'No rekam medis', 'required|trim|min_length[9]|max_length[9]|is_unique[pasien.no_medis]', [
            'is_unique' => 'Kode sudah digunakan!',
            'min_length' => 'Harus 9 huruf!',
            'max_length' => 'Harus 9 huruf!',
            'required' => 'Masukan Nomor Rekam Medis!'
        ]);
        $this->form_validation->set_rules('nama_pasien', 'Nama pasien', 'required|trim', [
            'required' => 'Masukan nama pasien!'
        ]);
        $this->form_validation->set_rules('umur', 'Umur', 'required|trim', [
            'required' => 'Masukkan umur pasien!'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Masukan alamat pasien!'
        ]);

        if ($this->form_validation->run() == false) {
            $nama['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data = array(
                'title' => 'Tambah Data Pasien',
                'name' =>  $nama['user']['name'],
                'email' =>  $nama['user']['email'],
                'date' => $nama['user']['date_created'],
                'avatar' => $nama['user']['image'],
                'label' => base_url('assets/dist/img/avatar3.png'),
                'catatan' => $this->Modadmin->get_catatan(),
                'items' => $this->Modpasien->get_pasien1()

            );
            // $tanggal = DATE('Y-m-d');
            // $data = array(
            //     'no_medis' => htmlspecialchars($this->input->post('no_rekam_medis', true)),
            //     'nama_pasien' => htmlspecialchars($this->input->post('nama_pasien', true)),
            //     'umur' => htmlspecialchars($this->input->post('umur', true)),
            //     'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            //     'tanggal_daftar' => $tanggal
            // );
            // $this->db->insert('pasien', $data);
            // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><center>Tambah pasien berhasil!</center></div>');
            // redirect('pasien/tampil_pasien');
        } else {
            $tanggal = DATE('Y-m-d');
            $data = array(
                'no_medis' => htmlspecialchars($this->input->post('no_rekam_medis', true)),
                'nama_pasien' => htmlspecialchars($this->input->post('nama_pasien', true)),
                'umur' => htmlspecialchars($this->input->post('umur', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'kelurahan' => htmlspecialchars($this->input->post('kelurahan', true)),
                'kecamatan' => htmlspecialchars($this->input->post('kecamatan', true)),
                'provinsi' => htmlspecialchars($this->input->post('provinsi', true)),
                'kode_pos' => htmlspecialchars($this->input->post('kode_pos', true)),
                'tanggal_daftar' => $tanggal
            );

            $this->db->insert('pasien', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><center>Tambah pasien berhasil!</center></div>');
            redirect('pasien/tampil_pasien');
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('admin/tampil_pasien', $data);
    }

    public function tampil_data_pasien()
    {
        $data = $this->Modpasien->get_pasien();
        echo json_encode($data);
    }

    public function edit_pasien()
    {
        $id = $this->input->get('id');
        $nama['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data = array(
            'title' => 'Edit Pasien',
            'name' =>  $nama['user']['name'],
            'email' =>  $nama['user']['email'],
            'date' => $nama['user']['date_created'],
            'avatar' => $nama['user']['image'],
            'label' => base_url('assets/dist/img/avatar3.png'),
            'catatan' => $this->Modadmin->get_catatan(),
            'id' => $id,
            'items' => $this->Modpasien->pasien($id),
        );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('admin/edit_pasien', $data);
    }

    public function update_pasien()
    {
        $id = $this->input->post('id');
        $tanggal = DATE('Y-m-d');

        $data = array(
            'no_medis' => $this->input->post('no_medis'),
            'nama_pasien' => $this->input->post('nama_pasien'),
            'umur' => $this->input->post('umur'),
            'alamat' => $this->input->post('alamat'),
            'kelurahan' => $this->input->post('kelurahan'),
            'kecamatan' => $this->input->post('kecamatan'),
            'provinsi' => $this->input->post('provinsi'),
            'kode_pos' => $this->input->post('kode_pos'),
            'tanggal_daftar' => $tanggal
        );

        $this->Modpasien->update_pasien($data, $id);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><center>Data Pasien has been updated! </center></div>');
        redirect('pasien/tampil_pasien');
    }

    public function hapus_pasien()
    {
        $id = $this->input->get('id');

        $this->Modpasien->hapus_pasien($id);

        redirect('pasien/tampil_pasien', 'refresh');
    }

    public function cetak()
    {
        $this->load->library('pdfgenerator');

        $data = array(
            'title' => "Data Pasien",
            'item' => $this->Modpasien->data_pasien()
        );

        // var_dump($data['item']);
        // die();

        $html = $this->parser->parse("admin/daftar_pasien", $data);
        $this->pdfgenerator->generate($html, "Data pasien", true, 'A4', 'portrait');
    }

    public function kartu_pasien()
    {
        $this->load->library('pdfgenerator');
        $id = $this->input->get('id');
        $no_medis = $this->input->get('no_medis');

        $data = array(
            'title' => "Kartu Pasien",
            'data_diri' => $this->Modpasien->data_kartu_pasien($no_medis),
            'items' => $this->Modpasien->kartu_pasien($id)
        );

        // var_dump($id);
        // die();

        $html = $this->parser->parse("admin/kartu_pasien", $data);
        $this->pdfgenerator->generate($html, "Kartu pasien", true, 'A5', 'portrait');
    }

    public function tampil_berobat()
    {
        $nama['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data = array(
            'title' => 'Antrian Pasien',
            'name' =>  $nama['user']['name'],
            'email' =>  $nama['user']['email'],
            'date' => $nama['user']['date_created'],
            'avatar' => $nama['user']['image'],
            'items' => $this->Modpasien->get_data_berobat(),
            'pasien' => $this->Modpasien->get_pasien1(),
            'catatan' => $this->Modadmin->get_catatan(),
        );

        // var_dump($data['items']);
        // die();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('admin/data_berobat', $data);
    }

    //RIWAYAT BEROBAT
    public function riwayat_berobat()
    {
        $nama['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data = array(
            'title' => 'Riwayat Berobat',
            'name' =>  $nama['user']['name'],
            'email' =>  $nama['user']['email'],
            'date' => $nama['user']['date_created'],
            'avatar' => $nama['user']['image'],
            // 'items' => $this->Modpasien->get_data_berobat(),
            'riwayat_berobat' => $this->Modpasien->get_riwayat_berobat(),
            'catatan' => $this->Modadmin->get_catatan()
        );

        // var_dump($data['pasien']);
        // die();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('admin/riwayat_berobat', $data);
    }
}
