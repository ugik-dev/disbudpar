<div class="wrapper wrapper-content animated fadeInRight">
  <div class="ibox ssection-container">
    <div class="ibox-content">
      <form class="form-inline" id="toolbar_form" onsubmit="return false;">

        <!-- <button type="submit" class="btn btn-success my-1 mr-sm-2" id="statistik_btn"  data-loading-text="Loading..." onclick="this.form.target='statistik'"><i class="fal fa-eye"></i> Statistik Data</button>  -->
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

                  <th style="width: 20%; text-align:center!important">Nama Cagar Budaya</th>
                  
                  <th style="width: 12%; text-align:center!important">Jenis Cagar Budaya</th>
                  
                  <th style="width: 12%; text-align:center!important">Kepemilikan</th>
                  <th style="width: 12%; text-align:center!important">Status Penetapan</th>
                  <th style="width: 12%; text-align:center!important">Approval</th>
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


  <!-- <div class="row">
    <div class="col-lg-12">
      <div class="ibox">
        <div class="ibox-content">
          <div class="table-responsive">
            <table id="FStatistikTable" class="table table-bordered table-hover" style="padding:0px">
              <thead>
                <tr>
                  <th style="width: 7%; text-align:center!important">ID</th>
                  <th style="width: 15%; text-align:center!important">Nama Cagarbudaya</th>
                  <th style="width: 12%; text-align:center!important">Waktu</th>
                  <th style="width: 12%; text-align:center!important">Pengunjung Mancanegara</th>
                  <th style="width: 12%; text-align:center!important">Pengunjung Domestik</th>
                  <th style="width: 12%; text-align:center!important">Jumlah Pengunjung</th>
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
 -->

<div class="modal inmodal" id="cagarbudaya_modal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Kelola Cagar Budaya</h4>
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
            <label for="jenis">Jenis Cagar budaya</label> 
            <select class="form-control mr-sm-2" id="jenis" name="id_jenis_cagarbudaya" required="required">
            </select>
          </div>
          <div class="form-group">
            <label for="kepemilikan">Kepemilikan Cagar budaya</label> 
            <select class="form-control mr-sm-2" id="kepemilikan" name="id_kepemilikan_cagarbudaya" required="required">
            </select>
          </div>
          <div class="form-group">
            <label for="status_penetapan">Status Penetapan</label> 
            <select class="form-control mr-sm-2" id="status_penetapan" name="id_status_penetapan_cagarbudaya" required="required">
            </select>
          </div>
          <!-- <div class="form-group">
            <label for="file">File</label> 
            <input type="file" placeholder="File" class="form-control" id="file" name="file" required="required">
          </div> -->
   
          <div class="form-group">
            <label for="deskripsi">Deskripsi</label> 
            <textarea rows="3" type="text" placeholder="Deskripsi" class="form-control" id="deskripsi" name="deskripsi" required="required">
            </textarea>
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
  $('#cagarbudaya').addClass('active');
  
  var toolbar = {
    'form': $('#toolbar_form'),
    'showBtn': $('#show_btn'),
    'addBtn': $('#add_btn'),
   
 
  }

  var FDataTable = $('#FDataTable').DataTable({
    'columnDefs': [],
    deferRender: true,
    "order": [[ 0, "desc" ]]
  });

  var FStatistikTable = $('#FStatistikTable').DataTable({
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
    'file': $('#cagarbudaya_modal').find('#file'),
    'lokasi': $('#cagarbudaya_modal').find('#lokasi'),
    'deskripsi': $('#cagarbudaya_modal').find('#deskripsi'),
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
  var dataKepemilikan = {};
  var dataStatusPenetapan = {};
  var dataCagarbudaya = {};
    var dataStatistikCagarbudaya = {};

  toolbar.form.submit(function(event){
    event.preventDefault();
    switch(toolbar.form[0].target){
      case 'show':
        getCagarbudaya();
        break;
      case 'add':
        showCagarbudayaModal();
        break;
      case 'export':
     
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

  getAllKepemilikan();  
  function getAllKepemilikan(){
    return $.ajax({
      url: `<?php echo site_url('CagarbudayaController/getAllKepemilikanOption/')?>`, 'type': 'GET',
      data: {},
      success: function (data){
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }
        dataKepemilikan = json['data'];
        renderKepemilikanSelection(dataKepemilikan);
      },
      error: function(e) {}
    });
  }

  getAllStatusPenetapan();  
  function getAllStatusPenetapan(){
    return $.ajax({
      url: `<?php echo site_url('CagarbudayaController/getAllStatusPenetapanOption/')?>`, 'type': 'GET',
      data: {},
      success: function (data){
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }
        dataStatusPenetapan = json['data'];
       renderStatusPenetapanSelection(dataStatusPenetapan);
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

   function renderKepemilikanSelection(data){
    CagarbudayaModal.kepemilikan.empty();
    CagarbudayaModal.kepemilikan.append($('<option>', { value: "", text: "-- Pilih Kepemilikan --"}));
    Object.values(data).forEach((d) => {
      CagarbudayaModal.kepemilikan.append($('<option>', {
        value: d['id_kepemilikan_cagarbudaya'],
        text: d['id_kepemilikan_cagarbudaya'] + ' :: ' + d['nama_kepemilikan_cagarbudaya'],
      }));
    });
  }

   function renderStatusPenetapanSelection(data){
    CagarbudayaModal.status_penetapan.empty();
    CagarbudayaModal.status_penetapan.append($('<option>', { value: "", text: "-- Pilih Status Penetapan --"}));
    Object.values(data).forEach((d) => {
      CagarbudayaModal.status_penetapan.append($('<option>', {
        value: d['id_status_penetapan_cagarbudaya'],
        text: d['id_status_penetapan_cagarbudaya'] + ' :: ' + d['nama_status_penetapan_cagarbudaya'],
      }));
    });
  }
  
  document.getElementById("export_btn").href = '<?= site_url('OperatorController/Pdfallcagarbudaya?id_cagarbudaya=')?>'+id_cagarbudaya;


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
      var apprv;
      if(cagarbudaya['id_user_approv']=='0'){
        apprv= "Belum Di Approv"
        }else{
          apprv = "Sudah Di Approv";
        };
      var detailButton =`
      <a class="detail dropdown-item" href='<?=site_url()?>OperatorController/DetailCagarbudaya?id_cagarbudaya=${cagarbudaya['id_cagarbudaya']}'><i class='fa fa-share'></i> Detail Cagarbudaya</a>
      `;  
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
            ${detailButton}
            ${editButton}
            ${deleteButton}
          </div>
        </div>
      `;
      renderData.push([cagarbudaya['nama'], cagarbudaya['nama_jenis_cagarbudaya'], cagarbudaya['nama_kepemilikan_cagarbudaya'], cagarbudaya['nama_status_penetapan_cagarbudaya'],apprv, button]);
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
    CagarbudayaModal.jenis.val(cagarbudaya['id_jenis_cagarbudaya']);
    CagarbudayaModal.kepemilikan.val(cagarbudaya['id_kepemilikan_cagarbudaya']);
    CagarbudayaModal.status_penetapan.val(cagarbudaya['id_status_penetapan_cagarbudaya']);
    CagarbudayaModal.file.val(cagarbudaya['file']);
    CagarbudayaModal.lokasi.val(cagarbudaya['lokasi']);
    CagarbudayaModal.deskripsi.val(cagarbudaya['deskripsi']);
   
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
          // if(json['error']){
          //   swal("Simpan Gagal", json['message'], "error");
          //   return;
          // }
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