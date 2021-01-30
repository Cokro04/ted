<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {

	public function login($post)
	{
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('username', $post['username']);
		$this->db->where('password', sha1($post['password']));
		$query = $this->db->get();
		return $query;
	}

	//
	public function get($id = null)
	{
		$this->db->from('tbl_user');
		if($id != null) {
			$this->db->where('id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	//tambah data user
	public function add($post)
	{
		$params['name'] = $post['fullname'];
		$params['username'] = $post['username'];
		$params['password'] = sha1($post['password']);
		$params['level'] = $post['level'];
		$this->db->insert('tbl_user', $params);
	}

	//edit data user
	public function edit($post)
	{
		$params['name'] = $post['fullname'];
		$params['username'] = $post['username'];
		if(!empty($post['password'])) {
			$params['password'] = sha1($post['password']);
		}
		$params['level'] = $post['level'];
		$this->db->where('id', $post['id']);
		$this->db->update('tbl_user', $params);
	}
	//hapus data user
    public function del($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_user');
	}
}