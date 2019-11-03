<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CagarbudayaModel extends CI_Model {

	public function getAllJenisOption($filter = []){
		$this->db->select('jc.id_jenis_cagarbudaya, jc.nama_jenis_cagarbudaya');
		$this->db->from('jenis_cagarbudaya as jc');
		$res=$this->db->get();

		return DataStructure::keyValue($res->result_array(), 'id_jenis_cagarbudaya');
	}


  public function getAllCagarbudaya($filter = []){
		$this->db->select('cb.*, js.nama_jenis_cagarbudaya');
		$this->db->from('cagarbudaya as cb');
		$this->db->join("jenis_cagarbudaya as js", "js.id_jenis_cagarbudaya = cb.jenis");

		if(!empty($filter['id_cagarbudaya'])) $this->db->where('cb.id_cagarbudaya', $filter['id_cagarbudaya']);

	    $res = $this->db->get();
	    return DataStructure::keyValue($res->result_array(), 'id_cagarbudaya');
	}

	public function getCagarbudaya($idCagarbudaya = NULL){
		$row = $this->getAllCagarbudaya(['id_cagarbudaya' => $idCagarbudaya]);
		if (empty($row)){
			throw new UserException("Cagarbudaya yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
		}
		return $row[$idCagarbudaya];
	}

	  public function addCagarbudaya($data){
	    $dataInsert = DataStructure::slice($data, ['nama','jenis','kepemilikan','status_penetapan']);
	    $this->db->insert('cagarbudaya', $dataInsert);
	    ExceptionHandler::handleDBError($this->db->error(), "Insert Cagarbudaya", "cagarbudaya");
	    return $this->db->insert_id();
	}
	
	public function editCagarbudaya($data){
		$this->db->set(DataStructure::slice($data, ['nama','jenis','kepemilikan','status_penetapan']));
		$this->db->where('id_cagarbudaya', $data['id_cagarbudaya']);
		$this->db->update('cagarbudaya');

		ExceptionHandler::handleDBError($this->db->error(), "Ubah Cagarbudaya", "cagarbudaya");	
		return $data['id_cagarbudaya'];
	}
	
	public function deleteCagarbudaya($data){
		$this->db->where('id_cagarbudaya', $data['id_cagarbudaya']);
		$this->db->delete('cagarbudaya');

    ExceptionHandler::handleDBError($this->db->error(), "Hapus Cagarbudaya", "cagarbudaya");
	}


}
