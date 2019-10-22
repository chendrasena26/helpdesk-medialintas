<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
	public function __construct()
	{
	 	parent::__construct();
	 	$this->load->library('form_validation');
	  	$this->load->library('email');
	  	$this->load->library('session');
	  	$this->load->model('ModOrder');
	  	if($this->session->userdata("auth") == NULL) {
			redirect(base_url());
		}
	 }
	public function index()
	{
		if($this->session->userdata("auth") == 4) {
			$where = array(
				'id_pengirim' => $this->session->userdata("id"),
				'delete_date' => NULL
			);
			$query = $this->ModOrder->listing($where);
			$result = $query->result_array();
		} else if($this->session->userdata("auth") == 3) {
			$where = array(
				'id_teknisi' => $this->session->userdata("id"),
				'delete_date' => NULL
			);
			$query = $this->ModOrder->listing($where);
			$result = $query->result_array();
		} else if($this->session->userdata("auth") == 2 || $this->session->userdata("auth") == 1) {
			$query = $this->ModOrder->superlisting();
			$result = $query->result_array();
			$where = array(
				'kategori_user' => 3,
				'is_deleted' => 0
			);
			$queryteknisi = $this->ModOrder->tampilpunya("user",$where);
			$resteknisi = $queryteknisi->result_array();
			$data['teknisi'] = $resteknisi;
		}
		$data['judul'] = "List Order";
		$data['instruksi'] = "order/view.php";
		$data['order'] = $result;
		$this->load->view('template',$data);
	}

	public function create()
	{	
		$data['judul'] = "Buat Order";
		$data['instruksi'] = "order/create.php";

		if($this->input->post('submit')) {
			$idpengirim = $this->session->userdata("id");
			$idkategori = $this->input->post('kategoriOrder');
			$idsubkategori = $this->input->post('subkategoriOrder');
			$deskorder = $this->input->post('deskripsiOrder');
			$latit = $this->input->post('latitude');
			$longit = $this->input->post('longitude');
			$status = 1;

			$data = array(
				'id_pengirim' => $idpengirim,
				'deskripsi_req' => $deskorder,
				'id_kategori' => $idkategori,
				'id_subkategori' => $idsubkategori,
				'status' => $status,
				'latitude' => $latit,
				'longitude' => $longit
			);
			$query=$this->ModOrder->masuk('request',$data);
			if($query) {
				$tampilq=$this->ModOrder->tampilpunya('request',$data);
				$hasil=$tampilq->result_array();
				$id_req = $hasil[0]['id_req'];
				$tanggal_open = $hasil[0]['tanggal_open'];
				$datalog1 = array(
					'id_req' => $id_req,
					'status' => 1,
					'tanggal' => $tanggal_open
				);
				$updateLog = $this->ModOrder->masuk('logstatus',$datalog1);
				if($updateLog) {
					$this->session->set_flashdata('berhasil','sukses');
					redirect(base_url('order'));
				}
			} else {
				$this->session->set_flashdata('gagal','gagal');
			}

		} else {
			$kueri = $this->ModOrder->tampilsemua("kategori");
			$result = $kueri->result_array();
			$kueri2 = $this->ModOrder->tampilsemua("subkategori");
			$result2 = $kueri2->result_array();
			$data['kategori'] = $result;
			$data['subkategori'] = $result2;

			$this->load->view('template',$data);
		}
	}

	public function edit($id)
	{
		if($this->input->post('submit')) {
			$kategori = $this->input->post('kategoriOrder');
			$subkategori = $this->input->post('subkategoriOrder');
			$deskripsi = $this->input->post('deskripsiOrder');
			$latit = $this->input->post('latitude');
			$longit = $this->input->post('longitude');

			$data = array(
				'id_kategori' => $kategori,
				'id_subkategori' => $subkategori,
				'deskripsi_req' => $deskripsi,
				'latitude' => $latit,
				'longitude' => $longit

			);
			$where = array('id_req' => $id);
			$query = $this->ModOrder->updateRequest($where,$data);

			if($query) {
			$this->session->set_flashdata('berhasil','sukses');
				redirect(base_url('order'));
			} else {
				$this->session->set_flashdata('gagal','gagal');
			}

		} else {
			$where = array('id_req' => $id);
			$query = $this->ModOrder->tampilpunya('request',$where);
			$result3 = $query->result_array();

			$kueri = $this->ModOrder->tampilsemua("kategori");
			$result = $kueri->result_array();

			$where2 = array('id_kategori'=>$result3[0]['id_kategori']);

			$kueri2 = $this->ModOrder->tampilpunya("subkategori",$where2);
			$result2 = $kueri2->result_array();
			$data['kategori'] = $result;
			$data['subkategori'] = $result2;
			$data['request'] = $result3;	
		}

		$data['judul'] = "Edit Order";
		$data['instruksi'] = "order/edit.php";
		$this->load->view('template',$data);
	}

	public function delete($id)
	{
		$where = array('id_req' => $id);
		date_default_timezone_set('Asia/Jakarta');
		$now = date('Y-m-d H:i:s');
		$data = array(
			'delete_date' => $now,
			'delete_by' => $this->session->userdata("id")
		);
		$query = $this->ModOrder->hapusdata("request",$data,$where);
		if($query) {
			$this->session->set_flashdata('berhasil','sukses');
				redirect(base_url('order'));
		} else {
			$this->session->set_flashdata('gagal','gagal');
		}
	}

	public function detail($id)
	{
		$where = array(
			'id_req' => $id
		);
		$query = $this->ModOrder->detail($where);
		$result = $query->result_array();

		$data['judul'] = "Detail";
		$data['instruksi'] = "order/detail.php";
		$data['order'] = $result;
		$this->load->view('template',$data);
	}

	public function accept()
	{
		$id_teknisi = $this->input->post('teknisiAcc');
		$id_req = $this->input->post('idRequest');
		
		$where = array(
			'id_req' => $id_req
		);

		$data = array(
			'id_operator' => $id_acc,
			'status' => 2,
			'id_teknisi' => $id_teknisi
		);

		$datalog2 = array(
			'id_req' => $id_req,
			'status' => 2
		);

		$query = $this->ModOrder->updateRequest($where,$data);
		$query3 = $this->ModOrder->masuk('logstatus',$datalog2);

		if($query && $query3) {
			$this->session->set_flashdata('berhasil','sukses');
				redirect(base_url('order'));
			} else {
				$this->session->set_flashdata('gagal','gagal');
			}
	}

	public function closed()
	{
		$idRequest = $this->input->post('idRequest');
		$descteknisi = $this->input->post('deskripsiTeknisi');

		$data2 = array(
			'id_req' => $idRequest,
			'status' => 3
		);

		$data3 = array(
			'status' => 3,
			'desc_teknisi' => $descteknisi
		);

		$where = array(
			'id_req' => $idRequest
		);

		$query2 = $this->ModOrder->masuk('logstatus',$data2);
		$query3 = $this->ModOrder->updateRequest($where, $data3);

		if($query2 && $query3) {
			$this->session->set_flashdata('berhasil','sukses');
			redirect(base_url('order'));
		} else {
			$this->session->set_flashdata('gagal','gagal');
		}

	}

	public function reopen($id)
	{
		date_default_timezone_set('Asia/Jakarta');
		$tanggalOpen = date('Y-m-d H:i:s');
		$data = array('status' => 1, 'tanggal_open' => $tanggalOpen);
		$data2 = array('id_req' => $id, 'status' => 1);
		$where = array('id_req' => $id);

		$query = $this->ModOrder->updateRequest($where,$data);
		$query2 = $this->ModOrder->masuk('logstatus',$data2);

		if($query && $query2) {
			$this->session->set_flashdata('berhasil','sukses');
			redirect(base_url('order'));
		} else {
			$this->session->set_flashdata('gagal','gagal');
		}

	}

	public function review()
	{
		$id = $this->input->post('idRequest');
		$rat = $this->input->post('rat');
		$rating = $this->input->post($rat);
		$review = $this->input->post('reviewOrder');

		$data = array(
			'rating' => $rating,
			'review' => $review
		);

		$where = array('id_req' => $id);

		$query = $this->ModOrder->updateRequest($where,$data);
		if($query) {
			$this->session->set_flashdata('berhasil','sukses');
			redirect(base_url('order'));
		} else {
			$this->session->set_flashdata('gagal','gagal');
		}
	}

}