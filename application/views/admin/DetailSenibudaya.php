

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
                <label for="formGroupExampleInput">Nama Seni Budaya</label>
                <input type="text" class="form-control" id="namasenibudaya"  readonly="readonly">
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">Kabupaten / Kota</label>
                <input type="text" class="form-control" id="kabupaten" readonly="readonly">
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
                <label for="formGroupExampleInput">Jummlah Anggota</label>
                <input type="text" class="form-control" id="jumlahanggota" readonly="readonly">
              </div>
         
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="formGroupExampleInput">Jenis Seni Budaya</label>
                  <input type="text" class="form-control" id="j" readonly="readonly">
                </div>
                <div class="form-group col-md-6">
                  <label for="formGroupExampleInput">Sub-Jenis Seni Budaya</label>
                  <input type="text" class="form-control" id="j2" readonly="readonly">
                </div>
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
            <button class="btn btn-success my-1 mr-sm-2" type="submit" id="edit_profil_btn" onclick="myFunction()" data-loading-text="Loading..."><strong>Ubah Data Seni Budaya</strong></button>
          </div><!-- profil -->
          </div><!-- ibox content -->
      </div> <!-- ibox -->
      <div class="ibox">
        <div class="ibox-content">
              <label for="formGroupExampleInput">Photo Header</label>
              <div class="form-row">
                <form class="form-row col-md-12" id="form_upload1" onsubmit="return false;" >
                  <div class="form-group" style="width : 60%;">
                          <input type="text" class="form-control" id="file" name="fileold" hidden>
                          <input type="text" class="form-control" id="id_senibudayatoupload1" name="id_senibudaya" hidden>
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
                        <input type="text" class="form-control" id="id_senibudayatoupload2" name="id_senibudaya" hidden >
                        <input type="file" name="file2" id="fileupload2">
                  </div>
                  <div class="form-group" style="width : 40%;">
                    <button type="submit" class="btn btn-success my-1 mr-sm-2" data-loading-text="Loading..." style="width : 100%;">Tambahkan Photo</button>
                  </div>
                </form>               
              </div>
              <label for="formGroupExampleInput">Dokumen</label>
              <div class="form-row">
                  <form class="form-row col-md-12" id="form_uploaddokumen" onsubmit="return false;">
                    <div class="form-group" bordered='1px solid' style="width : 100%;">             
                      <input type="text" class="form-control" id="dokumen" name="namadokumen" readonly>
                    </div>
                        
                    <div class="form-group" style="width : 60%;">
                            <input type="text" class="form-control" id="id_senibudayatoupload4" name="id_senibudaya" hidden>
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
                 <div class="panel-body" id="input_modal">
                    <div class="form-group col-md-12">
                      <div id="iframepdf"> </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>



  <!-- <div class="ibox">
    <div class="ibox-content" id="input_modal">
      <div class="form_group">
       <select class="dropdown-item" id="tahun_input" name="tahun_input" required="required"></select>
          </div>
      <form class="form" id="pengujung_form" onsubmit="return false;">
        <input type="hidden" id="id_senibudaya" name="id_senibudaya" readonly="readonly">
           <div id="input_data_pengunjung">
         
        </div>
      </form>
    </div>
  </div> -->

  
<div class="modal inmodal" id="edit_modal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Kelola Senibudaya</h4>
        <span class="info"></span>
      </div>
      <div class="modal-body" id="modal-body">              
        <form role="form" id="user_form" onsubmit="return false;" type="multipart" autocomplete="off">
          <input type="text" id="edit_id_senibudaya" name="id_senibudaya" hidden>
          <div class="form-group">
            <label for="nama">Nama Senibudaya</label> 
            <input type="text" placeholder="Nama Senibudaya" class="form-control" id="edit_nama" name="nama" required="required">
          </div>
          <div class="form-group">
                <label for="kabupaten">Kabupaten / Kota</label> 
                <select class="form-control mr-sm-2" id="edit_id_kabupaten" name="id_kabupaten" required="required">
                </select>
              </div>
          <div class="form-group">
            <label for="j">Jenis Seni budaya</label> 
            <select class="form-control mr-sm-2" id="edit_id_j" name="id_j_senibudaya" required="required">
            </select>
          </div>
          <div class="form-group">
            <label for="j">Sub-Jenis Seni budaya </label> 
            <select class="form-control mr-sm-2" id="edit_id_j2" name="id_j2_senibudaya" required="required">
            </select>
          </div>
          
          <!-- <div class="form-group">
            <label for="file">File</label> 
            <input type="file" placeholder="File" class="form-control" id="file" name="file" required="required">
          </div> -->
          <div class="form-group">
            <label for="alamat">Alamat</label> 
            <input type="text" placeholder="Alamat" class="form-control" id="edit_alamat" name="alamat" required="required">
          </div>
          <div class="form-group">
            <label for="lokasi">Lokasi</label> 
            <input type="text" placeholder="Lokasi" class="form-control" id="edit_lokasi" name="lokasi" required="required">
          </div>
          <div class="form-group">
            <label for="lokasi">Jumlah Anggota</label> 
            <input type="text" placeholder="Lokasi" class="form-control" id="edit_jumlahanggota" name="jumlahanggota" required="required">
          </div>
          <div class="form-group">
            <label for="deskripsi">Deskripsi</label> 
            <input type="text" placeholder="Deskripsi" class="form-control" id="edit_deskripsi" name="deskripsi" required="required">
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


<script>
$(document).ready(function() {
  $('#seni_dan_budaya').addClass('active');
  $('#senibudaya').addClass('active');
  var id_senibudaya = "<?=$contentData['id_senibudaya']?>";
  console.log(id_senibudaya);
  var dataProfil;
  var dataTahun

  getProfil();




$('#form_upload1').submit(function(e){
  console.log('file1upload')
            e.preventDefault(); 
                 $.ajax({
                     url:`<?=site_url('DetailSenibudayaController/do_upload')?>`,
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
                     url:`<?=site_url('DetailSenibudayaController/do_upload2')?>`,
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
                     url:`<?=site_url('DetailSenibudayaController/do_upload4')?>`,
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
    'id_senibudaya': $('#id_senibudaya2'),
    'showBtn': $('#show_btn'),
  }
  toolbar.id_senibudaya.val(id_senibudaya);
  console.log('idcgar',id_senibudaya)

  var FDataTable = $('#FDataTable').DataTable({
    'columnDefs': [],
    deferRender: true,
    "order": [[ 0, "desc" ]]
  });

  var InputModal = {

    'form': $('#input_modal').find('#pengujung_form'),
    'addBtn': $('#input_modal').find('#add_btn'),
    'save_pengunjung': $('#input_modal').find('#save_pengunjung'),
    'id_senibudaya': $('#input_modal').find('#id_senibudaya'),
    'id_data_senibudaya': $('#input_modal').find('#id_data_senibudaya'),
    'nomor': $('#input_modal').find('#nomor'),
    'tahun': $('#input_modal').find('#tahun_input'),
    'bulan': $('#input_modal').find('#bulan'),
    'nama': $('#input_modal').find('#nama'),
    'domestik_l': $('#input_modal').find('#domestik_l'),
    'mancanegara_l': $('#input_modal').find('#mancanegara_l'),
    'domestik_p': $('#input_modal').find('#domestik_p'),
    'mancanegara_p': $('#input_modal').find('#mancanegara_p'),
    'jumlahanggota': $('#input_modal').find('#jumlahanggota'),
    
    
  }
  InputModal.id_senibudaya.val(id_senibudaya);


  var EditModal = {
    'self': $('#edit_modal'),
    'info': $('#edit_modal').find('.info'),
    'form': $('#edit_modal').find('#user_form'),
    'addBtn': $('#edit_modal').find('#add_btn'),
    'saveEditBtn': $('#edit_modal').find('#save_edit_btn'),
    'edit_id_senibudaya': $('#edit_modal').find('#edit_id_senibudaya'),
    'id_data_senibudaya': $('#edit_modal').find('#id_data_senibudaya'),
    'edit_nama': $('#edit_modal').find('#edit_nama'),
    'edit_alamat': $('#edit_modal').find('#edit_alamat'),
    'edit_lokasi': $('#edit_modal').find('#edit_lokasi'),
    'edit_jumlahanggota': $('#edit_modal').find('#edit_jumlahanggota'),
    'edit_deskripsi': $('#edit_modal').find('#edit_deskripsi'),
    'edit_id_j': $('#edit_modal').find('#edit_id_j'),
    'edit_id_j2': $('#edit_modal').find('#edit_id_j2'),
    'edit_id_kabupaten': $('#edit_modal').find('#edit_id_kabupaten'),
    
  }
  // EditModal.edit_id_senibudaya.val(id_senibudaya);
  // EditModal.edit_nama.val(dataProfil['nama']);
  
  // EditModal.edit_alamat.val(dataProfil['alamat']);
  // EditModal.edit_deskripsi.val(dataProfil['deskripsi']);

document.getElementById("edit_profil_btn").onclick = function() {myFunction()};
function myFunction() {
  console.log('cok');
    EditModal.self.modal('show');
    EditModal.addBtn.hide();
    EditModal.saveEditBtn.show();
    EditModal.edit_id_senibudaya.val(id_senibudaya);
    EditModal.edit_nama.val(dataProfil['nama']);
    EditModal.edit_alamat.val(dataProfil['alamat']);
    EditModal.edit_lokasi.val(dataProfil['lokasi']);
    EditModal.edit_deskripsi.val(dataProfil['deskripsi']);
    EditModal.edit_id_j.val(dataProfil['id_j_senibudaya']);
    renderJ2Selection(dataJ2, EditModal.edit_id_j.val());
    EditModal.edit_id_j2.val(dataProfil['id_j2_senibudaya']);
    EditModal.edit_jumlahanggota.val(dataProfil['jumlahanggota']);
    EditModal.edit_id_kabupaten.val(dataProfil['id_kabupaten']);
  
   
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


  var dataDetailSenibudaya = {};
  var dataJenis = {};

  toolbar.form.submit(function(event){
    event.preventDefault();
    switch(toolbar.form[0].target){
      case 'show':
        getDetailSenibudaya();
        break;
      case 'add':
        showDetailSenibudayaModal();
        break;
    }
  });
  
  function getProfil(){
    $.ajax({
      url: `<?=site_url('DetailSenibudayaController/getProfil')?>`, 'type': 'GET',
      data: {id_senibudaya : id_senibudaya},
      success: function (data){
        var json = JSON.parse(data);
        dataProfil = json['data'];
        initMap();
        var nama = document.getElementById("namasenibudaya");
        var alamat = document.getElementById("alamat");
        var jumlahanggota = document.getElementById("jumlahanggota");
       
        var j = document.getElementById("j");
        var j2 = document.getElementById("j2");
        var deskripsi = document.getElementById("deskripsi");
        var approv = document.getElementById("approv");
        var kordinat = document.getElementById("kordinat");
        var file = document.getElementById("file");
        var fileimg = document.getElementById("fileimg");
        var fil2 = document.getElementById("file2");
        var file2img = document.getElementById("file2img");
        var kabupaten = document.getElementById("kabupaten");
        var dokumen = document.getElementById("dokumen");
        var dokumensrc = document.getElementById("dokumensrc");
        var id_upload1 = document.getElementById("id_senibudayatoupload1");
        var id_upload2 = document.getElementById("id_senibudayatoupload2");
        
        var id_upload4 = document.getElementById("id_senibudayatoupload4");
        var nama_user_entry = document.getElementById("nama_user_entry");
      //  var edit_profil_btn = document.getElementById("edit_profil_btn");
        nama_user_entry
        id_upload1.value = id_senibudaya;
        id_upload2.value = id_senibudaya;
     
        id_upload4.value = id_senibudaya;
        nama.value = dataProfil['nama'];
        alamat.value = dataProfil['alamat'];
        jumlahanggota.value = dataProfil['jumlahanggota'];
        kabupaten.value = dataProfil['nama_kabupaten'];
        
        j.value = dataProfil['nama_j_senibudaya'];
        j2.value = dataProfil['nama_j2_senibudaya'];
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
        fileimg.src = `<?= base_url('upload/file/')?>`+dataProfil['file'];
        file2.value = dataProfil['file2'];
       // file2img.src = `<?= base_url('upload/file2/')?>`+dataProfil['file2'];
       
        dokumen.value = dataProfil['dokumen'];
         renderPhoto();
         renderPdf();
        //console.log(dataProfil)
        //renderDetailSenibudaya(dataDetailSenibudaya);
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
        url: `<?=site_url('DetailSenibudayaController/getUser')?>`, 'type': 'GET',
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
        url: `<?=site_url('DetailSenibudayaController/getUser')?>`, 'type': 'GET',
        data: {id_user : id_user },
        success: function (data){         
          var json = JSON.parse(data);
        data = json['data'];
        nama_user_entry.value = data['nama'];      
        },
        error: function(e) {}
        });
    }

  function getDetailSenibudaya(){
    buttonLoading(toolbar.showBtn);
    console.log(toolbar.form.serialize());
    $.ajax({
      url: `<?=site_url('DetailSenibudayaController/getAllDetailSenibudaya')?>`, 'type': 'GET',
      data: {id_senibudaya : id_senibudaya},
      success: function (data){
        buttonIdle(toolbar.showBtn);
        var json = JSON.parse(data);
        if(json['error']){
          swal("Simpan Gagal", json['message'], "error");
          return;
        }
        dataDetailSenibudaya = json['data'];
        renderDetailSenibudaya(dataDetailSenibudaya);
      },
      error: function(e) {}
    });
  }

  function getInputPengunjung(){

    console.log(toolbar.form.serialize());
    $.ajax({
      url: `<?=site_url('DetailSenibudayaController/getAllDetailSenibudaya')?>`, 'type': 'GET',
      data: {id_senibudaya : id_senibudaya, tahun: InputModal.tahun.val() },
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

        </div>`;
    Object.values(data).forEach((d) => {
      tmpdl += Number(d['domestik_l']);
      tmpdp += Number(d['domestik_p']);
      tmpml += Number(d['mancanegara_l']);
      tmpmp += Number(d['mancanegara_p']);
      tmpjumlah += Number(d['jumlah']);
      tmppajak += Number(d['pajak']);
       intputhtml +=`
      <div class="form-row">
          <div class="col-2">
            <label>${d['nama_bulan']} :</label>
            <input type="number" class="form-control" name="id_data_senibudaya${i}" value="${d['id_data_senibudaya']}" hidden>
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
        </div>
      `;
      i++;
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
        </div>
      `;
    intputhtml +=`  <button type="submit" class="btn btn-success my-1 mr-sm-2" id="save_pengunjung"  data-loading-text="Loading..." onclick="this.form.target='save'"><i class="fal fa-save"></i> Simpan Data</button> `;
      var input_data_pengunjung = document.getElementById("input_data_pengunjung");  
        input_data_pengunjung.innerHTML = intputhtml;
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
        url: `<?=site_url('DetailSenibudayaController/savePengunjung')?>`, 'type': 'POST',
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
          //dataDetailSenibudaya[detailsenibudaya['nomor']] = detailsenibudaya;
          
          getInputPengunjung();
          // DetailSenibudayaModal.self.modal('hide');
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
                  <img src="${tmp}" class="img-fluid" id='file2img' alt="Responsive image" style='height: 200px;'>            
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
  getAllKabupaten();  
  function getAllKabupaten(){
    return $.ajax({
      url: `<?php echo site_url('AdminController/getAllKabupaten/')?>`, 'type': 'GET',
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
  function delPhoto(photo){
    swal(swalDelPhoto).then((result) => {
      if(!result.value){ return; }
      $.ajax({
        url: `<?=site_url('DetailSenibudayaController/delPhoto')?>`, 'type': 'POST',
        data: {id_senibudaya : id_senibudaya, hapus : photo, file2 : dataProfil['file2']} ,
        success: function (data){
        getProfil();
          //var dataPengunjung = json['data']
          //dataDetailSenibudaya[detailsenibudaya['nomor']] = detailsenibudaya;
          
         // getInputPengunjung();
          // DetailSenibudayaModal.self.modal('hide');
        },
        error: function(e) {}
      });
    });
    }

  
/* myFunction toggles between adding and removing the show class, which is used to hide and show the dropdown content */

  function renderDetailSenibudaya(data){
    if(data == null || typeof data != "object"){
      console.log("User::UNKNOWN DATA");
      return;
    }
    var i = 0;
    
    var renderData = [];
    Object.values(data).forEach((detailsenibudaya) => {
      renderData.push([detailsenibudaya['nomor'], detailsenibudaya['tahun'],detailsenibudaya['nama_bulan'],detailsenibudaya['domestik'], detailsenibudaya['mancanegara'],detailsenibudaya['jumlah']]);
    });
    FDataTable.clear().rows.add(renderData).draw('full-hold');
  }



  EditModal.form.submit(function(event){
    event.preventDefault();
    switch(EditModal.form[0].target){
      case 'edit':
        editDetailSenibudaya();
        break;
    }
  });


  function editDetailSenibudaya(){
    swal(swalSaveConfigure).then((result) => {
      if(!result.value){ return; }
      buttonLoading(EditModal.saveEditBtn);
      $.ajax({
        url: `<?=site_url('DetailSenibudayaController/editDetailSenibudaya')?>`, 'type': 'POST',
        data: EditModal.form.serialize(),
        success: function (data){
          buttonIdle(EditModal.saveEditBtn);
          var json = JSON.parse(data);
          if(json['error']){
            swal("Simpan Gagal", json['message'], "error");
            return;
          }
          var detailsenibudaya = json['data']
          console.log(detailsenibudaya);
          getProfil();
          swal("Simpan Berhasil", "", "success");
         // renderDetailSenibudaya(dataDetailSenibudaya);
          EditModal.self.modal('hide');
        },
        error: function(e) {}
      });
    });
    }
    
    getTahun();  
    function getTahun(){
    return $.ajax({
      url: `<?php echo site_url('DetailSenibudayaController/getTahun/')?>`, 'type': 'GET',
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

  //
  getAllJ();  
  function getAllJ(){
    return $.ajax({
      url: `<?php echo site_url('SenibudayaController/getAllJOption/')?>`, 'type': 'GET',
      data: {},
      success: function (data){
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }
        dataJ = json['data'];
        renderJSelection(dataJ);
      },
      error: function(e) {}
    });
  }
  getAllJ2();  
  function getAllJ2(){
    return $.ajax({
      url: `<?php echo site_url('SenibudayaController/getAllJ2Option/')?>`, 'type': 'GET',
      data: {},
      success: function (data){
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }
        dataJ2 = json['data'];
        renderJ2Selection(dataJ2,null);
        registerJSelectionChange();
      },
      error: function(e) {}
    });
  }

  function registerJSelectionChange(){
    EditModal.edit_id_j.on('change', function(e){
      renderJ2Selection(dataJ2, EditModal.edit_id_j.val());
    });    
  }
   function renderJSelection(data){
    EditModal.edit_id_j.empty();
    EditModal.edit_id_j.append($('<option>', { value: "", text: "-- Pilih Jenis --"}));
    Object.values(data).forEach((d) => {
      EditModal.edit_id_j.append($('<option>', {
        value: d['id_j_senibudaya'],
        text: d['id_j_senibudaya'] + ' :: ' + d['nama_j_senibudaya'],
      }));
    });
  }

   function renderJ2Selection(data, idj){
    EditModal.edit_id_j2.empty();
    EditModal.edit_id_j2.append($('<option>', { value: "", text: "-- Pilih Sub Jenis --"}));
    Object.values(data).filter((e) => e['id_j_senibudaya'] == idj).forEach((d) => {
      EditModal.edit_id_j2.append($('<option>', {
        value: d['id_j2_senibudaya'],
        text: d['id_j2_senibudaya'] + ' :: ' + d['nama_j2_senibudaya'],
      }));
    });
  }  
// 
  //   getAllJenis();  
  //   function getAllJenis(){
  //   return $.ajax({
  //     url: `<?php echo site_url('SenibudayaController/getAllJenisOption/')?>`, 'type': 'GET',
  //     data: {},
  //     success: function (data){
  //       var json = JSON.parse(data);
  //       if(json['error']){
  //         return;
  //       }
  //       dataJenis = json['data'];
  //       renderJenisSelection(dataJenis);
  //     },
  //     error: function(e) {}
  //   });
  // }


  // function renderJenisSelection(data){
  //   EditModal.edit_id_j.empty();
  //   EditModal.edit_id_j.append($('<option>', { value: "", text: "-- Pilih Jenis --"}));
  //   Object.values(data).forEach((d) => {
  //     EditModal.edit_id_j.append($('<option>', {
  //       value: d['id_j_senibudaya'],
  //       text: d['id_j_senibudaya'] + ' :: ' + d['nama_j_senibudaya'],
  //     }));
  //   });
  // }


});
</script>