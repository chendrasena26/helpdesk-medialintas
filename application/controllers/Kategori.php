<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
	public function __construct()
	{
	 	parent::__construct();
	 	$this->load->library('form_validation');
	  	$this->load->library('email');
	  	$this->load->library('session');
	  	$this->load->model('ModUser');
	  	if($this->session->userdata("auth") == NULL) {
			redirect(base_url());
		}
	 }

	 public function kategori()
	 {
	 	$data['judul'] = "List Kategori";
		$data['instruksi'] = "kategori/kategori.php";

		$query = $this->ModUser->tampilsemua('kategori');
		$result = $query->result_array();

		$data['kategori'] = $result;

		$this->load->view('template',$data);
	 }

	 public function subkategori()
	 {
	 	$data['judul'] = "List Subategori";
		$data['instruksi'] = "kategori/subkategori.php";

		$query = $this->ModUser->tampilsemua('subkategori');
		$result = $query->result_array();

		$data['subkategori'] = $result;

		$this->load->view('template',$data);
	 }

	 public function create($strings)
	 {
	 	if($this->input->post('submit')) {
	 		if($strings == "kategori") {
	 			$namakat=$this->input->post('namakat');
	 		} else if($strings == "subkategori") {
	 			$namasubkat=$this->input->post('namasubkat');
	 			$kat=$this->input->post('kat');	
	 		}
	 	} else {
	 		if($strings == "kat") {
	 			$data['judul'] = "Tambah Kategori";
	 		} else if($strings == "subkat") {
	 			$data['judul'] = "Tambah Subkategori";
	 			$query =  $this->ModUser->tampilsemua("kategori");
	 			$result = $query->result_array();
	 			$data['kategori'] = $result;	
	 		}
	 		$data['instruksi'] = "kategori/create.php";
			$this->load->view('template',$data);
	 	}
	}
}