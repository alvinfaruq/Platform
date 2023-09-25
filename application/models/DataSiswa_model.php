<?php 

class DataSiswa_model extends CI_Model{
    public function getAllUser()
    {
        return $this->db->get_where('user')->result_array();
        
    }

    public function getAllSiswa()
    {
        $siswa = $this->db->get_where('user', ['role_id'=> 3, 'is_active' => 1])->result_array();
        
        for($i = 0; $i < count($siswa); ++$i) {
            $siswa[$i]["kelas"] = $this->db->get_where('kelas', ['idkelas' => $siswa[$i]['idkelas']], 1)->row_array();
            // $s["test"] = "true";
        }
        return $siswa;
    }

    public function tambahDataSiswa()
    {
        $data = [
            "number" => $this->input->post('number', true),
            "name" => $this->input->post('name', true),
            "email" => $this->input->post('email', true),
            "image" => $this->input->post('image', true),
            "password" => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
            "role_id" => $this->input->post('role_id', true),
            "is_active" => $this->input->post('is_active', true),
            "date_created" => $this->input->post('date_created', true)
        ];

        $this->db->insert('user', $data);
    }

    public function hapusDataSiswa($id)
    {
        $this->db->delete('user', ['id' => $id]);
    }

    public function getUserById($id)
    {
        return $this->db->get_where('user', array ('id' => $id))->row_array();
    }

    public function ubahDataSiswa($id) {
        $data = [
            "number" => $this->input->post('number', true),
            "name" => $this->input->post('name', true),
            "email" => $this->input->post('email', true),
            "image" => $this->input->post('image', true),
            "role_id" => $this->input->post('role_id', true),
            "is_active" => $this->input->post('is_active', true),
        ];

        $this->db->update('user', $data, ['id' => $id]);
    }

    public function ubahKelasSiswa($idsiswa, $idkelas) {
        return $this->db->update('user', ["idkelas" => $idkelas], ["id" => $idsiswa]);
    }
}

?>