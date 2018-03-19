<?php defined('BASEPATH')OR exit('no direct script access allowed');
/**
  * summary
  */
 class Pengabdian extends CI_Controller
 {
     /**
      * summary
      */
     public function __construct()
     {
         parent::__construct();
         $this->load->model('pengabdian_model');
         $this->load->model('unsur_model');
     }

     public function index()
     {
     	$data['pengabdian']=$this->pengabdian_model->get_pengabdian();
		$this->load->view('atribut/header');
		$this->load->view('dosen/menudupak/datapengabdian',$data);
		$this->load->view('atribut/footer');
     }
     public function tambahPengabdian()
	{
		$data['pengabdian']=$this->pengabdian_model->getSubPengabdian();
		$this->load->view('atribut/header');
		$this->load->view('dosen/menudupak/tambah/tambah_pengabdian',$data);
		$this->load->view('atribut/footer');
	}

  public function addMK()
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
      $jumlah_volume = $this->input->post('txt_jumlahv');
      $kredit = $this->pengabdian_model->getAngkaKredit($uraian);
      $angkaKredit = "";
      foreach ($kredit as $row) {
        $angkaKredit = $row['angka_kredit'];
      }
      $jumlah_ak = $jumlah_volume * $angkaKredit;

      $judul = $this->input->post('txt_mk');
      $data['id_dosen'] = $this->session->userdata('id');
      $data['unsur'] = 2;
      $data['sub'] = $this->input->post('subPengabdian');
      $data['uraian'] = $this->input->post('cb_uraian');
      $data['kegiatan'] = $this->input->post('txt_keg');
      $data['bentuk']= $this->input->post('txt_bentuk');
      $data['tempat']= $this->input->post('txt_tempat');
      $data['tanggal']= $this->input->post('txt_tgl');
      $data['satuan_hasil'] = $this->input->post('txt_satuan');
      $data['jumlah_ak']= $jumlah_ak;
      $data['lampiran']= $dokumen['file_name'];

      $result = $this->pengabdian_model->addKegiatan($data);
      $array = array(
        'sukses' => 'Data Pengabdian Berhasil disimpan'
      );
      
      $this->session->set_flashdata($array);
      redirect('dosen/Pengabdian');
    }
  }

	public function getUraian()
	{
		$pengabdian = $_GET['pengabdian'];
		$uraian = $this->pengabdian_model->getSubUraian($pengabdian);
		echo json_encode($uraian);
	}
  public function editPengabdian($tempat)
  {
    $data['editpengabdian']=$this->pengabdian_model->ubahPengabdian($tempat)->row();
    $data['pengabdian']=$this->unsur_model->getUnsur();
    $data['subUnsur']=$this->pengabdian_model->get_pengabdian();
    $this->load->view('atribut/header');
    $this->load->view('dosen/menudupak/tambah/editPengabdian',$data);
    $this->load->view('atribut/footer');
  }

 } ?>