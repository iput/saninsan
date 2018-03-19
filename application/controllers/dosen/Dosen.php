<?php defined('BASEPATH')OR exit('no direct script access allowed');
/**
 * summary
 */
class Dosen extends CI_Controller
{
    /**
     * summary
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
    	$this->load->view('atribut/header');
    	$this->load->view('dosen/main');
    	$this->load->view('atribut/footer');
    }
}
 ?>