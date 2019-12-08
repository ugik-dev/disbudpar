<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PemugaranController extends CI_Controller {

    public function __construct(){
        parent::__construct();
            $this->load->model(array('PemugaranModel'));
        $this->load->helper(array('DataStructure', 'Validation'));
    
    }
    

  public function getAllJenisOption(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->PemugaranModel->getAllJenisOption($this->input->get());
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  
  public function getAllCagarbudayaOption(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->PemugaranModel->getAllCagarbudayaOption($this->input->get());
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function getAllPemugaran(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->PemugaranModel->getAllPemugaran();
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }


  public function addPemugaran(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $idPemugaran = $this->PemugaranModel->addPemugaran($data);
      $data = $this->PemugaranModel->getPemugaran($idPemugaran);
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function editPemugaran(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $idPemugaran = $this->PemugaranModel->editPemugaran($data);
      $data = $this->PemugaranModel->getPemugaran($idPemugaran);
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function deletePemugaran(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $this->PemugaranModel->deletePemugaran($data);
      echo json_encode(array());
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

}