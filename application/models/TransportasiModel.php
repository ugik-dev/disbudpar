<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransportasiModel extends CI_Model {

	
	public function getProfil($filter){
		$iduser = $this->session->userdata('id_user');
		$this->db->select('*');
		$this->db->from('transportasi as cb');
		$this->db->where("id_operator",$iduser);
		//$this->db->where_or("id_pimpinan",$iduser);
		$this->db->join("jenis_transportasi as js", "js.id_jenis_transportasi = cb.id_jenis_transportasi");
		//$this->db->join("kabupaten as kab", "kab.id_kabupaten = cb.id_kabupaten");
		
		$res = $this->db->get();
		$res = $res->result_array();
		return $res[0];
		}

	
		public function approvObjek($data){
			$data['tanggal_app	rov'] = date('Y-m-d');
			$data['id_user_approv'] = $this->session->userdata('id_user');
			$this->db->set(DataStructure::slice($data, ['tanggal_approv','id_user_approv']));
			$this->db->where('id_transportasi', $data['id_transportasi']);
			$this->db->update('transportasi');
			echo $data['id_user_approv'];
			echo $data['id_transportasi'];
			
			ExceptionHandler::handleDBError($this->db->error(), "Ubah Objek", "transportasi");	
			return $data['id_transportasi'];
	
		}
		public function approv($data){
			$data['tanggal_approv'] = date('Y-m-d');
			$data['id_user_approv'] = $this->session->userdata('id_user');
			$this->db->set(DataStructure::slice($data, ['tanggal_approv','id_user_approv']));
			$this->db->where('id_transportasi', $data['id_transportasi']);
			$this->db->update('transportasi');
			echo $data['id_user_approv'];
			echo $data['id_transportasi'];
			
			ExceptionHandler::handleDBError($this->db->error(), "Ubah Objek", "transportasi");	
			return $data['id_transportasi'];
	
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
			$this->db->where('id_transportasi',$id);
			$this->db->update('transportasi');

				// echo'end mode';
				ExceptionHandler::handleDBError($this->db->error(), "Upload File1", "id_transportasi");	
		}
		
		public function delPhoto($id_transportasi,$file2){
			
			$data = array( 
					
					'id_transportasi' => $id_transportasi,
					'file2' => $file2

					);
			
					$this->db->set($data);
					$this->db->where('id_transportasi', $data['id_transportasi']);
					$this->db->update('transportasi');
			//return $data['nomor'];
		}

		public function saveTambah($id_transportasi,$tahun,$bulan,$dl,$dp,$ml,$mp,$pajak,$retribusi){
			
			$data = array( 
					'id_transportasi' => $id_transportasi,
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
			
			$this->db->insert('data_transportasi', $data);
			ExceptionHandler::handleDBError($this->db->error(), "Insert Transportasi", "data_transportasi");
			//return $data['nomor'];
		}

		public function saveEdit($id_data,$id_transportasi,$tahun,$bulan,$dl,$dp,$ml,$mp,$pajak,$retribusi){
			
			$data = array( 
					'id_data_transportasi' => $id_data,
					'id_transportasi' => $id_transportasi,
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
					$this->db->where('id_data_transportasi', $data['id_data_transportasi']);
					$this->db->update('data_transportasi');
			//return $data['nomor'];
		}
		public function approv_pengunjung($id_data){
			$idapprov = $this->session->userdata('id_user');
			$data = array( 
					'approv' => $idapprov,
					'tanggal_approv_data' => date('Y-m-d')
					);
			
					$this->db->set($data);
					$this->db->where('id_data_transportasi', $id_data);
					$this->db->update('data_transportasi');

		}

		public function getTahun(){
	
			$this->db->select('*');
			$this->db->from('tb_tahun');
			$res = $this->db->get();
			$res = $res->result_array();
		   // $res = DataStructure::keyValue($res->result_array());
			return $res;
		}
  public function getAllTransportasi($filter){
	
    $this->db->select('*');
    $this->db->from('rec_transportasi as rc');
    $this->db->where("rc.id_transportasi",$filter['id_transportasi']);
	if(!empty($filter['tahun'])) $this->db->where('tahun', $filter['tahun']);
    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'nomor');
	}

	public function getTransportasi($id){
		$this->db->select('*');
		$this->db->from('rec_transportasi as rc');
		$this->db->where("rc.nomor",$id);
		$row = $this->db->get();

		if (empty($row)){
			throw new UserException("Transportasi yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
		}
		
		$res = DataStructure::keyValue($row->result_array(), 'nomor');
		return $res[$id];
	}


	public function editTransportasi($data){
		$data['id_user_entry'] = $this->session->userdata('id_user');
		$this->db->set(DataStructure::slice($data, ['tahun_terdata','nama','lokasi','deskripsi','alamat','id_user_entry']));
		$this->db->where('id_transportasi', $data['id_transportasi']);
		$this->db->update('transportasi');

		ExceptionHandler::handleDBError($this->db->error(), "Ubah Transportasi", "transportasi");	
		return $data['id_transportasi'];

	}
}