<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SaranaprasaranaModel extends CI_Model {

    

	public function getAllJenisOption($filter = []){
		$this->db->select('ko.id_jenis_saranaprasarana, ko.nama_jenis_saranaprasarana');
		$this->db->from('jenis_saranaprasarana as ko');
		$res=$this->db->get();

		return DataStructure::keyValue($res->result_array(), 'id_jenis_saranaprasarana');
	}
	
  public function getAllSaranaprasarana($filter = []){
		$this->db->select('*');
		$this->db->from('senibudaya_saranaprasarana as cb');
		$this->db->join("jenis_saranaprasarana as mk", "mk.id_jenis_saranaprasarana = cb.id_jenis_saranaprasarana");
		if(!empty($filter['id_saranaprasarana'])) $this->db->where('cb.id_saranaprasarana', $filter['id_saranaprasarana']);

	    $res = $this->db->get();
	    return DataStructure::keyValue($res->result_array(), 'id_saranaprasarana');
	}

	public function getSaranaprasarana($idSaranaprasarana = NULL){
		$row = $this->getAllSaranaprasarana(['id_saranaprasarana' => $idSaranaprasarana]);
		if (empty($row)){
			throw new UserException("Saranaprasarana yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
		}
		return $row[$idSaranaprasarana];
	}

	  public function addSaranaprasarana($data){
	    $dataInsert = DataStructure::slice($data, ['id_jenis_saranaprasarana','nama','file','lokasi','deskripsi']);
	    $this->db->insert('senibudaya_saranaprasarana', $dataInsert);
	    ExceptionHandler::handleDBError($this->db->error(), "Insert Saranaprasarana", "senibudaya_saranaprasarana");
	    return $this->db->insert_id();
	}
	
	public function editSaranaprasarana($data){
		$this->db->set(DataStructure::slice($data, ['id_jenis_saranaprasarana','nama','file','lokasi','deskripsi']));
		$this->db->where('id_saranaprasarana', $data['id_saranaprasarana']);
		$this->db->update('senibudaya_saranaprasarana');

		ExceptionHandler::handleDBError($this->db->error(), "Ubah Saranaprasarana", "senibudaya_saranaprasarana");	
		return $data['id_saranaprasarana'];
	}
	
	public function deleteSaranaprasarana($data){
		$this->db->where('id_saranaprasarana', $data['id_saranaprasarana']);
		$this->db->delete('senibudaya_saranaprasarana');

    ExceptionHandler::handleDBError($this->db->error(), "Hapus Saranaprasarana", "senibudaya_saranaprasarana");
	}




}