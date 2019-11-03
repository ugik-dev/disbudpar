<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestModel extends CI_Model {

  public function getAllTest($filter = []){
		$this->db->select('*');
		$this->db->from('test as t');

		if(isset($filter['id_test'])) $this->db->where('t.id_test', $filter['id_test']);
    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'id_test');
	}

	public function getTest($idTest = NULL){
		$row = $this->getAllTest(['id_test' => $idTest]);
		if (empty($row)){
			throw new UserException("Test yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
		}
		return $row[$idTest];
	}

  public function addTest($data){
    $dataInsert = DataStructure::slice($data, ['nama_test']);
    $this->db->insert('test', $dataInsert);
    ExceptionHandler::handleDBError($this->db->error(), "Insert Test", "test");
    return $this->db->insert_id();
	}
	
	public function editTest($data){
    $this->db->set(DataStructure::slice($data, ['nama_test']));
    $this->db->where('id_test', $data['id_test']);
    $this->db->update('test');

		ExceptionHandler::handleDBError($this->db->error(), "Ubah Test", "test");
		
		return $data['id_test'];
	}
	
	public function deleteTest($idTest){
		$this->db->where('id_test', $idTest);
		$this->db->delete('test');

    ExceptionHandler::handleDBError($this->db->error(), "Hapus Test", "test");
	}


}
