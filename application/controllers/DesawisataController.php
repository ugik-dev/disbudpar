<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DesawisataController extends CI_Controller {

    public function __construct(){
        parent::__construct();
            $this->load->model(array('DesawisataModel'));
        $this->load->helper(array('DataStructure', 'Validation'));
    
    }
    

  public function getAllKategoriOption(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->DesawisataModel->getAllKategoriOption($this->input->get());
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  
  public function getAllDesawisata(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->DesawisataModel->getAllDesawisata();
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }


  public function addDesawisata(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $idDesawisata = $this->DesawisataModel->addDesawisata($data);
      $data = $this->DesawisataModel->getDesawisata($idDesawisata);
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function editDesawisata(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $idDesawisata = $this->DesawisataModel->editDesawisata($data);
      $data = $this->DesawisataModel->getDesawisata($idDesawisata);
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function deleteDesawisata(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $this->DesawisataModel->deleteDesawisata($data);
      echo json_encode(array());
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

}