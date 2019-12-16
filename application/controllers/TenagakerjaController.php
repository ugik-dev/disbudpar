<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TenagakerjaController extends CI_Controller {

    public function __construct(){
        parent::__construct();
            $this->load->model(array('TenagakerjaModel'));
        $this->load->helper(array('DataStructure', 'Validation'));
    
    }
    
    public function getPendidikanOption(){
        try{
          $this->SecurityModel->userOnlyGuard(TRUE);
          $data = $this->TenagakerjaModel->getPendidikanOption($this->input->get());
          echo json_encode(array('data' => $data));
        } catch (Exception $e) {
          ExceptionHandler::handle($e);
        }
      }
      public function getJeniskelaminOption(){
        try{
          $this->SecurityModel->userOnlyGuard(TRUE);
          $data = $this->TenagakerjaModel->getJeniskelaminOption($this->input->get());
          echo json_encode(array('data' => $data));
        } catch (Exception $e) {
          ExceptionHandler::handle($e);
        }
      }
      public function getPelatihanOption(){
        try{
          $this->SecurityModel->userOnlyGuard(TRUE);
          $data = $this->TenagakerjaModel->getPelatihanOption($this->input->get());
          echo json_encode(array('data' => $data));
        } catch (Exception $e) {
          ExceptionHandler::handle($e);
        }
      }
      public function getSertifikasiOption(){
        try{
          $this->SecurityModel->userOnlyGuard(TRUE);
          $data = $this->TenagakerjaModel->getSertifikasiOption($this->input->get());
          echo json_encode(array('data' => $data));
        } catch (Exception $e) {
          ExceptionHandler::handle($e);
        }
      }

      function do_upload_photo(){
        $config['upload_path']="./upload/photo_tenaga_kerja";
        $config['allowed_types']='bmp|jpg|png';
        $config['encrypt_name'] = TRUE;
         // var_dump('anjay',$this->input->post());
      
        $this->load->library('upload',$config);
        
        if($this->upload->do_upload("photo")){
          $data = array('upload_data' => $this->upload->data());
         
          
          $dataupdate['id_sdm']= $this->input->post('id_sdm');
          $dataupdate['photo']= $data['upload_data']['file_name']; 
          $fileold= $this->input->post('oldphoto');
          echo $fileold;
          if($fileold != '' || $fileold != null){ 
            unlink("./upload/photo_tenaga_kerja/".$fileold);
          };
          
          $result= $this->TenagakerjaModel->setPhoto($dataupdate);
          $data = $this->TenagakerjaModel->getAllTenagakerja($dataupdate);
          echo json_encode(array('data' => $data));
         
        }
      
       }

       function do_upload_pelatihan(){
        $config['upload_path']="./upload/pelatihan_tenaga_kerja";
        $config['allowed_types']='pdf|jpg';
        $config['encrypt_name'] = TRUE;
         // var_dump('anjay',$this->input->post());
      
        $this->load->library('upload',$config);
        
        if($this->upload->do_upload("doc_pelatihan")){
          $data = array('upload_data' => $this->upload->data());
         
          
          $dataupdate['id_sdm']= $this->input->post('id_sdm');
          $dataupdate['doc_pelatihan']= $data['upload_data']['file_name']; 
          $fileold= $this->input->post('old_doc_pelatihan');
          echo $fileold;
          if($fileold != '' || $fileold != null){ 
            unlink("./upload/pelatihan_tenaga_kerja/".$fileold);
          };
          
          $result= $this->TenagakerjaModel->setPelatihan($dataupdate);
          $data = $this->TenagakerjaModel->getAllTenagakerja($dataupdate);
          echo json_encode(array('data' => $data));
         
        }
      
       }
       function do_upload_sertifikasi(){
        $config['upload_path']="./upload/sertifikasi_tenaga_kerja";
        $config['allowed_types']='pdf|jpg';
        $config['encrypt_name'] = TRUE;
         // var_dump('anjay',$this->input->post());
      
        $this->load->library('upload',$config);
        
        if($this->upload->do_upload("doc_sertifikasi")){
          $data = array('upload_data' => $this->upload->data());
          $dataupdate['tahun_sertifikasi']= $this->input->post('tahun_sertifikasi');
          $dataupdate['penyelenggara_sertifikasi']= $this->input->post('penyelenggara_sertifikasi');
          $dataupdate['id_sdm']= $this->input->post('id_sdm');
          $dataupdate['doc_sertifikasi']= $data['upload_data']['file_name']; 
          $fileold= $this->input->post('old_doc_sertifikasi');
          echo $fileold;
          if($fileold != '' || $fileold != null){ 
            unlink("./upload/sertifikasi_tenaga_kerja/".$fileold);
          };
          
          $result= $this->TenagakerjaModel->setSertifikasi($dataupdate);
          $data = $this->TenagakerjaModel->getAllTenagakerja($dataupdate);
          echo json_encode(array('data' => $data));
         
        }
      
       }
    

  public function getLv1Option(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->TenagakerjaModel->getLv1Option($this->input->get());
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  
  public function getLv2Option(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->TenagakerjaModel->getLv2Option($this->input->get());
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }
  public function getLv3Option(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->TenagakerjaModel->getLv3Option($this->input->get());
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }
  public function getLv4Option(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->TenagakerjaModel->getLv4Option($this->input->get());
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }


  public function getAllTenagakerja(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->TenagakerjaModel->getAllTenagakerja();
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }


  public function addTenagakerja(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $idTenagakerja = $this->TenagakerjaModel->addTenagakerja($data);
      $data = $this->TenagakerjaModel->getTenagakerja($idTenagakerja);
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function editTenagakerja(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $idTenagakerja = $this->TenagakerjaModel->editTenagakerja($data);
      $data = $this->TenagakerjaModel->getTenagakerja($idTenagakerja);
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function deleteTenagakerja(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $this->TenagakerjaModel->deleteTenagakerja($data);
      echo json_encode(array());
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

}