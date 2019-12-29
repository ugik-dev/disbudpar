<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class KalenderModel extends CI_Model{ 
    function __construct() { 
        // Set table name 
        $this->table = 'events'; 
    } 
    public function getPagelaran(){
        $now = date('d-m-Y');
        //var_dump($now);
        $this->db->select('ROW_NUMBER() OVER (ORDER BY tanggal_kegiatan ASC) as nomor,sp.*,kab.nama_kabupaten,jp.nama_jenis_pagelaran');
        $this->db->from('senibudaya_pagelaranpameran as sp');
        $this->db->join('jenis_pagelaran as jp','sp.id_jenis_pagelaran=jp.id_jenis_pagelaran');
       $this->db->join('kabupaten as kab','sp.id_kabupaten=kab.id_kabupaten');
        $this->db->order_by('tanggal_kegiatan');
       $this->db->where('sp.id_user_approv != 0');
        $this->db->where('sp.tanggal_kegiatan >= current_date()');
        $res=$this->db->get();
        return $res->result_array();
    }
    public function getPagelaran2(){
        $now = date('d-m-Y');
        //var_dump($now);
        $this->db->select('ROW_NUMBER() OVER (ORDER BY tanggal_kegiatan ASC) as nomor,sp.*,kab.nama_kabupaten,jp.nama_jenis_pagelaran');
        $this->db->from('senibudaya_pagelaranpameran as sp');
        $this->db->join('jenis_pagelaran as jp','sp.id_jenis_pagelaran=jp.id_jenis_pagelaran');
        $this->db->join('kabupaten as kab','sp.id_kabupaten=kab.id_kabupaten');
        $this->db->order_by('tanggal_kegiatan');
        $this->db->where('sp.id_user_approv != 0');
        $this->db->where('sp.tanggal_kegiatan < current_date()');
        $res=$this->db->get();
        return $res->result_array();
    }

    public function getPemugaran(){
        $this->db->select('*');
        $this->db->from('senibudaya_pagelaranpameran as sp');
        $this->db->join('jenis_pagelaran as jp','sp.id_jenis_pagelaran=jp.id_jenis_pagelaran');
        $this->db->join('kabupaten as kab','sp.id_kabupaten=kab.id_kabupaten');
        $this->db->order_by('tanggal_kegiatan');
        $this->db->where('id_user_approv != 0');
        $res=$this->db->get();
        return $res->result_array();
    }
     
}