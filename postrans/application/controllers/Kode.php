<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kode extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('kode_pos_m');
		$this->load->library('form_validation');
	}


	public function index()
	{
		$data['row'] = $this->kode_pos_m->get();
		$this->template->load('template', 'kodepos/kode_pos_data', $data);
	}
}