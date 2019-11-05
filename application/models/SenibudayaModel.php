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
		$this->db->select('j2s.id_j2_senibudaya, j2s.nama_j2_senibudaya');
		$this->db->from('j2_senibudaya as j2s');
		$res=$this->db->get();

		return DataStructure::keyValue($res->result_array(), 'id_j2_senibudaya');
	}

  public function getAllSenibudaya($filter = []){
		$this->db->select('*');
		$this->db->from('senibudaya as cb');
		$this->db->join("j_senibudaya as js", "js.id_j_senibudaya = cb.id_j_senibudaya");
		$this->db->join("j2_senibudaya as j2s", "j2s.id_j2_senibudaya = cb.id_j2_senibudaya");
		//$this->db->join("status_penetapan_senibudaya as sp", "sp.id_status_penetapan_senibudaya = cb.status_penetapan");
		if(!empty($filter['id_senibudaya'])) $this->db->where('cb.id_senibudaya', $filter['id_senibudaya']);

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
	    $dataInsert = DataStructure::slice($data, ['id_j_senibudaya','id_j2_senibudaya','nama','jumlahanggota','lokasi','file','deskripsi']);
	    $this->db->insert('senibudaya', $dataInsert);
	    ExceptionHandler::handleDBError($this->db->error(), "Insert Senibudaya", "senibudaya");
	    return $this->db->insert_id();
	}
	
	public function editSenibudaya($data){
		$this->db->set(DataStructure::slice($data,  ['id_j_senibudaya','id_j2_senibudaya','nama','jumlahanggota','lokasi','file','deskripsi']));
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