<?php defined('BASEPATH')OR exit('no direct script access allowed');
/**
  * summary
  */
 class Penunjang extends CI_Controller
 {
     /**
      * summary
      */
     public function __construct()
     {
         parent::__construct();
         $this->load->model('penunjang_model');
         $this->load->model('unsur_model');
     }

     public function index()
     {
     	$data['penunjang']=$this->penunjang_model->get_penunjang();
		$this->load->view('atribut/header');
		$this->load->view('dosen/menudupak/datapenunjang',$data);
		$this->load->view('atribut/footer');
     }
     public function tambahPenunjang()
	{
		$data['penunjang']=$this->penunjang_model->getSubPenunjang();
		$this->load->view('atribut/header');
		$this->load->view('dosen/menudupak/tambah/tambah_penunjang',$data);
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
      $kredit = $this->penunjang_model->getAngkaKredit($uraian);
      $angkaKredit = "";
      foreach ($kredit as $row) {
        $angkaKredit = $row['angka_kredit'];
      }
      $jumlah_ak = $jumlah_volume * $angkaKredit;

      $data['id_dosen'] = $this->session->userdata('id');
      $data['unsur'] = 2;
      $data['sub'] = $this->input->post('subPenunjang');
      $data['uraian'] = $this->input->post('cb_uraian');
      $data['kegiatan'] = $this->input->post('txt_keg');
      $data['tingkat']= $this->input->post('txt_tingkat');
      $data['tempat']= $this->input->post('txt_tempat');
      $data['tanggal']= $this->input->post('txt_tgl');
      $data['satuan_hasil'] = $this->input->post('txt_satuan');
      $data['jumlah_ak']= $jumlah_ak;
      $data['lampiran']= $dokumen['file_name'];

      $result = $this->penunjang_model->addKegiatan_p($data);
      $array = array(
        'sukses' => 'Data Penunjang Berhasil disimpan'
      );
      
      $this->session->set_flashdata($array);
      redirect('dosen/Penunjang');
    }
  }

	public function getUraian()
	{
		$penunjang = $_GET['penunjang'];
		$uraian = $this->penunjang_model->getSubUraian($penunjang);
		echo json_encode($uraian);
	}
  public function editPenunjang($tempat)
  {
    $data['editpenunjang']=$this->penunjang_model->ubahPenunjang($tempat)->row();
    $data['penunjang']=$this->unsur_model->getUnsur();
    $data['subUnsur']=$this->penunjang_model->get_penunjang();
    $this->load->view('atribut/header');
    $this->load->view('dosen/menudupak/tambah/editPenunjang',$data);
    $this->load->view('atribut/footer');
  }

 } ?>