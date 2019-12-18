<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SenibudayaModel extends CI_Model {

    

	public function getAllJOption($filter = []){
		$this->db->select('ko.id_j_senibudaya, ko.nama_j_senibudaya');
		$this->db->from('j_senibudaya as ko');
		$res=$this->db->get();

		return DataStructure::keyValue($res->result_array(), 'id_j_senibudaya');
    }
	

	public function getAllJ2Option($filter = []){
		$this->db->select('j2s.id_j2_senibudaya,j2s.id_j_senibudaya, j2s.nama_j2_senibudaya');
		$this->db->from('j2_senibudaya as j2s');
		
		$res=$this->db->get();

		return DataStructure::keyValue($res->result_array(), 'id_j2_senibudaya');
	}

  public function getAllSenibudaya($filter = []){
		$this->db->select('*');
		$this->db->from('senibudaya as cb');
		$this->db->join("j_senibudaya as js", "js.id_j_senibudaya = cb.id_j_senibudaya");
		$this->db->join("j2_senibudaya as j2s", "j2s.id_j2_senibudaya = cb.id_j2_senibudaya");
		$this->db->join("kabupaten as kab", "kab.id_kabupaten = cb.id_kabupaten");
		//$this->db->join("status_penetapan_senibudaya as sp", "sp.id_status_penetapan_senibudaya = cb.status_penetapan");
		if(!empty($filter['id_senibudaya'])) $this->db->where('cb.id_senibudaya', $filter['id_senibudaya']);
		if(!empty($this->session->userdata('id_kabupaten'))) $this->db->where('cb.id_kabupaten', $this->session->userdata('id_kabupaten'));
	    $res = $this->db->get();
	    return DataStructure::keyValue($res->result_array(), 'id_senibudaya');
	}

	public function getSenibudaya($idSenibudaya = NULL){
		$row = $this->getAllSenibudaya(['id_senibudaya' => $idSenibudaya]);
		if (empty($row)){
			throw new UserException("Senibudaya yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
		}
		return $row[$idSenibudaya];
	}

	  public function addSenibudaya($data){
		$data['id_user_entry'] = $this->session->userdata('id_user');
		if($this->session->userdata('id_role') == '1'){

		}else{
		  $data['id_kabupaten'] = $this->session->userdata('id_kabupaten');
	  };
	    $dataInsert = DataStructure::slice($data, ['tahun_terdata','id_user_entry','id_kabupaten','id_j_senibudaya','id_j2_senibudaya','nama','jumlahanggota','lokasi','deskripsi']);
	    $this->db->insert('senibudaya', $dataInsert);
	    ExceptionHandler::handleDBError($this->db->error(), "Insert Senibudaya", "senibudaya");
	    return $this->db->insert_id();
	}
	
	public function editSenibudaya($data){
		$data['id_user_entry'] = $this->session->userdata('id_user');
		//$data['id_kabupaten'] = $this->session->userdata('id_kabupaten');
		if($this->session->userdata('id_role') == '1'){
			$this->db->set(DataStructure::slice($data,  ['tahun_terdata','id_user_entry','id_kabupaten','id_j_senibudaya','id_j2_senibudaya','nama','jumlahanggota','lokasi','file','deskripsi']));
		}else{
			$this->db->set(DataStructure::slice($data,  ['tahun_terdata','id_user_entry','id_j_senibudaya','id_j2_senibudaya','nama','jumlahanggota','lokasi','file','deskripsi']));
			
		}
			$this->db->where('id_senibudaya', $data['id_senibudaya']);
		$this->db->update('senibudaya');

		ExceptionHandler::handleDBError($this->db->error(), "Ubah Senibudaya", "senibudaya");	
		return $data['id_senibudaya'];
	}
	
	public function deleteSenibudaya($data){
		$this->db->where('id_senibudaya', $data['id_senibudaya']);
		$this->db->delete('senibudaya');

    ExceptionHandler::handleDBError($this->db->error(), "Hapus Senibudaya", "senibudaya");
	}




}