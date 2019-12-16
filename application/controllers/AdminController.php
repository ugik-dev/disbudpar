<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model(array('AdminModel'));
    $this->load->model(array('DesawisataModel'));
    $this->load->model(array('DetailDesawisataModel'));
    $this->load->model(array('ObjekModel'));
    $this->load->model(array('DetailObjekModel'));
    $this->load->model(array('PenginapanModel'));
    $this->load->model(array('DetailPenginapanModel'));
    $this->load->model(array('SenibudayaModel'));
    $this->load->model(array('DetailSenibudayaModel'));
    $this->load->model(array('PagelaranModel'));
    $this->load->model(array('DetailPagelaranModel'));
    $this->load->model(array('SaranaprasaranaModel'));
    $this->load->model(array('DetailSaranaprasaranaModel'));
    $this->load->model(array('CagarbudayaModel'));
    $this->load->model(array('DetailCagarbudayaModel'));
    $this->load->model(array('PemugaranModel'));
    $this->load->model(array('DetailPemugaranModel'));
    $this->load->model(array('MuseumModel'));
    $this->load->model(array('DetailMuseumModel'));
    $this->load->model(array('BiroModel'));
    $this->load->model(array('DetailBiroModel'));
    $this->load->model(array('UsahaModel'));
    $this->load->model(array('DetailUsahaModel'));
    $this->load->model(array('LaporanModel'));
    $this->load->model(array('PengunjungModel'));
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

  public function ExportPengunjung(){
    $this->SecurityModel->roleOnlyGuard('admin');
    $getdata = $this->input->get();
  


    if($getdata['tb']=='objek'){
    $filter['id_objek']=$getdata['id_data'];
    $data_profil=$this->DetailObjekModel->getProfil($filter);
    $header_pdf = 'Daya Tarik Wisata';
    }else if($getdata['tb']=='penginapan'){
      $filter['id_penginapan']=$getdata['id_data'];
      $data_profil=$this->DetailPenginapanModel->getProfil($filter);
      $header_pdf = 'Penginapan';
    }else if($getdata['tb']=='cagarbudaya'){
      $filter['id_cagarbudaya']=$getdata['id_data'];
      $data_profil=$this->DetailCagarbudayaModel->getProfil($filter);
      $header_pdf = 'Cagar dan Budaya';
    }else if($getdata['tb']=='museum'){
      $filter['id_museum']=$getdata['id_data'];
      $data_profil=$this->DetailMuseumModel->getProfil($filter);
      $header_pdf = 'Museum';
    }else if($getdata['tb']=='desawisata'){
      $filter['id_desawisata']=$getdata['id_data'];
      $data_profil=$this->DetailDesawisataModel->getProfil($filter);
      $header_pdf = 'Desa Wisata';
    }else if($getdata['tb']=='biro'){
      $filter['id_biro']=$getdata['id_data'];
      $data_profil=$this->DetailBiroModel->getProfil($filter);
      $header_pdf = 'Biro dan Agen Wisata';
    }else if($getdata['tb']=='usaha'){
      $filter['id_usaha']=$getdata['id_data'];
      $data_profil=$this->DetailUsahaModel->getProfil($filter);
      $header_pdf = 'Usaha dan Jasa';
    };
    
    $filter['id_user']=$data_profil['id_user_entry'];
    $entry=$this->DetailCagarbudayaModel->getUser($filter);
    //var_dump($approv);
    if($data_profil['id_user_approv']=='0'){ 
      $approv['nama'] = 'Data Belum Approv';
    }else{
      $filter['id_user']=$data_profil['id_user_approv'];
      $approv=$this->DetailCagarbudayaModel->getUser($filter);
    };
   

    $pageData = array(
      'getdata' => $getdata,
       'data' => $this->PengunjungModel->getPengunjung($getdata),
       'data_profil' => $data_profil,
       'header' => $header_pdf,
      'nama_approv' => $approv['nama'],
      'nama_entry' => $entry['nama'],
      'tahun' => $getdata['tahun']
     );
    $this->load->view('PdfPengunjung', $pageData);
  }

  public function LaporanPariwisata(){
    $this->SecurityModel->roleOnlyGuard('admin');
    $tahun=$this->LaporanModel->getTahun();

    //var_dump($tahun);
    $vp;
    $vb;
    $i=0;
    foreach($tahun as $th){
      $vp[$th['tahun']]=$this->LaporanModel->p1($th['tahun']);
      $vb[$th['tahun']]=$this->LaporanModel->p2($th['tahun']);
      $i++;
    };
    $pageData = array(
      'datapariwisata' => $this->LaporanModel->getFormat(),
      'datakebudayaan' => $this->LaporanModel->getFormat2(),
      'tahun' => $this->LaporanModel->getTahun(),
      'vp' => $vp,
      'vb' => $vb,
      'title' => 'Laporan',
      'content' => 'admin/LaporanPariwisata',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

  public function Laporan(){
    $this->SecurityModel->roleOnlyGuard('admin');

    $tahun=$this->LaporanModel->getTahun();

    //var_dump($tahun);
    $vp;
    $vb;
    $i=0;
    foreach($tahun as $th){
      $vp[$th['tahun']]=$this->LaporanModel->p1($th['tahun']);
      $vb[$th['tahun']]=$this->LaporanModel->p2($th['tahun']);
      $i++;
    };
    $pageData = array(
      'datapariwisata' => $this->LaporanModel->getFormat(),
      'datakebudayaan' => $this->LaporanModel->getFormat2(),
      'tahun' => $this->LaporanModel->getTahun(),
      'vp' => $vp,
      'vb' => $vb,
      
    );
    //var_dump($vb);
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
  public function PdfSaranaprasarana(){
    $this->SecurityModel->roleOnlyGuard('admin');
    $id = $this->input->get();
    $dataProfil = $this->DetailSaranaprasaranaModel->getProfil($id);
 
    $tmp['id_user'] = $dataProfil['id_user_approv'];
    $approv = $this->DetailDesawisataModel->getUser($tmp);
    $tmp['id_user'] = $dataProfil['id_user_entry'];
    $entry = $this->DetailDesawisataModel->getUser($tmp);
    $pageData = array(
    'dataProfil' => $dataProfil,
    'approv' => $approv['nama'],
    'entry' => $entry['nama'],
    );
    $this->load->view('admin/pdfsaranaprasarana', $pageData);
  }
  public function PdfDesawisata(){
    $this->SecurityModel->roleOnlyGuard('admin');
    $id = $this->input->get();
    $dataProfil = $this->DetailDesawisataModel->getProfil($id);
    $tmp['id_user'] = $dataProfil['id_user_approv'];
    $approv = $this->DetailDesawisataModel->getUser($tmp);
    $tmp['id_user'] = $dataProfil['id_user_entry'];
    $entry = $this->DetailDesawisataModel->getUser($tmp);
   
    $pageData = array(
    'dataProfil' => $dataProfil,
    'approv' => $approv['nama'],
    'entry' => $entry['nama'],
    );
    $this->load->view('admin/pdfdesawisata', $pageData);
  } 
  public function PdfMuseum(){
    $this->SecurityModel->roleOnlyGuard('admin');
    $id = $this->input->get();
    $dataProfil = $this->DetailMuseumModel->getProfil($id);
    $tmp['id_user'] = $dataProfil['id_user_approv'];
    $approv = $this->DetailDesawisataModel->getUser($tmp);
    $tmp['id_user'] = $dataProfil['id_user_entry'];
    $entry = $this->DetailDesawisataModel->getUser($tmp);
   
    $pageData = array(
    'dataProfil' => $dataProfil,
    'approv' => $approv['nama'],
    'entry' => $entry['nama'],
    );
    $this->load->view('admin/pdfmuseum', $pageData);
  } 
  public function PdfPenginapan(){
    $this->SecurityModel->roleOnlyGuard('admin');
    $id = $this->input->get();
    $dataProfil = $this->DetailPenginapanModel->getProfil($id);
    $tmp['id_user'] = $dataProfil['id_user_approv'];
    $approv = $this->DetailDesawisataModel->getUser($tmp);
    $tmp['id_user'] = $dataProfil['id_user_entry'];
    $entry = $this->DetailDesawisataModel->getUser($tmp);
   
    $pageData = array(
    'dataProfil' => $dataProfil,
    'approv' => $approv['nama'],
    'entry' => $entry['nama'],
    );
    $this->load->view('admin/pdfpenginapan', $pageData);
  }
  public function PdfObjek(){
    $this->SecurityModel->roleOnlyGuard('admin');
    $id = $this->input->get();
    $dataProfil = $this->DetailObjekModel->getProfil($id);
    $tmp['id_user'] = $dataProfil['id_user_approv'];
    $approv = $this->DetailDesawisataModel->getUser($tmp);
    $tmp['id_user'] = $dataProfil['id_user_entry'];
    $entry = $this->DetailDesawisataModel->getUser($tmp);
   
    $pageData = array(
    'dataProfil' => $dataProfil,
    'approv' => $approv['nama'],
    'entry' => $entry['nama'],
    );
    $this->load->view('admin/pdfobjek', $pageData);
  }
  
  public function PdfPemugaran(){
    $this->SecurityModel->roleOnlyGuard('admin');
    $id = $this->input->get();
    $dataProfil = $this->DetailPemugaranModel->getProfil($id);
    $tmp['id_user'] = $dataProfil['id_user_approv'];
    $approv = $this->DetailDesawisataModel->getUser($tmp);
    $tmp['id_user'] = $dataProfil['id_user_entry'];
    $entry = $this->DetailDesawisataModel->getUser($tmp);
   
    $pageData = array(
    'dataProfil' => $dataProfil,
    'approv' => $approv['nama'],
    'entry' => $entry['nama'],
    );
    $this->load->view('admin/pdfpemugaran', $pageData);
  }
  public function PdfPagelaran(){
    $this->SecurityModel->roleOnlyGuard('admin');
    $id = $this->input->get();
    $dataProfil = $this->DetailPagelaranModel->getProfil($id);
    $tmp['id_user'] = $dataProfil['id_user_approv'];
    $approv = $this->DetailDesawisataModel->getUser($tmp);
    $tmp['id_user'] = $dataProfil['id_user_entry'];
    $entry = $this->DetailDesawisataModel->getUser($tmp);
   
    $pageData = array(
    'dataProfil' => $dataProfil,
    'approv' => $approv['nama'],
    'entry' => $entry['nama'],
    );
    $this->load->view('admin/pdfpagelaran', $pageData);
  }
  public function PdfSenibudaya(){
    $this->SecurityModel->roleOnlyGuard('admin');
    $id = $this->input->get();
    $dataProfil = $this->DetailSenibudayaModel->getProfil($id);
    $tmp['id_user'] = $dataProfil['id_user_approv'];
    $approv = $this->DetailDesawisataModel->getUser($tmp);
    $tmp['id_user'] = $dataProfil['id_user_entry'];
    $entry = $this->DetailDesawisataModel->getUser($tmp);
   
    $pageData = array(
    'dataProfil' => $dataProfil,
    'approv' => $approv['nama'],
    'entry' => $entry['nama'],
    );
    $this->load->view('admin/pdfsenibudaya', $pageData);
  }
  public function PdfBiro(){
    $this->SecurityModel->roleOnlyGuard('admin');
    $id = $this->input->get();
    $dataProfil = $this->DetailBiroModel->getProfil($id);
    $tmp['id_user'] = $dataProfil['id_user_approv'];
    $approv = $this->DetailDesawisataModel->getUser($tmp);
    $tmp['id_user'] = $dataProfil['id_user_entry'];
    $entry = $this->DetailDesawisataModel->getUser($tmp);
   
    $pageData = array(
    'dataProfil' => $dataProfil,
    'approv' => $approv['nama'],
    'entry' => $entry['nama'],
    );
    $this->load->view('admin/pdfbiro', $pageData);
  }
  public function PdfAllCagarbudaya(){
    $this->SecurityModel->roleOnlyGuard('admin');
   
    $data = $this->CagarbudayaModel->getAllCagarbudaya();
    $pageData = array(
    'data' => $data,
    );
    $this->load->view('admin/PdfAllCagarbudaya', $pageData);
  }
  public function PdfAllMuseum(){
    $this->SecurityModel->roleOnlyGuard('admin');
   
    $data = $this->MuseumModel->getAllMuseum();
    $pageData = array(
    'data' => $data,
    );
    $this->load->view('admin/PdfAllMuseum', $pageData);
  }
  public function PdfAllBiro(){
    $this->SecurityModel->roleOnlyGuard('admin');
   
    $data = $this->BiroModel->getAllBiro();
    $pageData = array(
    'data' => $data,
    );
    $this->load->view('admin/PdfAllBiro', $pageData);
  }
  public function PdfAllUsaha(){
    $this->SecurityModel->roleOnlyGuard('admin');
   
    $data = $this->UsahaModel->getAllUsaha();
    $pageData = array(
    'data' => $data,
    );
    $this->load->view('admin/PdfAllUsaha', $pageData);
  }
  
  public function PdfAllPemugaran(){
    $this->SecurityModel->roleOnlyGuard('admin');
   
    $data = $this->PemugaranModel->getAllPemugaran();
    $pageData = array(
    'data' => $data,
    );
    $this->load->view('admin/PdfAllpemugaran', $pageData);
  }
  public function PdfAllPagelaran(){
    $this->SecurityModel->roleOnlyGuard('admin');
   
    $data = $this->PagelaranModel->getAllPagelaran();
    $pageData = array(
    'data' => $data,
    );
    $this->load->view('admin/pdfallpagelaran', $pageData);
  }
  public function PdfAllSaranaprasarana(){
    $this->SecurityModel->roleOnlyGuard('admin');
   
    $data = $this->SaranaprasaranaModel->getAllSaranaprasarana();
    $pageData = array(
    'data' => $data,
    );
    $this->load->view('admin/pdfallsaranaprasarana', $pageData);
  }

  public function PdfAllSenibudaya(){
    $this->SecurityModel->roleOnlyGuard('admin');
   
    $data = $this->SenibudayaModel->getAllSenibudaya();
    $pageData = array(
    'data' => $data,
    );
    $this->load->view('admin/pdfallsenibudaya', $pageData);
  }

  public function PdfAllDesawisata(){
    $this->SecurityModel->roleOnlyGuard('admin');
   
    $data = $this->DesawisataModel->getAllDesawisata();
    $pageData = array(
    'data' => $data, 
    );
    $this->load->view('admin/pdfalldesawisata', $pageData);
  }
  
  public function PdfAllObjek(){
    $this->SecurityModel->roleOnlyGuard('admin');
   
    $data = $this->ObjekModel->getAllObjek();
    $pageData = array(
    'data' => $data,
  
    );
    $this->load->view('admin/pdfallobjek', $pageData);
  }
  public function PdfAllPenginapan(){
    $this->SecurityModel->roleOnlyGuard('admin');
   
    $data = $this->PenginapanModel->getAllPenginapan();
    $pageData = array(
    'data' => $data,
  
    );
    $this->load->view('admin/pdfallpenginapan', $pageData);
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
