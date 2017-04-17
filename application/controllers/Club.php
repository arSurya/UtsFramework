<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Club extends CI_Controller {

	public function index()
	{
		$this->load->model('club_model');
		$data["club_list"] = $this->club_model->getDataClub();
		$this->load->view('club',$data);
	}
	public function create()
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->load->model('club_model');	
		if($this->form_validation->run()==FALSE){

			$this->load->view('tambahClub');

		}else{
			$config['upload_path'] = './assets/uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 10000000;
			$config['max_width'] = 10240;
			$config['max_height'] = 7680;
			$this->load->library('upload',$config);
			if (! $this->upload->do_upload('foto'))
			{
				$error = array('error'=> $this->upload->display_errors());
				$this->load->view('tambahClub',$error);
			}
			else{

			$this->club_model->insertClub();
			$this->load->view('tambahClubSukses');
	
			}
		}
	}


}

/* End of file Club.php */
/* Location: ./application/controllers/Club.php */