<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailSenibudayaModel extends CI_Model {

	
	public function getProfil($filter){
	
		$this->db->select('cb.*,js.*,j2s.*,kab.nama_kabupaten');
		$this->db->from('senibudaya as cb');
		$this->db->where("id_senibudaya",$filter['id_senibudaya']);
	
		$this->db->join("j_senibudaya as js", "js.id_j_senibudaya = cb.id_j_senibudaya");
		$this->db->join("j2_senibudaya as j2s", "j2s.id_j2_senibudaya = cb.id_j2_senibudaya");
		$this->db->join("kabupaten as kab", "kab.id_kabupaten = cb.id_kabupaten");
		
		$res = $this->db->get();
		$res = $res->result_array();
		return $res[0];
		}

	
		public function approv($data){
			$data['tanggal_approv'] = date('Y-m-d');
			$data['id_user_approv'] = $this->session->userdata('id_user');
			$this->db->set(DataStructure::slice($data, ['tanggal_approv','id_user_approv']));
			$this->db->where('id_senibudaya', $data['id_senibudaya']);
			$this->db->update('senibudaya');
			
			
			ExceptionHandler::handleDBError($this->db->error(), "Ubah Senibudaya", "senibudaya");	
			return $data['id_senibudaya'];
	
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
		$this->db->where('id_senibudaya',$id);
		$this->db->update('senibudaya');

				// echo'end mode';
				ExceptionHandler::handleDBError($this->db->error(), "Upload File1", "id_senibudaya");	
		}
		
		public function saveTambah($id_senibudaya,$tahun,$bulan,$dl,$dp,$ml,$mp,$pajak){
			
			$data = array( 
					'id_senibudaya' => $id_senibudaya,
					'tahun' => $tahun,
					'bulan' => $bulan,
					'domestik_l' => $dl,
					'domestik_p' => $dp,
					'mancanegara_l' => $ml,
					'mancanegara_p' => $mp,
					'pajak' => $pajak,
					'approv' => '0'
					);
			
			$this->db->insert('data_senibudaya', $data);
			ExceptionHandler::handleDBError($this->db->error(), "Insert DetailSenibudaya", "data_senibudaya");
			//return $data['nomor'];
		}

		public function saveEdit($id_data,$id_senibudaya,$tahun,$bulan,$dl,$dp,$ml,$mp,$pajak){
			
			$data = array( 
					'id_data_senibudaya' => $id_data,
					'id_senibudaya' => $id_senibudaya,
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
					$this->db->where('id_data_senibudaya', $data['id_data_senibudaya']);
					$this->db->update('data_senibudaya');
			//return $data['nomor'];
		}

		public function delPhoto($id_senibudaya,$file2){
			
			$data = array( 
					
					'id_senibudaya' => $id_senibudaya,
					'file2' => $file2

					);
			
					$this->db->set($data);
					$this->db->where('id_senibudaya', $data['id_senibudaya']);
					$this->db->update('senibudaya');
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
  public function getAllDetailSenibudaya($filter){
	
    $this->db->select('*');
    $this->db->from('rec_senibudaya as rc');
    $this->db->where("rc.id_senibudaya",$filter['id_senibudaya']);
	if(!empty($filter['tahun'])) $this->db->where('tahun', $filter['tahun']);
    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'nomor');
	}

	public function getDetailSenibudaya($id){
		$this->db->select('*');
		$this->db->from('rec_senibudaya as rc');
		$this->db->where("rc.nomor",$id);
		$row = $this->db->get();

		if (empty($row)){
			throw new UserException("DetailSenibudaya yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
		}
		
		$res = DataStructure::keyValue($row->result_array(), 'nomor');
		return $res[$id];
	}


	public function editDetailSenibudaya($data){
		$data['id_user_entry'] = $this->session->userdata('id_user');
		if($this->session->userdata('id_role') == '1'){
			$this->db->set(DataStructure::slice($data, ['tahun_terdata','nama','id_kabupaten','id_j_senibudaya','id_j2_senibudaya','lokasi','deskripsi','alamat','id_user_entry','jumlahanggota']));
		}else{
			$this->db->set(DataStructure::slice($data, ['tahun_terdata','nama','id_j_senibudaya','id_j2_senibudaya','lokasi','deskripsi','alamat','id_user_entry','jumlahanggota']));
				
		}
		$this->db->where('id_senibudaya', $data['id_senibudaya']);
		$this->db->update('senibudaya');

		ExceptionHandler::handleDBError($this->db->error(), "Ubah Senibudaya", "senibudaya");	
		return $data['id_senibudaya'];

	}
}