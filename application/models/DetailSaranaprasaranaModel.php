<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailSaranaprasaranaModel extends CI_Model {

	
	public function getProfil($filter){
	
		$this->db->select('sp.*,jp.*,kab.nama_kabupaten');
		$this->db->from('senibudaya_saranaprasarana as sp');
		$this->db->where("id_saranaprasarana",$filter['id_saranaprasarana']);
        $this->db->join("jenis_saranaprasarana as jp", "jp.id_jenis_saranaprasarana = sp.id_jenis_saranaprasarana");
		$this->db->join("kabupaten as kab", "kab.id_kabupaten = sp.id_kabupaten");
		
	//	$this->db->join("j_saranaprasarana as js", "js.id_j_saranaprasarana = cb.id_j_saranaprasarana");
	//	$this->db->join("j2_saranaprasarana as j2s", "j2s.id_j2_saranaprasarana = cb.id_j2_saranaprasarana");	
		$res = $this->db->get();
		$res = $res->result_array();
		return $res[0];
		}

		public function approv($data){
			$data['tanggal_approv'] = date('Y-m-d');
			$data['id_user_approv'] = $this->session->userdata('id_user');
			$this->db->set(DataStructure::slice($data, ['tanggal_approv','id_user_approv']));
			$this->db->where('id_saranaprasarana', $data['id_saranaprasarana']);
			$this->db->update('senibudaya_saranaprasarana');
	
			
			ExceptionHandler::handleDBError($this->db->error(), "Ubah Pagelaran", "pagelaran");	
			return $data['id_pagelaran'];
	
		}
	
		public function approvSaranaprasarana($data){
			$data['id_user_approv'] = $this->session->userdata('id_user');
			$this->db->set(DataStructure::slice($data, ['id_user_approv']));
			$this->db->where('id_saranaprasarana', $data['id_saranaprasarana']);
			$this->db->update('senibudaya_saranaprasarana');
			echo $data['id_user_approv'];
			echo $data['id_saranaprasarana'];
			
			ExceptionHandler::handleDBError($this->db->error(), "Ubah Saranaprasarana", "saranaprasarana");	
			return $data['id_saranaprasarana'];
	
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
		$this->db->where('id_saranaprasarana',$id);
		$this->db->update('senibudaya_saranaprasarana');

				// echo'end mode';
				ExceptionHandler::handleDBError($this->db->error(), "Upload File1", "id_saranaprasarana");	
		}
		
		public function saveTambah($id_saranaprasarana,$tahun,$bulan,$dl,$dp,$ml,$mp,$pajak){
			
			$data = array( 
					'id_saranaprasarana' => $id_saranaprasarana,
					'tahun' => $tahun,
					'bulan' => $bulan,
					'domestik_l' => $dl,
					'domestik_p' => $dp,
					'mancanegara_l' => $ml,
					'mancanegara_p' => $mp,
					'pajak' => $pajak,
					'approv' => '0'
					);
			
			$this->db->insert('data_saranaprasarana', $data);
			ExceptionHandler::handleDBError($this->db->error(), "Insert DetailSaranaprasarana", "data_saranaprasarana");
			//return $data['nomor'];
		}

		public function saveEdit($id_data,$id_saranaprasarana,$tahun,$bulan,$dl,$dp,$ml,$mp,$pajak){
			
			$data = array( 
					'id_data_saranaprasarana' => $id_data,
					'id_saranaprasarana' => $id_saranaprasarana,
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
					$this->db->where('id_data_saranaprasarana', $data['id_data_saranaprasarana']);
					$this->db->update('data_saranaprasarana');
			//return $data['nomor'];
		}

		public function delPhoto($id_saranaprasarana,$file2){
			
			$data = array( 
					
					'id_saranaprasarana' => $id_saranaprasarana,
					'file2' => $file2

					);
			
					$this->db->set($data);
					$this->db->where('id_saranaprasarana', $data['id_saranaprasarana']);
					$this->db->update('senibudaya_saranaprasarana');
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
  public function getAllDetailSaranaprasarana($filter){
	
    $this->db->select('*');
    $this->db->from('rec_saranaprasarana as rc');
    $this->db->where("rc.id_saranaprasarana",$filter['id_saranaprasarana']);
	if(!empty($filter['tahun'])) $this->db->where('tahun', $filter['tahun']);
    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'nomor');
	}

	public function getDetailSaranaprasarana($id){
		$this->db->select('*');
		$this->db->from('rec_saranaprasarana as rc');
		$this->db->where("rc.nomor",$id);
		$row = $this->db->get();

		if (empty($row)){
			throw new UserException("DetailSaranaprasarana yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
		}
		
		$res = DataStructure::keyValue($row->result_array(), 'nomor');
		return $res[$id];
	}


	public function editDetailSaranaprasarana($data){
        $data['id_user_entry'] = $this->session->userdata('id_user');
       	$this->db->set(DataStructure::slice($data, ['tahun_terdata','id_kabupaten','nama','id_jenis_saranaprasarana','lokasi','deskripsi','alamat','id_user_entry']));
		$this->db->where('id_saranaprasarana', $data['id_saranaprasarana']);
		$this->db->update('senibudaya_saranaprasarana');

		ExceptionHandler::handleDBError($this->db->error(), "Ubah Saranaprasarana", "saranaprasarana");	
		return $data['id_saranaprasarana'];

	}
}