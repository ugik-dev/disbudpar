<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PimpinanController extends CI_Controller {

  public function __construct(){
    parent::__construct();

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
    
  public function panduan(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
		$pageData = array(
			'title' => 'Panduan',
      'content' => 'pimpinan/PanduanPage',
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
      $data = $this->PimpinanModel->getAllKabupaten($this->input->get());
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }
  public function Message(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
		$pageData = array(
			'title' => 'Mail Box',
      'content' => 'pimpinan/Message',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
		);
    $this->load->view('Page', $pageData);
  }


  public function Tenagakerja(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
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
    $this->SecurityModel->roleOnlyGuard('pimpinan');
		$pageData = array(
			'title' => 'Kelolah User',
      'content' => 'pimpinan/Kelolahuser',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
		);
    $this->load->view('Page', $pageData);
  }
  public function Desawisata(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
		$pageData = array(
			'title' => 'Desa Wisata',
      'content' => 'pimpinan/Desawisata',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
		);
    $this->load->view('Page', $pageData);
  }
  public function DetailDesawisata(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
    $pageData = array(
      'title' => 'Desa Wisata - '.$this->input->get()['nama_desawisata'],
      'content' => 'pimpinan/DetailDesawisata',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
      'contentData' => ['id_desawisata'=> $this->input->get()['id_desawisata']]
    );
    $this->load->view('Page', $pageData);
  }

  public function Cagarbudaya(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
		$pageData = array(
			'title' => 'Cagar dan Budaya',
      'content' => 'pimpinan/Cagarbudaya',
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

  public function DetailMessage(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
    $pageData = array(
      'title' => 'Mail Box',
      'content' => 'pimpinan/DetailMessage',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
      'contentData' => ['id_message'=> $this->input->get()['id_message']]
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
      'content' => 'pimpinan/Senibudaya',
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
      'content' => 'pimpinan/Pagelaran',
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

  public function ExportPengunjung(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
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
    $this->SecurityModel->roleOnlyGuard('pimpinan');
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
    $this->SecurityModel->roleOnlyGuard('pimpinan');

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
    $this->load->view('admin/Laporan', $pageData);
  }

  public function PdfCagarbudaya(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
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
    $this->load->view('pimpinan/Pdfcagarbudaya', $pageData);
  }
  public function PdfSaranaprasarana(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
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
    $this->load->view('pimpinan/Pdfsaranaprasarana', $pageData);
  }
  public function PdfDesawisata(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
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
    $this->load->view('pimpinan/Pdfdesawisata', $pageData);
  } 
  public function PdfMuseum(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
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
    $this->load->view('pimpinan/Pdfmuseum', $pageData);
  } 
  public function PdfPenginapan(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
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
    $this->load->view('pimpinan/Pdfpenginapan', $pageData);
  }
  public function PdfObjek(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
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
    $this->load->view('pimpinan/Pdfobjek', $pageData);
  }
  
  public function PdfPemugaran(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
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
    $this->load->view('pimpinan/Pdfpemugaran', $pageData);
  }
  public function PdfPagelaran(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
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
    $this->load->view('pimpinan/Pdfpagelaran', $pageData);
  }
  public function PdfSenibudaya(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
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
    $this->load->view('pimpinan/Pdfsenibudaya', $pageData);
  }
  public function PdfBiro(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
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
    $this->load->view('pimpinan/Pdfbiro', $pageData);
  }
  public function PdfAllCagarbudaya(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
   
    $data = $this->CagarbudayaModel->getAllCagarbudaya();
    $pageData = array(
    'data' => $data,
    );
    $this->load->view('pimpinan/Pdfallcagarbudaya', $pageData);
  }
  public function PdfAllMuseum(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
   
    $data = $this->MuseumModel->getAllMuseum();
    $pageData = array(
    'data' => $data,
    );
    $this->load->view('pimpinan/Pdfallmuseum', $pageData);
  }
  public function PdfAllBiro(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
   
    $data = $this->BiroModel->getAllBiro();
    $pageData = array(
    'data' => $data,
    );
    $this->load->view('pimpinan/Pdfallbiro', $pageData);
  }
  public function PdfAllUsaha(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
   
    $data = $this->UsahaModel->getAllUsaha();
    $pageData = array(
    'data' => $data,
    );
    $this->load->view('pimpinan/Pdfallusaha', $pageData);
  }
  
  public function PdfAllPemugaran(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
   
    $data = $this->PemugaranModel->getAllPemugaran();
    $pageData = array(
    'data' => $data,
    );
    $this->load->view('pimpinan/Pdfallpemugaran', $pageData);
  }
  public function PdfAllPagelaran(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
   
    $data = $this->PagelaranModel->getAllPagelaran();
    $pageData = array(
    'data' => $data,
    );
    $this->load->view('pimpinan/Pdfallpagelaran', $pageData);
  }
  public function PdfAllSaranaprasarana(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
   
    $data = $this->SaranaprasaranaModel->getAllSaranaprasarana();
    $pageData = array(
    'data' => $data,
    );
    $this->load->view('pimpinan/Pdfallsaranaprasarana', $pageData);
  }

  public function PdfAllSenibudaya(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
   
    $data = $this->SenibudayaModel->getAllSenibudaya();
    $pageData = array(
    'data' => $data,
    );
    $this->load->view('pimpinan/Pdfallsenibudaya', $pageData);
  }

  public function PdfAllDesawisata(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
   
    $data = $this->DesawisataModel->getAllDesawisata();
    $pageData = array(
    'data' => $data, 
    );
    $this->load->view('pimpinan/Pdfalldesawisata', $pageData);
  }
  
  public function PdfAllObjek(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
   
    $data = $this->ObjekModel->getAllObjek();
    $pageData = array(
    'data' => $data,
  
    );
    $this->load->view('pimpinan/Pdfallobjek', $pageData);
  }
  public function PdfAllPenginapan(){
    $this->SecurityModel->roleOnlyGuard('pimpinan');
   
    $data = $this->PenginapanModel->getAllPenginapan();
    $pageData = array(
    'data' => $data,
  
    );
    $this->load->view('pimpinan/Pdfallpenginapan', $pageData);
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
      'content' => 'pimpinan/Biro',
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
      'content' => 'pimpinan/Usaha',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

}
