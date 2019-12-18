
<style>
.zoom {
  padding: 0;
  background-color: transparent;
  transition: transform .2s; /* Animation */
  width: 100%;
  height: auto;
  margin: 0 auto;
}

.zoom:hover {
  transform: scale(1.1); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
</style>
<div class="wrapper wrapper-content animated fadeInRight">
<div class="tabs-container">
            <ul class="nav nav-tabs" role="tablist">
                <li><a class="nav-link active" data-toggle="tab" href="#tab-11">Data Profil</a></li>
                <li><a class="nav-link" data-toggle="tab" href="#tab-22">Data Penumpang</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel"  id="tab-11" class="tab-pane active">
                <div class="panel-body">
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
                <label for="formGroupExampleInput">Nama Biro</label>
                <input type="text" class="form-control" id="namabiro"  readonly="readonly">
              </div>
              

 <div class="form-group">
                <label for="formGroupExampleInput">Tahun Terdata</label>
                <input type="text" class="form-control" id="terdata" readonly="readonly">
              </div>

              <div class="form-group">
                <label for="formGroupExampleInput">Alamat</label>
                <input type="text" class="form-control" id="alamat" readonly="readonly">
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">Korninat</label>
                <input type="text" class="form-control" id="kordinat" readonly="readonly">
              </div>
                <div class="form-group">
                  <label for="formGroupExampleInput">Jenis</label>
                  <input type="text" class="form-control" id="jenis" readonly="readonly">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput">Sertifikat</label>
                  <input type="text" class="form-control" id="sertifikat" readonly="readonly">
                </div>
              <div class="form-group">
                  <label for="formGroupExampleInput">Approvment</label>
                  <input type="text" class="form-control" id="approv" readonly="readonly">
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">Deskripsi</label>
                <!-- <input type="text" class="form-control" id="deskripsi" disabled> -->
                <textarea class="form-control" id="deskripsi" rows="4" disabled></textarea>
              </div>
            </form>
            <button hidden class="btn btn-success my-1 mr-sm-2" type="" id="message_btn" onclick="MessageFunction()" data-loading-text="Loading..."><strong>Kirim Pesan</strong></button>
            <button class="btn btn-success my-1 mr-sm-2" type="submit" id="edit_profil_btn" onclick="myFunction()" data-loading-text="Loading..."><strong>Ubah Data</strong></button>
            <button hidden class="btn btn-info my-1 mr-sm-2" type="submit" id="approv_profil_btn" onclick="ApprovProfil()" data-loading-text="Loading..."><strong>Approv</strong></button>
            <a type="" class="btn btn-light my-1 mr-sm-2" id="export_btn" href=""><i class="fal fa-download"></i> Export PDF</a>
     </div><!-- profil -->
          </div><!-- ibox content -->
      </div> <!-- ibox -->
     
               
                  <!--  -->
                 
           
                  <div class="ibox">
        <div class="ibox-content">
              <label for="formGroupExampleInput">Photo Header</label>
              <div class="form-row">
                <form class="form-row col-md-12" id="form_upload1" onsubmit="return false;" >
                  <div class="form-group" style="width : 60%;">
                          <input type="text" class="form-control" id="file" name="fileold" hidden>
                          <input type="text" class="form-control" id="id_birotoupload1" name="id_biro" hidden>
                          <input type="file" name="file" id="fileupload">
                  </div>
                  <div class="form-group" style="width : 40%;">
                          <button type="submit" class="btn btn-success my-1 mr-sm-2" data-loading-text="Loading..." style="width : 100%;" >Tambahkan Header</button>
                  </div>
                </form>               
              </div>  
              <label for="formGroupExampleInput">Photo</label>
              <div class="form-row">
                <form class="form-row col-md-12" id="form_upload2" onsubmit="return false;">
                  <div class="form-group" style="width : 60%;">
                        <input type="text" id="file2" name="fileold" hidden>
                        <input type="text" class="form-control" id="id_birotoupload2" name="id_biro" hidden >
                        <input type="file" name="file2" id="fileupload2">
                  </div>
                  <div class="form-group" style="width : 40%;">
                    <button type="submit" class="btn btn-success my-1 mr-sm-2" data-loading-text="Loading..." style="width : 100%;">Tambahkan Photo</button>
                  </div>
                </form>               
              </div>
              <label for="formGroupExampleInput">Dokumen (Pdf)</label>
              <div class="form-row">
                  <form class="form-row col-md-12" id="form_uploaddokumen" onsubmit="return false;">
                    <div class="form-group" bordered='1px solid' style="width : 100%;">             
                      <input type="text" class="form-control" id="dokumen" name="namadokumen" readonly>
                    </div>
                        
                    <div class="form-group" style="width : 60%;">
                            <input type="text" class="form-control" id="id_birotoupload4" name="id_biro" hidden>
                            <input type="file" name="dokumen" id="dokumenupload">
                    </div>
                    <div class="form-group" style="width : 40%;">
                      <button type="submit" class="btn btn-success my-1 mr-sm-2" data-loading-text="Loading..." style="width : 100%;"> Upload</button>
                    </div>
                   </form> 
              </div>    
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
            <div class="btn alert-primary" role="alert" id="show_photo">
              Lihat Foto
            </div>
          </div>
            <div class="form-group col-md-12" id='fileimg'>
              <!-- <img src="" class="zoom"  alt="Responsive image" style='height: 200px;'> -->
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

        </div>
        </div>
              </div>
              <div role="tabpanel" id="tab-22" class="tab-pane">
                 <div class="panel-body" >
                 <div class="ibox">
    <div class="ibox-content" id="input_modal">
      <div class="form-inline">
        <div class="form-group mb-2">
          <select class="dropdown-item" id="tahun_input" name="tahun_input" required="required"></select>
        </div>
        <div class="form-group mx-sm-3 mb-2" id="header_approv"> </div>
        <div class="form-group mb-2">
          <a type="" class="btn btn-light my-1 mr-sm-2" id="export_pengunjung_btn" href=""><i class="fal fa-download"></i> Export PDF</a>
        </div>

      </div>
      <form class="form" id="pengujung_form" onsubmit="return false;">
        <input type="hidden" id="id_biro" name="id_biro" readonly="readonly">
        <!-- form isian data pengunjung  -->
        <div id="input_data_pengunjung">
         
        </div>
      </form>
    </div>
    </div>
    </div>
              </div>
    </div>
</div>

  
<div class="modal inmodal" id="edit_modal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Kelola Biro</h4>
        <span class="info"></span>
      </div>
      <div class="modal-body" id="modal-body">              
        <form role="form" id="user_form" onsubmit="return false;" type="multipart" autocomplete="off">
          <input type="text" id="edit_id_biro" name="id_biro" hidden>
          <div class="form-group">
            <label for="nama">Nama Biro</label> 
            <input type="text" placeholder="Nama Biro" class="form-control" id="edit_nama" name="nama" required="required">
          </div>
          <div class="form-group">
            <label for="terdata">Tahun Terdata</label> 
            <select class="form-control mr-sm-2" id="edit_terdata" name="tahun_terdata" required="required">
            </select>
          </div>


          <div class="form-group">
            <label for="jenis">Jenis</label> 
            <select class="form-control mr-sm-2" id="edit_id_jenis" name="id_jenis_biro" required="required">
            </select>
          </div>
          <div class="form-group">
            <label for="sertifikat">Sertifikat</label> 
            <select class="form-control mr-sm-2" id="edit_id_sertifikat" name="id_sertifikat_biro" required="required">
            </select>
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label> 
            <input type="text" placeholder="Alamat" class="form-control" id="edit_alamat" name="alamat" required="required">
          </div>
          <div class="form-group">
            <label for="lokasi">Lokasi</label> 
            <input type="text" placeholder="Lokasi" class="form-control" id="edit_lokasi" name="lokasi" required="required">
          </div>
          <div class="form-group">
            <label for="deskripsi">Deskripsi</label> 
            <textarea rows="4" type="text" placeholder="Deskripsi" class="form-control" id="edit_deskripsi" name="deskripsi" required="required"></textarea>
          </div>



          <button class="btn btn-success my-1 mr-sm-2" type="submit" id="add_btn" data-loading-text="Loading..." onclick="this.form.target='add'"><strong>Tambah Data</strong></button>
          <button class="btn btn-success my-1 mr-sm-2" type="submit" id="save_edit_btn" data-loading-text="Loading..." onclick="this.form.target='edit'"><strong>Simpan Perubahan</strong></button>
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
            <input type="text" placeholder="Nama" class="form-control" id="nama_operator" name="" required="required" readonly>
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


<script>
$(document).ready(function() {
  $('#pariwisata').addClass('active');
  $('#biro').addClass('active');
  var id_biro = "<?=$contentData['id_biro']?>";
  console.log(id_biro);
  var dataProfil;
  var dataTahun

  getProfil();

document.getElementById("export_btn").href = '<?= site_url('OperatorController/PdfBiro?id_biro=')?>'+id_biro;
var Photo2Modal = {
    'self': $('#photo2_modal'),
    'info': $('#photo2_modal').find('.infoy'),
    'images': $('#photo2_modal').find('.carousel-inner'),
    'indicators': $('#photo2_modal').find('.carousel-indicators'),
  };
  var MessageModal = {
    'self': $('#message_modal'),
    'info': $('#message_modal').find('.info'),
    'form': $('#message_modal').find('#user_form'),
    'sendBtn': $('#message_modal').find('#send_btn'),
    'saveEditBtn': $('#message_modal').find('#save_edit_btn'),
    'edit_id_desawisata': $('#message_modal').find('#edit_id_desawisata'),
    'id_data_desawisata': $('#message_modal').find('#id_data_desawisata'),
    'id_operator': $('#message_modal').find('#id_operator'),
    'nama_operator': $('#message_modal').find('#nama_operator'),
    'message': $('#message_modal').find('#message'),
    'format_message': $('#message_modal').find('#format_message'),
  }
 
function renderPhotoModal(){
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
 
  var i = 0;
 // tmp2 =`active`;
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

   
    tmp2=``;
    i++;
    };
    });
    

  Photo2Modal.indicators.html(indicatorsHTML);
  Photo2Modal.images.html(img2HTML);
    
  }
  document.getElementById("show_photo").onclick = function() {
    showPhotoModal()
    };
  function showPhotoModal(){
  Photo2Modal.self.modal('show');
  }

  document.getElementById("message_btn").onclick = function() {MessageFunction()}
  function MessageFunction() {
    console.log('cok');
    MessageModal.nama_operator.val(nama_user_entry.value);
    MessageModal.id_operator.val(dataProfil['id_user_entry']);
    formatMessage = `Pada Biro dan Agen Perjalanan - `+dataProfil['nama']+`
`;
    MessageModal.format_message.val(formatMessage);
    MessageModal.self.modal('show'); 
  }

  MessageModal.form.submit(function(event){
    event.preventDefault();
    switch(MessageModal.form[0].target){
      case 'send':
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
        MessageModal.form.trigger('reset'); 
        MessageModal.self.modal('hide'); 
      },
      error: function(e) {}
    });
  }

getAllKabupaten();  
  function getAllKabupaten(){
    return $.ajax({
      url: `<?php echo site_url('OperatorController/getAllKabupaten/')?>`, 'type': 'GET',
      data: {},
      success: function (data){
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }
        dataKabupaten = json['data'];
        renderKabupatenSelection(dataKabupaten);
      },
      error: function(e) {}
    });
  }
  function renderKabupatenSelection(data){
    EditModal.edit_id_kabupaten.empty();
    EditModal.edit_id_kabupaten.append($('<option>', { value: "", text: "-- Pilih Kabupaten --"}));
    Object.values(data).forEach((d) => {
      EditModal.edit_id_kabupaten.append($('<option>', {
        value: d['id_kabupaten'],
        text: d['id_kabupaten'] + ' :: ' + d['nama_kabupaten'],
      }));
    });
  }


document.getElementById("approv_profil_btn").onclick = function() {ApprovProfil()};
function ApprovProfil() {
    swal(swalApprovConfigure).then((result) => {
      if(!result.value){ return; }
      $.ajax({
        url: `<?=site_url('DetailBiroController/approvBiro')?>`, 'type': 'get',
        data: {id_biro : id_biro} ,
        success: function (data){
        getProfil();
        },
        error: function(e) {}
      });
    });
}


    var swalApprovConfigure = {
    title: "Konfirmasi Approv",
    text: "Yakin akan Approv data profil ini?",
    type: "info",
    showCancelButton: true,
    confirmButtonColor: "#18a689",
    confirmButtonText: "Ya, Approv!",
    };




$('#form_upload1').submit(function(e){
  console.log('file1upload')
            e.preventDefault(); 
                 $.ajax({
                     url:`<?=site_url('DetailBiroController/do_upload')?>`,
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
                     url:`<?=site_url('DetailBiroController/do_upload2')?>`,
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
                     url:`<?=site_url('DetailBiroController/do_upload4')?>`,
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

//====== maping

var map;
 // initMap();
  function initMap() {
    if(dataProfil['lokasi']){
    var tmp = dataProfil['lokasi'];
    var tmp1  = tmp.split(",");
    
    if(!empty(tmp1[1])){
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
  }
}
//======


  var toolbar = {
    'form': $('#toolbar_form'),
    'id_biro': $('#id_biro2'),
    'showBtn': $('#show_btn'),
  }
  toolbar.id_biro.val(id_biro);
  console.log('idcgar',id_biro)

  var FDataTable = $('#FDataTable').DataTable({
    'columnDefs': [],
    deferRender: true,
    "order": [[ 0, "desc" ]]
  });

  var InputModal = {

    'form': $('#input_modal').find('#pengujung_form'),
    'addBtn': $('#input_modal').find('#add_btn'),
    'save_pengunjung': $('#input_modal').find('#save_pengunjung'),
    'id_biro': $('#input_modal').find('#id_biro'),
    'id_data_biro': $('#input_modal').find('#id_data_biro'),
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
  InputModal.id_biro.val(id_biro);


  var EditModal = {
    'self': $('#edit_modal'),
    'info': $('#edit_modal').find('.info'),
    'form': $('#edit_modal').find('#user_form'),
    'addBtn': $('#edit_modal').find('#add_btn'),
    'saveEditBtn': $('#edit_modal').find('#save_edit_btn'),
    'edit_id_biro': $('#edit_modal').find('#edit_id_biro'),
    'id_data_biro': $('#edit_modal').find('#id_data_biro'),
    'edit_nama': $('#edit_modal').find('#edit_nama'),
    'edit_alamat': $('#edit_modal').find('#edit_alamat'),
    'edit_jumlah_penonton': $('#edit_modal').find('#edit_jumlah_penonton'),
    'edit_lokasi': $('#edit_modal').find('#edit_lokasi'),
    'edit_deskripsi': $('#edit_modal').find('#edit_deskripsi'),
    'edit_id_jenis': $('#edit_modal').find('#edit_id_jenis'),
    'edit_id_sertifikat': $('#edit_modal').find('#edit_id_sertifikat'),
    'edit_tanggal_kegiatan': $('#edit_modal').find('#edit_tanggal_kegiatan'),
    'edit_tanggal_kegiatan_end': $('#edit_modal').find('#edit_tanggal_kegiatan_end'),
    'edit_id_kabupaten': $('#edit_modal').find('#edit_id_kabupaten'),
    'edit_terdata': $('#edit_modal').find('#edit_terdata'),

    
  }
  // EditModal.edit_id_biro.val(id_biro);
  // EditModal.edit_nama.val(dataProfil['nama']);
  
  // EditModal.edit_alamat.val(dataProfil['alamat']);
  // EditModal.edit_deskripsi.val(dataProfil['deskripsi']);

document.getElementById("edit_profil_btn").onclick = function() {myFunction()};
function myFunction() {
  console.log('cok');
    EditModal.self.modal('show');
    EditModal.addBtn.hide();
    EditModal.saveEditBtn.show();
    EditModal.edit_id_biro.val(id_biro);
    EditModal.edit_nama.val(dataProfil['nama']);
    EditModal.edit_alamat.val(dataProfil['alamat']);
    EditModal.edit_tanggal_kegiatan.val(dataProfil['tanggal_kegiatan']);
    EditModal.edit_tanggal_kegiatan_end.val(dataProfil['tanggal_kegiatan_end']);
    EditModal.edit_jumlah_penonton.val(dataProfil['jumlah_penonton']);
    EditModal.edit_lokasi.val(dataProfil['lokasi']);
    EditModal.edit_deskripsi.val(dataProfil['deskripsi']);
    EditModal.edit_id_jenis.val(dataProfil['id_jenis_biro']); 
    EditModal.edit_id_sertifikat.val(dataProfil['id_sertifikat_biro']);  
    EditModal.edit_id_kabupaten.val(dataProfil['id_kabupaten']);  
    EditModal.edit_terdata.val(dataProfil['tahun_terdata']); 

}


  var swalSaveConfigure = {
    title: "Konfirmasi simpan",
    text: "Yakin akan menyimpan data ini?",
    type: "info",
    showCancelButton: true,
    confirmButtonColor: "#18a689",
    confirmButtonText: "Ya, Simpan!",
  };
  var swalDelPhoto = {
    title: "Konfirmasi Hapus Foto",
    text: "Yakin akan menghapus foto ini?",
    type: "info",
    showCancelButton: true,
    confirmButtonColor: "#18a689",
    confirmButtonText: "Ya, Hapus!",
  };
  var swalNotApprov = {
    title: "Konfirmasi simpan",
    text: "Yakin akan menyimpan data ini?",
    type: "info",
    showCancelButton: true,
    confirmButtonColor: "#red",
    confirmButtonText: "Ya, Simpan!",
  };


  var dataDetailBiro = {};
  var dataJenis = {};

  toolbar.form.submit(function(event){
    event.preventDefault();
    switch(toolbar.form[0].target){
      case 'show':
        getDetailBiro();
        break;
      case 'add':
        showDetailBiroModal();
        break;
    }
  });
  
  function getProfil(){
    $.ajax({
      url: `<?=site_url('DetailBiroController/getProfil')?>`, 'type': 'GET',
      data: {id_biro : id_biro},
      success: function (data){
        var json = JSON.parse(data);
        dataProfil = json['data'];
        initMap();
        var nama = document.getElementById("namabiro");
        var alamat = document.getElementById("alamat");  
        var jenis = document.getElementById("jenis");
        var sertifikat = document.getElementById("sertifikat");
        var deskripsi = document.getElementById("deskripsi");
        var approv = document.getElementById("approv");
        var kordinat = document.getElementById("kordinat");
        var file = document.getElementById("file");
        var fileimg = document.getElementById("fileimg");
        var fil2 = document.getElementById("file2");
        var file2img = document.getElementById("file2img");
      
        var dokumen = document.getElementById("dokumen");
        var dokumensrc = document.getElementById("dokumensrc");
        var id_upload1 = document.getElementById("id_birotoupload1");
        var id_upload2 = document.getElementById("id_birotoupload2");
        
        var id_upload4 = document.getElementById("id_birotoupload4");
        var nama_user_entry = document.getElementById("nama_user_entry");
      //  var edit_profil_btn = document.getElementById("edit_profil_btn");
      var terdata = document.getElementById("terdata");
      terdata.value = dataProfil['tahun_terdata'];
      
        id_upload1.value = dataProfil['id_biro'];
        id_upload2.value = dataProfil['id_biro'];
     
        id_upload4.value = dataProfil['id_biro'];
        sertifikat.value = dataProfil['nama_sertifikat_biro'];
        nama.value = dataProfil['nama'];
        alamat.value = dataProfil['alamat'];
        jenis.value = dataProfil['nama_jenis_biro'];
        deskripsi.value = dataProfil['deskripsi'];
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
        file.value = dataProfil['file'];
       
        file2.value = dataProfil['file2'];
      
        dokumen.value = dataProfil['dokumen'];
        if(!empty(dataProfil['file'])){
          tmp = `<?= base_url('upload/file/')?>`+dataProfil['file'];
        fileimg.innerHTML = `<img src="${tmp}" class="zoom"  alt="Responsive image" style='height: 200px; width : 100%'>`;
        };
        if(!empty(dataProfil['file2']))renderPhoto();
        renderPdf();
        renderPhotoModal();
        getTahun(); 
        //renderDetailBiro(dataDetailBiro);
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
    function getUserApprov(id_user){    
      $.ajax({
        url: `<?=site_url('DetailBiroController/getUser')?>`, 'type': 'GET',
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
        url: `<?=site_url('DetailBiroController/getUser')?>`, 'type': 'GET',
        data: {id_user : id_user },
        success: function (data){         
          var json = JSON.parse(data);
        data = json['data'];
        nama_user_entry.value = data['nama'];      
        },
        error: function(e) {}
        });
    }

  function getDetailBiro(){
    buttonLoading(toolbar.showBtn);
    console.log(toolbar.form.serialize());
    $.ajax({
      url: `<?=site_url('DetailBiroController/getAllDetailBiro')?>`, 'type': 'GET',
      data: {id_biro : id_biro},
      success: function (data){
        buttonIdle(toolbar.showBtn);
        var json = JSON.parse(data);
        if(json['error']){
          swal("Simpan Gagal", json['message'], "error");
          return;
        }
        dataDetailBiro = json['data'];
        renderDetailBiro(dataDetailBiro);
      },
      error: function(e) {}
    });
  }

  function getInputPengunjung(){

    console.log(toolbar.form.serialize());
    $.ajax({
      url: `<?=site_url('DetailBiroController/getAllDetailBiro')?>`, 'type': 'GET',
      data: {id_biro : id_biro, tahun: InputModal.tahun.val() },
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
    
document.getElementById("export_pengunjung_btn").href = '<?= site_url('OperatorController/ExportPengunjung?tb=biro&id_data=')?>'+id_biro+`&tahun=`+InputModal.tahun.val();
    var i = 1;
    var tmpdl = 0;
    var tmpdp = 0;
    var tmpml = 0;
    var tmpmp = 0;
    var tmpjumlah = 0;
    var tmppajak = 0;
    var tmpretribusi = 0;
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
          <label>Pajak</label>
          </div>
          <div class="col">
          <label>Retribusi</label>
          </div>
        </div>`;
    Object.values(data).forEach((d) => {
      tmpdl += Number(d['domestik_l']);
      tmpdp += Number(d['domestik_p']);
      tmpml += Number(d['mancanegara_l']);
      tmpmp += Number(d['mancanegara_p']);
      tmpjumlah += Number(d['jumlah']);
      tmppajak += Number(d['pajak']);
      tmpretribusi += Number(d['retribusi']);
       intputhtml +=`
      <div class="form-row">
          <div class="col-2">
            <label>${d['nama_bulan']} :</label>
            <input type="number" class="form-control" name="id_data_biro${i}" value="${d['id_data_biro']}" hidden>
            <input type="number" class="form-control" name="bulan${d['bulan']}" placeholder="id_bulan" value="${d['bulan']}" hidden>
            <input type="number" class="form-control" name="tahun" placeholder="tahun" value="${d['tahun']}" hidden>
          </div>
          <div class="col">  
            <input type="number" class="form-control" name="domestik_l${i}" placeholder="" value="${d['domestik_l']}">
          </div>
          <div class="col">
            <input type="number" class="form-control" name="domestik_p${i}" placeholder="" value="${d['domestik_p']}">
          </div>
          <div class="col">
            <input type="number" class="form-control" name="mancanegara_l${i}" placeholder="" value="${d['mancanegara_l']}">
          </div>
          <div class="col">
            <input type="number" class="form-control" name="mancanegara_p${i}" placeholder=""  value="${d['mancanegara_p']}">
          </div>
          <div class="col">
            <input type="number" class="form-control" placeholder="0"  value="${d['jumlah']}" disabled>
          </div>
          <div class="col">
            <input type="number" class="form-control" name="pajak${i}" placeholder=""  value="${d['pajak']}">
          </div>
          <div class="col">
            <input type="number" class="form-control" name="retribusi${i}" placeholder=""  value="${d['retribusi']}">
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
            <input type="number" class="form-control" name="domestik_l${i}" placeholder="0" value="${tmpdl}" disabled>
          </div>
          <div class="col">
            <input type="number" class="form-control" name="domestik_p${i}" placeholder="0" value="${tmpdp}" disabled>
          </div>
          <div class="col">
            <input type="number" class="form-control" name="mancanegara_l${i}" placeholder="0" value="${tmpml}" disabled>
          </div>
          <div class="col">
            <input type="number" class="form-control" name="mancanegara_p${i}" placeholder="0"  value="${tmpmp}" disabled>
          </div>
          <div class="col">
            <input type="number" class="form-control" placeholder="0"  value="${tmpjumlah}" disabled>
          </div>
          <div class="col">
            <input type="number" class="form-control" placeholder="0"  value="${tmppajak}" disabled>
          </div>
          <div class="col">
            <input type="number" class="form-control" placeholder="0"  value="${tmpretribusi}" disabled>
          </div>
        </div>
      `;
    intputhtml +=`  <button type="submit" class="btn btn-success my-1 mr-sm-2" id="save_pengunjung"  data-loading-text="Loading..." onclick="this.form.target='save'"><i class="fal fa-save"></i> Simpan Data</button> 
    <button type="submit" class="btn btn-info my-1 mr-sm-2" id="save_pengunjung"  data-loading-text="Loading..." onclick="this.form.target='approv'" hidden><i class="fal fa-save"></i> Approv Data</button>`;
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
      case 'approv':
        approvInputPengunjung();
        break;
     
    }
  });


  function approvInputPengunjung(){
    swal(swalApprovConfigure).then((result) => {
      if(!result.value){ return; }
      buttonLoading(InputModal.save_pengunjung);
      $.ajax({
        url: `<?=site_url('DetailBiroController/approvPengunjung')?>`, 'type': 'POST',
        data: InputModal.form.serialize(),
        success: function (data){
          buttonIdle(InputModal.save_pengunjung);
          var json = JSON.parse(data);
          if(json['error']){
            swal("Simpan Gagal", json['message'], "error");
            return;
          }
          swal("Approv Berhasil", "", "success");
            getInputPengunjung();
        },
        error: function(e) {}
      });
    });
    }


  function saveInputPengunjung(){
    swal(swalSaveConfigure).then((result) => {
      if(!result.value){ return; }
      buttonLoading(InputModal.save_pengunjung);
      $.ajax({
        url: `<?=site_url('DetailBiroController/savePengunjung')?>`, 'type': 'POST',
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
          //dataDetailBiro[detailbiro['nomor']] = detailbiro;
          
          getInputPengunjung();
          // DetailBiroModal.self.modal('hide');
        },
        error: function(e) {}
      });
    });
    }

  function renderPhoto(){
    var ph = dataProfil['file2'];
    var ph1  = ph.split(",");
    console.log('banyak foto',ph1.length);
    imgHTML = `<div class="row">`;
    var i = 0;
      ph1.forEach((d) => {
      console.log(d);
      tmp = `<?= base_url('upload/file2/')?>`+d;
      imgHTML +=`
                <div class='form-group col-md-6'>
                  <a type="submit" id="del_photo${i}" >             
                  <img src="${tmp}" class="zoom" id='file2img' alt="Responsive image" style='height: 200px;'>            
                  </a>
                </div>
                `;
      i++;
      });
    var photo = document.getElementById("photo");  
    imgHTML +=`</div>`;
    photo.innerHTML = imgHTML;
    i=0;
      ph1.forEach((e) => {
        document.getElementById("del_photo"+String(i)).onclick = function() {
          console.log('hapus foto foto',e)
          delPhoto(e);
        };
        i++;
      });


    }

  function delPhoto(photo){
    swal(swalDelPhoto).then((result) => {
      if(!result.value){ return; }
      $.ajax({
        url: `<?=site_url('DetailBiroController/delPhoto')?>`, 'type': 'POST',
        data: {id_biro : id_biro, hapus : photo, file2 : dataProfil['file2']} ,
        success: function (data){
        getProfil();
          //var dataPengunjung = json['data']
          //dataDetailBiro[detailbiro['nomor']] = detailbiro;
          
         // getInputPengunjung();
          // DetailBiroModal.self.modal('hide');
        },
        error: function(e) {}
      });
    });
    }

  
/* myFunction toggles between adding and removing the show class, which is used to hide and show the dropdown content */

  function renderDetailBiro(data){
    if(data == null || typeof data != "object"){
      console.log("User::UNKNOWN DATA");
      return;
    }
    var i = 0;
    
    var renderData = [];
    Object.values(data).forEach((detailbiro) => {
      renderData.push([detailbiro['nomor'], detailbiro['tahun'],detailbiro['nama_bulan'],detailbiro['domestik'], detailbiro['mancanegara'],detailbiro['jumlah']]);
    });
    FDataTable.clear().rows.add(renderData).draw('full-hold');
  }



  EditModal.form.submit(function(event){
    event.preventDefault();
    switch(EditModal.form[0].target){
      case 'edit':
        editDetailBiro();
        break;
    }
  });


  function editDetailBiro(){
    swal(swalSaveConfigure).then((result) => {
      if(!result.value){ return; }
      buttonLoading(EditModal.saveEditBtn);
      $.ajax({
        url: `<?=site_url('DetailBiroController/editDetailBiro')?>`, 'type': 'POST',
        data: EditModal.form.serialize(),
        success: function (data){
          buttonIdle(EditModal.saveEditBtn);
          var json = JSON.parse(data);
          if(json['error']){
            swal("Simpan Gagal", json['message'], "error");
            return;
          }
          var detailbiro = json['data']
          console.log(detailbiro);
          getProfil();
          swal("Simpan Berhasil", "", "success");
         // renderDetailBiro(dataDetailBiro);
          EditModal.self.modal('hide');
        },
        error: function(e) {}
      });
    });
    }
    
    getTahun();  
    function getTahun(){
    return $.ajax({
      url: `<?php echo site_url('DetailBiroController/getTahun/')?>`, 'type': 'GET',
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
     console.log("Masuk Tahun")
    InputModal.tahun.empty();
    InputModal.tahun.append($('<option>', { value: "", text: "Tahun"}));
    data.forEach((d) => {
      if(d['tahun'] >= dataProfil['tahun_terdata']){
      InputModal.tahun.append($('<option>', {
        value: d['tahun'],
        text: d['tahun'],
      }));  
      InputModal.tahun.val(d['tahun']); 
    }
    });
    
    EditModal.edit_terdata.empty();
    EditModal.edit_terdata.append($('<option>', { value: "", text: "-- Pilih Tahun --"}));
    data.forEach((d) => {
      EditModal.edit_terdata.append($('<option>', {
        value: d['tahun'],
        text: d['tahun'],
      }));  
    });

    getInputPengunjung();
   }

  //
  getAllJenis();  
  function getAllJenis(){
    return $.ajax({
      url: `<?php echo site_url('BiroController/getAllJenisOption/')?>`, 'type': 'GET',
      data: {},
      success: function (data){
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }
        dataJ = json['data'];
        renderJenisSelection(dataJ);
      },
      error: function(e) {}
    });
  }
  
  function renderJenisSelection(data){
    EditModal.edit_id_jenis.empty();
    EditModal.edit_id_jenis.append($('<option>', { value: "", text: "-- Pilih Jenis --"}));
    Object.values(data).forEach((d) => {
      EditModal.edit_id_jenis.append($('<option>', {
        value: d['id_jenis_biro'],
        text: d['id_jenis_biro'] + ' :: ' + d['nama_jenis_biro'],
      }));
    });
  }

  getAllSertifikat();  
  function getAllSertifikat(){
    return $.ajax({
      url: `<?php echo site_url('BiroController/getAllSertifikatOption/')?>`, 'type': 'GET',
      data: {},
      success: function (data){
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }
        dataJ = json['data'];
        renderSertifikatSelection(dataJ);
      },
      error: function(e) {}
    });
  }
  
  function renderSertifikatSelection(data){
    EditModal.edit_id_sertifikat.empty();
    EditModal.edit_id_sertifikat.append($('<option>', { value: "", text: "-- Pilih Jenis --"}));
    Object.values(data).forEach((d) => {
      EditModal.edit_id_sertifikat.append($('<option>', {
        value: d['id_sertifikat_biro'],
        text: d['id_sertifikat_biro'] + ' :: ' + d['nama_sertifikat_biro'],
      }));
    });
  }

   

});
</script>