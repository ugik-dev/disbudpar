<div class="wrapper wrapper-content animated fadeInRight">
  <div class="ibox ssection-container">
    <div class="ibox-content">
      <form class="form-inline" id="toolbar_form" onsubmit="return false;">
        
        <button type="submit" class="btn btn-success my-1 mr-sm-2" id="show_btn"  data-loading-text="Loading..." onclick="this.form.target='show'"><i class="fal fa-eye"></i> Tampilkan</button>
        <button type="submit" class="btn btn-primary my-1 mr-sm-2" id="add_btn"  data-loading-text="Loading..." onclick="this.form.target='add'"><i class="fal fa-plus"></i> Tambah</button>
        <a type="" class="btn btn-light my-1 mr-sm-2" id="export_btn"  data-loading-text="Loading..."><i class="fal fa-download"></i> Export PDF</a>
   
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
                  <th style="width: 12%; text-align:center!important">Tempat Acara</th>

                  
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
    'addBtn': $('#pagelaran_modal').find('#add_btn'),
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
  document.getElementById("export_btn").href = '<?= site_url('AdminController/PdfAllPagelaran')?>';


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
      <a class="detail dropdown-item" href='<?=site_url()?>AdminController/DetailPagelaran?id_pagelaran=${pagelaran['id_pagelaran']}'><i class='fa fa-share'></i> Detail </a>
      `; 
      var editButton = `
        <a class="edit dropdown-item" data-id='${pagelaran['id_pagelaran']}'><i class='fa fa-pencil'></i> Edit Seni Budaya</a>
      `;
      var deleteButton = `
        <a class="delete dropdown-item" data-id='${pagelaran['id_pagelaran']}'><i class='fa fa-trash'></i> Hapus Seni Budaya</a>
      `;
      var button = `
        <div class="btn-group" role="group">
          <button id="action" type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class='fa fa-bars'></i></button>
          <div class="dropdown-menu" aria-labelledby="action">
          ${detailButton}
            ${editButton}
            ${deleteButton}
          </div>
        </div>
      `;
      renderData.push([ pagelaran['nama'], pagelaran['nama_jenis_pagelaran'], pagelaran['nama_senibudaya'],pagelaran['tanggal_kegiatan'],pagelaran['alamat'],apprv, button]);
    });
    FDataTable.clear().rows.add(renderData).draw('full-hold');
  }

  
  FDataTable.on('click','.edit', function(){
    event.preventDefault();
    PagelaranModal.form.trigger('reset');
    PagelaranModal.self.modal('show');
    PagelaranModal.addBtn.hide();
    PagelaranModal.saveEditBtn.show();
    var id = $(this).data('id');
    var pagelaran = dataPagelaran[id];
    PagelaranModal.id_pagelaran.val(pagelaran['id_pagelaran']);
    PagelaranModal.nama.val(pagelaran['nama']);
    PagelaranModal.jumlah_penonton.val(pagelaran['jumlah_penonton']);
    PagelaranModal.id_jenis_pagelaran.val(pagelaran['id_jenis_pagelaran']);
    PagelaranModal.id_senibudaya.val(pagelaran['id_senibudaya']);
    PagelaranModal.tanggal_kegiatan.val(pagelaran['tanggal_kegiatan']);
    PagelaranModal.tanggal_kegiatan_end.val(pagelaran['tanggal_kegiatan_end']);
    PagelaranModal.file.val(pagelaran['file']);
    PagelaranModal.lokasi.val(pagelaran['lokasi']);
    PagelaranModal.deskripsi.val(pagelaran['deskripsi']);
  });

  FDataTable.on('click','.delete', function(){
    event.preventDefault();
    var id = $(this).data('id');
    swal(swalDeleteConfigure).then((result) => {
      if(!result.value){ return; }
      $.ajax({
        url: "<?=site_url('PagelaranController/deletePagelaran')?>", 'type': 'POST',
        data: {'id_pagelaran': id},
        success: function (data){
          var json = JSON.parse(data);
          if(json['error']){
            swal("Delete Gagal", json['message'], "error");
            return;
          }
          delete dataPagelaran[id];
          swal("Delete Berhasil", "", "success");
          renderPagelaran(dataPagelaran);
        },
        error: function(e) {}
      });
    });
  });

  function showPagelaranModal(){
    PagelaranModal.self.modal('show');
    PagelaranModal.addBtn.show();
    PagelaranModal.saveEditBtn.hide();
    PagelaranModal.form.trigger('reset');
  }

  PagelaranModal.form.submit(function(event){
    event.preventDefault();
    switch(PagelaranModal.form[0].target){
      case 'add':
        addPagelaran();
        break;
      case 'edit':
        editPagelaran();
        break;
    }
  });

  function addPagelaran(){
    swal(swalSaveConfigure).then((result) => {
      if(!result.value){ return; }
      buttonLoading(PagelaranModal.addBtn);
      $.ajax({
        url: `<?=site_url('PagelaranController/addPagelaran')?>`, 'type': 'POST',
        data: PagelaranModal.form.serialize(),
        success: function (data){
          buttonIdle(PagelaranModal.addBtn);
          var json = JSON.parse(data);
          if(json['error']){
            swal("Simpan Gagal", json['message'], "error");
            return;
          }
          var pagelaran = json['data']
          dataPagelaran[pagelaran['id_pagelaran']] = pagelaran;
          swal("Simpan Berhasil", "", "success");
          renderPagelaran(dataPagelaran);
          PagelaranModal.self.modal('hide');
        },
        error: function(e) {}
      });
    });
  }

  
  function editPagelaran(){
    swal(swalSaveConfigure).then((result) => {
      if(!result.value){ return; }
      buttonLoading(PagelaranModal.saveEditBtn);
      $.ajax({
        url: `<?=site_url('PagelaranController/editPagelaran')?>`, 'type': 'POST',
        data: PagelaranModal.form.serialize(),
        success: function (data){
          buttonIdle(PagelaranModal.saveEditBtn);
          var json = JSON.parse(data);
          if(json['error']){
            swal("Simpan Gagal", json['message'], "error");
            return;
          }
          var pagelaran = json['data']
          dataPagelaran[pagelaran['id_pagelaran']] = pagelaran;
          swal("Simpan Berhasil", "", "success");
          renderPagelaran(dataPagelaran);
          PagelaranModal.self.modal('hide');
        },
        error: function(e) {}
      });
    });
  }
});
</script>