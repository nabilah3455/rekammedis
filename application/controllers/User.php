<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('role_id')) {
            redirect('auth');
        }
        $this->load->model('Moduser');
        $this->load->model('Modpasien');
        $this->load->model('Moddokter');
        $this->load->library('form_validation');
    }


    public function index()
    {
        $nama['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data = array(
            'name' =>  $nama['user']['name'],
            'email' =>  $nama['user']['email'],
            'title' => 'My Profile',
            'date' => $nama['user']['date_created'],
            'avatar' => $nama['user']['image'],
            'label' => base_url('assets/dist/img/avatar3.png'),


        );
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }


    public function edit_profile()
    {
        $nama['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data = array(
            'name' =>  $nama['user']['name'],
            'email' =>  $nama['user']['email'],
            'title' => 'Edit Profile',
            'date' => $nama['user']['date_created'],
            'avatar' => $nama['user']['image'],
            'label' => base_url('assets/dist/img/avatar3.png')

        );
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/edit_profile', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            //cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ('$upload_image') {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/dist/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><center>Your profile has been updated!</center></div>');
            redirect('user');
        }
    }

    public function pasien()
    {
        // $tanggal = date('Y-m-d');
        $nama['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data = array(
            'name' =>  $nama['user']['name'],
            'email' =>  $nama['user']['email'],
            'title' => 'Daftar Antrian Pasien',
            'date' => $nama['user']['date_created'],
            'avatar' => $nama['user']['image'],
            'label' => base_url('assets/dist/img/avatar3.png'),
            'items' => $this->Modpasien->get_data_berobat(),
            'pasien' => $this->Modpasien->get_pasien1(),
            'catatan' => $this->Moddokter->get_catatan(),
            'riwayat_periksa' => $this->Modpasien->get_riwayat_periksa()
        );

        // var_dump($tanggal);
        // die();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('templates/footer');
        $this->load->view('user/daftar_pasien', $data);
    }

    public function rekam_medis()
    {
        $id = $this->input->get('id');
        $no_medis = $this->input->get('no_medis');
        // $pasien = $this->Modpasien->get_rekam_medis($id);

        $nama['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data = array(
            'title' => 'Rekam Medis',
            'name' =>  $nama['user']['name'],
            'email' =>  $nama['user']['email'],
            'date' => $nama['user']['date_created'],
            'avatar' => $nama['user']['image'],
            'label' => base_url('assets/dist/img/avatar3.png'),
            'items' => $this->Modpasien->get_data_pasien($no_medis),
            'medis' => $this->Modpasien->get_rekam_medis($no_medis),
            'get_id' => $this->Modpasien->data_medis($id),
            'catatan' => $this->Moddokter->get_catatan()
            // 'dokter' => $this->Moduser->get_dokter()
        );
        // var_dump($data['medis']);
        // die();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('user/rekam_medis', $data);
    }

    public function update_rekam_medis()
    {
        $dokter = $this->Moduser->get_dokter();

        $id = $this->input->post('id');
        $no_medis = $this->input->post('no_medis');

        $data = array(
            'tensi' => $this->input->post('tensi'),
            'diagnosa' => $this->input->post('diagnosa'),
            'terapi' => $this->input->post('terapi'),
            'dokter' => $this->input->post('dokter')
        );

        $this->Modpasien->update_rekam_pasien($id, $data);
        redirect('user/rekam_medis?id=' . $id . '&&no_medis=' . $no_medis, 'refresh');
    }

    public function tampil_rujukan()
    {

        $nama['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data = array(
            'title' => 'Data Rujukan',
            'name' =>  $nama['user']['name'],
            'email' =>  $nama['user']['email'],
            'date' => $nama['user']['date_created'],
            'avatar' => $nama['user']['image'],
            'label' => base_url('assets/dist/img/avatar3.png'),
            'items' => $this->Moduser->get_rujukan(),
            'catatan' => $this->Moddokter->get_catatan()
        );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('user/tampil_rujukan', $data);
    }

    public function input_rujukan()
    {
        $id = $this->input->post('id');
        $dokter = $this->input->post('dokter');
        $no_medis = $this->input->post('no_medis');
        $tanggal = date('Y-m-d');

        $data = array(
            'id_rekam_medis' => $id,
            'dokter' => $dokter,
            'tanggal' => $tanggal,
            'nama_poli' => $this->input->post('nama_poli'),
            'nama_rumah_sakit' => $this->input->post('nama_rumah_sakit')
        );

        $this->db->insert('data_rujukan', $data);
        redirect('user/rekam_medis?id=' . $id . '&&no_medis=' . $no_medis, 'refresh');
    }

    public function update_sesi()
    {
        $id = $this->input->get('id');

        $data = array(
            'status' => "ambil obat"
        );

        // var_dump($id);
        // die();
        $this->Modpasien->update_sesi($id, $data);
        redirect('user/pasien');
    }

    public function cetak_rujukan()
    {
        $this->load->library('pdfgenerator');
        $id = $this->input->get('id');

        $data = array(
            'title' => "Data Pasien",
            'items' => $this->Moduser->cetak_rujukan($id)
        );

        // var_dump($data['item']);
        // die();

        $html = $this->parser->parse("user/surat_rujukan", $data);
        $this->pdfgenerator->generate($html, "Surat Rujukan", true, 'A4', 'portrait');
    }

    public function catatan()
    {
        $this->load->model('Modobat');

        $nama['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data = array(
            'title' => 'Catatan',
            'name' =>  $nama['user']['name'],
            'email' =>  $nama['user']['email'],
            'date' => $nama['user']['date_created'],
            'avatar' => $nama['user']['image'],
            'label' => base_url('assets/dist/img/avatar3.png'),
            'items' => $this->Modobat->get_catatan(),
            'catatan' => $this->Moddokter->get_catatan()
        );

        // var_dump($data['catatan']);
        // die();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('user/catatan_obat', $data);
    }

    public function catatan_obat()
    {
        $this->load->model('Modobat');

        $id = $this->input->get('id');

        $nama['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data = array(
            'title' => 'Catatan',
            'name' =>  $nama['user']['name'],
            'email' =>  $nama['user']['email'],
            'date' => $nama['user']['date_created'],
            'avatar' => $nama['user']['image'],
            'label' => base_url('assets/dist/img/avatar3.png'),
            'items' => $this->Modobat->catatan_obat($id),
            'catatan' => $this->Moddokter->get_catatan()
        );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('user/balas_catatan', $data);
    }

    public function tambah_catatan()
    {
        $this->load->model('Modobat');
        // $id_rekam = $this->input->post('id_rekam');
        $id = $this->input->post('id');

        $data = array(
            'catatan_1' => $this->input->post('catatan'),
            'status' => 'unread'
        );

        $this->Modobat->update_catatan($data, $id);
        redirect('user/catatan_obat?id=' . $id, 'refresh');
    }
}
