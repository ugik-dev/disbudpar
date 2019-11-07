<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ObjekController extends CI_Controller {

    public function __construct(){
        parent::__construct();
            $this->load->model(array('ObjekModel'));
        $this->load->helper(array('DataStructure', 'Validation'));
    
    }
    

  public function getAllJenisOption(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->ObjekModel->getAllJenisOption($this->input->get());
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  
  public function getAllObjek(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->ObjekModel->getAllObjek();
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }


  public function addObjek(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $idObjek = $this->ObjekModel->addObjek($data);
      $data = $this->ObjekModel->getObjek($idObjek);
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function editObjek(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $idObjek = $this->ObjekModel->editObjek($data);
      $data = $this->ObjekModel->getObjek($idObjek);
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function deleteObjek(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $this->ObjekModel->deleteObjek($data);
      echo json_encode(array());
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

}