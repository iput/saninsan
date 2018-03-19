<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datadosen extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('atributuser/header1');
		$this->load->view('datamasterdosen/datapendidikan');
		$this->load->view('atributuser/footer1');
	}
	function input(){
		$ins=$this->input->post('in_s');
		echo $ins;
	}
	public function index1()
	{
		$this->load->view('atributuser/header1');
		$this->load->view('datamasterdosen/datadikjar');
		$this->load->view('atributuser/footer1');
	}
	public function index2()
	{
		$this->load->view('atributuser/header1');
		$this->load->view('datamasterdosen/kegiatandikjar');
		$this->load->view('atributuser/footer1');
	}
	public function index3()
	{
		$this->load->view('atributuser/header1');
		$this->load->view('datamasterdosen/kategoripenelitian');
		$this->load->view('atributuser/footer1');
	}
	public function index4()
	{
		$this->load->view('atributuser/header1');
		$this->load->view('datamasterdosen/datapenelitian');
		$this->load->view('atributuser/footer1');
	}
	public function index5()
	{
		$this->load->view('atributuser/header1');
		$this->load->view('datamasterdosen/kategoripengabdian');
		$this->load->view('atributuser/footer1');
	}
	public function index6()
	{
		$this->load->view('atributuser/header1');
		$this->load->view('datamasterdosen/datapengabdian');
		$this->load->view('atributuser/footer1');
	}
	public function index7()
	{
		$this->load->view('atributuser/header1');
		$this->load->view('datamasterdosen/kategoripenunjang');
		$this->load->view('atributuser/footer1');
	}
	public function index8()
	{
		$this->load->view('atributuser/header1');
		$this->load->view('datamasterdosen/datapenunjang');
		$this->load->view('atributuser/footer1');
	}
	
}
