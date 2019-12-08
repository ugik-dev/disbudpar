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
                  <th style="width: 15%; text-align:center!important">Nama Cagarbudaya</th>
                  <th style="width: 12%; text-align:center!important">Tahun</th>
                  <th style="width: 12%; text-align:center!important">Pengunjung Domestik</th>
                  <th style="width: 12%; text-align:center!important">Pengunjung Mancanegara</th>
                  <th style="width: 12%; text-align:center!important">Pengunjung</th>
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


<div class="modal inmodal" id="cagarbudaya_modal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Kelola Pengunjung</h4>
        <span class="info"></span>
      </div>
      <div class="modal-body" id="modal-body">              
        <form role="form" id="user_form" onsubmit="return false;" type="multipart" autocomplete="off">
          <input type="hidden" id="id_pengunjung" name="id_pengunjung">
          <div class="form-group">
            <label for="id_cagarbudaya">Nama Cagar budaya</label> 
            <select class="form-control mr-sm-2" id="id_cagarbudaya" name="id_cagarbudaya" required="required">
            </select>
          </div>
          <div class="form-group">
            <label for="tahun">Tahun</label> 
            <input type="number" placeholder="Tahun" class="form-control" id="tahun" name="tahun" required="required">
          </div>
          
          <div class="form-group">
            <label for="mancanegara">Pengunjung Mancanegara</label> 
            <input type="number" placeholder="Pengunjung Mancanegara" class="form-control" id="mancanegara" name="mancanegara" required="required">
          </div>
          <div class="form-group">
            <label for="domestik">Pengunjung Domestik</label> 
            <input type="number" placeholder="Pengunjung Domestik" class="form-control" id="domestik" name="domestik" required="required">
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
  $('#statistikCagarbudaya').addClass('active');
  
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


  var StatistikCagarbudayaModal = {
    'self': $('#cagarbudaya_modal'),
    'info': $('#cagarbudaya_modal').find('.info'),
    'form': $('#cagarbudaya_modal').find('#user_form'),
    'addBtn': $('#cagarbudaya_modal').find('#add_btn'),
    'saveEditBtn': $('#cagarbudaya_modal').find('#save_edit_btn'),
    'id_pengunjung': $('#cagarbudaya_modal').find('#id_pengunjung'),
    'id_cagarbudaya': $('#cagarbudaya_modal').find('#id_cagarbudaya'),
    'nama': $('#cagarbudaya_modal').find('#nama'),
    'mancanegara': $('#cagarbudaya_modal').find('#mancanegara'),
    'domestik': $('#cagarbudaya_modal').find('#domestik'),
    'jumlah': $('#cagarbudaya_modal').find('#jumlah'),

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

  var dataStatistikCagarbudaya = {};
  var dataid_cagarbudaya = {};
  var dataCagarbudaya = {};

  toolbar.form.submit(function(event){
    event.preventDefault();
    switch(toolbar.form[0].target){
      case 'show':
        getStatistikCagarbudaya();
        break;
      case 'add':
        showStatistikCagarbudayaModal();
        break;
    }
  });

  getAllCagarbudaya();  
  function getAllCagarbudaya(){
    return $.ajax({
      url: `<?php echo site_url('StatistikCagarbudayaController/getAllCagarbudayaOption/')?>`, 'type': 'GET',
      data: {},
      success: function (data){
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }
        dataCagarbudaya = json['data'];
        renderCagarbudayaSelection(dataCagarbudaya);
      },
      error: function(e) {}
    });
  }

  function renderCagarbudayaSelection(data){
    StatistikCagarbudayaModal.id_cagarbudaya.empty();
    StatistikCagarbudayaModal.id_cagarbudaya.append($('<option>', { value: "", text: "-- Pilih Jenis --"}));
    Object.values(data).forEach((d) => {
      StatistikCagarbudayaModal.id_cagarbudaya.append($('<option>', {
        value: d['id_cagarbudaya'],
        text: d['id_cagarbudaya'] + ' :: ' + d['nama'],
      }));
    });
  }

  

  function getStatistikCagarbudaya(){
    buttonLoading(toolbar.showBtn);
    $.ajax({
      url: `<?=site_url('StatistikCagarbudayaController/getAllStatistikCagarbudaya')?>`, 'type': 'GET',
      data: {},
      success: function (data){
        buttonIdle(toolbar.showBtn);
        var json = JSON.parse(data);
        if(json['error']){
          swal("Simpan Gagal", json['message'], "error");
          return;
        }
        dataStatistikCagarbudaya = json['data'];
        renderStatistikCagarbudaya(dataStatistikCagarbudaya);
      },
      error: function(e) {}
    });
  }

  function renderStatistikCagarbudaya(data){
    if(data == null || typeof data != "object"){
      console.log("User::UNKNOWN DATA");
      return;
    }
    var i = 0;
    
    var renderData = [];
    Object.values(data).forEach((statistikcagarbudaya) => {
      var editButton = `
      <a class="edit dropdown-item" data-id='${statistikcagarbudaya['id_pengunjung_cagarbudaya']}'><i class='fa fa-pencil'></i> Edit Cagarbudaya</a>
      `;
      var deleteButton = `
      <a class="delete dropdown-item" data-id='${statistikcagarbudaya['id_pengunjung_cagarbudaya']}'><i class='fa fa-trash'></i> Hapus Cagarbudaya</a>
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
      renderData.push([statistikcagarbudaya['id_pengunjung'], statistikcagarbudaya['nama'], statistikcagarbudaya['tahun'], statistikcagarbudaya['mancanegara'], statistikcagarbudaya['domestik'], statistikcagarbudaya['jumlah'], button]);
    });
    FDataTable.clear().rows.add(renderData).draw('full-hold');
  }

  
  FDataTable.on('click','.edit', function(){
    event.preventDefault();
    StatistikCagarbudayaModal.form.trigger('reset');
    StatistikCagarbudayaModal.self.modal('show');
    StatistikCagarbudayaModal.addBtn.hide();
    StatistikCagarbudayaModal.saveEditBtn.show();
    var id = $(this).data('id');
    var statistikcagarbudaya = dataStatistikCagarbudaya[id];
    StatistikCagarbudayaModal.id_pengunjung.val(statistikcagarbudaya['id_pengunjung']);
    StatistikCagarbudayaModal.id_cagarbudaya.val(statistikcagarbudaya['id_cagarbudaya']);
    StatistikCagarbudayaModal.nama.val(statistikcagarbudaya['nama']);
    StatistikCagarbudayaModal.tahun.val(statistikcagarbudaya['tahun']);
    StatistikCagarbudayaModal.domestik.val(statistikcagarbudaya['domestik']);
    StatistikCagarbudayaModal.mancanegara.val(statistikcagarbudaya['mancanegara']);
    StatistikCagarbudayaModal.jumlah.val(statistikcagarbudaya['jumlah']);

  });

  FDataTable.on('click','.delete', function(){
    event.preventDefault();
    var id = $(this).data('id');
    swal(swalDeleteConfigure).then((result) => {
      if(!result.value){ return; }
      $.ajax({
        url: "<?=site_url('StatistikCagarbudayaController/deleteCagarbudaya')?>", 'type': 'POST',
        data: {'id_pengunjung_cagarbudaya': id},
        success: function (data){
          var json = JSON.parse(data);
          if(json['error']){
            swal("Delete Gagal", json['message'], "error");
            return;
          }
          delete dataStatistikCagarbudaya[id];
          swal("Delete Berhasil", "", "success");
          renderStatistikCagarbudaya(dataStatistikCagarbudaya);
        },
        error: function(e) {}
      });
    });
  });

  function showStatistikCagarbudayaModal(){
    StatistikCagarbudayaModal.self.modal('show');
    StatistikCagarbudayaModal.addBtn.show();
    StatistikCagarbudayaModal.saveEditBtn.hide();
    StatistikCagarbudayaModal.form.trigger('reset');
  }

  StatistikCagarbudayaModal.form.submit(function(event){
    event.preventDefault();
    switch(StatistikCagarbudayaModal.form[0].target){
      case 'add':
        addStatistikCagarbudaya();
        break;
      case 'edit':
        editStatistikCagarbudaya();
        break;
    }
  });

  function addStatistikCagarbudaya(){
    swal(swalSaveConfigure).then((result) => {
      if(!result.value){ return; }
      buttonLoading(StatistikCagarbudayaModal.addBtn);
      $.ajax({
        url: `<?=site_url('StatistikCagarbudayaController/addStatistikCagarbudaya')?>`, 'type': 'POST',
        data: StatistikCagarbudayaModal.form.serialize(),
        success: function (data){
          buttonIdle(StatistikCagarbudayaModal.addBtn);
          var json = JSON.parse(data);
          if(json['error']){
            swal("Simpan Gagal", json['message'], "error");
            return;
          }
          var statistikcagarbudaya = json['data']
          dataStatistikCagarbudaya[statistikcagarbudaya['id_pengunjung']] = statistikcagarbudaya;
          swal("Simpan Berhasil", "", "success");
          renderStatistikCagarbudaya(dataStatistikCagarbudaya);
          StatistikCagarbudayaModal.self.modal('hide');
        },
        error: function(e) {}
      });
    });
  }

  
  function editStatistikCagarbudaya(){
    swal(swalSaveConfigure).then((result) => {
      if(!result.value){ return; }
      buttonLoading(StatistikCagarbudayaModal.saveEditBtn);
      $.ajax({
        url: `<?=site_url('StatistikCagarbudayaController/editStatistikCagarbudaya')?>`, 'type': 'POST',
        data: StatistikCagarbudayaModal.form.serialize(),
        success: function (data){
          buttonIdle(StatistikCagarbudayaModal.saveEditBtn);
          var json = JSON.parse(data);
          if(json['error']){
            swal("Simpan Gagal", json['message'], "error");
            return;
          }
          var statistikcagarbudaya = json['data']
          dataStatistikCagarbudaya[statistikcagarbudaya['id_cagarbudaya']] = statistikcagarbudaya;
          swal("Simpan Berhasil", "", "success");
          renderCagarbudaya(dataStatistikCagarbudaya);
          StatistikCagarbudayaModal.self.modal('hide');
        },
        error: function(e) {}
      });
    });
  }
});
</script>