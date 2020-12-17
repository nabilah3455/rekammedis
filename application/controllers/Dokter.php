
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('role_id')) {
            redirect('auth');
        }
        $this->load->model('Modadmin');
        $this->load->model('Moddokter');
        $this->load->library('form_validation');
    }
    //CRUD DOKTER
    public function index()
    {

        $nama['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data = array(
            'title' => 'Data Dokter',
            'name' =>  $nama['user']['name'],
            'email' =>  $nama['user']['email'],
            'date' => $nama['user']['date_created'],
            'avatar' => $nama['user']['image'],
            'label' => base_url('assets/dist/img/avatar3.png'),
            'items' => $this->Moddokter->get_dokter(),
            'catatan' => $this->Moddokter->get_catatan()
        );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('admin/tampil_dokter', $data);
    }

    //EDIT DOKTER
    public function edit_dokter()
    {
        $id = $this->input->get('id');
        $nama['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data = array(
            'title' => 'Edit Data Dokter',
            'name' =>  $nama['user']['name'],
            'email' =>  $nama['user']['email'],
            'date' => $nama['user']['date_created'],
            'avatar' => $nama['user']['image'],
            'label' => base_url('assets/dist/img/avatar3.png'),
            'id' => $id,
            'items' => $this->Moddokter->edit_dokter($id),
            'catatan' => $this->Moddokter->get_catatan()

        );
        $this->form_validation->set_rules('kode_dokter', 'Kode dokter', 'required|trim|min_length[6]|unique', [
            'min_length' => 'kode dokter to shoort!',
            'unique' => 'kode dokter sudah digunakan'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/footer');
            $this->load->view('dokter/edit_dokter', $data);
        } else {
            $id = $this->input->post('id');
            $nama = $this->input->post('name');
            $email = $this->input->post('email');


            $this->db->set('id', $id);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><center>Data dokter has been updated!</center></div>');
            redirect('dokter');
        }
    }
    //UPDATE DOKTER
    public function update_dokter()
    {
        $id = $this->input->post('id');
        $data = array(
            'kode_dokter' => $this->input->post('kode_dokter'),
            'nama' => $this->input->post('nama'),
            'jk' => $this->input->post('jk'),
            'poli' => $this->input->post('poli')
        );
        $this->Moddokter->update_dokter($data, $id);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><center>Data dokter has been updated! </center></div>');
        redirect('dokter');
    }

    //TAMBAH DOKTER
    public function tambah_dokter()
    {
        $this->form_validation->set_rules('kode_dokter', 'Kode dokter', 'required|trim|min_length[6]|is_unique[data_dokter.kode_dokter]', [
            'min_length' => 'kode dokter to shoort!',
            'is_unique' => 'kode dokter sudah digunakan'
        ]);
        if ($this->form_validation->run() == false) {
            $id = $this->input->get('id');
            $nama['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data = array(
                'title' => 'Tambah Data Dokter',
                'name' =>  $nama['user']['name'],
                'email' =>  $nama['user']['email'],
                'date' => $nama['user']['date_created'],
                'avatar' => $nama['user']['image'],
                'label' => base_url('assets/dist/img/avatar3.png'),
                'id' => $id,
                'catatan' => $this->Moddokter->get_catatan(),
                'items' => $this->Moddokter->get_dokter()
            );
        } else {
            $data = array(
                'kode_dokter' => $this->input->post('kode_dokter'),
                'nama' => $this->input->post('nama'),
                'jk' => $this->input->post('jk'),
                'poli' => $this->input->post('poli')
            );
            $this->db->insert('data_dokter', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><center>Data dokter berhasil ditambah!</center></div>');
            redirect('dokter');
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer');
        $this->load->view('dokter/tambah_dokter', $data);
    }

    //Report dokter
    public function report_dokter()
    {
        if ($this->input->post('submit')) {
            // $template = $this->input->post('bulan');
            $tgl_awal = $this->input->post('awal');
            $tgl_akhir = $this->input->post('akhir');
            $dokter = $this->input->post('dokter');
        } else {
            // $template = null;
            $tgl_akhir = null;
            $tgl_awal = null;
            $dokter = null;
        }

        $nama['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data = array(
            'title' => 'Report Dokter',
            'name' =>  $nama['user']['name'],
            'email' =>  $nama['user']['email'],
            'date' => $nama['user']['date_created'],
            'avatar' => $nama['user']['image'],
            'label' => base_url('assets/dist/img/avatar3.png'),
            'dokter' => $this->Moddokter->get_dokter(),
            'items' => $this->Moddokter->get_report_dokter($tgl_awal, $tgl_akhir, $dokter),
            'tgl_awal' => $tgl_awal,
            'tgl_akhir' => $tgl_akhir,
            'nama_dokter' => $dokter,
            'catatan' => $this->Moddokter->get_catatan()
        );

        // var_dump($data['nama_dokter']);
        // die();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('dokter/report_dokter', $data);
    }

    public function cetak_report_dokter()
    {
        $this->load->library('pdfgenerator');
        $dokter = $this->input->get('dokter');
        $tgl_awal = $this->input->get('tgl_awal');
        $tgl_akhir = $this->input->get('tgl_akhir');

        $data = array(
            'title' => "Report Dokter",
            'items' => $this->Moddokter->get_report_dokter($tgl_awal, $tgl_akhir, $dokter),
        );

        // var_dump($data['medis']);
        // die();

        $html = $this->parser->parse("dokter/cetak_report_dokter", $data);
        $this->pdfgenerator->generate($html, "Data report dokter", true, 'A4', 'portrait');
    }

    // public function insert_dokter()
    // {
    //     $data = array(
    //         'kode_dokter' => $this->input->post('kode_dokter'),
    //         'nama' => $this->input->post('nama'),
    //         'jk' => $this->input->post('jk'),
    //         'poli' => $this->input->post('poli')
    //     );

    //     $this->db->insert('data_dokter', $data);

    //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><center>Data dokter berhasil ditambah!</center></div>');
    //     redirect('dokter');
    // }

    //HAPUS DATA Dokter
    public function hapus_dokter()
    {
        $id = $this->input->get('id');

        $this->Moddokter->hapus_dokter($id);

        redirect('dokter', 'refresh');
    }
}
