<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SenibudayaController extends CI_Controller {

    public function __construct(){
        parent::__construct();
            $this->load->model(array('SenibudayaModel'));
        $this->load->helper(array('DataStructure', 'Validation'));
    
    }
    

  public function getAllJOption(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->SenibudayaModel->getAllJOption($this->input->get());
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  
  public function getAllJ2Option(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->SenibudayaModel->getAllJ2Option($this->input->get());
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function getAllSenibudaya(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->SenibudayaModel->getAllSenibudaya();
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }


  public function addSenibudaya(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $idSenibudaya = $this->SenibudayaModel->addSenibudaya($data);
      $data = $this->SenibudayaModel->getSenibudaya($idSenibudaya);
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function editSenibudaya(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $idSenibudaya = $this->SenibudayaModel->editSenibudaya($data);
      $data = $this->SenibudayaModel->getSenibudaya($idSenibudaya);
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function deleteSenibudaya(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $this->SenibudayaModel->deleteSenibudaya($data);
      echo json_encode(array());
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

}