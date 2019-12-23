<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PagelaranModel extends CI_Model {

    

	public function getAllJenisOption($filter = []){
		$this->db->select('ko.id_jenis_pagelaran, ko.nama_jenis_pagelaran');
		$this->db->from('jenis_pagelaran as ko');
		$res=$this->db->get();

		return DataStructure::keyValue($res->result_array(), 'id_jenis_pagelaran');
    }
	


  public function getAllPagelaran($filter = []){
		$this->db->select('kab.nama_kabupaten,cb.id_kabupaten,cb.id_pagelaran, cb.id_jenis_pagelaran,jp.nama_jenis_pagelaran, cb.pelaksana, cb.nama,cb.tanggal_kegiatan,cb.tanggal_kegiatan_end,cb.jumlah_penonton,cb.alamat,cb.lokasi,cb.deskripsi,cb.id_user_approv as id_user_approv ,cb.id_user_entry as id_user_entry');
		$this->db->from('senibudaya_pagelaranpameran as cb');
		$this->db->join("jenis_pagelaran as jp", "jp.id_jenis_pagelaran = cb.id_jenis_pagelaran");
		
	
		$this->db->join("kabupaten as kab", "cb.id_kabupaten = kab.id_kabupaten");
		if(!empty($this->session->userdata('id_kabupaten'))) $this->db->where('cb.id_kabupaten', $this->session->userdata('id_kabupaten'));
		if(!empty($filter['id_pagelaran'])) $this->db->where('cb.id_pagelaran', $filter['id_pagelaran']);

	    $res = $this->db->get();
	    return DataStructure::keyValue($res->result_array(), 'id_pagelaran');
	}

	public function getPagelaran($idPagelaran = NULL){
		$row = $this->getAllPagelaran(['id_pagelaran' => $idPagelaran]);
		if (empty($row)){
			throw new UserException("Pagelaran yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
		}
		return $row[$idPagelaran];
	}

	  public function addPagelaran($data){
		$data['id_user_entry'] = $this->session->userdata('id_user');
		$data['id_kabupaten'] = $this->session->userdata('id_kabupaten');
	    $dataInsert = DataStructure::slice($data, ['id_user_entry','id_jenis_pagelaran','pelaksana','nama','tanggal_kegiatan','tanggal_kegiatan_end','jumlah_penonton','deskripsi','id_kabupaten']);
	    $this->db->insert('senibudaya_pagelaranpameran', $dataInsert);
	    ExceptionHandler::handleDBError($this->db->error(), "Insert Pagelaran", "senibudaya_pagelaranpameran");
	    return $this->db->insert_id();
	}
	
	public function editPagelaran($data){
		$data['id_user_entry'] = $this->session->userdata('id_user');
		$data['id_kabupaten'] = $this->session->userdata('id_kabupaten');
		$this->db->set(DataStructure::slice($data,  ['id_kabupaten','id_user_entry','id_jenis_pagelaran','pelaksana','nama','tanggal_kegiatan','tanggal_kegiatan_end','jumlah_penonton','deskripsi']));
		$this->db->where('id_pagelaran', $data['id_pagelaran']);
		$this->db->update('senibudaya_pagelaranpameran');

		ExceptionHandler::handleDBError($this->db->error(), "Ubah Pagelaran", "senibudaya_pagelaranpameran");	
		return $data['id_pagelaran'];
	}
	
	public function deletePagelaran($data){
		$this->db->where('id_pagelaran', $data['id_pagelaran']);
		$this->db->delete('senibudaya_pagelaranpameran');

    ExceptionHandler::handleDBError($this->db->error(), "Hapus Pagelaran", "senibudaya_pagelaranpameran");
	}




}