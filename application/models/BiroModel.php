<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BiroModel extends CI_Model {

    

	public function getAllJenisOption($filter = []){
		$this->db->select('ko.id_jenis_biro, ko.nama_jenis_biro');
		$this->db->from('pariwisata_jenis_biro as ko');
		$res=$this->db->get();

		return DataStructure::keyValue($res->result_array(), 'id_jenis_biro');
	}
    
    public function getAllSertifikatOption($filter = []){
		$this->db->select('ko.id_sertifikat_biro, ko.nama_sertifikat_biro');
		$this->db->from('pariwisata_sertifikat_biro as ko');
		$res=$this->db->get();

		return DataStructure::keyValue($res->result_array(), 'id_sertifikat_biro');
	}

  public function getAllBiro($filter = []){
		$this->db->select('*');
		$this->db->from('pariwisata_biro as po');
        $this->db->join("pariwisata_jenis_biro as jo", "po.id_jenis_biro = jo.id_jenis_biro");
        $this->db->join("pariwisata_sertifikat_biro as sb", "po.id_sertifikat_biro = sb.id_sertifikat_biro");
		$this->db->join("kabupaten as kab", "po.id_kabupaten = kab.id_kabupaten");
     
		if(!empty($filter['id_biro'])) $this->db->where('po.id_biro', $filter['id_biro']);
		if(!empty($this->session->userdata('id_kabupaten'))) $this->db->where('po.id_kabupaten', $this->session->userdata('id_kabupaten'));

	    $res = $this->db->get();
	    return DataStructure::keyValue($res->result_array(), 'id_biro');
	}

	public function getBiro($idBiro = NULL){
		$row = $this->getAllBiro(['id_biro' => $idBiro]);
		if (empty($row)){
			throw new UserException("Biro yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
		}
		return $row[$idBiro];
	}

	  public function addBiro($data){
		$data['id_user_entry'] = $this->session->userdata('id_user');
		if($this->session->userdata('id_role') == '1'){

		}else{
		  $data['id_kabupaten'] = $this->session->userdata('id_kabupaten');
	  };
	    $dataInsert = DataStructure::slice($data, ['tahun_terdata','id_user_entry','id_kabupaten','nama','id_jenis_biro','id_sertifikat_biro','alamat','lokasi','deskripsi']);
	    $this->db->insert('pariwisata_biro', $dataInsert);
	    ExceptionHandler::handleDBError($this->db->error(), "Insert Biro", "pariwisata_biro");
	    return $this->db->insert_id();
	}
	
	public function editBiro($data){
		$data['id_user_entry'] = $this->session->userdata('id_user');
		
		if($this->session->userdata('id_role') == '1'){
			$this->db->set(DataStructure::slice($data, ['tahun_terdata','id_kabupaten','nama','id_jenis_biro','id_sertifikat_biro','alamat','lokasi','deskripsi']));
	
		}else{
			$data['id_kabupaten'] = $this->session->userdata('id_kabupaten');

			$this->db->set(DataStructure::slice($data, ['tahun_terdata','id_user_entry','id_kabupaten','nama','id_jenis_biro','id_sertifikat_biro','alamat','lokasi','deskripsi']));
		
		};

		$this->db->set(DataStructure::slice($data, ['id_user_entry','id_kabupaten','nama','id_jenis_biro','id_sertifikat_biro','alamat','lokasi','deskripsi']));
		$this->db->where('id_biro', $data['id_biro']);
		$this->db->update('pariwisata_biro');

		ExceptionHandler::handleDBError($this->db->error(), "Ubah Biro", "pariwisata_biro");	
		return $data['id_biro'];
	}
	
	public function deleteBiro($data){
		$this->db->where('id_biro', $data['id_biro']);
		$this->db->delete('pariwisata_biro');

    ExceptionHandler::handleDBError($this->db->error(), "Hapus Biro", "pariwisata_biro");
	}




}