<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailPagelaranModel extends CI_Model {

	
	public function getProfil($filter){
	
		$this->db->select('sp.alamat as alamat , sp.deskripsi  as deskripsi , sp.dokumen as dokumen , sp.file as file ,  sp.file2 as file2 , sp.id_jenis_pagelaran as id_jenis_pagelaran ,kab.id_kabupaten as id_kabupaten ,sp.id_pagelaran as id_pagelaran ,sp.id_senibudaya as id_senibudaya ,sp.id_user_approv as id_user_approv ,sp.id_user_entry as id_user_entry ,sp.jumlah_penonton as jumlah_penonton, sp.lokasi as lokasi ,sp.nama as nama ,sb.nama as nama_senibudaya ,nama_jenis_pagelaran ,tanggal_kegiatan,tanggal_kegiatan_end');
		$this->db->from('senibudaya_pagelaranpameran as sp');
		$this->db->where("id_pagelaran",$filter['id_pagelaran']);
        $this->db->join("jenis_pagelaran as jp", "jp.id_jenis_pagelaran = sp.id_jenis_pagelaran");
		$this->db->join("senibudaya as sb", "sb.id_senibudaya = sp.id_senibudaya");
		$this->db->join("kabupaten as kab", "sb.id_kabupaten = kab.id_kabupaten");
		
	//	$this->db->join("j_pagelaran as js", "js.id_j_pagelaran = cb.id_j_pagelaran");
	//	$this->db->join("j2_pagelaran as j2s", "j2s.id_j2_pagelaran = cb.id_j2_pagelaran");	
		$res = $this->db->get();
		$res = $res->result_array();
		return $res[0];
		}

	
		public function approv($data){
			$data['tanggal_approv'] = date('Y-m-d');
			$data['id_user_approv'] = $this->session->userdata('id_user');
			$this->db->set(DataStructure::slice($data, ['tanggal_approv','id_user_approv']));
			$this->db->where('id_pagelaran', $data['id_pagelaran']);
			$this->db->update('senibudaya_pagelaranpameran');
	
			
			ExceptionHandler::handleDBError($this->db->error(), "Ubah Pagelaran", "pagelaran");	
			return $data['id_pagelaran'];
	
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
		$this->db->where('id_pagelaran',$id);
		$this->db->update('senibudaya_pagelaranpameran');

				// echo'end mode';
				ExceptionHandler::handleDBError($this->db->error(), "Upload File1", "id_pagelaran");	
		}
		
		public function saveTambah($id_pagelaran,$tahun,$bulan,$dl,$dp,$ml,$mp,$pajak){
			
			$data = array( 
					'id_pagelaran' => $id_pagelaran,
					'tahun' => $tahun,
					'bulan' => $bulan,
					'domestik_l' => $dl,
					'domestik_p' => $dp,
					'mancanegara_l' => $ml,
					'mancanegara_p' => $mp,
					'pajak' => $pajak,
					'approv' => '0'
					);
			
			$this->db->insert('data_pagelaran', $data);
			ExceptionHandler::handleDBError($this->db->error(), "Insert DetailPagelaran", "data_pagelaran");
			//return $data['nomor'];
		}

		public function saveEdit($id_data,$id_pagelaran,$tahun,$bulan,$dl,$dp,$ml,$mp,$pajak){
			
			$data = array( 
					'id_data_pagelaran' => $id_data,
					'id_pagelaran' => $id_pagelaran,
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
					$this->db->where('id_data_pagelaran', $data['id_data_pagelaran']);
					$this->db->update('data_pagelaran');
			//return $data['nomor'];
		}

		public function delPhoto($id_pagelaran,$file2){
			
			$data = array( 
					
					'id_pagelaran' => $id_pagelaran,
					'file2' => $file2

					);
			
					$this->db->set($data);
					$this->db->where('id_pagelaran', $data['id_pagelaran']);
					$this->db->update('senibudaya_pagelaranpameran');
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
  public function getAllDetailPagelaran($filter){
	
    $this->db->select('*');
    $this->db->from('rec_pagelaran as rc');
    $this->db->where("rc.id_pagelaran",$filter['id_pagelaran']);
	if(!empty($filter['tahun'])) $this->db->where('tahun', $filter['tahun']);
    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'nomor');
	}

	public function getDetailPagelaran($id){
		$this->db->select('*');
		$this->db->from('rec_pagelaran as rc');
		$this->db->where("rc.nomor",$id);
		$row = $this->db->get();

		if (empty($row)){
			throw new UserException("DetailPagelaran yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
		}
		
		$res = DataStructure::keyValue($row->result_array(), 'nomor');
		return $res[$id];
	}


	public function editDetailPagelaran($data){
		$data['id_user_entry'] = $this->session->userdata('id_user');
		$this->db->set(DataStructure::slice($data, ['tanggal_kegiatan','tanggal_kegiatan_end','nama','id_jenis_pagelaran','id_senibudaya','jumlah_penonton','lokasi','deskripsi','alamat','id_user_entry']));
		$this->db->where('id_pagelaran', $data['id_pagelaran']);
		$this->db->update('senibudaya_pagelaranpameran');

		ExceptionHandler::handleDBError($this->db->error(), "Ubah Pagelaran", "pagelaran");	
		return $data['id_pagelaran'];

	}
}