<?php 

class DataGuru_model extends CI_Model{
    public function getAllUser()
    {
        return $this->db->get('user')->result_array();
    }

    public function tambahDataGuru()
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

    public function hapusDataGuru($id)
    {
        $this->db->delete('user', ['id' => $id]);
    }

    public function getUserById($id)
    {
        return $this->db->get_where('user', array ('id' => $id))->row_array();
    }

    public function ubahDataGuru($id) {
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
}

?>