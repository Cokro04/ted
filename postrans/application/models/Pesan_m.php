<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesan_m extends CI_Model
{
  public function get($id = null)
  {
    $this->db->from('tbl_agen');
    if ($id != null) {
      $this->db->where('id_user', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function add($post)
  {
    $params = [
      'id_user' => $post['id_user'],
      'name' => $post['agen_name'],
      'address' => $post['addr'],
      'description' => empty($post['desc']) ? null : $post['desc'],
      'kode_pos' => $post['kode'],
    ];
    $this->db->insert('tbl_agen', $params);
  }

  public function edit($post)
  {
    $params = [
      'pesan' => $post['pesan'],
    ];
    $this->db->where('agen_id', $post['id']);
    $this->db->update('tbl_agen', $params);
  }

  public function del($id)
  {
    $this->db->where('agen_id', $id);
    $this->db->delete('tbl_agen');
  }
}
