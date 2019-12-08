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
             
                  <th style="width: 15%; text-align:center!important">Nama Tenaga Kerja</th>
                  <th style="width: 12%; text-align:center!important">Posisi</th>
                  <th style="width: 12%; text-align:center!important">Kabupaten / Kota</th>
                  <th style="width: 12%; text-align:center!important">Sertifikasi</th>
              
                 
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


<div class="modal inmodal" id="tenagakerja_modal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Kelola Tenaga Kerja</h4>
        <span class="info"></span>
      </div>
      <div class="modal-body" id="modal-body">              
        <form role="form" id="user_form" onsubmit="return false;" type="multipart" autocomplete="off">
          <input type="hidden" id="id_sdm" name="id_sdm">
          <div class="form-group">
            <label for="nama">Nama</label> 
            <input type="text" placeholder="Nama Tenaga Kerja" class="form-control" id="nama_sdm" name="nama_sdm" required="required">
          </div>
          <div class="form-group">
            <label for="kabupaten">Kabupaten / Kota</label> 
            <select class="form-control mr-sm-2" id="kabupaten" name="id_kabupaten" required="required">
            </select>
          </div>
          <div class="form-group">
            <label for="pendidikan">Pendidikan</label> 
            <select class="form-control mr-sm-2" id="id_pendidikan" name="id_pendidikan" required="required">
            </select>
          </div>
          <div class="form-group">
            <label for="no_ktp">No KTP</label> 
            <input type="text" placeholder="" class="form-control" id="no_ktp" name="no_ktp" required="required">
          </div>
          <div class="form-group">
            <label for="no_hp">No HP /WA</label> 
            <input type="text" placeholder="" class="form-control" id="no_hp" name="no_hp" required="required">
          </div>
          <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir</label> 
            <input type="text" placeholder="" class="form-control" id="tempat_lahir" name="tempat_lahir" required="required">
          </div>
          <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label> 
            <input type="date" placeholder="Deskripsi" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required="required">
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label> 
            <textarea rows="2" type="text" placeholder="" class="form-control" id="alamat" name="alamat" required="required"></textarea>
          </div>
          <div class="form-group">
          <label for="lvl">Posisi</label> 
            <select class="form-control mr-sm-2" id="id_lv1" name="id_lv1" required="required">
            </select>
          </div>
          <div class="form-group">
            <select class="form-control mr-sm-2" id="id_lv2" name="id_lv2" required="">
            </select>
          </div>
          <div class="form-group">
            <select class="form-control mr-sm-2" id="id_lv3" name="id_lv3" required="">
            </select>
          </div>
          <div class="form-group">
            <select class="form-control mr-sm-2" id="id_lv4" name="id_lv4" required="">
            </select>
          </div>
          <label for="jumlahanggota"></label> 
          <div class="form-group">      
            <div class="btn-group btn-group-toggle" data-toggle="buttons" id="id_jenis_kelamin">
                <label class="btn btn-secondary active">
                    <input type="radio" name="id_jenis_kelamin" value="1"  autocomplete="on" checked> Laki-Laki
                </label>
                <label class="btn btn-secondary">
                    <input type="radio" name="id_jenis_kelamin" value="2"  autocomplete="off"> Perempuan
                </label>
            </div>
          </div>
          <div class="form-group">      
            <div class="btn-group btn-group-toggle" data-toggle="buttons" >
                <label class="btn btn-secondary ">
                    <input type="radio" name="id_sertifikasi" value="1" id="id_sertifikasi" autocomplete="on" > Sudah Sertifikasi
                </label>
                <label class="btn btn-secondary active">
                    <input type="radio" name="id_sertifikasi" value="2" id="id_sertifikasi" autocomplete="off" checked> Belum Sertifikasi
                </label>
            </div>
          </div>
          <div class="form-group">      
            <div class="btn-group btn-group-toggle" data-toggle="buttons" >
                <label class="btn btn-secondary ">
                    <input type="radio" name="id_pelatihan" value="1"  id="id_pelatihan"autocomplete="off" > Sudah Pelatihan
                </label>
                <label class="btn btn-secondary active">
                    <input type="radio" name="id_pelatihan" value="2" id="id_pelatihan" autocomplete="off" checked> Belum Pelatihan
                </label>
            </div>
          </div>
          <div class="form-group">
            <label for="deskripsi">Tahun Sertifikasi</label> 
            <input type="number" placeholder="" class="form-control" id="tahun_sertifikasi" name="tahun_sertifikasi" required="required">
          </div>
          <div class="form-group">
            <label for="deskripsi">Penyelenggara Sertifikasi</label> 
            <input type="text" placeholder="" class="form-control" id="penyelenggara_sertifikasi" name="penyelenggara_sertifikasi" required="required">
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
  $('#tenagakerja').addClass('active');

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


  var TenagakerjaModal = {
    'self': $('#tenagakerja_modal'),
    'info': $('#tenagakerja_modal').find('.info'),
    'form': $('#tenagakerja_modal').find('#user_form'),
    'addBtn': $('#tenagakerja_modal').find('#add_btn'),
    'saveEditBtn': $('#tenagakerja_modal').find('#save_edit_btn'),
    'id_sdm': $('#tenagakerja_modal').find('#id_sdm'),
    'nama_sdm': $('#tenagakerja_modal').find('#nama_sdm'),
    'kabupaten': $('#tenagakerja_modal').find('#kabupaten'),
    'id_pendidikan': $('#tenagakerja_modal').find('#id_pendidikan'),
    'no_ktp': $('#tenagakerja_modal').find('#no_ktp'),
    'no_hp': $('#tenagakerja_modal').find('#no_hp'),
    'tempat_lahir': $('#tenagakerja_modal').find('#tempat_lahir'),
    'tanggal_lahir': $('#tenagakerja_modal').find('#tanggal_lahir'),
    'alamat': $('#tenagakerja_modal').find('#alamat'),
    'id_lv1': $('#tenagakerja_modal').find('#id_lv1'),   
    'id_lv2': $('#tenagakerja_modal').find('#id_lv2'), 
    'id_lv3': $('#tenagakerja_modal').find('#id_lv3'),    
    'id_lv4': $('#tenagakerja_modal').find('#id_lv4'),
    'id_jenis_kelamin': $('#tenagakerja_modal').find('#id_jenis_kelamin'), 

    'id_pelatihan': $('#tenagakerja_modal').find('#id_pelatihan'),
    'id_sertifikasi': $('#tenagakerja_modal').find('#id_sertifikasi'),
    'tahun_sertifikasi': $('#tenagakerja_modal').find('#tahun_sertifikasi'),
    'penyelenggara_sertifikasi': $('#tenagakerja_modal').find('#penyelenggara_sertifikasi'),
  }
  //resetForm();
  function resetForm(){
  TenagakerjaModal.id_lv2.hide();
  TenagakerjaModal.id_lv3.hide();
  TenagakerjaModal.id_lv4.hide();
  TenagakerjaModal.id_lv2.hide('');
  TenagakerjaModal.id_lv3.val('');
  TenagakerjaModal.id_lv4.val('');
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

  var dataTenagakerja = {};
  var dataJ = {};
  var dataJ2 = {};

  toolbar.form.submit(function(event){
    event.preventDefault();
    switch(toolbar.form[0].target){
      case 'show':
        getTenagakerja();
        break;
      case 'add':
        showTenagakerjaModal();
        break;
    }
  });
  getPendidikanOption();  
  function getPendidikanOption(){
    return $.ajax({
      url: `<?php echo site_url('TenagakerjaController/getPendidikanOption/')?>`, 'type': 'GET',
      data: {},
      success: function (data){
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }
        dataPendidikan = json['data'];
        renderPendidikanSelection(dataPendidikan);
      },
      error: function(e) {}
    });
   
  }

  getLv1Option();  
  function getLv1Option(){
    return $.ajax({
      url: `<?php echo site_url('TenagakerjaController/getLv1Option/')?>`, 'type': 'GET',
      data: {},
      success: function (data){
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }
        dataLv1 = json['data'];
        renderLv1Selection(dataLv1);
      },
      error: function(e) {}
    });
   
  }

  
  function getLv2Option(){
    return $.ajax({
      url: `<?php echo site_url('TenagakerjaController/getLv2Option/')?>`, 'type': 'GET',
      data: {id_lv1 : TenagakerjaModal.id_lv1.val() },
      success: function (data){
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }

        dataLv2 = json['data'];
        if(dataLv2 == ''){
           TenagakerjaModal.id_lv2.hide();
           TenagakerjaModal.id_lv3.hide();
           TenagakerjaModal.id_lv4.hide();
           TenagakerjaModal.id_lv2.prop('disabled',true)
           TenagakerjaModal.id_lv3.prop('disabled',true)
           TenagakerjaModal.id_lv4.prop('disabled',true)
        }else{
            renderLv2Selection(dataLv2);
            
            TenagakerjaModal.id_lv2.show();  
            TenagakerjaModal.id_lv2.prop('disabled',false)
            TenagakerjaModal.id_lv3.prop('disabled',true)
            TenagakerjaModal.id_lv4.prop('disabled',true) 
            TenagakerjaModal.id_lv3.hide();
            TenagakerjaModal.id_lv4.hide();       
        }

      },
      error: function(e) {}
    });
  }

  function getLv3Option(){
    return $.ajax({
      url: `<?php echo site_url('TenagakerjaController/getLv3Option/')?>`, 'type': 'GET',
      data: {id_lv2 : TenagakerjaModal.id_lv2.val() },
      success: function (data){
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }
        dataLv3 = json['data'];
        dataLv3 = json['data'];
        if(dataLv3 == ''){
            
            TenagakerjaModal.id_lv3.hide();
            TenagakerjaModal.id_lv4.hide();          
           TenagakerjaModal.id_lv3.prop('disabled',true)
           TenagakerjaModal.id_lv4.prop('disabled',true)
        }else{
            renderLv3Selection(dataLv3);
            TenagakerjaModal.id_lv3.show();     
            TenagakerjaModal.id_lv3.prop('disabled',false)
            TenagakerjaModal.id_lv4.hide(); 
            TenagakerjaModal.id_lv4.prop('disabled',true)    
        }
      },
      error: function(e) {}
    });
  }
  function getLv4Option(){
    return $.ajax({
      url: `<?php echo site_url('TenagakerjaController/getLv4Option/')?>`, 'type': 'GET',
      data: {id_lv3 : TenagakerjaModal.id_lv3.val() },
      success: function (data){
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }
        dataLv4 = json['data'];
        dataLv4 = json['data'];
        if(dataLv4 == ''){        
            TenagakerjaModal.id_lv4.hide();         
           TenagakerjaModal.id_lv4.prop('disabled',true)
        }else{
            renderLv4Selection(dataLv4);
            TenagakerjaModal.id_lv4.prop('disabled',false)
            TenagakerjaModal.id_lv4.show();          
        }
      },
      error: function(e) {}
    });
  }

    TenagakerjaModal.id_lv1.on('change', function(e){        
      getLv2Option();
    });

    TenagakerjaModal.id_lv2.on('change', function(e){
        getLv3Option(); 
    });
    TenagakerjaModal.id_lv3.on('change', function(e){
        getLv4Option(); 
    });


   function renderPendidikanSelection(data){
    TenagakerjaModal.id_pendidikan.empty();
    TenagakerjaModal.id_pendidikan.append($('<option>', { value: "", text: "-- Pilih Pendidikan--"}));
    Object.values(data).forEach((d) => {
      TenagakerjaModal.id_pendidikan.append($('<option>', {
        value: d['id_pendidikan'],
        text: d['id_pendidikan'] + ' :: ' + d['nama_pendidikan'],
      }));
     
      });
    }

   function renderLv1Selection(data){
    TenagakerjaModal.id_lv1.empty();
    TenagakerjaModal.id_lv1.append($('<option>', { value: "", text: "-- Pilih --"}));
    Object.values(data).forEach((d) => {
      TenagakerjaModal.id_lv1.append($('<option>', {
        value: d['id_lv1'],
        text: d['id_lv1'] + ' :: ' + d['nama_lv1'],
      }));
     
    });
    }

   function renderLv2Selection(data){
       
    TenagakerjaModal.id_lv2.empty();
    TenagakerjaModal.id_lv2.append($('<option>', { value: "", text: "-- Pilih --"})); 
    Object.values(data).forEach((d) => {
      TenagakerjaModal.id_lv2.append($('<option>', {
        value: d['id_lv2'],
        text:  d['nama_lv2'],
      }));
    });
    }
    function renderLv3Selection(data){
        TenagakerjaModal.id_lv3.empty();
        TenagakerjaModal.id_lv3.append($('<option>', { value: "", text: "-- Pilih --"}));
    
            Object.values(data).forEach((d) => {
        TenagakerjaModal.id_lv3.append($('<option>', {
            value: d['id_lv3'],
            text:  d['nama_lv3'],
        }));
        });
    }
   function renderLv4Selection(data){
    TenagakerjaModal.id_lv4.empty();
     TenagakerjaModal.id_lv4.append($('<option>', { value: "", text: "-- Pilih --"}));
   
        Object.values(data).forEach((d) => {
      TenagakerjaModal.id_lv4.append($('<option>', {
        value: d['id_lv4'],
        text:  d['nama_lv4'],
      }));
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
    TenagakerjaModal.kabupaten.empty();
    TenagakerjaModal.kabupaten.append($('<option>', { value: "", text: "-- Pilih Kabupaten --"}));
    Object.values(data).forEach((d) => {
      TenagakerjaModal.kabupaten.append($('<option>', {
        value: d['id_kabupaten'],
        text: d['id_kabupaten'] + ' :: ' + d['nama_kabupaten'],
      }));
    });
  }

  function getTenagakerja(){
    buttonLoading(toolbar.showBtn);
    $.ajax({
      url: `<?=site_url('TenagakerjaController/getAllTenagakerja')?>`, 'type': 'GET',
      data: {},
      success: function (data){
        buttonIdle(toolbar.showBtn);
        var json = JSON.parse(data);
        if(json['error']){
          swal("Simpan Gagal", json['message'], "error");
          return;
        }
        dataTenagakerja = json['data'];
        renderTenagakerja(dataTenagakerja);
      },
      error: function(e) {}
    });
  }

  function renderTenagakerja(data){
    if(data == null || typeof data != "object"){
      console.log("User::UNKNOWN DATA");
      return;
    }
    var i = 0;
    
    var renderData = [];
    Object.values(data).forEach((tenagakerja) => {
      
      var detailButton =`
      <a class="detail dropdown-item" href='<?=site_url()?>AdminController/DetailTenagakerja?id_sdm=${tenagakerja['id_sdm']}'><i class='fa fa-share'></i> Detail Tenaga Kerja</a>
      `; 
      var editButton = `
        <a class="edit dropdown-item" data-id='${tenagakerja['id_sdm']}'><i class='fa fa-pencil'></i> Edit Tenaga Kerja</a>
      `;
      var deleteButton = `
        <a class="delete dropdown-item" data-id='${tenagakerja['id_sdm']}'><i class='fa fa-trash'></i> Hapus Tenaga Kerja</a>
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
      renderData.push([ tenagakerja['nama_sdm'], tenagakerja['nama_lv1'],tenagakerja['nama_kabupaten'], tenagakerja['nama_sertifikasi'], button]);
    });
    FDataTable.clear().rows.add(renderData).draw('full-hold');
  }

  
  FDataTable.on('click','.edit', function(){
    event.preventDefault();
    TenagakerjaModal.form.trigger('reset');
    TenagakerjaModal.self.modal('show');
    TenagakerjaModal.addBtn.hide();
    TenagakerjaModal.saveEditBtn.show();
    var id = $(this).data('id');
    var tenagakerja = dataTenagakerja[id];
    console.log(tenagakerja);

    TenagakerjaModal.id_sdm.val(tenagakerja['id_sdm']);
    TenagakerjaModal.nama_sdm.val(tenagakerja['nama_sdm']);
    TenagakerjaModal.id_lv1.val(tenagakerja['id_lv1']);
    getLv2OptionX(tenagakerja);
    TenagakerjaModal.id_lv2.val(tenagakerja['id_lv2']);
    TenagakerjaModal.id_lv3.val(tenagakerja['id_lv3']);
    TenagakerjaModal.id_lv4.val(tenagakerja['id_lv4']);
    TenagakerjaModal.id_pendidikan.val(tenagakerja['id_pendidikan']);
    TenagakerjaModal.id_jenis_kelamin.val(tenagakerja['id_jenis_kelamin']);
    TenagakerjaModal.id_sertifikasi.val(tenagakerja['id_sertifikasi']);
    TenagakerjaModal.id_pelatihan.val(tenagakerja['id_pelatihan']);
    TenagakerjaModal.tempat_lahir.val(tenagakerja['tempat_lahir']);
    TenagakerjaModal.tanggal_lahir.val(tenagakerja['tanggal_lahir']);
    TenagakerjaModal.tahun_sertifikasi.val(tenagakerja['tahun_sertifikasi']);
    TenagakerjaModal.penyelenggara_sertifikasi.val(tenagakerja['penyelenggara_sertifikasi']);
    TenagakerjaModal.alamat.val(tenagakerja['alamat']);
    TenagakerjaModal.no_hp.val(tenagakerja['no_hp']);
    TenagakerjaModal.no_ktp.val(tenagakerja['no_ktp']);
    TenagakerjaModal.kabupaten.val(tenagakerja['id_kabupaten']);
  });

  FDataTable.on('click','.delete', function(){
    event.preventDefault();
    var id = $(this).data('id');
    swal(swalDeleteConfigure).then((result) => {
      if(!result.value){ return; }
      $.ajax({
        url: "<?=site_url('TenagakerjaController/deleteTenagakerja')?>", 'type': 'POST',
        data: {'id_sdm': id},
        success: function (data){
          var json = JSON.parse(data);
          if(json['error']){
            swal("Delete Gagal", json['message'], "error");
            return;
          }
          delete dataTenagakerja[id];
          swal("Delete Berhasil", "", "success");
          renderTenagakerja(dataTenagakerja);
        },
        error: function(e) {}
      });
    });
  });

  function showTenagakerjaModal(){
    TenagakerjaModal.self.modal('show');
    TenagakerjaModal.addBtn.show();
    TenagakerjaModal.saveEditBtn.hide();
    TenagakerjaModal.form.trigger('reset');
  }

  TenagakerjaModal.form.submit(function(event){
    event.preventDefault();
    switch(TenagakerjaModal.form[0].target){
      case 'add':
        addTenagakerja();
        break;
      case 'edit':
        editTenagakerja();
        break;
    }
  });

  function addTenagakerja(){
    swal(swalSaveConfigure).then((result) => {
      if(!result.value){ return; }
      buttonLoading(TenagakerjaModal.addBtn);
      $.ajax({
        url: `<?=site_url('TenagakerjaController/addTenagakerja')?>`, 'type': 'POST',
        data: TenagakerjaModal.form.serialize(),
        success: function (data){
          buttonIdle(TenagakerjaModal.addBtn);
          var json = JSON.parse(data);
          if(json['error']){
            swal("Simpan Gagal", json['message'], "error");
            return;
          }
          var tenagakerja = json['data']
          dataTenagakerja[tenagakerja['id_sdm']] = tenagakerja;
          swal("Simpan Berhasil", "", "success");
          renderTenagakerja(dataTenagakerja);
          TenagakerjaModal.self.modal('hide');
        },
        error: function(e) {}
      });
    });
  }

  
  function editTenagakerja(){
    swal(swalSaveConfigure).then((result) => {
      if(!result.value){ return; }
      buttonLoading(TenagakerjaModal.saveEditBtn);
      $.ajax({
        url: `<?=site_url('TenagakerjaController/editTenagakerja')?>`, 'type': 'POST',
        data: TenagakerjaModal.form.serialize(),
        success: function (data){
          buttonIdle(TenagakerjaModal.saveEditBtn);
          var json = JSON.parse(data);
          if(json['error']){
            swal("Simpan Gagal", json['message'], "error");
            return;
          }
          var tenagakerja = json['data']
          dataTenagakerja[tenagakerja['id_sdm']] = tenagakerja;
          swal("Simpan Berhasil", "", "success");
          renderTenagakerja(dataTenagakerja);
          TenagakerjaModal.self.modal('hide');
        },
        error: function(e) {}
      });
    });
  }
 
  function getLv1OptionX(ten){
    return $.ajax({
      url: `<?php echo site_url('TenagakerjaController/getLv1Option/')?>`, 'type': 'GET',
      data: {},
      success: function (data){
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }
        dataLv1 = json['data'];
        renderLv1Selection(dataLv1);
        TenagakerjaModal.id_lv1.val(ten['id_lv1']);
        getLv2OptionX(ten);
      },
      error: function(e) {}
    });
   
  }

  
  function getLv2OptionX(ten){
    return $.ajax({
      url: `<?php echo site_url('TenagakerjaController/getLv2Option/')?>`, 'type': 'GET',
      data: {id_lv1 : ten['id_lv1'] },
      success: function (data){
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }

        dataLv2 = json['data'];
        if(dataLv2 == ''){
           TenagakerjaModal.id_lv2.hide();
           TenagakerjaModal.id_lv3.hide();
           TenagakerjaModal.id_lv4.hide();
           TenagakerjaModal.id_lv2.prop('disabled',true)
           TenagakerjaModal.id_lv3.prop('disabled',true)
           TenagakerjaModal.id_lv4.prop('disabled',true)
        }else{
            renderLv2Selection(dataLv2);
            TenagakerjaModal.id_lv2.val(ten['id_lv2']);
            TenagakerjaModal.id_lv2.show();  
            TenagakerjaModal.id_lv2.prop('disabled',false)
            TenagakerjaModal.id_lv3.prop('disabled',true)
            TenagakerjaModal.id_lv4.prop('disabled',true) 
            TenagakerjaModal.id_lv3.hide();
            TenagakerjaModal.id_lv4.hide(); 
            getLv3OptionX(ten);      
        }

      },
      error: function(e) {}
    });
  }

  function getLv3OptionX(ten){
    return $.ajax({
      url: `<?php echo site_url('TenagakerjaController/getLv3Option/')?>`, 'type': 'GET',
      data: {id_lv2 : ten['id_lv2'] },
      success: function (data){
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }
        dataLv3 = json['data'];
        dataLv3 = json['data'];
        if(dataLv3 == ''){
            
            TenagakerjaModal.id_lv3.hide();
            TenagakerjaModal.id_lv4.hide();          
           TenagakerjaModal.id_lv3.prop('disabled',true)
           TenagakerjaModal.id_lv4.prop('disabled',true)
        }else{
            renderLv3Selection(dataLv3);
            TenagakerjaModal.id_lv3.show(); 
                
            TenagakerjaModal.id_lv3.prop('disabled',false)
            TenagakerjaModal.id_lv4.hide(); 
            TenagakerjaModal.id_lv4.prop('disabled',true)   
            TenagakerjaModal.id_lv3.val(ten['id_lv3']);
            getLv4OptionX(ten); 
        }
      },
      error: function(e) {}
    });
  }
  function getLv4OptionX(ten){
    return $.ajax({
      url: `<?php echo site_url('TenagakerjaController/getLv4Option/')?>`, 'type': 'GET',
      data: {id_lv3 : TenagakerjaModal.id_lv3.val() },
      success: function (data){
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }
        dataLv4 = json['data'];
        dataLv4 = json['data'];
        if(dataLv4 == ''){        
            TenagakerjaModal.id_lv4.hide();         
           TenagakerjaModal.id_lv4.prop('disabled',true)
        }else{
            renderLv4Selection(dataLv4);
            TenagakerjaModal.id_lv4.prop('disabled',false)
            TenagakerjaModal.id_lv4.show();  
            TenagakerjaModal.id_lv4.val(ten['id_lv4']);          
        }
      },
      error: function(e) {}
    });
  }

});
</script>