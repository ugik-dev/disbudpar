<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanPariwisataController extends CI_Controller {

  public function __construct(){
    parent::__construct();
		$this->load->model(array('LaporanPariwisataModel'));
        $this->load->helper(array('DataStructure', 'Validation'));

  }

    public function index(){
     
        
    }

    public function getFormat(){
        try{
          $this->SecurityModel->userOnlyGuard(TRUE);
          $data = $this->LaporanPariwisataModel->getFormat($this->input->get());
          echo json_encode(array('data' => $data));
        } catch (Exception $e) {
          ExceptionHandler::handle($e);
        }
      }
      public function getFormat2(){
        try{
          $this->SecurityModel->userOnlyGuard(TRUE);
          $data = $this->LaporanPariwisataModel->getFormat2($this->input->get());
          echo json_encode(array('data' => $data));
        } catch (Exception $e) {
          ExceptionHandler::handle($e);
        }
      }
      public function getTahun(){
        try{
          $this->SecurityModel->userOnlyGuard(TRUE);
          $data = $this->LaporanPariwisataModel->getTahun($this->input->get());
          echo json_encode(array('data' => $data));
        } catch (Exception $e) {
          ExceptionHandler::handle($e);
        }
      }
      public function saveForm(){
        try{
          $this->SecurityModel->userOnlyGuard(TRUE);
          $data = $this->input->post();
          echo 'data =';
          echo $data['id_data1'];

//
if($this->session->userdata('id_role')=='3'){
  
  if($data['id_data1'] == 'null' or $data['id_data1'] == '' or $data['id_data1'] == null or $data['id_data1'] == 'NULL'){
    echo json_encode('succes');
  }else{
      for($i=1; $i <= 132; $i++){
          $this->LaporanPariwisataModel->approvData($data['id_data'.$i]);
      };
  };
  
}else{
  
  if($data['id_data1'] == 'null' or $data['id_data1'] == '' or $data['id_data1'] == null or $data['id_data1'] == 'NULL'){
    echo 'datakosong';
      for($i=1; $i <= 132; $i++){
          $this->LaporanPariwisataModel->saveTambah($data['tahun_input'],$data[$i],$i);
      };
  }else{
    echo 'data ada';
      for($i=1; $i <= 132; $i++){
          $this->LaporanPariwisataModel->saveEdit($data['id_data'.$i],$data['tahun_input'],$data[$i],$i);
      };
  };
};

//
          echo json_encode('succes');
        } catch (Exception $e) {
          ExceptionHandler::handle($e);
        }
      }
      public function saveForm2(){
        try{
          $this->SecurityModel->userOnlyGuard(TRUE);
          $data = $this->input->post();
          echo 'data =';
          echo $data['id_data1'];
//
if($this->session->userdata('id_role')=='3'){
  
  if($data['id_data1'] == 'null' or $data['id_data1'] == '' or $data['id_data1'] == null or $data['id_data1'] == 'NULL'){
    echo json_encode('succes');
  }else{
      for($i=1; $i <= 70; $i++){
          $this->LaporanPariwisataModel->approvData2($data['id_data'.$i]);
      };
  };
  
}else{
  
  if($data['id_data1'] == 'null' or $data['id_data1'] == '' or $data['id_data1'] == null or $data['id_data1'] == 'NULL'){
    echo 'datakosong';
      for($i=1; $i <= 70; $i++){
          $this->LaporanPariwisataModel->saveTambah2($data['tahun_input'],$data[$i],$i);
      };
  }else{
    echo 'data ada';
      for($i=1; $i <= 70; $i++){
          $this->LaporanPariwisataModel->saveEdit2($data['id_data'.$i],$data['tahun_input'],$data[$i],$i);
      };
};
};

//
          echo json_encode('succes');
        } catch (Exception $e) {
          ExceptionHandler::handle($e);
        }
      }
}
