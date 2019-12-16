<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model(array('DashboardModel'));
        $this->load->helper(array('DataStructure', 'Validation'));
        
    }
    
    
  public function getTahun(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->DashboardModel->getTahun($this->input->get());
       echo json_encode(array("data" => $data, "error" => false));

    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }
    
  public function getChart1(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->DashboardModel->getChart1($this->input->get());
       echo json_encode(array("data" => $data, "error" => false));

    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }
   
  public function getChart1objek(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->DashboardModel->getChart1objek($this->input->get());
       echo json_encode(array("data" => $data, "error" => false));

    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function getChart1penginapan(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->DashboardModel->getChart1penginapan($this->input->get());
       echo json_encode(array("data" => $data, "error" => false));

    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }
   
  public function getChart1museum(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->DashboardModel->getChart1museum($this->input->get());
       echo json_encode(array("data" => $data, "error" => false));

    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function getChart2Cagarbudaya(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->DashboardModel->getChart2Cagarbudaya($this->input->get());
       echo json_encode(array("data" => $data, "error" => false));

    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function getChart2Objek(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->DashboardModel->getChart2Objek($this->input->get());
       echo json_encode(array("data" => $data, "error" => false));

    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function getChart2Museum(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->DashboardModel->getChart2Museum($this->input->get());
       echo json_encode(array("data" => $data, "error" => false));

    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function getChart2Penginapan(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->DashboardModel->getChart2Penginapan($this->input->get());
       echo json_encode(array("data" => $data, "error" => false));

    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function getLocCagarbudaya(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->DashboardModel->getLocCagarbudaya($this->input->get());
       echo json_encode(array("data" => $data, "error" => false));

    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }
  public function getLocMuseum(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->DashboardModel->getLocMuseum($this->input->get());
       echo json_encode(array("data" => $data, "error" => false));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }
  public function getLocPenginapan(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->DashboardModel->getLocPenginapan($this->input->get());
       echo json_encode(array("data" => $data, "error" => false));

    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }
  public function getLocUsaha(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->DashboardModel->getLocUsaha($this->input->get());
       echo json_encode(array("data" => $data, "error" => false));

    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }
  public function getLocBiro(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->DashboardModel->getLocBiro($this->input->get());
       echo json_encode(array("data" => $data, "error" => false));

    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }
  public function getLocSaranaprasarana(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->DashboardModel->getLocSaranaprasarana($this->input->get());
       echo json_encode(array("data" => $data, "error" => false));

    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }
  public function getLocSenibudaya(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->DashboardModel->getLocSenibudaya($this->input->get());
       echo json_encode(array("data" => $data, "error" => false));

    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }
  public function getLocPagelaran(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->DashboardModel->getLocPagelaran($this->input->get());
       echo json_encode(array("data" => $data, "error" => false));

    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }
    // pajak
    public function getAllPajak(){
      try{
        $this->SecurityModel->userOnlyGuard(TRUE);
        $data = $this->DashboardModel->getAllPajak($this->input->get());
         echo json_encode(array("data" => $data, "error" => false));
  
      } catch (Exception $e) {
        ExceptionHandler::handle($e);
      }
    }
    public function getPajakObjek(){
      try{
        $this->SecurityModel->userOnlyGuard(TRUE);
        $data = $this->DashboardModel->getPajakObjek($this->input->get());
         echo json_encode(array("data" => $data, "error" => false));
  
      } catch (Exception $e) {
        ExceptionHandler::handle($e);
      }
    }
    public function getPajakCagarbudaya(){
      try{
        $this->SecurityModel->userOnlyGuard(TRUE);
        $data = $this->DashboardModel->getPajakCagarbudaya($this->input->get());
         echo json_encode(array("data" => $data, "error" => false));
  
      } catch (Exception $e) {
        ExceptionHandler::handle($e);
      }
    }
    public function getPajakMuseum(){
      try{
        $this->SecurityModel->userOnlyGuard(TRUE);
        $data = $this->DashboardModel->getPajakMuseum($this->input->get());
         echo json_encode(array("data" => $data, "error" => false));
      } catch (Exception $e) {
        ExceptionHandler::handle($e);
      }
    }
    public function getPajakPenginapan(){
      try{
        $this->SecurityModel->userOnlyGuard(TRUE);
        $data = $this->DashboardModel->getPajakPenginapan($this->input->get());
         echo json_encode(array("data" => $data, "error" => false));
  
      } catch (Exception $e) {
        ExceptionHandler::handle($e);
      }
    }
    public function getPajakUsaha(){
      try{
        $this->SecurityModel->userOnlyGuard(TRUE);
        $data = $this->DashboardModel->getPajakUsaha($this->input->get());
         echo json_encode(array("data" => $data, "error" => false));
  
      } catch (Exception $e) {
        ExceptionHandler::handle($e);
      }
    }
    public function getPajakBiro(){
      try{
        $this->SecurityModel->userOnlyGuard(TRUE);
        $data = $this->DashboardModel->getPajakBiro($this->input->get());
         echo json_encode(array("data" => $data, "error" => false));
  
      } catch (Exception $e) {
        ExceptionHandler::handle($e);
      }
    }
    public function getPajakSaranaprasarana(){
      try{
        $this->SecurityModel->userOnlyGuard(TRUE);
        $data = $this->DashboardModel->getPajakSaranaprasarana($this->input->get());
         echo json_encode(array("data" => $data, "error" => false));
  
      } catch (Exception $e) {
        ExceptionHandler::handle($e);
      }
    }
    public function getPajakSenibudaya(){
      try{
        $this->SecurityModel->userOnlyGuard(TRUE);
        $data = $this->DashboardModel->getPajakSenibudaya($this->input->get());
         echo json_encode(array("data" => $data, "error" => false));
  
      } catch (Exception $e) {
        ExceptionHandler::handle($e);
      }
    }
    public function getPajakPagelaran(){
      try{
        $this->SecurityModel->userOnlyGuard(TRUE);
        $data = $this->DashboardModel->getPajakPagelaran($this->input->get());
         echo json_encode(array("data" => $data, "error" => false));
  
      } catch (Exception $e) {
        ExceptionHandler::handle($e);
      }
    
  }
// pajak







  public function getLocObjek(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->DashboardModel->getLocObjek($this->input->get());
       echo json_encode(array("data" => $data, "error" => false));

    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function getJumlahCagarbudaya(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->DashboardModel->getJumlahCagarbudaya($this->input->get());
       echo json_encode(array("data" => $data, "error" => false));

    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  
  public function getJumlahPenginapan(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->DashboardModel->getJumlahPenginapan($this->input->get());
       echo json_encode(array("data" => $data, "error" => false));

    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }


  public function getJumlahObjekwisata(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->DashboardModel->getJumlahObjekwisata($this->input->get());
       echo json_encode(array("data" => $data, "error" => false));

    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function getSenibudaya(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->DashboardModel->getSenibudaya($this->input->get());
       echo json_encode(array("data" => $data, "error" => false));

    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }
  
  public function getAllCagarbudaya(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->DashboardModel->getAllCagarbudaya($this->input->get());
       echo json_encode(array("data" => $data, "error" => false));

    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function getAllObjekwisata(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->DashboardModel->getAllObjekwisata($this->input->get());
       echo json_encode(array("data" => $data, "error" => false));

    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  
  public function getAllPenginapan(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->DashboardModel->getAllPenginapan($this->input->get());
       echo json_encode(array("data" => $data, "error" => false));

    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function getPagelaran(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->DashboardModel->getPagelaran($this->input->get());
       echo json_encode(array("data" => $data, "error" => false));

    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function getStrukturPagelaran(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->DashboardModel->getStrukturPagelaran($this->input->get());
       echo json_encode(array("data" => $data, "error" => false));

    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }
  
  public function getStrukturObjek(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->DashboardModel->getStrukturObjek($this->input->get());
       echo json_encode(array("data" => $data, "error" => false));

    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }
  public function getStrukturPenginapan(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->DashboardModel->getStrukturPenginapan($this->input->get());
       echo json_encode(array("data" => $data, "error" => false));

    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }
  public function getStrukturBiro(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->DashboardModel->getStrukturBiro($this->input->get());
       echo json_encode(array("data" => $data, "error" => false));

    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }
  public function getStrukturSenibudaya(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->DashboardModel->getStrukturSenibudaya($this->input->get());
       echo json_encode(array("data" => $data, "error" => false));

    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function getStrukturCagarbudaya(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->DashboardModel->getStrukturCagarbudaya($this->input->get());
      echo json_encode(array("data" => $data, "error" => false));
      //echo json_encode($data);
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

}