<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailMuseumModel extends CI_Model {

	
	public function getProfil($filter){
	
		$this->db->select('*');
		$this->db->from('museum as cb');
		$this->db->where("id_museum",$filter['id_museum']);
		$this->db->join("museum_kepemilikan as ko", "ko.id_kepemilikan_museum = cb.id_kepemilikan_museum");
		$this->db->join("museum_status as sp", "sp.id_status_museum = cb.id_status_museum");
	
		$res = $this->db->get();
		$res = $res->result_array();
		return $res[0];
		}

	
		public function approv($data){
			$data['id_user_approv'] = $this->session->userdata('id_user');
			$this->db->set(DataStructure::slice($data, ['id_user_approv']));
			$this->db->where('id_museum', $data['id_museum']);
			$this->db->update('museum');
			echo $data['id_user_approv'];
			echo $data['id_museum'];
			
			ExceptionHandler::handleDBError($this->db->error(), "Ubah Museum", "museum");	
			return $data['id_museum'];
	
		}
		public function getUser($filter){
			
			
			$this->db->select('nama');
			$this->db->from('user');
			$this->db->where("id_user",$filter['id_user']);

			$res = $this->db->get();
			$res = $res->result_array();
			return $res[0];
			}
		
		public function simpan_upload1($id,$data2,$field){
				echo'masuk mode';
				echo $id;
				echo $data2;
				echo $field;
		$this->db->set($field,$data2);
		$this->db->where('id_museum',$id);
		$this->db->update('museum');

				// echo'end mode';
				ExceptionHandler::handleDBError($this->db->error(), "Upload File1", "id_museum");	
		}
		
		public function saveTambah($id_museum,$tahun,$bulan,$dl,$dp,$ml,$mp,$pajak){
			
			$data = array( 
					'id_museum' => $id_museum,
					'tahun' => $tahun,
					'bulan' => $bulan,
					'domestik_l' => $dl,
					'domestik_p' => $dp,
					'mancanegara_l' => $ml,
					'mancanegara_p' => $mp,
					'pajak' => $pajak,
					'approv' => '0'
					);
			
			$this->db->insert('data_museum', $data);
			ExceptionHandler::handleDBError($this->db->error(), "Insert DetailMuseum", "data_museum");
			//return $data['nomor'];
		}
		public function approv_pengunjung($id_data){
			$idapprov = $this->session->userdata('id_user');
			$data = array( 
					'approv' => $idapprov
					);
			
					$this->db->set($data);
					$this->db->where('id_data_museum', $id_data);
					$this->db->update('data_museum');

		}
		public function saveEdit($id_data,$id_museum,$tahun,$bulan,$dl,$dp,$ml,$mp,$pajak){
			
			$data = array( 
					'id_data_museum' => $id_data,
					'id_museum' => $id_museum,
					'tahun' => $tahun,
					'bulan' => $bulan,
					'domestik_l' => $dl,
					'domestik_p' => $dp,
					'mancanegara_l' => $ml,
					'mancanegara_p' => $mp,
					'pajak' => $pajak,
					'approv' => '0'

					);
			
					$this->db->set($data);
					$this->db->where('id_data_museum', $data['id_data_museum']);
					$this->db->update('data_museum');
			//return $data['nomor'];
		}

		public function delPhoto($id_museum,$file2){
			
			$data = array( 
					
					'id_museum' => $id_museum,
					'file2' => $file2

					);
			
					$this->db->set($data);
					$this->db->where('id_museum', $data['id_museum']);
					$this->db->update('museum');
			//return $data['nomor'];
		}

		public function getTahun(){
	
			$this->db->select('*');
			$this->db->from('tb_tahun');
			$res = $this->db->get();
			$res = $res->result_array();
		   // $res = DataStructure::keyValue($res->result_array());
			return $res;
		}
  public function getAllDetailMuseum($filter){
	
    $this->db->select('*');
    $this->db->from('rec_museum as rc');
    $this->db->where("rc.id_museum",$filter['id_museum']);
	if(!empty($filter['tahun'])) $this->db->where('tahun', $filter['tahun']);
    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'nomor');
	}

	public function getDetailMuseum($id){
		$this->db->select('*');
		$this->db->from('rec_museum as rc');
		$this->db->where("rc.nomor",$id);
		$row = $this->db->get();

		if (empty($row)){
			throw new UserException("DetailMuseum yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
		}
		
		$res = DataStructure::keyValue($row->result_array(), 'nomor');
		return $res[$id];
	}


	public function editDetailMuseum($data){
		$data['id_user_entry'] = $this->session->userdata('id_user');
		$this->db->set(DataStructure::slice($data, ['nama','id_kepemilikan_museum','id_status_museum','lokasi','deskripsi','alamat','id_user_entry']));
		$this->db->where('id_museum', $data['id_museum']);
		$this->db->update('museum');

		ExceptionHandler::handleDBError($this->db->error(), "Ubah Museum", "museum");	
		return $data['id_museum'];

	}
}