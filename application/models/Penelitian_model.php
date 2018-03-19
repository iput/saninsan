<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
*
*/
class Penelitian_model extends CI_model
{
	function __construct()
	{
		parent::__construct();
	}
	
	public function addJudul($data){

		$result = $this->db->insert('penelitian',$data);
		return $result;
	}
	public function getJudul_id($judul){
		$this->db->select('*');
		$this->db->from('penelitian');
		$this->db->where('judul',$judul);
		$query = $this->db->get();
		return $query;
	}
	public function get_penelitian(){
		$query =$this->db->query('SELECT * FROM penelitian JOIN unsur_kegiatan ON penelitian.`unsur`=unsur_kegiatan.`id_unsur` JOIN sub_kegiatan ON penelitian.`sub`=sub_kegiatan.`id_sub` JOIN `uraian_kegiatan` ON penelitian.`uraian`=`uraian_kegiatan`.`id_uraian` JOIN dosen ON penelitian.`id_dosen`=dosen.`id_dosen`');
		return $query->result_array();
	}

	public function ubahPenelitian($judul){
		$this->db->select('*');
		$this->db->from('penelitian');
		$this->db->where('judul',$judul);
		$query = $this->db->get();
		return $query;
	}

	public function editPenelitian($tabel,$data,$param){
		$this->db->where('id_penelitian',$param);
		$this->db->update($tabel,$data);
		if ($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function deletePenelitian($id){
		$this->db->where('id_penelitian',$id);
		$this->db->delete('penelitian');
		if ($this->db->affected_rows() > 0){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	public function reviewJurnal($id)
	{
		$this->db->select('*');
		$this->db->from('penelitian');
		$this->db->join('dosen', 'penelitian.id_dosen = dosen.id_dosen', 'left');
		$data = $this->db->get();
		return $data;
	}
	
	public function getSubPenelitian()
	{
		$data = $this->db->query("SELECT * FROM sub_kegiatan WHERE id_unsur=3");
		return $data->result_array();
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


	




