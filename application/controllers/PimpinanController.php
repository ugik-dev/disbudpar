<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PimpinanController extends CI_Controller {
 
  public function __construct(){
    parent::__construct();
    $this->load->model(array(''));
    $this->load->model(array('LaporanModel'));
    $this->load->helper(array('DataStructure', 'Validation'));

  }
  
  public function index(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
		$pageData = array(
			'title' => 'Beranda',
      'content' => 'Dashboard',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
		);
    $this->load->view('Page', $pageData);
  }

  public function Gmap(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
		$pageData = array(
			'title' => 'Beranda',
      'content' => 'pimpinan/Gmap',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
		);
    $this->load->view('Page', $pageData);
  }

  public function export(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
		$pageData = array(
			'title' => 'Beranda',
      'content' => 'pimpinan/Dashboard',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
		);
    $this->load->view('Page', $pageData);
  }
  public function cagarbudaya(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
		$pageData = array(
			'title' => 'Cagar dan Budaya',
      'content' => 'pimpinan/cagarbudaya',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
		);
    $this->load->view('Page', $pageData);
  }
  // public function statistikCagarbudaya(){
  //   $this->SecurityModel->roleOnlyGuard('pimpinan');
  //   $pageData = array(
  //     'title' => 'Statistik Cagar Budaya',
  //     'content' => 'pimpinan/StatistikCagarbudaya',
  //     'breadcrumb' => array(
  //       'Home' => base_url(),
  //     ),
  //   );
  //   $this->load->view('Page', $pageData);
  // }

  public function DetailCagarbudaya(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
    $pageData = array(
      'title' => 'Detail Cagar Budaya',
      'content' => 'pimpinan/DetailCagarbudaya',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
      'contentData' => ['id_cagarbudaya'=> $this->input->get()['id_cagarbudaya']]
    );
    $this->load->view('Page', $pageData);
  }
  
  public function DetailSenibudaya(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
    $pageData = array(
      'title' => 'Detail Seni dan Budaya',
      'content' => 'pimpinan/DetailSenibudaya',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
      'contentData' => ['id_senibudaya'=> $this->input->get()['id_senibudaya']]
    );
    $this->load->view('Page', $pageData);
  }
  public function DetailMuseum(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
    $pageData = array(
      'title' => 'Detail Museum',
      'content' => 'pimpinan/DetailMuseum',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
      'contentData' => ['id_museum'=> $this->input->get()['id_museum']]
    );
    $this->load->view('Page', $pageData);
  }

  public function DetailObjek(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
    $pageData = array(
      'title' => 'Detail Daya Tarik Wisata',
      'content' => 'pimpinan/DetailObjek',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
      'contentData' => ['id_objek'=> $this->input->get()['id_objek']]
    );
    $this->load->view('Page', $pageData);
  }

  
  public function DetailPagelaran(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
    $pageData = array(
      'title' => 'Detail Pagelaran dan Pameran',
      'content' => 'pimpinan/DetailPagelaran',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
      'contentData' => ['id_pagelaran'=> $this->input->get()['id_pagelaran']]
    );
    $this->load->view('Page', $pageData);
  }
  public function DetailPemugaran(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
    $pageData = array(
      'title' => 'Detail Pemugaran',
      'content' => 'pimpinan/DetailPemugaran',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
      'contentData' => ['id_pemugaran'=> $this->input->get()['id_pemugaran']]
    );
    $this->load->view('Page', $pageData);
  }

  
  public function DetailBiro(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
    $pageData = array(
      'title' => 'Detail Biro dan Agen Perjalanan',
      'content' => 'pimpinan/DetailBiro',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
      'contentData' => ['id_biro'=> $this->input->get()['id_biro']]
    );
    $this->load->view('Page', $pageData);
  }

  
  
  public function DetailUsaha(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
    $pageData = array(
      'title' => 'Detail Usaha dan Jasa',
      'content' => 'pimpinan/DetailUsaha',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
      'contentData' => ['id_usaha'=> $this->input->get()['id_usaha']]
    );
    $this->load->view('Page', $pageData);
  }

  public function DetailSaranaprasarana(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
    $pageData = array(
      'title' => 'Detail Sarana dan Prasarana',
      'content' => 'pimpinan/DetailSaranaprasarana',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
      'contentData' => ['id_saranaprasarana'=> $this->input->get()['id_saranaprasarana']]
    );
    $this->load->view('Page', $pageData);
  }

  public function DetailPenginapan(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
    $pageData = array(
      'title' => 'Detail Penginapan',
      'content' => 'pimpinan/DetailPenginapan',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
      'contentData' => ['id_penginapan'=> $this->input->get()['id_penginapan']]
    );
    $this->load->view('Page', $pageData);
  }
  
  public function Senibudaya(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
    $pageData = array(
      'title' => 'Seni dan Budaya',
      'content' => 'pimpinan/senibudaya',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

  public function Pagelaran(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
    $pageData = array(
      'title' => 'Pagelaran dan Pameran',
      'content' => 'pimpinan/pagelaran',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

  public function Museum(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
    $pageData = array(
      'title' => 'Museum',
      'content' => 'pimpinan/Museum',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

  public function Saranaprasarana(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
    $pageData = array(
      'title' => 'Sarana dan Prasarana',
      'content' => 'pimpinan/Saranaprasarana',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

  public function Objek(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
    $pageData = array(
      'title' => 'Daya Tarik Wisata',
      'content' => 'pimpinan/Objek',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

  public function Pemugaran(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
    $pageData = array(
      'title' => 'Pemugaran',
      'content' => 'pimpinan/Pemugaran',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

  public function Laporan(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
    $pageData = array(
      'datapariwisata' => $this->LaporanModel->getFormat(),
      'datakebudayaan' => $this->LaporanModel->getFormat2(),
      'tahun' => $this->LaporanModel->getTahun(),
      
    );
    $this->load->view('operator/laporan', $pageData);
  }

  
  public function Kalender(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
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
    $this->SecurityModel->roleOnlyGuard('pimpinan');
    $pageData = array(
      'title' => 'Entry Data',
      'content' => 'pimpinan/LaporanPariwisata',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

  public function test(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
    $pageData = array(
      'title' => 'test',
      'content' => 'pimpinan/test',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

  public function Penginapan(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
    $pageData = array(
      'title' => 'Penginapan',
      'content' => 'pimpinan/Penginapan',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

  public function Biro(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
    $pageData = array(
      'title' => 'Biro Wisata dan Agen',
      'content' => 'pimpinan/biro',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

  public function Usaha(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
    $pageData = array(
      'title' => 'Usaha dan Jasa',
      'content' => 'pimpinan/usaha',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

}