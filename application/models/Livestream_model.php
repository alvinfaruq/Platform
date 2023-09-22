<?php 

class Livestream_model extends CI_Model{
    public function getAllLivestream()
    {
        // return $this->db->get('livestream')->result_array();
        $this->db->select('*');
        $this->db->from('livestream a'); 
        $this->db->join('matapelajaran b', 'b.id=a.idmatapelajaran');
        $query = $this->db->get ();
        return $query->result_array();
    }

    public function tambahLivestream($video)
    {
        $data = [
            "idmatapelajaran" => $this->input->post('idmatapelajaran', true),
            "waktumulai" => $this->input->post('waktumulai', true),
            "waktuselesai" => $this->input->post('waktuselesai', true),
            "judul" => $video,
        ];

        $this->db->insert('livestream', $data);
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
            "idmatapelajaran" => $this->input->post('idmatapelajaran', true),
            "waktumulai" => $this->input->post('waktumulai', true),
            "waktuselesai" => $this->input->post('waktuselesai', true),
            "judul" => $this->input->post('judul', true),
        ];

        $this->db->update('livestream', $data, ['id_livestream' => $id]);
    }

}

?>  