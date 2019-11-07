<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SaranaprasaranaController extends CI_Controller {

    public function __construct(){
        parent::__construct();
            $this->load->model(array('SaranaprasaranaModel'));
        $this->load->helper(array('DataStructure', 'Validation'));
    
    }
    

  public function getAllJenisOption(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->SaranaprasaranaModel->getAllJenisOption($this->input->get());
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  
  public function getAllSaranaprasarana(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->SaranaprasaranaModel->getAllSaranaprasarana();
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }


  public function addSaranaprasarana(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $idSaranaprasarana = $this->SaranaprasaranaModel->addSaranaprasarana($data);
      $data = $this->SaranaprasaranaModel->getSaranaprasarana($idSaranaprasarana);
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function editSaranaprasarana(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $idSaranaprasarana = $this->SaranaprasaranaModel->editSaranaprasarana($data);
      $data = $this->SaranaprasaranaModel->getSaranaprasarana($idSaranaprasarana);
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function deleteSaranaprasarana(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $this->SaranaprasaranaModel->deleteSaranaprasarana($data);
      echo json_encode(array());
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

}