<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestController extends CI_Controller {

  public function __construct(){
    parent::__construct();
		$this->load->model(array('TestModel'));
    $this->load->helper(array('DataStructure', 'Validation'));
  }
  
	public function getAllTest(){
		try{
			$this->SecurityModel->userOnlyGuard(TRUE);
      $test = $this->TestModel->getAllTest();
			echo json_encode(array('data' => $test));
		} catch (Exception $e) {
			ExceptionHandler::handle($e);
		}
	}

	
	public function addTest(){
		try{
			$this->SecurityModel->userOnlyGuard(TRUE);
			$data = $this->input->post();
      $idTest = $this->TestModel->addTest($data);
      $test = $this->TestModel->getTest($idTest);
			echo json_encode(array('data' => $test));
		} catch (Exception $e) {
			ExceptionHandler::handle($e);
		}
	}

	public function editTest(){
		try{
			$this->SecurityModel->userOnlyGuard(TRUE);
			$data = $this->input->post();
      $idTest = $this->TestModel->editTest($data);
      $test = $this->TestModel->getTest($data['id_test']);
			echo json_encode(array('data' => $test));
		} catch (Exception $e) {
			ExceptionHandler::handle($e);
		}
	}

	public function deleteTest(){
		try{
			$this->SecurityModel->userOnlyGuard(TRUE);
			$data = $this->input->post();
      $this->TestModel->deleteTest($data['id_test']);
			echo json_encode(array());
		} catch (Exception $e) {
			ExceptionHandler::handle($e);
		}
	}
}
