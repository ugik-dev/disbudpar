
<div class="wrapper wrapper-content animated fadeInRight" id="periodeContainer">
<div class="row">
                    <div class="col-lg-3">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <div class="ibox-tools">
                                    <span class="label label-success float-right">Tahun Terakhir</span>
                                </div>
                                <h5>Pajak</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins" id="allpajak"></h1>
                                <div class="stat-percent font-bold text-success">100% <i class="fa fa-bolt"></i></div>
                                <small>Total Pajak</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <div class="ibox-tools">
                                    <span class="label label-info float-right">Tahun Terakhir</span>
                                </div>
                                <h5>Retribusi</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins" id="allretribusi"></h1>
                                <div class="stat-percent font-bold text-info">100% <i class="fa fa-level-up"></i></div>
                                <small>Total Retribusi</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <div class="ibox-tools">
                                    <span class="label label-primary float-right">Tahun Terakhir</span>
                                </div>
                                <h5>Visit Domestik</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins" id="alldomestik"></h1>
                                <div class="stat-percent font-bold text-navy">100% <i class="fa fa-level-up"></i></div>
                                <small>New visits</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <div class="ibox-tools">
                                    <span class="label label-danger float-right"> Tahun Terakhir</span>
                                </div>
                                <h5>Visit Mancanegara</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins" id="allmancanegara"></h1>
                                <div class="stat-percent font-bold text-danger">100% <i class="fa fa-level-down"></i></div>
                                <small>New Visit</small>
                            </div>
                        </div>
            </div>
        </div>
  <div class="row">
    <div class="col-lg-9">
      <div class="ibox">
        <div class="ibox-content">
          <div id="map" style='height: 450px;'></div>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="ibox">
        <div class="ibox-content" id="asset_modal">
          <div class="form-group" >
              <label for="showinmap">Assets </label>
              <div class="btn-group-vertical" id="asset">            
                <form class="form" id="asset_form" onsubmit="return false;">
                <button style="width: 95%" type="submit" class="btn btn-primary  my-1 mr-sm-2" id="asset_all"  data-loading-text="Loading..." onclick="this.form.target='assetall'">Semua</button>
                <img src="<?= base_url('assets') ?>/img/blue-dot.png" style="width: 10%"><button style="width: 85%" type="submit" class="btn btn-primary  my-1 mr-sm-2" id="asset_cagarbudaya"  data-loading-text="Loading..." onclick="this.form.target='assetcagarbudaya'">Cagar Budaya</button>
                <img src="<?= base_url('assets') ?>/img/red-dot.png" style="width: 10%"><button style="width: 85%" type="submit" class="btn btn-primary  my-1 mr-sm-2" id="asset_museum"  data-loading-text="Loading..." onclick="this.form.target='assetmuseum'">Museum</button>
                <img src="<?= base_url('assets') ?>/img/yellow-dot.png" style="width: 10%"><button style="width: 85%" type="submit" class="btn btn-primary  my-1 mr-sm-2" id="asset_objek"  data-loading-text="Loading..." onclick="this.form.target='assetobjek'">Daya Tarik Wisata</button>
                <img src="<?= base_url('assets') ?>/img/green-dot.png" style="width: 10%"><button style="width: 85%" type="submit" class="btn btn-primary  my-1 mr-sm-2" id="asset_penginapan"  data-loading-text="Loading..." onclick="this.form.target='assetpenginapan'">Penginapan</button>  
                <img src="<?= base_url('assets') ?>/img/orange-dot.png" style="width: 10%"><button style="width: 85%" type="submit" class="btn btn-primary  my-1 mr-sm-2" id="asset_usaha"  data-loading-text="Loading..." onclick="this.form.target='assetusaha'">Usaha</button>
                <img src="<?= base_url('assets') ?>/img/pink-dot.png" style="width: 10%"><button style="width: 85%" type="submit" class="btn btn-primary  my-1 mr-sm-2" id="asset_biro"  data-loading-text="Loading..." onclick="this.form.target='assetbiro'">Biro dan Agen Wisata</button>
                <img src="<?= base_url('assets') ?>/img/pink-dot.png" style="width: 10%"><button style="width: 85%" type="submit" class="btn btn-primary  my-1 mr-sm-2" id="asset_saranaprasarana"  data-loading-text="Loading..." onclick="this.form.target='assetsaranaprasarana'"> Sarana dan Prasarana</button>
                <img src="<?= base_url('assets') ?>/img/purple-dot.png" style="width: 10%"><button style="width: 85%" type="submit" class="btn btn-primary  my-1 mr-sm-2" id="asset_senibudaya"  data-loading-text="Loading..." onclick="this.form.target='assetsenibudaya'">Seni Budaya</button>
                <img src="<?= base_url('assets') ?>/img/purple-dot.png" style="width: 10%"><button style="width: 85%" type="submit" class="btn btn-primary  my-1 mr-sm-2" id="asset_pagelaran"  data-loading-text="Loading..." onclick="this.form.target='assetpagelaran'">Pagelaran dan Pameran</button>
    
                </form>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- </div>  -->
   <!-- </div>  -->
<!-- <div class="row">
<div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-content">
                        <div>
                                        <span class="float-right text-right">
                                        <small>Average value of sales in the past month in: <strong>United states</strong></small>
                                            <br>
                                            All sales: 162,862
                                        </span>
                            <h3 class="font-bold no-margins">
                                Half-year revenue margin
                            </h3>
                            <small>Sales marketing.</small>
                        </div>

                        <div class="m-t-sm">

                            <div class="row">
                                <div class="col-md-8">
                                    <div><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                        <canvas id="lineChart" height="106" style="display: block; height: 118px; width: 313px;" width="281" class="chartjs-render-monitor"></canvas>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <ul class="stat-list m-t-lg">
                                        <li>
                                            <h2 class="no-margins">2,346</h2>
                                            <small>Total orders in period</small>
                                            <div class="progress progress-mini">
                                                <div class="progress-bar" style="width: 48%;"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <h2 class="no-margins ">4,422</h2>
                                            <small>Orders in last month</small>
                                            <div class="progress progress-mini">
                                                <div class="progress-bar" style="width: 60%;"></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                        <div class="m-t-md">
                            <small class="float-right">
                                <i class="fa fa-clock-o"> </i>
                                Update on 16.07.2015
                            </small>
                            <small>
                                <strong>Analysis of sales:</strong> The value has been changed over time, and last month reached a level over $50,000.
                            </small>
                        </div>

                    </div>
                </div>
            </div>


</div> -->
  <!--  -->
  
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox">
        <div class="ibox-content" id="chart2_modal">
          <div class="form-group">
           
        
            <h5>Grafik Kunjungan Antar Kabupaten <span class="tahun_label"></span></h5>
            <div id="chart2"></div>
            <div>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="row">#</th>
                    <th scope="col">Pangkalpinang</th>
                    <th scope="col">Bangka</th>
                    <th scope="col">Bangka Selatan</th>
                    <th scope="col">Bangka Tengah</th>
                    <th scope="col">Bangka Barat</th>
                    <th scope="col">Belitung</th>
                    <th scope="col">Belitung Timur</th>
                  </tr>
                </thead>
                <tbody id="table_statistiknew">
                  
                </tbody>
              </table>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <div class='row'>
      <div class="col-lg-12">
          <div class="ibox" style='width: 100%;'>
            <div class="ibox-content" id="chart1_modal" >
              <h5>Statistik Pengunjung<span class="tahun_label"></span></h5>
              <div class='row'>
                <div class="form_group">
                    <div class="container"/> 
                    <select class="dropdown-item" id="tahun" name="tahun" required="required"></select>
                  </div>
                </div>
           
                <div class="col-lg-12">  
                  <div id="chart1" style='height: 350px;'></div>
                </div>
                <div class="col-lg-12">            
                  <div class="form-group" >
                
                  <form class="form-inline" id="form_wilayah" onsubmit="return false;">
                  <button type="submit" style="width: 8%" class="btn btn-outline-primary active my-1 mr-sm-2" id="wil_all"  onclick="this.form.target='wilall'">Semua</button>
                  <button type="submit" style="width: 12%" class="btn btn-outline-primary my-1 mr-sm-2" id="wil_pkp"   onclick="this.form.target='wilpkp'">Pangkalpinang</button>
                  <button type="submit" style="width: 12%" class="btn btn-outline-primary my-1 mr-sm-2" id="wil_bangka"   onclick="this.form.target='wilbangka'">Bangka</button>  
                  <button type="submit" style="width: 12%" class="btn btn-outline-primary my-1 mr-sm-2" id="wil_bangkaselatan"   onclick="this.form.target='wilbangkaselatan'">Bangka Selatan</button>
                  <button type="submit" style="width: 12%" class="btn btn-outline-primary my-1 mr-sm-2" id="wil_bangkatengah"   onclick="this.form.target='wilbangkatengah'">Bangka Tengah</button>
                  <button type="submit" style="width: 12%" class="btn btn-outline-primary my-1 mr-sm-2" id="wil_bangkabarat"  aria-pressed="true" onclick="this.form.target='wilbangkabarat'">Bangka Barat</button>
                  <button type="submit" style="width: 12%" class="btn btn-outline-primary my-1 mr-sm-2" id="wil_belitung"  aria-pressed="true" onclick="this.form.target='wilbelitung'">Belitung</button>
                  <button type="submit" style="width: 12%" class="btn btn-outline-primary my-1 mr-sm-2" id="wil_belitungtimur"  aria-pressed="true" onclick="this.form.target='wilbelitungtimur'">Belitung Timur</button>
      
                  </form>
                </div>
              </div>
              <div class="col-lg-12">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="row">#</th>
                    <th scope="col">Jan</th>
                    <th scope="col">Feb</th>
                    <th scope="col">Mar</th>
                    <th scope="col">April</th>
                    <th scope="col">Mei</th>
                    <th scope="col">Jun</th>
                    <th scope="col">Jul</th>
                    <th scope="col">Ags</th>
                    <th scope="col">Sep</th>
                    <th scope="col">Okt</th>
                    <th scope="col">Nov</th>
                    <th scope="col">Des</th>
                  </tr>
                </thead>
                <tbody id="tabel_chart1">
                  
                </tbody>
              </table>
            </div>
                </div>
              </div>
            </div>
      </div>    
</div>
 
  <!-- </div> -->


  <!-- dasboard lama -->
  


  <div class="row">
    <!-- <div class="col-lg-6 col-xl-3">
      <div class="ibox">
        <div class="ibox-content" style="height: 300px">
          <h5>Pajak<span class="tahun_label"></span></h5>
          <h2 class="no-margins"><span id=""></span></h2>
          <div class="stat-percent font-bold text-navy">-</div>
          
          <h5>Cagar Budaya<span class="tahun_label"></span></h5>
          <h2 class="no-margins"><span id="pajak_cagarbudaya"></span></h2>
          <div class="stat-percent font-bold text-navy">-</div>
          
		      <h5>Daya Tarik Wisata<span class="tahun_label"></span></h5>
          <h2 class="no-margins"><span id="pajak_objek"></span></h2>
          <div class="stat-percent font-bold text-navy">-</div>
          
          <h5>Penginapan<span class="tahun_label"></span></h5>
          <h2 class="no-margins"><span id="pajak_penginapan"></span></h2>
          <div class="stat-percent font-bold text-navy"></div>
          <h5><span class="tahun_label"></span></h5>
          <h2 class="stat-percent font-bold text-navy"></h2>
          <div class="stat-percent font-bold text-navy">last year</div>
      
          </div>
      </div>
    </div> -->
    <!-- <div class="col-lg-6 col-xl-3">
      <div class="ibox">
        <div class="ibox-content" style="height: 300px">
          <h5>Total Daya Tarik Wisata <span class="tahun_label"></span></h5>
          <h2 class="no-margins"><span id="total_objekwisata"></span></h2>
          <div class="stat-percent font-bold text-navy">-</div>
          <small>-</small>
          <h5>Pengunjung Domestik<span class="tahun_label"></span></h5>
          <h2 class="no-margins"><span id="domestik_objekwisata"></span></h2>
          <div class="stat-percent font-bold text-navy">-</div>
          <small>-</small>
		      <h5>Pengunjung Mancanegara<span class="tahun_label"></span></h5>
          <h2 class="no-margins"><span id="mancanegara_objekwisata"></span></h2>
          <div class="stat-percent font-bold text-navy">-</div>
          <small>-</small>
          <h5>Total Pengunjung<span class="tahun_label"></span></h5>
          <h2 class="no-margins"><span id="totalpengunjung_objekwisata"></span></h2>
          <div class="stat-percent font-bold text-navy">-</div>
          <small>-</small>
          
        </div>
      </div>
    </div> -->
    <div class="col-lg-12 col-xl-12">
      <div class="ibox">
        <!-- <div class="ibox-content" style="height: 300px"> -->
          <div class="ibox-content inspinia-timeline" style="height: 300px">
                    <div id="kalender_pagelaran"></div>
          
          <div><a class="" href='<?=site_url()?>OperatorController/Kalender'><i class='fa fa-share'></i>More Event</a>
          </div>
        </div>
      </div>
    </div>
   
  </div>

  <div class="row">
    <div class="col-lg-4">
      <div class="ibox">
        <div class="ibox-content">
          <h5>Pengunjung Cagar Budaya <span class="tahun_label"></span></h5>
          <div id="struktur_cagarbudaya"></div>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="ibox" >
        <div class="ibox-content" >
          <h5>Aktifitas Pagelaran dan Pameran</h5>
          <div id="struktur_pagelaran" ></div>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
        <div class="ibox">
          <div class="ibox-content">
            <h5>Pengunjung Daya Tarik Wisata</h5>
                <div id="struktur_objekwisata"></div>
           </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="ibox">
          <div class="ibox-content">
            <h5>Pengunjung Penginapan</h5>
                <div id="struktur_penginapan"></div>
           </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="ibox">
          <div class="ibox-content">
            <h5>Jumlah Pegiat Seni Budaya</h5>
                <div id="struktur_senibudaya"></div>
           </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="ibox">
          <div class="ibox-content">
            <h5>Jumlah Biro dan Agen Wisata</h5>
                <div id="struktur_biro"></div>
           </div>
        </div>
    </div>
  </div>

    <!-- <div class="col-lg-12">
      <div class="ibox">
        <div class="ibox-content">
          <h5>Statistik Cagar Budaya 6 Bulan Terakhir</h5>
          <div id="chartcagarbudaya"></div>
          <div class="stat-percent font-bold text-navy"><span id="total_bl_non_pegawai"></span></div>
          <small>Total</small>
        </div>
      </div>
    </div>
    <div class="col-lg-12">
      <div class="ibox">
        <div class="ibox-content">
          <h5>Statistik Daya Tarik Wisata 6 Bulan Terakhir <span class="tahun_label"></span></h5>
          <div id="chartobjekwisata"></div>
        </div>
      </div>
    </div>
    <div class="col-lg-12">
      <div class="ibox">
        <div class="ibox-content">
          <h5>Statistik Penginapan 6 Bulan Terakhir <span class="tahun_label"></span></h5>
          <div id="chartpenginapan"></div>
        </div>
      </div>
    </div> -->
  
  
 <div style="height: 30px;">
  <!--  -->

<style>
  th { font-size: 12px; text-align:center!important}
  td { font-size: 11px;}
</style>

<script>

$(document).ready(function() {
  $('#dashboard').addClass('active');
  $('#formwilayah').prop('hidden', 'true');
  $('#toolbar_form').prop('hidden', 'true');
  $('#chart1').prop('hidden', 'true');

  var wil = "";
    var dataCagarbudaya = {};
    var dataObjek = {};
    var v_cagarbudaya = {};
    var all_cagarbudaya = {};
    var v_objekwisata = {};
    var all_objekwisata = {};
    var v_pagelaran = {};
    var v_senibudaya = {};
    var v_penginapan = {};
    var all_penginapan = {};
    var struktur_anggaran = {};
    var dataChart1cb = {};
    var dataChart1objek = {};
    var dataChart1penginapan = {};
    var dataChart1museum = {};
    var dataChart2cagarbudaya = {};
    var dataChart2objek = {};
    var dataChart2penginapan = {};
    var dataChart2museum = {};

    var MapModal = {
    'form': $('#asset_modal').find('#asset_form'),
    'asset_all': $('#asset_modal').find('#asset_all'),
    'asset_cagarbudaya': $('#asset_modal').find('#asset_cagarbudaya'),
    'asset_museum': $('#asset_modal').find('#asset_museum'),
    'asset_objek': $('#asset_modal').find('#asset_objek'),
    'asset_penginapan': $('#asset_modal').find('#asset_penginapan'),
    'asset_usaha': $('#asset_modal').find('#asset_usaha'),
    'asset_biro': $('#asset_modal').find('#asset_biro'),
    'asset_saranaprasarana': $('#asset_modal').find('#asset_saranaprasarana'),
    'asset_senibudaya': $('#asset_modal').find('#asset_senibudaya'),
    'asset_pagelaran': $('#asset_modal').find('#asset_pagelaran'),
    'status_cagarbudaya': $('#asset_modal'),
    'status_museum': $('#asset_modal'),
    'status_objek': $('#asset_modal'),
    'status_penginapan': $('#asset_modal'),
    'status_usaha': $('#asset_modal'),
    'status_biro': $('#asset_modal'),
    'status_saranaprasarana': $('#asset_modal'),
    'status_senibudaya': $('#asset_modal'),
    'status_pagelaran': $('#asset_modal'),
    }

    MapModal.status_cagarbudaya ='active';
    MapModal.status_museum ='active';
    MapModal.status_objek ='active';
    MapModal.status_penginapan ='active';
    MapModal.status_usaha ='active';
    MapModal.status_biro ='active';
    MapModal.status_saranaprasarana ='active';
    MapModal.status_senibudaya ='active';
    MapModal.status_pagelaran ='active';
    

     var Chart1Modal = {
    'statuspenginapan': $('#chart1_modal').find('#statuspenginapan'),
    'statusobjek': $('#chart1_modal').find('#statusobjek'),
    'statusmuseum': $('#chart1_modal').find('#statusmuseum'),
    'statuscb': $('#chart1_modal').find('#statuscb'),
    'tahun': $('#chart1_modal').find('#tahun'),
    }
    var Chart2Modal = {
    'statuspenginapan': $('#chart2_modal').find('#statuspenginapan'),
    'statusobjek': $('#chart2_modal').find('#statusobjek'),
    'statusmuseum': $('#chart2_modal').find('#statusmuseum'),
    'statuscb': $('#chart2_modal').find('#statuscb'),
    'tahun2': $('#chart2_modal').find('#tahun2'),
    }
    
    $("#tahun").click(function(e) {
      registerChart1TahunSelectionChange();
      // console.log("fungsi clik tahun aktif")

    });
    $("#tahun2").click(function(e) {
      registerChart2TahunSelectionChange();
      // console.log("fungsi clik tahun aktif")

    });

var map;
  initMap();
  function initMap() {
    -2.571937, 106.810016
    var myLatLng = {lat: -2.271937, lng: 106.810016};
    var tmp3 = {};
      map = new google.maps.Map(document.getElementById('map'), {
      zoom: 8.2,
      center: myLatLng
    });
    // console.log('map init cagarbudaya = ',MapModal.status_cagarbudaya) 
    if(MapModal.status_cagarbudaya == 'active'){ getLocAllCagarbudaya(); }
    if(MapModal.status_museum == 'active'){ getLocAllMuseum()};
    if(MapModal.status_objek =='active'){ getLocAllObjek()};
    if(MapModal.status_penginapan =='active'){ getLocAllPenginapan()};
    if(MapModal.status_usaha =='active'){ getLocAllUsaha()};
    if(MapModal.status_biro =='active'){ getLocAllBiro()};
    if(MapModal.status_saranaprasarana =='active'){ getLocAllSaranaprasarana()};
    if(MapModal.status_senibudaya =='active'){ getLocAllSenibudaya()};
    if(MapModal.status_pagelaran =='active'){ getLocAllPagelaran()};
    
  }
    function initMap2(dataMAP,color){
      dataMAP.forEach((d) => {
                var tmp = d['lokasi'];
                var tmp1  = tmp.split(",");
                //var_dump(tmp[0]);
              var myLatlng2 = new google.maps.LatLng(tmp1[0],tmp1[1]);
              addMarker(map,myLatlng2,d['nama'],color);
          });
    }

    function addMarker(map,loc,name,color){
      
      let url = "http://maps.google.com/mapfiles/ms/icons/";
      url += color + "-dot.png";
      var marker = new google.maps.Marker({
      position: loc,
      title: name,
      map: map,
      icon: {
      url: url
    }
    });
  }


    function getLocAllCagarbudaya(){
    $.ajax({
              url: `<?=site_url('DashboardController/getLocCagarbudaya')?>`, 'type': 'GET',
              data: {},
              success: function (data){
                var json = JSON.parse(data);
                if(json['error']){
                  swal("Simpan Gagal", json['message'], "error");
                  return;
                }
                dataCagarbudaya = json['data'];
                initMap2(dataCagarbudaya,"blue");
              },
             error: function(e) {}
      });    
    } 

    function getLocAllMuseum(){
    $.ajax({
              url: `<?=site_url('DashboardController/getLocMuseum')?>`, 'type': 'GET',
              data: {},
              success: function (data){
                var json = JSON.parse(data);
                if(json['error']){
                  swal("Simpan Gagal", json['message'], "error");
                  return;
                }
                dataMuseum = json['data'];
                initMap2(dataMuseum,"red");
              },
             error: function(e) {}
      });    
    }

    function getLocAllPenginapan(){
    $.ajax({
              url: `<?=site_url('DashboardController/getLocPenginapan')?>`, 'type': 'GET',
              data: {},
              success: function (data){
                var json = JSON.parse(data);
                if(json['error']){
                  swal("Simpan Gagal", json['message'], "error");
                  return;
                }
                dataPenginapan = json['data'];
                initMap2(dataPenginapan,"green");
              },
             error: function(e) {}
      });    
    }
    function getLocAllUsaha(){
    $.ajax({
              url: `<?=site_url('DashboardController/getLocUsaha')?>`, 'type': 'GET',
              data: {},
              success: function (data){
                var json = JSON.parse(data);
                if(json['error']){
                  swal("Simpan Gagal", json['message'], "error");
                  return;
                }
                dataMuseum = json['data'];
                initMap2(dataMuseum,"orange");
              },
             error: function(e) {}
      });    
    }  

    function getLocAllBiro(){
    $.ajax({
              url: `<?=site_url('DashboardController/getLocBiro')?>`, 'type': 'GET',
              data: {},
              success: function (data){
                var json = JSON.parse(data);
                if(json['error']){
                  swal("Simpan Gagal", json['message'], "error");
                  return;
                }
                dataMuseum = json['data'];
                initMap2(dataMuseum,"pink");
              },
             error: function(e) {}
      });    
    }    

    function getLocAllSaranaprasarana(){
    $.ajax({
              url: `<?=site_url('DashboardController/getLocSaranaprasarana')?>`, 'type': 'GET',
              data: {},
              success: function (data){
                var json = JSON.parse(data);
                if(json['error']){
                  swal("Simpan Gagal", json['message'], "error");
                  return;
                }
                dataMuseum = json['data'];
                initMap2(dataMuseum,"pink");
              },
             error: function(e) {}
      });    
    }    

    function getLocAllSenibudaya(){
    $.ajax({
              url: `<?=site_url('DashboardController/getLocSenibudaya')?>`, 'type': 'GET',
              data: {},
              success: function (data){
                var json = JSON.parse(data);
                if(json['error']){
                  swal("Simpan Gagal", json['message'], "error");
                  return;
                }
                dataMuseum = json['data'];
                initMap2(dataMuseum,"purple");
              },
             error: function(e) {}
      });    
    } 

    function getLocAllPagelaran(){
    $.ajax({
              url: `<?=site_url('DashboardController/getLocPagelaran')?>`, 'type': 'GET',
              data: {},
              success: function (data){
                var json = JSON.parse(data);
                if(json['error']){
                  swal("Simpan Gagal", json['message'], "error");
                  return;
                }
                dataMuseum = json['data'];
                initMap2(dataMuseum,"purple");
              },
             error: function(e) {}
      });    
    }    

    function getLocAllObjek(){
    $.ajax({
              url: `<?=site_url('DashboardController/getLocObjek')?>`, 'type': 'GET',
              data: {},
              success: function (data){
                var json = JSON.parse(data);
                if(json['error']){
                  swal("Simpan Gagal", json['message'], "error");
                  return;
                }
                dataObjek = json['data'];
                initMap2(dataObjek,"yellow");
              },
             error: function(e) {}
      });    
    }
    // PAJAK document.getElementById('map')
    getAllPajak();
    function getAllPajak(){
    $.ajax({
              url: `<?=site_url('DashboardController/getAllPajak')?>`, 'type': 'GET',
              data: {},
              success: function (data){
                var json = JSON.parse(data);
                if(json['error']){
                  swal("Simpan Gagal", json['message'], "error");
                  return;
                }
                data = json['data'];
                console.log(data);
                document.getElementById('allpajak').innerHTML = 'Rp. '+convertToRupiah(data['pajak']);
                document.getElementById('allretribusi').innerHTML = 'Rp. '+ convertToRupiah(data['retribusi']);
                document.getElementById('alldomestik').innerHTML = data['domestik'];
                document.getElementById('allmancanegara').innerHTML = data['mancanegara'];
               // StatistikPajak(dataPajakPenginapan,"green");
              },
             error: function(e) {}
      });    
    }
   // getPajakCagarbudaya();
    function getPajakCagarbudaya(){
    $.ajax({
              url: `<?=site_url('DashboardController/getPajakCagarbudaya')?>`, 'type': 'GET',
              data: {},
              success: function (data){
                var json = JSON.parse(data);
                if(json['error']){
                  swal("Simpan Gagal", json['message'], "error");
                  return;
                }
                dataPajakCagarbudaya = json['data'];
              //  console.log(dataPajakCagarbudaya);
                document.getElementById('pajak_cagarbudaya').innerHTML = 'Rp. '+convertToRupiah(dataPajakCagarbudaya[0]['pajak']);
               // StatistikPajak(dataPajakPenginapan,"green");
              },
             error: function(e) {}
      });    
    }
   // getPajakPenginapan();
    function getPajakPenginapan(){
    $.ajax({
              url: `<?=site_url('DashboardController/getPajakPenginapan')?>`, 'type': 'GET',
              data: {},
              success: function (data){
                var json = JSON.parse(data);
                if(json['error']){
                  swal("Simpan Gagal", json['message'], "error");
                  return;
                }
                dataPajakPenginapan = json['data'];
                document.getElementById('pajak_penginapan').innerHTML = 'Rp. '+convertToRupiah(dataPajakPenginapan[0]['pajak']);
             
                // StatistikPajak(dataPajakPenginapan,"green");
              },
             error: function(e) {}
      });    
    }
    function getPajakUsaha(){
    $.ajax({
              url: `<?=site_url('DashboardController/getPajakUsaha')?>`, 'type': 'GET',
              dataPajak: {},
              success: function (dataPajak){
                var json = JSON.parse(dataPajak);
                if(json['error']){
                  swal("Simpan Gagal", json['message'], "error");
                  return;
                }
                dataPajakMuseum = json['dataPajak'];
                StatistikPajak(dataPajakMuseum,"orange");
              },
             error: function(e) {}
      });    
    }  

    function getPajakBiro(){
    $.ajax({
              url: `<?=site_url('DashboardController/getPajakBiro')?>`, 'type': 'GET',
              dataPajak: {},
              success: function (dataPajak){
                var json = JSON.parse(dataPajak);
                if(json['error']){
                  swal("Simpan Gagal", json['message'], "error");
                  return;
                }
                dataPajakMuseum = json['dataPajak'];
                StatistikPajak(dataPajakMuseum,"pink");
              },
             error: function(e) {}
      });    
    }    

    function getPajakSaranaprasarana(){
    $.ajax({
              url: `<?=site_url('DashboardController/getPajakSaranaprasarana')?>`, 'type': 'GET',
              dataPajak: {},
              success: function (dataPajak){
                var json = JSON.parse(dataPajak);
                if(json['error']){
                  swal("Simpan Gagal", json['message'], "error");
                  return;
                }
                dataPajakMuseum = json['dataPajak'];
                StatistikPajak(dataPajakMuseum,"pink");
              },
             error: function(e) {}
      });    
    }    

    function getPajakSenibudaya(){
    $.ajax({
              url: `<?=site_url('DashboardController/getPajakSenibudaya')?>`, 'type': 'GET',
              dataPajak: {},
              success: function (dataPajak){
                var json = JSON.parse(dataPajak);
                if(json['error']){
                  swal("Simpan Gagal", json['message'], "error");
                  return;
                }
                dataPajakMuseum = json['dataPajak'];
                StatistikPajak(dataPajakMuseum,"purple");
              },
             error: function(e) {}
      });    
    } 

    function getPajakPagelaran(){
    $.ajax({
              url: `<?=site_url('DashboardController/getPajakPagelaran')?>`, 'type': 'GET',
              dataPajak: {},
              success: function (dataPajak){
                var json = JSON.parse(dataPajak);
                if(json['error']){
                  swal("Simpan Gagal", json['message'], "error");
                  return;
                }
                dataPajakMuseum = json['dataPajak'];
                StatistikPajak(dataPajakMuseum,"purple");
              },
             error: function(e) {}
      });    
    }    
    //getPajakObjek();
    function getPajakObjek(){
    $.ajax({
              url: `<?=site_url('DashboardController/getPajakObjek')?>`, 'type': 'GET',
              data: {},
              success: function (data){
                var json = JSON.parse(data);
                if(json['error']){
                  swal("Simpan Gagal", json['message'], "error");
                  return;
                }
                dataPajakObjek = json['data'];
                document.getElementById('pajak_objek').innerHTML = 'Rp. '+convertToRupiah(dataPajakObjek[0]['pajak']);
             
                //StatistikPajak(dataPajakObjek,"yellow");
              },
             error: function(e) {}
      });    
    }
    // PAJAK
    Chart1Modal.tahun.val('2018');
    getChart1cb();
    function getChart1cb(){
      // console.log('val tahun :',Chart1Modal.tahun.val());
      $('#formwilayah').prop('hidden', false);
      $('#toolbar_form').prop('hidden', false);  
        $('#chart1').prop('hidden', false);   
          $.ajax({
              url: `<?=site_url('DashboardController/getChart1')?>`, 'type': 'GET',
              data: { tahun : Chart1Modal.tahun.val(), wilayah : wil },
              success: function (data){
                var json = JSON.parse(data);
                if(json['error']){
                  swal(json['message'], "error");
                  return;
                }
                dataChart1cb = json['data'];
               
                getChart1objek();
              },
             error: function(e) {}
          }); 
      }
      function getChart1objek(){      
        $.ajax({
              url: `<?=site_url('DashboardController/getChart1objek')?>`, 'type': 'GET',
              data: { tahun : Chart1Modal.tahun.val(), wilayah : wil  },
              success: function (data){
                var json = JSON.parse(data);
                if(json['error']){
                  swal(json['message'], "error");
                  return;
                }
             
                dataChart1objek = json['data'];
                getChart1museum();
               
              },
             error: function(e) {}
          });  
      }
      function getChart1museum(){      
        $.ajax({
              url: `<?=site_url('DashboardController/getChart1museum')?>`, 'type': 'GET',
              data: { tahun : Chart1Modal.tahun.val(), wilayah : wil  },
              success: function (data){
                var json = JSON.parse(data);
                if(json['error']){
                  swal(json['message'], "error");
                  return;
                }
           
                dataChart1museum = json['data'];
                getChart1penginapan();
              },
             error: function(e) {}
          });  
      }
      function getChart1penginapan(){      
        $.ajax({
              url: `<?=site_url('DashboardController/getChart1penginapan')?>`, 'type': 'GET',
              data: { tahun : Chart1Modal.tahun.val(), wilayah : wil  },
              success: function (data){
                var json = JSON.parse(data);
                if(json['error']){
                  swal(json['message'], "error");
                  return;
                }
            
                dataChart1penginapan = json['data'];
                renderStatistikNew('#chart1',dataChart1cb,dataChart1objek,dataChart1museum,dataChart1penginapan,Chart1Modal.statuscb,Chart1Modal.statusobjek,Chart1Modal.statusmuseum,Chart1Modal.statuspenginapan);

              },
             error: function(e) {}
          });  
      }
    //statistik baru
    function renderStatistikNew(bindto,columns,columns2,columns3,columns4,statuscb,statusob,statusmuseum,statusp){
      tmp1='';
      tmp2='';
      tmp3='';
      tmp4='';
      // console.log('rendering..');
      // console.log(columns)
      if(columns==''){ console.log('Data Tidak Tersedia')}
      if(statuscb == 'active'){ 
        if(columns==''){ console.log('Data Tidak Tersedia')}else{
       var  tmp1= ['Cagarbudaya',columns[0]['chart'],columns[1]['chart'],columns[2]['chart'],columns[3]['chart'],columns[4]['chart'],columns[5]['chart'],columns[6]['chart'],columns[7]['chart'],columns[8]['chart'],columns[9]['chart'],columns[10]['chart'],columns[11]['chart']];
        }
       };
       if(statusob=='active'){ 
        if(columns2==''){ console.log('Data Tidak Tersedia')}else{
        var  tmp2= ['Daya Tarik Wisata',columns2[0]['chart'],columns2[1]['chart'],columns2[2]['chart'],columns2[3]['chart'],columns2[4]['chart'],columns2[5]['chart'],columns2[6]['chart'],columns2[7]['chart'],columns2[8]['chart'],columns2[9]['chart'],columns2[10]['chart'],columns2[11]['chart']];
        }
        //  console.log('tmp2= ',tmp2)
       };
       if(statusmuseum=='active'){ 
        if(columns3==''){ console.log('Data Tidak Tersedia')}else{
        var  tmp3= ['Museum',columns3[0]['chart'],columns3[1]['chart'],columns3[2]['chart'],columns3[3]['chart'],columns3[4]['chart'],columns3[5]['chart'],columns3[6]['chart'],columns3[7]['chart'],columns3[8]['chart'],columns3[9]['chart'],columns3[10]['chart'],columns3[11]['chart']];
        }
          // console.log('tmp3= ',tmp3)
       };
       if(statusp=='active'){ 
        if(columns4==''){ console.log('Data Tidak Tersedia')}else{
        var  tmp4= ['Penginapan',columns4[0]['chart'],columns4[1]['chart'],columns4[2]['chart'],columns4[3]['chart'],columns4[4]['chart'],columns4[5]['chart'],columns4[6]['chart'],columns4[7]['chart'],columns4[8]['chart'],columns4[9]['chart'],columns4[10]['chart'],columns4[11]['chart']];
        }
       };

       var tmpfix = [tmp1,tmp2,tmp3,tmp4];
      console.log(tmpfix);
       renderTableStatistikNew(tmpfix);

      return c3.generate({
        bindto: bindto,   
    data: {
        columns:tmpfix
    },
    axis: {
        x: {
            type: 'category',
            categories: ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'  ]
           }
          } 
      }); 
    }
    function renderTableStatistikNew(dataTable){
        tableHTML = "";
        
        
        dataTable.forEach((d) => {
          tableHTML +=`<tr>`;
          for(i=0;i<=12;i++)tableHTML +=`<td>${d[i]}</td>`;   
          tableHTML +=`</tr>`;
        
        });
        


        var table = document.getElementById('tabel_chart1') 
        table.innerHTML = tableHTML;
      }
    getChart2Cagarbudaya();
     function getChart2Cagarbudaya(){   
          $.ajax({
              url: `<?=site_url('DashboardController/getChart2Cagarbudaya')?>`, 'type': 'GET',
              data: { tahun : Chart2Modal.tahun2.val() },
              success: function (data){
                var json = JSON.parse(data);
                if(json['error']){
                  swal(json['message'], "error");
                  return;
                }
                dataChart2cagarbudaya = json['data'];
               
                getChart2Objek();
              },
             error: function(e) {}
          }); 
      }
      function getChart2Objek(){      
        $.ajax({
              url: `<?=site_url('DashboardController/getChart2Objek')?>`, 'type': 'GET',
              data: { tahun : Chart2Modal.tahun2.val()  },
              success: function (data){
                var json = JSON.parse(data);
                if(json['error']){
                  swal(json['message'], "error");
                  return;
                }
               
                dataChart2objek = json['data'];
                getChart2Museum();
                //renderStatistikNew('#chart1',dataChart1cb,dataChart1objek,Chart1Modal.statuscb,Chart1Modal.statussb,Chart1Modal.statusobjek,Chart1Modal.statuspenginapan);

              },
             error: function(e) {}
          });  
      }
      function getChart2Museum(){      
        $.ajax({
              url: `<?=site_url('DashboardController/getChart2museum')?>`, 'type': 'GET',
              data: { tahun : Chart2Modal.tahun2.val()  },
              success: function (data){
                var json = JSON.parse(data);
                if(json['error']){
                  swal(json['message'], "error");
                  return;
                }
               
                dataChart2museum = json['data'];
                getChart2Penginapan();
              },
             error: function(e) {}
          });  
      }
      function getChart2Penginapan(){      
        $.ajax({
              url: `<?=site_url('DashboardController/getChart2Penginapan')?>`, 'type': 'GET',
              data: { tahun : Chart2Modal.tahun2.val()  },
              success: function (data){
                var json = JSON.parse(data);
                if(json['error']){
                  swal(json['message'], "error");
                  return;
                }
               
                dataChart2penginapan = json['data'];
                renderStatistikNew2();
                renderTableStatistikNew2();
              },
             error: function(e) {}
          });  
      }
    
      function renderTableStatistikNew2(){
        tableHTML = "";
        
        tableHTML +=`<tr> <th scope="row">Cagar Budaya</th> `;
        dataChart2cagarbudaya.forEach((d) => {
        tmp = Number(d['d_p'])+Number(d['d_l']);
        tableHTML +=`<td>${tmp}</td>`;   
        });
        tableHTML +=`</tr>`;

        
        tableHTML +=`<tr> <th scope="row">Daya Tarik Wisata</th> `;
        dataChart2objek.forEach((d) => {
        tmp = Number(d['d_p'])+Number(d['d_l']);
        tableHTML +=`<td>${tmp}</td>`;   
        });
        tableHTML +=`</tr>`;

        tableHTML +=`<tr> <th scope="row">Museum</th> `;
        dataChart2museum.forEach((d) => {
        tmp = Number(d['d_p'])+Number(d['d_l']);
        tableHTML +=`<td>${tmp}</td>`;   
        });
        tableHTML +=`</tr>`;

        tableHTML +=`<tr> <th scope="row">Penginapan</th> `;
        dataChart2penginapan.forEach((d) => {
        tmp = Number(d['d_p'])+Number(d['d_l']);
        tableHTML +=`<td>${tmp}</td>`;   
        });
        tableHTML +=`</tr>`;


        var table = document.getElementById('table_statistiknew') 
        table.innerHTML = tableHTML;
      }
    function renderStatistikNew2(){
     
      return c3.generate({
        bindto: '#chart2',   
        data: {
        x : 'x',
        columns: [
            ['x', 'Pangkalpinang', 'Bangka', 'Bangka Selatan', 'Bangka Tengah','Bangka Barat','Belitung','Belitung Timur'],
            ['P Cagar Budaya', dataChart2cagarbudaya[0]['d_p'], dataChart2cagarbudaya[1]['d_p'], dataChart2cagarbudaya[2]['d_p'],dataChart2cagarbudaya[3]['d_p'], dataChart2cagarbudaya[4]['d_p'],dataChart2cagarbudaya[5]['d_p'],dataChart2cagarbudaya[6]['d_p']],
            ['L Cagar Budaya',dataChart2cagarbudaya[0]['d_l'], dataChart2cagarbudaya[1]['d_l'], dataChart2cagarbudaya[2]['d_l'],dataChart2cagarbudaya[3]['d_l'], dataChart2cagarbudaya[4]['d_l'],dataChart2cagarbudaya[5]['d_l'],dataChart2cagarbudaya[6]['d_l']],
            ['P Daya Tarik Wisata', dataChart2objek[0]['d_p'], dataChart2objek[1]['d_p'], dataChart2objek[2]['d_p'],dataChart2objek[3]['d_p'], dataChart2objek[4]['d_p'],dataChart2objek[5]['d_p'],dataChart2objek[6]['d_p']],
            ['L Daya Tarik Wisata',dataChart2objek[0]['d_l'], dataChart2objek[1]['d_l'], dataChart2objek[2]['d_l'],dataChart2objek[3]['d_l'], dataChart2objek[4]['d_l'],dataChart2objek[5]['d_l'],dataChart2objek[6]['d_l']],
            ['P Museum', dataChart2museum[0]['d_p'], dataChart2museum[1]['d_p'], dataChart2museum[2]['d_p'],dataChart2museum[3]['d_p'], dataChart2museum[4]['d_p'],dataChart2museum[5]['d_p'],dataChart2museum[6]['d_p']],
            ['L Museum', dataChart2museum[0]['d_l'], dataChart2museum[1]['d_l'], dataChart2museum[2]['d_l'],dataChart2museum[3]['d_l'], dataChart2museum[4]['d_l'],dataChart2museum[5]['d_l'],dataChart2museum[6]['d_l']],
            ['P Penginapan',dataChart2penginapan[0]['d_p'], dataChart2penginapan[1]['d_p'], dataChart2penginapan[2]['d_p'],dataChart2penginapan[3]['d_p'], dataChart2penginapan[4]['d_p'],dataChart2penginapan[5]['d_p'],dataChart2penginapan[6]['d_p']],
            ['L Penginapan', dataChart2penginapan[0]['d_l'], dataChart2penginapan[1]['d_l'], dataChart2penginapan[2]['d_l'],dataChart2penginapan[3]['d_l'], dataChart2penginapan[4]['d_l'],dataChart2penginapan[5]['d_l'],dataChart2penginapan[6]['d_l']],
        ],
        groups: [
            ['P Cagar Budaya', 'L Cagar Budaya'],
            ['P Daya Tarik Wisata', 'L Daya Tarik Wisata'],
            ['P Museum', 'L Museum'],
            ['P Penginapan', 'L Penginapan'],
        ],
        type: 'bar',
        colors: {
          'P Cagar Budaya': '#800000',
          'L Cagar Budaya': '#FF0000',
          'P Daya Tarik Wisata': '#FFFF00',
          'L Daya Tarik Wisata': '#FFA500',
          'P Museum': '#800080',
          'L Museum': '#FF00FF',
          'P Penginapan': '#000080',
          'L Penginapan': '#0000FF',
          
        },
           },
    axis: {
        x: {
            type: 'category' // this needed to load string x value
        }
    }
      });
 
    }

  getTahun();  
  function getTahun(){
    return $.ajax({
      url: `<?php echo site_url('DashboardController/getTahun/')?>`, 'type': 'GET',
      data: {},
      success: function (data){
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }
        dataTahuncb = json['data'];
        renderChart1TahunSelection(dataTahuncb);
        renderChart2TahunSelection(dataTahuncb);
        Chart1Modal.statuscb='active';
        Chart1Modal.statusmuseum='active';
        Chart1Modal.statusobjek='active';
        Chart1Modal.statuspenginapan='active';
      //  renderStatistikNew('#chart1',null);
      },
      error: function(e) {}
    });
  }

  function registerChart1TahunSelectionChange(){
    Chart1Modal.tahun.on('change', function(e){
      getChart1cb();
     
      // console.log('regis run thun :',Chart1Modal.tahun.val())
  });    
  }

    function registerChart2TahunSelectionChange(){
    Chart2Modal.tahun2.on('change', function(e){
      getChart2Cagarbudaya();
     
      // console.log('regis run thun :',Chart2Modal.tahun2.val())
  });    
  }

  
  function renderChart1TahunSelection(data){
    Chart1Modal.tahun.empty();
   Chart1Modal.tahun.append($('<option>', { value: "", text: "Tahun"}));
    data.forEach((d) => {
      Chart1Modal.tahun.append($('<option>', {
        value: d['tahun'],
        text: d['tahun'],
      }));  
      Chart1Modal.tahun.val(d['tahun']);
    });
   
   }

     function renderChart2TahunSelection(data){
    Chart2Modal.tahun2.empty();
   Chart2Modal.tahun2.append($('<option>', { value: "", text: "Semua"}));
    data.forEach((d) => {
      Chart2Modal.tahun2.append($('<option>', {
        value: d['tahun'],
        text: d['tahun'],
      }));  
    });
   }    
    var toolbar = {
      'form': $('#toolbar_form'), 
    }
    var toolbarwil = {      
      'form': $('#form_wilayah'),
    }
    var toolbarasset = {      
      'form': $('#form_asset'),
    }

    toolbar.form.submit(function(event){
      event.preventDefault()
      switch(toolbar.form[0].target){
        case 'showcb':
            if(Chart1Modal.statuscb=='active'){
              Chart1Modal.statuscb='disable';
            }else{
              Chart1Modal.statuscb='active';
            }
            //  console.log(Chart1Modal.statuscb)
          break;
        case 'showmuseum':
          if(Chart1Modal.statusmuseum=='active'){
            Chart1Modal.statusmuseum='disable';
            }else{
              Chart1Modal.statusmuseum='active';
            }
            //  console.log(Chart1Modal.statusmuseum)        
          break;
        case 'showobjek':
          if(Chart1Modal.statusobjek=='active'){
              Chart1Modal.statusobjek='disable';
            }else{
              Chart1Modal.statusobjek='active';
            }
        //  console.log('wil = ', wil)  
            // console.log(Chart1Modal.statusobjek)
          break;
        case 'showpenginapan':
          if(Chart1Modal.statuspenginapan=='active'){
              Chart1Modal.statuspenginapan='disable';
            }else{
              Chart1Modal.statuspenginapan='active';
            }
            // console.log(Chart1Modal.statuspenginapan)
          break;
        }
        renderStatistikNew('#chart1',dataChart1cb,dataChart1objek,dataChart1museum,dataChart1penginapan,Chart1Modal.statuscb,Chart1Modal.statusobjek,Chart1Modal.statusmuseum,Chart1Modal.statuspenginapan);

    });
  toolbarwil.form.submit(function(event){
      event.preventDefault()
      switch(toolbarwil.form[0].target){
          case 'wilall':
          wil=""
          break;
          case 'wilpkp':
            wil="1";
          break;
          case 'wilbangka':
          wil="2"
          break;
          case 'wilbangkaselatan':
          wil="3"
          break;
          case 'wilbangkatengah':
          wil="4"
           break;
          case 'wilbangkabarat':
          wil="5"
           break;
          case 'wilbelitung':
          wil="6"
          break;
          case 'wilbelitungtimur':
          wil="7"
          break;
      }
      getChart1cb();

    });

    MapModal.form.submit(function(event){
      event.preventDefault()
      switch(MapModal.form[0].target){
          case 'assetall':
          MapModal.status_cagarbudaya ='active';
          MapModal.status_museum ='active';
          MapModal.status_objek ='active';
          MapModal.status_penginapan ='active';
          MapModal.status_usaha ='active';
          MapModal.status_biro ='active';
          MapModal.status_saranaprasarana ='active';
          MapModal.status_senibudaya ='active';
          MapModal.status_pagelaran ='active';
          MapModal.asset_cagarbudaya.removeClass();
          MapModal.asset_cagarbudaya.addClass('btn btn-primary my-1 mr-sm-2');
          MapModal.asset_museum.removeClass();
          MapModal.asset_museum.addClass('btn btn-primary my-1 mr-sm-2');
          MapModal.asset_objek.removeClass();
          MapModal.asset_objek.addClass('btn btn-primary my-1 mr-sm-2');
          MapModal.asset_penginapan.removeClass();
          MapModal.asset_penginapan.addClass('btn btn-primary my-1 mr-sm-2');
          MapModal.asset_usaha.removeClass();
          MapModal.asset_usaha.addClass('btn btn-primary my-1 mr-sm-2');
          MapModal.asset_biro.removeClass();
          MapModal.asset_biro.addClass('btn btn-primary my-1 mr-sm-2');
          MapModal.asset_saranaprasarana.removeClass();
          MapModal.asset_saranaprasarana.addClass('btn btn-primary my-1 mr-sm-2');
          MapModal.asset_senibudaya.removeClass();
          MapModal.asset_senibudaya.addClass('btn btn-primary my-1 mr-sm-2');
          MapModal.asset_pagelaran.removeClass();
          MapModal.asset_pagelaran.addClass('btn btn-primary my-1 mr-sm-2');
         
          break;
          case 'assetcagarbudaya':
            if(MapModal.status_cagarbudaya=='active'){
              MapModal.status_cagarbudaya='disable';
              MapModal.asset_cagarbudaya.removeClass();
              MapModal.asset_cagarbudaya.addClass('btn btn-secondary my-1 mr-sm-2');
              }else{
                MapModal.status_cagarbudaya='active';
              MapModal.asset_cagarbudaya.removeClass();
              MapModal.asset_cagarbudaya.addClass('btn btn-primary my-1 mr-sm-2');
              }
          break;
          case 'assetmuseum':
            if(MapModal.status_museum=='active'){
              MapModal.status_museum='disable';
              MapModal.asset_museum.removeClass();
              MapModal.asset_museum.addClass('btn btn-secondary my-1 mr-sm-2');
              }else{
              MapModal.asset_museum.removeClass();
              MapModal.asset_museum.addClass('btn btn-primary my-1 mr-sm-2');
              MapModal.status_museum='active';
              }
          break;
          case 'assetobjek':
            if(MapModal.status_objek=='active'){
              MapModal.asset_objek.removeClass();
              MapModal.asset_objek.addClass('btn btn-secondary my-1 mr-sm-2');
              MapModal.status_objek='disable';
              }else{
              MapModal.asset_objek.removeClass();
              MapModal.asset_objek.addClass('btn btn-primary my-1 mr-sm-2');
                MapModal.status_objek='active';
              }
          break;
          case 'assetpenginapan':
          if(MapModal.status_penginapan=='active'){
            MapModal.status_penginapan='disable';
            MapModal.asset_penginapan.removeClass();
            MapModal.asset_penginapan.addClass('btn btn-secondary my-1 mr-sm-2');
            }else{
              MapModal.status_penginapan='active';
              MapModal.asset_penginapan.removeClass();
              MapModal.asset_penginapan.addClass('btn btn-primary my-1 mr-sm-2');
             
            }
           break;
          case 'assetusaha':
          if(MapModal.status_usaha=='active'){
            MapModal.status_usaha='disable';
            MapModal.asset_usaha.removeClass();
            MapModal.asset_usaha.addClass('btn btn-secondary my-1 mr-sm-2');
            }else{
              MapModal.status_usaha='active';
              MapModal.asset_usaha.removeClass();
              MapModal.asset_usaha.addClass('btn btn-primary my-1 mr-sm-2');
            }
           break;
          case 'assetbiro':
          if(MapModal.status_biro=='active'){
            MapModal.status_biro='disable';
            MapModal.asset_biro.removeClass();
            MapModal.asset_biro.addClass('btn btn-secondary my-1 mr-sm-2');
            }else{
              MapModal.status_biro='active';
              MapModal.asset_biro.removeClass();
              MapModal.asset_biro.addClass('btn btn-primary my-1 mr-sm-2');
            }
          break;
          case 'assetsaranaprasarana':
          if(MapModal.status_saranaprasarana=='active'){
            MapModal.status_saranaprasarana='disable';
            MapModal.asset_saranaprasarana.removeClass();
            MapModal.asset_saranaprasarana.addClass('btn btn-secondary my-1 mr-sm-2');
            }else{
              MapModal.status_saranaprasarana='active';
              MapModal.asset_saranaprasarana.removeClass();
              MapModal.asset_saranaprasarana.addClass('btn btn-primary my-1 mr-sm-2');
            }
          break;
          case 'assetsenibudaya':
          if(MapModal.status_senibudaya=='active'){
            MapModal.status_senibudaya='disable';
            MapModal.asset_senibudaya.removeClass();
            MapModal.asset_senibudaya.addClass('btn btn-secondary my-1 mr-sm-2');
            }else{
              MapModal.status_senibudaya='active';
              MapModal.asset_senibudaya.removeClass();
              MapModal.asset_senibudaya.addClass('btn btn-primary my-1 mr-sm-2');
            }
          break;
          case 'assetpagelaran':
          if(MapModal.status_pagelaran=='active'){
            MapModal.status_pagelaran='disable';
            MapModal.asset_pagelaran.removeClass();
            MapModal.asset_pagelaran.addClass('btn btn-secondary my-1 mr-sm-2');
            }else{
              MapModal.status_pagelaran='active';
              MapModal.asset_pagelaran.removeClass();
              MapModal.asset_pagelaran.addClass('btn btn-primary my-1 mr-sm-2');
            }
          break;
      }
      // console.log('map cagarbudaya = ',MapModal.status_cagarbudaya) 
      initMap();
     
    });

    // ========= old script
    
    function renderStruktur(bindto,columns){
    return c3.generate({
         bindto: bindto,
          data: {
            columns: columns,
            type : 'pie',
          },
          size: {
            height: 250,
          },
     })
    }

    function renderStatistik(bindto,columns){
      return c3.generate({
        bindto: bindto,   
    data: {
        columns: [
            ['Domestik',columns[0]['dom'],columns[1]['dom'],columns[2]['dom'],columns[3]['dom'],columns[4]['dom'],columns[5]['dom']],
            ['Mancanegara',columns[0]['man'],columns[1]['man'],columns[2]['man'],columns[3]['man'],columns[4]['man'],columns[5]['man']]
        ]
    },
    axis: {
        x: {
            type: 'category',
            categories: [columns[0]['tahun']+'-'+columns[0]['nama_bulan'] ,
            columns[1]['tahun']+'-'+columns[1]['nama_bulan'] ,
            columns[2]['tahun']+'-'+columns[2]['nama_bulan'] ,
            columns[3]['tahun']+'-'+columns[3]['nama_bulan'] ,
            columns[4]['tahun']+'-'+columns[4]['nama_bulan'] ,
            columns[5]['tahun']+'-'+columns[5]['nama_bulan'] ,
            ]
           }
          }
      });
    }

    getAllCagarbudaya();
    function getAllCagarbudaya(){
      return $.ajax({
      url: "<?php echo site_url('DashboardController/getAllCagarbudaya')?>",
      //data : {tahun: tahun},
      data: {},
      type: 'GET',
      success: function (data){
        var json2 = JSON.parse(data);
        if(json2['error']){
          return;
        }
        all_cagarbudaya = json2['data'];
        
      renderStatistik('#chartcagarbudaya',all_cagarbudaya);
      },
      error: function(e) {}
      });  
    }

    getAllObjekwisata();
    function getAllObjekwisata(){
      return $.ajax({
      url: "<?php echo site_url('DashboardController/getAllObjekwisata')?>",
      //data : {tahun: tahun},
      data: {},
      type: 'GET',
      success: function (data){
        var json2 = JSON.parse(data);
        if(json2['error']){
          return;
        }
        all_objekwisata = json2['data'];
        
      renderStatistik('#chartobjekwisata',all_objekwisata);
      },
      error: function(e) {}
      });  
    }

    
    getAllPenginapan();
    function getAllPenginapan(){
      return $.ajax({
      url: "<?php echo site_url('DashboardController/getAllPenginapan')?>",
      //data : {tahun: tahun},
      data: {},
      type: 'GET',
      success: function (data){
        var json2 = JSON.parse(data);
        if(json2['error']){
          return;
        }
        all_penginapan = json2['data'];
        
      renderStatistik('#chartpenginapan',all_penginapan);
      },
      error: function(e) {}
      });  
    }


    getStrukturSenibudaya();
    function getStrukturSenibudaya(){
    return $.ajax({
      url: "<?php echo site_url('DashboardController/getSenibudaya')?>",
      //data : {tahun: tahun},
      data: {},
      type: 'GET',
      success: function (data){
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }
        v_senibudaya = json['data'];
      
      
        v_senibudaya.forEach((d) => {


        });

        $('#senibudaya1').html(v_senibudaya[0]['nama_j_senibudaya']+' : '+v_senibudaya[0]['jumlahsenibudaya']);
        $('#senibudaya2').html(v_senibudaya[1]['nama_j_senibudaya']+' : '+v_senibudaya[1]['jumlahsenibudaya']);
    
      },
      error: function(e) {}
      });
    }

  getStrukturPenginapan();
    function getStrukturPenginapan(){
    return $.ajax({
      url: "<?php echo site_url('DashboardController/getStrukturPenginapan')?>",
      //data : {tahun: tahun},
      data: {},
      type: 'GET',
      success: function (data){
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }
        v_penginapan = json['data'];
        renderStruktur("#struktur_penginapan", [
          [v_penginapan[0]['nama_kabupaten'],v_penginapan[0]['value']],
          [v_penginapan[1]['nama_kabupaten'],v_penginapan[1]['value']],
          [v_penginapan[2]['nama_kabupaten'],v_penginapan[2]['value']],
          [v_penginapan[3]['nama_kabupaten'],v_penginapan[3]['value']],
          [v_penginapan[4]['nama_kabupaten'],v_penginapan[4]['value']],
          [v_penginapan[5]['nama_kabupaten'],v_penginapan[5]['value']],
          [v_penginapan[6]['nama_kabupaten'],v_penginapan[6]['value']],
          ]);
      },

      error: function(e) {}
      });      
    }
    getStrukturBiro();
    function getStrukturBiro(){
    return $.ajax({
      url: "<?php echo site_url('DashboardController/getStrukturBiro')?>",
      //data : {tahun: tahun},
      data: {},
      type: 'GET',
      success: function (data){
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }
        v_biro = json['data'];
        renderStruktur("#struktur_biro", [
          [v_biro[0]['nama_kabupaten'],v_biro[0]['value']],
          [v_biro[1]['nama_kabupaten'],v_biro[1]['value']],
          [v_biro[2]['nama_kabupaten'],v_biro[2]['value']],
          [v_biro[3]['nama_kabupaten'],v_biro[3]['value']],
          [v_biro[4]['nama_kabupaten'],v_biro[4]['value']],
          [v_biro[5]['nama_kabupaten'],v_biro[5]['value']],
          [v_biro[6]['nama_kabupaten'],v_biro[6]['value']],
          ]);
      },

      error: function(e) {}
      });      
    }

    getStrukturSenibudaya();
    function getStrukturSenibudaya(){
    return $.ajax({
      url: "<?php echo site_url('DashboardController/getStrukturSenibudaya')?>",
      //data : {tahun: tahun},
      data: {},
      type: 'GET',
      success: function (data){
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }
        v_senibudaya = json['data'];
        renderStruktur("#struktur_senibudaya", [
          [v_senibudaya[0]['nama_kabupaten'],v_senibudaya[0]['value']],
          [v_senibudaya[1]['nama_kabupaten'],v_senibudaya[1]['value']],
          [v_senibudaya[2]['nama_kabupaten'],v_senibudaya[2]['value']],
          [v_senibudaya[3]['nama_kabupaten'],v_senibudaya[3]['value']],
          [v_senibudaya[4]['nama_kabupaten'],v_senibudaya[4]['value']],
          [v_senibudaya[5]['nama_kabupaten'],v_senibudaya[5]['value']],
          [v_senibudaya[6]['nama_kabupaten'],v_senibudaya[6]['value']],
          ]);
      },

      error: function(e) {}
      });      
    }

   getStrukturCagarbudaya();
    function getStrukturCagarbudaya(){
    return $.ajax({
      url: "<?php echo site_url('DashboardController/getStrukturCagarbudaya')?>",
      //data : {tahun: tahun},
      data: {},
      type: 'GET',
      success: function (data){
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }
        v_cagarbudaya = json['data'];
        renderStruktur("#struktur_cagarbudaya", [
          [v_cagarbudaya[0]['nama_kabupaten'],v_cagarbudaya[0]['value']],
          [v_cagarbudaya[1]['nama_kabupaten'],v_cagarbudaya[1]['value']],
          [v_cagarbudaya[2]['nama_kabupaten'],v_cagarbudaya[2]['value']],
          [v_cagarbudaya[3]['nama_kabupaten'],v_cagarbudaya[3]['value']],
          [v_cagarbudaya[4]['nama_kabupaten'],v_cagarbudaya[4]['value']],
          [v_cagarbudaya[5]['nama_kabupaten'],v_cagarbudaya[5]['value']],
          [v_cagarbudaya[6]['nama_kabupaten'],v_cagarbudaya[6]['value']],
          ]);
        // $('#total_cagarbudaya').html(v_cagarbudaya['jumlah_cagarbudaya']);
        // $('#domestik_cagarbudaya').html(v_cagarbudaya['domestik_cagarbudaya']);
        // $('#mancanegara_cagarbudaya').html(v_cagarbudaya['mancanegara_cagarbudaya']);
        // $('#totalpengunjung_cagarbudaya').html(v_cagarbudaya['totalpengunjung_cagarbudaya']);
        // renderStruktur('#struktur_cagarbudaya',[["Domestik",v_cagarbudaya['domestik_cagarbudaya']],["Mancanegara",v_cagarbudaya['mancanegara_cagarbudaya']]]);
        // $('#strukturpengunjung_cagarbudaya').html(v_cagarbudaya['totalpengunjung_cagarbudaya']);
      },

      error: function(e) {}
      });      
    }

    getStrukturObjekwisata();
    function getStrukturObjekwisata(){
    return $.ajax({
      url: "<?php echo site_url('DashboardController/getStrukturObjek')?>",
      //data : {tahun: tahun},
      data: {},
      type: 'GET',
      success: function (data){
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }
        v_objekwisata = json['data'];
        renderStruktur("#struktur_objekwisata", [
          [v_objekwisata[0]['nama_kabupaten'],v_objekwisata[0]['value']],
          [v_objekwisata[1]['nama_kabupaten'],v_objekwisata[1]['value']],
          [v_objekwisata[2]['nama_kabupaten'],v_objekwisata[2]['value']],
          [v_objekwisata[3]['nama_kabupaten'],v_objekwisata[3]['value']],
          [v_objekwisata[4]['nama_kabupaten'],v_objekwisata[4]['value']],
          [v_objekwisata[5]['nama_kabupaten'],v_objekwisata[5]['value']],
          [v_objekwisata[6]['nama_kabupaten'],v_objekwisata[6]['value']],
          ]);
  },
      error: function(e) {}
      });
    }

     getStrukturPagelaran();
    function getStrukturPagelaran(){
    return $.ajax({
      url: "<?php echo site_url('DashboardController/getStrukturPagelaran')?>",
      //data : {tahun: tahun},
      data: {},
      type: 'GET',
      success: function (data){
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }
        v_pagelaran = json['data'];

        $('#kegiatan').html(v_pagelaran);
        renderStruktur("#struktur_pagelaran", [
          [v_pagelaran[0]['nama_kabupaten'],v_pagelaran[0]['val']],
          [v_pagelaran[1]['nama_kabupaten'],v_pagelaran[1]['val']],
          [v_pagelaran[2]['nama_kabupaten'],v_pagelaran[2]['val']],
          [v_pagelaran[3]['nama_kabupaten'],v_pagelaran[3]['val']],
          [v_pagelaran[4]['nama_kabupaten'],v_pagelaran[4]['val']],
          [v_pagelaran[5]['nama_kabupaten'],v_pagelaran[5]['val']],
          [v_pagelaran[6]['nama_kabupaten'],v_pagelaran[6]['val']],
          ]);
      },
      error: function(e) {}
      });
    }

    
    
    //========== end old 
    //============ Event
    getEvent();
    function getEvent(){ 
    $.ajax({
              url: `<?=site_url('KalenderController/getPagelaran')?>`, 'type': 'GET',
              data: {},
              success: function (data){
                var json = JSON.parse(data);              
                dataPagelaran = json['data'];
                renderEvent(dataPagelaran);
              },
             error: function(e) {}
      });    
    }
   
    function renderEvent(d){
        tmpPagelaran = "";
        for(i=0;i<2;i++) {
            tmpPagelaran +=`
            <div class="timeline-item">
                <div class="row">
                    <div class="col-4 date">
                        <i class="fa fa-calendar"></i>
                        ${d[i]['tanggal_kegiatan']}
                        <br>
                        <small class="text-navy">${d[i]['nama_kabupaten']}</small>
                    </div>
                    <div class="col content">
                        <p class="m-b-xs"><strong>${d[i]['nama_jenis_pagelaran']} ${d[i]['nama']}</strong></p>
                        <p>
                            ${d[i]['deskripsi']}
                        </p>
                        <p>
                            ${d[i]['alamat']} - <a href="https://www.google.com/maps/@${d[i]['lokasi']},10z" target="_blank">Google Map</a>
                         </p>
                        <p>
                            
                        </p>
                    </div>
                </div>
            </div>
            `;

        };
        var pagelaran = document.getElementById('kalender_pagelaran') 
        pagelaran.innerHTML = tmpPagelaran;
        }
    //============ end Event
});
</script>
