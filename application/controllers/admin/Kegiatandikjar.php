<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatandikjar extends CI_Controller {

	public function index()
	{
		$this->load->view('atribut/header');
		$this->load->view('datamasteradmin/kegiatandikjar');
		$this->load->view('atribut/footer');
	}
}