<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {

	public function __construct()
     {
         parent::__construct();
		// if (!$this->session->userdata('level')=='1') {
		// 	redirect('login');
		// }
		$this->load->model('Model_dosen','mdl');
     }

	public function index()
	{
		$data['dosen'] = $this->mdl->dataDosen();
		$this->load->view('admin/pengajuan', $data);
	}

	public function detail()
	{
		$dosen = $_GET['code'];
		$data['detail'] = $this->mdl->editDosen($dosen)->row();
		$this->load->view("admin/v_detail_pengajuan", $data);
	}
}
