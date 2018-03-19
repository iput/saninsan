<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menudupak extends CI_Controller {

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
	function __construct(){
		parent::__construct();
		$this->load->model('model_dosen');
		$this->load->model('unsur_model');
		$this->load->model('pengabdian_model');
		$this->load->model('pendidikan_model');
		$this->load->model('penelitian_model');
		$this->load->model('penunjang_model');
		$this->load->model('pengajaran_model');
		if (!$this->session->userdata('level')=='1') {
			redirect('login');
		}
	}
	
	public function editPendidikan(){
		$id=$this->input->post('edit_idpendidikan');
		$data=array(
			"tempat"=>$this->input->post('txt_tempat')
		);
		$result=$this->unsur_model->editPendidikan('pendidikan',$data,$id);
		if ($result>=0) {
			redirect('dosen/Menudupak');
		}else{
			redirect('dosen/Menudupak');
		}
	}
	public function deletePendidikan($id){
		$result =$this->pendidikan_model->deletePendidikan($id);
		if($result>=1){
			redirect('dosen/Menudupak');
		}

	}
	public function deletePengajaran($id){
		$result =$this->pengajaran_model->deletePengajaran($id);
		if($result>=1){
			redirect('dosen/Menudupak');
		}

	}

public function deletePenelitian($id){
		$result =$this->penelitian_model->deletePenelitian($id);
		if($result>=1){
			redirect('dosen/Menudupak');
		}

	}

public function deletePengabdian($id){
		$result =$this->pengabdian_model->deletePengabdian($id);
		if($result>=1){
			redirect('dosen/Menudupak');
		}

	}

public function deletePenunjang($id){
		$result =$this->penunjang_model->deletePenunjang($id);
		if($result>=1){
			redirect('dosen/Menudupak');
		}

	}

	
	public function getJudul($judul)
	{
		$data['penelitian']=$this->penelitian_model->getJudul($judul)->row();
		$this->load->view('atribut/header');
		$this->load->view('dosen/menudupak/tambah/tambah_penelitian',$data);
		$this->load->view('atribut/footer');
	}
	
	public function getMK($mk)
	{
		$data['pengajaran']=$this->pengajaran_model->getMK($mk)->row();
		$this->load->view('atribut/header');
		$this->load->view('dosen/menudupak/tambah/tambah_pengajaran',$data);
		$this->load->view('atribut/footer');
	}
	
	public function getKegiatan($kegiatan)
	{
		$data['pengabdian']=$this->pengabdian_model->getKegiatan($kegiatan)->row();
		$this->load->view('atribut/header');
		$this->load->view('dosen/menudupak/tambah/tambah_pengabdian',$data);
		$this->load->view('atribut/footer');
	}
	
	public function getKegiatan_p($kegiatan_p)
	{
		$data['penunjang']=$this->penunjang_model->getKegiatan_p($kegiatan_p)->row();
		$this->load->view('atribut/header');
		$this->load->view('dosen/menudupak/tambah/tambah_penunjang',$data);
		$this->load->view('atribut/footer');
	}

	//PENGAMBILAN UNSUR//
	
	function  get_unsur(){
		$modul = $this->input->post('modul');
		$id = $this->input->post('id');

			if ($modul == "unsur"){
				echo $this->model_dosen->get_unsur($id);
			}else if($modul == "sub"){
				echo $this->model_dosen->get_sub($id);
			}else{
				echo $this->model_dosen->get_uraian($id);
			}
	}

	function  get_unsur_penelitian(){
		$modul = $this->input->post('modul');
		$id = $this->input->post('id');

			if ($modul == "unsur_penelitian"){
				echo $this->model_dosen->get_unsur_penelitian($id);
			}else{
				echo $this->model_dosen->get_uraian_penelitian($id);
			}

	}

	function  get_unsur_pengabdian(){
		$modul = $this->input->post('modul');
		$id = $this->input->post('id');

			if ($modul == "unsur_pengabdian"){
				echo $this->model_dosen->get_unsur_pengabdian($id);
			}else{
				echo $this->model_dosen->get_uraian_pengabdian($id);
			}
	}
	function  get_unsur_pendidikan(){
		$modul = $this->input->post('modul');
		$id = $this->input->post('id');

			if ($modul == "unsur_pendidikan"){
				echo $this->model_dosen->get_unsur_pendidikan($id);
			}else if($modul == "sub_pendidikan"){
				echo $this->model_dosen->get_sub_pendidikan($id);
			}else{
				echo $this->model_dosen->get_uraian_pendidikan($id);
			}
	}
	function  get_unsur_penunjang(){
		$modul = $this->input->post('modul');
		$id = $this->input->post('id');

			if ($modul == "unsur_penunjang"){
				echo $this->model_dosen->get_unsur_penunjang($id);
			}else{
				echo $this->model_dosen->get_uraian_penunjang($id);
			}

	}

}

	


