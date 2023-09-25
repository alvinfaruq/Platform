<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataGuru_model');
        $this->load->model('DataSiswa_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function data_guru()
    {
        $data['title'] = 'Data Guru';
        $data_user['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $this->db->where('role_id <=', 2)->get('user')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data_user);
        $this->load->view('admin/data_guru', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_data_guru()
    {
        $data['title'] = 'Tambah Data Guru';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('idkelas', 'Kelas', 'required');
        $this->form_validation->set_rules('number', 'NIP', 'required');
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('image', 'Image', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('role_id', 'Role', 'required');
        $this->form_validation->set_rules('is_active', 'Status', 'required');
        $this->form_validation->set_rules('date_created', 'Waktu Buat', 'required');

        if( $this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/tambah_data_guru', $data);
            $this->load->view('templates/footer');    
        } else {
            $this->DataGuru_model->tambahDataGuru();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/data_guru');
        }
    }

    public function hapus_data_guru($id)
    {
        $this->DataGuru_model->hapusDataGuru($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/data_guru');
    }

    public function detail_data_guru($id)
    {
        $data['title'] = 'Detail Data Guru';
        $data['user'] = $this->DataGuru_model->getUserById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/detail_data_guru', $data);
        $this->load->view('templates/footer');
    }

    public function ubah_data_guru($id)
    {
        $data['title'] = 'Ubah Data Guru';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $this->DataGuru_model->getUserById($id);
        $data['role'] = [1, 2, 3];
        $data['status'] = [1, 0];

        $this->form_validation->set_rules('idkelas', 'Kelas', 'required');
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('image', 'Image', 'required');
        $this->form_validation->set_rules('role_id', 'Role', 'required');
        $this->form_validation->set_rules('is_active', 'Status', 'required');
        $this->form_validation->set_rules('date_created', 'Waktu Buat', 'required');

        if( $this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/ubah_data_guru', $data);
            $this->load->view('templates/footer');    
        } else {
            $this->DataGuru_model->ubahDataGuru($id);
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('admin/data_guru');
        }
    }

    public function data_siswa()
    {
        $data['title'] = 'Data Siswa';
        $data_user['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $this->db->where('role_id', 3)->get('user')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data_user);
        $this->load->view('admin/data_siswa', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_data_siswa()
    {
        $data['title'] = 'Tambah Data Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('number', 'NISN', 'required');
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('image', 'Image', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('role_id', 'Role', 'required');
        $this->form_validation->set_rules('is_active', 'Status', 'required');
        $this->form_validation->set_rules('date_created', 'Waktu Buat', 'required');

        if( $this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/tambah_data_siswa', $data);
            $this->load->view('templates/footer');    
        } else {
            $this->DataSiswa_model->tambahDataSiswa();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/data_siswa');
        }
    }

    public function hapus_data_siswa($id)
    {
        $this->DataSiswa_model->hapusDataSiswa($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/data_siswa');
    }

    public function detail_data_siswa($id)
    {
        $data['title'] = 'Detail Data Siswa';
        $data['user'] = $this->DataSiswa_model->getUserById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/detail_data_siswa', $data);
        $this->load->view('templates/footer');
    }

    public function ubah_data_siswa($id)
    {
        $data['title'] = 'Ubah Data Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $this->DataSiswa_model->getUserById($id);
        $data['role'] = [1, 2, 3];
        $data['status'] = [1, 0];

        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('image', 'Image', 'required');
        $this->form_validation->set_rules('role_id', 'Role', 'required');
        $this->form_validation->set_rules('is_active', 'Status', 'required');
        $this->form_validation->set_rules('date_created', 'Waktu Buat', 'required');

        if( $this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/ubah_data_siswa', $data);
            $this->load->view('templates/footer');    
        } else {
            $this->DataSiswa_model->ubahDataSiswa($id);
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('admin/data_siswa');
        }
    }

}