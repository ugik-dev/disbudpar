<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailCagarbudayaModel extends CI_Model {

	
	public function getProfil($filter){
		//var_dump($filter);
		$this->db->select('cb.*,js.*,ko.*,sp.*,kab.nama_kabupaten');
		$this->db->from('cagarbudaya as cb');
		$this->db->where("id_cagarbudaya",$filter['id_cagarbudaya']);
		$this->db->join("jenis_cagarbudaya as js", "js.id_jenis_cagarbudaya = cb.id_jenis_cagarbudaya");
		$this->db->join("kepemilikan_cagarbudaya as ko", "ko.id_kepemilikan_cagarbudaya = cb.id_kepemilikan_cagarbudaya");
		$this->db->join("status_penetapan_cagarbudaya as sp", "sp.id_status_penetapan_cagarbudaya = cb.id_status_penetapan_cagarbudaya");
		$this->db->join("kabupaten as kab", "kab.id_kabupaten = cb.id_kabupaten");
		
		$res = $this->db->get();
		$res = $res->result_array();
		//var_dump($res);
		return $res[0];
		}
		public function getPdf($filter){
			$this->db->select('*.cb');
			$this->db->from('cagarbudaya as cb');
			$this->db->where("id_cagarbudaya",$filter['id_cagarbudaya']);
			$this->db->join("jenis_cagarbudaya as js", "js.id_jenis_cagarbudaya = cb.id_jenis_cagarbudaya");
			$this->db->join("kepemilikan_cagarbudaya as ko", "ko.id_kepemilikan_cagarbudaya = cb.id_kepemilikan_cagarbudaya");
			$this->db->join("status_penetapan_cagarbudaya as sp", "sp.id_status_penetapan_cagarbudaya = cb.id_status_penetapan_cagarbudaya");
			
			$res = $this->db->get();
			$res = $res->result_array();
			return $res;
			}

	
		public function approvCagarbudaya($data){
			$data['tanggal_approv'] = date('Y-m-d');
			$data['id_user_approv'] = $this->session->userdata('id_user');
			$this->db->set(DataStructure::slice($data, ['tanggal_approv','id_user_approv']));
			$this->db->where('id_cagarbudaya', $data['id_cagarbudaya']);
			$this->db->update('cagarbudaya');
			echo $data['id_user_approv'];
			echo $data['id_cagarbudaya'];
			
			ExceptionHandler::handleDBError($this->db->error(), "Ubah Cagarbudaya", "cagarbudaya");	
			return $data['id_cagarbudaya'];
	
		}
		public function getUser($filter){			
			$this->db->select('nama');
			$this->db->from('user');
			$this->db->where("id_user",$filter['id_user']);

			$res = $this->db->get();
			$res = $res->result_array();
			return $res[0];
			}
		public function getKabupaten($filter){			
			$this->db->select('nama_kabupaten');
			$this->db->from('kabupaten');
			$this->db->where("id_kabupaten",$filter);

			$res = $this->db->get();
			$res = $res->result_array();
			return $res[0]['nama_kabupaten'];
			}
		
		public function simpan_upload1($id,$data2,$field){
				echo'masuk mode';
				echo $id;
				echo $data2;
				echo $field;
		$this->db->set($field,$data2);
		$this->db->where('id_cagarbudaya',$id);
		$this->db->update('cagarbudaya');

				// echo'end mode';
				ExceptionHandler::handleDBError($this->db->error(), "Upload File1", "id_cagarbudaya");	
		}
		
		
		public function approv($data){
			$data['tanggal_approv'] = date('Y-m-d');
			$data['id_user_approv'] = $this->session->userdata('id_user');
			$this->db->set(DataStructure::slice($data, ['tanggal_approv','id_user_approv']));
			$this->db->where('id_cagarbudaya', $data['id_cagarbudaya']);
			$this->db->update('cagarbudaya');
	
			
			ExceptionHandler::handleDBError($this->db->error(), "Ubah Pagelaran", "pagelaran");	
			return $data['id_cagarbudaya'];
	
		}

		public function delPhoto($id_cagarbudaya,$file2){
			
			$data = array( 
					
					'id_cagarbudaya' => $id_cagarbudaya,
					'file2' => $file2

					);
			
					$this->db->set($data);
					$this->db->where('id_cagarbudaya', $data['id_cagarbudaya']);
					$this->db->update('cagarbudaya');
			//return $data['nomor'];
		}

		public function saveTambah($id_cagarbudaya,$tahun,$bulan,$dl,$dp,$ml,$mp,$pajak,$retribusi){
			
			$data = array( 
					'id_cagarbudaya' => $id_cagarbudaya,
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
			
			$this->db->insert('data_cagarbudaya', $data);
			ExceptionHandler::handleDBError($this->db->error(), "Insert DetailCagarbudaya", "data_cagarbudaya");
			//return $data['nomor'];
		}

		public function saveEdit($id_data,$id_cagarbudaya,$tahun,$bulan,$dl,$dp,$ml,$mp,$pajak,$retribusi){
			
			$data = array( 
					'id_data_cagarbudaya' => $id_data,
					'id_cagarbudaya' => $id_cagarbudaya,
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
					$this->db->where('id_data_cagarbudaya', $data['id_data_cagarbudaya']);
					$this->db->update('data_cagarbudaya');
			//return $data['nomor'];
		}

		public function approv_pengunjung($id_data){
			$idapprov = $this->session->userdata('id_user');
			$data = array( 
					'approv' => $idapprov,
					'tanggal_approv_data' => date('Y-m-d')
					);
			
					$this->db->set($data);
					$this->db->where('id_data_cagarbudaya', $id_data);
					$this->db->update('data_cagarbudaya');

		}

		public function getTahun(){
	
			$this->db->select('*');
			$this->db->from('tb_tahun');
			$res = $this->db->get();
			$res = $res->result_array();
		   // $res = DataStructure::keyValue($res->result_array());
			return $res;
		}
  public function getAllDetailCagarbudaya($filter){
	
    $this->db->select('*');
    $this->db->from('rec_cagarbudaya as rc');
    $this->db->where("rc.id_cagarbudaya",$filter['id_cagarbudaya']);
	if(!empty($filter['tahun'])) $this->db->where('tahun', $filter['tahun']);
    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'nomor');
	}

	public function getDetailCagarbudaya($id){
		$this->db->select('*');
		$this->db->from('rec_cagarbudaya as rc');
		$this->db->where("rc.nomor",$id);
		$row = $this->db->get();

		if (empty($row)){
			throw new UserException("DetailCagarbudaya yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
		}
		
		$res = DataStructure::keyValue($row->result_array(), 'nomor');
		return $res[$id];
	}


	public function editDetailCagarbudaya($data){
		$data['id_user_entry'] = $this->session->userdata('id_user');
		if($this->session->userdata('id_role') == '1'){
		$this->db->set(DataStructure::slice($data, ['tahun_terdata','nama','id_kabupaten','id_jenis_cagarbudaya','id_kepemilikan_cagarbudaya','id_status_penetapan_cagarbudaya','lokasi','deskripsi','alamat','id_user_entry']));
		}else{
			$this->db->set(DataStructure::slice($data, ['tahun_terdata','nama','id_jenis_cagarbudaya','id_kepemilikan_cagarbudaya','id_status_penetapan_cagarbudaya','lokasi','deskripsi','alamat','id_user_entry']));
			
		}
		$this->db->where('id_cagarbudaya', $data['id_cagarbudaya']);
		$this->db->update('cagarbudaya');

		ExceptionHandler::handleDBError($this->db->error(), "Ubah Cagarbudaya", "cagarbudaya");	
		return $data['id_cagarbudaya'];

	}
}