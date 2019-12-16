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
         
                  <th style="width: 15%; text-align:center!important">Nama Daya Tarik Wisata</th>
                  <th style="width: 12%; text-align:center!important">Jenis</th>
                 
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


<div class="modal inmodal" id="objek_modal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Kelola Daya Tarik Wisata</h4>
        <span class="info"></span>
      </div>
      <div class="modal-body" id="modal-body">              
        <form role="form" id="user_form" onsubmit="return false;" type="multipart" autocomplete="off">
          <input type="hidden" id="id_objek" name="id_objek">
          <div class="form-group">
            <label for="nama">Nama Daya Tarik Wisata</label> 
            <input type="text" placeholder="Nama Objek" class="form-control" id="nama" name="nama" required="required">
          </div>
         

          <div class="form-group">
            <label for="id_jenis_objek">Jenis</label> 
            <select class="form-control mr-sm-2" id="id_jenis_objek" name="id_jenis_objek" required="required">
            </select>
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
  $('#pariwisata').addClass('active');
  $('#objek').addClass('active');


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


  var ObjekModal = {
    'self': $('#objek_modal'),
    'info': $('#objek_modal').find('.info'),
    'form': $('#objek_modal').find('#user_form'),
    'addBtn': $('#objek_modal').find('#add_btn'),
    'saveEditBtn': $('#objek_modal').find('#save_edit_btn'),
    'id_objek': $('#objek_modal').find('#id_objek'),
    'nama': $('#objek_modal').find('#nama'),
    'id_jenis_objek': $('#objek_modal').find('#id_jenis_objek'),
    'nama_jenis': $('#objek_modal').find('#nama_jenis'),
    'file': $('#objek_modal').find('#file'),
    'lokasi': $('#objek_modal').find('#lokasi'),
    'deskripsi': $('#objek_modal').find('#deskripsi'),
   
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

  var dataObjek = {};
  var dataJenis = {};

  toolbar.form.submit(function(event){
    event.preventDefault();
    switch(toolbar.form[0].target){
      case 'show':
        getObjek();
        break;
      case 'add':
        showObjekModal();
        break;
    }
  });

  getAllJenis();  
  function getAllJenis(){
    return $.ajax({
      url: `<?php echo site_url('ObjekController/getAllJenisOption/')?>`, 'type': 'GET',
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
    ObjekModal.id_jenis_objek.empty();
    ObjekModal.id_jenis_objek.append($('<option>', { value: "", text: "-- Pilih Jenis --"}));
    Object.values(data).forEach((d) => {
      ObjekModal.id_jenis_objek.append($('<option>', {
        value: d['id_jenis_objek'],
        text: d['id_jenis_objek'] + ' :: ' + d['nama_jenis_objek'],
      }));
    });
  }
  

  function getObjek(){
    buttonLoading(toolbar.showBtn);
    $.ajax({
      url: `<?=site_url('ObjekController/getAllObjek')?>`, 'type': 'GET',
      data: {},
      success: function (data){
        buttonIdle(toolbar.showBtn);
        var json = JSON.parse(data);
        if(json['error']){
          swal("Simpan Gagal", json['message'], "error");
          return;
        }
        dataObjek = json['data'];
        renderObjek(dataObjek);
      },
      error: function(e) {}
    });
  }
  document.getElementById("export_btn").href = '<?= site_url('PimpinanController/PdfAllObjek')?>';

  function renderObjek(data){
    if(data == null || typeof data != "object"){
      console.log("User::UNKNOWN DATA");
      return;
    }
    var i = 0;
    
    var renderData = [];
    Object.values(data).forEach((objek) => {
      var apprv;
      if(objek['id_user_approv']=='0'){
        apprv= "Belum Di Approv"
        }else{
          apprv = "Sudah Di Approv";
        };
      var detailButton =`
      <a  class="detail dropdown-item" href='<?=site_url()?>PimpinanController/DetailObjek?id_objek=${objek['id_objek']}'><i class='fa fa-share'></i> Detail </a>
      `; 
      var editButton = `
        <a hidden class="edit dropdown-item" data-id='${objek['id_objek']}'><i class='fa fa-pencil'></i> Edit</a>
      `;
      var deleteButton = `
        <a hidden class="delete dropdown-item" data-id='${objek['id_objek']}'><i class='fa fa-trash'></i> Hapus</a>
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
      renderData.push([objek['nama'], objek['nama_jenis_objek'], apprv, button]);
    });
    FDataTable.clear().rows.add(renderData).draw('full-hold');
  }

  
  FDataTable.on('click','.edit', function(){
    event.preventDefault();
    ObjekModal.form.trigger('reset');
    ObjekModal.self.modal('show');
    ObjekModal.addBtn.hide();
    ObjekModal.saveEditBtn.show();
    var id = $(this).data('id');
    var objek = dataObjek[id];
    ObjekModal.id_objek.val(objek['id_objek']);
    ObjekModal.nama.val(objek['nama']);
    ObjekModal.id_jenis_objek.val(objek['id_jenis_objek']);
    ObjekModal.file.val(objek['file']);
    ObjekModal.lokasi.val(objek['lokasi']);
    ObjekModal.deskripsi.val(objek['deskripsi']);
  
  });

  FDataTable.on('click','.delete', function(){
    event.preventDefault();
    var id = $(this).data('id');
    swal(swalDeleteConfigure).then((result) => {
      if(!result.value){ return; }
      $.ajax({
        url: "<?=site_url('ObjekController/deleteObjek')?>", 'type': 'POST',
        data: {'id_objek': id},
        success: function (data){
          var json = JSON.parse(data);
          if(json['error']){
            swal("Delete Gagal", json['message'], "error");
            return;
          }
          delete dataObjek[id];
          swal("Delete Berhasil", "", "success");
          renderObjek(dataObjek);
        },
        error: function(e) {}
      });
    });
  });

  function showObjekModal(){
    ObjekModal.self.modal('show');
    ObjekModal.addBtn.show();
    ObjekModal.saveEditBtn.hide();
    ObjekModal.form.trigger('reset');
  }

  ObjekModal.form.submit(function(event){
    event.preventDefault();
    switch(ObjekModal.form[0].target){
      case 'add':
        addObjek();
        break;
      case 'edit':
        editObjek();
        break;
    }
  });

  function addObjek(){
    swal(swalSaveConfigure).then((result) => {
      if(!result.value){ return; }
      buttonLoading(ObjekModal.addBtn);
      $.ajax({
        url: `<?=site_url('ObjekController/addObjek')?>`, 'type': 'POST',
        data: ObjekModal.form.serialize(),
        success: function (data){
          buttonIdle(ObjekModal.addBtn);
          var json = JSON.parse(data);
          if(json['error']){
            swal("Simpan Gagal", json['message'], "error");
            return;
          }
          var objek = json['data']
          dataObjek[objek['id_objek']] = objek;
          swal("Simpan Berhasil", "", "success");
          renderObjek(dataObjek);
          ObjekModal.self.modal('hide');
        },
        error: function(e) {}
      });
    });
  }
  function editObjek(){
    swal(swalSaveConfigure).then((result) => {
      if(!result.value){ return; }
      buttonLoading(ObjekModal.saveEditBtn);
      $.ajax({
        url: `<?=site_url('ObjekController/editObjek')?>`, 'type': 'POST',
        data: ObjekModal.form.serialize(),
        success: function (data){
          buttonIdle(ObjekModal.saveEditBtn);
          var json = JSON.parse(data);
          if(json['error']){
            swal("Simpan Gagal", json['message'], "error");
            return;
          }
          var objek = json['data']
          dataObjek[objek['id_objek']] = objek;
          swal("Simpan Berhasil", "", "success");
          renderObjek(dataObjek);
          ObjekModal.self.modal('hide');
        },
        error: function(e) {}
      });
    });
  }
});
</script>