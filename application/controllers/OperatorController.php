<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OperatorController extends CI_Controller {
 
  public function __construct(){
    parent::__construct();
    $this->load->model(array(''));
    $this->load->model(array('LaporanModel'));
    $this->load->model(array('CagarbudayaModel'));
     $this->load->model(array('DetailCagarbudayaModel'));
    $this->load->helper(array('DataStructure', 'Validation'));

  }
  
  public function index(){
    $this->SecurityModel->roleOnlyGuard('operator');
		$pageData = array(
			'title' => 'Beranda',
      'content' => 'Dashboard',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
		);
    $this->load->view('Page', $pageData);
  }

  public function Message(){
    $this->SecurityModel->roleOnlyGuard('operator');
		$pageData = array(
			'title' => 'Mail Box',
      'content' => 'operator/Message',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
		);
    $this->load->view('Page', $pageData);
  }

  public function cagarbudaya(){
    $this->SecurityModel->roleOnlyGuard('operator');
		$pageData = array(
			'title' => 'Cagar dan Budaya',
      'content' => 'operator/cagarbudaya',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
		);
    $this->load->view('Page', $pageData);
  }
  // public function statistikCagarbudaya(){
  //   $this->SecurityModel->roleOnlyGuard('operator');
  //   $pageData = array(
  //     'title' => 'Statistik Cagar Budaya',
  //     'content' => 'operator/StatistikCagarbudaya',
  //     'breadcrumb' => array(
  //       'Home' => base_url(),
  //     ),
  //   );
  //   $this->load->view('Page', $pageData);
  // }

  public function DetailCagarbudaya(){
    $this->SecurityModel->roleOnlyGuard('operator');
    $pageData = array(
      'title' => 'Detail Cagar Budaya',
      'content' => 'operator/DetailCagarbudaya',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
      'contentData' => ['id_cagarbudaya'=> $this->input->get()['id_cagarbudaya']]
    );
    $this->load->view('Page', $pageData);
  }
  
  public function DetailSenibudaya(){
    $this->SecurityModel->roleOnlyGuard('operator');
    $pageData = array(
      'title' => 'Detail Seni dan Budaya',
      'content' => 'operator/DetailSenibudaya',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
      'contentData' => ['id_senibudaya'=> $this->input->get()['id_senibudaya']]
    );
    $this->load->view('Page', $pageData);
  }
  public function DetailMuseum(){
    $this->SecurityModel->roleOnlyGuard('operator');
    $pageData = array(
      'title' => 'Detail Museum',
      'content' => 'operator/DetailMuseum',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
      'contentData' => ['id_museum'=> $this->input->get()['id_museum']]
    );
    $this->load->view('Page', $pageData);
  }

  public function DetailObjek(){
    $this->SecurityModel->roleOnlyGuard('operator');
    $pageData = array(
      'title' => 'Detail Daya Tarik Wisata',
      'content' => 'operator/DetailObjek',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
      'contentData' => ['id_objek'=> $this->input->get()['id_objek']]
    );
    $this->load->view('Page', $pageData);
  }

  public function DetailMessage(){
    $this->SecurityModel->roleOnlyGuard('operator');
    $pageData = array(
      'title' => 'Mail Box',
      'content' => 'operator/DetailMessage',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
      'contentData' => ['id_message'=> $this->input->get()['id_message']]
    );
    $this->load->view('Page', $pageData);
  }
  
  public function DetailPagelaran(){
    $this->SecurityModel->roleOnlyGuard('operator');
    $pageData = array(
      'title' => 'Detail Pagelaran dan Pameran',
      'content' => 'operator/DetailPagelaran',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
      'contentData' => ['id_pagelaran'=> $this->input->get()['id_pagelaran']]
    );
    $this->load->view('Page', $pageData);
  }
  public function DetailPemugaran(){
    $this->SecurityModel->roleOnlyGuard('operator');
    $pageData = array(
      'title' => 'Detail Pemugaran',
      'content' => 'operator/DetailPemugaran',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
      'contentData' => ['id_pemugaran'=> $this->input->get()['id_pemugaran']]
    );
    $this->load->view('Page', $pageData);
  }

  
  public function DetailBiro(){
    $this->SecurityModel->roleOnlyGuard('operator');
    $pageData = array(
      'title' => 'Detail Biro dan Agen Perjalanan',
      'content' => 'operator/DetailBiro',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
      'contentData' => ['id_biro'=> $this->input->get()['id_biro']]
    );
    $this->load->view('Page', $pageData);
  }

  
  
  public function DetailUsaha(){
    $this->SecurityModel->roleOnlyGuard('operator');
    $pageData = array(
      'title' => 'Detail Usaha dan Jasa',
      'content' => 'operator/DetailUsaha',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
      'contentData' => ['id_usaha'=> $this->input->get()['id_usaha']]
    );
    $this->load->view('Page', $pageData);
  }

  public function DetailSaranaprasarana(){
    $this->SecurityModel->roleOnlyGuard('operator');
    $pageData = array(
      'title' => 'Detail Sarana dan Prasarana',
      'content' => 'operator/DetailSaranaprasarana',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
      'contentData' => ['id_saranaprasarana'=> $this->input->get()['id_saranaprasarana']]
    );
    $this->load->view('Page', $pageData);
  }

  public function DetailPenginapan(){
    $this->SecurityModel->roleOnlyGuard('operator');
    $pageData = array(
      'title' => 'Detail Penginapan',
      'content' => 'operator/DetailPenginapan',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
      'contentData' => ['id_penginapan'=> $this->input->get()['id_penginapan']]
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

  public function Pagelaran(){
    $this->SecurityModel->roleOnlyGuard('operator');
    $pageData = array(
      'title' => 'Pagelaran dan Pameran',
      'content' => 'operator/pagelaran',
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
      'title' => 'Daya Tarik Wisata',
      'content' => 'operator/Objek',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

  public function Pemugaran(){
    $this->SecurityModel->roleOnlyGuard('operator');
    $pageData = array(
      'title' => 'Pemugaran',
      'content' => 'operator/Pemugaran',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

  public function Laporan(){
    $this->SecurityModel->roleOnlyGuard('operator');
    $pageData = array(
      'datapariwisata' => $this->LaporanModel->getFormat(),
      'datakebudayaan' => $this->LaporanModel->getFormat2(),
      'tahun' => $this->LaporanModel->getTahun(),
      
    );
    $this->load->view('operator/laporan', $pageData);
  }
  public function PdfCagarbudaya(){
    $this->SecurityModel->roleOnlyGuard('operator');
    $id = $this->input->get();
    $dataProfil = $this->DetailCagarbudayaModel->getProfil($id);
    $tmp['id_user'] = $dataProfil['id_user_approv'];
    $approv = $this->DetailCagarbudayaModel->getUser($tmp);
    $tmp['id_user'] = $dataProfil['id_user_entry'];
    $entry = $this->DetailCagarbudayaModel->getUser($tmp);
    $kabupaten = $this->DetailCagarbudayaModel->getKabupaten($dataProfil['id_kabupaten']);
    $pageData = array(
    'dataProfil' => $dataProfil,
    'approv' => $approv['nama'],
    'entry' => $entry['nama'],
    'kabupaten' => $kabupaten
    );
    $this->load->view('operator/pdfcagarbudaya', $pageData);
  }
  public function PdfAllCagarbudaya(){
    $this->SecurityModel->roleOnlyGuard('operator');
   
    $data = $this->CagarbudayaModel->getAllCagarbudaya();
    $kabupaten = $this->DetailCagarbudayaModel->getKabupaten($this->session->userdata('id_kabupaten'));
    $pageData = array(
    'data' => $data,
    'kabupaten' => $kabupaten
    );
    $this->load->view('operator/pdfallcagarbudaya', $pageData);
  }

  public function Kalender(){
    $this->SecurityModel->roleOnlyGuard('operator');
    $pageData = array(
      'title' => 'Event',
      'content' => 'Kalender',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

  public function LaporanPariwisata(){
    $this->SecurityModel->roleOnlyGuard('operator');
    $pageData = array(
      'title' => 'Entry Data',
      'content' => 'operator/LaporanPariwisata',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

  public function test(){
    $this->SecurityModel->roleOnlyGuard('operator');
    $pageData = array(
      'title' => 'test',
      'content' => 'operator/test',
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