<?php 

class MataPelajaran_model extends CI_Model{
    public function getAllMapel()
    {
        $this->db->select('*');
        $this->db->from('matapelajaran a'); 
        $this->db->join('kelas b', 'b.idkelas=a.idkelas');
        $query = $this->db->get ();
        return $query->result_array();
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