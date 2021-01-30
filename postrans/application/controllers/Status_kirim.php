<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Status_kirim extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    check_not_login();
    $this->load->model('status_m');
    $this->load->model('outbound_m');
    $this->load->library('form_validation');
  }


  public function index()
  {
    $data['row'] = $this->outbound_m->get();
    $this->template->load('template', 'status/status_data', $data);
  }

  public function detail($id)
  {
    $data['out_row'] = $this->outbound_m->get($id);
    $data['row'] = $this->status_m->get($id);
    $data['id'] = $id;
    $this->template->load('template', 'status/status_detail_data', $data);
  }

  public function add()
  {
    $agen = new stdClass();
    $agen->agen_id = null;
    $agen->name = null;
    $agen->address = null;
    $agen->description = null;
    $agen->kode_pos = null;
    $data = array(
      'page' => 'add',
      'row' => $agen
    );
    $this->template->load('template', 'agen/agen_form', $data);
  }

  public function edit($id)
  {
    $query = $this->agen_m->get($id);
    if ($query->num_rows() > 0) {
      $agen = $query->row();
      $data = array(
        'page' => 'edit',
        'row' => $agen
      );
      $this->template->load('template', 'agen/agen_form', $data);
    } else {
      echo "<script>alert('Data Tidak Ditemukan');";
      echo "window.location='" . site_url('agen') . "';</script>";
    }
  }

  public function process()
  {
    $post = $this->input->post(null, TRUE);
    if (isset($_POST['add'])) {
      $this->agen_m->add($post);
    } else if (isset($_POST['edit'])) {
      $this->agen_m->edit($post);
    }
    if ($this->db->affected_rows() > 0) {
      echo "<script>alert('Data Berhasil Ditambahkan');</script>";
    }
    echo "<script>window.location='" . site_url('agen') . "';</script>";
  }

  public function del($id)
  {
    $this->agen_m->del($id);
    if ($this->db->affected_rows() > 0) {
      echo "<script>alert('Data Berhasil Hapus');</script>";
    }
    echo "<script>window.location='" . site_url('agen') . "';</script>";
  }
}
