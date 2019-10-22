<?php
class ModKomplain extends CI_Model {
	public function tampilpilih($where)
	{
		$sel = array(
			'komplain.*',
			'user.nama_user',
			'user.kategori_user'
		);
		$this->db->select($sel);
		$this->db->from('komplain');
		$this->db->join('user','komplain.pengirim_komplain = user.id_user','left');
		$this->db->where($where);
		return $this->db->get();
	}

	public function kirim($data)
	{
		return $this->db->insert('komplain',$data);
	} 

	public function firstKomplain($data,$where)
	{
		$this->db->where($where);
		return $this->db->update('request',$data);
	}
}