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
      
                  <th style="width: 15%; text-align:center!important">Nama Penginapan</th>
                  <th style="width: 12%; text-align:center!important">Jenis</th>
                  <th style="width: 12%; text-align:center!important">Jumlah Kamar</th>
                  <th style="width: 12%; text-align:center!important">Jumlah Tempat Tidur</th>
                  
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


<div class="modal inmodal" id="penginapan_modal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Kelola Sarana dan Prasarana</h4>
        <span class="info"></span>
      </div>
      <div class="modal-body" id="modal-body">              
        <form role="form" id="user_form" onsubmit="return false;" type="multipart" autocomplete="off">
          <input type="hidden" id="id_penginapan" name="id_penginapan">
          <div class="form-group">
            <label for="nama">Nama Penginapan</label> 
            <input type="text" placeholder="Nama Penginapan" class="form-control" id="nama" name="nama" required="required">
          </div>
          <div class="form-group">
            <label for="id_jenis_penginapan">Jenis</label> 
            <select class="form-control mr-sm-2" id="id_jenis_penginapan" name="id_jenis_penginapan" required="required">
            </select>
          </div>
          <div class="form-group">
            <label for="jumlah_kamar">Jumlah Kamar</label> 
            <input type="number" placeholder="Jumlah Kamar" class="form-control" id="jumlah_kamar" name="jumlah_kamar" required="required">
          </div>
          <div class="form-group">
            <label for="jumlah_tempat_tidur">Jumlah Tempat Tidur</label> 
            <input type="number" placeholder="Jumlah Tempat Tidur" class="form-control" id="jumlah_tempat_tidur" name="jumlah_tempat_tidur" required="required">
          </div>
          <div class="form-group">
            <label for="file">File</label> 
            <input type="text" placeholder="File" class="form-control" id="file" name="file" required="required">
          </div>
          <div class="form-group">
            <label for="lokasi">Lokasi</label> 
            <input type="text" placeholder="Lokasi" class="form-control" id="lokasi" name="lokasi" required="required">
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
  $('#pariwisata').addClass('active');
  $('#penginapan').addClass('active');

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


  var PenginapanModal = {
    'self': $('#penginapan_modal'),
    'info': $('#penginapan_modal').find('.info'),
    'form': $('#penginapan_modal').find('#user_form'),
    'addBtn': $('#penginapan_modal').find('#add_btn'),
    'saveEditBtn': $('#penginapan_modal').find('#save_edit_btn'),
    'id_penginapan': $('#penginapan_modal').find('#id_penginapan'),
    'nama': $('#penginapan_modal').find('#nama'),
    'id_jenis_penginapan': $('#penginapan_modal').find('#id_jenis_penginapan'),
    'nama_jenis': $('#penginapan_modal').find('#nama_jenis'),
    'jumlah_kamar': $('#penginapan_modal').find('#jumlah_kamar'),
    'jumlah_tempat_tidur': $('#penginapan_modal').find('#jumlah_tempat_tidur'),
    'file': $('#penginapan_modal').find('#file'),
    'lokasi': $('#penginapan_modal').find('#lokasi'),
    'deskripsi': $('#penginapan_modal').find('#deskripsi'),
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

  var dataPenginapan = {};
  var dataJenis = {};

  toolbar.form.submit(function(event){
    event.preventDefault();
    switch(toolbar.form[0].target){
      case 'show':
        getPenginapan();
        break;
      case 'add':
        showPenginapanModal();
        break;
    }
  });

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
    PenginapanModal.id_jenis_penginapan.empty();
    PenginapanModal.id_jenis_penginapan.append($('<option>', { value: "", text: "-- Pilih Jenis --"}));
    Object.values(data).forEach((d) => {
      PenginapanModal.id_jenis_penginapan.append($('<option>', {
        value: d['id_jenis_penginapan'],
        text: d['id_jenis_penginapan'] + ' :: ' + d['nama_jenis_penginapan'],
      }));
    });
  }
  

  function getPenginapan(){
    buttonLoading(toolbar.showBtn);
    $.ajax({
      url: `<?=site_url('PenginapanController/getAllPenginapan')?>`, 'type': 'GET',
      data: {},
      success: function (data){
        buttonIdle(toolbar.showBtn);
        var json = JSON.parse(data);
        if(json['error']){
          swal("Simpan Gagal", json['message'], "error");
          return;
        }
        dataPenginapan = json['data'];
        renderPenginapan(dataPenginapan);
      },
      error: function(e) {}
    });
  }

  function renderPenginapan(data){
    if(data == null || typeof data != "object"){
      console.log("User::UNKNOWN DATA");
      return;
    }
    var i = 0;
    
    var renderData = [];
    Object.values(data).forEach((penginapan) => {
      var apprv;
      if(penginapan['id_user_approv']=='0'){
        apprv= "Belum Di Approv"
        }else{
          apprv = "Sudah Di Approv";
        };
      var detailButton =`
      <a class="detail dropdown-item" href='<?=site_url()?>OperatorController/DetailPenginapan?id_penginapan=${penginapan['id_penginapan']}'><i class='fa fa-share'></i> Detail Penginapan</a>
      `; 
      var editButton = `
        <a class="edit dropdown-item" data-id='${penginapan['id_penginapan']}'><i class='fa fa-pencil'></i> Edit Penginapan</a>
      `;
      var deleteButton = `
        <a class="delete dropdown-item" data-id='${penginapan['id_penginapan']}'><i class='fa fa-trash'></i> Hapus Penginapan</a>
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
      renderData.push([penginapan['nama'],penginapan['nama_jenis_penginapan'],penginapan['jumlah_kamar'],penginapan['jumlah_tempat_tidur'],apprv, button]);
    });
    FDataTable.clear().rows.add(renderData).draw('full-hold');
  }

  
  FDataTable.on('click','.edit', function(){
    event.preventDefault();
    PenginapanModal.form.trigger('reset');
    PenginapanModal.self.modal('show');
    PenginapanModal.addBtn.hide();
    PenginapanModal.saveEditBtn.show();
    var id = $(this).data('id');
    var penginapan = dataPenginapan[id];
    PenginapanModal.id_penginapan.val(penginapan['id_penginapan']);
    PenginapanModal.nama.val(penginapan['nama']);
    PenginapanModal.id_jenis_penginapan.val(penginapan['id_jenis_penginapan']);
    PenginapanModal.jumlah_kamar.val(penginapan['jumlah_kamar']);
    PenginapanModal.jumlah_tempat_tidur.val(penginapan['jumlah_tempat_tidur']);
    PenginapanModal.file.val(penginapan['file']);
    PenginapanModal.lokasi.val(penginapan['lokasi']);
    PenginapanModal.deskripsi.val(penginapan['deskripsi']);
  });

  FDataTable.on('click','.delete', function(){
    event.preventDefault();
    var id = $(this).data('id');
    swal(swalDeleteConfigure).then((result) => {
      if(!result.value){ return; }
      $.ajax({
        url: "<?=site_url('PenginapanController/deletePenginapan')?>", 'type': 'POST',
        data: {'id_penginapan': id},
        success: function (data){
          var json = JSON.parse(data);
          if(json['error']){
            swal("Delete Gagal", json['message'], "error");
            return;
          }
          delete dataPenginapan[id];
          swal("Delete Berhasil", "", "success");
          renderPenginapan(dataPenginapan);
        },
        error: function(e) {}
      });
    });
  });

  function showPenginapanModal(){
    PenginapanModal.self.modal('show');
    PenginapanModal.addBtn.show();
    PenginapanModal.saveEditBtn.hide();
    PenginapanModal.form.trigger('reset');
  }

  PenginapanModal.form.submit(function(event){
    event.preventDefault();
    switch(PenginapanModal.form[0].target){
      case 'add':
        addPenginapan();
        break;
      case 'edit':
        editPenginapan();
        break;
    }
  });

  function addPenginapan(){
    swal(swalSaveConfigure).then((result) => {
      if(!result.value){ return; }
      buttonLoading(PenginapanModal.addBtn);
      $.ajax({
        url: `<?=site_url('PenginapanController/addPenginapan')?>`, 'type': 'POST',
        data: PenginapanModal.form.serialize(),
        success: function (data){
          buttonIdle(PenginapanModal.addBtn);
          var json = JSON.parse(data);
          if(json['error']){
            swal("Simpan Gagal", json['message'], "error");
            return;
          }
          var penginapan = json['data']
          dataPenginapan[penginapan['id_penginapan']] = penginapan;
          swal("Simpan Berhasil", "", "success");
          renderPenginapan(dataPenginapan);
          PenginapanModal.self.modal('hide');
        },
        error: function(e) {}
      });
    });
  }

  
  function editPenginapan(){
    swal(swalSaveConfigure).then((result) => {
      if(!result.value){ return; }
      buttonLoading(PenginapanModal.saveEditBtn);
      $.ajax({
        url: `<?=site_url('PenginapanController/editPenginapan')?>`, 'type': 'POST',
        data: PenginapanModal.form.serialize(),
        success: function (data){
          buttonIdle(PenginapanModal.saveEditBtn);
          var json = JSON.parse(data);
          if(json['error']){
            swal("Simpan Gagal", json['message'], "error");
            return;
          }
          var penginapan = json['data']
          dataPenginapan[penginapan['id_penginapan']] = penginapan;
          swal("Simpan Berhasil", "", "success");
          renderPenginapan(dataPenginapan);
          PenginapanModal.self.modal('hide');
        },
        error: function(e) {}
      });
    });
  }
});
</script>