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
         
                  <th style="width: 15%; text-align:center!important">Nama Desa Wisata</th>
                  <th style="width: 12%; text-align:center!important">Kategori</th>
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


<div class="modal inmodal" id="desawisata_modal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Kelola Desa Wisata</h4>
        <span class="info"></span>
      </div>
      <div class="modal-body" id="modal-body">              
        <form role="form" id="user_form" onsubmit="return false;" type="multipart" autocomplete="off">
          <input type="hidden" id="id_desawisata" name="id_desawisata">
          <div class="form-group">
            <label for="nama">Nama Desa Wisata</label> 
            <input type="text" placeholder="Nama Desawisata" class="form-control" id="nama" name="nama" required="required">
          </div>
          <!-- <div class="form-group">
            <label for="nama">Tahun Berdiri</label> 
            <input type="number" placeholder="" class="form-control" id="nama" name="tahun_berdiri" required="required">
          </div> -->
          <div class="form-group">
            <label for="kabupaten">Kabupaten / Kota</label> 
            <select class="form-control mr-sm-2" id="kabupaten" name="id_kabupaten" required="required">
            </select>
          </div>

          <div class="form-group">
            <label for="id_kategori">Kategori</label> 
            <select class="form-control mr-sm-2" id="id_kategori" name="id_kategori" required="required">
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

  $('#desawisata').addClass('active');


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


  var DesawisataModal = {
    'self': $('#desawisata_modal'),
    'info': $('#desawisata_modal').find('.info'),
    'form': $('#desawisata_modal').find('#user_form'),
    'addBtn': $('#desawisata_modal').find('#add_btn'),
    'saveEditBtn': $('#desawisata_modal').find('#save_edit_btn'),
    'id_desawisata': $('#desawisata_modal').find('#id_desawisata'),
    'nama': $('#desawisata_modal').find('#nama'),
    'id_kategori': $('#desawisata_modal').find('#id_kategori'),
    'nama_kategori': $('#desawisata_modal').find('#nama_kategori'),
    'file': $('#desawisata_modal').find('#file'),
    'lokasi': $('#desawisata_modal').find('#lokasi'),
    'deskripsi': $('#desawisata_modal').find('#deskripsi'),
    'kabupaten': $('#desawisata_modal').find('#kabupaten'),
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

  var dataDesawisata = {};
  var dataKategori = {};

  toolbar.form.submit(function(event){
    event.preventDefault();
    switch(toolbar.form[0].target){
      case 'show':
        getDesawisata();
        break;
      case 'add':
        showDesawisataModal();
        break;
    }
  });

  getAllKategori();  
  function getAllKategori(){
    return $.ajax({
      url: `<?php echo site_url('DesawisataController/getAllKategoriOption/')?>`, 'type': 'GET',
      data: {},
      success: function (data){
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }
        dataKategori = json['data'];
        renderKategoriSelection(dataKategori);
      },
      error: function(e) {}
    });
  }


   function renderKategoriSelection(data){
    DesawisataModal.id_kategori.empty();
    DesawisataModal.id_kategori.append($('<option>', { value: "", text: "-- Pilih Kategori --"}));
    Object.values(data).forEach((d) => {
      DesawisataModal.id_kategori.append($('<option>', {
        value: d['id_kategori'],
        text: d['id_kategori'] + ' :: ' + d['nama_kategori'],
      }));
    });
  }
  

  function getDesawisata(){
    buttonLoading(toolbar.showBtn);
    $.ajax({
      url: `<?=site_url('DesawisataController/getAllDesawisata')?>`, 'type': 'GET',
      data: {},
      success: function (data){
        buttonIdle(toolbar.showBtn);
        var json = JSON.parse(data);
        if(json['error']){
          swal("Simpan Gagal", json['message'], "error");
          return;
        }
        dataDesawisata = json['data'];
        renderDesawisata(dataDesawisata);
      },
      error: function(e) {}
    });
  }

  function renderDesawisata(data){
    if(data == null || typeof data != "object"){
      console.log("User::UNKNOWN DATA");
      return;
    }
    var i = 0;
    
    var renderData = [];
    Object.values(data).forEach((desawisata) => {
      var apprv;
      if(desawisata['id_user_approv']=='0'){
        apprv= "Belum Di Approv"
        }else{
          apprv = "Sudah Di Approv";
        };
      var detailButton =`
      <a class="detail dropdown-item" href='<?=site_url()?>AdminController/DetailDesawisata?id_desawisata=${desawisata['id_desawisata']}&nama_desawisata=${desawisata['nama']}'><i class='fa fa-share'></i> Detail Desa Wisata</a>
      `; 
      var editButton = `
        <a class="edit dropdown-item" data-id='${desawisata['id_desawisata']}'><i class='fa fa-pencil'></i> Edit Desawisata</a>
      `;
      var deleteButton = `
        <a class="delete dropdown-item" data-id='${desawisata['id_desawisata']}'><i class='fa fa-trash'></i> Hapus Desawisata</a>
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
      renderData.push([desawisata['nama'], desawisata['nama_kategori'], desawisata['nama_kabupaten'],apprv, button]);
    });
    FDataTable.clear().rows.add(renderData).draw('full-hold');
  }

  
  FDataTable.on('click','.edit', function(){
    event.preventDefault();
    DesawisataModal.form.trigger('reset');
    DesawisataModal.self.modal('show');
    DesawisataModal.addBtn.hide();
    DesawisataModal.saveEditBtn.show();
    var id = $(this).data('id');
    var desawisata = dataDesawisata[id];
    DesawisataModal.id_desawisata.val(desawisata['id_desawisata']);
    DesawisataModal.nama.val(desawisata['nama']);
    DesawisataModal.id_kategori.val(desawisata['id_kategori']);
    DesawisataModal.file.val(desawisata['file']);
    DesawisataModal.lokasi.val(desawisata['lokasi']);
    DesawisataModal.deskripsi.val(desawisata['deskripsi']);
    DesawisataModal.kabupaten.val(desawisata['id_kabupaten']);
  });

  FDataTable.on('click','.delete', function(){
    event.preventDefault();
    var id = $(this).data('id');
    swal(swalDeleteConfigure).then((result) => {
      if(!result.value){ return; }
      $.ajax({
        url: "<?=site_url('DesawisataController/deleteDesawisata')?>", 'type': 'POST',
        data: {'id_desawisata': id},
        success: function (data){
          var json = JSON.parse(data);
          if(json['error']){
            swal("Delete Gagal", json['message'], "error");
            return;
          }
          delete dataDesawisata[id];
          swal("Delete Berhasil", "", "success");
          renderDesawisata(dataDesawisata);
        },
        error: function(e) {}
      });
    });
  });

  function showDesawisataModal(){
    DesawisataModal.self.modal('show');
    DesawisataModal.addBtn.show();
    DesawisataModal.saveEditBtn.hide();
    DesawisataModal.form.trigger('reset');
  }

  DesawisataModal.form.submit(function(event){
    event.preventDefault();
    switch(DesawisataModal.form[0].target){
      case 'add':
        addDesawisata();
        break;
      case 'edit':
        editDesawisata();
        break;
    }
  });

  function addDesawisata(){
    swal(swalSaveConfigure).then((result) => {
      if(!result.value){ return; }
      buttonLoading(DesawisataModal.addBtn);
      $.ajax({
        url: `<?=site_url('DesawisataController/addDesawisata')?>`, 'type': 'POST',
        data: DesawisataModal.form.serialize(),
        success: function (data){
          buttonIdle(DesawisataModal.addBtn);
          var json = JSON.parse(data);
          if(json['error']){
            swal("Simpan Gagal", json['message'], "error");
            return;
          }
          var desawisata = json['data']
          dataDesawisata[desawisata['id_desawisata']] = desawisata;
          swal("Simpan Berhasil", "", "success");
          renderDesawisata(dataDesawisata);
          DesawisataModal.self.modal('hide');
        },
        error: function(e) {}
      });
    });
  }
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
    DesawisataModal.kabupaten.empty();
    DesawisataModal.kabupaten.append($('<option>', { value: "", text: "-- Pilih Kabupaten --"}));
    Object.values(data).forEach((d) => {
      DesawisataModal.kabupaten.append($('<option>', {
        value: d['id_kabupaten'],
        text: d['id_kabupaten'] + ' :: ' + d['nama_kabupaten'],
      }));
    });
  }
  
  function editDesawisata(){
    swal(swalSaveConfigure).then((result) => {
      if(!result.value){ return; }
      buttonLoading(DesawisataModal.saveEditBtn);
      $.ajax({
        url: `<?=site_url('DesawisataController/editDesawisata')?>`, 'type': 'POST',
        data: DesawisataModal.form.serialize(),
        success: function (data){
          buttonIdle(DesawisataModal.saveEditBtn);
          var json = JSON.parse(data);
          if(json['error']){
            swal("Simpan Gagal", json['message'], "error");
            return;
          }
          var desawisata = json['data']
          dataDesawisata[desawisata['id_desawisata']] = desawisata;
          swal("Simpan Berhasil", "", "success");
          renderDesawisata(dataDesawisata);
          DesawisataModal.self.modal('hide');
        },
        error: function(e) {}
      });
    });
  }
});
</script>