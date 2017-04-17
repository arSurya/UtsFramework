<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemain extends CI_Controller {

	public function index()
	{
		$this->load->model('club_model');
		$data["pemain_list"] = $this->club_model->getDataPemain();
		$this->load->view('pemain',$data);		
	}
	public function create()
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->load->model('club_model');	
		if($this->form_validation->run()==FALSE){

			$this->load->view('tambahPemain');

		}else{
			$this->load->view('tambahPemain');
			$this->club_model->insertPemain();
			$this->load->view('tambahPemainSukses');
	
			
		}
	}
	public function delete($id)
	{
		$this->load->model('club_model');
		$this->club_model->deleteById($id);
		$data["pemain_list"] = $this->club_model->getDataPemain();
		$this->load->view('pemain',$data);
	}

}

/* End of file Pemain.php */
/* Location: ./application/controllers/Pemain.php */