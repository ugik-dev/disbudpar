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
             
                  <th style="width: 15%; text-align:center!important">Nama</th>
                
                  <th style="width: 12%; text-align:center!important">Jenis Seni Budaya</th>
                  <th style="width: 12%; text-align:center!important">Sub Senis Budaya</th>
                  <th style="width: 12%; text-align:center!important">Jumlah Anggota</th>
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


<div class="modal inmodal" id="senibudaya_modal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Kelola Seni Budaya</h4>
        <span class="info"></span>
      </div>
      <div class="modal-body" id="modal-body">              
        <form role="form" id="user_form" onsubmit="return false;" type="multipart" autocomplete="off">
          <input type="hidden" id="id_senibudaya" name="id_senibudaya">
          <div class="form-group">
            <label for="nama">Nama Seni Budaya</label> 
            <input type="text" placeholder="Nama Seni Budaya" class="form-control" id="nama" name="nama" required="required">
          </div>
          
          <div class="form-group">
            <label for="id_j_senibudaya">Jenis Seni Budaya</label> 
            <select class="form-control mr-sm-2" id="id_j_senibudaya" name="id_j_senibudaya" required="required">
            </select>
          </div>
          <div class="form-group">
            <label for="id_j2_senibudaya">Sub Jenis Budaya</label> 
            <select class="form-control mr-sm-2" id="id_j2_senibudaya" name="id_j2_senibudaya" required="required">
            </select>
          </div>
          <div class="form-group">
            <label for="jumlahanggota">Jumlah Anggota</label> 
            <input type="number" placeholder="Jumlah Anggota" class="form-control" id="jumlahanggota" name="jumlahanggota" required="required">
            </select>
          </div>
          <div class="form-group">
            <label for="lokasi">Lokasi</label> 
            <input type="text" placeholder="Lokasi" class="form-control" id="lokasi" name="lokasi" required="required">
          </div>
          <div class="form-group">
            <label for="deskripsi">Deskripsi</label> 
            <textarea rows="4" type="text" placeholder="Deskripsi" class="form-control" id="deskripsi" name="deskripsi" required="required"></textarea>
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


  var SenibudayaModal = {
    'self': $('#senibudaya_modal'),
    'info': $('#senibudaya_modal').find('.info'),
    'form': $('#senibudaya_modal').find('#user_form'),
    'addBtn': $('#senibudaya_modal').find('#add_btn'),
    'saveEditBtn': $('#senibudaya_modal').find('#save_edit_btn'),
    'id_senibudaya': $('#senibudaya_modal').find('#id_senibudaya'),
    'nama': $('#senibudaya_modal').find('#nama'),
    'id_j_senibudaya': $('#senibudaya_modal').find('#id_j_senibudaya'),
    'nama_j': $('#senibudaya_modal').find('#nama_j'),
    'id_j2_senibudaya': $('#senibudaya_modal').find('#id_j2_senibudaya'),
    'nama_j2': $('#senibudaya_modal').find('#nama_j2'),
    'jumlahanggota': $('#senibudaya_modal').find('#jumlahanggota'),
    'file': $('#senibudaya_modal').find('#file'),
    'lokasi': $('#senibudaya_modal').find('#lokasi'),
    'deskripsi': $('#senibudaya_modal').find('#deskripsi'),
   
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

  var dataSenibudaya = {};
  var dataJ = {};
  var dataJ2 = {};

  toolbar.form.submit(function(event){
    event.preventDefault();
    switch(toolbar.form[0].target){
      case 'show':
        getSenibudaya();
        break;
      case 'add':
        showSenibudayaModal();
        break;
    }
  });

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
    SenibudayaModal.id_j_senibudaya.on('change', function(e){
      renderJ2Selection(dataJ2, SenibudayaModal.id_j_senibudaya.val());
    });    
  }
   function renderJSelection(data){
    SenibudayaModal.id_j_senibudaya.empty();
    SenibudayaModal.id_j_senibudaya.append($('<option>', { value: "", text: "-- Pilih Jenis --"}));
    Object.values(data).forEach((d) => {
      SenibudayaModal.id_j_senibudaya.append($('<option>', {
        value: d['id_j_senibudaya'],
        text: d['id_j_senibudaya'] + ' :: ' + d['nama_j_senibudaya'],
      }));
    });
  }

   function renderJ2Selection(data, idj){
    SenibudayaModal.id_j2_senibudaya.empty();
    SenibudayaModal.id_j2_senibudaya.append($('<option>', { value: "", text: "-- Pilih Sub Jenis --"}));
    Object.values(data).filter((e) => e['id_j_senibudaya'] == idj).forEach((d) => {
      SenibudayaModal.id_j2_senibudaya.append($('<option>', {
        value: d['id_j2_senibudaya'],
        text: d['id_j2_senibudaya'] + ' :: ' + d['nama_j2_senibudaya'],
      }));
    });
  }
  
  function getSenibudaya(){
    buttonLoading(toolbar.showBtn);
    $.ajax({
      url: `<?=site_url('SenibudayaController/getAllSenibudaya')?>`, 'type': 'GET',
      data: {},
      success: function (data){
        buttonIdle(toolbar.showBtn);
        var json = JSON.parse(data);
        if(json['error']){
          swal("Simpan Gagal", json['message'], "error");
          return;
        }
        dataSenibudaya = json['data'];
        renderSenibudaya(dataSenibudaya);
      },
      error: function(e) {}
    });
  }

  function renderSenibudaya(data){
    if(data == null || typeof data != "object"){
      console.log("User::UNKNOWN DATA");
      return;
    }
    var i = 0;
    
    var renderData = [];
    Object.values(data).forEach((senibudaya) => {
      var apprv;
      if(senibudaya['id_user_approv']=='0'){
        apprv= "Belum Di Approv"
        }else{
          apprv = "Sudah Di Approv";
        };
      var detailButton =`
      <a class="detail dropdown-item" href='<?=site_url()?>OperatorController/DetailSenibudaya?id_senibudaya=${senibudaya['id_senibudaya']}'><i class='fa fa-share'></i> Detail Seni Budaya</a>
      `; 
      var editButton = `
        <a class="edit dropdown-item" data-id='${senibudaya['id_senibudaya']}'><i class='fa fa-pencil'></i> Edit Seni Budaya</a>
      `;
      var deleteButton = `
        <a class="delete dropdown-item" data-id='${senibudaya['id_senibudaya']}'><i class='fa fa-trash'></i> Hapus Seni Budaya</a>
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
      renderData.push([ senibudaya['nama'], senibudaya['nama_j_senibudaya'], senibudaya['nama_j2_senibudaya'],senibudaya['jumlahanggota'],apprv, button]);
    });
    FDataTable.clear().rows.add(renderData).draw('full-hold');
  }

  document.getElementById("export_btn").href = '<?= site_url('OperatorController/PdfAllSenibudaya')?>';

  FDataTable.on('click','.edit', function(){
    event.preventDefault();
    SenibudayaModal.form.trigger('reset');
    SenibudayaModal.self.modal('show');
    SenibudayaModal.addBtn.hide();
    SenibudayaModal.saveEditBtn.show();
    var id = $(this).data('id');
    var senibudaya = dataSenibudaya[id];
    SenibudayaModal.id_senibudaya.val(senibudaya['id_senibudaya']);
    SenibudayaModal.nama.val(senibudaya['nama']);
    SenibudayaModal.jumlahanggota.val(senibudaya['jumlahanggota']);
    SenibudayaModal.id_j_senibudaya.val(senibudaya['id_j_senibudaya']);
    SenibudayaModal.id_j2_senibudaya.val(senibudaya['id_j2_senibudaya']);
    SenibudayaModal.file.val(senibudaya['file']);
    SenibudayaModal.lokasi.val(senibudaya['lokasi']);
    SenibudayaModal.deskripsi.val(senibudaya['deskripsi']);

  });

  FDataTable.on('click','.delete', function(){
    event.preventDefault();
    var id = $(this).data('id');
    swal(swalDeleteConfigure).then((result) => {
      if(!result.value){ return; }
      $.ajax({
        url: "<?=site_url('SenibudayaController/deleteSenibudaya')?>", 'type': 'POST',
        data: {'id_senibudaya': id},
        success: function (data){
          var json = JSON.parse(data);
          if(json['error']){
            swal("Delete Gagal", json['message'], "error");
            return;
          }
          delete dataSenibudaya[id];
          swal("Delete Berhasil", "", "success");
          renderSenibudaya(dataSenibudaya);
        },
        error: function(e) {}
      });
    });
  });

  function showSenibudayaModal(){
    SenibudayaModal.self.modal('show');
    SenibudayaModal.addBtn.show();
    SenibudayaModal.saveEditBtn.hide();
    SenibudayaModal.form.trigger('reset');
  }

  SenibudayaModal.form.submit(function(event){
    event.preventDefault();
    switch(SenibudayaModal.form[0].target){
      case 'add':
        addSenibudaya();
        break;
      case 'edit':
        editSenibudaya();
        break;
    }
  });

  function addSenibudaya(){
    swal(swalSaveConfigure).then((result) => {
      if(!result.value){ return; }
      buttonLoading(SenibudayaModal.addBtn);
      $.ajax({
        url: `<?=site_url('SenibudayaController/addSenibudaya')?>`, 'type': 'POST',
        data: SenibudayaModal.form.serialize(),
        success: function (data){
          buttonIdle(SenibudayaModal.addBtn);
          var json = JSON.parse(data);
          if(json['error']){
            swal("Simpan Gagal", json['message'], "error");
            return;
          }
          var senibudaya = json['data']
          dataSenibudaya[senibudaya['id_senibudaya']] = senibudaya;
          swal("Simpan Berhasil", "", "success");
          renderSenibudaya(dataSenibudaya);
          SenibudayaModal.self.modal('hide');
        },
        error: function(e) {}
      });
    });
  }

  
  function editSenibudaya(){
    swal(swalSaveConfigure).then((result) => {
      if(!result.value){ return; }
      buttonLoading(SenibudayaModal.saveEditBtn);
      $.ajax({
        url: `<?=site_url('SenibudayaController/editSenibudaya')?>`, 'type': 'POST',
        data: SenibudayaModal.form.serialize(),
        success: function (data){
          buttonIdle(SenibudayaModal.saveEditBtn);
          var json = JSON.parse(data);
          if(json['error']){
            swal("Simpan Gagal", json['message'], "error");
            return;
          }
          var senibudaya = json['data']
          dataSenibudaya[senibudaya['id_senibudaya']] = senibudaya;
          swal("Simpan Berhasil", "", "success");
          renderSenibudaya(dataSenibudaya);
          SenibudayaModal.self.modal('hide');
        },
        error: function(e) {}
      });
    });
  }
});
</script>