<?php defined('BASEPATH')OR exit('no direct script access allowed');
/**
  * summary
  */
 class Pendidikan extends CI_Controller
 {
     /**
      * summary
      */
     public function __construct()
     {
         parent::__construct();
		$this->load->model('pendidikan_model');
		$this->load->model('Model_dosen');
		$this->load->model('unsur_model');
		if (!$this->session->userdata('level')=='1') {
			redirect('login');
		}
     }

     public function index()
	{
		$data['pendidikan']=$this->pendidikan_model->get_pendidikan();
		$this->load->view('atribut/header');
		$this->load->view('dosen/menudupak/datapendidikan', $data);
		$this->load->view('atribut/footer');
	}

	public function tambahPendidikan()
	{
		$data['subUnsur']=$this->pendidikan_model->getUraian();
		$this->load->view('atribut/header');
		$this->load->view('dosen/menudupak/tambah/tambah_pend',$data);
		$this->load->view('atribut/footer');
	}

	public function simpanPendidikan()
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
			$kredit = $this->pendidikan_model->getAngkaKredit($uraian);
			$angkaKredit = "";
			foreach ($kredit as $row) {
				$angkaKredit = $row['angka_kredit'];
			}

			$dosen = $this->session->userdata('id');
			$pendidikan = $this->input->post('subPendidikan');
			$tempat = $this->input->post('txt_tempat');
			$tanggal = $this->input->post('txt_tgl');
			$satuanhasil = $this->input->post('txt_satuan');
			
			$data['id_dosen'] = $dosen;
			$data['unsur'] = '1';
			$data['sub'] = $pendidikan;
			$data['uraian'] = $uraian;
			$data['tempat'] = $tempat;
			$data['tanggal'] = $tanggal;
			$data['satuan_hasil'] = $satuanhasil;
			$data['jumlah_ak'] = $angkaKredit;
			$data['lampiran'] = $dokumen['file_name'];

			$result = $this->pendidikan_model->addTempat($data);

			if ($result) {
				$this->session->set_flashdata('sukses', 'Data Berhasil di tambahkan');
				redirect('dosen/Pendidikan');
			}
		}
	}

	public function editPendidikan($tempat)
	{
		$data['editpendidikan']=$this->pendidikan_model->ubahPendidikan($tempat)->row();
		$data['pendidikan']=$this->unsur_model->getUnsur();
		$data['subUnsur']=$this->pendidikan_model->get_pendidikan();
		$this->load->view('atribut/header');
		$this->load->view('dosen/menudupak/tambah/editPendidikan',$data);
		$this->load->view('atribut/footer');
	}

	public function getUraian()
	{
		$subkegiatan = $_GET['suburaian'];
		$uraian = $this->pendidikan_model->getsubUraian($subkegiatan);
		echo json_encode($uraian);
	}

	public function Cetak()
	{
		$data['identitas']=$this->Model_dosen->getIdentitas($this->session->userdata('id'))->row();
		$data['pendidikan'] = $this->pendidikan_model->get_pendidikan();
		$this->load->view('dosen/cetak/cetakPendikan', $data);
	}
 } ?>