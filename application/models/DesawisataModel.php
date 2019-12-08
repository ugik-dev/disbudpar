<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DesawisataModel extends CI_Model {

    

	public function getAllKategoriOption($filter = []){
		$this->db->select('ko.id_kategori, ko.nama_kategori');
		$this->db->from('kategori_desawisata as ko');
		
		$res=$this->db->get();

		return DataStructure::keyValue($res->result_array(), 'id_kategori');
	}
	
  public function getAllDesawisata($filter = []){
		$this->db->select('*');
		$this->db->from('desawisata as po');
		$this->db->join("kategori_desawisata as pjo", "po.id_kategori = pjo.id_kategori");
		$this->db->join("kabupaten as kab", "kab.id_kabupaten = po.id_kabupaten");
		
		
		if(!empty($filter['id_desawisata'])) $this->db->where('po.id_desawisata', $filter['id_desawisata']);
		if(!empty($this->session->userdata('id_kabupaten'))) $this->db->where('po.id_kabupaten', $this->session->userdata('id_kabupaten'));

	    $res = $this->db->get();
	    return DataStructure::keyValue($res->result_array(), 'id_desawisata');
	}

	public function getDesawisata($idDesawisata = NULL){
		$row = $this->getAllDesawisata(['id_desawisata' => $idDesawisata]);
		if (empty($row)){
			throw new UserException("Desawisata yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
		}
		return $row[$idDesawisata];
	}

	  public function addDesawisata($data){
		$data['id_user_entry'] = $this->session->userdata('id_user');
		if($this->session->userdata('id_role') == '1'){

		}else{
		  $data['id_kabupaten'] = $this->session->userdata('id_kabupaten');
	  };
	    $dataInsert = DataStructure::slice($data, ['id_kabupaten','nama','id_kategori','deskripsi','id_user_entry']);
	    $this->db->insert('desawisata', $dataInsert);
	    ExceptionHandler::handleDBError($this->db->error(), "Insert Desawisata", "desawisata");
	    return $this->db->insert_id();
	}
	
	public function editDesawisata($data){
		$data['id_user_entry'] = $this->session->userdata('id_user');
		if($this->session->userdata('id_role') == '1'){
			$this->db->set(DataStructure::slice($data, ['nama','id_kabupaten','id_kategori','deskripsi']));
		
		}else{
			$this->db->set(DataStructure::slice($data, ['nama','id_kategori','deskripsi','id_user_entry']));
		
		};
		
		$this->db->where('id_desawisata', $data['id_desawisata']);
		$this->db->update('desawisata');

		ExceptionHandler::handleDBError($this->db->error(), "Ubah Desawisata", "desawisata");	
		return $data['id_desawisata'];
	}
	
	public function deleteDesawisata($data){
		$this->db->where('id_desawisata', $data['id_desawisata']);
		$this->db->delete('desawisata');

    ExceptionHandler::handleDBError($this->db->error(), "Hapus Desawisata", "desawisata");
	}




}