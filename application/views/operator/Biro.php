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
             
                  <th style="width: 15%; text-align:center!important">Nama Biro / Agen</th>
                  <th style="width: 12%; text-align:center!important">Jenis</th>
                  <th style="width: 12%; text-align:center!important">Sertifikat</th>
                
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


<div class="modal inmodal" id="biro_modal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Kelola Biro dan Agen</h4>
        <span class="info"></span>
      </div>
      <div class="modal-body" id="modal-body">              
        <form role="form" id="user_form" onsubmit="return false;" type="multipart" autocomplete="off">
          <input type="hidden" id="id_biro" name="id_biro">
          <div class="form-group">
            <label for="nama">Nama Biro</label> 
            <input type="text" placeholder="Nama Biro" class="form-control" id="nama" name="nama" required="required">
          </div>

          <div class="form-group">
            <label for="id_jenis_biro">Jenis</label> 
            <select class="form-control mr-sm-2" id="id_jenis_biro" name="id_jenis_biro" required="required">
            </select>
          </div>
          <div class="form-group">
            <label for="id_sertifikat_biro">Sertifikat</label> 
            <select class="form-control mr-sm-2" id="id_sertifikat_biro" name="id_sertifikat_biro" required="required">
            </select>
          </div>

          <div class="form-group">
            <label for="alamat">Alamat</label> 
            <input type="text" placeholder="Alamat" class="form-control" id="alamat" name="alamat" required="required">
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
  $('#biro').addClass('active');

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


  var BiroModal = {
    'self': $('#biro_modal'),
    'info': $('#biro_modal').find('.info'),
    'form': $('#biro_modal').find('#user_form'),
    'addBtn': $('#biro_modal').find('#add_btn'),
    'saveEditBtn': $('#biro_modal').find('#save_edit_btn'),
    'id_biro': $('#biro_modal').find('#id_biro'),
    'nama': $('#biro_modal').find('#nama'),
    'id_jenis_biro': $('#biro_modal').find('#id_jenis_biro'),
    'nama_jenis_biro': $('#biro_modal').find('#nama_jenis_biro'),
    'id_sertifikat_biro': $('#biro_modal').find('#id_sertifikat_biro'),
    'nama_sertifikat_biro': $('#biro_modal').find('#nama_sertifikat_biro'),
    'file': $('#biro_modal').find('#file'),
    'alamat': $('#biro_modal').find('#alamat'),
    'lokasi': $('#biro_modal').find('#lokasi'),
    'deskripsi': $('#biro_modal').find('#deskripsi'),
   
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

  var dataBiro = {};
  var dataJenis = {};

  toolbar.form.submit(function(event){
    event.preventDefault();
    switch(toolbar.form[0].target){
      case 'show':
        getBiro();
        break;
      case 'add':
        showBiroModal();
        break;
    }
  });

  getAllJenis();  
  function getAllJenis(){
    return $.ajax({
      url: `<?php echo site_url('BiroController/getAllJenisOption/')?>`, 'type': 'GET',
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

    getAllSertifikat();  
    function getAllSertifikat(){
    return $.ajax({
      url: `<?php echo site_url('BiroController/getAllSertifikatOption/')?>`, 'type': 'GET',
      data: {},
      success: function (data){
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }
        dataSertifikat = json['data'];
        renderSertifikatSelection(dataSertifikat);
      },
      error: function(e) {}
    });
    }


   function renderJenisSelection(data){
    BiroModal.id_jenis_biro.empty();
    BiroModal.id_jenis_biro.append($('<option>', { value: "", text: "-- Pilih Jenis --"}));
    Object.values(data).forEach((d) => {
      BiroModal.id_jenis_biro.append($('<option>', {
        value: d['id_jenis_biro'],
        text: d['id_jenis_biro'] + ' :: ' + d['nama_jenis_biro'],
      }));
    });
    }

    function renderSertifikatSelection(data){
    BiroModal.id_sertifikat_biro.empty();
    BiroModal.id_sertifikat_biro.append($('<option>', { value: "", text: "-- Pilih Sertifikat --"}));
    Object.values(data).forEach((d) => {
      BiroModal.id_sertifikat_biro.append($('<option>', {
        value: d['id_sertifikat_biro'],
        text: d['id_sertifikat_biro'] + ' :: ' + d['nama_sertifikat_biro'],
      }));
    });
    }
  

  function getBiro(){
    buttonLoading(toolbar.showBtn);
    $.ajax({
      url: `<?=site_url('BiroController/getAllBiro')?>`, 'type': 'GET',
      data: {},
      success: function (data){
        buttonIdle(toolbar.showBtn);
        var json = JSON.parse(data);
        if(json['error']){
          swal("Simpan Gagal", json['message'], "error");
          return;
        }
        dataBiro = json['data'];
        renderBiro(dataBiro);
      },
      error: function(e) {}
    });
  }
  document.getElementById("export_btn").href = '<?= site_url('OperatorController/PdfAllBiro')?>';

  function renderBiro(data){
    if(data == null || typeof data != "object"){
      console.log("User::UNKNOWN DATA");
      return;
    }
    var i = 0;
    
    var renderData = [];
    Object.values(data).forEach((biro) => {
      var apprv;
      if(biro['id_user_approv']=='0'){
        apprv= "Belum Di Approv"
        }else{
          apprv = "Sudah Di Approv";
        };
      var detailButton =`
      <a class="detail dropdown-item" href='<?=site_url()?>OperatorController/DetailBiro?id_biro=${biro['id_biro']}'><i class='fa fa-share'></i> Detail Biro</a>
      `; 
      var editButton = `
        <a class="edit dropdown-item" data-id='${biro['id_biro']}'><i class='fa fa-pencil'></i> Edit Biro</a>
      `;
      var deleteButton = `
        <a class="delete dropdown-item" data-id='${biro['id_biro']}'><i class='fa fa-trash'></i> Hapus Biro</a>
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
      renderData.push([biro['nama'],biro['nama_jenis_biro'],biro['nama_sertifikat_biro'],apprv, button]);
    });
    FDataTable.clear().rows.add(renderData).draw('full-hold');
  }

  
  FDataTable.on('click','.edit', function(){
    event.preventDefault();
    BiroModal.form.trigger('reset');
    BiroModal.self.modal('show');
    BiroModal.addBtn.hide();
    BiroModal.saveEditBtn.show();
    var id = $(this).data('id');
    var biro = dataBiro[id];
    BiroModal.id_biro.val(biro['id_biro']);
    BiroModal.nama.val(biro['nama']);
    BiroModal.id_jenis_biro.val(biro['id_jenis_biro']);
    BiroModal.id_sertifikat_biro.val(biro['id_sertifikat_biro']);
    BiroModal.alamat.val(biro['alamat']);
    BiroModal.file.val(biro['file']);
    BiroModal.lokasi.val(biro['lokasi']);
    BiroModal.deskripsi.val(biro['deskripsi']);
   
  });

  FDataTable.on('click','.delete', function(){
    event.preventDefault();
    var id = $(this).data('id');
    swal(swalDeleteConfigure).then((result) => {
      if(!result.value){ return; }
      $.ajax({
        url: "<?=site_url('BiroController/deleteBiro')?>", 'type': 'POST',
        data: {'id_biro': id},
        success: function (data){
          var json = JSON.parse(data);
          if(json['error']){
            swal("Delete Gagal", json['message'], "error");
            return;
          }
          delete dataBiro[id];
          swal("Delete Berhasil", "", "success");
          renderBiro(dataBiro);
        },
        error: function(e) {}
      });
    });
  });

  function showBiroModal(){
    BiroModal.self.modal('show');
    BiroModal.addBtn.show();
    BiroModal.saveEditBtn.hide();
    BiroModal.form.trigger('reset');
  }

  BiroModal.form.submit(function(event){
    event.preventDefault();
    switch(BiroModal.form[0].target){
      case 'add':
        addBiro();
        break;
      case 'edit':
        editBiro();
        break;
    }
  });

  function addBiro(){
    swal(swalSaveConfigure).then((result) => {
      if(!result.value){ return; }
      buttonLoading(BiroModal.addBtn);
      $.ajax({
        url: `<?=site_url('BiroController/addBiro')?>`, 'type': 'POST',
        data: BiroModal.form.serialize(),
        success: function (data){
          buttonIdle(BiroModal.addBtn);
          var json = JSON.parse(data);
          if(json['error']){
            swal("Simpan Gagal", json['message'], "error");
            return;
          }
          var biro = json['data']
          dataBiro[biro['id_biro']] = biro;
          swal("Simpan Berhasil", "", "success");
          renderBiro(dataBiro);
          BiroModal.self.modal('hide');
        },
        error: function(e) {}
      });
    });
  }

  function editBiro(){
    swal(swalSaveConfigure).then((result) => {
      if(!result.value){ return; }
      buttonLoading(BiroModal.saveEditBtn);
      $.ajax({
        url: `<?=site_url('BiroController/editBiro')?>`, 'type': 'POST',
        data: BiroModal.form.serialize(),
        success: function (data){
          buttonIdle(BiroModal.saveEditBtn);
          var json = JSON.parse(data);
          if(json['error']){
            swal("Simpan Gagal", json['message'], "error");
            return;
          }
          var biro = json['data']
          dataBiro[biro['id_biro']] = biro;
          swal("Simpan Berhasil", "", "success");
          renderBiro(dataBiro);
          BiroModal.self.modal('hide');
        },
        error: function(e) {}
      });
    });
  }
});
</script>