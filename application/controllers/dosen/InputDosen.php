<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InputDosen extends CI_Controller {


	public function __construct()
     {
         parent::__construct();
		if (!$this->session->userdata('level')=='1') {
			redirect('login');
		}
		$this->load->model('Model_dosen','mdl');
     }

	public function index()
	{
		$data['identitas'] = $this->mdl->getIdentitas($this->session->userdata('id'))->row();
		$this->load->view('atribut/header');
		$this->load->view('dosen/data', $data);
		$this->load->view('atribut/footer');
	}
	public function edit()
	{
		$data['profile'] = $this->mdl->editDosen($this->session->userdata('id'))->row();
		$this->load->view('atribut/header');
		$this->load->view('dosen/editprofil', $data);
		$this->load->view('atribut/footer');
	}
	public function ubah()
	{
		$this->load->view('atribut/headeradmin');
		$this->load->view('pages/ubahpass');
		$this->load->view('atribut/footer');
	}
	public function updatedatadosen()
	{
		$data['nama']=$this->input->post('txt_nama');
		$data['nip']=$this->input->post('txt_nip');
		$data['pangkat']=$this->input->post('txt_pangkat');
		$data['golongan']=$this->input->post('txt_gol');
		$data['jabatan']=$this->input->post('txt_jabatan');
		$data['unit']=$this->input->post('txt_unit');
	}
}
