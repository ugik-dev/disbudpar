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

  public function statistikCagarbudaya(){
    $this->SecurityModel->roleOnlyGuard('operator');
    $pageData = array(
      'title' => 'Statistik Cagar Budaya',
      'content' => 'operator/StatistikCagarbudaya',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }
  
  public function Senibudaya(){
    $this->SecurityModel->roleOnlyGuard('operator');
    $pageData = array(
      'title' => 'Seni dan Budaya',
      'content' => 'operator/senibudaya',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

  public function Museum(){
    $this->SecurityModel->roleOnlyGuard('operator');
    $pageData = array(
      'title' => 'Museum',
      'content' => 'operator/Museum',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

  public function Saranaprasarana(){
    $this->SecurityModel->roleOnlyGuard('operator');
    $pageData = array(
      'title' => 'Sarana dan Prasarana',
      'content' => 'operator/Saranaprasarana',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

  public function Objek(){
    $this->SecurityModel->roleOnlyGuard('operator');
    $pageData = array(
      'title' => 'Objek Wisata',
      'content' => 'operator/Objek',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

  public function Penginapan(){
    $this->SecurityModel->roleOnlyGuard('operator');
    $pageData = array(
      'title' => 'Penginapan',
      'content' => 'operator/Penginapan',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

  public function Biro(){
    $this->SecurityModel->roleOnlyGuard('operator');
    $pageData = array(
      'title' => 'Biro Wisata dan Agen',
      'content' => 'operator/biro',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

  public function Usaha(){
    $this->SecurityModel->roleOnlyGuard('operator');
    $pageData = array(
      'title' => 'Usaha dan Jasa',
      'content' => 'operator/usaha',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

}