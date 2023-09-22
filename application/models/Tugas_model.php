<?php 

class Tugas_model extends CI_Model{
    public function getAllTugas($id = NULL)
    {
        // return $this->db->get('tugas')->result_array();
        $this->db->select('*');
        $this->db->from('tugas a'); 
        $this->db->join('matapelajaran b', 'b.id=a.idmatapelajaran');
        $this->db->join('kelas c', 'c.idkelas=a.idkelas');
        $this->db->join('tugas_detail d', 'd.idtugas=a.id_tugas');
        // $query = $this->db->get ();
        // return $query->result_array();

        if ($id !== NULL) {
            $this->db->where('a.id_tugas', $id);
        }
    
        $query = $this->db->get();
    
        if ($id !== NULL) {
            return $query->row_array(); // Return a single row if id is provided
        } else {
            return $query->result_array(); // Return multiple rows if id is not provided
        }
    }

    public function tambahTugas()
    {
        $data = [
            "idkelas" => $this->input->post('idkelas', true),
            "idmatapelajaran" => $this->input->post('idmatapelajaran', true),
            "judul" => $this->input->post('judul', true),
            "jenistugas" => $this->input->post('jenistugas', true),
        ];

        $this->db->insert('tugas', $data);
		$id = $this->db->insert_id();

        $data2 = [
			"idtugas" => $id,
            "nama_tugas" => $this->input->post('nama_tugas', true),
        ];

        $this->db->insert('tugas_detail', $data2);

    }

    public function hapusTugas($id)
    {
        $this->db->delete('tugas', ['id_tugas' => $id]);
    }

    public function getTugasById($id)
    {
        $detail=$this->db->get_where('tugas_detail', array ('idtugas' => intval($id)))->row_array();
        if(!$detail) {
			$detail = array (
                "nama" => "",
            );
		}
		$tgs=$this->db->get_where('tugas', array ('id_tugas' => $id))->row_array();
        return array (
            'detail'=>$detail, 
            'tgs'=>$tgs,
            'matapelajaran' => $this->db->get_where('matapelajaran', ['id' => $tgs['idmatapelajaran']])->row_array()
        );
    }

    public function ubahTugas($id) {
        $data = [
            "idkelas" => $this->input->post('idkelas', true),
            "idmatapelajaran" => $this->input->post('idmatapelajaran', true),
            "judul" => $this->input->post('judul', true),
            "jenistugas" => $this->input->post('jenistugas', true),
        ];

        $this->db->update('tugas', $data, ['id_tugas' => $id]);

        $data2 = [
            "idtugas" => $id,
            "nama_tugas" => $this->input->post('nama_tugas', true),
        ];
        // echo json_encode($data2);die();

        $this->db->update('tugas_detail', $data2, ['idtugas' => $id]);

		// echo json_encode([$data, $data2]);die();
    }
}

?>
