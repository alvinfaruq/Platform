<?php 

class UploadJawabanTugas_model extends CI_Model{

    public function getAllJawabanTugas($id = NULL) {
        $this->db->select('*');
        $this->db->from('tugas_jawaban a');
        $this->db->join('user b', 'b.id=a.iduser');
        $this->db->join('tugas c', 'c.id_tugas=a.idtugas');

        if ($id !== NULL) {
            $this->db->where('a.idtugas', $id);
        }
    
        $query = $this->db->get();
    
        if ($id !== NULL) {
            return $query->row_array(); // Return a single row if id is provided
        } else {
            return $query->result_array(); // Return multiple rows if id is not provided
        }
        
    }

    public function uploadJawabanTugas($idtugas, $iduser, $file) {
        $id = $this->db->insert_id();
        
        $data = [
            "id_jawaban_tugas" => $id,
            "iduser" => intval($iduser),
            "idtugas" => intval($idtugas),
            "upload_jawaban_tugas" => $file
        ];

        $this->db->insert('tugas_jawaban', $data);
    }
}

?>
