<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanModel extends CI_Model {

    public function getTahun(){
        $this->db->select('*');
        $this->db->from('tb_tahun');
        $res=$this->db->get();
        return $res->result_array();
    }
    public function getFormat(){
        $data ;
        $this->db->select('*');
        $this->db->from('tb_tahun');
        $res=$this->db->get();
        $tahun=$res->result_array();
        foreach($tahun as $th){
            $this->db->select('dlp.id_data , flp.id_format,flp.id_elemen,flp.nama_elemen,dlp.value,flp.satuan,flp.kewenangan,flp.data_tunggal,flp.data_sektoral');
            $this->db->from('stat_laporan_pariwisata as flp');
            $this->db->where('flp.tahun',$th['tahun']);
            
            $this->db->join('data_laporan_pariwisata as dlp','dlp.tahun=flp.tahun and dlp.id_format=flp.id_format ','left');
		    $res=$this->db->get();
            
            $data[$th['tahun']]=$res->result_array();
        };


        return $data;
		//return DataStructure::keyValue($res->result_array(), 'id_kepemilikan_museum');
    }
    public function getFormat2(){
        $data ;
        $this->db->select('*');
        $this->db->from('tb_tahun');
        $res=$this->db->get();
        $tahun=$res->result_array();
        foreach($tahun as $th){
            $this->db->select('dlp.id_data , flp.id_format,flp.id_elemen,flp.nama_elemen,dlp.value,flp.satuan,flp.kewenangan,flp.data_tunggal,flp.data_sektoral');
            $this->db->from('stat_laporan_kebudayaan as flp');
            $this->db->where('flp.tahun',$th['tahun']);
            
            $this->db->join('data_laporan_kebudayaan as dlp','dlp.tahun=flp.tahun and dlp.id_format=flp.id_format ','left');
		    $res=$this->db->get();
            
            $data[$th['tahun']]=$res->result_array();
        };


        return $data;
		//return DataStructure::keyValue($res->result_array(), 'id_kepemilikan_museum');
    }

    public function getPoint1(){

        $this->db->select('js.id_jenis_saranaprasarana,js.nama_jenis_saranaprasarana,count(ss.id_jenis_saranaprasarana) as val');
        $this->db->from('senibudaya_saranaprasarana as ss');
        $this->db->group_by('id_jenis_saranaprasarana');
        $this->db->join('jenis_saranaprasarana as js', 'js.id_jenis_saranaprasarana = ss.id_jenis_saranaprasarana','right');
		$row = $this->db->get();
        $res =$row->result_array();
        
        $this->db->select('count(*) as val');
        $this->db->from('museum');
        $row = $this->db->get();
        $row =$row->result_array();
        $res[3]['id_jenis_saranaprasarana']='4';
        $res[3]['nama_jenis_saranaprasarana']='Museum';
        $res[3]['val']=$row[0]['val'];
        return $res;
    }
    public function getPoint2(){

        $this->db->select('js.id_j_senibudaya,js.id_j2_senibudaya,js.nama_j2_senibudaya,js1.nama_j_senibudaya,count(ss.id_j2_senibudaya) as val,Coalesce(sum(ss.jumlahanggota),0) as anggota');
        $this->db->from('senibudaya as ss');
        $this->db->group_by('id_j2_senibudaya');
        $this->db->join('j2_senibudaya as js', 'js.id_j2_senibudaya = ss.id_j2_senibudaya','right');
        $this->db->join('j_senibudaya as js1', 'js1.id_j_senibudaya = js.id_j_senibudaya','right');
		$row = $this->db->get();
        $res =$row->result_array();
       
        return $res;
    }
    
    public function getPoint21(){

        $this->db->select('js.id_jenis_pagelaran,js.nama_jenis_pagelaran,count(sp.id_jenis_pagelaran) as val,Coalesce(sum(sp.jumlah_penonton),0) as penonton');
        $this->db->from('senibudaya_pagelaranpameran as sp');
        $this->db->group_by('id_jenis_pagelaran');
        $this->db->join('jenis_pagelaran as js', 'js.id_jenis_pagelaran = sp.id_jenis_pagelaran','right');
		$row = $this->db->get();
        $res =$row->result_array();
       
        return $res;
	}
    public function getPoint3(){

       // $this->db->select('js.id_j_senibudaya,js.id_j2_senibudaya,js.nama_j2_senibudaya,js1.nama_j_senibudaya,count(ss.id_j2_senibudaya) as val,Coalesce(sum(ss.jumlahanggota),0) as anggota');
       $this->db->select('j.id_jenis_cagarbudaya,j.nama_jenis_cagarbudaya,kc.id_kepemilikan_cagarbudaya,kc.nama_kepemilikan_cagarbudaya, count(cb.id_cagarbudaya) as val');
       $this->db->from('kepemilikan_cagarbudaya kc');
       $this->db->group_by('j.id_jenis_cagarbudaya,kc.id_kepemilikan_cagarbudaya');
       $this->db->join('jenis_cagarbudaya as j','1=1');
       $this->db->join('cagarbudaya as cb','kc.id_kepemilikan_cagarbudaya = cb.id_kepemilikan_cagarbudaya and j.id_jenis_cagarbudaya = cb.id_jenis_cagarbudaya','left');
      //    $this->db->join('data_cagarbudaya as dat','dat.id_cagarbudaya=cb.id_cagarbudaya','right');
		$row = $this->db->get();
        $res =$row->result_array();
       
        return $res;
    }

    public function getPoint3Pengunjung($filter){

        
        $this->db->select('sum(domestik_l+domestik_p+mancanegara_l+mancanegara_p) as penonton');
        $this->db->from('data_cagarbudaya as kc');
        $this->db->join('cagarbudaya as cb','kc.id_cagarbudaya=cb.id_cagarbudaya');
        $this->db->where('id_jenis_cagarbudaya=',$filter['jenis']);
         $row = $this->db->get();
         $res =$row->result_array();
        if($res[0]['penonton'] == null){ $res[0]['penonton']='0'; };
         return $res;
     }

     public function getPoint31(){

        // $this->db->select('js.id_j_senibudaya,js.id_j2_senibudaya,js.nama_j2_senibudaya,js1.nama_j_senibudaya,count(ss.id_j2_senibudaya) as val,Coalesce(sum(ss.jumlahanggota),0) as anggota');
        $this->db->select('kc.id_kepemilikan_cagarbudaya,kc.nama_kepemilikan_cagarbudaya,j.id_status_penetapan_cagarbudaya,j.nama_status_penetapan_cagarbudaya, count(cb.id_cagarbudaya) as val');
        $this->db->from('kepemilikan_cagarbudaya kc');
        $this->db->group_by('kc.id_kepemilikan_cagarbudaya,j.id_status_penetapan_cagarbudaya');
        $this->db->join('status_penetapan_cagarbudaya as j','1=1');
        $this->db->join('cagarbudaya as cb','kc.id_kepemilikan_cagarbudaya = cb.id_kepemilikan_cagarbudaya and j.id_status_penetapan_cagarbudaya = cb.id_status_penetapan_cagarbudaya','left');
       //    $this->db->join('data_cagarbudaya as dat','dat.id_cagarbudaya=cb.id_cagarbudaya','right');
         $row = $this->db->get();
         $res =$row->result_array();
        
         return $res;
     }

     public function getPoint32(){

        
        $this->db->select('count(id_cagarbudaya) as cg1');
        $this->db->from('cagarbudaya');
        $this->db->where('id_kepemilikan_cagarbudaya','1');
        $row = $this->db->get();
        $row =$row->result_array();
        $jumlahcagar1=$row[0]['cg1'];
       // echo $jumlahcagar1;

        $this->db->select('count(id_cagarbudaya) as cg1');
        $this->db->from('cagarbudaya');
        $this->db->where('id_kepemilikan_cagarbudaya','2');
        $row = $this->db->get();
        $row =$row->result_array();
        $jumlahcagar2=$row[0]['cg1'];
       // echo $jumlahcagar2;

        $this->db->select('count(a.id_cagarbudaya) as cg1');
        $this->db->from('cagarbudaya_pemugaran as a');
        $this->db->group_by('a.id_cagarbudaya');
        $this->db->where('id_kepemilikan_cagarbudaya','1');
        $this->db->where('tahun','2019');
        $this->db->join('cagarbudaya as cb','a.id_cagarbudaya = cb.id_cagarbudaya','left');
        $row = $this->db->get();
        $row =$row->result_array();
        if(empty($row[0]['cg1'])){
            $dipugar1='0';
        }else{
        $dipugar1=$row[0]['cg1'];
         }
       // echo $dipugar1;

        $this->db->select('count(a.id_cagarbudaya) as cg1');
        $this->db->from('cagarbudaya_pemugaran as a');
        $this->db->group_by('a.id_cagarbudaya');
        $this->db->where('id_kepemilikan_cagarbudaya','2');
        $this->db->where('tahun','2019');
        $this->db->join('cagarbudaya as cb','a.id_cagarbudaya = cb.id_cagarbudaya','left');
        $row = $this->db->get();
        $row =$row->result_array();
        if(empty($row[0]['cg1'])){
            $dipugar2='0';
        }else{
        $dipugar2=$row[0]['cg1'];
         }
       // echo $dipugar2;
      //  echo $row;
        //$this->db->group_by('kc.id_kepemilikan_cagarbudaya,j.id_status_penetapan_cagarbudaya');
       
       // $this->db->join('cagarbudaya as cb','cp.id_cagarbudaya = cb.id_cagarbudaya','left');
        //$this->db->join('kepemilikan_cagarbudaya as j','1=1');
       //    $this->db->join('data_cagarbudaya as dat','dat.id_cagarbudaya=cb.id_cagarbudaya','right');

        //  $row = $this->db->get();
        //  $res =$row->result_array();
        $row[0]['dipugarkan']=$dipugar1;
        $row[1]['dipugarkan']=$dipugar2;
        $row[0]['belumdipugarkan']=$jumlahcagar1-$dipugar1;
        $row[1]['belumdipugarkan']=$jumlahcagar2-$dipugar2;
         return $row;
     }

     public function getPoint4(){

        // $this->db->select('js.id_j_senibudaya,js.id_j2_senibudaya,js.nama_j2_senibudaya,js1.nama_j_senibudaya,count(ss.id_j2_senibudaya) as val,Coalesce(sum(ss.jumlahanggota),0) as anggota');
        $this->db->select(' museum_kepemilikan.id_kepemilikan_museum,museum_kepemilikan.nama_kepemilikan,museum_status.id_status_museum,museum_status.nama_status,COUNT(id_museum) as val');
        $this->db->from('museum_status');
        $this->db->group_by('museum_kepemilikan.id_kepemilikan_museum,museum_status.id_status_museum');
        $this->db->join('museum_kepemilikan','1=1');
        $this->db->join('museum','museum.id_kepemilikan_museum=museum_kepemilikan.id_kepemilikan_museum and museum.id_status_museum=museum_status.id_status_museum ','left');
       //    $this->db->join('data_cagarbudaya as dat','dat.id_cagarbudaya=cb.id_cagarbudaya','right');
         $row = $this->db->get();
         $res =$row->result_array();
        
         return $res;
     }

     public function getPariwisata1(){

        $this->db->select('jo.id_jenis_objek,jo.nama_jenis_objek,count(po.id_jenis_objek) as val');
        $this->db->from('pariwisata_jenis_objek as jo');
        $this->db->group_by('id_jenis_objek');
        $this->db->join('pariwisata_objek as po', 'po.id_jenis_objek = jo.id_jenis_objek','left');
		$row = $this->db->get();
        $res =$row->result_array();
        

        return $res;
    }

    public function getPariwisata2(){

        $this->db->select('sum(domestik) as valdomestik,sum(mancanegara) as valmancanegara');
        $this->db->from('rec_objek');
       // $this->db->group_by('id_jenis_objek');
      //  $this->db->join('pariwisata_objek as po', 'po.id_jenis_objek = jo.id_jenis_objek','left');
		$row = $this->db->get();
        $res =$row->result_array();
        

        return $res;
    }

    
    public function getPariwisata3(){

        $this->db->select('jo.id_jenis_objek,jo.nama_jenis_objek,Coalesce(sum(domestik),0) as valdomestik,Coalesce(sum(mancanegara),0) as valmancanegara');
       // $this->db->select('*');
        $this->db->from('rec_objek ro');
        $this->db->group_by('jo.id_jenis_objek');
        $this->db->order_by('jo.id_jenis_objek','asc');
        $this->db->join('pariwisata_objek as po', 'po.id_objek = ro.id_objek','right');
        $this->db->join('pariwisata_jenis_objek as jo', 'po.id_jenis_objek = jo.id_jenis_objek','right');
		$row = $this->db->get();
        $res =$row->result_array();
        

        return $res;
    }
    public function getPariwisata4(){


        $this->db->select('jo.id_jenis_penginapan,jo.nama_jenis_penginapan,count(po.id_penginapan) as val,coalesce(sum(jumlah_kamar),0) as kamar, coalesce(sum(jumlah_tempat_tidur),0) as tempat_tidur');
        $this->db->from('pariwisata_jenis_penginapan as jo');
        $this->db->group_by('id_jenis_penginapan');
        $this->db->order_by('id_jenis_penginapan','asc');
        $this->db->join('pariwisata_penginapan as po', 'po.id_jenis_penginapan = jo.id_jenis_penginapan','left');
        $row = $this->db->get();
        $res =$row->result_array();
        

        return $res;
    }
    
    public function getPariwisata5(){

        $this->db->select('jo.id_jenis_penginapan,jo.nama_jenis_penginapan,Coalesce(sum(domestik_personal),0) as valdomestik,Coalesce(sum(mancanegara_personal),0) as valmancanegara,,Coalesce(sum(domestik_durasi),0) as durasidomestik,Coalesce(sum(mancanegara_durasi),0) as durasimancanegara');
        // $this->db->select('*');
         $this->db->from('rec_penginapan ro');
         $this->db->group_by('jo.id_jenis_penginapan');
         $this->db->order_by('jo.id_jenis_penginapan','asc');
         $this->db->join('pariwisata_penginapan as po', 'po.id_penginapan = ro.id_penginapan','right');
         $this->db->join('pariwisata_jenis_penginapan as jo', 'po.id_jenis_penginapan = jo.id_jenis_penginapan','right');

        // $this->db->select('jo.id_jenis_penginapan,jo.nama_jenis_penginapan,count(po.id_penginapan) as val,coalesce(sum(jumlah_kamar),0) as kamar, coalesce(sum(jumlah_tempat_tidur),0) as tempat_tidur');
        // $this->db->from('pariwisata_jenis_penginapan as jo');
        // $this->db->group_by('id_jenis_penginapan');
        // $this->db->order_by('id_jenis_penginapan','asc');
        // $this->db->join('pariwisata_penginapan as po', 'po.id_jenis_penginapan = jo.id_jenis_penginapan','left');
        $row = $this->db->get();
        $res =$row->result_array();
        

        return $res;
    }

    public function getPariwisata6(){


        $this->db->select('jo.id_jenis_biro,jo.nama_jenis_biro,count(po.id_biro) as val');
        $this->db->from('pariwisata_jenis_biro as jo');
        $this->db->group_by('id_jenis_biro');
        $this->db->order_by('id_jenis_biro','asc');
        $this->db->join('pariwisata_biro as po', 'po.id_jenis_biro = jo.id_jenis_biro','left');
        $row = $this->db->get();
        $res =$row->result_array();
        

        return $res;
    }

    public function getPariwisata7(){


        $this->db->select('jo.id_sertifikat_biro,jo.nama_sertifikat_biro,count(po.id_biro) as val');
        $this->db->from('pariwisata_sertifikat_biro as jo');
        $this->db->group_by('id_sertifikat_biro');
        $this->db->order_by('id_sertifikat_biro','asc');
        $this->db->join('pariwisata_biro as po', 'po.id_sertifikat_biro = jo.id_sertifikat_biro','left');
        $row = $this->db->get();
        $res =$row->result_array();
        

        return $res;
    }

    public function getPariwisata8(){


        $this->db->select('jo.id_jenis_usaha,jo.nama_jenis_usaha,count(po.id_usaha) as val');
        $this->db->from('pariwisata_jenis_usaha as jo');
        $this->db->group_by('id_jenis_usaha');
        $this->db->order_by('id_jenis_usaha','asc');
        $this->db->join('pariwisata_usaha as po', 'po.id_jenis_usaha = jo.id_jenis_usaha','left');
        $row = $this->db->get();
        $res =$row->result_array();
        

        return $res;
    }
    
}



?>