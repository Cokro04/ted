<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak_m extends CI_Model
{
  public function get($id = null)
  {
    $this->db->from('tbl_outbound');
    if ($id != null) {
      $this->db->where('id_outbound', $id);
    }
    $query = $this->db->get()->result_array();
    return $query;
  }

  public function getBarang($id)
  {
    $this->db->from('tbl_barang');
    $this->db->where('id_outbound', $id);
    $query = $this->db->get()->result_array();
    return $query;
  }

  public function save_batch($data)
  {
    return $this->db->update_batch('tbl_barang', $data, 'barang_id');
  }
}
