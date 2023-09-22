<?php 

class JawabanTugas_model extends CI_Model{
    public function insert($idtugas, $idsiswa, $jawaban, $isbenar, $nilai) {
        $data = [
            "idtugas" => intval($idtugas),
            "idsiswa" => intval($idsiswa),
            "jawaban" => $jawaban,
            "isbenar" => intval($isbenar),
            "nilai" => floatval($nilai)
        ];    
        if(count($this->get($idtugas, $idsiswa)) > 0) {
            return $this->db->update('tugas_jawaban', $data, ["idtugas" => $idtugas, "idsiswa" => $idsiswa]);
        }
          
        return $this->db->insert('tugas_jawaban', $data);
    }

    public function get($idtugas, $idsiswa) {
        $this->db->select('*');
        $this->db->from('tugas_jawaban');
        $this->db->where("idtugas", $idtugas);
        $this->db->where("idsiswa", $idsiswa);
        return $this->db->get()->result_array();
    }

    public function getAll($idtugas) {
        $this->db->select('*');
        $this->db->from('tugas_jawaban');
        $this->db->where("idtugas", $idtugas);
        // $this->db->group_by('idsiswa');
        // $q = $this->db->where("isbenar", 1);
        $ret = $this->db->get()->result_array();

        $ans = array();
        foreach($ret as $r) {
            if(!array_key_exists($r['idsiswa'], $ans)){
                $this->db->select('id, number, name');
                $this->db->from('user');
                $this->db->where('id', $r['idsiswa']);
                $s = $this->db->get()->result();
                $ans[$r['idsiswa']] = [
                    "siswa" => $s[0],
                    "jawaban" => [],
                    // "nilai" => $q
                ];
                
            }
                
            array_push($ans[$r['idsiswa']]["jawaban"], $r);
        }
        return $ans;
    }
}