<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ObjekModel extends CI_Model {

    

	public function getAllJenisOption($filter = []){
		$this->db->select('ko.id_jenis_objek, ko.nama_jenis_objek');
		$this->db->from('pariwisata_jenis_objek as ko');
		$res=$this->db->get();

		return DataStructure::keyValue($res->result_array(), 'id_jenis_objek');
	}
	
  public function getAllObjek($filter = []){
		$this->db->select('*');
		$this->db->from('pariwisata_objek as po');
		$this->db->join("pariwisata_jenis_objek as pjo", "po.id_jenis_objek = pjo.id_jenis_objek");
		if(!empty($filter['id_objek'])) $this->db->where('po.id_objek', $filter['id_objek']);

	    $res = $this->db->get();
	    return DataStructure::keyValue($res->result_array(), 'id_objek');
	}

	public function getObjek($idObjek = NULL){
		$row = $this->getAllObjek(['id_objek' => $idObjek]);
		if (empty($row)){
			throw new UserException("Objek yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
		}
		return $row[$idObjek];
	}

	  public function addObjek($data){
	    $dataInsert = DataStructure::slice($data, ['nama','id_jenis_objek','lokasi','file','deskripsi']);
	    $this->db->insert('pariwisata_objek', $dataInsert);
	    ExceptionHandler::handleDBError($this->db->error(), "Insert Objek", "pariwisata_objek");
	    return $this->db->insert_id();
	}
	
	public function editObjek($data){
		$this->db->set(DataStructure::slice($data, ['nama','id_jenis_objek','lokasi','file','deskripsi']));
		$this->db->where('id_objek', $data['id_objek']);
		$this->db->update('pariwisata_objek');

		ExceptionHandler::handleDBError($this->db->error(), "Ubah Objek", "pariwisata_objek");	
		return $data['id_objek'];
	}
	
	public function deleteObjek($data){
		$this->db->where('id_objek', $data['id_objek']);
		$this->db->delete('pariwisata_objek');

    ExceptionHandler::handleDBError($this->db->error(), "Hapus Objek", "pariwisata_objek");
	}




}