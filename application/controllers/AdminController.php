<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

  public function __construct(){
    parent::__construct();
		$this->load->model(array('AdminModel'));
    $this->load->helper(array('DataStructure', 'Validation'));
  }
  
  public function index(){
    $this->SecurityModel->roleOnlyGuard('admin');
		$pageData = array(
			'title' => 'Beranda',
      'content' => 'Dashboard',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
		);
    $this->load->view('Page', $pageData);
  }
    
  public function panduan(){
    $this->SecurityModel->roleOnlyGuard('admin');
		$pageData = array(
			'title' => 'Panduan',
      'content' => 'admin/PanduanPage',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
			'contentData' => array(),
		);
    $this->load->view('Page', $pageData);
  }

  public function getAllKabupaten(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->AdminModel->getAllKabupaten($this->input->get());
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }
  public function Message(){
    $this->SecurityModel->roleOnlyGuard('admin');
		$pageData = array(
			'title' => 'Mail Box',
      'content' => 'admin/Message',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
		);
    $this->load->view('Page', $pageData);
  }

  public function Desawisata(){
    $this->SecurityModel->roleOnlyGuard('admin');
		$pageData = array(
			'title' => 'Desa Wisata',
      'content' => 'admin/Desawisata',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
		);
    $this->load->view('Page', $pageData);
  }
  public function Tenagakerja(){
    $this->SecurityModel->roleOnlyGuard('admin');
		$pageData = array(
			'title' => 'Tenaga Kerja',
      'content' => 'admin/Tenagakerja',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
		);
    $this->load->view('Page', $pageData);
  }
  public function Kelolahuser(){
    $this->SecurityModel->roleOnlyGuard('admin');
		$pageData = array(
			'title' => 'Kelolah User',
      'content' => 'admin/Kelolahuser',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
		);
    $this->load->view('Page', $pageData);
  }
  public function DetailDesawisata(){
    $this->SecurityModel->roleOnlyGuard('admin');
    $pageData = array(
      'title' => 'Desa Wisata - '.$this->input->get()['nama_desawisata'],
      'content' => 'admin/DetailDesawisata',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
      'contentData' => ['id_desawisata'=> $this->input->get()['id_desawisata']]
    );
    $this->load->view('Page', $pageData);
  }

  public function cagarbudaya(){
    $this->SecurityModel->roleOnlyGuard('admin');
		$pageData = array(
			'title' => 'Cagar dan Budaya',
      'content' => 'admin/cagarbudaya',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
		);
    $this->load->view('Page', $pageData);
  }
  // public function statistikCagarbudaya(){
  //   $this->SecurityModel->roleOnlyGuard('admin');
  //   $pageData = array(
  //     'title' => 'Statistik Cagar Budaya',
  //     'content' => 'admin/StatistikCagarbudaya',
  //     'breadcrumb' => array(
  //       'Home' => base_url(),
  //     ),
  //   );
  //   $this->load->view('Page', $pageData);
  // }

  public function DetailCagarbudaya(){
    $this->SecurityModel->roleOnlyGuard('admin');
    $pageData = array(
      'title' => 'Detail Cagar Budaya',
      'content' => 'admin/DetailCagarbudaya',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
      'contentData' => ['id_cagarbudaya'=> $this->input->get()['id_cagarbudaya']]
    );
    $this->load->view('Page', $pageData);
  }
  
  public function DetailSenibudaya(){
    $this->SecurityModel->roleOnlyGuard('admin');
    $pageData = array(
      'title' => 'Detail Seni dan Budaya',
      'content' => 'admin/DetailSenibudaya',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
      'contentData' => ['id_senibudaya'=> $this->input->get()['id_senibudaya']]
    );
    $this->load->view('Page', $pageData);
  }
  public function DetailMuseum(){
    $this->SecurityModel->roleOnlyGuard('admin');
    $pageData = array(
      'title' => 'Detail Museum',
      'content' => 'admin/DetailMuseum',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
      'contentData' => ['id_museum'=> $this->input->get()['id_museum']]
    );
    $this->load->view('Page', $pageData);
  }

  public function DetailObjek(){
    $this->SecurityModel->roleOnlyGuard('admin');
    $pageData = array(
      'title' => 'Detail Daya Tarik Wisata',
      'content' => 'admin/DetailObjek',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
      'contentData' => ['id_objek'=> $this->input->get()['id_objek']]
    );
    $this->load->view('Page', $pageData);
  }

  public function DetailMessage(){
    $this->SecurityModel->roleOnlyGuard('admin');
    $pageData = array(
      'title' => 'Mail Box',
      'content' => 'admin/DetailMessage',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
      'contentData' => ['id_message'=> $this->input->get()['id_message']]
    );
    $this->load->view('Page', $pageData);
  }
  
  public function DetailPagelaran(){
    $this->SecurityModel->roleOnlyGuard('admin');
    $pageData = array(
      'title' => 'Detail Pagelaran dan Pameran',
      'content' => 'admin/DetailPagelaran',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
      'contentData' => ['id_pagelaran'=> $this->input->get()['id_pagelaran']]
    );
    $this->load->view('Page', $pageData);
  }
  public function DetailPemugaran(){
    $this->SecurityModel->roleOnlyGuard('admin');
    $pageData = array(
      'title' => 'Detail Pemugaran',
      'content' => 'admin/DetailPemugaran',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
      'contentData' => ['id_pemugaran'=> $this->input->get()['id_pemugaran']]
    );
    $this->load->view('Page', $pageData);
  }

  
  public function DetailBiro(){
    $this->SecurityModel->roleOnlyGuard('admin');
    $pageData = array(
      'title' => 'Detail Biro dan Agen Perjalanan',
      'content' => 'admin/DetailBiro',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
      'contentData' => ['id_biro'=> $this->input->get()['id_biro']]
    );
    $this->load->view('Page', $pageData);
  }

  
  
  public function DetailUsaha(){
    $this->SecurityModel->roleOnlyGuard('admin');
    $pageData = array(
      'title' => 'Detail Usaha dan Jasa',
      'content' => 'admin/DetailUsaha',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
      'contentData' => ['id_usaha'=> $this->input->get()['id_usaha']]
    );
    $this->load->view('Page', $pageData);
  }

  public function DetailSaranaprasarana(){
    $this->SecurityModel->roleOnlyGuard('admin');
    $pageData = array(
      'title' => 'Detail Sarana dan Prasarana',
      'content' => 'admin/DetailSaranaprasarana',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
      'contentData' => ['id_saranaprasarana'=> $this->input->get()['id_saranaprasarana']]
    );
    $this->load->view('Page', $pageData);
  }

  public function DetailPenginapan(){
    $this->SecurityModel->roleOnlyGuard('admin');
    $pageData = array(
      'title' => 'Detail Penginapan',
      'content' => 'admin/DetailPenginapan',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
      'contentData' => ['id_penginapan'=> $this->input->get()['id_penginapan']]
    );
    $this->load->view('Page', $pageData);
  }
  
  public function Senibudaya(){
    $this->SecurityModel->roleOnlyGuard('admin');
    $pageData = array(
      'title' => 'Seni dan Budaya',
      'content' => 'admin/senibudaya',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

  public function Pagelaran(){
    $this->SecurityModel->roleOnlyGuard('admin');
    $pageData = array(
      'title' => 'Pagelaran dan Pameran',
      'content' => 'admin/pagelaran',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

  public function Museum(){
    $this->SecurityModel->roleOnlyGuard('admin');
    $pageData = array(
      'title' => 'Museum',
      'content' => 'admin/Museum',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

  public function Saranaprasarana(){
    $this->SecurityModel->roleOnlyGuard('admin');
    $pageData = array(
      'title' => 'Sarana dan Prasarana',
      'content' => 'admin/Saranaprasarana',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

  public function Objek(){
    $this->SecurityModel->roleOnlyGuard('admin');
    $pageData = array(
      'title' => 'Daya Tarik Wisata',
      'content' => 'admin/Objek',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

  public function Pemugaran(){
    $this->SecurityModel->roleOnlyGuard('admin');
    $pageData = array(
      'title' => 'Pemugaran',
      'content' => 'admin/Pemugaran',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

  public function Laporan(){
    $this->SecurityModel->roleOnlyGuard('admin');
    $pageData = array(
      'datapariwisata' => $this->LaporanModel->getFormat(),
      'datakebudayaan' => $this->LaporanModel->getFormat2(),
      'tahun' => $this->LaporanModel->getTahun(),
      
    );
    $this->load->view('admin/laporan', $pageData);
  }
  public function PdfCagarbudaya(){
    $this->SecurityModel->roleOnlyGuard('admin');
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
    $this->load->view('admin/pdfcagarbudaya', $pageData);
  }
  public function PdfAllCagarbudaya(){
    $this->SecurityModel->roleOnlyGuard('admin');
   
    $data = $this->CagarbudayaModel->getAllCagarbudaya();
    $kabupaten = $this->DetailCagarbudayaModel->getKabupaten($this->session->userdata('id_kabupaten'));
    $pageData = array(
    'data' => $data,
    'kabupaten' => $kabupaten
    );
    $this->load->view('admin/pdfallcagarbudaya', $pageData);
  }

  public function Kalender(){
    $this->SecurityModel->roleOnlyGuard('admin');
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
    $this->SecurityModel->roleOnlyGuard('admin');
    $pageData = array(
      'title' => 'Entry Data',
      'content' => 'admin/LaporanPariwisata',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

  public function test(){
    $this->SecurityModel->roleOnlyGuard('admin');
    $pageData = array(
      'title' => 'test',
      'content' => 'admin/test',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

  public function Penginapan(){
    $this->SecurityModel->roleOnlyGuard('admin');
    $pageData = array(
      'title' => 'Penginapan',
      'content' => 'admin/Penginapan',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

  public function Biro(){
    $this->SecurityModel->roleOnlyGuard('admin');
    $pageData = array(
      'title' => 'Biro Wisata dan Agen',
      'content' => 'admin/biro',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

  public function Usaha(){
    $this->SecurityModel->roleOnlyGuard('admin');
    $pageData = array(
      'title' => 'Usaha dan Jasa',
      'content' => 'admin/usaha',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

}
