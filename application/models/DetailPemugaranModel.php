<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailPemugaranModel extends CI_Model {

	
	public function getProfil($filter){
	
		$this->db->select('kab.nama_kabupaten, sp.deskripsi  as deskripsi , sp.dokumen as dokumen , sp.file as file ,  sp.file2 as file2 , sp.id_kabupaten as id_kabupaten ,sp.id_pemugaran as id_pemugaran ,sp.id_cagarbudaya as id_cagarbudaya ,sp.id_user_approv as id_user_approv ,sp.id_user_entry as id_user_entry ,sp.nama as nama ,sb.nama as nama_cagarbudaya ,tanggal_kegiatan');
		$this->db->from('cagarbudaya_pemugaran as sp');
		$this->db->where("id_pemugaran",$filter['id_pemugaran']);
       
		$this->db->join("cagarbudaya as sb", "sb.id_cagarbudaya = sp.id_cagarbudaya");
		$this->db->join("kabupaten as kab", "kab.id_kabupaten = sb.id_kabupaten");
		
	//	$this->db->join("j_pemugaran as js", "js.id_j_pemugaran = cb.id_j_pemugaran");
	//	$this->db->join("j2_pemugaran as j2s", "j2s.id_j2_pemugaran = cb.id_j2_pemugaran");	
		$res = $this->db->get();
		$res = $res->result_array();
		return $res[0];
		}

	
		public function approvPemugaran($data){
			$data['id_user_approv'] = $this->session->userdata('id_user');
			$this->db->set(DataStructure::slice($data, ['id_user_approv']));
			$this->db->where('id_pemugaran', $data['id_pemugaran']);
			$this->db->update('cagarbudaya_pemugaran');
			echo $data['id_user_approv'];
			echo $data['id_pemugaran'];
			
			ExceptionHandler::handleDBError($this->db->error(), "Ubah Pemugaran", "pemugaran");	
			return $data['id_pemugaran'];
	
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
		$this->db->where('id_pemugaran',$id);
		$this->db->update('cagarbudaya_pemugaran');

				// echo'end mode';
				ExceptionHandler::handleDBError($this->db->error(), "Upload File1", "id_pemugaran");	
		}
		
		public function saveTambah($id_pemugaran,$tahun,$bulan,$dl,$dp,$ml,$mp,$pajak){
			
			$data = array( 
					'id_pemugaran' => $id_pemugaran,
					'tahun' => $tahun,
					'bulan' => $bulan,
					'domestik_l' => $dl,
					'domestik_p' => $dp,
					'mancanegara_l' => $ml,
					'mancanegara_p' => $mp,
					'pajak' => $pajak
					);
			
			$this->db->insert('data_pemugaran', $data);
			ExceptionHandler::handleDBError($this->db->error(), "Insert DetailPemugaran", "data_pemugaran");
			//return $data['nomor'];
		}

		public function saveEdit($id_data,$id_pemugaran,$tahun,$bulan,$dl,$dp,$ml,$mp,$pajak){
			
			$data = array( 
					'id_data_pemugaran' => $id_data,
					'id_pemugaran' => $id_pemugaran,
					'tahun' => $tahun,
					'bulan' => $bulan,
					'domestik_l' => $dl,
					'domestik_p' => $dp,
					'mancanegara_l' => $ml,
					'mancanegara_p' => $mp,
					'pajak' => $pajak

					);
			
					$this->db->set($data);
					$this->db->where('id_data_pemugaran', $data['id_data_pemugaran']);
					$this->db->update('data_pemugaran');
			//return $data['nomor'];
		}

		public function delPhoto($id_pemugaran,$file2){
			
			$data = array( 
					
					'id_pemugaran' => $id_pemugaran,
					'file2' => $file2

					);
			
					$this->db->set($data);
					$this->db->where('id_pemugaran', $data['id_pemugaran']);
					$this->db->update('cagarbudaya_pemugaran');
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
  public function getAllDetailPemugaran($filter){
	
    $this->db->select('*');
    $this->db->from('rec_pemugaran as rc');
    $this->db->where("rc.id_pemugaran",$filter['id_pemugaran']);
	if(!empty($filter['tahun'])) $this->db->where('tahun', $filter['tahun']);
    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'nomor');
	}

	public function getDetailPemugaran($id){
		$this->db->select('*');
		$this->db->from('rec_pemugaran as rc');
		$this->db->where("rc.nomor",$id);
		$row = $this->db->get();

		if (empty($row)){
			throw new UserException("DetailPemugaran yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
		}
		
		$res = DataStructure::keyValue($row->result_array(), 'nomor');
		return $res[$id];
	}

	public function approv($data){
		$data['tanggal_approv'] = date('Y-m-d');
		$data['id_user_approv'] = $this->session->userdata('id_user');
		$this->db->set(DataStructure::slice($data, ['tanggal_approv','id_user_approv']));
		$this->db->where('id_pemugaran', $data['id_pemugaran']);
		$this->db->update('cagarbudaya_pemugaran');

		
		ExceptionHandler::handleDBError($this->db->error(), "Ubah Pemugaran", "pemugaran");	
		return $data['id_pemugaran'];

	}

	public function editDetailPemugaran($data){
		$data['id_user_entry'] = $this->session->userdata('id_user');
		$this->db->set(DataStructure::slice($data, ['tanggal_kegiatan','nama','id_cagarbudaya','deskripsi','id_user_entry']));
		$this->db->where('id_pemugaran', $data['id_pemugaran']);
		$this->db->update('cagarbudaya_pemugaran');

		ExceptionHandler::handleDBError($this->db->error(), "Ubah Pemugaran", "pemugaran");	
		return $data['id_pemugaran'];

	}
}