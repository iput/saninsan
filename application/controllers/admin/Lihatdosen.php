<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lihatdosen extends CI_Controller {

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
		$this->load->view('admin/data');
	}
}
