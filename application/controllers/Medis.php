
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Medis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('role_id')) {
            redirect('auth');
        }
        $this->load->model('Modpasien');
        $this->load->model('Modobat');
        $this->load->library('form_validation');
    }

    //CRUD REKAM MEDIS
    public function index()
    {
        $tanggal = DATE('Y-m-d');

        $nama['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data = array(
            'title' => 'Daftar Pasien',
            'name' =>  $nama['user']['name'],
            'email' =>  $nama['user']['email'],
            'date' => $nama['user']['date_created'],
            'avatar' => $nama['user']['image'],
            'label' => base_url('assets/dist/img/avatar3.png'),
            'catatan' => $this->Modadmin->get_catatan(),
            'items' => $this->Modpasien->get_pasien($tanggal)
        );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('admin/data_pasien', $data);
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
            'catatan' => $this->Modadmin->get_catatan(),
            'items' => $this->Modpasien->get_data_pasien($no_medis),
            'medis' => $this->Modpasien->get_rekam_medis($no_medis),
            'get_id' => $this->Modpasien->data_medis($id)
        );

        // var_dump($data['medis']);
        // die();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('admin/rekam_medis', $data);
    }

    public function tampil_data_pasien()
    {
        $data = $this->Modpasien->get_pasien();
        echo json_encode($data);
    }

    public function data_rekam_medis()
    {
        $id = $this->input->get('no_rekam');

        $data = $this->Modpasien->get_rekam_medis($id);
        echo json_encode($data);
    }

    //CRUD RUJUKAN 
    public function tampil_rujukan()
    {
        $this->load->model('Moduser');

        $nama['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data = array(
            'title' => 'Rujukan',
            'name' =>  $nama['user']['name'],
            'email' =>  $nama['user']['email'],
            'date' => $nama['user']['date_created'],
            'avatar' => $nama['user']['image'],
            'label' => base_url('assets/dist/img/avatar3.png'),
            'catatan' => $this->Modadmin->get_catatan(),
            'items' => $this->Moduser->get_rujukan()
        );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/tampil_rujukan', $data);
        $this->load->view('templates/footer', $data);
    }

    public function update_rekam_medis()
    {
        $id = $this->input->post('id');
        $no_medis = $this->input->post('no_medis');

        $data = array(
            'tensi' => $this->input->post('tensi'),
            'diagnosa' => $this->input->post('diagnosa'),
            'terapi' => $this->input->post('terapi')
        );

        // var_dump($no_medis);
        // die();

        $this->Modpasien->update_rekam_pasien($id, $data);
        redirect('medis/rekam_medis?id=' . $id . '&&no_medis=' . $no_medis, 'refresh');
    }


    public function edit_medis()
    {
        $id = $this->input->get('id');
        $nama['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('nrp')])->row_array();
        $data = array(
            'title' => 'Edit Medis',
            'date' => $nama['user']['date_created'],
            'id' =>  $nama['user']['id'],
            'name' =>  $nama['user']['name'],
            'email' =>  $nama['user']['email'],
            'avatar' => $nama['user']['image'],
            'id' => $id,
            'items' => $this->Modpasien->get_data_medis($id),
            'catatan' => $this->Modadmin->get_catatan(),
        );

        // var_dump($data['items']);
        // die();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('admin/edit_medis', $data);
    }

    public function update_medis()
    {
        $id = $this->input->post('id');
        $no_medis = $this->input->post('no_medis');

        $data = array(
            'no_medis' => $this->input->post('no_medis'),
            'diagnosa' => $this->input->post('diagnosa'),
            'terapi' => $this->input->post('terapi')
        );

        // var_dump($data);
        // die();

        $this->Modpasien->update_medis($data, $id);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><center>Data rekam medis has been updated! </center></div>');
        redirect('medis/rekam_medis?id_pasien=' . $id . '&&no_medis=' . $no_medis, 'refresh');
    }

    public function hapus_medis()
    {
        $id = $this->input->get('id');
        $no_medis = $this->input->get('no_medis');

        $this->Modpasien->hapus_medis($id);

        redirect('medis/rekam_medis?no_medis=' . $no_medis, 'refresh');
    }

    public function hapus_rujukan()
    {
        $id = $this->input->get('id');

        $this->Modpasien->hapus_rujukan($id);

        redirect('user/tampil_rujukan', 'refresh');
    }

    public function hapus_antrian()
    {
        $id = $this->input->get('id');
        $no_medis = $this->input->get('no_medis');

        $this->Modpasien->hapus_antrian($id);

        redirect('pasien/tampil_berobat', 'refresh');
    }

    public function insert_antrian()
    {
        $id = $this->input->get('no_medis');
        $tanggal = date('Y-m-d');

        $data = array(
            'no_medis' => $id,
            'status' => "antrian",
            'tanggal' => $tanggal
        );

        // var_dus

        $this->db->insert('rekam_medis', $data);
        redirect('pasien/tampil_berobat', 'refresh');
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
        redirect('medis');
    }

    public function akhiri_sesi()
    {
        $id = $this->input->get('id');

        $data = array(
            'status' => "selesai"
        );

        // var_dump($id);
        // die();
        $this->Modpasien->update_sesi($id, $data);
        redirect('obat/ambil_obat');
    }

    public function cetak()
    {
        $this->load->library('pdfgenerator');
        $id = $this->input->get('no_medis');

        $data = array(
            'title' => "Catatan Rekam Medis",
            'item' => $this->Modpasien->get_data_pasien($id),
            'medis' => $this->Modpasien->catatan_medis($id),
        );

        // var_dump($data['medis']);
        // die();

        $html = $this->parser->parse("admin/catatan_medis", $data);
        $this->pdfgenerator->generate($html, "Data rekam medis", true, 'A4', 'portrait');
    }

    public function catatan()
    {
        $id = $this->input->get('id');

        $nama['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data = array(
            'title' => 'Catatan',
            'name' =>  $nama['user']['name'],
            'email' =>  $nama['user']['email'],
            'date' => $nama['user']['date_created'],
            'avatar' => $nama['user']['image'],
            'label' => base_url('assets/dist/img/avatar3.png'),
            'catatan' => $this->Modadmin->get_catatan(),
            'items' => $this->Modobat->catatan_obat($id)
        );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('admin/balas_catatan', $data);
    }

    public function tambah_catatan()
    {
        // $id_rekam = $this->input->post('id_rekam');
        $id = $this->input->post('id');

        $data = array(
            'catatan_1' => $this->input->post('catatan'),
            'status' => 'read'
        );

        $this->Modobat->update_catatan($data, $id);
        redirect('medis/catatan?id=' . $id, 'refresh');
    }
}
