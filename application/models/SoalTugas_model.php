<?php 

class SoalTugas_model extends CI_Model{
    public function getAllSoalTugas()
    {
        return $this->db->get('soal')->result_array();
    }

    public function tambahSoalTugas()
    {
        $data = [
            "idtugas" => $this->input->post('idtugas', true),
            "jenissoal" => $this->input->post('jenissoal', true),
            "soal" => $this->input->post('soal', true),
        ];

        $this->db->insert('soaltugas', $data);
		$id = $this->db->insert_id();

        $data2 = [
            "idsoal" => $id,
            "opsi1" => $this->input->post('opsi1', true),
            "opsi2" => $this->input->post('opsi2', true),
            "opsi3" => $this->input->post('opsi3', true),
            "opsi4" => $this->input->post('opsi4', true),
            "opsibenar" => $this->input->post('opsibenar', true),
        ];

        $this->db->insert('soaltugas_detail', $data2);

    }

    public function hapusSoalTugas($id)
    {
        $this->db->delete('soaltugas', ['id' => $id]);
    }

    public function getSoalTugasById($id)
    {
        $detail=$this->db->get_where('soaltugas_detail', array ('idsoal' => intval($id)))->row_array();
        if(!$detail) {
			$detail = array(
                "opsi1" => "",
                "opsi2" => "",
                "opsi3" => "",
                "opsi4" => "",
                "opsibenar" => "",
            );
		}
		$soalujian=$this->db->get_where('soaltugas', array ('id' => $id))->row_array();
        return array (
            'detail'=>$detail, 
            'soalujian'=>$soalujian,
        );
    }

    public function ubahSoalTugas($id) {
        $data = [
            "idtugas" => $this->input->post('idtugas', true),
            "jenissoal" => $this->input->post('jenissoal', true),
            "soal" => $this->input->post('soal', true),
        ];

        $this->db->update('soaltugas', $data, ['id' => $id]);
        // $id = $this->db->insert_id();

        $data2 = [
            "opsi1" => $this->input->post('opsi1', true),
            "opsi2" => $this->input->post('opsi2', true),
            "opsi3" => $this->input->post('opsi3', true),
            "opsi4" => $this->input->post('opsi4', true),
            "opsibenar" => $this->input->post('opsibenar', true),
        ];
        // echo json_encode($data2);die();

        $this->db->update('soaltugas_detail', $data2, ['idsoal' => $id]);
    }

    function getSoalSiswa($id, $nomor = 0){
        $this->db->select('*');
        $this->db->from('soaltugas a'); 
        $this->db->join('soaltugas_detail b', 'b.idsoal=a.id');
        $this->db->where('a.idtugas',$id);
        $query = $this->db->get ();
        return $query->result_array();

        if (isset($result_array[$nomor])) {
            return $result_array[$nomor];
        } else {
            return null; // or handle this case as per your requirement
        }
    }

    function getAllSoalSiswa($id){
        $this->db->select('*');
        $this->db->from('soaltugas'); 
        $this->db->where('idtugas',$id);
        $query = $this->db->get ();
        return $query->result_array();
    }

}

?>  
