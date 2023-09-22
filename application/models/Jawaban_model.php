<?php 

class Jawaban_model extends CI_Model{
    public function insert($idsoal, $idsiswa, $jawaban, $isbenar, $nilai) {
        $data = [
            "idsoal" => intval($idsoal),
            "idsiswa" => intval($idsiswa),
            "jawaban" => $jawaban,
            "isbenar" => intval($isbenar),
            "nilai" => floatval($nilai)
        ];    
        if(count($this->get($idsoal, $idsiswa)) > 0) {
            return $this->db->update('soal_jawaban', $data, ["idsoal" => $idsoal, "idsiswa" => $idsiswa]);
        }
          
        return $this->db->insert('soal_jawaban', $data);
    }

    public function get($idsoal, $idsiswa) {
        $this->db->select('*');
        $this->db->from('soal_jawaban');
        $this->db->where("idsoal", $idsoal);
        $this->db->where("idsiswa", $idsiswa);
        return $this->db->get()->result_array();
    }
}