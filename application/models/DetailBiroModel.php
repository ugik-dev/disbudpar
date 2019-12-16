<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailBiroModel extends CI_Model {

	
	public function getProfil($filter){
	
		$this->db->select('sp.*,jp.*,sb.*,kab.nama_kabupaten');
		$this->db->from('pariwisata_biro as sp');
		$this->db->where("id_biro",$filter['id_biro']);
        $this->db->join("pariwisata_jenis_biro as jp", "jp.id_jenis_biro = sp.id_jenis_biro");
        $this->db->join("pariwisata_sertifikat_biro as sb", "sb.id_sertifikat_biro = sp.id_sertifikat_biro");
		$this->db->join("kabupaten as kab", "kab.id_kabupaten = sp.id_kabupaten");
	
	//	$this->db->join("j_biro as js", "js.id_j_biro = cb.id_j_biro");
	//	$this->db->join("j2_biro as j2s", "j2s.id_j2_biro = cb.id_j2_biro");	
		$res = $this->db->get();
		$res = $res->result_array();
		return $res[0];
		}

	
		public function approvBiro($data){
			$data['tanggal_approv'] = date('Y-m-d');
			$data['id_user_approv'] = $this->session->userdata('id_user');
			$this->db->set(DataStructure::slice($data, ['tanggal_approv','id_user_approv']));
			$this->db->where('id_biro', $data['id_biro']);
			$this->db->update('pariwisata_biro');
			echo $data['id_user_approv'];
			echo $data['id_biro'];
			
			ExceptionHandler::handleDBError($this->db->error(), "Ubah Biro", "biro");	
			return $data['id_biro'];
	
		}
		public function approv($data){
			$data['tanggal_approv'] = date('Y-m-d');
			$data['id_user_approv'] = $this->session->userdata('id_user');
			$this->db->set(DataStructure::slice($data, ['tanggal_approv','id_user_approv']));
			$this->db->where('id_biro', $data['id_biro']);
			$this->db->update('pariwisata_biro');
			echo $data['id_user_approv'];
			echo $data['id_biro'];
			
			ExceptionHandler::handleDBError($this->db->error(), "Ubah Biro", "biro");	
			return $data['id_biro'];
	
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
		$this->db->where('id_biro',$id);
		$this->db->update('pariwisata_biro');

				// echo'end mode';
				ExceptionHandler::handleDBError($this->db->error(), "Upload File1", "id_biro");	
		}
		
		public function saveTambah($id_biro,$tahun,$bulan,$dl,$dp,$ml,$mp,$pajak,$retribusi){
			
			$data = array( 
					'id_biro' => $id_biro,
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
			
			$this->db->insert('data_biro', $data);
			ExceptionHandler::handleDBError($this->db->error(), "Insert DetailBiro", "data_biro");
			//return $data['nomor'];
		}
		public function approv_pengunjung($id_data){
			$idapprov = $this->session->userdata('id_user');
			$data = array( 
					'approv' => $idapprov,
					'tanggal_approv_data' => date('Y-m-d')
					);
			
					$this->db->set($data);
					$this->db->where('id_data_biro', $id_data);
					$this->db->update('data_biro');

		}

		public function saveEdit($id_data,$id_biro,$tahun,$bulan,$dl,$dp,$ml,$mp,$pajak,$retribusi){
			
			$data = array( 
					'id_data_biro' => $id_data,
					'id_biro' => $id_biro,
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
					$this->db->where('id_data_biro', $data['id_data_biro']);
					$this->db->update('data_biro');
			//return $data['nomor'];
		}


		public function delPhoto($id_biro,$file2){
			
			$data = array( 
					
					'id_biro' => $id_biro,
					'file2' => $file2

					);
			
					$this->db->set($data);
					$this->db->where('id_biro', $data['id_biro']);
					$this->db->update('pariwisata_biro');
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
		
  public function getAllDetailBiro($filter){
	
    $this->db->select('*');
    $this->db->from('rec_biro as rc');
    $this->db->where("rc.id_biro",$filter['id_biro']);
	if(!empty($filter['tahun'])) $this->db->where('tahun', $filter['tahun']);
    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'nomor');
	}

	public function getDetailBiro($id){
		$this->db->select('*');
		$this->db->from('rec_biro as rc');
		$this->db->where("rc.nomor",$id);
		$row = $this->db->get();

		if (empty($row)){
			throw new UserException("DetailBiro yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
		}
		
		$res = DataStructure::keyValue($row->result_array(), 'nomor');
		return $res[$id];
	}


	public function editDetailBiro($data){
        $data['id_user_entry'] = $this->session->userdata('id_user');
       	$this->db->set(DataStructure::slice($data, ['id_kabupaten','nama','id_jenis_biro','id_sertifikat_biro','lokasi','deskripsi','alamat','id_user_entry']));
		$this->db->where('id_biro', $data['id_biro']);
		$this->db->update('pariwisata_biro');

		ExceptionHandler::handleDBError($this->db->error(), "Ubah Biro", "biro");	
		return $data['id_biro'];

	}
}