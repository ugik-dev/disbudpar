<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PenginapanController extends CI_Controller {

    public function __construct(){
        parent::__construct();
            $this->load->model(array('PenginapanModel'));
        $this->load->helper(array('DataStructure', 'Validation'));
    
    }
    

  public function getAllJenisOption(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->PenginapanModel->getAllJenisOption($this->input->get());
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  
  public function getAllPenginapan(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->PenginapanModel->getAllPenginapan();
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }


  public function addPenginapan(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $idPenginapan = $this->PenginapanModel->addPenginapan($data);
      $data = $this->PenginapanModel->getPenginapan($idPenginapan);
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function editPenginapan(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $idPenginapan = $this->PenginapanModel->editPenginapan($data);
      $data = $this->PenginapanModel->getPenginapan($idPenginapan);
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function deletePenginapan(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $this->PenginapanModel->deletePenginapan($data);
      echo json_encode(array());
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

}