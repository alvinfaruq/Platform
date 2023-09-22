<?php 

class Ujian_model extends CI_Model{
    public function getAllUjian()
    {
        $this->db->select('*');
        $this->db->from('ujian a'); 
        $this->db->join("matapelajaran", "a.idmatapelajaran=matapelajaran.id");
        $this->db->join("kelas c", "c.idkelas=a.idkelas");
        $query = $this->db->get ();
        return $query->result_array();
    }

    public function tambahUjian()
    {
        $data = [
            "idkelas" => $this->input->post('idkelas', true),
            "idmatapelajaran" => $this->input->post('idmatapelajaran', true),
            "tanggalujian" => $this->input->post('tanggalujian', true),
            "waktumulai" => $this->input->post('waktumulai', true),
            "waktuselesai" => $this->input->post('waktuselesai', true),
            "jenisujian" => $this->input->post('jenisujian', true),
        ];

        $this->db->insert('ujian', $data);
    }

    public function hapusUjian($id)
    {
        $this->db->delete('ujian', ['id_ujian' => $id]);
    }

    public function getUjianById($id)
    {
        return $this->db->get_where('ujian', array ('id_ujian' => $id))->row_array();
    }

    public function ubahUjian($id) {
        $data = [
            "idkelas" => $this->input->post('idkelas', true),
            "idmatapelajaran" => $this->input->post('idmatapelajaran', true),
            "tanggalujian" => $this->input->post('tanggalujian', true),
            "waktumulai" => $this->input->post('waktumulai', true),
            "waktuselesai" => $this->input->post('waktuselesai', true),
            "jenisujian" => $this->input->post('jenisujian', true),
        ];

        $this->db->update('ujian', $data, ['id_ujian' => $id]);
    }

}

?>  