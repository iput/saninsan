<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
*
*/
class Unsur_model extends CI_model
{
	function __construct()
	{
		parent::__construct();
	}
	public function addUnsur($tabel,$data){

		$result = $this->db->insert($tabel,$data);
		return $result;
	}
	public function getUnsur(){
		$this->db->select('*');
		$this->db->from('unsur_kegiatan');
		$query=$this->db->get();
		return $query->result_array();
	}
	
	public function editunsur($id){
		$query = $this->db->query("select * from unsur_kegiatan where id_unsur=?", $id);
		if ($query->num_rows()>0) {
			return $query;
		}else{
			return false;
		}
		
	}

	// public function getSubUnsur($id)
	// {
	// 	$data = $this->db->query('SELECT nama_unsur, nama_sub, id_sub FROM sub_kegiatan JOIN unsur_kegiatan ON sub_kegiatan.id_unsur=unsur_kegiatan.id_unsur where unsur_kegiatan.id_unsur = ?', array($id));
	// 	if ($data) {
	// 		return $data->result_array();
	// 	}else{
	// 		return array();
	// 	}
	// }

	public function updateUnsur($tabel,$data,$param){
		$this->db->where('id_unsur',$param);
		$this->db->update($tabel,$data);
		if ($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function deleteUnsur($id){
		$this->db->where('id_unsur',$id);
		$this->db->delete('unsur_kegiatan');
		if ($this->db->affected_rows() > 0){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
}


	




