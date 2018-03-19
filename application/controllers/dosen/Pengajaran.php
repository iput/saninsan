<?php defined('BASEPATH')OR exit('no direct script access allowed');
/**
  * summary
  */
 class Pengajaran extends CI_Controller
 {
     /**
      * summary
      */
     public function __construct()
     {
         parent::__construct();
         $this->load->model('pengajaran_model');
         $this->load->model('unsur_model');
     }

     public function index()
     {
     	$data['pengajaran']=$this->pengajaran_model->get_pengajaran();
		$this->load->view('atribut/header');
		$this->load->view('dosen/menudupak/datapengajaran',$data);
		$this->load->view('atribut/footer');
     }
     public function tambahPengajaran()
	{
		$data['pengajaran']=$this->pengajaran_model->getSubPengajaran();
		$this->load->view('atribut/header');
		$this->load->view('dosen/menudupak/tambah/tambah_pengajaran',$data);
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
      $sks = $this->input->post('txt_sks');
      $kredit = $this->pengajaran_model->getAngkaKredit($uraian);
      $angkaKredit = "";
      foreach ($kredit as $row) {
        $angkaKredit = $row['angka_kredit'];
      }
      $jumlah_ak = $sks * $angkaKredit;

      $judul = $this->input->post('txt_mk');
      $data['id_dosen'] = $this->session->userdata('id');
      $data['unsur'] = 2;
      $data['sub'] = $this->input->post('subPengajaran');
      $data['uraian'] = $this->input->post('cb_uraian');
      $data['mk'] = $this->input->post('txt_mk');
      $data['sks']= $sks;
      $data['smt']= $this->input->post('txt_smt');
      $data['tahun_aka']= $this->input->post('txt_tahun');
      $data['tempat']= $this->input->post('txt_tempat');
      $data['tanggal']= $this->input->post('txt_tgl');
      $data['satuan_hasil'] = $this->input->post('txt_satuan');
      $data['jumlah_ak']= $jumlah_ak;
      $data['lampiran']= $dokumen['file_name'];

      $result = $this->pengajaran_model->addMK($data);
      $array = array(
        'sukses' => 'Data Pengajaran Berhasil disimpan'
      );
      
      $this->session->set_flashdata($array);
      redirect('dosen/Pengajaran');
    }
  }

	public function getUraian()
	{
		$pengajaran = $_GET['pengajaran'];
		$uraian = $this->pengajaran_model->getSubUraian($pengajaran);
		echo json_encode($uraian);
	}
  public function editPengajaran($tempat)
  {
    $data['editpengajaran']=$this->pengajaran_model->ubahPengajaran($tempat)->row();
    $data['pengajaran']=$this->unsur_model->getUnsur();
    $data['subUnsur']=$this->pengajaran_model->get_pengajaran();
    $this->load->view('atribut/header');
    $this->load->view('dosen/menudupak/tambah/editPengajaran',$data);
    $this->load->view('atribut/footer');
  }

 } ?>