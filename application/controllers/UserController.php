<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {

  public function __construct(){
    parent::__construct();
		$this->load->model(array('UserModel'));
		$this->load->helper(array('DataStructure', 'Validation'));
		$this->db->db_debug = false;
	}

  public function index(){
		redirect('login');
  }

	public function login(){
		$this->SecurityModel->guestOnlyGuard();
		$pageData = array(
			'title' => 'Masuk',
		);

		$this->load->view('LoginPage', $pageData);
	}

	public function loginProcess(){
		try{
			// $this->SecurityModel->guestOnlyGuard(TRUE);
			Validation::ajaxValidateForm($this->SecurityModel->loginValidation());

			$loginData = $this->input->post();

			$user = $this->UserModel->login($loginData);

			$this->session->set_userdata($user);
			echo json_encode(array("error" => FALSE, "user" => $user));
		} catch (Exception $e) {
			ExceptionHandler::handle($e);
		}
	}

	public function changePassword(){
		try{
      $this->SecurityModel->roleOnlyGuard('pengusul', TRUE);
      $this->SecurityModel->pengusulSubTypeGuard(['dosen_tendik'], TRUE);
			// Validation::ajaxValidateForm($this->SecurityModel->deleteDosenTendik());

			$CP = $this->input->post();
			if(md5($CP['old_password']) != $this->session->userdata('password')){
				throw new UserException('Password Lama Salah', 0);
			}
			$this->UserModel->changePassword($CP);
			$this->session->set_userdata('password', md5($CP['password']));
			echo json_encode(array());
		} catch (Exception $e) {
			ExceptionHandler::handle($e);
		}
	}

	public function logout(){
		// $this->SecurityModel->userOnlyGuard();
		$this->session->sess_destroy();
		echo json_encode(["error" => FALSE, 'data' => 'Logout berhasil.']);
	}
}
