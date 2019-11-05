<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MuseumModel extends CI_Model {

    

	public function getAllKepemilikanOption($filter = []){
		$this->db->select('ko.id_kepemilikan_museum, ko.nama_kepemilikan');
		$this->db->from('museum_kepemilikan as ko');
		$res=$this->db->get();

		return DataStructure::keyValue($res->result_array(), 'id_kepemilikan_museum');
	}
	public function getAllStatusOption($filter = []){
		$this->db->select('spo.id_status_museum, spo.nama_status');
		$this->db->from('museum_status as spo');
		$res=$this->db->get();

		return DataStructure::keyValue($res->result_array(), 'id_status_museum');
	}

  public function getAllMuseum($filter = []){
		$this->db->select('*');
		$this->db->from('museum as cb');
		$this->db->join("museum_kepemilikan as mk", "mk.id_kepemilikan_museum = cb.id_kepemilikan_museum");
		$this->db->join("museum_status as st", "st.id_status_museum = cb.id_status_museum");
		//$this->db->join("status_penetapan_museum as sp", "sp.id_status_penetapan_museum = cb.status_penetapan");
		//if(!empty($filter['id_museum'])) $this->db->where('cb.id_museum', $filter['id_museum']);

	    $res = $this->db->get();
	    return DataStructure::keyValue($res->result_array(), 'id_museum');
	}

	public function getMuseum($idMuseum = NULL){
		$row = $this->getAllMuseum(['id_museum' => $idMuseum]);
		if (empty($row)){
			throw new UserException("Museum yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
		}
		return $row[$idMuseum];
	}

	  public function addMuseum($data){
	    $dataInsert = DataStructure::slice($data, ['nama','id_kepemilikan_museum','id_status_museum','file','lokasi','deskripsi']);
	    $this->db->insert('museum', $dataInsert);
	    ExceptionHandler::handleDBError($this->db->error(), "Insert Museum", "museum");
	    return $this->db->insert_id();
	}
	
	public function editMuseum($data){
		$this->db->set(DataStructure::slice($data, ['nama','id_kepemilikan_museum','id_status_museum','file','lokasi','deskripsi']));
		$this->db->where('id_museum', $data['id_museum']);
		$this->db->update('museum');

		ExceptionHandler::handleDBError($this->db->error(), "Ubah Museum", "museum");	
		return $data['id_museum'];
	}
	
	public function deleteMuseum($data){
		$this->db->where('id_museum', $data['id_museum']);
		$this->db->delete('museum');

    ExceptionHandler::handleDBError($this->db->error(), "Hapus Museum", "museum");
	}




}