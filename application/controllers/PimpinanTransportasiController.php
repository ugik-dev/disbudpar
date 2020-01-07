<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PimpinanTransportasiController extends CI_Controller {

  public function __construct(){
    parent::__construct();

    $this->load->model(array('TransportasiModel'));
    $this->load->helper(array('DataStructure', 'Validation'));
  }

  public function index(){
    $this->SecurityModel->roleOnlyGuard('pimpinantransportasi');
		$pageData = array(
			'title' => 'Beranda',
      'content' => 'Dashboard',
      'breadcrumb' => array(
      'Home' => base_url(),
      ),
		);
   
        $this->load->view('Page', $pageData);
  }

  public function profil(){
    $this->SecurityModel->roleOnlyGuard('pimpinantransportasi');
    
		$pageData = array(
			'title' => 'Profil',
            'content' => 'transportasi/Profil',
            'breadcrumb' => array(
            'Home' => base_url(),
      ),
        );   
        $this->load->view('Page', $pageData);
  }

  public function datapengunjung(){
    $this->SecurityModel->roleOnlyGuard('pimpinantransportasi');
    
		$pageData = array(
			'title' => 'Data',
            'content' => 'transportasi/DataPengunjung',
            'breadcrumb' => array(
            'Home' => base_url(),
      ),
        );   
        $this->load->view('Page', $pageData);
  }
  public function Message(){
    $this->SecurityModel->roleOnlyGuard('pimpinantransportasi');
		$pageData = array(
	    'title' => 'Mail Box',
        'content' => 'pimpinantransportasi/Message',
        'breadcrumb' => array(
        'Home' => base_url(),
      ),
		);
    $this->load->view('Page', $pageData);
  }


  public function Tenagakerja(){
    $this->SecurityModel->roleOnlyGuard('pimpinantransportasi');
		$pageData = array(
			'title' => 'Tenaga Kerja',
      'content' => 'admin/Tenagakerja',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
		);
    $this->load->view('Page', $pageData);
  }

  public function DetailMessage(){
    $this->SecurityModel->roleOnlyGuard('pimpinantransportasi');
    $pageData = array(
      'title' => 'Mail Box',
      'content' => 'pimpinantransportasi/DetailMessage',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
      'contentData' => ['id_message'=> $this->input->get()['id_message']]
    );
    $this->load->view('Page', $pageData);
  }

}
