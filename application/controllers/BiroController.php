<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BiroController extends CI_Controller {

    public function __construct(){
        parent::__construct();
            $this->load->model(array('BiroModel'));
        $this->load->helper(array('DataStructure', 'Validation'));
    
    }
    

  public function getAllJenisOption(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->BiroModel->getAllJenisOption($this->input->get());
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function getAllSertifikatOption(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->BiroModel->getAllSertifikatOption($this->input->get());
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  
  public function getAllBiro(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->BiroModel->getAllBiro();
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }


  public function addBiro(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $idBiro = $this->BiroModel->addBiro($data);
      $data = $this->BiroModel->getBiro($idBiro);
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function editBiro(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $idBiro = $this->BiroModel->editBiro($data);
      $data = $this->BiroModel->getBiro($idBiro);
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function deleteBiro(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $this->BiroModel->deleteBiro($data);
      echo json_encode(array());
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

}