<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Outbound_m extends CI_Model
{
  public function get($id = null)
  {
    $this->db->from('tbl_outbound');
    if ($id != null) {
      $this->db->where('id_outbound', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function seleksiBarang()
  {
    $this->db->where('id_outbound' . '=', null);
    $query = $this->db->get('tbl_barang');
    return $query;
  }

  public function add($post)
  {
    $params = [
      'id_outbound' => $post['id_outbound'],
      'Nama' => $post['Nama'],
      'tanggal_cetak' => $post['tanggal_cetak'],
      'Tujuan' => $post['Tujuan'],
    ];
    $this->db->insert('tbl_outbound', $params);
  }

  public function edit($post)
  {
    $params = [
      'Nama' => $post['Nama'],
      'tanggal_cetak' => $post['tanggal_cetak'],
      'Tujuan' => $post['Tujuan'],
    ];
    $this->db->where('id_outbound', $post['id_outbound']);
    $this->db->update('tbl_outbound', $params);
  }

  public function del($id)
  {
    $this->db->where('id_outbound', $id);
    $this->db->delete('tbl_outbound');
  }

  public function save_batch($data)
  {
    return $this->db->update_batch('tbl_barang', $data, 'barang_id');
  }
}
