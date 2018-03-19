<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Login_model', 'logg');
    }

    public function filter($data) {
        $data = preg_replace('/[^a-zA-Z0-9]/', '', $data);
        return $data;
        unset($data);
    }

    public function index() {
        $this->load->view('login');
    }
    public function Register(){
        $data['fakultas'] = $this->logg->getFakultas();
        $this->load->view('Register', $data);
    }

    public function authentification() {
        $username = $this->input->post('txtusername');
        $password = sha1($this->input->post('txtpassword'));

        $username = $this->filter($username);
        $password = $this->filter($password);

        $data = $this->logg->login($username, $password)->row();
        if ($data > 0) {
            $session_data = array(
                "username" => $data->username,
                "level" => $data->level,
                "nip" => $data->nip,
                "id" => $data->id_dosen);
            $this->session->set_userdata($session_data);

            if ($this->session->userdata('level') == '1') {
                redirect('Dashboard');
            }else if($this->session->userdata('level')=='2'){
                redirect('reviewer/Reviewer');
            }else if($this->session->userdata('level')=='3'){
                redirect('admin/Admin','refresh');
            }else {
                $this->session->set_flashdata('gagal', 'Anda tidak terdaftar dalam sistem');
                redirect('Login');
            }
        }else{
            $this->session->set_flashdata('gagal', 'Anda tidak terdaftar dalam sistem');
            redirect('Login');
        }
    }

    public function getBidang()
    {
        $bidang = $_GET['bidang'];
        $dataBidang = $this->logg->getDataBidang($bidang);
        echo json_encode($dataBidang);
    }

    public function getJurusan()
    {
        $bidang = $_GET['bidang'];
        $dataBidang = $this->logg->getDataJurusan($bidang);
        echo json_encode($dataBidang);
    }

    public function daftarReviewer()
    {
        $data['nama'] = $this->input->post('nama');
        $data['bidang'] = 1;
        $data['jurusan'] = 1;
        $data['jabatan'] = 1;
        $data['username'] = $this->input->post('username');
        $data['password'] = sha1($this->input->post('password'));
        $data['level'] = $this->input->post('levelPengguna');
        $this->logg->newReviewer($data);
        $this->session->set_flashdata('sukses', 'Data Berhasil diregistrasi.\nSilahkan Login untuk melakukan review jurnal');
        redirect('login/Register','refresh');

    }

    public function logout()
    {

    }

}

?>