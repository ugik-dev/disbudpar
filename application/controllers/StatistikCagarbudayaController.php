<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StatistikCagarbudayaController extends CI_Controller {

  public function __construct(){
    parent::__construct();
		$this->load->model(array('StatistikCagarbudayaModel'));
    $this->load->helper(array('DataStructure', 'Validation'));

  }


  public function getAllCagarBudayaOption(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->StatistikCagarbudayaModel->getAllCagarBudayaOption($this->input->get());
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function getAllStatistikCagarbudaya(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->StatistikCagarbudayaModel->getAllStatistikCagarbudaya();
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }


  public function addStatistikCagarbudaya(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $idStatistikCagarbudaya = $this->StatistikCagarbudayaModel->addStatistikCagarbudaya($data);
      $data = $this->StatistikCagarbudayaModel->getAllStatistikCagarbudaya($idStatistikCagarbudaya);
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function editCagarbudaya(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $idCagarbudaya = $this->StatistikCagarbudayaModel->editCagarbudaya($data);
      $data = $this->StatistikCagarbudayaModel->getCagarbudaya($idCagarbudaya);
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function deleteCagarbudaya(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $this->StatistikCagarbudayaModel->deleteCagarbudaya($data);
      echo json_encode(array());
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

}
