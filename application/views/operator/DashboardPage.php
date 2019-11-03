<div class="wrapper wrapper-content animated fadeInRight">
  <div class="ibox ssection-container">
    <div class="ibox-content">
      <form class="form-inline" id="toolbar_form" onsubmit="return false;">
        
        <button type="submit" class="btn btn-success my-1 mr-sm-2" id="show_btn"  data-loading-text="Loading..." onclick="this.form.target='show'"><i class="fal fa-eye"></i> Tampilkan</button>
        <button type="submit" class="btn btn-primary my-1 mr-sm-2" id="add_btn"  data-loading-text="Loading..." onclick="this.form.target='add'"><i class="fal fa-plus"></i> Tambah</button>
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
                  <th style="width: 7%; text-align:center!important">ID</th>
                  <th style="width: 83%; text-align:center!important">Nama Cagarbudaya</th>
                  <th style="width: 10%; text-align:center!important">Jenis Cagar</th>
                  <th style="width: 10%; text-align:center!important">Kepemilikan</th>
                  <th style="width: 10%; text-align:center!important">Status Penetapan</th>
                  <th style="width: 10%; text-align:center!important">Action</th>
                  <!-- <th style="width: 10%; text-align:center!important">File</th>
                  <th style="width: 10%; text-align:center!important">Lokasi</th>
                  <th style="width: 10%; text-align:center!important">Deskripsi</th> -->
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


<div class="modal inmodal" id="cagarbudaya_modal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Kelola Cagarbudaya</h4>
        <span class="info"></span>
      </div>
      <div class="modal-body" id="modal-body">              
        <form role="form" id="user_form" onsubmit="return false;" type="multipart" autocomplete="off">
          <input type="hidden" id="id_cagarbudaya" name="id_cagarbudaya">
          <div class="form-group">
            <label for="nama">Nama Cagarbudaya</label> 
            <input type="text" placeholder="Nama Cagarbudaya" class="form-control" id="nama" name="nama" required="required">
          </div>
          <div class="form-group">
            <label for="jenis">Jenis Cagarbudaya</label> 
            <select class="form-control mr-sm-2" id="jenis" name="jenis" required="required">
            </select>
          </div>
          <div class="form-group">
            <label for="kepemilikan">Kepemilikan Cagarbudaya</label> 
            <input type="text" placeholder="Kepemilikan Cagarbudaya" class="form-control" id="kepemilikan" name="kepemilikan" required="required">
          </div>
          <div class="form-group">
            <label for="status_penetapan">Status Penetapan</label> 
            <input type="text" placeholder="Status Cagarbudaya" class="form-control" id="status_penetapan" name="status_penetapan" required="required">
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
  $('#dashboard').addClass('active');
  
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


  var CagarbudayaModal = {
    'self': $('#cagarbudaya_modal'),
    'info': $('#cagarbudaya_modal').find('.info'),
    'form': $('#cagarbudaya_modal').find('#user_form'),
    'addBtn': $('#cagarbudaya_modal').find('#add_btn'),
    'saveEditBtn': $('#cagarbudaya_modal').find('#save_edit_btn'),
    'id_cagarbudaya': $('#cagarbudaya_modal').find('#id_cagarbudaya'),
    'nama': $('#cagarbudaya_modal').find('#nama'),
    'jenis': $('#cagarbudaya_modal').find('#jenis'),
    'kepemilikan': $('#cagarbudaya_modal').find('#kepemilikan'),
    'status_penetapan': $('#cagarbudaya_modal').find('#status_penetapan'),
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

  var dataJenis = {};
  var dataCagarbudaya = {};

  toolbar.form.submit(function(event){
    event.preventDefault();
    switch(toolbar.form[0].target){
      case 'show':
        getCagarbudaya();
        break;
      case 'add':
        showCagarbudayaModal();
        break;
    }
  });

  getAllJenis();  
  function getAllJenis(){
    return $.ajax({
      url: `<?php echo site_url('CagarbudayaController/getAllJenisOption/')?>`, 'type': 'GET',
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
    CagarbudayaModal.jenis.empty();
    CagarbudayaModal.jenis.append($('<option>', { value: "", text: "-- Pilih Jenis --"}));
    Object.values(data).forEach((d) => {
      CagarbudayaModal.jenis.append($('<option>', {
        value: d['id_jenis_cagarbudaya'],
        text: d['id_jenis_cagarbudaya'] + ' :: ' + d['nama_jenis_cagarbudaya'],
      }));
    });
  }
  

  function getCagarbudaya(){
    buttonLoading(toolbar.showBtn);
    $.ajax({
      url: `<?=site_url('CagarbudayaController/getAllCagarbudaya')?>`, 'type': 'GET',
      data: {},
      success: function (data){
        buttonIdle(toolbar.showBtn);
        var json = JSON.parse(data);
        if(json['error']){
          swal("Simpan Gagal", json['message'], "error");
          return;
        }
        dataCagarbudaya = json['data'];
        renderCagarbudaya(dataCagarbudaya);
      },
      error: function(e) {}
    });
  }

  function renderCagarbudaya(data){
    if(data == null || typeof data != "object"){
      console.log("User::UNKNOWN DATA");
      return;
    }
    var i = 0;
    
    var renderData = [];
    Object.values(data).forEach((cagarbudaya) => {
      var editButton = `
        <a class="edit dropdown-item" data-id='${cagarbudaya['id_cagarbudaya']}'><i class='fa fa-pencil'></i> Edit Cagarbudaya</a>
      `;
      var deleteButton = `
        <a class="delete dropdown-item" data-id='${cagarbudaya['id_cagarbudaya']}'><i class='fa fa-trash'></i> Hapus Cagarbudaya</a>
      `;
      var button = `
        <div class="btn-group" role="group">
          <button id="action" type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class='fa fa-bars'></i></button>
          <div class="dropdown-menu" aria-labelledby="action">
            ${editButton}
            ${deleteButton}
          </div>
        </div>
      `;
      renderData.push([cagarbudaya['id_cagarbudaya'], cagarbudaya['nama'], cagarbudaya['nama_jenis_cagarbudaya'], cagarbudaya['kepemilikan'], cagarbudaya['status_penetapan'], button]);
    });
    FDataTable.clear().rows.add(renderData).draw('full-hold');
  }

  
  FDataTable.on('click','.edit', function(){
    event.preventDefault();
    CagarbudayaModal.form.trigger('reset');
    CagarbudayaModal.self.modal('show');
    CagarbudayaModal.addBtn.hide();
    CagarbudayaModal.saveEditBtn.show();
    var id = $(this).data('id');
    var cagarbudaya = dataCagarbudaya[id];
    CagarbudayaModal.id_cagarbudaya.val(cagarbudaya['id_cagarbudaya']);
    CagarbudayaModal.nama.val(cagarbudaya['nama']);
    CagarbudayaModal.jenis.val(cagarbudaya['jenis']);
    CagarbudayaModal.kepemilikan.val(cagarbudaya['kepemilikan']);
    CagarbudayaModal.status_penetapan.val(cagarbudaya['status_penetapan']);
  });

  FDataTable.on('click','.delete', function(){
    event.preventDefault();
    var id = $(this).data('id');
    swal(swalDeleteConfigure).then((result) => {
      if(!result.value){ return; }
      $.ajax({
        url: "<?=site_url('CagarbudayaController/deleteCagarbudaya')?>", 'type': 'POST',
        data: {'id_cagarbudaya': id},
        success: function (data){
          var json = JSON.parse(data);
          if(json['error']){
            swal("Delete Gagal", json['message'], "error");
            return;
          }
          delete dataCagarbudaya[id];
          swal("Delete Berhasil", "", "success");
          renderCagarbudaya(dataCagarbudaya);
        },
        error: function(e) {}
      });
    });
  });

  function showCagarbudayaModal(){
    CagarbudayaModal.self.modal('show');
    CagarbudayaModal.addBtn.show();
    CagarbudayaModal.saveEditBtn.hide();
    CagarbudayaModal.form.trigger('reset');
  }

  CagarbudayaModal.form.submit(function(event){
    event.preventDefault();
    switch(CagarbudayaModal.form[0].target){
      case 'add':
        addCagarbudaya();
        break;
      case 'edit':
        editCagarbudaya();
        break;
    }
  });

  function addCagarbudaya(){
    swal(swalSaveConfigure).then((result) => {
      if(!result.value){ return; }
      buttonLoading(CagarbudayaModal.addBtn);
      $.ajax({
        url: `<?=site_url('CagarbudayaController/addCagarbudaya')?>`, 'type': 'POST',
        data: CagarbudayaModal.form.serialize(),
        success: function (data){
          buttonIdle(CagarbudayaModal.addBtn);
          var json = JSON.parse(data);
          if(json['error']){
            swal("Simpan Gagal", json['message'], "error");
            return;
          }
          var cagarbudaya = json['data']
          dataCagarbudaya[cagarbudaya['id_cagarbudaya']] = cagarbudaya;
          swal("Simpan Berhasil", "", "success");
          renderCagarbudaya(dataCagarbudaya);
          CagarbudayaModal.self.modal('hide');
        },
        error: function(e) {}
      });
    });
  }

  
  function editCagarbudaya(){
    swal(swalSaveConfigure).then((result) => {
      if(!result.value){ return; }
      buttonLoading(CagarbudayaModal.saveEditBtn);
      $.ajax({
        url: `<?=site_url('CagarbudayaController/editCagarbudaya')?>`, 'type': 'POST',
        data: CagarbudayaModal.form.serialize(),
        success: function (data){
          buttonIdle(CagarbudayaModal.saveEditBtn);
          var json = JSON.parse(data);
          if(json['error']){
            swal("Simpan Gagal", json['message'], "error");
            return;
          }
          var cagarbudaya = json['data']
          dataCagarbudaya[cagarbudaya['id_cagarbudaya']] = cagarbudaya;
          swal("Simpan Berhasil", "", "success");
          renderCagarbudaya(dataCagarbudaya);
          CagarbudayaModal.self.modal('hide');
        },
        error: function(e) {}
      });
    });
  }
});
</script>