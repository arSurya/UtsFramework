<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Club_model extends CI_Model {
	public function getDataClub()
		{
		
		$query = $this->db->query("Select * from klub");
		return $query->result();
		}
	public function getDataPemain()
		{
		
		$query = $this->db->query("Select * from pemain");
		return $query->result();
		}


	public function insertClub()
		{
			$object = array('nama' => $this->input->post('nama'),
				'logo' => $this->upload->data('file_name')
				 );
			$this->db->insert('klub', $object);
		}	
	public function insertPemain()
		{
			$object = array('nama' => $this->input->post('nama'),
				'posisi' => $this->input->post('posisi'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'fk_klub' => $this->input->post('fk_klub')
				 );
			$this->db->insert('pemain', $object);
		}
	public function deleteById($id)
		{
			$this->db->where('id',$id);
			$this->db->delete('pemain');		
		}
	



	

	
}

/* End of file Club_model.php */
/* Location: ./application/models/Club_model.php */