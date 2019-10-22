<?php
class ModUser extends CI_Model {

	public function getKaryawan()
	{
		$where=array('is_deleted' => 0, 'kategori_user <' => 4);
		return $this->db->get_where('user',$where);
	}

	public function getClient()
	{
		$sel = array(
			'user.*',
			'company.id_company',
			'company.nama_company',
		);
		$where=array('is_deleted' => 0, 'kategori_user' => 4);
		$this->db->select($sel);
		$this->db->from('user');
		$this->db->join('clientcompany','user.id_user = clientcompany.id_client', 'left');
		$this->db->join('company','clientcompany.id_company = company.id_company','left');
		$this->db->where($where);
		return $this->db->get();
	}

	public function getCompany()
	{
		return $this->db->get('company');
	}

	public function tampilpunya($table,$where)
	{
		return $this->db->get_where($table,$where);
	}

	public function tampilsemua($table)
	{
		return $this->db->get($table);
	}

	public function hapus($table,$where)
	{
		$data = array('is_deleted' => 1);
		$this->db->where($where);
		return $this->db->update($table,$data);
	}

	public function updatedata($table, $where, $data)
	{
		$this->db->where($where);
	 	return $this->db->update($table,$data);
	}

	public function tambah($table,$data)
	{
		return $this->db->insert($table,$data);
	}
}