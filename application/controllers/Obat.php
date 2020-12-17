<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('role_id')) {
            redirect('auth');
        }
        $this->load->model('Modobat');
        $this->load->model('Modpasien');
        $this->load->library('form_validation');
    }

    //CRUD OBAT
    public function tampil_obat()
    {
        $nama['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data = array(
            'title' => 'Data Obat',
            'name' =>  $nama['user']['name'],
            'email' =>  $nama['user']['email'],
            'date' => $nama['user']['date_created'],
            'avatar' => $nama['user']['image'],
            'label' => base_url('assets/dist/img/avatar3.png'),
            'catatan' => $this->Modadmin->get_catatan(),
            'kategori' => $this->Modobat->get_kategori()
        );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('admin/tampil_obat', $data);
    }
    //TAMPIL DATA OBAT
    public function tampil_data_obat()
    {
        $data = $this->Modobat->get_obat();
        echo json_encode($data);
    }
    //TAMBAH DATA OBAT
    public function tambah_obat()
    {
        $this->form_validation->set_rules('kode_obat', 'Kode obat', 'required|trim|min_length[6]|max_length[6]|is_unique[obat.kode_obat]', [
            'is_unique' => 'Kode sudah digunakan!',
            'min_length' => 'Harus 6 huruf!',
            'max_length' => 'Harus 6 huruf!',
            'required' => 'Masukan kode obat!'
        ]);
        $this->form_validation->set_rules('nama_obat', 'Nama obat', 'required|trim', [
            'required' => 'Masukan nama obat!'
        ]);
        $this->form_validation->set_rules('kategori', 'Kategori', 'required|trim', [
            'required' => 'Pilih kategori!'
        ]);
        $this->form_validation->set_rules('stok', 'Stok', 'required|trim', [
            'required' => 'Masukan jumlah obat!'
        ]);
        $this->form_validation->set_rules('satuan', 'Satuan', 'required|trim', [
            'required' => 'Masukan satuan obat!'
        ]);
        /* $this->form_validation->set_rules('tanggal_masuk', 'Tanggal masuk', 'required', [
            'required' => 'Masukan tanggal!'
        ]);*/


        if ($this->form_validation->run() == false) {
            $nama['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data = array(
                'title' => 'Tambah Data Obat',
                'name' =>  $nama['user']['name'],
                'email' =>  $nama['user']['email'],
                'date' => $nama['user']['date_created'],
                'avatar' => $nama['user']['image'],
                'label' => base_url('assets/dist/img/avatar3.png'),
                'catatan' => $this->Modadmin->get_catatan(),
            );
            // $tanggal = DATE('Y-m-d');
            // $isi = array(
            //     'kode_obat' => htmlspecialchars($this->input->post('kode_obat', true)),
            //     'nama_obat' => htmlspecialchars($this->input->post('nama_obat', true)),
            //     'kategori' => htmlspecialchars($this->input->post('kategori', true)),
            //     'stok' => htmlspecialchars($this->input->post('stok', true)),
            //     'satuan' => htmlspecialchars($this->input->post('satuan', true)),
            //     'tanggal_masuk' => $tanggal
            // );

            // $this->db->insert('obat', $isi);
            // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><center>Tambah obat berhasil!</center></div>');
            // redirect('obat/tampil_obat');
        } else {
            $tanggal = DATE('Y-m-d');
            $data = array(
                'kode_obat' => htmlspecialchars($this->input->post('kode_obat', true)),
                'nama_obat' => htmlspecialchars($this->input->post('nama_obat', true)),
                'kategori' => htmlspecialchars($this->input->post('kategori', true)),
                'stok' => htmlspecialchars($this->input->post('stok', true)),
                'satuan' => htmlspecialchars($this->input->post('satuan', true)),
                'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
                'tanggal_masuk' => $tanggal
            );

            $this->db->insert('obat', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><center>Tambah obat berhasil!</center></div>');
            redirect('obat/tampil_obat');
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('admin/tampil_obat', $data);
    }


    //HAPUS DATA OBAT
    public function hapus_obat()
    {
        $id = $this->input->get('id');

        $this->Modobat->hapus_obat($id);

        redirect('obat/tampil_obat', 'refresh');
    }


    //CRUD KATEGORI OBAT 
    public function tampil_kategori_obat()
    {

        $nama['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data = array(
            'title' => 'Kategori Obat',
            'name' =>  $nama['user']['name'],
            'email' =>  $nama['user']['email'],
            'date' => $nama['user']['date_created'],
            'avatar' => $nama['user']['image'],
            'label' => base_url('assets/dist/img/avatar3.png'),
            'catatan' => $this->Modadmin->get_catatan(),
        );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('admin/tampil_kategori_obat', $data);
    }
    //TAMPIL KATEGORI OBAT
    public function tampil_data_kategori_obat()
    {
        $data = $this->Modobat->get_kategori_obat();
        echo json_encode($data);
    }
    //TAMBAH KATEGORI OBAT
    public function tambah_kategori_obat()
    {
        $this->form_validation->set_rules('nama_kategori', 'Nama kategori', 'required|trim', [
            'required' => 'Masukan kategori obat!'
        ]);

        if ($this->form_validation->run() == false) {
            $nama['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data = array(
                'title' => 'Tambah Data Obat',
                'name' =>  $nama['user']['name'],
                'email' =>  $nama['user']['email'],
                'date' => $nama['user']['date_created'],
                'avatar' => $nama['user']['image'],
                'label' => base_url('assets/dist/img/avatar3.png'),
                'catatan' => $this->Modadmin->get_catatan(),
            );
        } else {
            $data = [
                'nama_kategori' => htmlspecialchars($this->input->post('nama_kategori', true))
            ];

            $this->db->insert('kategori_obat', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><center>Tambah obat berhasil!</center></div>');
            redirect('obat/tampil_kategori_obat');
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('admin/tampil_kategori_obat', $data);
    }


    //HAPUS KATEGORI OBAT
    public function hapus_kategori_obat()
    {
        $id = $this->input->get('id');

        $this->Modobat->hapus_kategori_obat($id);

        redirect('obat/tampil_kategori_obat', 'refresh');
    }

    //EDIT DATA OBAT
    public function edit_obat()
    {
        $id = $this->input->get('id');
        $nama['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data = array(
            'title' => 'Edit obat',
            'name' =>  $nama['user']['name'],
            'email' =>  $nama['user']['email'],
            'date' => $nama['user']['date_created'],
            'avatar' => $nama['user']['image'],
            'label' => base_url('assets/dist/img/avatar3.png'),
            'catatan' => $this->Modadmin->get_catatan(),
            // 'id' => $id,
            'items' => $this->Modobat->get_data_obat($id),
            'kategori' => $this->Modobat->get_kategori_obat()
        );
        // var_dump($data['items']);
        // die();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('admin/edit_obat', $data);
    }
    //EDIT KATEGORI OBAT
    public function edit_kategori()
    {
        $id = $this->input->get('id');
        $nama['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('nrp')])->row_array();
        $data = array(
            'title' => 'Edit Kategori Obat',
            'date' => $nama['user']['date_created'],
            'id' =>  $nama['user']['id'],
            'name' =>  $nama['user']['name'],
            'email' =>  $nama['user']['email'],
            'avatar' => $nama['user']['image'],
            'items' => $this->Modobat->get_data_obat($id),
            'kategori' => $this->Modobat->get_kategori_obat(),
            'catatan' => $this->Modadmin->get_catatan(),
        );

        // var_dump($data['items']);
        // die();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('admin/edit_kategori', $data);
    }

    public function update_obat()
    {
        $id = $this->input->post('id');
        // $tanggal = DATE('Y-m-d');
        $tanggal = DATE('Y-m-d');
        $data = array(
            'kode_obat' => $this->input->post('kode_obat'),
            'nama_obat' => $this->input->post('nama_obat'),
            'kategori' => $this->input->post('kategori'),
            'stok' => $this->input->post('stok'),
            'satuan' => $this->input->post('satuan'),
            'deskripsi' => $this->input->post('deskripsi'),
            'tanggal_masuk' => $tanggal
        );

        $this->Modobat->update_obat($data, $id);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><center>Data obat has been updated! </center></div>');
        redirect('obat/tampil_obat');
    }

    public function update_kategori()
    {
        $id = $this->input->post('id');
        // $tanggal = DATE('Y-m-d');

        $data = array(
            'id' => $this->input->post('id'),
            'nama_kategori' => $this->input->post('kategori'),
        );

        $this->Modobat->update_kategori($data, $id);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><center>Data obat has been updated! </center></div>');
        redirect('obat/tampil_kategori_obat');
    }

    public function cetak()
    {
        $this->load->library('pdfgenerator');

        $data = array(
            'title' => "Data Obat",
            'item' => $this->Modobat->get_obat()
        );

        $html = $this->parser->parse("admin/daftar_obat", $data);
        $this->pdfgenerator->generate($html, "Data Obat", true, 'A4', 'portrait');
    }

    public function ambil_obat()
    {
        // $id = $this->input->get('id');
        $nama['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data = array(
            'title' => 'Ambil Obat',
            'name' =>  $nama['user']['name'],
            'email' =>  $nama['user']['email'],
            'date' => $nama['user']['date_created'],
            'avatar' => $nama['user']['image'],
            'label' => base_url('assets/dist/img/avatar3.png'),
            'catatan' => $this->Modadmin->get_catatan(),
            // 'id' => $id,
            'items' => $this->Modpasien->ambil_obat(),
            'obat' => $this->Modobat->get_obat()
        );

        // var_dump($data['items']);
        // die();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('admin/ambil_obat', $data);
    }

    public function cek_obat()
    {
        $id = $this->input->get('id');
        $nama['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data = array(
            'title' => 'Ambil Obat',
            'name' =>  $nama['user']['name'],
            'email' =>  $nama['user']['email'],
            'date' => $nama['user']['date_created'],
            'avatar' => $nama['user']['image'],
            'label' => base_url('assets/dist/img/avatar3.png'),
            'catatan' => $this->Modadmin->get_catatan(),
            // 'id' => $id,
            'items' => $this->Modpasien->data_rekam($id),
            'obat' => $this->Modobat->get_obat(),
            'id' => $id
        );

        // var_dump($data['obat']);
        // die();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('admin/cek_obat', $data);
    }

    public function update_jml_obat()
    {
        $kode_obat = $this->input->post('kode_obat');
        $stok = $this->input->post('stok');
        $jml = $this->input->post('jml_obat');
        $id = $this->input->post('id');

        // var_dump($id);
        // die();

        $this->Modobat->update_jml_obat($kode_obat, $jml, $stok);
        redirect('obat/cek_obat?id=' . $id, 'refresh');
    }

    public function catatan()
    {
        $id = $this->input->post('id_rekam');

        $data = array(
            'id_rekam_medis' => $id,
            'catatan' => $this->input->post('catatan'),
            'catatan_1' => '',
            'status' => 'read'
        );

        $this->db->insert('data_report', $data);
        redirect('obat/cek_obat?id=' . $id, 'refresh');
    }

    public function catatan_obat()
    {
        $nama['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data = array(
            'title' => 'Catatan',
            'name' =>  $nama['user']['name'],
            'email' =>  $nama['user']['email'],
            'date' => $nama['user']['date_created'],
            'avatar' => $nama['user']['image'],
            'label' => base_url('assets/dist/img/avatar3.png'),
            'catatan' => $this->Modadmin->get_catatan(),
            'items' => $this->Modobat->get_catatan()
        );

        // var_dump($data['items']);
        // die();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('admin/catatan_obat', $data);
    }

    //HAPUS catatan
    public function hapus_catatan()
    {
        $id = $this->input->get('id');

        $this->Modobat->hapus_catatan($id);

        redirect('obat/catatan_obat', 'refresh');
    }
}
