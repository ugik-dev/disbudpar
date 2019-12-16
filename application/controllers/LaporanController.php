<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanController extends CI_Controller {

  public function __construct(){
    parent::__construct();
		$this->load->model(array('LaporanModel'));
    $this->load->helper(array('DataStructure', 'Validation'));

  }

    public function index(){

        $data = 'test';
    }
    public function getPariwisata1(){
      try{
        $this->SecurityModel->userOnlyGuard(TRUE);
        $data = $this->LaporanModel->getPariwisata1($this->input->get());
         echo json_encode(array("data" => $data, "error" => false));
  
      } catch (Exception $e) {
        ExceptionHandler::handle($e);
      }
    }


    public function getPariwisata2(){
      try{
        $this->SecurityModel->userOnlyGuard(TRUE);
        $data = $this->LaporanModel->getPariwisata2($this->input->get());
         echo json_encode(array("data" => $data, "error" => false));
  
      } catch (Exception $e) {
        ExceptionHandler::handle($e);
      }
    }
    public function p1(){
      try{
        $this->SecurityModel->userOnlyGuard(TRUE);
        $data = $this->LaporanModel->p1();
         echo json_encode(array("data" => $data, "error" => false));
  
      } catch (Exception $e) {
        ExceptionHandler::handle($e);
      }
    }

    public function p2(){
      try{
        $this->SecurityModel->userOnlyGuard(TRUE);
        $data = $this->LaporanModel->p2();
         echo json_encode(array("data" => $data, "error" => false));
  
      } catch (Exception $e) {
        ExceptionHandler::handle($e);
      }
    }

    public function getFormat(){
      try{
        $this->SecurityModel->userOnlyGuard(TRUE);
        $data = $this->LaporanModel->getFormat($this->input->get());
         echo json_encode(array("data" => $data, "error" => false));
  
      } catch (Exception $e) {
        ExceptionHandler::handle($e);
      }
    }

    public function getPariwisata3(){
      try{
        $this->SecurityModel->userOnlyGuard(TRUE);
        $data = $this->LaporanModel->getPariwisata3($this->input->get());
         echo json_encode(array("data" => $data, "error" => false));
  
      } catch (Exception $e) {
        ExceptionHandler::handle($e);
      }
    }

    public function getPariwisata4(){
      try{
        $this->SecurityModel->userOnlyGuard(TRUE);
        $data = $this->LaporanModel->getPariwisata4($this->input->get());
         echo json_encode(array("data" => $data, "error" => false));
  
      } catch (Exception $e) {
        ExceptionHandler::handle($e);
      }
    }

    public function getPariwisata5(){
      try{
        $this->SecurityModel->userOnlyGuard(TRUE);
        $data = $this->LaporanModel->getPariwisata5($this->input->get());
         echo json_encode(array("data" => $data, "error" => false));
  
      } catch (Exception $e) {
        ExceptionHandler::handle($e);
      }
    }
    
    public function getPariwisata6(){
      try{
        $this->SecurityModel->userOnlyGuard(TRUE);
        $data = $this->LaporanModel->getPariwisata6($this->input->get());
         echo json_encode(array("data" => $data, "error" => false));
  
      } catch (Exception $e) {
        ExceptionHandler::handle($e);
      }
    }

    
    public function getPariwisata7(){
      try{
        $this->SecurityModel->userOnlyGuard(TRUE);
        $data = $this->LaporanModel->getPariwisata7($this->input->get());
         echo json_encode(array("data" => $data, "error" => false));
  
      } catch (Exception $e) {
        ExceptionHandler::handle($e);
      }
    }

    
    public function getPariwisata8(){
      try{
        $this->SecurityModel->userOnlyGuard(TRUE);
        $data = $this->LaporanModel->getPariwisata8($this->input->get());
         echo json_encode(array("data" => $data, "error" => false));
  
      } catch (Exception $e) {
        ExceptionHandler::handle($e);
      }
    }
    public function getPoint1(){
        try{
          $this->SecurityModel->userOnlyGuard(TRUE);
          $data = $this->LaporanModel->getPoint1($this->input->get());
           echo json_encode(array("data" => $data, "error" => false));
    
        } catch (Exception $e) {
          ExceptionHandler::handle($e);
        }
      }

      public function getPoint2(){
        try{
          $this->SecurityModel->userOnlyGuard(TRUE);
          $data = $this->LaporanModel->getPoint2($this->input->get());
           echo json_encode(array("data" => $data, "error" => false));
    
        } catch (Exception $e) {
          ExceptionHandler::handle($e);
        }
      }
      public function getPoint21(){
        try{
          $this->SecurityModel->userOnlyGuard(TRUE);
          $data = $this->LaporanModel->getPoint21($this->input->get());
           echo json_encode(array("data" => $data, "error" => false));
    
        } catch (Exception $e) {
          ExceptionHandler::handle($e);
        }
      }
      public function getPoint3(){
        try{
          $this->SecurityModel->userOnlyGuard(TRUE);
          $data = $this->LaporanModel->getPoint3($this->input->get());
           echo json_encode(array("data" => $data, "error" => false));
    
        } catch (Exception $e) {
          ExceptionHandler::handle($e);
        }
      }

      public function getPoint3Pengunjung(){
        try{
          $this->SecurityModel->userOnlyGuard(TRUE);
          $data = $this->LaporanModel->getPoint3Pengunjung($this->input->get());
           echo json_encode(array("data" => $data, "error" => false));
    
        } catch (Exception $e) {
          ExceptionHandler::handle($e);
        }
      }

      public function getPoint31(){
        try{
          $this->SecurityModel->userOnlyGuard(TRUE);
          $data = $this->LaporanModel->getPoint31($this->input->get());
           echo json_encode(array("data" => $data, "error" => false));
    
        } catch (Exception $e) {
          ExceptionHandler::handle($e);
        }
      }

      public function getPoint32(){
        try{
          $this->SecurityModel->userOnlyGuard(TRUE);
          $data = $this->LaporanModel->getPoint32($this->input->get());
           echo json_encode(array("data" => $data, "error" => false));
    
        } catch (Exception $e) {
          ExceptionHandler::handle($e);
        }
      }

      public function getPoint4(){
        try{
          $this->SecurityModel->userOnlyGuard(TRUE);
          $data = $this->LaporanModel->getPoint4($this->input->get());
           echo json_encode(array("data" => $data, "error" => false));
    
        } catch (Exception $e) {
          ExceptionHandler::handle($e);
        }
      }
}
