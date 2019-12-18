<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailObjekModel extends CI_Model {

	
	public function getProfil($filter){
	
		$this->db->select('cb.*,js.*,kab.nama_kabupaten');
		$this->db->from('pariwisata_objek as cb');
		$this->db->where("id_objek",$filter['id_objek']);
		$this->db->join("pariwisata_jenis_objek as js", "js.id_jenis_objek = cb.id_jenis_objek");
		$this->db->join("kabupaten as kab", "kab.id_kabupaten = cb.id_kabupaten");
		
		$res = $this->db->get();
		$res = $res->result_array();
		return $res[0];
		}

	
		public function approvObjek($data){
			$data['tanggal_approv'] = date('Y-m-d');
			$data['id_user_approv'] = $this->session->userdata('id_user');
			$this->db->set(DataStructure::slice($data, ['tanggal_approv','id_user_approv']));
			$this->db->where('id_objek', $data['id_objek']);
			$this->db->update('pariwisata_objek');
			echo $data['id_user_approv'];
			echo $data['id_objek'];
			
			ExceptionHandler::handleDBError($this->db->error(), "Ubah Objek", "objek");	
			return $data['id_objek'];
	
		}
		public function approv($data){
			$data['tanggal_approv'] = date('Y-m-d');
			$data['id_user_approv'] = $this->session->userdata('id_user');
			$this->db->set(DataStructure::slice($data, ['tanggal_approv','id_user_approv']));
			$this->db->where('id_objek', $data['id_objek']);
			$this->db->update('pariwisata_objek');
			echo $data['id_user_approv'];
			echo $data['id_objek'];
			
			ExceptionHandler::handleDBError($this->db->error(), "Ubah Objek", "objek");	
			return $data['id_objek'];
	
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
		$this->db->where('id_objek',$id);
		$this->db->update('pariwisata_objek');

				// echo'end mode';
				ExceptionHandler::handleDBError($this->db->error(), "Upload File1", "id_objek");	
		}
		
		public function delPhoto($id_objek,$file2){
			
			$data = array( 
					
					'id_objek' => $id_objek,
					'file2' => $file2

					);
			
					$this->db->set($data);
					$this->db->where('id_objek', $data['id_objek']);
					$this->db->update('pariwisata_objek');
			//return $data['nomor'];
		}

		public function saveTambah($id_objek,$tahun,$bulan,$dl,$dp,$ml,$mp,$pajak,$retribusi){
			
			$data = array( 
					'id_objek' => $id_objek,
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
			
			$this->db->insert('data_objek', $data);
			ExceptionHandler::handleDBError($this->db->error(), "Insert DetailObjek", "data_objek");
			//return $data['nomor'];
		}

		public function saveEdit($id_data,$id_objek,$tahun,$bulan,$dl,$dp,$ml,$mp,$pajak,$retribusi){
			
			$data = array( 
					'id_data_objek' => $id_data,
					'id_objek' => $id_objek,
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
					$this->db->where('id_data_objek', $data['id_data_objek']);
					$this->db->update('data_objek');
			//return $data['nomor'];
		}
		public function approv_pengunjung($id_data){
			$idapprov = $this->session->userdata('id_user');
			$data = array( 
					'approv' => $idapprov,
					'tanggal_approv_data' => date('Y-m-d')
					);
			
					$this->db->set($data);
					$this->db->where('id_data_objek', $id_data);
					$this->db->update('data_objek');

		}

		public function getTahun(){
	
			$this->db->select('*');
			$this->db->from('tb_tahun');
			$res = $this->db->get();
			$res = $res->result_array();
		   // $res = DataStructure::keyValue($res->result_array());
			return $res;
		}
  public function getAllDetailObjek($filter){
	
    $this->db->select('*');
    $this->db->from('rec_objek as rc');
    $this->db->where("rc.id_objek",$filter['id_objek']);
	if(!empty($filter['tahun'])) $this->db->where('tahun', $filter['tahun']);
    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'nomor');
	}

	public function getDetailObjek($id){
		$this->db->select('*');
		$this->db->from('rec_objek as rc');
		$this->db->where("rc.nomor",$id);
		$row = $this->db->get();

		if (empty($row)){
			throw new UserException("DetailObjek yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
		}
		
		$res = DataStructure::keyValue($row->result_array(), 'nomor');
		return $res[$id];
	}


	public function editDetailObjek($data){
		$data['id_user_entry'] = $this->session->userdata('id_user');
		$this->db->set(DataStructure::slice($data, ['tahun_terdata','id_kabupaten','nama','id_jenis_objek','lokasi','deskripsi','alamat','id_user_entry']));
		$this->db->where('id_objek', $data['id_objek']);
		$this->db->update('pariwisata_objek');

		ExceptionHandler::handleDBError($this->db->error(), "Ubah Objek", "objek");	
		return $data['id_objek'];

	}
}