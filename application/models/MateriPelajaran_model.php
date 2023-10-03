<?php 

class MateriPelajaran_model extends CI_Model{
    public function getAllMateri($id = NULL)
    {
        // return $this->db->get('materipelajaran')->result_array();
        $this->db->select('*');
        $this->db->from('materipelajaran a'); 
        if($this->session->userdata('role_id') == 3) $this->db->where('a.idkelas', $this->session->userdata('kelas'));
        $this->db->join('matapelajaran b', 'b.id=a.idmatapelajaran');
        $this->db->join('kelas c', 'c.idkelas=a.idkelas');
        $this->db->join('materipelajaran_detail d', 'd.idmateripelajaran=a.id');
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

    public function tambahMateriPelajaran($file)
    {
        $data = [
            "idkelas" => $this->input->post('idkelas', true),
            "idmatapelajaran" => $this->input->post('idmatapelajaran', true),
            "judul" => $this->input->post('judul', true),
        ];

        $this->db->insert('materipelajaran', $data);
		$id = $this->db->insert_id();
		
		$data2 = [
			"idmateripelajaran" => $id,
            "materi" => $this->input->post('materi', true),
            "upload_materi" => $file
        ];

        $this->db->insert('materipelajaran_detail', $data2);
    }

    public function hapusMateriPelajaran($id)
    {
        $this->db->delete('materipelajaran', ['id' => $id]);
    }

    public function getMateriById($id)
    {
        $detail=$this->db->get_where('materipelajaran_detail', array ('idmateripelajaran' => intval($id)))->row_array();
        if(!$detail) {
			$detail = array (
                "materi" => "",
                "upload_materi" => "",
            );
		}
		$matpel=$this->db->get_where('materipelajaran', array ('id' => $id))->row_array();
        $mapel=$this->db->get_where('matapelajaran', array ('id' => $matpel["idmatapelajaran"]))->row_array();
        return array (
            'detail'=>$detail, 
            'matpel'=>$matpel,
            'mapel' => $mapel
        );
    }

    public function ubahMateriPelajaran($id, $file) {
        $data = [
            "idkelas" => $this->input->post('idkelas', true),
            "idmatapelajaran" => $this->input->post('idmatapelajaran', true),
            "judul" => $this->input->post('judul', true),
        ];

        $this->db->update('materipelajaran', $data, ['id' => $id]);

        $data2 = [
            "materi" => $this->input->post('materi', true),
            // "upload_materi" => $this->input->post($file, true)
            "upload_materi" => $file
        ];

        $this->db->update('materipelajaran_detail', $data2, ['idmateripelajaran' => $id]);

    }

}

?>  
