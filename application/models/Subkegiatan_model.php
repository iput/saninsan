<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
*
*/
class Subkegiatan_model extends CI_model
{
	function __construct()
	{
		parent::__construct();
	}
	public function addSubkegiatan($tabel,$data){
		$result = $this->db->insert($tabel,$data);
		return $result;
	}
	public function getSubkegiatan(){
		$this->db->select('*');
		$this->db->from('sub_kegiatan');
		$query=$this->db->get();
		return $query->result_array();
	}
	public function lihatunsur(){
	   $query =	$this->db->query("select sub_kegiatan.id_sub AS id_sub,sub_kegiatan.id_unsur AS id_unsur, unsur_kegiatan.nama_unsur AS nama_unsur, sub_kegiatan.nama_sub AS nama_sub from unsur_kegiatan, sub_kegiatan where sub_kegiatan.id_unsur = unsur_kegiatan.id_unsur order by sub_kegiatan.id_sub ASC" );
		// $this->db->query("select * from unsur_kegiatan, sub_kegiatan where sub_kegiatan.id_unsur = unsur_kegiatan.id_unsur" );
		
		return $query->result_array();
	}
	public function editSubkegiatan($id){
		$query = $this->db->query("select * from sub_kegiatan where id_sub=?", $id);
		if ($query->num_rows()>0) {
			return $query;
		}else{
			return false;
		}
		
	}
	public function updatesub($tabel,$data,$param){
		$this->db->where('id_sub',$param);
		$this->db->update($tabel,$data);
		if ($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function deleteSubkegiatan($id){
		$this->db->where('id_sub',$id);
		$this->db->delete('sub_kegiatan');
		if ($this->db->affected_rows() > 0){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
}

