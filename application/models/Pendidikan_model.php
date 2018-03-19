<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
*
*/
class Pendidikan_model extends CI_model
{
	function __construct()
	{
		parent::__construct();
	}
	
	public function addTempat($data){

		$result = $this->db->insert('pendidikan',$data);
		return $result;
	}
	public function getTempat(){
		$this->db->select('*');
		$this->db->from('pendidikan');
		$query=$this->db->get();
		return $query->result_array();
	}
	public function ubahPendidikan($tempat){
		$this->db->select('*');
		$this->db->from('pendidikan');
		$this->db->where('tempat',$tempat);
		$query = $this->db->get();
		return $query;
	}
	public function get_pendidikan(){
		$this->db->select('*');
		$this->db->from('pendidikan');
		$this->db->join('uraian_kegiatan', 'pendidikan.uraian = uraian_kegiatan.id_uraian', 'left');
		$this->db->join('sub_kegiatan', 'uraian_kegiatan.id_sub = sub_kegiatan.id_sub', 'left');
		$this->db->join('unsur_kegiatan', 'sub_kegiatan.id_unsur = unsur_kegiatan.id_unsur', 'left');
		$this->db->where('unsur_kegiatan.id_unsur=1');
		$data = $this->db->get();
		if ($data) {
			return $data->result_array();
		}else{
			return array();
		}
	}

	public function getUraian()
	{
		$data = $this->db->query("SELECT * FROM sub_kegiatan where id_unsur=1");
		return $data->result_array();
	}

	public function editPendidikan($tabel,$data,$param){
		$this->db->where('id_pendidikan',$param);
		$this->db->update($tabel,$data);
		if ($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function deletePendidikan($id){
		$this->db->where('id_pendidikan',$id);
		$this->db->delete('pendidikan');
		if ($this->db->affected_rows() > 0){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	public function getsubUraian($subUnsur)
	{
		$this->db->select('*');
		$this->db->from('uraian_kegiatan');
		$this->db->join('sub_kegiatan', 'uraian_kegiatan.id_sub = sub_kegiatan.id_sub', 'left');
		$this->db->where('uraian_kegiatan.id_sub', $subUnsur);
		$data = $this->db->get();
		return $data->result();
	}
	public function getAngkaKredit($uraian)
	{
		$data =$this->db->query('select * from uraian_kegiatan where id_uraian=?', array($uraian));
		return $data->result_array();
	}
}


	




