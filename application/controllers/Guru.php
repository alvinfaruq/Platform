<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MataPelajaran_model');
        $this->load->model('MateriPelajaran_model');
        $this->load->model('Ujian_model');
        $this->load->model('Soal_model');
        $this->load->model('JawabanTugas_model');
        $this->load->model('Livestream_model');
        $this->load->model('Kelas_model');
        $this->load->model('Tugas_model');
        $this->load->model('DataSiswa_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'My Profile Guru';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/index', $data);
        $this->load->view('templates/footer');
    }

    public function mata_pelajaran()
    {
        $data['title'] = 'Mata Pelajaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['matapelajaran'] = $this->MataPelajaran_model->getAllMapel();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/mata_pelajaran', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_mata_pelajaran()
    {
        $data['title'] = 'Tambah Mata Pelajaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kelas'] = $this->db->get('kelas')->result_array();

        $this->form_validation->set_rules('idkelas', 'Kelas', 'required');
        $this->form_validation->set_rules('nama', 'Mata Pelajaran', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if( $this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('guru/tambah_mata_pelajaran', $data);
            $this->load->view('templates/footer');    
        } else {
            $this->MataPelajaran_model->tambahMataPelajaran();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('guru/mata_pelajaran');
        }
    }

    public function hapus_mata_pelajaran($id)
    {
        $this->MataPelajaran_model->hapusMataPelajaran($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('guru/mata_pelajaran');
    }

    public function detail_mata_pelajaran($id)
    {
        $data['title'] = 'Detail Mata Pelajaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['matapelajaran'] = $this->MataPelajaran_model->getMapelById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/detail_mata_pelajaran', $data);
        $this->load->view('templates/footer');
    }

    public function ubah_mata_pelajaran($id)
    {
        $data['title'] = 'Ubah Mata Pelajaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['matapelajaran'] = $this->MataPelajaran_model->getMapelById($id);
        $data['kelas'] = $this->db->get('kelas')->result_array();

        $this->form_validation->set_rules('idkelas', 'Kelas', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if( $this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('guru/ubah_mata_pelajaran', $data);
            $this->load->view('templates/footer');    
        } else {
            $this->MataPelajaran_model->ubahMataPelajaran($id);
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('guru/mata_pelajaran');
        }
    }

    public function materi_pelajaran()
    {
        $data['title'] = 'Materi Pelajaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // $data['materipelajarandetail'] = $this->db->get()->result_array();
        $data['materipelajaran'] = $this->MateriPelajaran_model->getAllMateri();
        // echo json_encode($data['materipelajaran']); die();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/materi_pelajaran', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_materi_pelajaran()
    {
        $data['title'] = 'Tambah Materi Pelajaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['matapelajaran'] = $this->db->get('matapelajaran')->result_array();
        $data['kelas'] = $this->db->get('kelas')->result_array();

        $this->form_validation->set_rules('idkelas', 'Kelas', 'required');
        $this->form_validation->set_rules('idmatapelajaran', 'Id Mata Pelajaran', 'required');
        $this->form_validation->set_rules('judul', 'Judul Materi', 'required');
        $this->form_validation->set_rules('materi', 'Materi', 'required');
        // $this->form_validation->set_rules('upload_materi', 'Unggah Materi', 'required');

        if( $this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('guru/tambah_materi_pelajaran', $data);
            $this->load->view('templates/footer');    
        } else {
            $config['upload_path']          = './upload_materi/';
            $config['allowed_types']        = 'gif|jpg|png|pdf';
            $config['max_size']             = 100000000;
            $config['max_width']            = 10000;
            $config['max_height']           = 10000;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('upload_materi'))
            {
                // $error = array('error' => $this->upload->display_errors());
                
                // $this->load->view('upload_form', $error);
                echo json_encode($this->upload->display_errors());die();
            } else {
                // $data = array('upload_data' => $this->upload->data());

                // $this->load->view('upload_success', $data);
                $upload_materi = $this->upload->data();
                $data["upload"] = $upload_materi;
                $upload_materi = $upload_materi['file_name'];
                // echo json_encode($data);die();
                $this->MateriPelajaran_model->tambahMateriPelajaran($upload_materi);
                $this->session->set_flashdata('flash', 'Ditambahkan');
                redirect('guru/materi_pelajaran');
            }
        }
    }

    public function hapus_materi_pelajaran($id)
    {
        $this->MateriPelajaran_model->hapusMateriPelajaran($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('guru/materi_pelajaran');
    }

    public function detail_materi_pelajaran($id)
    {
        $data['title'] = 'Detail Materi Pelajaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['materipelajaran'] = $this->MateriPelajaran_model->getMateriById($id);
        $data['materipelajaran'] = $this->MateriPelajaran_model->getAllMateri($id);

        // echo json_encode($data); die();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/detail_materi_pelajaran', $data);
        $this->load->view('templates/footer');
    }

    public function ubah_materi_pelajaran($id)
    {
        $data['title'] = 'Ubah Materi Pelajaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['materipelajaran'] = $this->MateriPelajaran_model->getMateriById($id);
        $data['materipelajaran'] = $this->MateriPelajaran_model->getAllMateri($id);
        $data['matapelajaran'] = $this->db->get('matapelajaran')->result_array();
        $data['kelas'] = $this->db->get('kelas')->result_array();

        // echo json_encode($data); die();
        $this->form_validation->set_rules('idmatapelajaran', 'Mata Pelajaran', 'required');
        $this->form_validation->set_rules('judul', 'Judul Materi', 'required');
        $this->form_validation->set_rules('materi', 'Materi', 'required');

        if( $this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('guru/ubah_materi_pelajaran', $data);
            $this->load->view('templates/footer');    
        } else {
            $this->MateriPelajaran_model->ubahMateriPelajaran($id);
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('guru/materi_pelajaran');
        }
    }

    public function ujian()
    {
        $data['title'] = 'Ujian';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // $this->db->select("*");
        // $this->db->from("ujian");
        // $this->db->join("matapelajaran", "ujian.idmatapelajaran=matapelajaran.id");

        $data['ujian'] = $this->Ujian_model->getAllUjian();

        // echo json_encode($data); die();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/ujian', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_ujian()
    {
        $data['title'] = 'Tambah Ujian';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['matapelajaran'] = $this->db->get('matapelajaran')->result_array();
        $data['kelas'] = $this->db->get('kelas')->result_array();

        $this->form_validation->set_rules('idkelas', 'Kelas', 'required');
        $this->form_validation->set_rules('idmatapelajaran', 'Mata Pelajaran', 'required');
        $this->form_validation->set_rules('tanggalujian', 'Tanggal Ujian', 'required');
        $this->form_validation->set_rules('waktumulai', 'Waktu Mulai', 'required');
        $this->form_validation->set_rules('waktuselesai', 'Waktu Selesai', 'required');
        $this->form_validation->set_rules('jenisujian', 'Jenis ujian', 'required');

        if( $this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('guru/tambah_ujian', $data);
            $this->load->view('templates/footer');    
        } else {
            $this->Ujian_model->tambahUjian();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('guru/ujian');
        }
    }

    public function hapus_ujian($id)
    {
        $this->Ujian_model->hapusUjian($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('guru/ujian');
    }

    public function detail_ujian($id)
    {
        $data['title'] = 'Detail Ujian';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['ujian'] = $this->Ujian_model->getUjianById($id);
        $data["mapel"] = $this->db->get_where('matapelajaran', ['id' => $data["ujian"]["idmatapelajaran"]])->row_array();

        $siswa = $this->DataSiswa_model->getAllSiswa();

        $data["nilai"] = array();
        
        for($i = 0; $i < count($siswa); ++$i) {
            $nilai = $this->nilai_siswa($siswa[$i]["id"], $id);
            
            if($nilai !== false) {
                
                array_push($data["nilai"], [
                    "siswa" => $siswa[$i],
                    "nilai" => $nilai
                ]);
            }
        }
        // echo json_encode($data['nilai']);die();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/detail_ujian', $data);
        $this->load->view('templates/footer');
    }

    public function ubah_ujian($id)
    {
        $data['title'] = 'Ubah Ujian';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['ujian'] = $this->Ujian_model->getUjianById($id);
        $data['matapelajaran'] = $this->db->get('matapelajaran')->result_array();
        $data['kelas'] = $this->db->get('kelas')->result_array();
        // echo json_encode($data);die();

        $this->form_validation->set_rules('idkelas', 'Kelas', 'required');
        $this->form_validation->set_rules('idmatapelajaran', 'Mata Pelajaran', 'required');
        $this->form_validation->set_rules('tanggalujian', 'Tanggal Ujian', 'required');
        $this->form_validation->set_rules('waktumulai', 'Waktu Mulai', 'required');
        $this->form_validation->set_rules('waktuselesai', 'Waktu Selesai', 'required');
        $this->form_validation->set_rules('jenisujian', 'Jenis ujian', 'required');

        if( $this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('guru/ubah_ujian', $data);
            $this->load->view('templates/footer');    
        } else {
            $this->Ujian_model->ubahUjian($id);
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('guru/ujian');
        }
    }

    public function soal($id)
    {
        $data['title'] = 'Soal';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['soal'] = $this->db->get_where('soal', ["idujian" => intval($id)])->result_array();
        $data['idsoal'] = $id;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/soal', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_soal($id)
    {
        $data['title'] = 'Tambah Soal';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['idsoal'] = $id;
        $data['jenissoal'] = $this->db->get_where('ujian', ['id_ujian'=> $id])->row_array();
        // echo json_encode($data['jenissoal']);die();

        $this->form_validation->set_rules('idujian', 'Id Ujian', 'required');
        $this->form_validation->set_rules('jenissoal', 'Jenis Soal', 'required');
        $this->form_validation->set_rules('soal', 'Soal', 'required');
        if($this->input->post('jenissoal') === "Pilihan Ganda") {
            $this->form_validation->set_rules('opsi1', 'Opsi 1', 'required');
            $this->form_validation->set_rules('opsi2', 'Opsi 2', 'required');
            $this->form_validation->set_rules('opsi3', 'Opsi 3', 'required');
            $this->form_validation->set_rules('opsi4', 'Opsi 4', 'required');
            $this->form_validation->set_rules('opsibenar', 'Opsi Benar', 'required');
        }

        if( $this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('guru/tambah_soal', $data);
            $this->load->view('templates/footer');    
        } else {
            $this->Soal_model->tambahSoal();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('guru/soal/'.$this->input->post('idujian'));
        }
    }

    public function hapus_soal($idujian, $id)
    {
        $this->Soal_model->hapusSoal($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('guru/soal/'.$idujian);
    }

    public function detail_soal($id)
    {
        $data['title'] = 'Detail Soal';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['soal'] = $this->Soal_model->getSoalById($id);

        // echo json_encode($data['soal']); die();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/detail_soal', $data);
        $this->load->view('templates/footer');
    }

    public function ubah_soal($id)
    {
        $data['title'] = 'Ubah Soal';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['soal'] = $this->Soal_model->getSoalById($id);

        $this->form_validation->set_rules('idujian', 'Id Ujian', 'required');
        $this->form_validation->set_rules('jenissoal', 'Jenis Soal', 'required');
        $this->form_validation->set_rules('soal', 'Soal', 'required');
        if($this->input->post('jenissoal') === "Pilihan Ganda") {
            $this->form_validation->set_rules('opsi1', 'Opsi 1', 'required');
            $this->form_validation->set_rules('opsi2', 'Opsi 2', 'required');
            $this->form_validation->set_rules('opsi3', 'Opsi 3', 'required');
            $this->form_validation->set_rules('opsi4', 'Opsi 4', 'required');
            $this->form_validation->set_rules('opsibenar', 'Opsi Benar', 'required');
        }

        if( $this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('guru/ubah_soal', $data);
            $this->load->view('templates/footer');    
        } else {
            $this->Soal_model->ubahSoal($id);
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('guru/soal/'.$this->input->post('idujian'));
        }
    }

    public function livestream()
    {
        $data['title'] = 'Livestream';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['livestream'] = $this->db->get('livestream')->result_array();
        $data['livestream'] = $this->Livestream_model->getAllLivestream();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/livestream', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_livestream()
    {
        $data['title'] = 'Tambah Livestream';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['matapelajaran'] = $this->db->get('matapelajaran')->result_array();
        $data['kelas'] = $this->db->get('kelas')->result_array();

        $this->form_validation->set_rules('idkelas', 'Kelas', 'required');
        $this->form_validation->set_rules('idmatapelajaran', 'Mata Pelajaran', 'required');
        $this->form_validation->set_rules('waktumulai', 'Waktu Mulai', 'required');
        $this->form_validation->set_rules('waktuselesai', 'Waktu Selesai', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');

        if( $this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('guru/tambah_livestream', $data);
            $this->load->view('templates/footer');    
        } else {
            require_once BASEPATH.'../vendor/autoload.php';

            $client = new Google_Client();
            $client->setAuthConfigFile(BASEPATH.'../client_secret_1073066267756-24gcavdbq16875sal19eefsfd16t8ei4.apps.googleusercontent.com (1).json');
            $client->setRedirectUri("http://localhost/platform/guru/tambah_livestream");
            $client->addScope("email");
            $client->addScope("profile");
            $client->addScope(Google_Service_YouTube::YOUTUBE_FORCE_SSL);
            //$client->setAccessType('offline');
            
            if (!isset($_GET['code'])) {
            $auth_url = $client->createAuthUrl();
            header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
            } else {
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            // echo json_encode($token);die();
            $_SESSION['access_token'] = $token['access_token'];
    
            try {
                if(isset($token['access_token'])){
                    $client->setAccessToken($token['access_token']);							
                    $Oauth = new Google_Service_Oauth2($client);
                    $userInfo = $Oauth->userinfo->get();
                    $_SESSION['data'] = $userInfo;
                }
            } catch (\Exception $e) {
                echo $e->__toString();
    
                $_SESSION['access_token'] = "";
                die;
            }
    
    
            $youtube = new Google_Service_YouTube($client);
    
            $title = $this->input->post('judul');
            $description = "";
            $dateStart = gmdate('Y-m-d\TH:i:s.u\Z');
            $dateEnd = date('Y-m-d\TH:i:s.u\Z', strtotime('+2 hour'));
    
            //untuk memulai live langsung tanpa jadwal
            //$dateStart = date('2023-03-13T00:00:00.000Z');
            //$dateStart = date('2020-08-20T00:00:00.000Z');
    
    
            $broadcastSnippet = new Google_Service_YouTube_LiveBroadcastSnippet();
            $broadcastSnippet->setTitle($title);
            $broadcastSnippet->setDescription($description);
            $broadcastSnippet->setScheduledStartTime($dateStart);
            // $broadcastSnippet->setScheduledEndTime($dateEnd);
    
            $status = new Google_Service_YouTube_LiveBroadcastStatus();
            $status->setPrivacyStatus('public'); //private or public
    
            // Create the API request that inserts the liveBroadcast resource.
            $broadcastInsert = new Google_Service_YouTube_LiveBroadcast();
            $broadcastInsert->setSnippet($broadcastSnippet);
            $broadcastInsert->setStatus($status);
            $broadcastInsert->setKind('youtube#liveBroadcast');
    
    
            $contentDetails = new Google_Service_YouTube_LiveBroadcastContentDetails();
            $contentDetails->setEnableAutoStart(true);
            $contentDetails->setEnableAutoStop(true);
    
            $broadcastInsert->setContentDetails($contentDetails);
    
            // Execute the request and return an object that contains information
            // about the new broadcast.
            $broadcastsResponse = $youtube->liveBroadcasts->insert('snippet,status,contentDetails', $broadcastInsert, array());
    
            // Create an object for the liveStream resource's snippet. Specify a value
            // for the snippet's title.
            $streamSnippet = new Google_Service_YouTube_LiveStreamSnippet();
            $streamSnippet->setTitle($title.' Stream');
    
            // Create an object for content distribution network details for the live
            // stream and specify the stream's format and ingestion type.
            $cdn = new Google_Service_YouTube_CdnSettings();
            $cdn->setResolution("360p");
            $cdn->setFrameRate("30fps");
            $cdn->setFormat("1080p");
            $cdn->setIngestionType('rtmp');
    
            // Create the API request that inserts the liveStream resource.
            $streamInsert = new Google_Service_YouTube_LiveStream();
            $streamInsert->setSnippet($streamSnippet);
            $streamInsert->setCdn($cdn);
            $streamInsert->setKind('youtube#liveStream');
    
            // Execute the request and return an object that contains information
            // about the new stream.
            $streamsResponse = $youtube->liveStreams->insert('snippet,cdn', $streamInsert, array());
    
            $bindBroadcastResponse = $youtube->liveBroadcasts->bind(
                $broadcastsResponse['id'],'id,contentDetails',
                array(
                    'streamId' => $streamsResponse['id'],
                )
            );
    
            $id = $streamsResponse->id;
            $data["rtmp_url"] = $streamsResponse->cdn->ingestionInfo->ingestionAddress;
            $data["key_stream"] = $streamsResponse->cdn->ingestionInfo->streamName;
            $embedVideo = $broadcastsResponse["contentDetails"]["monitorStream"]["embedHtml"];
            $this->Livestream_model->tambahLivestream($embedVideo);
            $this->session->set_flashdata('flash', 'Ditambahkan, URL: '.$data["rtmp_url"]." - Token: ".$data["key_stream"]);
            redirect('guru/livestream');
        }
        }
    }

    public function hapus_livestream($id)
    {
        $this->Livestream_model->hapusLivestream($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('guru/livestream');
    }

    public function detail_livestream($id)
    {
        $data['title'] = 'Detail Livestream';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['livestream'] = $this->Livestream_model->getLivestreamById($id);
        // $data["mapel"] = $this->db->get_where('matapelajaran', ['id' => $data["livestream"]["idmatapelajaran"]])->row_array();
        // echo json_encode($data['livestream']);die();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/detail_livestream', $data);
        $this->load->view('templates/footer');
    }

    public function ubah_livestream($id)
    {
        $data['title'] = 'Ubah Livestream';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['livestream'] = $this->Livestream_model->getLivestreamById($id);
        $data['livestream'] = $this->Livestream_model->getAllLivestream($id);
        $data['livestream'] = $this->db->get('livestream')->result_array();
        $data['kelas'] = $this->db->get('kelas')->result_array();
        // echo json_encode($data);die();

        $this->form_validation->set_rules('idkelas', 'Kelas', 'required');
        $this->form_validation->set_rules('idmatapelajaran', 'Mata Pelajaran', 'required');
        $this->form_validation->set_rules('waktumulai', 'Waktu Mulai', 'required');
        $this->form_validation->set_rules('waktuselesai', 'Waktu Selesai', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');

        if( $this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('guru/ubah_livestream', $data);
            $this->load->view('templates/footer');    
        } else {
            $this->Livestream_model->ubahLivestream($id);
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('guru/livestream');
        }
    }

    public function kelas()
    {
        $data['title'] = 'Kelas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kelas'] = $this->Kelas_model->getAllKelas();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/kelas', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_kelas()
    {
        $data['title'] = 'Tambah Kelas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kelas'] = $this->db->get('kelas')->result_array();

        $this->form_validation->set_rules('namakelas', 'Kelas', 'required');

        if( $this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('guru/tambah_kelas', $data);
            $this->load->view('templates/footer');    
        } else {
            $this->Kelas_model->tambahKelas();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('guru/kelas');
        }
    }

    public function hapus_kelas($id)
    {
        $this->Kelas_model->hapusKelas($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('guru/kelas');
    }

    public function detail_kelas($id)
    {
        $data['title'] = 'Detail Kelas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kelas'] = $this->Kelas_model->getKelasById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/detail_kelas', $data);
        $this->load->view('templates/footer');
    }

    public function ubah_kelas($id)
    {
        $data['title'] = 'Ubah Kelas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kelas'] = $this->Kelas_model->getKelasById($id);
        // $data['kelas'] = $this->db->get('kelas')->result_array();
        // echo json_encode($data['kelas']);die();

        $this->form_validation->set_rules('namakelas', 'Kelas', 'required');

        if( $this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('guru/ubah_kelas', $data);
            $this->load->view('templates/footer');    
        } else {
            $this->Kelas_model->ubahKelas($id);
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('guru/kelas');
        }
    }

    public function tugas()
    {
        $data['title'] = 'Tugas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['tugas'] = $this->db->get()->result_array();
        $data['tugas'] = $this->Tugas_model->getAllTugas();
        // echo json_encode($data);die();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/tugas', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_tugas()
    {
        $data['title'] = 'Tambah Tugas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['matapelajaran'] = $this->db->get('matapelajaran')->result_array();
        $data['kelas'] = $this->db->get('kelas')->result_array();
        // echo json_encode($data);die();

        $this->form_validation->set_rules('idkelas', 'Kelas', 'required');
        $this->form_validation->set_rules('idmatapelajaran', 'Mata Pelajaran', 'required');
        $this->form_validation->set_rules('judul_tugas', 'Judul Tugas', 'required');
        $this->form_validation->set_rules('jenis_tugas', 'Jenis Tugas', 'required');
        $this->form_validation->set_rules('deskripsi_tugas', 'Deskripsi Tugas', 'required');
        // $this->form_validation->set_rules('upload_tugas', 'Unggah Tugas', 'required');

        if( $this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('guru/tambah_tugas', $data);
            $this->load->view('templates/footer');    
        } else {
            $config['upload_path']          = './upload_tugas/';
            $config['allowed_types']        = 'gif|jpg|png|pdf';
            $config['max_size']             = 100000000;
            $config['max_width']            = 10000;
            $config['max_height']           = 10000;

            $this->load->library('upload', $config);
            
            if ( ! $this->upload->do_upload('upload_tugas'))
            {
                // $error = array('error' => $this->upload->display_errors());
                
                // $this->load->view('upload_form', $error);
                echo json_encode($this->upload->display_errors());die();
            } else {
                // $data = array('upload_data' => $this->upload->data());

                // $this->load->view('upload_success', $data);
                $upload_tugas = $this->upload->data();
                $data["upload"] = $upload_tugas;
                $upload_tugas = $upload_tugas['file_name'];
                // echo json_encode($data);die();
                $this->Tugas_model->tambahTugas($upload_tugas);
                $this->session->set_flashdata('flash', 'Ditambahkan');
                redirect('guru/tugas');
            }
            
        }
    }

    public function hapus_tugas($id)
    {
        $tugas = $this->Tugas_model->getTugasById($id);
        unlink('./upload_tugas/'.$tugas["detail"]["upload_tugas"]);
        $this->Tugas_model->hapusTugas($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('guru/tugas');
    }

    public function detail_tugas($id)
    {
        $data['title'] = 'Detail Tugas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['tugas'] = $this->Tugas_model->getTugasById($id);

        $data['tugas'] = $this->Tugas_model->getAllTugas($id);
        $data['jawaban'] =  $this->JawabanTugas_model->getAll($id);
        // echo json_encode($data);die();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/detail_tugas', $data);
        $this->load->view('templates/footer');
    }

    public function ubah_tugas($id)
    {
        $data['title'] = 'Ubah Tugas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $data['tugas'] = $this->Tugas_model->getTugasById($id);
        $data['matapelajaran'] = $this->db->get('matapelajaran')->result_array();
        $data['kelas'] = $this->db->get('kelas')->result_array();
        // echo json_encode($data);die();

        $this->form_validation->set_rules('idkelas', 'Kelas', 'required');
        $this->form_validation->set_rules('idmatapelajaran', 'Mata Pelajaran', 'required');
        $this->form_validation->set_rules('judul_tugas', 'Judul Tugas', 'required');
        $this->form_validation->set_rules('jenis_tugas', 'Jenis Tugas', 'required');
        $this->form_validation->set_rules('deskripsi_tugas', 'Deskripsi Tugas', 'required');

		// echo json_encode($data['tugas']);die();

        if( $this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('guru/ubah_tugas', $data);
            $this->load->view('templates/footer');    
        } else {
            $this->Tugas_model->ubahTugas($id);
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('guru/tugas');
        }
    }

    private function nilai_siswa($idsiswa, $idujian) {
        $query = $this->Soal_model->getNilai($idsiswa, $idujian);
        // echo json_encode($query);die();
        if($query === false) {
            return false;
        }
        
        $nilai = ( count($query['jawaban_benar']) / count($query['soal']) ) * 100;

        return $nilai;
    }

    public function listSiswa() {
        $data["title"] = "Daftar Siswa";
        $data["user"] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data["siswa"] = $this->DataSiswa_model->getAllSiswa();
        // echo json_encode($data);die();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/list_siswa', $data);
        $this->load->view('templates/footer');    
    }

    public function assignClass($idsiswa) {
        $data["title"] = "Tambah Kelas Siswa";
        $data["user"] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data["siswa"] = $this->DataSiswa_model->getUserById($idsiswa);

        $this->form_validation->set_rules('idkelas', 'ID Kelas', 'required');
        if($this->form_validation->run() == false) {
            $data["kelas"] = $this->Kelas_model->getAllKelas();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('guru/ubahkelassiswa', $data);
            $this->load->view('templates/footer');   
        } else {
            $this->DataSiswa_model->ubahKelasSiswa($data["siswa"]["id"], $this->input->post('idkelas', true));
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('guru/listSiswa');
        }
    }
    

}
