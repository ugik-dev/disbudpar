<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailUsahaModel extends CI_Model {

	
	public function getProfil($filter){
	
		$this->db->select('sp.*,jp.*,sb.*,kab.nama_kabupaten');
		$this->db->from('pariwisata_usaha as sp');
		$this->db->where("id_usaha",$filter['id_usaha']);
        $this->db->join("pariwisata_jenis_usaha as jp", "jp.id_jenis_usaha = sp.id_jenis_usaha");
        $this->db->join("pariwisata_item_usaha as sb", "sb.id_item_usaha = sp.id_item_usaha");
		$this->db->join("kabupaten as kab", "kab.id_kabupaten = sp.id_kabupaten");
	//	$this->db->join("j_usaha as js", "js.id_j_usaha = cb.id_j_usaha");
	//	$this->db->join("j2_usaha as j2s", "j2s.id_j2_usaha = cb.id_j2_usaha");	
		$res = $this->db->get();
		$res = $res->result_array();
		return $res[0];
		}

		public function approvUsaha($data){
			$data['tanggal_approv'] = date('Y-m-d');
			$data['id_user_approv'] = $this->session->userdata('id_user');
			$this->db->set(DataStructure::slice($data, ['tanggal_approv','id_user_approv']));
			$this->db->where('id_usaha', $data['id_usaha']);
			$this->db->update('pariwisata_usaha');
			echo $data['id_user_approv'];
			echo $data['id_usaha'];
			
			ExceptionHandler::handleDBError($this->db->error(), "Ubah Usaha", "usaha");	
			return $data['id_usaha'];
	
		}
		public function approv($data){
			$data['tanggal_approv'] = date('Y-m-d');
			$data['id_user_approv'] = $this->session->userdata('id_user');
			$this->db->set(DataStructure::slice($data, ['tanggal_approv','id_user_approv']));
			$this->db->where('id_usaha', $data['id_usaha']);
			$this->db->update('pariwisata_usaha');
			echo $data['id_user_approv'];
			echo $data['id_usaha'];
			
			ExceptionHandler::handleDBError($this->db->error(), "Ubah Usaha", "usaha");	
			return $data['id_usaha'];
	
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
		$this->db->where('id_usaha',$id);
		$this->db->update('pariwisata_usaha');

				// echo'end mode';
				ExceptionHandler::handleDBError($this->db->error(), "Upload File1", "id_usaha");	
		}
		
		public function saveTambah($id_usaha,$tahun,$bulan,$dl,$dp,$ml,$mp,$pajak,$retribusi){
			
			$data = array( 
					'id_usaha' => $id_usaha,
					'tahun' => $tahun,
					'bulan' => $bulan,
					'domestik_l' => $dl,
					'domestik_p' => $dp,
					'mancanegara_l' => $ml,
					'mancanegara_p' => $mp,
					'pajak' => $pajak,
					'retribusi' => $retribusi,
					'approv' => '0'
					);
			
			$this->db->insert('data_usaha', $data);
			ExceptionHandler::handleDBError($this->db->error(), "Insert DetailUsaha", "data_usaha");
			//return $data['nomor'];
		}
		public function approv_pengunjung($id_data){
			$idapprov = $this->session->userdata('id_user');
			$data = array( 
					'approv' => $idapprov,
					'tanggal_approv_data' => date('Y-m-d')
					);
			
					$this->db->set($data);
					$this->db->where('id_data_usaha', $id_data);
					$this->db->update('data_usaha');

		}

		public function saveEdit($id_data,$id_usaha,$tahun,$bulan,$dl,$dp,$ml,$mp,$pajak,$retribusi){
			
			$data = array( 
					'id_data_usaha' => $id_data,
					'id_usaha' => $id_usaha,
					'tahun' => $tahun,
					'bulan' => $bulan,
					'domestik_l' => $dl,
					'domestik_p' => $dp,
					'mancanegara_l' => $ml,
					'mancanegara_p' => $mp,
					'pajak' => $pajak,
					'retribusi' => $retribusi,
					'approv' => '0'

					);
			
					$this->db->set($data);
					$this->db->where('id_data_usaha', $data['id_data_usaha']);
					$this->db->update('data_usaha');
			//return $data['nomor'];
		}


		public function delPhoto($id_usaha,$file2){
			
			$data = array( 
					
					'id_usaha' => $id_usaha,
					'file2' => $file2

					);
			
					$this->db->set($data);
					$this->db->where('id_usaha', $data['id_usaha']);
					$this->db->update('pariwisata_usaha');
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
  public function getAllDetailUsaha($filter){
	
    $this->db->select('*');
    $this->db->from('rec_usaha as rc');
    $this->db->where("rc.id_usaha",$filter['id_usaha']);
	if(!empty($filter['tahun'])) $this->db->where('tahun', $filter['tahun']);
    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'nomor');
	}

	public function getDetailUsaha($id){
		$this->db->select('*');
		$this->db->from('rec_usaha as rc');
		$this->db->where("rc.nomor",$id);
		$row = $this->db->get();

		if (empty($row)){
			throw new UserException("DetailUsaha yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
		}
		
		$res = DataStructure::keyValue($row->result_array(), 'nomor');
		return $res[$id];
	}


	public function editDetailUsaha($data){
        $data['id_user_entry'] = $this->session->userdata('id_user');
       $this->db->set(DataStructure::slice($data, ['id_kabupaten','nama','id_jenis_usaha','id_item_usaha','lokasi','deskripsi','alamat','id_user_entry']));
		$this->db->where('id_usaha', $data['id_usaha']);
		$this->db->update('pariwisata_usaha');

		ExceptionHandler::handleDBError($this->db->error(), "Ubah Usaha", "usaha");	
		return $data['id_usaha'];

	}
}