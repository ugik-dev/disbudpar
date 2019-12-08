<div class="wrapper wrapper-content animated fadeInRight">
  <div class="ibox ssection-container">
    <div class="ibox-content">
      <form class="form-inline" id="toolbar_form" onsubmit="return false;">
        
        <button type="submit" class="btn btn-success my-1 mr-sm-2" id="show_btn"  data-loading-text="Loading..." onclick="this.form.target='show'"><i class="fal fa-eye"></i> Tampilkan</button>
      </form>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="ibox">
        <div class="ibox-content">
          <div class="table-responsive">
            <table id="FDataTable" class="table table-bordered table-hover" style="padding:0px">
              <thead>
                <tr>
                 
                  <th style="width: 15%; text-align:center!important">Nama Kegiatan</th>
                  <th style="width: 12%; text-align:center!important">Kategori</th>
                  <th style="width: 12%; text-align:center!important">Pelaksana</th>
                  <th style="width: 12%; text-align:center!important">Tanggal</th>
                  <th style="width: 12%; text-align:center!important">Tanggal Berakhir</th>
                  <th style="width: 12%; text-align:center!important">Jumlah Penonton</th>
                  
                  <th style="width: 10%; text-align:center!important">Approval</th>
                  <th style="width: 7%; text-align:center!important">Action</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal inmodal" id="pagelaran_modal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Kelola Pagelaran dan Pameran</h4>
        <span class="info"></span>
      </div>
      <div class="modal-body" id="modal-body">              
        <form role="form" id="user_form" onsubmit="return false;" type="multipart" autocomplete="off">
          <input type="hidden" id="id_pagelaran" name="id_pagelaran">
          <div class="form-group">
            <label for="nama">Nama Kegiatan</label> 
            <input type="text" placeholder="Nama Kegiatan" class="form-control" id="nama" name="nama" required="required">
          </div>
          <div class="form-group">
            <label for="id_jenis_pagelaran">Kategori</label> 
            <select class="form-control mr-sm-2" id="id_jenis_pagelaran" name="id_jenis_pagelaran" required="required">
            </select>
          </div>
          <div class="form-group">
            <label for="id_senibudaya">Pelaksana</label> 
            <select class="form-control mr-sm-2" id="id_senibudaya" name="id_senibudaya" required="required">
            </select>
          </div>
          <div class="form-group">
            <label for="tanggal_kegiatan">Tanggal Kegiatan</label> 
            <input type="date" placeholder="" class="form-control" id="tanggal_kegiatan" name="tanggal_kegiatan" required="required">    
          </div>
          <div class="form-group">
            <label for="tanggal_kegiatan">Berakhir Tanggal Kegiatan</label> 
            <input type="date" placeholder="" class="form-control" id="tanggal_kegiatan_end" name="tanggal_kegiatan_end" required="required">    
          </div>
          <div class="form-group">
            <label for="jumlah_penonton">Jumlah Penonton</label> 
            <input type="number" placeholder="Jumlah Penonton" class="form-control" id="jumlah_penonton" name="jumlah_penonton" required="required">    
          </div>
          <div class="form-group">
            <label for="deskripsi">Deskripsi</label> 
            <input type="text" placeholder="Deskripsi" class="form-control" id="deskripsi" name="deskripsi" required="required">
          </div>



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
  $('#pagelaran').addClass('active');

  var toolbar = {
    'form': $('#toolbar_form'),
    'showBtn': $('#show_btn'),
    'addBtn': $('#show_btn'),
  }

  var FDataTable = $('#FDataTable').DataTable({
    'columnDefs': [],
    deferRender: true,
    "order": [[ 0, "desc" ]]
  });


  var PagelaranModal = {
    'self': $('#pagelaran_modal'),
    'info': $('#pagelaran_modal').find('.info'),
    'form': $('#pagelaran_modal').find('#user_form'),
    
    'saveEditBtn': $('#pagelaran_modal').find('#save_edit_btn'),
    'id_pagelaran': $('#pagelaran_modal').find('#id_pagelaran'),
    'nama': $('#pagelaran_modal').find('#nama'),
    'id_jenis_pagelaran': $('#pagelaran_modal').find('#id_jenis_pagelaran'),
    'nama_jenis_pagelaran': $('#pagelaran_modal').find('#nama_jenis_pagelaran'),
    'id_senibudaya': $('#pagelaran_modal').find('#id_senibudaya'),
    'nama_senibudaya': $('#pagelaran_modal').find('#nama_senibudaya'),
    'jumlah_penonton': $('#pagelaran_modal').find('#jumlah_penonton'),
    'tanggal_kegiatan': $('#pagelaran_modal').find('#tanggal_kegiatan'),
    'tanggal_kegiatan_end': $('#pagelaran_modal').find('#tanggal_kegiatan_end'),
    'file': $('#pagelaran_modal').find('#file'),
    'lokasi': $('#pagelaran_modal').find('#lokasi'),
    'deskripsi': $('#pagelaran_modal').find('#deskripsi'),
  }

  var swalSaveConfigure = {
    title: "Konfirmasi simpan",
    text: "Yakin akan menyimpan data ini?",
    type: "info",
    showCancelButton: true,
    confirmButtonColor: "#18a689",
    confirmButtonText: "Ya, Simpan!",
  };

  var swalDeleteConfigure = {
    title: "Konfirmasi hapus",
    text: "Yakin akan menghapus data ini?",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Ya, Hapus!",
  };

  var dataPagelaran = {};
  var dataJ = {};
  var dataJ2 = {};

  toolbar.form.submit(function(event){
    event.preventDefault();
    switch(toolbar.form[0].target){
      case 'show':
        getPagelaran();
        break;
      case 'add':
        showPagelaranModal();
        break;
    }
  });

  getAllJenis();  
  function getAllJenis(){
    return $.ajax({
      url: `<?php echo site_url('PagelaranController/getAllJenisOption/')?>`, 'type': 'GET',
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
    PagelaranModal.id_jenis_pagelaran.empty();
    PagelaranModal.id_jenis_pagelaran.append($('<option>', { value: "", text: "-- Pilih Kategori --"}));
    Object.values(data).forEach((d) => {
      PagelaranModal.id_jenis_pagelaran.append($('<option>', {
        value: d['id_jenis_pagelaran'],
        text: d['id_jenis_pagelaran'] + ' :: ' + d['nama_jenis_pagelaran'],
      }));
    });
  }
  
  getAllSenibudaya();  
  function getAllSenibudaya(){
    return $.ajax({
      url: `<?php echo site_url('PagelaranController/getAllSenibudayaOption/')?>`, 'type': 'GET',
      data: {},
      success: function (data){
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }
        dataJenis = json['data'];
        renderSenibudayaSelection(dataJenis);
      },
      error: function(e) {}
    });
  }


   function renderSenibudayaSelection(data){
    PagelaranModal.id_senibudaya.empty();
    PagelaranModal.id_senibudaya.append($('<option>', { value: "", text: "-- Pilih Pelaksana --"}));
    Object.values(data).forEach((d) => {
      PagelaranModal.id_senibudaya.append($('<option>', {
        value: d['id_senibudaya'],
        text: d['id_senibudaya'] + ' :: ' + d['nama_senibudaya'],
      }));
    });
  }

  

  function getPagelaran(){
    buttonLoading(toolbar.showBtn);
    $.ajax({
      url: `<?=site_url('PagelaranController/getAllPagelaran')?>`, 'type': 'GET',
      data: {},
      success: function (data){
        buttonIdle(toolbar.showBtn);
        var json = JSON.parse(data);
        if(json['error']){
          swal("Simpan Gagal", json['message'], "error");
          return;
        }
        dataPagelaran = json['data'];
        renderPagelaran(dataPagelaran);
      },
      error: function(e) {}
    });
  }

  function renderPagelaran(data){
    if(data == null || typeof data != "object"){
      console.log("User::UNKNOWN DATA");
      return;
    }
    var i = 0;
    
    var renderData = [];
    Object.values(data).forEach((pagelaran) => {
      var apprv;
      if(pagelaran['id_user_approv']=='0'){
        apprv= "Belum Di Approv"
        }else{
          apprv = "Sudah Di Approv";
        };
      var detailButton =`
      <a class="detail dropdown-item" href='<?=site_url()?>PimpinanController/DetailPagelaran?id_pagelaran=${pagelaran['id_pagelaran']}'><i class='fa fa-share'></i> Detail </a>
      `; 
      var button = `
        <div class="btn-group" role="group">
          <button id="action" type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class='fa fa-bars'></i></button>
          <div class="dropdown-menu" aria-labelledby="action">
          ${detailButton}
           
          </div>
        </div>
      `;
      renderData.push([ pagelaran['nama'], pagelaran['nama_jenis_pagelaran'], pagelaran['nama_senibudaya'],pagelaran['tanggal_kegiatan'],pagelaran['tanggal_kegiatan_end'],pagelaran['jumlah_penonton'],apprv, button]);
    });
    FDataTable.clear().rows.add(renderData).draw('full-hold');
  }

});
</script>