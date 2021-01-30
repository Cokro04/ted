<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('barang_m');
		$this->load->library('form_validation');
	}


	public function index()
	{
		// $data['row'] = $this->barang_m->get();
		$id = $this->session->userdata('userid');
		$data['row'] = $this->barang_m->get_by_iduser($id);
		$this->template->load('template', 'barang/barang_data', $data);
	}

	public function outbound($id)
	{
		// $data['row'] = $this->barang_m->get();
		// $id = $this->session->userdata('userid');
		$data['id_out'] = $id;
		$data['row'] = $this->barang_m->get();
		$data['data'] = $this->barang_m->seleksiBarang();
		$this->template->load('template', 'outbound/outbound_data_barang', $data);
	}

	public function add()
	{
		$barang = new stdClass();
		$barang->barang_id = null;
		$barang->kode_barang = null;
		$barang->jenis = null;
		$barang->isi = null;
		$barang->berat = null;
		$barang->alamat = null;

		$kode_terakhir = $this->barang_m->getMax('tbl_barang', 'barang_id');
		$kode_tambah = substr($kode_terakhir, -5, 5);
		$kode_tambah++;
		$number = str_pad($kode_tambah, 5, '0', STR_PAD_LEFT);
		// $data['id_barang'] = 'B' . $number;

		$data = array(
			'page' => 'add',
			'row' => $barang,
			'id_barang' => 'BR' . $number
		);
		$this->template->load('template', 'barang/barang_form', $data);
	}

	public function edit($id)
	{
		$query = $this->barang_m->get($id);
		if ($query->num_rows() > 0) {
			$barang = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $barang
			);
			$this->template->load('template', 'barang/barang_edit', $data);
		} else {
			echo "<script>alert('Data Tidak Ditemukan');";
			echo "window.location='" . site_url('barang') . "';</script>";
		}
	}

	//masih error
	public function save()
	{
		$id_barang_masuk = $this->barang_m->insertBarangMasuk();
		$data = $this->barang_m->getDataSave();
		foreach ($data->result() as $key => $row) {
			$this->barang_m->insertBarangDetail($id_barang_masuk, $row->barang_id);
		}
		echo "berhasil";
	}

	//active fungsi add, edit, save masih error
	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->barang_m->add($post);
		} else if (isset($_POST['edit'])) {
			$this->barang_m->edit($post);
		} else if (isset($_POST['save'])) {
			$this->barang_m->save($post);
		}
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data Berhasil Disimpan');
		}
		redirect('barang');
	}

	public function del($id)
	{
		$this->barang_m->del($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data Berhasil Dihapus');
		}
		redirect('barang');
	}
}
