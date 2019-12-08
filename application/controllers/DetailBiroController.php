<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailBiroController extends CI_Controller {

    public function __construct(){
        parent::__construct();
            $this->load->model(array('DetailBiroModel'));
        $this->load->helper(array('DataStructure', 'Validation'));
        $this->load->helper('download');
    
    }
    
    function do_upload(){
      $config['upload_path']="./upload/file";
      $config['allowed_types']='gif|jpg|png';
      $config['encrypt_name'] = TRUE;
     // var_dump('anjay',$this->input->post());

      $this->load->library('upload',$config);
      if($this->upload->do_upload("file")){
          $data = array('upload_data' => $this->upload->data());

          
          $id= $this->input->post('id_biro');
          $image= $data['upload_data']['file_name']; 
          $fileold= $this->input->post('fileold');
          unlink("./upload/file/".$fileold);
          $result= $this->DetailBiroModel->simpan_upload1($id,$image,'file');
          echo json_decode($result);
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
        $id= $this->input->post('id_biro');

        $fileold= $this->input->post('fileold');
        if($fileold == "" or $fileold == null ){
            $image=$image;
        }else{
            $image=$fileold.','.$image;
        }
        
       // $image=$fileold.','.$image;
        $result= $this->DetailBiroModel->simpan_upload1($id,$image,'file2');
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

      $id= $this->input->post('id_biro');
      $image= $data['upload_data']['file_name']; 
       
      $result= $this->DetailBiroModel->simpan_upload1($id,$image,'file3');
      echo json_decode($result);
  }
}

    function do_upload4(){
      $config['upload_path']="./upload/dokumen";
      $config['allowed_types']='doc|docx|pdf';
      $config['encrypt_name'] = TRUE;
    // var_dump('anjay',$this->input->post());

      $this->load->library('upload',$config);
      if($this->upload->do_upload("dokumen")){
          $data = array('upload_data' => $this->upload->data());

          $id= $this->input->post('id_biro');
          $image= $data['upload_data']['file_name']; 
           
          $fileold= $this->input->post('namadokumen');
          unlink("./upload/dokumen/".$fileold);
        
          $result= $this->DetailBiroModel->simpan_upload1($id,$image,'dokumen');
          echo json_decode($result);
      }
    }

    public function approv(){
      try{
        $this->SecurityModel->userOnlyGuard(TRUE);
        $data = $this->DetailBiroModel->approv($this->input->get());
       // echo json_encode(array('data' => $data));
      } catch (Exception $e) {
        ExceptionHandler::handle($e);
      }
    }
  
    public function getProfil(){
      try{
        $this->SecurityModel->userOnlyGuard(TRUE);
        $data = $this->DetailBiroModel->getProfil($this->input->get());
        echo json_encode(array('data' => $data));
      } catch (Exception $e) {
        ExceptionHandler::handle($e);
      }
    }

  
    public function getTahun(){
      try{
        $this->SecurityModel->userOnlyGuard(TRUE);
        $data = $this->DetailBiroModel->getTahun($this->input->get());
         echo json_encode(array("data" => $data, "error" => false));
  
      } catch (Exception $e) {
        ExceptionHandler::handle($e);
      }
    }

    public function approvBiro(){
      try{
        $this->SecurityModel->userOnlyGuard(TRUE);
        $data = $this->DetailBiroModel->approvBiro($this->input->get());
       // echo json_encode(array('data' => $data));
      } catch (Exception $e) {
        ExceptionHandler::handle($e);
      }
    }

  public function getAllDetailBiro(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->DetailBiroModel->getAllDetailBiro($this->input->get());
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function savePengunjung(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      for($i=1; $i <= 12; $i++){
        if(empty($data['id_data_biro'.$i])){      
          $this->DetailBiroModel->saveTambah($data['id_biro'],$data['tahun'],$data['bulan'.$i],$data['domestik_l'.$i],$data['domestik_p'.$i],$data['mancanegara_l'.$i],$data['mancanegara_p'.$i],$data['pajak'.$i]);
        }else{
          $this->DetailBiroModel->saveEdit($data['id_data_biro'.$i],$data['id_biro'],$data['tahun'],$data['bulan'.$i],$data['domestik_l'.$i],$data['domestik_p'.$i],$data['mancanegara_l'.$i],$data['mancanegara_p'.$i],$data['pajak'.$i]);
        }
      }
      echo json_encode('succes');
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
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
      $this->DetailBiroModel->delPhoto($data['id_biro'],$tmp);
      unlink("./upload/file2/".$data['hapus']);
      echo 'hasil = '.$tmp;
 //     echo 'testcount'.sizeof($tmp);
      echo json_encode('succes');
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function addDetailBiro(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $idDetailBiro = $this->DetailBiroModel->addDetailBiro($data);
      $data = $this->DetailBiroModel->getDetailBiro($idDetailBiro);
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function getUser(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $data = $this->DetailBiroModel->getUser($this->input->get());
    //  $data = $this->DetailBiroModel->getDetailBiro($idDetailBiro);
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }


  public function editDetailBiro(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $data = $this->DetailBiroModel->editDetailBiro($data);
    //  $data = $this->DetailBiroModel->getDetailBiro($idDetailBiro);
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

}