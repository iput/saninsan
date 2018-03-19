<?php defined('BASEPATH')OR exit('no direct script access allowed');
/**
  * summary
  */
 class Penelitian extends CI_Controller
 {
     /**
      * summary
      */
     public function __construct()
     {
        parent::__construct();
        $this->load->model('penelitian_model');
     }

     public function index()
     {
     	$data['penelitian']=$this->penelitian_model->get_penelitian();
		$this->load->view('atribut/header');
		$this->load->view('dosen/menudupak/datapenelitian',$data);
		$this->load->view('atribut/footer');
     }

     public function tambah()
     {
     	$data['penelitian']=$this->penelitian_model->getSubPenelitian();
		$this->load->view('atribut/header');
		$this->load->view('dosen/menudupak/tambah/tambah_penelitian',$data);
		$this->load->view('atribut/footer');
     }

    public function addJudul()
	{
		$config['upload_path'] = './docs/';
		$config['allowed_types'] = 'pdf|doc';
		$config['max_size']  = '1000';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload()){
			$error = array('error' => $this->upload->display_errors());
		}
		else{
			$dokumen = $this->upload->data();
			
			$uraian = $this->input->post('cb_uraian');
			$volume = $this->input->post('txt_jumlahv');
			$kredit = $this->penelitian_model->getAngkaKredit($uraian);
			$angkaKredit = "";
			foreach ($kredit as $row) {
				$angkaKredit = $row['angka_kredit'];
			}
			$aKredit = $angkaKredit * $volume;

			$data['id_dosen'] = $this->session->userdata('id');
			$data['unsur'] = 3;
			$data['sub'] = $this->input->post('subPenelitian');
			$data['uraian'] = $uraian;
			$data['judul'] = $this->input->post('txt_judul');
			$data['link']= $this->input->post('txt_link');
			$data['satuan_hasil'] = $this->input->post('txt_satuan');
			$data['lampiran']= $dokumen['file_name'];
			$data['jumlah_ak']= $aKredit;

			$result = $this->penelitian_model->addJudul($data);

			if ($result) {
				$this->session->set_flashdata('sukses', 'Data Berhasil di tambahkan');
				redirect('dosen/Penelitian');
			}
		}



		
	}
	
	public function editPenelitian($tempat)
	{
		$data['editpenelitian']=$this->penelitian_model->ubahPenelitian($judul)->row();
		$data['penelitian']=$this->unsur_model->getUnsur();
		$data['subUnsur']=$this->penelitian_model->get_penelitian();
		$this->load->view('atribut/header');
		$this->load->view('dosen/menudupak/tambah/editPenelitian',$data);
		$this->load->view('atribut/footer');
	}

     public function getUraian()
	{
		$subkegiatan = $_GET['suburaian'];
		$uraian = $this->penelitian_model->getsubUraian($subkegiatan);
		echo json_encode($uraian);
	}
 } ?>