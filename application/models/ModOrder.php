<?php
class ModOrder extends CI_Model {

	public function masuk($table, $data)
	{
		return $this->db->insert($table,$data);
	}

	public function tampilsemua($table)
	{
		return $this->db->get($table);
	}

	public function tampilpunya($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	public function hapusdata($table, $data, $where)
	{
		$this->db->where($where);
		return $this->db->update($table,$data);
	}

	public function listing($where)
	{
		$sel = array(
			'request.id_req',
			'request.tanggal_open',
			"pengirim.nama_user AS 'pengirim'",
			'company.nama_company',
			'kategori.nama_kategori',
			'subkategori.isi_subkategori',
			'request.status',
			'request.is_komplain'
		);
		$this->db->select($sel);
		$this->db->from('request');
		$this->db->join('kategori','request.id_kategori = kategori.id_kategori','inner');
		$this->db->join('subkategori','request.id_subkategori = subkategori.id_subkategori','inner');
		$this->db->join('user pengirim','request.id_pengirim = pengirim.id_user','inner');
		$this->db->join('clientcompany','clientcompany.id_client = pengirim.id_user','inner');
		$this->db->join('company','company.id_company = clientcompany.id_company','inner');
		$this->db->where($where);
		return $this->db->get();
	}

	public function superlisting()
	{
		$where = array('delete_date' => NULL);
		$sel = array(
			'request.id_req',
			'request.tanggal_open',
			"pengirim.nama_user AS 'pengirim'",
			'company.nama_company',
			'kategori.nama_kategori',
			'subkategori.isi_subkategori',
			"teknisi.nama_user AS 'teknisi'",
			'request.status',
			'request.is_komplain'
		);
		$this->db->select($sel);
		$this->db->from('request');
		$this->db->join('kategori','request.id_kategori = kategori.id_kategori','inner');
		$this->db->join('subkategori','request.id_subkategori = subkategori.id_subkategori','inner');
		$this->db->join('user pengirim','request.id_pengirim = pengirim.id_user','left');
		$this->db->join('clientcompany','clientcompany.id_client = pengirim.id_user','inner');
		$this->db->join('company','company.id_company = clientcompany.id_company','inner');
		$this->db->join('user teknisi','request.id_teknisi = teknisi.id_user','left');
		$this->db->where($where);
		return $this->db->get();
	}

	public function detail($where)
	{
		$sel = array(
			'request.id_req',
			'request.tanggal_open',
			"pengirim.nama_user AS 'pengirim'",
			'company.nama_company',
			'request.deskripsi_req',
			'kategori.nama_kategori',
			'subkategori.isi_subkategori',
			"teknisi.nama_user AS 'teknisi'",
			'request.status',
			'request.latitude',
			'request.longitude',
			'request.desc_teknisi',
			'request.rating',
			'request.review'
		);
		$this->db->select($sel);
		$this->db->from('request');
		$this->db->join('kategori','request.id_kategori = kategori.id_kategori','inner');
		$this->db->join('subkategori','request.id_subkategori = subkategori.id_subkategori','inner');
		$this->db->join('user pengirim','request.id_pengirim = pengirim.id_user','left');
		$this->db->join('clientcompany','clientcompany.id_client = pengirim.id_user','inner');
		$this->db->join('company','company.id_company = clientcompany.id_company','inner');
		$this->db->join('user teknisi','request.id_teknisi = teknisi.id_user','left');
		$this->db->where($where);
		return $this->db->get();
	}

	public function updateRequest($where, $data)
	{
		$this->db->where($where);
	 	return $this->db->update('request',$data);
	}

	public function selectcustom($data,$table,$where)
	{
		$this->db->select($data);
		$this->db->from($table);
		$this->db->where($where);
		return $this->db->get();
	}

	public function listingprev($where)
	{
		$sel = array(
			'request.id_req',
			'request.tanggal_open',
			"pengirim.nama_user AS 'pengirim'",
			'company.nama_company',
			'kategori.nama_kategori',
			'subkategori.isi_subkategori',
			'request.status',
			'request.is_komplain'
		);
		$this->db->select($sel);
		$this->db->from('request');
		$this->db->join('kategori','request.id_kategori = kategori.id_kategori','inner');
		$this->db->join('subkategori','request.id_subkategori = subkategori.id_subkategori','inner');
		$this->db->join('user pengirim','request.id_pengirim = pengirim.id_user','inner');
		$this->db->join('clientcompany','clientcompany.id_client = pengirim.id_user','inner');
		$this->db->join('company','company.id_company = clientcompany.id_company','inner');
		$this->db->limit(5);
		$this->db->order_by("request.tanggal_open","desc");
		$this->db->where($where);
		return $this->db->get();		
	}

	public function superlistingprev()
	{
		$where = array('delete_date' => NULL);
		$sel = array(
			'request.id_req',
			'request.tanggal_open',
			"pengirim.nama_user AS 'pengirim'",
			'company.nama_company',
			'kategori.nama_kategori',
			'subkategori.isi_subkategori',
			"teknisi.nama_user AS 'teknisi'",
			'request.status',
			'request.is_komplain'
		);
		$this->db->select($sel);
		$this->db->from('request');
		$this->db->join('kategori','request.id_kategori = kategori.id_kategori','inner');
		$this->db->join('subkategori','request.id_subkategori = subkategori.id_subkategori','inner');
		$this->db->join('user pengirim','request.id_pengirim = pengirim.id_user','left');
		$this->db->join('clientcompany','clientcompany.id_client = pengirim.id_user','inner');
		$this->db->join('company','company.id_company = clientcompany.id_company','inner');
		$this->db->join('user teknisi','request.id_teknisi = teknisi.id_user','left');
		$this->db->limit(5);
		$this->db->order_by("request.tanggal_open","desc");
		$this->db->where($where);
		return $this->db->get();
	}
} 