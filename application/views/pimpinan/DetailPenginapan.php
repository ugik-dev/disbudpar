
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-6">
      <div class="ibox">
        <div class="ibox-content">
        <div id="profil">
            <form>
              <div class="form-group">
                <label for="nama">Nama Operataor Penanggung Jawab</label> 
                <input type="text" placeholder="" class="form-control" id="nama_user_entry" name="nama_user_entry" readonly="readonly">
               </div>
              <div class="form-group">
                <label for="formGroupExampleInput">Nama Penginapan</label>
                <input type="text" class="form-control" id="namapenginapan"  readonly="readonly">
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">Alamat</label>
                <input type="text" class="form-control" id="alamat" readonly="readonly">
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">Korninat</label>
                <input type="text" class="form-control" id="kordinat" readonly="readonly">
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="formGroupExampleInput">Jumlah Kamar</label>
                  <input type="text" class="form-control" id="kamar" readonly="readonly">
                </div>
                <div class="form-group col-md-6">
                  <label for="formGroupExampleInput">Jumlah Tempat Tidur</label>
                  <input type="text" class="form-control" id="tempat_tidur" readonly="readonly">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="formGroupExampleInput">Jenis Penginapan</label>
                  <input type="text" class="form-control" id="jenis" readonly="readonly">
                </div>
                <div class="form-group col-md-6">
                  <label for="formGroupExampleInput">Approvment</label>
                  <input type="text" class="form-control" id="approv" readonly="readonly">
                </div>
              </div>
              
              <div class="form-group">
                <label for="formGroupExampleInput">Deskripsi</label>
                <!-- <input type="text" class="form-control" id="deskripsi" disabled> -->
                <textarea class="form-control" id="deskripsi" rows="4" disabled></textarea>
              </div>
            </form>
            <button class="btn btn-success my-1 mr-sm-2" type="" id="message_btn" onclick="MessageFunction()" data-loading-text="Loading..."><strong>Kirim Pesan</strong></button>
            <button class="btn btn-success my-1 mr-sm-2" type="submit" id="approv_btn" onclick="ApprovFunction()" data-loading-text="Loading..."><strong>Approv Data</strong></button>
          </div><!-- profil -->
          </div><!-- ibox content -->
      </div> <!-- ibox -->

    </div> <!-- cl -->



     <div class="col-lg-6">
        <div class="tabs-container">
            <ul class="nav nav-tabs" role="tablist">
                <li><a class="nav-link active" data-toggle="tab" href="#tab-1">Map - Photo</a></li>
                <li><a class="nav-link" data-toggle="tab" href="#tab-2">Dokumen</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" id="tab-1" class="tab-pane active">
                <div class="panel-body">
                  <div class="col-lg-12">
                    <div class="ibox">
                      <div class="ibox-content">
                        <div id="map" style='height: 300px;'></div>
                      </div>
                    </div>
                    <div class="ibox">
                      <div class="ibox-content">
                        <div class="form-group col-md-12" >
                          <label for="formGroupExampleInput">Photo</label>
                        </div>
                          <div class="form-group col-md-12">
                            <img src="" class="img-fluid" id='fileimg' alt="Responsive image" style='height: 200px;'>
                          </div>            
                        <div class="form-group col-md-12" id="photo"></div>
                      </div>
                    </div> 
                  </div>
                </div>
              </div>
              <div role="tabpanel" id="tab-2" class="tab-pane">
                 <div class="panel-body" id="">
                    <div class="form-group col-md-12">
                      <div id="iframepdf"> </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>



 <div class="col-md-12">
  <div class="ibox">
    <div class="ibox-content" id="input_modal">  
      <div class="form-inline">
        <div class="form-group mb-2">
          <select class="dropdown-item" id="tahun_input" name="tahun_input" required="required"></select>
        </div>
        <div class="form-group mx-sm-3 mb-2" id="header_approv"> </div>
      </div>
      <form class="form" id="pengujung_form" onsubmit="return false;">
        <input type="hidden" id="id_penginapan" name="id_penginapan" readonly="readonly">
        <!-- form isian data pengunjung  -->
        <div id="input_data_pengunjung">
         
        </div>
      </form>
    </div>
  </div>
  </div>

  
  <div class="modal inmodal" id="message_modal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Kirim Pesan</h4>
        <span class="info"></span>
      </div>
      <div class="modal-body" id="modal-body">              
        <form role="form" id="user_form" onsubmit="return false;" type="multipart" autocomplete="off">
          <input hidden type="text" id="id_operator" name="id_user_reciver" >
          <div class="form-group">
            <label for="nama">Ke : </label> 
            <input type="text" placeholder="Nama" class="form-control" id="nama_operator" name="" required="required">
          </div>
          
          <div class="form-group">
            <label for="deskripsi">Pesan</label> 
            <textarea rows="5" type="text" placeholder="" class="form-control" id="" name="message" required="required"></textarea>
          </div>
          <div class="form-group">
        
            <textarea hidden rows="5" type="text" placeholder="" class="form-control" id="format_message" name="format_message" required="required"></textarea>
          </div>
          <button class="btn btn-success my-1 mr-sm-2" type="submit" id="send_btn" data-loading-text="Loading..." onclick="this.form.target='send'"><strong>Kirim</strong></button>       
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal inmodal" id="photo2_modal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">           
          </ol>
          <div class="carousel-inner">            
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        </div>
    </div>
  </div>
</div>



<script>
$(document).ready(function() {
  $('#pariwisata').addClass('active');
  $('#penginapan').addClass('active');
  var id_penginapan = "<?=$contentData['id_penginapan']?>";
  console.log(id_penginapan);
  var dataProfil;
  var dataTahun

  getProfil();




$('#form_upload1').submit(function(e){
  
  console.log('file1upload')
            e.preventDefault(); 
                 $.ajax({
                     url:`<?=site_url('DetailPenginapanController/do_upload')?>`,
                     type:"post",
                     data:new FormData(this),
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:false,
                      success: function(data){
                          alert("Upload Image Berhasil.");
                          getProfil();
                   }
                 }); 
  });
$('#form_upload2').submit(function(e){
  console.log('file2 upload')
  e.preventDefault(); 
                 $.ajax({
                     url:`<?=site_url('DetailPenginapanController/do_upload2')?>`,
                     type:"post",
                     data:new FormData(this),
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:false,
                      success: function(data){
                          alert("Upload Image Berhasil.");
                          getProfil();
                   }
                 });
  });
  
$('#form_upload3').submit(function(e){
  console.log('file 3upload')
  e.preventDefault(); 
                 $.ajax({
                     url:`<?=site_url('DetailPenginapanController/do_upload3')?>`,
                     type:"post",
                     data:new FormData(this),
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:false,
                      success: function(data){
                          alert("Upload Image Berhasil.");
                          getProfil();
                   }
                 });
                });
  
$('#form_uploaddokumen').submit(function(e){
  console.log('file upload dokumen')
  e.preventDefault(); 
                 $.ajax({
                     url:`<?=site_url('DetailPenginapanController/do_upload4')?>`,
                     type:"post",
                     data:new FormData(this),
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:false,
                      success: function(data){
                          alert("Upload Dokumen Berhasil.");
                          getProfil();
                   }
    });
  });

var map;
 // initMap();
  function initMap() {
    var tmp = dataProfil['lokasi'];
    var tmp1  = tmp.split(",");
    var myLatLng = {lat: Number(tmp1[0]), lng: Number(tmp1[1])};
    map = new google.maps.Map(document.getElementById('map'), {
    zoom: 15,
    center: myLatLng
    });
    var myLatlng2 = new google.maps.LatLng(tmp1[0],tmp1[1]);
    var marker = new google.maps.Marker({
    position: myLatlng2,
    map: map,
    title: dataProfil['nama']
    }); 
  }

//======


  var toolbar = {
    'form': $('#toolbar_form'),
    'id_penginapan': $('#id_penginapan2'),
    'showBtn': $('#show_btn'),
  }
  toolbar.id_penginapan.val(id_penginapan);
  console.log('idcgar',id_penginapan)

  var FDataTable = $('#FDataTable').DataTable({
    'columnDefs': [],
    deferRender: true,
    "order": [[ 0, "desc" ]]
  });

  var InputModal = {

    'form': $('#input_modal').find('#pengujung_form'),
    'addBtn': $('#input_modal').find('#add_btn'),
    'save_pengunjung': $('#input_modal').find('#save_pengunjung'),
    'id_penginapan': $('#input_modal').find('#id_penginapan'),
    'id_data_penginapan': $('#input_modal').find('#id_data_penginapan'),
    'nomor': $('#input_modal').find('#nomor'),
    'tahun': $('#input_modal').find('#tahun_input'),
    'bulan': $('#input_modal').find('#bulan'),
    'nama': $('#input_modal').find('#nama'),
    'domestik_l': $('#input_modal').find('#domestik_l'),
    'mancanegara_l': $('#input_modal').find('#mancanegara_l'),
    'domestik_p': $('#input_modal').find('#domestik_p'),
    'mancanegara_p': $('#input_modal').find('#mancanegara_p'),
    'jumlah': $('#input_modal').find('#jumlah'),
    
    
  }
  InputModal.id_penginapan.val(id_penginapan);


  var EditModal = {
    'self': $('#edit_modal'),
    'info': $('#edit_modal').find('.info'),
    'form': $('#edit_modal').find('#user_form'),
    'addBtn': $('#edit_modal').find('#add_btn'),
    'saveEditBtn': $('#edit_modal').find('#save_edit_btn'),
    'edit_id_penginapan': $('#edit_modal').find('#edit_id_penginapan'),
    'id_data_penginapan': $('#edit_modal').find('#id_data_penginapan'),
    'edit_nama': $('#edit_modal').find('#edit_nama'),
    'edit_alamat': $('#edit_modal').find('#edit_alamat'),
    'edit_lokasi': $('#edit_modal').find('#edit_lokasi'),
    'edit_deskripsi': $('#edit_modal').find('#edit_deskripsi'),
    'edit_id_jenis': $('#edit_modal').find('#edit_id_jenis'),
    'edit_jumlah_kamar': $('#edit_modal').find('#edit_jumlah_kamar'),
    'edit_jumlah_tempat_tidur': $('#edit_modal').find('#edit_jumlah_tempat_tidur'),
    
  }
  var Photo2Modal = {
    'self': $('#photo2_modal'),
    'info': $('#photo2_modal').find('.infoy'),
    'images': $('#photo2_modal').find('.carousel-inner'),
    'indicators': $('#photo2_modal').find('.carousel-indicators'),
  }

document.getElementById("approv_btn").onclick = function() {ApprovFunction()};
function ApprovFunction() {
  console.log('cok');
  swal(swalSaveConfigure).then((result) => {
      if(!result.value){ return; }
      
      $.ajax({
        url: `<?=site_url('DetailPenginapanController/approv')?>`, 'type': 'GET',
        data: {id_penginapan: dataProfil['id_penginapan']},
        success: function (data){
         
          //var dataPengunjung = json['data']
          //dataDetailPenginapan[detailpenginapan['nomor']] = detailpenginapan;
          
          getProfil();
          // DetailPenginapanModal.self.modal('hide');
        },
        error: function(e) {}
      });
    });   
  };

  var MessageModal = {
    'self': $('#message_modal'),
    'info': $('#message_modal').find('.info'),
    'form': $('#message_modal').find('#user_form'),
    'sendBtn': $('#message_modal').find('#send_btn'),
    'saveEditBtn': $('#message_modal').find('#save_edit_btn'),
    'edit_id_penginapan': $('#message_modal').find('#edit_id_penginapan'),
    'id_data_penginapan': $('#message_modal').find('#id_data_penginapan'),
    'id_operator': $('#message_modal').find('#id_operator'),
    'nama_operator': $('#message_modal').find('#nama_operator'),
    'message': $('#message_modal').find('#message'),
    'format_message': $('#message_modal').find('#format_message'),
  }
 
  document.getElementById("message_btn").onclick = function() {MessageFunction()}
  function MessageFunction() {
    console.log('cok');
    MessageModal.nama_operator.val(nama_user_entry.value);
    MessageModal.id_operator.val(dataProfil['id_user_entry']);
    formatMessage = `Pada Penginapan - `+dataProfil['nama']+`
`;
    MessageModal.format_message.val(formatMessage);
	
    MessageModal.self.modal('show'); 
  }

  MessageModal.form.submit(function(event){
    event.preventDefault();
    switch(MessageModal.form[0].target){
      case 'send':
        console.log("pesan dikirim")
        sendMessage();
        break;
    }
  });
  function sendMessage(){
    buttonLoading(MessageModal.sendBtn);
    console.log(toolbar.form.serialize());
    $.ajax({
      url: `<?=site_url('MessageController/sendMessage')?>`, 'type': 'GET',
      data: MessageModal.form.serialize(),
      success: function (data){
        buttonIdle(MessageModal.sendBtn);
        var json = JSON.parse(data);
        if(json['error']){
          swal("Simpan Gagal", json['message'], "error");
          return;
        }
        swal("Pesan Terkirim", "", "success");
        MessageModal.self.modal('hide'); 
        MessageModal.form.trigger('reset'); 
      },
      error: function(e) {}
    });
  }

  var swalSaveConfigure = {
    title: "Konfirmasi Approv",
    text: "Yakin akan Approv data ini?",
    type: "info",
    showCancelButton: true,
    confirmButtonColor: "#18a689",
    confirmButtonText: "Ya, Approv!",
  };
  var swalNotApprov = {
    title: "Konfirmasi simpan",
    text: "Yakin akan menyimpan data ini?",
    type: "info",
    showCancelButton: true,
    confirmButtonColor: "#red",
    confirmButtonText: "Ya, Simpan!",
  };


  var dataDetailPenginapan = {};
  var dataJenis = {};

  toolbar.form.submit(function(event){
    event.preventDefault();
    switch(toolbar.form[0].target){
      case 'show':
        getDetailPenginapan();
        break;
      case 'add':
        showDetailPenginapanModal();
        break;
    }
  });
  
  function getProfil(){
    $.ajax({
      url: `<?=site_url('DetailPenginapanController/getProfil')?>`, 'type': 'GET',
      data: {id_penginapan : id_penginapan},
      success: function (data){
        var json = JSON.parse(data);
        dataProfil = json['data'];
        initMap();
        var nama = document.getElementById("namapenginapan");
        var alamat = document.getElementById("alamat");
        var kamar = document.getElementById("kamar");
        var tempat_tidur = document.getElementById("tempat_tidur");
        var jenis = document.getElementById("jenis");
        var deskripsi = document.getElementById("deskripsi");
        var approv = document.getElementById("approv");
        var kordinat = document.getElementById("kordinat");
        var file = document.getElementById("file");
        var fileimg = document.getElementById("fileimg");
        var fil2 = document.getElementById("file2");
        var file2img = document.getElementById("file2img");

        var dokumen = document.getElementById("dokumen");
        var dokumensrc = document.getElementById("dokumensrc");
        
        var nama_user_entry = document.getElementById("nama_user_entry");
      //  var edit_profil_btn = document.getElementById("edit_profil_btn");
       
        nama.value = dataProfil['nama'];
        alamat.value = dataProfil['alamat'];
        
        
        jenis.value = dataProfil['nama_jenis_penginapan'];
        deskripsi.value = dataProfil['deskripsi'];
        kamar.value = dataProfil['jumlah_kamar'];
        tempat_tidur.value = dataProfil['jumlah_tempat_tidur'];
        if(dataProfil['id_user_approv']=='0'){
          approv.value = "Belum Di Approv"
        }else{
        approv.value = getUserApprov(dataProfil['id_user_approv']);
        };
        if(dataProfil['id_user_entry']=='0'){
          nama_user_entry.value = "Tidak Terdeteksi"
        }else{
          nama_user_entry.value = getUserEntry(dataProfil['id_user_entry']);
        };
        kordinat.value = dataProfil['lokasi'];
       
        fileimg.src = `<?= base_url('upload/file/')?>`+dataProfil['file'];
       
         renderPhoto();
        renderPdf();
        //console.log(dataProfil)
        //renderDetailPenginapan(dataDetailPenginapan);
      },
      error: function(e) {}
    });
  }
  function renderPdf(){
    if(!empty(dataProfil['dokumen'])){
    tmp = '<?=base_url('/upload/dokumen/')?>'+dataProfil['dokumen'];
      pdfHTML =`
      <iframe id="iframepdf" src="${tmp}" width = "100%" height = "900px"></iframe>
    `;
      var iframepdf = document.getElementById("iframepdf");
    
      iframepdf.innerHTML = pdfHTML;
    };
    };
  function renderPhoto(){
    var ph = dataProfil['file2'];
    var ph1  = ph.split(",");
    
    if(dataProfil['file']==""){
      indicatorsHTML = ``;
      img2HTML = ``;
    }else{
      tmp = `<?= base_url('upload/file/')?>`+dataProfil['file'];
      indicatorsHTML = `<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>`;
      img2HTML = `
              <div class="carousel-item active">
                  <img src="${tmp}" class="d-block w-100" alt="...">
                </div>
          `;     
    }
    imgHTML = `<div class="row">`;
    var i = 0;
    
      ph1.forEach((d) => {
      console.log(d);
      tmp = `<?= base_url('upload/file2/')?>`+d;
      if (dataProfil['file2'] != ""){
        indicatorsHTML +=`<li data-target="#carouselExampleIndicators" data-slide-to="${i+1}" class=""></li>`
      img2HTML +=`
                <div class="carousel-item">
                  <img src="${tmp}" class="d-block w-100" alt="...">
                </div>
            `;
      imgHTML +=`
                <div class='form-group col-md-6'>
                  <a type="submit" id="del_photo${i}" >             
                  <img src="${tmp}" class="img-fluid" id='file2img' alt="Responsive image" style='height: 200px;'>            
                  </a>
                </div>
                `;
      i++;
      };
      });
    var photo = document.getElementById("photo");  
    imgHTML +=`</div>`;
    
    Photo2Modal.indicators.html(indicatorsHTML);
    Photo2Modal.images.html(img2HTML);
    photo.innerHTML = imgHTML;
    i=0;
    if (dataProfil['file2'] != ""){
      ph1.forEach((e) => {
        document.getElementById("del_photo"+String(i)).onclick = function() {
          console.log('hapus foto foto',e)
          delPhoto(e);
        };
        i++;
      });
    };
      
    }

  function delPhoto(photo){
    Photo2Modal.self.modal('show');
    }

    var swalDelPhoto = {
    title: "Konfirmasi Hapus Foto",
    text: "Yakin akan menghapus foto ini?",
    type: "info",
    showCancelButton: true,
    confirmButtonColor: "#18a689",
    confirmButtonText: "Ya, Hapus!",
    }
    function getUserApprov(id_user){    
      $.ajax({
        url: `<?=site_url('DetailPenginapanController/getUser')?>`, 'type': 'GET',
        data: {id_user : id_user },
        success: function (data){
          var json = JSON.parse(data);
        data = json['data'];     
        approv.value = data['nama'];      
        },
        error: function(e) {}
        });
    }
    function getUserEntry(id_user){
      $.ajax({
        url: `<?=site_url('DetailPenginapanController/getUser')?>`, 'type': 'GET',
        data: {id_user : id_user },
        success: function (data){         
          var json = JSON.parse(data);
        data = json['data'];
        nama_user_entry.value = data['nama'];      
        },
        error: function(e) {}
        });
    }

  function getDetailPenginapan(){
    buttonLoading(toolbar.showBtn);
    console.log(toolbar.form.serialize());
    $.ajax({
      url: `<?=site_url('DetailPenginapanController/getAllDetailPenginapan')?>`, 'type': 'GET',
      data: {id_penginapan : id_penginapan},
      success: function (data){
        buttonIdle(toolbar.showBtn);
        var json = JSON.parse(data);
        if(json['error']){
          swal("Simpan Gagal", json['message'], "error");
          return;
        }
        dataDetailPenginapan = json['data'];
        renderDetailPenginapan(dataDetailPenginapan);
      },
      error: function(e) {}
    });
  }

  function getInputPengunjung(){

    console.log(toolbar.form.serialize());
    $.ajax({
      url: `<?=site_url('DetailPenginapanController/getAllDetailPenginapan')?>`, 'type': 'GET',
      data: {id_penginapan : id_penginapan, tahun: InputModal.tahun.val() },
      success: function (data){
        //buttonIdle(toolbar.showBtn);
        var json = JSON.parse(data);
        if(json['error']){
          swal("Simpan Gagal", json['message'], "error");
          return;
        }


       data = json['data'];
      renderInputPengunjung(data);
      },
      error: function(e) {}
    });
  }

function renderInputPengunjung(data){
    if(data == null || typeof data != "object"){
      console.log("User::UNKNOWN DATA");
      return;
    }
    var i = 1;
    var tmpdl = 0;
    var tmpdp = 0;
    var tmpml = 0;
    var tmpmp = 0;
    var tmpjumlah = 0;
    var tmppajak = 0;
    var tmpjumlahdurasi = 0;
    var tmpdd = 0;
    var tmpdm = 0;
    var intputhtml = `<div class="form-row">
          <div class="col-2">
          <label>Bulan </label>
          </div>
          <div class="col">
            <label>Domestik Laki-laki </label>
          </div>
          <div class="col">
          <label>Domestik Perempuan </label>
          </div>
          <div class="col">
          <label>Mancanegara Laki-laki </label>
          </div>
          <div class="col">
          <label>Mancanegara Perempuan </label>
          </div>
          <div class="col">
          <label>Total Pengunjung</label>
          </div>
          <div class="col">
          <label>Lama Penginapan Domestik (Hari)</label>
          </div>
          <div class="col">
          <label>Lama Penginapan Mancanegara (Hari) </label>
          </div>
          <div class="col">
          <label>Total Lama Penginapan (Hari) </label>
          </div>
          
          <div class="col">
          <label>Pajak</label>
          </div>

        </div>`;
    Object.values(data).forEach((d) => {
      tmpdl += Number(d['domestik_personal_l']);
      tmpdp += Number(d['domestik_personal_p']);
      tmpml += Number(d['mancanegara_personal_l']);
      tmpmp += Number(d['mancanegara_personal_p']);
      tmpjumlah += Number(d['jumlah_personal']);
      tmppajak += Number(d['pajak']);
      tmpdd += Number(d['domestik_durasi']);
      tmpdm += Number(d['mancanegara_durasi']);
      tmpjumlahdurasi += Number(d['jumlah_durasi']);
       intputhtml +=`
      <div class="form-row">
          <div class="col-2">
            <label>${d['nama_bulan']} :</label>
            <input type="number" class="form-control" name="id_data_penginapan${i}" value="${d['id_data_penginapan']}" hidden>
            <input type="number" class="form-control" name="bulan${d['bulan']}" placeholder="id_bulan" value="${d['bulan']}" hidden>
            <input type="number" class="form-control" name="tahun" placeholder="tahun" value="${d['tahun']}" hidden>
          </div>
          <div class="col">  
            <input type="number" class="form-control" name="domestik_personal_l${i}" placeholder="" value="${d['domestik_personal_l']}" disabled>
          </div>
          <div class="col">
            <input type="number" class="form-control" name="domestik_personal_p${i}" placeholder="" value="${d['domestik_personal_p']}" disabled>
          </div>
          <div class="col">
            <input type="number" class="form-control" name="mancanegara_personal_l${i}" placeholder="" value="${d['mancanegara_personal_l']}" disabled>
          </div>
          <div class="col">
            <input type="number" class="form-control" name="mancanegara_personal_p${i}" placeholder=""  value="${d['mancanegara_personal_p']}" disabled>
          </div>
          <div class="col">
            <input type="number" class="form-control" placeholder="0"  value="${d['jumlah_personal']}" disabled>
          </div>
          <div class="col">
            <input type="number" class="form-control" name="domestik_durasi${i}" placeholder="" value="${d['domestik_durasi']}" disabled>
          </div>
          <div class="col">
            <input type="number" class="form-control" name="mancanegara_durasi${i}" placeholder=""  value="${d['mancanegara_durasi']}" disabled>
          </div>
          <div class="col">
            <input type="number" class="form-control" placeholder="0"  value="${d['jumlah_durasi']}" disabled>
          </div>
          <div class="col">
            <input type="number" class="form-control" name="pajak${i}" placeholder=""  value="${d['pajak']}" disabled>
          </div>
        </div>
      `;
      i++;
      tmpapprov=d['nomor'];
    });
    intputhtml +=`
      <div class="form-row">
          <div class="col-2">
            <label>Jumlah :</label>
          </div>
          <div class="col">  
            <input type="number" class="form-control"  placeholder="0" value="${tmpdl}" disabled>
          </div>
          <div class="col">
            <input type="number" class="form-control" placeholder="0" value="${tmpdp}" disabled>
          </div>
          <div class="col">
            <input type="number" class="form-control" placeholder="0" value="${tmpml}" disabled>
          </div>
          <div class="col">
            <input type="number" class="form-control" placeholder="0"  value="${tmpmp}" disabled>
          </div>
          <div class="col">
            <input type="number" class="form-control" placeholder="0"  value="${tmpjumlah}" disabled>
          </div>
          <div class="col">
            <input type="number" class="form-control" placeholder="0" value="${tmpdd}" disabled>
          </div>
          <div class="col">
            <input type="number" class="form-control" placeholder="0"  value="${tmpdm}" disabled>
          </div>
          <div class="col">
            <input type="number" class="form-control" placeholder="0"  value="${tmpjumlahdurasi}" disabled>
          </div>
          <div class="col">
            <input type="number" class="form-control" placeholder="0"  value="${tmppajak}" disabled>
          </div>
        </div>
      `;
      intputhtml +=`  <button type="submit" class="btn btn-success my-1 mr-sm-2" id="save_pengunjung"  data-loading-text="Loading..." onclick="this.form.target='save'"><i class="fal fa-save"></i> Approv Data</button> `;
      var input_data_pengunjung = document.getElementById("input_data_pengunjung");  
      input_data_pengunjung.innerHTML = intputhtml;        
      var header_approv = document.getElementById("header_approv");  
      if(data[tmpapprov]['approv'] == '0' || data[tmpapprov]['approv'] == null  ){
        header_approv.innerHTML = `<h5><span class="badge badge-warning">Data Belum di Approv</span></h5>`;
      }else{
        header_approv.innerHTML = `<h5><span class="badge badge-info">Data Sudah Approv</span></h5>`;  
      };


  }

    InputModal.form.submit(function(event){
    event.preventDefault();
    switch(InputModal.form[0].target){
      case 'save':
        console.log('tombol save')
        saveInputPengunjung();
        break;
     
    }
  });


  function saveInputPengunjung(){
    swal(swalSaveConfigure).then((result) => {
      if(!result.value){ return; }
      buttonLoading(InputModal.save_pengunjung);
      $.ajax({
        url: `<?=site_url('DetailPenginapanController/savePengunjung')?>`, 'type': 'POST',
        data: InputModal.form.serialize(),
        success: function (data){
          buttonIdle(InputModal.save_pengunjung);
          var json = JSON.parse(data);
          if(json['error']){
            swal("Simpan Gagal", json['message'], "error");
            return;
          }
          swal("Simpan Berhasil", "", "success");
          //var dataPengunjung = json['data']
          //dataDetailPenginapan[detailpenginapan['nomor']] = detailpenginapan;
          
          getInputPengunjung();
          // DetailPenginapanModal.self.modal('hide');
        },
        error: function(e) {}
      });
    });
    }

  function renderDetailPenginapan(data){
    if(data == null || typeof data != "object"){
      console.log("User::UNKNOWN DATA");
      return;
    }
    var i = 0;
    
    var renderData = [];
    Object.values(data).forEach((detailpenginapan) => {
      renderData.push([detailpenginapan['nomor'], detailpenginapan['tahun'],detailpenginapan['nama_bulan'],detailpenginapan['domestik'], detailpenginapan['mancanegara'],detailpenginapan['jumlah']]);
    });
    FDataTable.clear().rows.add(renderData).draw('full-hold');
  }



  EditModal.form.submit(function(event){
    event.preventDefault();
    switch(EditModal.form[0].target){
      case 'edit':
        editDetailPenginapan();
        break;
    }
  });


  function editDetailPenginapan(){
    swal(swalSaveConfigure).then((result) => {
      if(!result.value){ return; }
      buttonLoading(EditModal.saveEditBtn);
      $.ajax({
        url: `<?=site_url('DetailPenginapanController/editDetailPenginapan')?>`, 'type': 'POST',
        data: EditModal.form.serialize(),
        success: function (data){
          buttonIdle(EditModal.saveEditBtn);
          var json = JSON.parse(data);
          if(json['error']){
            swal("Simpan Gagal", json['message'], "error");
            return;
          }
          var detailpenginapan = json['data']
          console.log(detailpenginapan);
          getProfil();
          swal("Simpan Berhasil", "", "success");
         // renderDetailPenginapan(dataDetailPenginapan);
          EditModal.self.modal('hide');
        },
        error: function(e) {}
      });
    });
    }
    
    getTahun();  
    function getTahun(){
    return $.ajax({
      url: `<?php echo site_url('DetailPenginapanController/getTahun/')?>`, 'type': 'GET',
      data: {},
      success: function (data){
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }
        dataTahun = json['data'];
        renderTahunSelection(dataTahun);
      },
      error: function(e) {}
    });
  }

  $("#tahun_input").click(function(e) {
    if(dataProfil['id_user_approv']=='0'){
      console.log('data belum di approv');
      swal("Data Belum di Approv",'Harap Konformasi ke Pimpinan Untuk Approval', "error");
    }else{
      registerTahunSelectionChange();
      console.log("fungsi clik tahun aktif approv=",dataProfil['id_user_approv'] )
    };
  });
    function registerTahunSelectionChange(){
    InputModal.tahun.on('change', function(e){
      getInputPengunjung();
      //var input_data_pengunjung = document.getElementById("input_data_pengunjung");
        
      
        //input_data_pengunjung.innerHTML = test;
    //  getChart1cb(); 
      console.log('regis run thun :',InputModal.tahun.val())
  }); 

  }
   function renderTahunSelection(data){
    InputModal.tahun.empty();
    InputModal.tahun.append($('<option>', { value: "", text: "Tahun"}));
    data.forEach((d) => {
      InputModal.tahun.append($('<option>', {
        value: d['tahun'],
        text: d['tahun'],
      }));  
    });
   }

     getAllJenis();  
  function getAllJenis(){
    return $.ajax({
      url: `<?php echo site_url('PenginapanController/getAllJenisOption/')?>`, 'type': 'GET',
      data: {},
      success: function (data){
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }
        dataJenis = json['data'];
        renderJenisSelection(dataJenis);
      },
      error: function(e) {}
    });
  }


  function renderJenisSelection(data){
    EditModal.edit_id_jenis.empty();
    EditModal.edit_id_jenis.append($('<option>', { value: "", text: "-- Pilih Jenis --"}));
    Object.values(data).forEach((d) => {
      EditModal.edit_id_jenis.append($('<option>', {
        value: d['id_jenis_penginapan'],
        text: d['id_jenis_penginapan'] + ' :: ' + d['nama_jenis_penginapan'],
      }));
    });
  }


});
</script>