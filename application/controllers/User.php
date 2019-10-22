<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
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

	public function create($strings)
	{
		if($this->input->post('submit')) {
			if($strings == "client") {
				$namauc = $this->input->post('namauc');
				$emailuc = $this->input->post('emailuc');
				$companyuc = $this->input->post('companyuc');
				$passworduc = $this->input->post('passworduc');

				$where0 = array('email_user' => $emailuc);
				$check = $this->ModUser->tampilpunya('user',$where0)->num_rows();
				if($check < 1) {
					$data = array(
						'nama_user' => $namauc,
						'email_user' => $emailuc,
						'kategori_user' => 4,
						'password_user' => md5($passworduc)
					);

					$query = $this->ModUser->tambah('user',$data);

					$where = $this->ModUser->tampilpunya('user',$data);
					$result = $where->result_array();
					
					$id_new = $result[0]['id_user'];
					$data2 = array(
						'id_client' => $id_new,
						'id_company' => $companyuc
					);

					$query2 = $this->ModUser->tambah('clientcompany',$data2);
					if($query && $query2) {
						$this->session->set_flashdata('berhasil','sukses');
						redirect(base_url('user/client'));
					} else {
						$this->session->set_flashdata('gagalinput','gagal');
						redirect(base_url('user/create/client'));
					}
				} else {
					$this->session->set_flashdata('gagalemail','gagal');
					redirect(base_url('user/create/client'));
				}
			} else if($strings == "karyawan") {
				$namaut = $this->input->post('namaut');
				$emailut = $this->input->post('emailut');
				$passwordut = $this->input->post('passwordut');
				$kategoriut = $this->input->post('kategoriut');

				$where0 = array('email_user' => $emailut);
				$check = $this->ModUser->tampilpunya('user',$where0)->num_rows();
				if($check < 1) {
					$data = array(
						'nama_user' => $namaut,
						'email_user' => $emailut,
						'password_user' => md5($passwordut),
						'kategori_user' => $kategoriut
					);

					$query = $this->ModUser->tambah('user',$data);
					if($query) {
						$this->session->set_flashdata('berhasil','sukses');
						redirect(base_url('user/karyawan'));
					} else {
						$this->session->set_flashdata('gagal','Email sudah terdaftar');
						redirect(base_url('user/create/karyawan'));
					}
				} else {
					$this->session->set_flashdata('gagalemail','gagal');
					redirect(base_url('user/create/karyawan'));
				}
			} else if($strings == "company") {
				$namacomp = $this->input->post('namacomp');
				$alamatcomp = $this->input->post('alamatcomp');
				$telpcomp = $this->input->post('telpcomp');

				$data = array(
					'nama_company' => $namacomp,
					'alamat_company' => $alamatcomp,
					'telp_company' => $telpcomp,
				);

				$query = $this->ModUser->tambah('company',$data);
				if($query) {
					$this->session->set_flashdata('berhasil','sukses');
					redirect(base_url('user/company'));
				} else {
					$this->session->set_flashdata('gagal','gagal');
					redirect(base_url('user/create/company'));
				}
			}

		} else {
			if($strings == "client") {
				$data['judul'] = "Tambah Client";
				$query = $this->ModUser->tampilsemua("company");
				$result = $query->result_array();
				$data['company'] = $result;
			} else if($strings == "karyawan") {
				$data['judul'] = "Tambah Karyawan";
			} else if($strings == "company") {
				$data['judul'] = "Tambah Perusahaan";
			}
			$data['instruksi'] = "user/create.php";
			$this->load->view('template',$data);
		}
	}
	public function karyawan()
	{
		$data['judul'] = "List Karyawan";
		$data['instruksi'] = "user/karyawan.php";

		$query = $this->ModUser->getKaryawan();
		$result = $query->result_array();

		$data['karyawan'] = $result;

		$this->load->view('template',$data);
	}

	public function client()
	{
		$data['judul'] = "List Client";
		$data['instruksi'] = "user/client.php";

		$query = $this->ModUser->getClient();
		$result = $query->result_array();

		$data['client'] = $result;

		$this->load->view('template',$data);	
	}

	public function company()
	{
		$data['judul'] = "List Perusahaan";
		$data['instruksi'] = "user/company.php";	

		$query = $this->ModUser->getCompany();
		$result = $query->result_array();

		$data['company'] = $result;

		$this->load->view('template',$data);		
	}

	public function ucedit($id)
	{
		if($this->input->post('submit')) {
			$nama_uc = $this->input->post('namauc');
			$email_uc = $this->input->post('emailuc');
			$company_uc = $this->input->post('companyuc');

			$data = array(
				'nama_user' => $nama_uc,
				'email_user' => $email_uc
			);

			$data2 = array(
				'id_company' => $company_uc
			);

			$where = array('id_user' => $id);
			$where2 = array('id_client' => $id);

			$query = $this->ModUser->updatedata('user',$where,$data);
			$query2 = $this->ModUser->updatedata('clientcompany',$where2,$data2);

			if($query && $query2) {
				$this->session->set_flashdata('berhasil','sukses');
				redirect(base_url('user/client'));
			} else {
				$this->session->set_flashdata('gagal','gagal');
			}
		} else {
			$where = array('id_user' => $id);
			$query = $this->ModUser->tampilpunya("user",$where);
			$result = $query->result_array();

			$query2 = $this->ModUser->tampilsemua("company");
			$result2 = $query2->result_array();

			$where2 = array('id_client' => $id);
			$query3 = $this->ModUser->tampilpunya("clientcompany",$where2);
			$result3 = $query3->result_array();

			$data['client'] = $result;
			$data['company'] = $result2;
			$data['clientcompany'] = $result3;

			$data['judul'] = "Edit Client";
			$data['instruksi'] = "user/edit.php";

			$this->load->view('template',$data);		
		}	
	}

	public function ucdelete($id)
	{
		$where = array('id_user' => $id);
		$query = $this->ModUser->hapus("user",$where);

		if($query) {
			$this->session->set_flashdata('berhasil','sukses');
				redirect(base_url('user/client'));
		} else {
			$this->session->set_flashdata('gagal','gagal');
		}
	}

	public function utedit($id)
	{
		if($this->input->post('submit')) {
			$namaut=$this->input->post('namaut');
			$emailut=$this->input->post('emailut');
			$kategoriut=$this->input->post('kategoriut');

			$data = array(
				'nama_user' => $namaut,
				'email_user' => $emailut,
				'kategori_user' => $kategoriut
			);

			$where = array('id_user' => $id);

			$query = $this->ModUser->updatedata("user",$where,$data);

			if($query) {
				$this->session->set_flashdata('berhasil','sukses');
				redirect(base_url('user/karyawan'));
			} else {
				$this->session->set_flashdata('gagal','gagal');
			}

		} else {
			$where = array('id_user' => $id);
			$query = $this->ModUser->tampilpunya("user",$where);
			$result = $query->result_array();

			$data['karyawan'] = $result;
		
		}	
		$data['judul'] = "Edit Karyawan";
		$data['instruksi'] = "user/edit.php";
		$this->load->view('template',$data);
	}

	public function utdelete($id)
	{
		$where = array('id_user' => $id);
		$query = $this->ModUser->hapus("user",$where);

		if($query) {
			$this->session->set_flashdata('berhasil','sukses');
				redirect(base_url('user/karyawan'));
		} else {
			$this->session->set_flashdata('gagal','gagal');
		}
	}

	public function compedit($id)
	{
		if($this->input->post('submit')) {
			$namacomp=$this->input->post('namacomp');
			$alamatcomp=$this->input->post('alamatcomp');
			$telpcomp=$this->input->post('telpcomp');

			$data = array(
				'nama_company' => $namacomp,
				'alamat_company' => $alamatcomp,
				'telp_company' => $telpcomp
			);

			$where = array('id_company' => $id);

			$query = $this->ModUser->updatedata("company",$where,$data);

			if($query) {
				$this->session->set_flashdata('berhasil','sukses');
				redirect(base_url('user/company'));
			} else {
				$this->session->set_flashdata('gagal','gagal');
			}

		} else {
			$where = array('id_company' => $id);
			$query = $this->ModUser->tampilpunya("company",$where);
			$result = $query->result_array();

			$data['company'] = $result;
		
		}	
		$data['judul'] = "Edit Perusahaan";
		$data['instruksi'] = "user/edit.php";
		$this->load->view('template',$data);
	}

	public function compdelete($id)
	{
		$where = array('id_user' => $id);
		$query = $this->ModUser->hapus("company",$where);

		if($query) {
			$this->session->set_flashdata('berhasil','sukses');
				redirect(base_url('user/company'));
		} else {
			$this->session->set_flashdata('gagal','gagal');
		}		
	}

} 