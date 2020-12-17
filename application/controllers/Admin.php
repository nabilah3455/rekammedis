<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('role_id')) {
            redirect('auth');
        }
        $this->load->model('Modadmin');
        // $this->load->model('Moddokter');
        $this->load->model('Modpasien');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $datamasuk = $this->Modadmin->get_grafik();
        $datamasuk2 = $this->Modadmin->get_grafik2();
        $datamasuk3 = $this->Modadmin->get_grafik3();
        $datamasuk4 = $this->Modadmin->get_grafik4();
        $datamasuk5 = $this->Modadmin->get_grafik5();
        $datamasuk6 = $this->Modadmin->get_grafik6();
        $datamasuk7 = $this->Modadmin->get_grafik7();
        $datamasuk8 = $this->Modadmin->get_grafik8();
        $datamasuk9 = $this->Modadmin->get_grafik9();
        $datamasuk10 = $this->Modadmin->get_grafik10();
        $datamasuk11 = $this->Modadmin->get_grafik11();
        $datamasuk12 = $this->Modadmin->get_grafik12();

        $nama['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data = array(
            'catatan' => $this->Modadmin->get_catatan(),
            'title' => 'Dashboard',
            'name' =>  $nama['user']['name'],
            'email' =>  $nama['user']['email'],
            'date' => $nama['user']['date_created'],
            'avatar' => $nama['user']['image'],
            'label' => base_url('assets/dist/img/avatar3.png'),
            'jml_user' => $this->Modadmin->jml_user(),
            'jml_pasien' => $this->Modadmin->jml_pasien(),
            'jml_obat' => $this->Modadmin->jml_obat(),
            'jml_dokter' => $this->Modadmin->jml_dokter(),
            'catatan' => $this->Modadmin->get_catatan(),
            // 'datagrafik' => $this->Modadmin->get_grafik(),
            'datagrafik' => $datamasuk,
            'datagrafik2' => $datamasuk2,
            'datagrafik3' => $datamasuk3,
            'datagrafik4' => $datamasuk4,
            'datagrafik5' => $datamasuk5,
            'datagrafik6' => $datamasuk6,
            'datagrafik7' => $datamasuk7,
            'datagrafik8' => $datamasuk8,
            'datagrafik9' => $datamasuk9,
            'datagrafik10' => $datamasuk10,
            'datagrafik11' => $datamasuk11,
            'datagrafik12' => $datamasuk12

        );
        // var_dump($data['datagrafik6']);
        // die();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('admin/index', $data);
    }
    public function grafik_pasien()
    {
        $data = $this->Modadmin->data_pasien()();
        echo json_encode($data);
    }

    // public function myprofile()
    // {

    //     $nama['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    //     $data = array(
    //         'title' => 'My Profile',
    //         'name' =>  $nama['user']['name'],
    //         'email' =>  $nama['user']['email'],
    //         'date' => $nama['user']['date_created'],
    //         'avatar' => $nama['user']['image'],
    //         'label' => base_url('assets/dist/img/avatar3.png')
    //     );

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('admin/myprofile', $data);
    //     $this->load->view('templates/footer', $data);
    // }

    //CRUD USER
    public function tampil_user()
    {

        $nama['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data = array(
            'catatan' => $this->Modadmin->get_catatan(),
            'title' => 'Data User',
            'name' =>  $nama['user']['name'],
            'email' =>  $nama['user']['email'],
            'date' => $nama['user']['date_created'],
            'avatar' => $nama['user']['image'],
            'label' => base_url('assets/dist/img/avatar3.png')
        );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('admin/tampil_user', $data);
    }
    //TAMPIL DATA USER
    public function tampil_data_user()
    {
        $data = $this->Modadmin->get_user();
        echo json_encode($data);
    }
    //TAMBAH USER
    public function tambah_user()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registrated!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'password dont match!',
            'min_length' => 'password to shoort!'
        ]);
        $this->form_validation->set_rules('status', 'Status', 'required', [
            'required' => 'Select user status!',
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $nama['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data = array(
                'title' => 'Tambah Data User',
                'name' =>  $nama['user']['name'],
                'email' =>  $nama['user']['email'],
                'date' => $nama['user']['date_created'],
                'avatar' => $nama['user']['image'],
                'label' => base_url('assets/dist/img/avatar3.png'),
                'catatan' => $this->Modadmin->get_catatan(),
            );
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('status'),
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><center>Add user succesfull!</center></div>');
            redirect('admin/tampil_user');
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('admin/tambah_user', $data);
    }
    //EDIT USER
    public function edit_user()
    {
        $id = $this->input->get('id');
        $nama['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data = array(
            'catatan' => $this->Modadmin->get_catatan(),
            'title' => 'Data User',
            'name' =>  $nama['user']['name'],
            'email' =>  $nama['user']['email'],
            'date' => $nama['user']['date_created'],
            'avatar' => $nama['user']['image'],
            'label' => base_url('assets/dist/img/avatar3.png'),
            'id' => $id,
            'nama' => $this->Modadmin->get_nama($id),
            'email' => $this->Modadmin->get_email($id),
            'password' => $this->Modadmin->get_password($id),
            'role_id' => $this->Modadmin->get_role($id),
            'status' => $this->Modadmin->get_status($id)

        );
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
            'min_length' => 'password to shoort!'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/edit_user', $data);
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id');
            $nama = $this->input->post('name');
            $email = $this->input->post('email');


            $this->db->set('id', $id);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><center>Your profile has been updated!</center></div>');
            redirect('admin/tampil_user');
        }
    }
    //UPDATE USER
    public function update_user()
    {
        $id = $this->input->post('id');
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role_id' => $this->input->post('status')
        );
        $this->Modadmin->update_user($data, $id);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><center>Data user has been updated! </center></div>');
        redirect('admin/tampil_user');
    }
    //EDIT PROFILE
    public function edit_profile()
    {
        $nama['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
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
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/edit_profile', $data);
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
            redirect('admin');
        }
    }
    //HAPUS USER
    public function hapus_user()
    {
        $id = $this->input->get('id');

        $this->Modadmin->hapus_user($id);

        redirect('admin/tampil_user', 'refresh');
    }

    //EDIT PASSWORD
    public function edit_password()
    {
        $nama['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data = array(
            'name' =>  $nama['user']['name'],
            'email' =>  $nama['user']['email'],
            'title' => 'Edit Password',
            'date' => $nama['user']['date_created'],
            'avatar' => $nama['user']['image'],
            'password' => $nama['user']['password'],
            'label' => base_url('assets/dist/img/avatar3.png'),
            'catatan' => $this->Modadmin->get_catatan(),

        );
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'password dont match!',
            'min_length' => 'password to shoort!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/edit_password', $data);
            $this->load->view('templates/footer');
        } else {
            $email = $this->input->post('email');
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

            $this->db->set('email', $email);
            $this->db->where('password', $password);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><center>Your password has been updated!</center></div>');
            redirect('admin');
        }
    }
}
