<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PenginapanModel extends CI_Model {

    

	public function getAllJenisOption($filter = []){
		$this->db->select('ko.id_jenis_penginapan, ko.nama_jenis_penginapan');
		$this->db->from('pariwisata_jenis_penginapan as ko');
		$res=$this->db->get();

		return DataStructure::keyValue($res->result_array(), 'id_jenis_penginapan');
	}
	
  public function getAllPenginapan($filter = []){
		$this->db->select('*');
		$this->db->from('pariwisata_penginapan as po');
		$this->db->join("pariwisata_jenis_penginapan as pjo", "po.id_jenis_penginapan = pjo.id_jenis_penginapan");
		if(!empty($filter['id_penginapan'])) $this->db->where('po.id_penginapan', $filter['id_penginapan']);

	    $res = $this->db->get();
	    return DataStructure::keyValue($res->result_array(), 'id_penginapan');
	}

	public function getPenginapan($idPenginapan = NULL){
		$row = $this->getAllPenginapan(['id_penginapan' => $idPenginapan]);
		if (empty($row)){
			throw new UserException("Penginapan yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
		}
		return $row[$idPenginapan];
	}

	  public function addPenginapan($data){
	    $dataInsert = DataStructure::slice($data, ['nama','id_jenis_penginapan','jumlah_kamar','jumlah_tempat_tidur','lokasi','file','deskripsi']);
	    $this->db->insert('pariwisata_penginapan', $dataInsert);
	    ExceptionHandler::handleDBError($this->db->error(), "Insert Penginapan", "pariwisata_penginapan");
	    return $this->db->insert_id();
	}
	
	public function editPenginapan($data){
		$this->db->set(DataStructure::slice($data, ['nama','id_jenis_penginapan','jumlah_kamar','jumlah_tempat_tidur','lokasi','file','deskripsi']));
		$this->db->where('id_penginapan', $data['id_penginapan']);
		$this->db->update('pariwisata_penginapan');

		ExceptionHandler::handleDBError($this->db->error(), "Ubah Penginapan", "pariwisata_penginapan");	
		return $data['id_penginapan'];
	}
	
	public function deletePenginapan($data){
		$this->db->where('id_penginapan', $data['id_penginapan']);
		$this->db->delete('pariwisata_penginapan');

    ExceptionHandler::handleDBError($this->db->error(), "Hapus Penginapan", "pariwisata_penginapan");
	}




}