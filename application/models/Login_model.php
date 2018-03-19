<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
*
*/
class Login_model extends CI_model {
	
	function __construct()
	{
		parent::__construct();
	}
	
	function login($username,$password){
		$query = $this->db->query("SELECT * from dosen where username = ? and password=? ", array($username, $password));
		if ($query) {
			return $query;
		}else{
			return false;
		}
		
		$query = null;
		unset($username, $password);
	}
	public function ac_master($id_s){
		$query_m=$this->db->query("select*from dosen where id_dosen='$id_d'");
		return $query_m->row();
	}
        
        public function getFakultas(){
            $data = $this->db->query("select * from fakultas");
            return $data->result_array();
        }
        
        public function Bidang(){
            $data = $this->db->query("SELECT * from bidang_keahlian");
            return $data->result_array();
        }

        public function getDataBidang($data)
        {
        	$this->db->select('*');
			$this->db->from('bidang_keahlian');
			$this->db->join('fakultas', 'bidang_keahlian.id_fk = fakultas.id_fak', 'left');
			$this->db->where('bidang_keahlian.id_fk', $data);
			$dataBidang = $this->db->get();
			return $dataBidang->result();
        }

        public function getDataJurusan($data)
        {
        	$this->db->select('*');
			$this->db->from('jurusan');
			$this->db->join('fakultas', 'jurusan.id_fak = fakultas.id_fak', 'left');
			$this->db->where('jurusan.id_fak', $data);
			$dataBidang = $this->db->get();
			return $dataBidang->result();
        }

        public function newReviewer($data)
        {
        	$this->db->query("INSERT into dosen(nama, id_bidang,id_jur,jabatan, username ,password, level) values(?,?,?,?,?,?,?)", array($data['nama'], $data['bidang'],$data['jurusan'], $data['jabatan'], $data['username'], $data['password'], $data['level']));
        	unset($data);
        }
}
 ?>