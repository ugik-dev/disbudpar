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
             
                  <th style="width: 15%; text-align:center!important">Nama Sarana dan Prasarana</th>
                  <th style="width: 12%; text-align:center!important">Jenis</th>
                  <th style="width: 12%; text-align:center!important">Kabupaten / Kota</th>
                 
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


<div class="modal inmodal" id="saranaprasarana_modal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Kelola Sarana dan Prasarana</h4>
        <span class="info"></span>
      </div>
      <div class="modal-body" id="modal-body">              
        <form role="form" id="user_form" onsubmit="return false;" type="multipart" autocomplete="off">
          <input type="hidden" id="id_saranaprasarana" name="id_saranaprasarana">
          <div class="form-group">
            <label for="nama">Nama Sarana dan Prasarana</label> 
            <input type="text" placeholder="Nama Saranaprasarana" class="form-control" id="nama" name="nama" required="required">
          </div>
          <div class="form-group">
            <label for="kabupaten">Kabupaten / Kota</label> 
            <select class="form-control mr-sm-2" id="kabupaten" name="id_kabupaten" required="required">
            </select>
          </div>
          <div class="form-group">
            <label for="id_jenis_saranaprasarana">Jenis</label> 
            <select class="form-control mr-sm-2" id="id_jenis_saranaprasarana" name="id_jenis_saranaprasarana" required="required">
            </select>
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label> 
            <input type="text" placeholder="Alamat" class="form-control" id="alamat" name="alamat" required="required">
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
  $('#seni_dan_budaya').addClass('active');
  $('#saranaprasarana').addClass('active');

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


  var SaranaprasaranaModal = {
    'self': $('#saranaprasarana_modal'),
    'info': $('#saranaprasarana_modal').find('.info'),
    'form': $('#saranaprasarana_modal').find('#user_form'),
    'addBtn': $('#saranaprasarana_modal').find('#add_btn'),
    'saveEditBtn': $('#saranaprasarana_modal').find('#save_edit_btn'),
    'id_saranaprasarana': $('#saranaprasarana_modal').find('#id_saranaprasarana'),
    'nama': $('#saranaprasarana_modal').find('#nama'),
    'id_jenis_saranaprasarana': $('#saranaprasarana_modal').find('#id_jenis_saranaprasarana'),
    'nama_jenis': $('#saranaprasarana_modal').find('#nama_jenis'),
    'alamat': $('#saranaprasarana_modal').find('#alamat'),
    'lokasi': $('#saranaprasarana_modal').find('#lokasi'),
    'deskripsi': $('#saranaprasarana_modal').find('#deskripsi'),
    'kabupaten': $('#saranaprasarana_modal').find('#kabupaten'),
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

  var dataSaranaprasarana = {};
  var dataJenis = {};

  toolbar.form.submit(function(event){
    event.preventDefault();
    switch(toolbar.form[0].target){
      case 'show':
        getSaranaprasarana();
        break;
      case 'add':
        showSaranaprasaranaModal();
        break;
    }
  });

  getAllJenis();  
  function getAllJenis(){
    return $.ajax({
      url: `<?php echo site_url('SaranaprasaranaController/getAllJenisOption/')?>`, 'type': 'GET',
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
    SaranaprasaranaModal.id_jenis_saranaprasarana.empty();
    SaranaprasaranaModal.id_jenis_saranaprasarana.append($('<option>', { value: "", text: "-- Pilih Jenis --"}));
    Object.values(data).forEach((d) => {
      SaranaprasaranaModal.id_jenis_saranaprasarana.append($('<option>', {
        value: d['id_jenis_saranaprasarana'],
        text: d['id_jenis_saranaprasarana'] + ' :: ' + d['nama_jenis_saranaprasarana'],
      }));
    });
  }
  

  function getSaranaprasarana(){
    buttonLoading(toolbar.showBtn);
    $.ajax({
      url: `<?=site_url('SaranaprasaranaController/getAllSaranaprasarana')?>`, 'type': 'GET',
      data: {},
      success: function (data){
        buttonIdle(toolbar.showBtn);
        var json = JSON.parse(data);
        if(json['error']){
          swal("Simpan Gagal", json['message'], "error");
          return;
        }
        dataSaranaprasarana = json['data'];
        renderSaranaprasarana(dataSaranaprasarana);
      },
      error: function(e) {}
    });
  }
  document.getElementById("export_btn").href = '<?= site_url('AdminController/PdfAllSaranaprasarana')?>';

  function renderSaranaprasarana(data){
    if(data == null || typeof data != "object"){
      console.log("User::UNKNOWN DATA");
      return;
    }
    var i = 0;
    
    var renderData = [];
    Object.values(data).forEach((saranaprasarana) => {
      var apprv;
      if(saranaprasarana['id_user_approv']=='0'){
        apprv= "Belum Di Approv"
        }else{
          apprv = "Sudah Di Approv";
        };
      var detailButton =`
      <a class="detail dropdown-item" href='<?=site_url()?>AdminController/DetailSaranaprasarana?id_saranaprasarana=${saranaprasarana['id_saranaprasarana']}'><i class='fa fa-share'></i> Detail Sarana dan Prasarana</a>
      `; 
      var editButton = `
        <a class="edit dropdown-item" data-id='${saranaprasarana['id_saranaprasarana']}'><i class='fa fa-pencil'></i> Edit Saranaprasarana</a>
      `;
      var deleteButton = `
        <a class="delete dropdown-item" data-id='${saranaprasarana['id_saranaprasarana']}'><i class='fa fa-trash'></i> Hapus Saranaprasarana</a>
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
      renderData.push([saranaprasarana['nama'], saranaprasarana['nama_jenis_saranaprasarana'],saranaprasarana['nama_kabupaten'],apprv, button]);
    });
    FDataTable.clear().rows.add(renderData).draw('full-hold');
  }

  
  FDataTable.on('click','.edit', function(){
    event.preventDefault();
    SaranaprasaranaModal.form.trigger('reset');
    SaranaprasaranaModal.self.modal('show');
    SaranaprasaranaModal.addBtn.hide();
    SaranaprasaranaModal.saveEditBtn.show();
    var id = $(this).data('id');
    var saranaprasarana = dataSaranaprasarana[id];
    SaranaprasaranaModal.id_saranaprasarana.val(saranaprasarana['id_saranaprasarana']);
    SaranaprasaranaModal.nama.val(saranaprasarana['nama']);
    SaranaprasaranaModal.id_jenis_saranaprasarana.val(saranaprasarana['id_jenis_saranaprasarana']);
    SaranaprasaranaModal.alamat.val(saranaprasarana['alamat']);
    SaranaprasaranaModal.lokasi.val(saranaprasarana['lokasi']);
    SaranaprasaranaModal.deskripsi.val(saranaprasarana['deskripsi']);
    SaranaprasaranaModal.kabupaten.val(saranaprasarana['id_kabupaten']);
  });

  FDataTable.on('click','.delete', function(){
    event.preventDefault();
    var id = $(this).data('id');
    swal(swalDeleteConfigure).then((result) => {
      if(!result.value){ return; }
      $.ajax({
        url: "<?=site_url('SaranaprasaranaController/deleteSaranaprasarana')?>", 'type': 'POST',
        data: {'id_saranaprasarana': id},
        success: function (data){
          var json = JSON.parse(data);
          if(json['error']){
            swal("Delete Gagal", json['message'], "error");
            return;
          }
          delete dataSaranaprasarana[id];
          swal("Delete Berhasil", "", "success");
          renderSaranaprasarana(dataSaranaprasarana);
        },
        error: function(e) {}
      });
    });
  });

  function showSaranaprasaranaModal(){
    SaranaprasaranaModal.self.modal('show');
    SaranaprasaranaModal.addBtn.show();
    SaranaprasaranaModal.saveEditBtn.hide();
    SaranaprasaranaModal.form.trigger('reset');
  }

  SaranaprasaranaModal.form.submit(function(event){
    event.preventDefault();
    switch(SaranaprasaranaModal.form[0].target){
      case 'add':
        addSaranaprasarana();
        break;
      case 'edit':
        editSaranaprasarana();
        break;
    }
  });
    getAllKabupaten();  
    function getAllKabupaten(){
      return $.ajax({
        url: `<?php echo site_url('AdminController/getAllKabupaten/')?>`, 'type': 'GET',
        data: {},
        success: function (data){
          var json = JSON.parse(data);
          if(json['error']){
            return;
          }
          dataKabupaten = json['data'];
          renderKabupatenSelection(dataKabupaten);
        },
        error: function(e) {}
      });
    }

    function renderKabupatenSelection(data){
      SaranaprasaranaModal.kabupaten.empty();
      SaranaprasaranaModal.kabupaten.append($('<option>', { value: "", text: "-- Pilih Kabupaten --"}));
      Object.values(data).forEach((d) => {
        SaranaprasaranaModal.kabupaten.append($('<option>', {
          value: d['id_kabupaten'],
          text: d['id_kabupaten'] + ' :: ' + d['nama_kabupaten'],
        }));
      });
    }
  function addSaranaprasarana(){
    swal(swalSaveConfigure).then((result) => {
      if(!result.value){ return; }
      buttonLoading(SaranaprasaranaModal.addBtn);
      $.ajax({
        url: `<?=site_url('SaranaprasaranaController/addSaranaprasarana')?>`, 'type': 'POST',
        data: SaranaprasaranaModal.form.serialize(),
        success: function (data){
          buttonIdle(SaranaprasaranaModal.addBtn);
          var json = JSON.parse(data);
          if(json['error']){
            swal("Simpan Gagal", json['message'], "error");
            return;
          }
          var saranaprasarana = json['data']
          dataSaranaprasarana[saranaprasarana['id_saranaprasarana']] = saranaprasarana;
          swal("Simpan Berhasil", "", "success");
          renderSaranaprasarana(dataSaranaprasarana);
          SaranaprasaranaModal.self.modal('hide');
        },
        error: function(e) {}
      });
    });
  }

  
  function editSaranaprasarana(){
    swal(swalSaveConfigure).then((result) => {
      if(!result.value){ return; }
      buttonLoading(SaranaprasaranaModal.saveEditBtn);
      $.ajax({
        url: `<?=site_url('SaranaprasaranaController/editSaranaprasarana')?>`, 'type': 'POST',
        data: SaranaprasaranaModal.form.serialize(),
        success: function (data){
          buttonIdle(SaranaprasaranaModal.saveEditBtn);
          var json = JSON.parse(data);
          if(json['error']){
            swal("Simpan Gagal", json['message'], "error");
            return;
          }
          var saranaprasarana = json['data']
          dataSaranaprasarana[saranaprasarana['id_saranaprasarana']] = saranaprasarana;
          swal("Simpan Berhasil", "", "success");
          renderSaranaprasarana(dataSaranaprasarana);
          SaranaprasaranaModal.self.modal('hide');
        },
        error: function(e) {}
      });
    });
  }
});
</script>