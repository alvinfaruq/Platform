<?php 

class Soal_model extends CI_Model{
    public function getAllSoal()
    {
        return $this->db->get('soal')->result_array();
    }

    public function getUrutan($idsiswa, $idujian)
    {
        return $this->db->get_where('urutan_soal', ['idsiswa' => $idsiswa, 'idujian' => $idujian])->result_array();
    }

    public function generateUrutan(array $soal, $idsiswa, $idujian) {
        $count = count($soal);
        $retVal = array();
        $ind = array();
        $index = 0;

        for ($i = 0; $i < $count; ++$i)
            $ind[$i] = 0;

        for ($i = 0; $i < $count; ++$i)
        {
            do
            {
                $index = rand() % $count;
            } while ($ind[$index] != 0);

            $ind[$index] = 1;
            $retVal[$i] = $soal[$index];
        }

        $data = [
            "idsiswa" => $idsiswa,
            "idujian" => $idujian,
            "urutan" => json_encode($retVal)
        ];
        $this->db->insert('urutan_soal', $data);

        return $retVal;
    }

    public function tambahSoal()
    {
        $data = [
            "idujian" => $this->input->post('idujian', true),
            "jenissoal" => $this->input->post('jenissoal', true),
            "soal" => $this->input->post('soal', true),
        ];

        $this->db->insert('soal', $data);
		$id = $this->db->insert_id();

        $data2 = [
            "idsoal" => $id,
            "opsi1" => $this->input->post('opsi1', true),
            "opsi2" => $this->input->post('opsi2', true),
            "opsi3" => $this->input->post('opsi3', true),
            "opsi4" => $this->input->post('opsi4', true),
            "opsibenar" => $this->input->post('opsibenar', true),
        ];

        $this->db->insert('soal_detail', $data2);
    }

    public function hapusSoal($id)
    {
        $this->db->delete('soal', ['id' => $id]);
    }

    public function getSoalById($id)
    {
        $detail=$this->db->get_where('soal_detail', array ('idsoal' => intval($id)))->row_array();
        if(!$detail) {
			$detail = array(
                "opsi1" => "",
                "opsi2" => "",
                "opsi3" => "",
                "opsi4" => "",
                "opsibenar" => "",
            );
		}
		$soalujian=$this->db->get_where('soal', array ('id' => $id))->row_array();
        return array (
            'detail'=>$detail, 
            'soalujian'=>$soalujian,
        );
    }

    public function ubahSoal($id) {
        $data = [
            "idujian" => $this->input->post('idujian', true),
            "jenissoal" => $this->input->post('jenissoal', true),
            "soal" => $this->input->post('soal', true),
        ];

        $this->db->update('soal', $data, ['id' => $id]);
        // $id = $this->db->insert_id();

        $data2 = [
            "opsi1" => $this->input->post('opsi1', true),
            "opsi2" => $this->input->post('opsi2', true),
            "opsi3" => $this->input->post('opsi3', true),
            "opsi4" => $this->input->post('opsi4', true),
            "opsibenar" => $this->input->post('opsibenar', true),
        ];
        // echo json_encode($data2);die();

        $this->db->update('soal_detail', $data2, ['idsoal' => $id]);
    }

    function getSoalSiswa($id, $idsiswa, $nomor = 0){
        $this->db->select('*');
        $this->db->from('urutan_soal a'); 
        // $this->db->join('soal_detail b', 'b.idsoal=a.id');
        $this->db->where('a.idujian',$id);
        $this->db->where('a.idsiswa',$idsiswa);
        $soal = $this->db->get ();
        // echo json_encode($idsiswa); die();
        $soal = $soal->result_array()[0];
        $urutan = json_decode($soal["urutan"], true);
        // echo json_encode($urutan); die();
        for($i = 0; $i < count($urutan); ++$i) {
            
            $urutan[$i]["detail"] = $this->db->get_where('soal_detail', ['idsoal' => $urutan[$i]['id']])->result_array();
        }

        // echo json_encode($urutan); die();
        return $urutan[$nomor];
    }

    function getAllSoalSiswa($id){
        $this->db->select('*');
        $this->db->from('soal'); 
        $this->db->where('soal.idujian',$id);
        $query = $this->db->get ();
        return $query->result_array();
    }

    function getNilai($idsiswa, $idujian) {
        $this->db->select('*');
        $this->db->from('soal_jawaban');
        $this->db->join('soal', 'soal_jawaban.idsoal = soal.id');
        $this->db->where('idsiswa', $idsiswa);
        $this->db->where('idujian', $idujian);
        $queryAttendance = $this->db->get();
        if(count($queryAttendance->result_array()) === 0) {
            // echo json_encode([$queryAttendance->result_array(), $idsiswa, $idujian]);die();
            return false;
        }
        
        $this->db->select('*');
        $this->db->from('soal_jawaban');
        $this->db->join('soal', 'soal_jawaban.idsoal = soal.id');
        $this->db->where('idsiswa', $idsiswa);
        $this->db->where('idujian', $idujian);
        $this->db->where('isbenar', 1);

        $query = $this->db->get();

        $this->db->select('*');
        $this->db->from('soal');
        $this->db->where('idujian', $idujian);
        $querySoal = $this->db->get();
        return [
            "soal" => $querySoal->result_array(),
            "jawaban_benar" => $query->result_array()
        ];
        
    }

}

?>  
