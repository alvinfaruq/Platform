<?php 

class Livestream_model extends CI_Model{
    public function getAllLivestream($id = NULL)
    {
        // return $this->db->get('livestream')->result_array();
        $this->db->select('*');
        $this->db->from('livestream a'); 
        if($this->session->userdata('role_id') == 3) $this->db->where('a.idkelas', $this->session->userdata('kelas'));
        $this->db->join('matapelajaran b', 'b.id=a.idmatapelajaran');
        $this->db->join('kelas c', 'c.idkelas=a.idkelas');
        // $query = $this->db->get ();
        // return $query->result_array();

        if ($id !== NULL) {
            $this->db->where('a.id', $id);
        }
    
        $query = $this->db->get();
    
        if ($id !== NULL) {
            return $query->row_array(); // Return a single row if id is provided
        } else {
            return $query->result_array(); // Return multiple rows if id is not provided
        }
    }

    public function tambahLivestream($video)
    {
        $data = [
            "idkelas" => $this->input->post('idkelas', true),
            "idmatapelajaran" => $this->input->post('idmatapelajaran', true),
            "waktumulai" => $this->input->post('waktumulai', true),
            "waktuselesai" => $this->input->post('waktuselesai', true),
            "judul" => $video,
        ];

        $this->db->insert('livestream', $data);
        $id = $this->db->insert_id();
    }

    public function hapusLivestream($id)
    {
        $this->db->delete('livestream', ['id_livestream' => $id]);
    }

    public function getLivestreamById($id)
    {
        // $this->db->get_where('livestream', array ('id_livestream' => $id))->row_array();
        $this->db->select('*');
        $this->db->from('livestream');
        $this->db->where('id_livestream', $id);
        $this->db->join('matapelajaran', 'livestream.idmatapelajaran = matapelajaran.id');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function ubahLivestream($id) {
        $data = [
            "idkelas" => $this->input->post('idkelas', true),
            "idmatapelajaran" => $this->input->post('idmatapelajaran', true),
            "waktumulai" => $this->input->post('waktumulai', true),
            "waktuselesai" => $this->input->post('waktuselesai', true),
            "judul" => $this->input->post('judul', true),
        ];

        $this->db->update('livestream', $data, ['id_livestream' => $id]);
    }

}

?>  