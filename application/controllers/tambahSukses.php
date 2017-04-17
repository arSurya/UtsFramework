<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TambahSukses extends CI_Controller {

	public function index()
	{
		$this->load->model('club_model');
		$data["club_list"] = $this->club_model->getDataClub();
		$this->load->view('tambahCLubSukses',$data);		
	}

}

/* End of file tambahSukses.php */
/* Location: ./application/controllers/tambahSukses.php */