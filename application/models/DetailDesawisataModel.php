<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailDesawisataModel extends CI_Model {

	
	public function getProfil($filter){
	
		$this->db->select('*');
		$this->db->from('desawisata as cb');
		$this->db->where("id_desawisata",$filter['id_desawisata']);
		$this->db->join("kategori_desawisata as js", "js.id_kategori = cb.id_kategori");
	
		$res = $this->db->get();
		$res = $res->result_array();
		return $res[0];
		}

	
		public function approvDesawisata($data){
            $data['id_user_approv'] = $this->session->userdata('id_user');
            $data['tanggal_approv'] = date('d-m-Y');
			$this->db->set(DataStructure::slice($data, ['id_user_approv','tanggal_approv']));
			$this->db->where('id_desawisata', $data['id_desawisata']);
			$this->db->update('desawisata');
            echo  'data tanggal = '.$data['tanggal_approv'];
			
			ExceptionHandler::handleDBError($this->db->error(), "Ubah Desawisata", "desawisata");	
			return $data['id_desawisata'];
	
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
		$this->db->where('id_desawisata',$id);
		$this->db->update('desawisata');

				// echo'end mode';
				ExceptionHandler::handleDBError($this->db->error(), "Upload File1", "id_desawisata");	
		}
		
		public function delPhoto($id_desawisata,$file2){
			
			$data = array( 
					
					'id_desawisata' => $id_desawisata,
					'file2' => $file2

					);
			
					$this->db->set($data);
					$this->db->where('id_desawisata', $data['id_desawisata']);
					$this->db->update('desawisata');
			//return $data['nomor'];
		}

		public function saveTambah($id_desawisata,$tahun,$bulan,$dl,$dp,$ml,$mp,$pajak){
			
			$data = array( 
					'id_desawisata' => $id_desawisata,
					'tahun' => $tahun,
					'bulan' => $bulan,
					'domestik_l' => $dl,
					'domestik_p' => $dp,
					'mancanegara_l' => $ml,
					'mancanegara_p' => $mp,
					'pajak' => $pajak,
					'approv' => '0'
					);
			
			$this->db->insert('data_desawisata', $data);
			ExceptionHandler::handleDBError($this->db->error(), "Insert DetailDesawisata", "data_desawisata");
			//return $data['nomor'];
		}

		public function saveEdit($id_data,$id_desawisata,$tahun,$bulan,$dl,$dp,$ml,$mp,$pajak){
			
			$data = array( 
					'id_data_desawisata' => $id_data,
					'id_desawisata' => $id_desawisata,
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
					$this->db->where('id_data_desawisata', $data['id_data_desawisata']);
					$this->db->update('data_desawisata');
			//return $data['nomor'];
		}
		public function approv_pengunjung($id_data){
			$idapprov = $this->session->userdata('id_user');
			$data = array( 
					'tanggal_approv_data' => date('d-m-Y'),
					'approv' => $idapprov
					);
			
					$this->db->set($data);
					$this->db->where('id_data_desawisata', $id_data);
					$this->db->update('data_desawisata');

		}

		public function getTahun(){
	
			$this->db->select('*');
			$this->db->from('tb_tahun');
			$res = $this->db->get();
			$res = $res->result_array();
		   // $res = DataStructure::keyValue($res->result_array());
			return $res;
		}
  public function getAllDetailDesawisata($filter){
	
    $this->db->select('*');
    $this->db->from('rec_desawisata as rc');
    $this->db->where("rc.id_desawisata",$filter['id_desawisata']);
	if(!empty($filter['tahun'])) $this->db->where('tahun', $filter['tahun']);
    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'nomor');
	}

	public function getDetailDesawisata($id){
		$this->db->select('*');
		$this->db->from('rec_desawisata as rc');
		$this->db->where("rc.nomor",$id);
		$row = $this->db->get();

		if (empty($row)){
			throw new UserException("DetailDesawisata yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
		}
		
		$res = DataStructure::keyValue($row->result_array(), 'nomor');
		return $res[$id];
	}


	public function editDetailDesawisata($data){
		$data['id_user_entry'] = $this->session->userdata('id_user');
		$this->db->set(DataStructure::slice($data, ['nama','id_kategori','lokasi','deskripsi','alamat','id_user_entry']));
		$this->db->where('id_desawisata', $data['id_desawisata']);
		$this->db->update('desawisata');

		ExceptionHandler::handleDBError($this->db->error(), "Ubah Desawisata", "desawisata");	
		return $data['id_desawisata'];

	}
}