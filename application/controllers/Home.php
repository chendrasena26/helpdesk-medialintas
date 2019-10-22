<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
	 	parent::__construct();
	 	$this->load->library('form_validation');
	  	$this->load->library('email');
	  	$this->load->library('session');
	  	$this->load->model('ModLogin');
	  	if($this->session->userdata("auth") != NULL) {
			redirect(base_url('dashboard'));
		}
	 }
	
	public function index()
	{
		$this->load->view('home');
	}

	public function login()
	{
		$usern = $this->input->post('usern');
		$passwd = $this->input->post('passwd');

		$where1 = array(
			'email_user' => $usern,
			'password_user' => md5($passwd),
			'is_deleted' => 0
		);

		$cek = $this->ModLogin->login("user", $where1 )->num_rows();

		if($cek > 0) {
			$auth= $this->ModLogin->login("user", $where1 )->row();
			$data_session = array(
				'id' => $auth->id_user,
				'auth' => $auth->kategori_user
			);
			$this->session->set_userdata($data_session);
			redirect(base_url('dashboard'));
		} else {
			$this->session->set_flashdata('gagal_login', 'gagal');
   			redirect(base_url());
		}
	}
}
