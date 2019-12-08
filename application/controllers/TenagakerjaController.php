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