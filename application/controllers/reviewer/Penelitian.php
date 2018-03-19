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
         $this->load->model('Penelitian_model','mdl');
     }

     public function index()
     {
     	$data['penelitian'] = $this->mdl->get_penelitian();
     	$this->load->view('atribut/headerreviewer');
     	$this->load->view('reviewer/Penelitian', $data);
     	$this->load->view('atribut/footer');
     }

     public function review($id)
     {
     	$data['reviewjurnal'] = $this->mdl->reviewJurnal($id)->row();
     	$this->load->view('atribut/headerreviewer');
     	$this->load->view('reviewer/Review', $data);
     	$this->load->view('atribut/footer');	
     }
 } ?>