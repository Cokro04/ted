<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Outbound extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('outbound_m');
		$this->load->model('barang_m');
	}

	public function index()
	{
		$data['row'] = $this->outbound_m->get();
		$this->template->load('template', 'outbound/outbound_data', $data);
	}

	public function add()
	{
		$out = new stdClass();

		$out->Nama = null;
		$out->tanggal_cetak = null;
		$out->Tujuan = null;

		$kode_terakhir = $this->barang_m->getMax('tbl_outbound', 'id_outbound');
		$kode_tambah = substr($kode_terakhir, -6, 6);
		$kode_tambah++;
		$number = str_pad($kode_tambah, 6, '0', STR_PAD_LEFT);
		$out->id_outbound = 'Z' . $number;
		$data = array(
			'page' => 'add',
			'row' => $out,
		);
		$this->template->load('template', 'outbound/outbound_form', $data);
	}

	public function edit($id)
	{
		$query = $this->outbound_m->get($id);
		if ($query->num_rows() > 0) {
			$out = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $out
			);
			$this->template->load('template', 'outbound/outbound_form', $data);
		} else {
			echo "<script>alert('Data Tidak Ditemukan');";
			echo "window.location='" . site_url('outbound') . "';</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->outbound_m->add($post);
		} else if (isset($_POST['edit'])) {
			$this->outbound_m->edit($post);
		}
		if ($this->db->affected_rows() > 0) {
			echo "<script>alert('Data Berhasil Ditambahkan');</script>";
		}
		echo "<script>window.location='" . site_url('outbound') . "';</script>";
	}

	public function del($id)
	{
		$this->outbound_m->del($id);
		if ($this->db->affected_rows() > 0) {
			echo "<script>alert('Data Berhasil Hapus');</script>";
		}
		echo "<script>window.location='" . site_url('outbound') . "';</script>";
	}

	public function saveBatch()
	{
		// Ambil data yang dikirim dari form
		$barang_id = $_POST['barang_id']; // Ambil data barang_id dan masukkan ke variabel barang_id
		$id_outbound = $_POST['id_outbound']; // Ambil data nama dan masukkan ke variabel nama
		$data = array();

		$index = 0; // Set index array awal dengan 0
		foreach ($barang_id as $barang_id) { // Kita buat perulangan berdasarkan nis sampai data terakhir
			array_push($data, array(
				'barang_id' => $barang_id,
				'id_outbound' => $id_outbound[$index],  // Ambil dan set data nama sesuai index array dari $index
			));

			$index++;
		}

		$sql = $this->outbound_m->save_batch($data); // Panggil fungsi save_batch yang ada di model siswa (SiswaModel.php)

		// Cek apakah query insert nya sukses atau gagal
		if ($sql) { // Jika sukses
			echo "<script>alert('Data berhasil disimpan');window.location = '" . site_url('outbound') . "';</script>";
		} else { // Jika gagal
			echo "<script>alert('Data gagal disimpan');window.location = '" . site_url('outbound') . "';</script>";
		}
	}
}
