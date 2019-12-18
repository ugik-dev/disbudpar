<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailPenginapanModel extends CI_Model {

	
	public function getProfil($filter){
	
		$this->db->select('cb.*,js.*,kab.nama_kabupaten');
		$this->db->from('pariwisata_penginapan as cb');
		$this->db->where("id_penginapan",$filter['id_penginapan']);
		$this->db->join("pariwisata_jenis_penginapan as js", "js.id_jenis_penginapan = cb.id_jenis_penginapan");
		$this->db->join("kabupaten as kab", "kab.id_kabupaten = cb.id_kabupaten");
	
		$res = $this->db->get();
		$res = $res->result_array();
		return $res[0];
		}

		public function approvPenginapan($data){
			$data['tanggal_approv'] = date('Y-m-d');
			$data['id_user_approv'] = $this->session->userdata('id_user');
			$this->db->set(DataStructure::slice($data, ['tanggal_approv','id_user_approv']));
			$this->db->where('id_penginapan', $data['id_penginapan']);
			$this->db->update('pariwisata_penginapan');
			echo $data['id_user_approv'];
			echo $data['id_penginapan'];
			
			ExceptionHandler::handleDBError($this->db->error(), "Ubah penginapan", "penginapan");	
			return $data['id_penginapan'];
	
		}
		public function approv($data){
			$data['tanggal_approv'] = date('Y-m-d');
			$data['id_user_approv'] = $this->session->userdata('id_user');
			$this->db->set(DataStructure::slice($data, ['tanggal_approv','id_user_approv']));
			$this->db->where('id_penginapan', $data['id_penginapan']);
			$this->db->update('pariwisata_penginapan');
			echo $data['id_user_approv'];
			echo $data['id_penginapan'];
			
			ExceptionHandler::handleDBError($this->db->error(), "Ubah penginapan", "penginapan");	
			return $data['id_penginapan'];
	
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
		$this->db->where('id_penginapan',$id);
		$this->db->update('pariwisata_penginapan');

				// echo'end mode';
				ExceptionHandler::handleDBError($this->db->error(), "Upload File1", "id_penginapan");	
		}
		
		public function delPhoto($id_penginapan,$file2){
			
			$data = array( 
					
					'id_penginapan' => $id_penginapan,
					'file2' => $file2

					);
			
					$this->db->set($data);
					$this->db->where('id_penginapan', $data['id_penginapan']);
					$this->db->update('pariwisata_penginapan');
			//return $data['nomor'];
		}

		public function saveTambah($id_penginapan,$tahun,$bulan,$dl,$dp,$ml,$mp,$dd,$dm,$pajak,$retribusi){
			
			$data = array( 
					'id_penginapan' => $id_penginapan,
					'tahun' => $tahun,
					'bulan' => $bulan,
					'domestik_personal_l' => $dl,
					'domestik_personal_p' => $dp,
					'mancanegara_personal_l' => $ml,
					'mancanegara_personal_p' => $mp,
					'domestik_durasi' => $dd,
					'mancanegara_durasi' => $dm,
					'retribusi' => $retribusi,
					'pajak' => $pajak,
					'approv' => '0'
					);
			
			$this->db->insert('data_penginapan', $data);
			ExceptionHandler::handleDBError($this->db->error(), "Insert Detailpenginapan", "data_penginapan");
			//return $data['nomor'];
		}

		public function saveEdit($id_data,$id_penginapan,$tahun,$bulan,$dl,$dp,$ml,$mp,$dd,$dm,$pajak,$retribusi){
			
			$data = array( 
					'id_data_penginapan' => $id_data,
					'id_penginapan' => $id_penginapan,
					'tahun' => $tahun,
					'bulan' => $bulan,
					'domestik_personal_l' => $dl,
					'domestik_personal_p' => $dp,
					'mancanegara_personal_l' => $ml,
					'mancanegara_personal_p' => $mp,
					'domestik_durasi' => $dd,
					'mancanegara_durasi' => $dm,
					'retribusi' => $retribusi,
					'pajak' => $pajak,
					'approv' => '0'

					);
					
			
					$this->db->set($data);
					$this->db->where('id_data_penginapan', $data['id_data_penginapan']);
					$this->db->update('data_penginapan');
			//return $data['nomor'];
		}

		public function approv_pengunjung($id_data){
			$idapprov = $this->session->userdata('id_user');
			$data = array( 
					'approv' => $idapprov,
					'tanggal_approv_data' => date('Y-m-d')
					);			
					$this->db->set($data);
					$this->db->where('id_data_penginapan', $id_data);
					$this->db->update('data_penginapan');

		}
		public function getTahun(){
	
			$this->db->select('*');
			$this->db->from('tb_tahun');
			$res = $this->db->get();
			$res = $res->result_array();
		   // $res = DataStructure::keyValue($res->result_array());
			return $res;
		}
  public function getAllDetailPenginapan($filter){
	
    $this->db->select('*');
    $this->db->from('rec_penginapan as rc');
    $this->db->where("rc.id_penginapan",$filter['id_penginapan']);
	if(!empty($filter['tahun'])) $this->db->where('tahun', $filter['tahun']);
    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'nomor');
	}

	public function getDetailPenginapan($id){
		$this->db->select('*');
		$this->db->from('rec_penginapan as rc');
		$this->db->where("rc.nomor",$id);
		$row = $this->db->get();

		if (empty($row)){
			throw new UserException("DetailPenginapan yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
		}
		
		$res = DataStructure::keyValue($row->result_array(), 'nomor');
		return $res[$id];
	}


	public function editDetailPenginapan($data){
		$data['id_user_entry'] = $this->session->userdata('id_user');
		$this->db->set(DataStructure::slice($data, ['tahun_terdata','id_kabupaten','nama','id_jenis_penginapan','jumlah_kamar','jumlah_tempat_tidur','lokasi','deskripsi','alamat','id_user_entry']));
		$this->db->where('id_penginapan', $data['id_penginapan']);
		$this->db->update('pariwisata_penginapan');

		ExceptionHandler::handleDBError($this->db->error(), "Ubah penginapan", "penginapan");	
		return $data['id_penginapan'];

	}
}