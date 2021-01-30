<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_m extends CI_Model
{

	public function get_by_iduser($id)
	{
		$this->db->where('id_user', $id);
		$query = $this->db->get('tbl_barang');
		return $query;
	}

	public function seleksiBarang()
	{
		$id = '0';
		$st = 'BK';
		$this->db->where('id_outbound', $id);
		$this->db->where('status', $st);
		$query = $this->db->get('tbl_barang')->result_array();
		return $query;
	}

	public function getMax($table, $field, $kode = null)
	{
		$this->db->select_max($field);
		if ($kode != null) {
			$this->db->like($field, $kode, 'after');
		}
		return $this->db->get($table)->row_array()[$field];
	}

	public function get($id = null)
	{

		if ($id != null) {
			$this->db->where('barang_id', $id);
		}
		// if ($this->fungsi->user_login()->id_agen != "") {
		// 	$this->db->where('id_agen', $this->fungsi->user_login()->id_agen);
		// }
		$this->db->from('tbl_barang');
		$query = $this->db->get();
		return $query;
	}

	public function getBarang($id)
	{
		$this->db->from('tbl_barang');
		$this->db->where('barang_id', $id);
		return $this->db->get();
	}

	public function add($post)
	{
		date_default_timezone_set('Asia/Jakarta');
		$params = [
			'barang_id' => $post['barang_id'],
			'id_user' => $post['id_user'],
			'jenis' => $post['jenis'],
			'isi' => $post['isi'],
			'berat' => $post['berat'],
			'alamat' => $post['alamat'],
			'status' => $post['status'],
			'id_outbound' => $post['id_outbound'],
			'created' => date('Y-m-d H:i:s')
		];
		$this->db->insert('tbl_barang', $params);
		// $this->db->insert('tbl_setor_barang', $params);
	}

	//masih error
	public function getDataSave()
	{

		$this->db->where('id_agen', $this->fungsi->user_login()->id_agen);
		$this->db->where('id_barang_masuk', null);
		$this->db->from('tbl_barang');
		$query = $this->db->get();
		return $query;
	}

	public function insertBarangMasuk()
	{
		$params = [
			'id_agen' => $this->fungsi->user_login()->id_agen,
			'tgl_barang_masuk' => date("Y-m-d"),
		];
		$this->db->insert('tbl_barang_masuk', $params);
		return $this->db->insert_id();
	}

	public function insertBarangDetail($id_barang_masuk, $barang_id)
	{
		$params = [
			'id_barang_masuk' => $id_barang_masuk,
			'updated' => date('Y-m-d H:i:s')
		];
		$this->db->where('barang_id', $barang_id);
		$this->db->update('tbl_barang', $params);
	}

	public function edit($post)
	{
		date_default_timezone_set('Asia/Jakarta');
		$params = [
			'id_user' => $post['id_user'],
			'jenis' => $post['jenis'],
			'isi' => $post['isi'],
			'berat' => $post['berat'],
			'alamat' => $post['alamat'],
			'status' => $post['status'],
			'id_outbound' => $post['id_outbound'],
			'updated' => date('Y-m-d H:i:s')
		];
		$this->db->where('barang_id', $post['barang_id']);
		$this->db->update('tbl_barang', $params);
	}

	public function del($id)
	{
		$this->db->where('barang_id', $id);
		$this->db->delete('tbl_barang');
	}
}
