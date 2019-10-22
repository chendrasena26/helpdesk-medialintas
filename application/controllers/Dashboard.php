<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
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
			if($this->input->post('submit')) {
				$idpengirim = $this->session->userdata("id");
				$idkategori = $this->input->post('kategoriOrder');
				$idsubkategori = $this->input->post('subkategoriOrder');
				$deskorder = $this->input->post('deskripsiOrder');
				$status = 1;

				$data = array(
					'id_pengirim' => $idpengirim,
					'deskripsi_req' => $deskorder,
					'id_kategori' => $idkategori,
					'id_subkategori' => $idsubkategori,
					'status' => $status
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
				$where = array(
					'id_pengirim' => $this->session->userdata("id"),
					'delete_date' => NULL
				);
				$querying = $this->ModOrder->listingprev($where);
				$resultdata = $querying->result_array();
				$data['order'] = $resultdata;
				$where1 = array(
					'id_pengirim' => $this->session->userdata("id"),
					'status' => 1,
					'delete_date' => NULL
				);
				
				$where2 = array(
					'id_pengirim' => $this->session->userdata("id"),
					'status' => 2,
					'delete_date' => NULL
				);
				
				$where3 = array(
					'id_pengirim' => $this->session->userdata("id"),
					'status' => 3,
					'delete_date' => NULL
				);
			
				$where4 = array(
					'id_pengirim' => $this->session->userdata("id"),
					'delete_date' => NULL
				);

				$kueri = $this->ModOrder->tampilsemua("kategori");
				$result = $kueri->result_array();
				$kueri2 = $this->ModOrder->tampilsemua("subkategori");
				$result2 = $kueri2->result_array();
				$data['kategori'] = $result;
				$data['subkategori'] = $result2;
			}
		} else if($this->session->userdata("auth") == 3) {
			$where = array(
					'id_teknisi' => $this->session->userdata("id"),
					'delete_date' => NULL
				);
			$querying = $this->ModOrder->listingprev($where);
			$resultdata = $querying->result_array();
			$data['order'] = $resultdata;
			$where1 = array(
				'id_teknisi' => $this->session->userdata("id"),
				'status' => 1,
				'delete_date' => NULL
			);
			$where2 = array(
				'id_teknisi' => $this->session->userdata("id"),
				'status' => 2,
				'delete_date' => NULL
			);
			$where3 = array(
				'id_teknisi' => $this->session->userdata("id"),
				'status' => 3,
				'delete_date' => NULL
			);
			$where4 = array(
				'id_teknisi' => $this->session->userdata("id"),
				'delete_date' => NULL
			);
		} else if($this->session->userdata("auth") < 3) {
			$where = array(
					'delete_date' => NULL
				);
			$querying = $this->ModOrder->superlistingprev($where);
			$resultdata = $querying->result_array();
			$data['order'] = $resultdata;
			$where1 = array(
				'status' => 1,
				'delete_date' => NULL
			);
			$where2 = array(
				'status' => 2,
				'delete_date' => NULL
			);
			$where3 = array(
				'status' => 3,
				'delete_date' => NULL
			);
			$where4 = array(
				'delete_date' => NULL
			);
		}
		$query1 = $this->ModOrder->tampilpunya('request',$where1)->num_rows();
		$query2 = $this->ModOrder->tampilpunya('request',$where2)->num_rows();
		$query3 = $this->ModOrder->tampilpunya('request',$where3)->num_rows();
		$query4 = $this->ModOrder->tampilpunya('request',$where4)->num_rows();
		$status = array($query4,$query1,$query2,$query3);
		$data['status'] = $status;

		$this->load->view('dashboard',$data);
	}
}