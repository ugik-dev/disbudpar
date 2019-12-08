<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KalenderController extends CI_Controller {

    function __construct() { 
        parent::__construct(); 
         
        $this->load->model('KalenderModel'); 
    } 
    
    

    public function getPagelaran(){ 
        try{
            $this->SecurityModel->userOnlyGuard(TRUE);
            $data = $this->KalenderModel->getPagelaran($this->input->get());
            echo json_encode(array("data" => $data, "error" => false));
      
          } catch (Exception $e) {
            ExceptionHandler::handle($e);
          }
    }
    public function getPagelaran2(){ 
        try{
            $this->SecurityModel->userOnlyGuard(TRUE);
            $data = $this->KalenderModel->getPagelaran2($this->input->get());
            echo json_encode(array("data" => $data, "error" => false));
      
          } catch (Exception $e) {
            ExceptionHandler::handle($e);
          }
    }
     
     
     
}
