<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model('admin_m');
		$this->load->model('agen_m');
		$this->load->library('form_validation');
	}


	public function index()
	{
		$data['row'] = $this->admin_m->getBarang();
		$data['barang'] = $this->admin_m->Agen();
		$this->template->load('template', 'admin/admin_data', $data);
	}

	public function BrMasuk()
	{
		$data['row'] = $this->admin_m->getBarang();
		$this->template->load('template', 'admin/admin_dataBM', $data);
	}

	public function getAgen()
	{
		if (isset($_GET['cari'])) {
			$cari = $_GET['cari'];
			$data['row'] = $this->admin_m->whereBarang($cari);
			$data['barang'] = $this->admin_m->Agen();
			$this->template->load('template', 'admin/admin_data', $data);
		}
	}

	public function add()
	{
		$admin = new stdClass();
		$admin->barang_id = null;
		$admin->kode_barang = null;
		$admin->jenis = null;
		$admin->isi = null;
		$admin->berat = null;
		$admin->alamat = null;
		$data = array(
			'page' => 'add',
			'row' => $admin
		);
		$this->template->load('template', 'admin/admin_form', $data);
	}

	public function edit($id)
	{
		$query = $this->admin_m->get($id);
		if ($query->num_rows() > 0) {
			$admin = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $admin
			);
			$this->template->load('template', 'admin/admin_form', $data);
		} else {
			echo "<script>alert('Data Tidak Ditemukan');";
			echo "window.location='" . site_url('admin') . "';</script>";
		}
	}

	public function status()
	{
		$post = $this->input->post(null, TRUE);
		$this->admin_m->editstatus($post);
		if ($this->db->affected_rows() > 0) {
			echo "<script>alert('Data Berhasil Ditambahkan');</script>";
		}
		echo "<script>window.location='" . site_url('admin/BrMasuk') . "';</script>";
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->admin_m->add($post);
		} else if (isset($_POST['edit'])) {
			$this->admin_m->edit($post);
		}
		if ($this->db->affected_rows() > 0) {
			echo "<script>alert('Data Berhasil Ditambahkan');</script>";
		}
		echo "<script>window.location='" . site_url('admin') . "';</script>";
	}

	public function del($id)
	{
		$this->admin_m->del($id);
		if ($this->db->affected_rows() > 0) {
			echo "<script>alert('Data Berhasil Hapus');</script>";
		}
		echo "<script>window.location='" . site_url('admin') . "';</script>";
	}


	public function closebook()
	{
		$data['row'] = $this->admin_m->whereStatus();
		$this->template->load('template', 'closebook/closebook_data', $data);
	}


}
