<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('agen_m');
		$this->load->model('pesan_m');
		$this->load->library('form_validation');
	}


	public function msg($id = null)
	{
		if ($this->fungsi->user_login()->level == 1) {
			$data['row'] = $this->agen_m->get();
			$this->template->load('template', 'pesan/pesan_data', $data);
		} elseif ($this->fungsi->user_login()->level == 2) {
			$data['row1'] = $this->agen_m->get($id);
			$this->template->load('template', 'pesan/pesan_data', $data);
		}
	}

	public function kirim($id)
	{
		$agen = new stdClass();
		$agen->pesan = null;
		$data = array(
			'page' => 'edit',
			'row' => $agen,
			'id' => $id
		);
		$this->template->load('template', 'pesan/pesan_form', $data);
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['edit'])) {
			$this->pesan_m->edit($post);
		}
		if ($this->db->affected_rows() > 0) {
			echo "<script>alert('Berhasil Mengirim Pesan');</script>";
		}
		echo "<script>window.location='" . site_url('pesan/msg') . "';</script>";
	}
}
