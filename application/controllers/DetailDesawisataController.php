<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailDesawisataController extends CI_Controller {

    public function __construct(){
        parent::__construct();
            $this->load->model(array('DetailDesawisataModel'));
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
        $data = $this->DetailDesawisataModel->getProfil($this->input->get());
        echo json_encode(array('data' => $data));
      } catch (Exception $e) {
        ExceptionHandler::handle($e);
      }
    }

  
    public function getTahun(){
      try{
        $this->SecurityModel->userOnlyGuard(TRUE);
        $data = $this->DetailDesawisataModel->getTahun($this->input->get());
         echo json_encode(array("data" => $data, "error" => false));
  
      } catch (Exception $e) {
        ExceptionHandler::handle($e);
      }
    }

    public function approvDesawisata(){
      try{
        $this->SecurityModel->userOnlyGuard(TRUE);
        $data = $this->DetailDesawisataModel->approvDesawisata($this->input->get());
       // echo json_encode(array('data' => $data));
      } catch (Exception $e) {
        ExceptionHandler::handle($e);
      }
    }

  public function getAllDetailDesawisata(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->DetailDesawisataModel->getAllDetailDesawisata($this->input->get());
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
            $this->DetailDesawisataModel->approv_pengunjung($data['id_data_desawisata'.$i]);
        }
      }else{
        for($i=1; $i <= 12; $i++){
          if(empty($data['id_data_desawisata'.$i])){      
            $this->DetailDesawisataModel->saveTambah($data['id_desawisata'],$data['tahun'],$data['bulan'.$i],$data['domestik_l'.$i],$data['domestik_p'.$i],$data['mancanegara_l'.$i],$data['mancanegara_p'.$i],$data['pajak'.$i]);
          }else{
            $this->DetailDesawisataModel->saveEdit($data['id_data_desawisata'.$i],$data['id_desawisata'],$data['tahun'],$data['bulan'.$i],$data['domestik_l'.$i],$data['domestik_p'.$i],$data['mancanegara_l'.$i],$data['mancanegara_p'.$i],$data['pajak'.$i]);
          }
        }
      }
      echo json_encode('succes');
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }
  public function approvPengunjung(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      
        for($i=1; $i <= 12; $i++){
            $this->DetailDesawisataModel->approv_pengunjung($data['id_data_desawisata'.$i]);
        }
      
      echo json_encode('succes');
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function addDetailDesawisata(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $idDetailDesawisata = $this->DetailDesawisataModel->addDetailDesawisata($data);
      $data = $this->DetailDesawisataModel->getDetailDesawisata($idDetailDesawisata);
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function getUser(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $data = $this->DetailDesawisataModel->getUser($this->input->get());
    //  $data = $this->DetailDesawisataModel->getDetailDesawisata($idDetailDesawisata);
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }


  public function editDetailDesawisata(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $data = $this->DetailDesawisataModel->editDetailDesawisata($data);
    //  $data = $this->DetailDesawisataModel->getDetailDesawisata($idDetailDesawisata);
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

          
          $id= $this->input->post('id_desawisata');
          $image= $data['upload_data']['file_name']; 
          $fileold= $this->input->post('fileold');
          unlink("./upload/file/".$fileold);
          $result= $this->DetailDesawisataModel->simpan_upload1($id,$image,'file');
          echo json_decode($result);
      }
  
   }
   public function approv(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->DetailDesawisataModel->approv($this->input->get());
     // echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }
   function do_upload2(){
    $config['upload_path']="./upload/file2";
    $config['allowed_types']='gif|jpg|png';
    $config['encrypt_name'] = TRUE;
   // var_dump('anjay',$this->input->post());

    $this->load->library('upload',$config);
    if($this->upload->do_upload("file2")){
        $data = array('upload_data' => $this->upload->data());
        $image= $data['upload_data']['file_name']; 
        $id= $this->input->post('id_desawisata');

        $fileold= $this->input->post('fileold');
        if($fileold == "" or $fileold == null ){
            $image=$image;
        }else{
            $image=$fileold.','.$image;
        }
        
       // $image=$fileold.','.$image;
        $result= $this->DetailDesawisataModel->simpan_upload1($id,$image,'file2');
        echo json_decode($result);
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

      $id= $this->input->post('id_desawisata');
      $image= $data['upload_data']['file_name']; 
       
      $result= $this->DetailDesawisataModel->simpan_upload1($id,$image,'file3');
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
    

      $id= $this->input->post('id_desawisata');
      
      $dokumenlama= $this->input->post('namadokumen');
      $image= $data['upload_data']['file_name']; 
      unlink("./upload/dokumen/".$dokumenlama);
      $result= $this->DetailDesawisataModel->simpan_upload1($id,$image,'dokumen');
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
      $this->DetailDesawisataModel->delPhoto($data['id_desawisata'],$tmp);
      unlink("./upload/file2/".$data['hapus']);
      echo 'hasil = '.$tmp;
      echo json_encode('succes');
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }



}