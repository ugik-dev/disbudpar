<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CagarbudayaController extends CI_Controller {

  public function __construct(){
    parent::__construct();
		$this->load->model(array('CagarbudayaModel'));
    $this->load->helper(array('DataStructure', 'Validation'));

  }


  public function getAllJenisOption(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->CagarbudayaModel->getAllJenisOption($this->input->get());
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function getAllKepemilikanOption(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->CagarbudayaModel->getAllKepemilikanOption($this->input->get());
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  
  public function getAllStatusPenetapanOption(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->CagarbudayaModel->getAllStatusPenetapanOption($this->input->get());
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function getAllCagarbudaya(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->CagarbudayaModel->getAllCagarbudaya();
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }


  public function addCagarbudaya(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $idCagarbudaya = $this->CagarbudayaModel->addCagarbudaya($data);
      $data = $this->CagarbudayaModel->getCagarbudaya($idCagarbudaya);
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function editCagarbudaya(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $idCagarbudaya = $this->CagarbudayaModel->editCagarbudaya($data);
      $data = $this->CagarbudayaModel->getCagarbudaya($idCagarbudaya);
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function deleteCagarbudaya(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $this->CagarbudayaModel->deleteCagarbudaya($data);
      echo json_encode(array());
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

}
