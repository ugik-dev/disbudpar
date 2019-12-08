<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PagelaranController extends CI_Controller {

    public function __construct(){
        parent::__construct();
            $this->load->model(array('PagelaranModel'));
        $this->load->helper(array('DataStructure', 'Validation'));
    
    }
    

  public function getAllJenisOption(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->PagelaranModel->getAllJenisOption($this->input->get());
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  
  public function getAllSenibudayaOption(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->PagelaranModel->getAllSenibudayaOption($this->input->get());
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function getAllPagelaran(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->PagelaranModel->getAllPagelaran();
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }


  public function addPagelaran(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $idPagelaran = $this->PagelaranModel->addPagelaran($data);
      $data = $this->PagelaranModel->getPagelaran($idPagelaran);
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function editPagelaran(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $idPagelaran = $this->PagelaranModel->editPagelaran($data);
      $data = $this->PagelaranModel->getPagelaran($idPagelaran);
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function deletePagelaran(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $this->PagelaranModel->deletePagelaran($data);
      echo json_encode(array());
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

}