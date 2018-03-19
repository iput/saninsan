<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
*
*/
class Uraian_model extends CI_model
{
	function __construct()
	{
		parent::__construct();
	}
	public function addUraian($tabel,$data){
		$result = $this->db->insert($tabel,$data);
		return $result;
	}
	public function getUraian(){
		$this->db->select('*');
		$this->db->from('uraian_kegiatan');
		$query=$this->db->get();
		return $query->result_array();
	}
	public function lihaturaian(){
		$this->db->select('*');
		$this->db->from('uraian_kegiatan');
		$this->db->join('sub_kegiatan','uraian_kegiatan.id_sub=sub_kegiatan.id_sub');
		$this->db->join('unsur_kegiatan','sub_kegiatan.id_unsur=unsur_kegiatan.id_unsur');
		$query = $this->db->get();
		if ($query->num_rows()>-0) {
			return $query->result_array();
		}else{
			return array();
		}
	}
	public function editUraian($id){
		$query = $this->db->query("select * from uraian_kegiatan where id_uraian=?", $id);
		if ($query->num_rows()>0) {
			return $query;
		}else{
			return false;
		}
		
	}
	public function updateuraian($tabel,$data,$param){
		$this->db->where('id_uraian',$param);
		$this->db->update($tabel,$data);
		if ($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function deleteUraian($id){
		$this->db->where('id_uraian',$id);
		$this->db->delete('uraian_kegiatan');
		if ($this->db->affected_rows() > 0){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
}

