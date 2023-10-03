<?php 

class MataPelajaran_model extends CI_Model{
    public function getAllMataPelajaran(){
        $this->db->select('*');
        $this->db->from('matapelajaran a'); 
        // if($this->session->userdata('role_id') == 3) $this->db->where('a.idkelas', $this->session->userdata('kelas'));
        $this->db->join('kelas b', 'b.idkelas=a.idkelas');
        $query = $this->db->get ();
        return $query->result_array();
    }
    
    public function getAllMapel($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('matapelajaran a'); 
        if($this->session->userdata('role_id') == 3) $this->db->where('a.idkelas', $this->session->userdata('kelas'));
        $this->db->join('kelas b', 'b.idkelas=a.idkelas');
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

    public function tambahMataPelajaran()
    {
        $data = [
            "idkelas" => $this->input->post('idkelas', true),
            "nama" => $this->input->post('nama', true),
            "deskripsi" => $this->input->post('deskripsi', true),
        ];

        $this->db->insert('matapelajaran', $data);
    }

    public function hapusMataPelajaran($id)
    {
        $this->db->delete('matapelajaran', ['id' => $id]);
    }

    public function getMapelById($id)
    {
        return $this->db->get_where('matapelajaran', array ('id' => $id))->row_array();
    }

    public function ubahMataPelajaran($id) {
        $data = [
            "idkelas" => $this->input->post('idkelas', true),
            "nama" => $this->input->post('nama', true),
            "deskripsi" => $this->input->post('deskripsi', true),
        ];

        $this->db->update('matapelajaran', $data, ['id' => $id]);
    }

}

?>  