<?php 

class Kelas_model extends CI_Model{
    public function getAllKelas()
    {
        return $this->db->get('kelas')->result_array();
    }

    public function tambahKelas()
    {
        $data = [
            "namakelas" => $this->input->post('namakelas', true),
        ];

        $this->db->insert('kelas', $data);
    }

    public function hapusKelas($id)
    {
        $this->db->delete('kelas', ['idkelas' => $id]);
    }

    public function getKelasById($id)
    {
        return $this->db->get_where('kelas', array ('idkelas' => $id))->row_array();
    }

    public function ubahKelas($id) {
        $data = [
            "namakelas" => $this->input->post('namakelas', true),
        ];

        $this->db->update('kelas', $data, ['idkelas' => $id]);
    }

}

?>  