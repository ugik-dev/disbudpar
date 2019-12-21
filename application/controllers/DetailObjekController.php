<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailObjekController extends CI_Controller {

    public function __construct(){
        parent::__construct();
            $this->load->model(array('DetailObjekModel'));
        $this->load->helper(array('DataStructure', 'Validation'));
        $this->load->helper('download');
    
    }
    
   
    function getDownload(){
      $url= $this->input->post('url');
     // echo $url;
     //$url = base_url('upload/dokumen/kalkulus');
   //  echo $url;
      force_download('upload/testdownload.jpg',null);
     // echo $url;
    }
  
    public function getProfil(){
      try{
        $this->SecurityModel->userOnlyGuard(TRUE);
        $data = $this->DetailObjekModel->getProfil($this->input->get());
        echo json_encode(array('data' => $data));
      } catch (Exception $e) {
        ExceptionHandler::handle($e);
      }
    }

  
    public function getTahun(){
      try{
        $this->SecurityModel->userOnlyGuard(TRUE);
        $data = $this->DetailObjekModel->getTahun($this->input->get());
         echo json_encode(array("data" => $data, "error" => false));
  
      } catch (Exception $e) {
        ExceptionHandler::handle($e);
      }
    }
    public function approvPengunjung(){
      try{
        $this->SecurityModel->userOnlyGuard(TRUE);
        $data = $this->input->post();
        
          for($i=1; $i <= 12; $i++){
              $this->DetailObjekModel->approv_pengunjung($data['id_data_objek'.$i]);
          }
        
        echo json_encode('succes');
      } catch (Exception $e) {
        ExceptionHandler::handle($e);
      }
    }
    public function approvObjek(){
      try{
        $this->SecurityModel->userOnlyGuard(TRUE);
        $data = $this->DetailObjekModel->approvObjek($this->input->get());
       // echo json_encode(array('data' => $data));
      } catch (Exception $e) {
        ExceptionHandler::handle($e);
      }
    }

  public function getAllDetailObjek(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->DetailObjekModel->getAllDetailObjek($this->input->get());
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function savePengunjung(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      if($this->session->userdata('id_role')=='3'){
        for($i=1; $i <= 12; $i++){
            $this->DetailObjekModel->approv_pengunjung($data['id_data_objek'.$i]);
        }
      }else{
        for($i=1; $i <= 12; $i++){
          if(empty($data['id_data_objek'.$i])){      
            if($i == 12){
              $this->DetailObjekModel->saveTambah($data['id_objek'],$data['tahun'],$data['bulan'.$i],$data['domestik_l'.$i],$data['domestik_p'.$i],$data['mancanegara_l'.$i],$data['mancanegara_p'.$i],$data['pajak'.$i],$data['retribusi'.$i]);
            }else{
              $this->DetailObjekModel->saveTambah($data['id_objek'],$data['tahun'],$data['bulan'.$i],$data['domestik_l'.$i],$data['domestik_p'.$i],$data['mancanegara_l'.$i],$data['mancanegara_p'.$i],null,null);
            }    
          }else{
            if($i == 12){
              $this->DetailObjekModel->saveEdit($data['id_data_objek'.$i],$data['id_objek'],$data['tahun'],$data['bulan'.$i],$data['domestik_l'.$i],$data['domestik_p'.$i],$data['mancanegara_l'.$i],$data['mancanegara_p'.$i],$data['pajak'.$i],$data['retribusi'.$i]);
            }else{
              $this->DetailObjekModel->saveEdit($data['id_data_objek'.$i],$data['id_objek'],$data['tahun'],$data['bulan'.$i],$data['domestik_l'.$i],$data['domestik_p'.$i],$data['mancanegara_l'.$i],$data['mancanegara_p'.$i],null,null);
            } 
          }
        }
      }
      echo json_encode('succes');
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function addDetailObjek(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $idDetailObjek = $this->DetailObjekModel->addDetailObjek($data);
      $data = $this->DetailObjekModel->getDetailObjek($idDetailObjek);
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function getUser(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $data = $this->DetailObjekModel->getUser($this->input->get());
    //  $data = $this->DetailObjekModel->getDetailObjek($idDetailObjek);
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }


  public function editDetailObjek(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $data = $this->DetailObjekModel->editDetailObjek($data);
    //  $data = $this->DetailObjekModel->getDetailObjek($idDetailObjek);
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }
    
    function do_upload(){
      $config['upload_path']="./upload/file";
      $config['allowed_types']='gif|jpg|png';
      $config['encrypt_name'] = TRUE;
     // var_dump('anjay',$this->input->post());

      $this->load->library('upload',$config);
      if($this->upload->do_upload("file")){
          $data = array('upload_data' => $this->upload->data());

          
          $id= $this->input->post('id_objek');
          $image= $data['upload_data']['file_name']; 
          $fileold= $this->input->post('fileold');
          unlink("./upload/file/".$fileold);
          $result= $this->DetailObjekModel->simpan_upload1($id,$image,'file');
          echo json_decode($result);
      }
  
   }
   public function approv(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->DetailObjekModel->approv($this->input->get());
     // echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }
   function do_upload2(){
    //'upload_path' => ,
    $config['upload_path']=realpath(APPPATH . '../upload/file2/');
    $config['allowed_types']='gif|jpg|png';
    $config['encrypt_name'] = TRUE;
  
    
    var_dump($_FILES);
    $this->load->library('upload',$config);
    if($this->upload->do_upload("file2")){
        $data = array('upload_data' => $this->upload->data());
        $image= $data['upload_data']['file_name']; 
        $id= $this->input->post('id_objek');

        $fileold= $this->input->post('fileold');
        if($fileold == "" or $fileold == null ){
            $image=$image;
        }else{
            $image=$fileold.','.$image;
        }
        
       // $image=$fileold.','.$image;
        $result= $this->DetailObjekModel->simpan_upload1($id,$image,'file2');
        echo json_decode($result);
    }else{
      $error = array('error' => $this->upload->display_errors());
      var_dump($error);
    }

 }
 function do_upload3(){
  $config['upload_path']="./upload/file3";
  $config['allowed_types']='gif|jpg|png';
  $config['encrypt_name'] = TRUE;
 // var_dump('anjay',$this->input->post());

  $this->load->library('upload',$config);
  if($this->upload->do_upload("file3")){
      $data = array('upload_data' => $this->upload->data());

      $id= $this->input->post('id_objek');
      $image= $data['upload_data']['file_name']; 
       
      $result= $this->DetailObjekModel->simpan_upload1($id,$image,'file3');
      echo json_decode($result);
  }
}
function do_upload4(){
  $config['upload_path']="./upload/dokumen";
  $config['allowed_types']='pdf';
  $config['encrypt_name'] = TRUE;
// var_dump('anjay',$this->input->post());

  $this->load->library('upload',$config);
  if($this->upload->do_upload("dokumen")){
      $data = array('upload_data' => $this->upload->data());
    

      $id= $this->input->post('id_objek');
      
      $dokumenlama= $this->input->post('namadokumen');
      $image= $data['upload_data']['file_name']; 
      unlink("./upload/dokumen/".$dokumenlama);
      $result= $this->DetailObjekModel->simpan_upload1($id,$image,'dokumen');
      echo json_decode($result);
  }
}
  public function delPhoto(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $file2 = $data['file2'];
      $file2 = explode(",",$file2);
      $file2lenght = count($file2);
      $tmp2;
     // echo $file2lenght;
      echo 'file yang akan dihapus ='.$data['hapus'];
      $tmp = "";
      $j = 0;
      $status = 0;
      for($i=0; $i < $file2lenght; $i++){
        echo 'nama file = '.$file2[$i];
        if($file2[$i]==$data['hapus']){
          echo ' ||  HAPUS ='.$data['hapus'],' || ';
          $status = 1;
        }else{
          
            $tmp2[$j]=$file2[$i];
         
          
          $j++;
        };
       
      }
      $tmp = implode(",",$tmp2);
      $this->DetailObjekModel->delPhoto($data['id_objek'],$tmp);
      unlink("./upload/file2/".$data['hapus']);
      echo 'hasil = '.$tmp;
      echo json_encode('succes');
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }



}