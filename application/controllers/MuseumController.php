<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MuseumController extends CI_Controller {

    public function __construct(){
        parent::__construct();
            $this->load->model(array('MuseumModel'));
        $this->load->helper(array('DataStructure', 'Validation'));
    
    }
    

  public function getAllKepemilikanOption(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->MuseumModel->getAllKepemilikanOption($this->input->get());
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  
  public function getAllStatusOption(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->MuseumModel->getAllStatusOption($this->input->get());
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function getAllMuseum(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->MuseumModel->getAllMuseum();
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }


  public function addMuseum(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $idMuseum = $this->MuseumModel->addMuseum($data);
      $data = $this->MuseumModel->getMuseum($idMuseum);
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function editMuseum(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $idMuseum = $this->MuseumModel->editMuseum($data);
      $data = $this->MuseumModel->getMuseum($idMuseum);
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function deleteMuseum(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $this->MuseumModel->deleteMuseum($data);
      echo json_encode(array());
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

}