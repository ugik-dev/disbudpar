<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GmapController extends CI_Controller {

    public function __construct(){
        parent::__construct();
          $this->load->model(array('CagarbudayaModel'));
        $this->load->helper(array('DataStructure', 'Validation'));
    
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
    
}