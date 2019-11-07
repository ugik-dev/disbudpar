<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsahaController extends CI_Controller {

    public function __construct(){
        parent::__construct();
            $this->load->model(array('UsahaModel'));
        $this->load->helper(array('DataStructure', 'Validation'));
    
    }
    

  public function getAllJenisOption(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->UsahaModel->getAllJenisOption($this->input->get());
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function getAllItemOption(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->UsahaModel->getAllItemOption($this->input->get());
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  
  public function getAllUsaha(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->UsahaModel->getAllUsaha();
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }


  public function addUsaha(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $idUsaha = $this->UsahaModel->addUsaha($data);
      $data = $this->UsahaModel->getUsaha($idUsaha);
      echo json_encode(array('data' => $data));
      if($_POST){
        checkboxes = $this->input->post('check_list');
        list_item = implode(",",$checkboxes);
      }
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function editUsaha(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $idUsaha = $this->UsahaModel->editUsaha($data);
      $data = $this->UsahaModel->getUsaha($idUsaha);
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function deleteUsaha(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $this->UsahaModel->deleteUsaha($data);
      echo json_encode(array());
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

}