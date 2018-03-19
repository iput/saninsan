<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
*
*/
class Penunjang_model extends CI_model
{
	function __construct()
	{
		parent::__construct();
	}
	
	public function addKegiatan_p($data){

		$result = $this->db->insert('penunjang',$data);
		return $result;
	}
	public function getKegiatan_p(){
		$this->db->select('*');
		$this->db->from('penunjang');
		$query=$this->db->get();
		return $query->result_array();
	}
	
	public function get_penunjang(){
		$this->db->select('*');
		$this->db->from('penunjang');
		$this->db->join('uraian_kegiatan', 'penunjang.uraian = uraian_kegiatan.id_uraian', 'left');
		$this->db->join('sub_kegiatan', 'uraian_kegiatan.id_sub = sub_kegiatan.id_sub', 'left');
		$this->db->join('unsur_kegiatan', 'sub_kegiatan.id_unsur = unsur_kegiatan.id_unsur', 'left');
		$this->db->where('unsur_kegiatan.id_unsur=5');
		$data = $this->db->get();
		if ($data) {
			return $data->result_array();
		}else{
			return array();
		}
	}

	public function getSubPenunjang()
	{
		$data = $this->db->query("SELECT * FROM sub_kegiatan WHERE id_unsur=5");
		return $data->result_array();
	}

	public function getSubUraian($uraian)
	{
		$this->db->select('*');
		$this->db->from('uraian_kegiatan');
		$this->db->join('sub_kegiatan', 'uraian_kegiatan.id_sub = sub_kegiatan.id_sub', 'left');
		$this->db->where('uraian_kegiatan.id_sub', $uraian);
		$data = $this->db->get();
		return $data->result();
	}

	public function getAngkaKredit($uraian)
	{
		$data =$this->db->query('select * from uraian_kegiatan where id_uraian=?', array($uraian));
		return $data->result_array();
	}
	public function deletePenunjang($id){
		$this->db->where('id_penunjang',$id);
		$this->db->delete('penunjang');
		if ($this->db->affected_rows() > 0){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
}


	




