<?php
defined('BASEPATH') OR exit('no direct script access allowed');
/**
 * summary
 */
class Kegiatan extends CI_Controller
{
    /**
     * summary
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library('upload');
		date_default_timezone_get("Asia/Jakarta");
		$this->load->model('unsur_model');
		$this->load->model('subkegiatan_model');
		$this->load->model('uraian_model');
    }

    public function index()
    {
    	$data ['unsur_kegiatan']=$this->unsur_model->getUnsur();
		$this->load->view('admin/menumaster/unsur',$data);
    }

    public function subkegiatan($id)
    {
    	$data['unsur_kegiatan'] = $this->unsur_model->getUnsur();
    	$data['subunsur'] = $this->unsur_model->getSubUnsur($id);
    	$this->load->view('atribut/headeradmin');
		$this->load->view('admin/menumaster/subunsur',$data);
		$this->load->view('atribut/footer');
    }
    public function uraian($id)
    {
        $data['unsur'] = $this->unsur_model->editunsur($id)->row();
        $data['subunsur'] = $this->unsur_model->getSubUnsur($id);
        $data['uraian'] = $this->unsur_model->getUraian($id);
        $this->load->view('atribut/headeradmin');
        $this->load->view('admin/menumaster/uraian',$data);
        $this->load->view('atribut/footer');
    }
}

 ?>