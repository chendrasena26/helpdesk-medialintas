<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komplain extends CI_Controller {
	public function __construct()
	{
	 	parent::__construct();
	 	$this->load->library('form_validation');
	  	$this->load->library('email');
	  	$this->load->library('session');
	  	$this->load->model('ModKomplain');
	  	if($this->session->userdata("auth") == NULL) {
			redirect(base_url());
		}
	 }

	public function view($id)
	{
		$where = array('id_req' => $id);
		$cek = $this->ModKomplain->tampilpilih($where)->num_rows();

		if($cek > 0) {
			$data['judul'] = "Detail Komplain";
			$data['instruksi'] = "komplain/view.php";

			$query = $this->ModKomplain->tampilpilih($where);
			$result = $query->result_array();

			$data['komplain'] = $result;
		} else {
			$data['idRequest'] = $id;
			$data['judul'] = "Buat Komplain";
			$data['instruksi'] = "komplain/create.php";
		}
		$this->load->view('template',$data);
	}

	public function send()
	{
		$where = array('id_req' => $id);
		$cek = $this->ModKomplain->tampilpilih($where)->num_rows();

		$idRequest = $this->input->post('idRequest');
		$isiKomplain = $this->input->post('isiKomplain');
		$sender = $this->session->userdata('id');
		date_default_timezone_set('Asia/Jakarta');
		$waktuKomplain = date('Y-m-d H:i:s');

		if($cek == 0) {
			$data0 = array('is_komplain' => '1');
			$where0 = array('id_req' => $idRequest);
			$statreq = $this->ModKomplain->firstKomplain($data0,$where0);
		}
		
		$data = array(
			'id_req' => $idRequest,
			'isi_komplain' => $isiKomplain,
			'pengirim_komplain' => $sender,
			'waktu_komplain' => $waktuKomplain
		);

		$query = $this->ModKomplain->kirim($data);
		if($query) {
			$this->session->set_flashdata('berhasil','sukses');
			redirect(base_url('komplain/view/'.$idRequest));
		} else {
			$this->session->set_flashdata('gagal','gagal');
		}
	}
}