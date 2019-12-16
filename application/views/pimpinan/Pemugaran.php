<div class="wrapper wrapper-content animated fadeInRight">
  <div class="ibox ssection-container">
    <div class="ibox-content">
      <form class="form-inline" id="toolbar_form" onsubmit="return false;">
        
        <button type="submit" class="btn btn-success my-1 mr-sm-2" id="show_btn"  data-loading-text="Loading..." onclick="this.form.target='show'"><i class="fal fa-eye"></i> Tampilkan</button>
        <button hidden type="submit" class="btn btn-primary my-1 mr-sm-2" id="add_btn"  data-loading-text="Loading..." onclick="this.form.target='add'"><i class="fal fa-plus"></i> Tambah</button>
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

                  <th style="width: 12%; text-align:center!important">Nama Cagar Budaya</th>
                  
                  <th style="width: 12%; text-align:center!important">Tanggal</th>

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


<div class="modal inmodal" id="pemugaran_modal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Kelola Pemugaran</h4>
        <span class="info"></span>
      </div>
      <div class="modal-body" id="modal-body">              
        <form role="form" id="user_form" onsubmit="return false;" type="multipart" autocomplete="off">
          <input type="hidden" id="id_pemugaran" name="id_pemugaran">
          <div class="form-group">
            <label for="nama">Nama Kegiatan</label> 
            <input type="text" placeholder="Nama Kegiatan" class="form-control" id="nama" name="nama" required="required">
          </div>

          <div class="form-group">
            <label for="id_cagarbudaya">Cagar Budaya</label> 
            <select class="form-control mr-sm-2" id="id_cagarbudaya" name="id_cagarbudaya" required="required">
            </select>
          </div>
          <div class="form-group">
            <label for="tanggal_kegiatan">Tanggal Kegiatan</label> 
            <input type="date" placeholder="" class="form-control" id="tanggal_kegiatan" name="tanggal_kegiatan" required="required">    
          </div>
         
          <div class="form-group">
            <label for="deskripsi">Deskripsi</label> 
            <textarea rows="4" type="text" placeholder="Deskripsi" class="form-control" id="deskripsi" name="deskripsi" required="required"> </textarea>
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
  $('#cagar_dan_budaya').addClass('active');
  $('#pemugaran').addClass('active');

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


  var PemugaranModal = {
    'self': $('#pemugaran_modal'),
    'info': $('#pemugaran_modal').find('.info'),
    'form': $('#pemugaran_modal').find('#user_form'),
    'addBtn': $('#pemugaran_modal').find('#add_btn'),
    'saveEditBtn': $('#pemugaran_modal').find('#save_edit_btn'),
    'id_pemugaran': $('#pemugaran_modal').find('#id_pemugaran'),
    'nama': $('#pemugaran_modal').find('#nama'),
   
    
    'id_cagarbudaya': $('#pemugaran_modal').find('#id_cagarbudaya'),
    'nama_cagarbudaya': $('#pemugaran_modal').find('#nama_cagarbudaya'),
    'jumlah_penonton': $('#pemugaran_modal').find('#jumlah_penonton'),
    'tanggal_kegiatan': $('#pemugaran_modal').find('#tanggal_kegiatan'),
    'file': $('#pemugaran_modal').find('#file'),
    'lokasi': $('#pemugaran_modal').find('#lokasi'),
    'deskripsi': $('#pemugaran_modal').find('#deskripsi'),
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

  var dataPemugaran = {};
  var dataJ = {};
  var dataJ2 = {};

  toolbar.form.submit(function(event){
    event.preventDefault();
    switch(toolbar.form[0].target){
      case 'show':
        getPemugaran();
        break;
      case 'add':
        showPemugaranModal();
        break;
    }
  });



  
  
  getAllCagarbudaya();  
  function getAllCagarbudaya(){
    return $.ajax({
      url: `<?php echo site_url('PemugaranController/getAllCagarbudayaOption/')?>`, 'type': 'GET',
      data: {},
      success: function (data){
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }
        dataJenis = json['data'];
        renderCagarbudayaSelection(dataJenis);
      },
      error: function(e) {}
    });
  }


   function renderCagarbudayaSelection(data){
    PemugaranModal.id_cagarbudaya.empty();
    PemugaranModal.id_cagarbudaya.append($('<option>', { value: "", text: "-- Pilih Cagar Budaya --"}));
    Object.values(data).forEach((d) => {
      PemugaranModal.id_cagarbudaya.append($('<option>', {
        value: d['id_cagarbudaya'],
        text: d['id_cagarbudaya'] + ' :: ' + d['nama_cagarbudaya'],
      }));
    });
  }


  function getPemugaran(){
    buttonLoading(toolbar.showBtn);
    $.ajax({
      url: `<?=site_url('PemugaranController/getAllPemugaran')?>`, 'type': 'GET',
      data: {},
      success: function (data){
        buttonIdle(toolbar.showBtn);
        var json = JSON.parse(data);
        if(json['error']){
          swal("Simpan Gagal", json['message'], "error");
          return;
        }
        dataPemugaran = json['data'];
        renderPemugaran(dataPemugaran);
      },
      error: function(e) {}
    });
  }

  function renderPemugaran(data){
    if(data == null || typeof data != "object"){
      console.log("User::UNKNOWN DATA");
      return;
    }
    var i = 0;
    
    var renderData = [];
    Object.values(data).forEach((pemugaran) => {
      var apprv;
      if(pemugaran['id_user_approv']=='0'){
        apprv= "Belum Di Approv"
        }else{
          apprv = "Sudah Di Approv";
        };
      var detailButton =`
      <a class="detail dropdown-item" href='<?=site_url()?>PimpinanController/DetailPemugaran?id_pemugaran=${pemugaran['id_pemugaran']}'><i class='fa fa-share'></i> Detail </a>
      `; 
      var editButton = `
        <a hidden class="edit dropdown-item" data-id='${pemugaran['id_pemugaran']}'><i class='fa fa-pencil'></i> Edit Cagar Budaya</a>
      `;
      var deleteButton = `
        <a hidden class="delete dropdown-item" data-id='${pemugaran['id_pemugaran']}'><i class='fa fa-trash'></i> Hapus Cagar Budaya</a>
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
      renderData.push([ pemugaran['nama'], pemugaran['nama_cagarbudaya'],pemugaran['tanggal_kegiatan'],apprv, button]);
    });
    FDataTable.clear().rows.add(renderData).draw('full-hold');
  }

  
  FDataTable.on('click','.edit', function(){
    event.preventDefault();
    PemugaranModal.form.trigger('reset');
    PemugaranModal.self.modal('show');
    PemugaranModal.addBtn.hide();
    PemugaranModal.saveEditBtn.show();
    var id = $(this).data('id');
    var pemugaran = dataPemugaran[id];
    PemugaranModal.id_pemugaran.val(pemugaran['id_pemugaran']);
    PemugaranModal.nama.val(pemugaran['nama']);
   

    PemugaranModal.id_cagarbudaya.val(pemugaran['id_cagarbudaya']);
    PemugaranModal.tanggal_kegiatan.val(pemugaran['tanggal_kegiatan']);
    PemugaranModal.file.val(pemugaran['file']);
    PemugaranModal.lokasi.val(pemugaran['lokasi']);
    PemugaranModal.deskripsi.val(pemugaran['deskripsi']);
  });
  document.getElementById("export_btn").href = '<?= site_url('PimpinanController/PdfAllpemugaran')?>';

  FDataTable.on('click','.delete', function(){
    event.preventDefault();
    var id = $(this).data('id');
    swal(swalDeleteConfigure).then((result) => {
      if(!result.value){ return; }
      $.ajax({
        url: "<?=site_url('PemugaranController/deletePemugaran')?>", 'type': 'POST',
        data: {'id_pemugaran': id},
        success: function (data){
          var json = JSON.parse(data);
          if(json['error']){
            swal("Delete Gagal", json['message'], "error");
            return;
          }
          delete dataPemugaran[id];
          swal("Delete Berhasil", "", "success");
          renderPemugaran(dataPemugaran);
        },
        error: function(e) {}
      });
    });
  });

  function showPemugaranModal(){
    PemugaranModal.self.modal('show');
    PemugaranModal.addBtn.show();
    PemugaranModal.saveEditBtn.hide();
    PemugaranModal.form.trigger('reset');
  }

  PemugaranModal.form.submit(function(event){
    event.preventDefault();
    switch(PemugaranModal.form[0].target){
      case 'add':
        addPemugaran();
        break;
      case 'edit':
        editPemugaran();
        break;
    }
  });

  function addPemugaran(){
    swal(swalSaveConfigure).then((result) => {
      if(!result.value){ return; }
      buttonLoading(PemugaranModal.addBtn);
      $.ajax({
        url: `<?=site_url('PemugaranController/addPemugaran')?>`, 'type': 'POST',
        data: PemugaranModal.form.serialize(),
        success: function (data){
          buttonIdle(PemugaranModal.addBtn);
          var json = JSON.parse(data);
          if(json['error']){
            swal("Simpan Gagal", json['message'], "error");
            return;
          }
          var pemugaran = json['data']
          dataPemugaran[pemugaran['id_pemugaran']] = pemugaran;
          swal("Simpan Berhasil", "", "success");
          renderPemugaran(dataPemugaran);
          PemugaranModal.self.modal('hide');
        },
        error: function(e) {}
      });
    });
  }

  
  function editPemugaran(){
    swal(swalSaveConfigure).then((result) => {
      if(!result.value){ return; }
      buttonLoading(PemugaranModal.saveEditBtn);
      $.ajax({
        url: `<?=site_url('PemugaranController/editPemugaran')?>`, 'type': 'POST',
        data: PemugaranModal.form.serialize(),
        success: function (data){
          buttonIdle(PemugaranModal.saveEditBtn);
          var json = JSON.parse(data);
          if(json['error']){
            swal("Simpan Gagal", json['message'], "error");
            return;
          }
          var pemugaran = json['data']
          dataPemugaran[pemugaran['id_pemugaran']] = pemugaran;
          swal("Simpan Berhasil", "", "success");
          renderPemugaran(dataPemugaran);
          PemugaranModal.self.modal('hide');
        },
        error: function(e) {}
      });
    });
  }
});
</script>