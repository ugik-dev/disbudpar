<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PemugaranModel extends CI_Model {

    


	

	public function getAllCagarbudayaOption($filter = []){
		$this->db->select('sb.id_cagarbudaya,sb.nama as nama_cagarbudaya');
		$this->db->from('cagarbudaya as sb');
		if(!empty($this->session->userdata('id_kabupaten'))) $this->db->where('sb.id_kabupaten', $this->session->userdata('id_kabupaten'));
		
		$res=$this->db->get();
		
		return DataStructure::keyValue($res->result_array(), 'id_cagarbudaya');
	}

  public function getAllPemugaran($filter = []){
		$this->db->select('kab.nama_kabupaten,sb.id_kabupaten, cb.id_pemugaran, cb.id_cagarbudaya, sb.nama as nama_cagarbudaya, cb.nama,cb.tanggal_kegiatan,cb.deskripsi,cb.id_user_approv as id_user_approv ,cb.id_user_entry as id_user_entry');
		$this->db->from('cagarbudaya_pemugaran as cb');
		//$this->db->join("kabupaten as kab", "kab.id_kabupaten = sb.id_kabupaten");
		
		$this->db->join("cagarbudaya as sb", "sb.id_cagarbudaya = cb.id_cagarbudaya");
		$this->db->join("kabupaten as kab", "kab.id_kabupaten = sb.id_kabupaten");
		//$this->db->join("status_penetapan_pemugaran as sp", "sp.id_status_penetapan_pemugaran = cb.status_penetapan");
		if(!empty($filter['id_pemugaran'])) $this->db->where('cb.id_pemugaran', $filter['id_pemugaran']);
			if(!empty($filter['id_pemugaran'])) $this->db->where('cb.id_pemugaran', $filter['id_pemugaran']);

	    $res = $this->db->get();
	    return DataStructure::keyValue($res->result_array(), 'id_pemugaran');
	}

	public function getPemugaran($idPemugaran = NULL){
		$row = $this->getAllPemugaran(['id_pemugaran' => $idPemugaran]);
		if (empty($row)){
			throw new UserException("Pemugaran yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
		}
		return $row[$idPemugaran];
	}

	  public function addPemugaran($data){
		$data['id_user_entry'] = $this->session->userdata('id_user');
	
		if(empty($this->session->userdata('id_kabupaten'))){
		$this->db->select('id_kabupaten');
		$this->db->from('cagarbudaya');
		$this->db->where('id_cagarbudaya',$data['id_cagarbudaya']);
		$res = $this->db->get();
		$res = $res->result_array();
	
		$data['id_kabupaten'] = $res[0]['id_kabupaten'];
		}else{
			$data['id_kabupaten'] = $this->session->userdata('id_kabupaten');
		}
	    $dataInsert = DataStructure::slice($data, ['id_kabupaten','id_user_entry','id_cagarbudaya','nama','tanggal_kegiatan','deskripsi']);
	    $this->db->insert('cagarbudaya_pemugaran', $dataInsert);
	    ExceptionHandler::handleDBError($this->db->error(), "Insert Pemugaran", "cagarbudaya_pemugaran");
	    return $this->db->insert_id();
	}
	
	public function editPemugaran($data){
		$data['id_user_entry'] = $this->session->userdata('id_user');
		$data['id_kabupaten'] = $this->session->userdata('id_kabupaten');
	
		$this->db->set(DataStructure::slice($data,  ['id_kabupaten','id_user_entry','id_cagarbudaya','nama','tanggal_kegiatan','deskripsi']));
		$this->db->where('id_pemugaran', $data['id_pemugaran']);
		$this->db->update('cagarbudaya_pemugaran');
		

		ExceptionHandler::handleDBError($this->db->error(), "Ubah Pemugaran", "cagarbudaya_pemugaran");	
		return $data['id_pemugaran'];
	}
	
	public function deletePemugaran($data){
		$this->db->where('id_pemugaran', $data['id_pemugaran']);
		$this->db->delete('cagarbudaya_pemugaran');

    ExceptionHandler::handleDBError($this->db->error(), "Hapus Pemugaran", "cagarbudaya_pemugaran");
	}




}