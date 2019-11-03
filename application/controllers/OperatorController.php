<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OperatorController extends CI_Controller {

  public function __construct(){
    parent::__construct();
		$this->load->model(array(''));
    $this->load->helper(array('DataStructure', 'Validation'));

  }
  
  public function index(){
    $this->SecurityModel->roleOnlyGuard('operator');
		$pageData = array(
			'title' => 'Beranda',
      'content' => 'operator/DashboardPage',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
		);
    $this->load->view('Page', $pageData);
  }


  public function newPage(){
    $this->SecurityModel->roleOnlyGuard('operator');
    $pageData = array(
      'title' => 'Beranda',
      'content' => 'operator/NewPage',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }
}
