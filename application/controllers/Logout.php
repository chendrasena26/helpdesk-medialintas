<?php
class Logout extends CI_Controller {

	public function index()
	{
		$this->load->helper('form');
		$this->load->library('session');
		$this->session->sess_destroy();
		redirect(base_url());
	}

} 