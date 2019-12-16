<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengunjungModel extends CI_Model {

	
	public function getPengunjung($data){ 
        if($data['tb']=='penginapan'){
            $this->db->select('nomor,tahun,bulan,domestik_personal_p as domestik_p,domestik_personal_l as domestik_l,mancanegara_personal_p as mancanegara_p,mancanegara_personal_l as mancanegara_l,pajak,retribusi');
        }else{        
            $this->db->select('*');
        }   
        $this->db->from('rec_'.$data['tb'].' as rc');
        $this->db->where("rc.id_".$data['tb'],$data['id_data']);
        if(!empty($data['tahun'])) $this->db->where('tahun', $data['tahun']);
        $res = $this->db->get();
        return DataStructure::keyValue($res->result_array(), 'nomor');
    }
}

?>