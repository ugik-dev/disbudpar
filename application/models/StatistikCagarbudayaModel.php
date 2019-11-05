<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StatistikCagarbudayaModel extends CI_Model {

	public function getAllCagarBudayaOption($filter = []){
		$this->db->select('cb.id_cagarbudaya, cb.nama');
		$this->db->from('cagarbudaya as cb');
		$res=$this->db->get();

		return DataStructure::keyValue($res->result_array(), 'id_cagarbudaya');
	}



	// public function getAllCagarbudaya($filter = []){
	// 	$this->db->select('cb.*, js.nama_jenis_cagarbudaya');
	// 	$this->db->from('cagarbudaya as cb');
	// 	$this->db->join("jenis_cagarbudaya as js", "js.id_jenis_cagarbudaya = cb.jenis");

	// 	if(!empty($filter['id_cagarbudaya'])) $this->db->where('cb.id_cagarbudaya', $filter['id_cagarbudaya']);

	//     $res = $this->db->get();
	//     return DataStructure::keyValue($res->result_array(), 'id_cagarbudaya');
	// }
//
  public function getAllStatistikCagarbudaya($filter = []){
		$this->db->select('*');
		$this->db->from('jumlah_pengunjung_cagarbudaya as jpc');
		$this->db->join("cagarbudaya as cb","jpc.id_cagarbudaya = cb.id_cagarbudaya");
		if(!empty($filter['id_pengunjung'])) $this->db->where('jpc.id_pengunjung', $filter['id_pengunjung']);

	    $res = $this->db->get();
	    return DataStructure::keyValue($res->result_array(), 'id_pengunjung');
	}

	public function getStatistikCagarbudaya($idStatistikCagarbudaya = NULL){
		$row = $this->getAllStatistikCagarbudaya(['id_pengunjung' => $idStatistikCagarbudaya]);
		if (empty($row)){
			throw new UserException("StatistikCagarbudaya yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
		}
		return $row[$idStatistikCagarbudaya];
	}

	  public function addStatistikCagarbudaya($data){
	    $dataInsert = DataStructure::slice($data, ['id_cagarbudaya','tahun','domestik','mancanegara']);
	    $this->db->insert('pengunjung_cagarbudaya', $dataInsert);
	    ExceptionHandler::handleDBError($this->db->error(), "Insert pengunjung_cagarbudaya", "pengunjung_cagarbudaya");
	    return $this->db->insert_id();
	}
	
	public function editStatistikCagarbudaya($data){
		$this->db->set(DataStructure::slice($data, ['id_cagarbudaya','tahun','domestik','mancanegara']));
		$this->db->where('id_pengunjung_cagarbudaya', $data['id_pengunjung_cagarbudaya']);
		$this->db->update('pengunjung_cagarbudaya');

		ExceptionHandler::handleDBError($this->db->error(), "Ubah Cagarbudaya", "cagarbudaya");	
		return $data['id_cagarbudaya'];
	}
	
	public function deleteCagarbudaya($data){
		$this->db->where('id_cagarbudaya', $data['id_cagarbudaya']);
		$this->db->delete('cagarbudaya');

    ExceptionHandler::handleDBError($this->db->error(), "Hapus Cagarbudaya", "cagarbudaya");
	}


}
