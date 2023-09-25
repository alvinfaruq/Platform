<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MataPelajaran_model');
        $this->load->model('MateriPelajaran_model');
        $this->load->model('Jawaban_model');
        $this->load->model('JawabanTugas_model');
        $this->load->model('Ujian_model');
        $this->load->model('Soal_model');
        $this->load->model('Livestream_model');
        $this->load->model('Kelas_model');
        $this->load->model('DataSiswa_model');
        $this->load->model('Tugas_model');
        $this->load->library('form_validation');
    }
    
    public function index()
    {
        $data['title'] = 'My Profile Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user']['kelas'] = $this->db->get_where('kelas', ['idkelas' => $data['user']['idkelas']])->row_array();
        // echo json_encode($data['user']);die();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/index', $data);
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
        $this->load->view('siswa/mata_pelajaran', $data);
        $this->load->view('templates/footer');
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
        $this->load->view('siswa/materi_pelajaran', $data);
        $this->load->view('templates/footer');
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
        $this->load->view('siswa/detail_materi_pelajaran', $data);
        $this->load->view('templates/footer');
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
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/detail_ujian', $data);
        $this->load->view('templates/footer');
    }

    public function soal($id, $nomor = 1)
    {
        $data['title'] = 'Soal';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['soal'] = $this->db->get_where('soal', ["idujian" => intval($id)])->result_array();
        $data['all_soal'] = $this->Soal_model->getAllSoalSiswa($id);

        $order = $this->Soal_model->getUrutan($data['user']['id'], $data['all_soal'][0]['idujian']);
        // echo count($order);die();
        if(count($order) === 0) {
            $order = $this->Soal_model->generateUrutan($data['all_soal'], $data['user']['id'], $data['all_soal'][0]['idujian']);
            
            $order = $this->Soal_model->getUrutan($data['user']['id'], $data['all_soal'][0]['idujian']);
        }
        // echo (json_encode($data));die();

        $data['all_soal'] = json_decode($order[0]["urutan"]);
        

        if($nomor > count($data['all_soal'])) {
            redirect(base_url("siswa/soal/$id/1"));
        }

        $ujian = $this->Ujian_model->getUjianById($id);

        date_default_timezone_set('Asia/Jakarta');
        if(strtotime(date('Y-m-d H:i:s')) < strtotime($ujian["waktumulai"])) {
            echo "Ujian belum dimulai";
            die();
        }
        // echo json_encode($ujian);
        // echo json_encode((date('Y-m-d H:i:s'))); die();

        $data['soal'] = $this->Soal_model->getSoalSiswa($id, $this->session->userdata("id"), $nomor-1);
        $data['soal']['nomor'] = $nomor;
        $data['jawaban'] = $this->Jawaban_model->get($data['soal']['id'], $this->session->userdata("id"));
        if(count($data['jawaban']) > 0) {
            $data['jawaban'] = $data['jawaban'][0]["jawaban"];
        }

        // echo json_encode($data['soal']);die();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/soal', $data);
        $this->load->view('templates/footer');
    }

    public function submitAnswer($id, $nomor)
    {
        $ujian = $this->Ujian_model->getUjianById($id);
        if(strtotime(date('Y-m-d H:i:s')) > strtotime($ujian["waktuselesai"])) {
            echo "Ujian berakhir";
            die();
        }
        $soal = $this->Soal_model->getSoalSiswa($id, $this->session->userdata('id'), $nomor-1);
        $request = $this->input->post();
        $key = "";
        $isbenar = -1;
        $score = 0;

        // echo json_encode([strtotime(date('Y-m-d h:i:s')), strtotime($ujian["waktuselesai"])]);die();

        if($soal['jenissoal'] === 'Esai') {
            if($this->Jawaban_model->insert($soal['id'], $this->session->userdata("id"), $request['jawaban'], 0, 0)) {
                redirect(base_url("siswa/soal/".$soal['idujian']."/".$soal[$nomor+1]));
            }
        } else {
            if(array_key_exists("jawaban", $request) && $request['jawaban'] === "opsi1") {
                $key = 'opsi1';
                if($soal['opsi1'] === $soal['opsibenar']) {
                    $isbenar = 1;
                    $score = 1;
                }
            } else if(array_key_exists("jawaban", $request) && $request['jawaban'] === "opsi2") {
                $key = 'opsi2';
                if($soal['opsi2'] === $soal['opsibenar']) {
                    $isbenar = 1;
                    $score = 1;
                }
            } else if(array_key_exists("jawaban", $request) && $request['jawaban'] === "opsi3") {
                $key = 'opsi3';
                if($soal['opsi3'] === $soal['opsibenar']) {
                    $isbenar = 1;
                    $score = 1;
                }
            } else if(array_key_exists("jawaban", $request) && $request['jawaban'] === "opsi4") {
                $key = 'opsi4';
                if($soal['opsi4'] === $soal['opsibenar']) {
                    $isbenar = 1;
                    $score = 1;
                }
            } else return false;

            if($key !== "") {
                if($this->Jawaban_model->insert($soal['id'], $this->session->userdata("id"), $key, $isbenar, $score))
                    redirect(base_url("siswa/soal/".$soal['idujian']."/".($nomor+1)));

            } else return false;
        }
    }

    public function livestream()
    {
        $data['title'] = 'Live Stream';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['livestream'] = $this->db->get('livestream')->result_array();
        $data['livestream'] = $this->Livestream_model->getAllLivestream();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/livestream', $data);
        $this->load->view('templates/footer');
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
        $this->load->view('siswa/detail_livestream', $data);
        $this->load->view('templates/footer');
    }

    public function kelas()
    {
        $data['title'] = 'Kelas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kelas'] = $this->Kelas_model->getAllKelas();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/kelas', $data);
        $this->load->view('templates/footer');
    }

    public function detail_kelas($id)
    {
        $data['title'] = 'Detail Kelas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kelas'] = $this->Kelas_model->getKelasById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/detail_kelas', $data);
        $this->load->view('templates/footer');
    }

    public function tugas()
    {
        $data['title'] = 'Tugas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['tugas'] = $this->db->get('tugas')->result_array();
        $data['tugas'] = $this->Tugas_model->getAllTugas();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/tugas', $data);
        $this->load->view('templates/footer');
    }

    public function detail_tugas($id)
    {
        $data['title'] = 'Detail Tugas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['tugas'] = $this->Tugas_model->getTugasById($id);

        $data['tugas'] = $this->Tugas_model->getAllTugas($id);
        // echo json_encode($data);die();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/detail_tugas', $data);
        $this->load->view('templates/footer');
    }

    public function submitAnswerTugas($id, $nomor)
    {
        $soal = $this->SoalTugas_model->getSoalSiswa($id, $nomor-1)[$nomor-1];
        $request = $this->input->post();
        $key = "";
        $isbenar = -1;
        $score = 0;

        // echo json_encode($soal);die();

        if($soal['jenissoal'] === 'Esai') {
            if($this->JawabanTugas_model->insert($soal['id'], $this->session->userdata("id"), $request['jawaban'], 0, 0)) {
                redirect(base_url("siswa/soaltugas/".$soal['idtugas']."/".$nomor+1));
            }
        } else {
            if(array_key_exists("opsi1", $request) && $request["opsi1"] == "on") {
                $key = 'opsi1';
                if($soal['opsi1'] === $soal['opsibenar']) {
                    $isbenar = 1;
                    $score = 1;
                }
            } else if(array_key_exists("opsi2", $request) && $request["opsi2"] == "on") {
                $key = 'opsi2';
                if($soal['opsi2'] === $soal['opsibenar']) {
                    $isbenar = 1;
                    $score = 1;
                }
            } else if(array_key_exists("opsi3", $request) && $request["opsi3"] == "on") {
                $key = 'opsi3';
                if($soal['opsi3'] === $soal['opsibenar']) {
                    $isbenar = 1;
                    $score = 1;
                }
            } else if(array_key_exists("opsi4", $request) && $request["opsi4"] == "on") {
                $key = 'opsi4';
                if($soal['opsi4'] === $soal['opsibenar']) {
                    $isbenar = 1;
                    $score = 1;
                }
            } else return false;

            if($key !== "") {
                if($this->JawabanTugas_model->insert($soal['id'], $this->session->userdata("id"), $key, $isbenar, $score))
                    redirect(base_url("siswa/soaltugas/".$id."/".($nomor+1)));

            } else return false;
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

    
}
