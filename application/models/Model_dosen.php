<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
*
*/
class Model_dosen extends CI_model {

	function __construct()
	{
		parent::__construct();
	}

	public function getIdentitas($id)
	{
		$identitas = $this->db->query("SELECT * from dosen where id_dosen=?",array($id));
		return $identitas;
	}

	public function get_unsur_pendidikan($id){
		$unsur = "<option value='0'>Pilih Unsur Kegiatan</option>";
		$this->db->select('id_unsur,nama_unsur');
		$this->db->where('id_unsur',$id);
		$this->db->from('unsur_kegiatan');
		$query = $this->db->get();
		$hasil = $query->result_array();
		foreach ($hasil as $hsl) {
			$unsur.="<option value='$hsl[id_unsur]'>$hsl[nama_unsur]</option>";
		}
		return $unsur;
	}

	public function editDosen($id)
	{
		$data = $this->db->query("SELECT * from dosen where id_dosen=?", array($id));
		return $data;
	}
	public function updatedatadosen($id,$data)
	{
		$this->db->query("update dosen set nama=?,nip=?,pangkat=?,golongan=?,jabatan=?,unit=? where id_dosen=?",array($data['nama'],$data['nip'],$data['pangkat'],$data['golongan'],$data['jabatan'],$data['unit'],$id));
		unset($id,$data);
	}

	public function get_sub_pendidikan($id){
		$unsur = "<option value='0'>Pilih Sub Kegiatan</option>";
		$this->db->select('id_sub,nama_sub');
		$this->db->where('id_unsur',$id);
		$this->db->from('sub_kegiatan');
		$query = $this->db->get();
		$hasil = $query->result_array();
		foreach ($hasil as $hsl) {
			$unsur.="<option value='$hsl[id_sub]'>$hsl[nama_sub]</option>";
		}
		return $unsur;
	}


	public function get_uraian_pendidikan($id){
		$unsur = "<option value='0'>Pilih Uraian Kegiatan</option>";
		$this->db->select('id_uraian,nama_uraian');
		$this->db->where('id_sub',$id);
		$this->db->from('uraian_kegiatan');
		$query = $this->db->get();
		$hasil = $query->result_array();
		foreach ($hasil as $hsl) {
			$unsur.="<option value='$hsl[id_uraian]'>$hsl[nama_uraian]</option>";
		}
		return $unsur;
	}
	// public function get_pengajaran(){
	// 	$query =$this->db->query('select * from unsur_kegiatan');
	// 	return $query->result_array();
	// }
	public function get_unsur($id){
		$unsur = "<option value='0'>Pilih Detail</option>";
		$this->db->select('id_sub,nama_sub');
		$this->db->where('id_unsur',$id);
		$this->db->from('sub_kegiatan');
		$query = $this->db->get();
		$hasil = $query->result_array();
		foreach ($hasil as $hsl) {
			$unsur.="<option value='$hsl[id_sub]'>$hsl[nama_sub]</option>";
		}
		return $unsur;
	}

	// public function get_uraian($id){
	// 	$unsur = "<option value='0'>Pilih Uraian</option>";
	// 	$this->db->select('id_uraian,nama_uraian');
	// 	$this->db->where('id_sub',$id);
	// 	$this->db->from('uraian_kegiatan');
	// 	$query = $this->db->get();
	// 	$hasil = $query->result_array();
	// 	foreach ($hasil as $hsl) {
	// 		$unsur.="<option value='$hsl[id_uraian]'>$hsl[nama_uraian]</option>";
	// 	}
	// 	return $unsur;
	// }
	// public function get_penelitian(){
	// 	$query =$this->db->query('select * from unsur_kegiatan ');
	// 	return $query->result_array();
	// }

	public function get_penelitian(){
		$query =$this->db->query('select * from unsur_kegiatan');
		return $query->result_array();
	}

	public function get_unsur_penelitian($id){
		$unsur = "<option value='0'>Pilih Unsur Kegiatan</option>";
		$this->db->select('id_unsur,nama_unsur');
		$this->db->where('id_unsur',$id);
		$this->db->from('unsur_kegiatan');
		$query = $this->db->get();
		$hasil = $query->result_array();
		foreach ($hasil as $hsl) {
			$unsur.="<option value='$hsl[id_unsur]'>$hsl[nama_unsur]</option>";
		}
		return $unsur;
	}

	public function get_sub_penelitian($id){
		$unsur = "<option value='0'>Pilih Sub Kegiatan</option>";
		$this->db->select('id_sub,nama_sub');
		$this->db->where('id_unsur',$id);
		$this->db->from('sub_kegiatan');
		$query = $this->db->get();
		$hasil = $query->result_array();
		foreach ($hasil as $hsl) {
			$unsur.="<option value='$hsl[id_sub]'>$hsl[nama_sub]</option>";
		}
		return $unsur;
	}


	public function get_uraian_penelitian($id){
		$unsur = "<option value='0'>Pilih Uraian</option>";
		$this->db->select('id_uraian,nama_uraian');
		$this->db->where('id_sub',$id);
		$this->db->from('uraian_kegiatan');
		$query = $this->db->get();
		$hasil = $query->result_array();
		foreach ($hasil as $hsl) {
			$unsur.="<option value='$hsl[id_uraian]'>$hsl[nama_uraian]</option>";
		}
		return $unsur;
	}

	public function get_pengabdian(){
		$query =$this->db->query('select * from unsur_kegiatan');
		return $query->result_array();
	}
	public function get_unsur_pengabdian($id){
		$unsur = "<option value='0'>Pilih Detail</option>";
		$this->db->select('id_sub,nama_sub');
		$this->db->where('id_unsur',$id);
		$this->db->from('sub_kegiatan');
		$query = $this->db->get();
		$hasil = $query->result_array();
		foreach ($hasil as $hsl) {
			$unsur.="<option value='$hsl[id_sub]'>$hsl[nama_sub]</option>";
		}
		return $unsur;
	}

	public function get_uraian_pengabdian($id){
		$unsur = "<option value='0'>Pilih Uraian</option>";
		$this->db->select('id_uraian,nama_uraian');
		$this->db->where('id_sub',$id);
		$this->db->from('uraian_kegiatan');
		$query = $this->db->get();
		$hasil = $query->result_array();
		foreach ($hasil as $hsl) {
			$unsur.="<option value='$hsl[id_uraian]'>$hsl[nama_uraian]</option>";
		}
		return $unsur;
	}
	public function get_penunjang(){
		$query =$this->db->query('select * from unsur_kegiatan');
		return $query->result_array();
	}
	public function get_unsur_penunjang($id){
		$unsur = "<option value='0'>Pilih Detail</option>";
		$this->db->select('id_sub,nama_sub');
		$this->db->where('id_unsur',$id);
		$this->db->from('sub_kegiatan');
		$query = $this->db->get();
		$hasil = $query->result_array();
		foreach ($hasil as $hsl) {
			$unsur.="<option value='$hsl[id_sub]'>$hsl[nama_sub]</option>";
		}
		return $unsur;
	}

	public function get_uraian_penunjang($id){
		$unsur = "<option value='0'>Pilih Uraian</option>";
		$this->db->select('id_uraian,nama_uraian');
		$this->db->where('id_sub',$id);
		$this->db->from('uraian_kegiatan');
		$query = $this->db->get();
		$hasil = $query->result_array();
		foreach ($hasil as $hsl) {
			$unsur.="<option value='$hsl[id_uraian]'>$hsl[nama_uraian]</option>";
		}
		return $unsur;
	}

	public function getJurusan()
	{
		$data = $this->db->query("SELECT * FROM jurusan");
		if ($data->num_rows()>0) {
			return $data->result_array();
		}else{
			return array();
		}
	}

	public function tambahDosen($data)
	{
		$this->db->insert('dosen', $data);
		if ($this->db->affected_rows()) {
			return true;
		}else{
			return false;
		}
	}

	public function dataDosen()
	{
		$this->db->select("*");
		$this->db->from("dosen");
		$this->db->join("jurusan","dosen.id_jur=jurusan.id_jur");
		$data = $this->db->get();
		if ($data->num_rows()>0) {
			return $data->result_array();
		}else{
			return array();
		}
	}
}
