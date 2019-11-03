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
                  <th style="width: 83%; text-align:center!important">Nama</th>
                  <th style="width: 10%; text-align:center!important">Action</th>
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


<div class="modal inmodal" id="test_modal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Kelola Test</h4>
        <span class="info"></span>
      </div>
      <div class="modal-body" id="modal-body">              
        <form role="form" id="user_form" onsubmit="return false;" type="multipart" autocomplete="off">
          <input type="hidden" id="id_test" name="id_test">
          <div class="form-group">
            <label for="nama_test">Nama Test</label> 
            <input type="text" placeholder="Nama Test" class="form-control" id="nama_test" name="nama_test" required="required">
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


  var TestModal = {
    'self': $('#test_modal'),
    'info': $('#test_modal').find('.info'),
    'form': $('#test_modal').find('#user_form'),
    'addBtn': $('#test_modal').find('#add_btn'),
    'saveEditBtn': $('#test_modal').find('#save_edit_btn'),
    'idTest': $('#test_modal').find('#id_test'),
    'namaTest': $('#test_modal').find('#nama_test'),
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

  var dataTest = {};

  toolbar.form.submit(function(event){
    event.preventDefault();
    switch(toolbar.form[0].target){
      case 'show':
        showTest();
        break;
      case 'add':
        showTestModal();
        break;
    }
  });

  function showTest(){
    buttonLoading(toolbar.showBtn);
    $.ajax({
      url: `<?=site_url('TestController/getAllTest')?>`, 'type': 'POST',
      data: {},
      success: function (data){
        buttonIdle(toolbar.showBtn);
        var json = JSON.parse(data);
        if(json['error']){
          swal("Simpan Gagal", json['message'], "error");
          return;
        }
        dataTest = json['data'];
        renderTest(dataTest);
      },
      error: function(e) {}
    });
  }

  function renderTest(data){
    if(data == null || typeof data != "object"){
      console.log("User::UNKNOWN DATA");
      return;
    }
    var i = 0;
    
    var renderData = [];
    Object.values(data).forEach((test) => {
      var editButton = `
        <a class="edit dropdown-item" data-id='${test['id_test']}'><i class='fa fa-pencil'></i> Edit Test</a>
      `;
      var deleteButton = `
        <a class="delete dropdown-item" data-id='${test['id_test']}'><i class='fa fa-trash'></i> Hapus Test</a>
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
      renderData.push([test['id_test'], test['nama_test'], button]);
    });
    FDataTable.clear().rows.add(renderData).draw('full-hold');
  }

  
  FDataTable.on('click','.edit', function(){
    event.preventDefault();
    TestModal.form.trigger('reset');
    TestModal.self.modal('show');
    TestModal.addBtn.hide();
    TestModal.saveEditBtn.show();
    var id = $(this).data('id');
    var test = dataTest[id];
    TestModal.idTest.val(test['id_test']);
    TestModal.namaTest.val(test['nama_test']);
  });

  FDataTable.on('click','.delete', function(){
    event.preventDefault();
    var id = $(this).data('id');
    swal(swalDeleteConfigure).then((result) => {
      if(!result.value){ return; }
      $.ajax({
        url: "<?=site_url('TestController/deleteTest')?>", 'type': 'POST',
        data: {'id_test': id},
        success: function (data){
          var json = JSON.parse(data);
          if(json['error']){
            swal("Delete Gagal", json['message'], "error");
            return;
          }
          delete dataTest[id];
          swal("Delete Berhasil", "", "success");
          renderTest(dataTest);
        },
        error: function(e) {}
      });
    });
  });

  function showTestModal(){
    TestModal.self.modal('show');
    TestModal.addBtn.show();
    TestModal.saveEditBtn.hide();
    TestModal.form.trigger('reset');
  }

  TestModal.form.submit(function(event){
    event.preventDefault();
    switch(TestModal.form[0].target){
      case 'add':
        addTest();
        break;
      case 'edit':
        editTest();
        break;
    }
  });

  function addTest(){
    swal(swalSaveConfigure).then((result) => {
      if(!result.value){ return; }
      buttonLoading(TestModal.addBtn);
      $.ajax({
        url: `<?=site_url('TestController/addTest')?>`, 'type': 'POST',
        data: TestModal.form.serialize(),
        success: function (data){
          buttonIdle(TestModal.addBtn);
          var json = JSON.parse(data);
          if(json['error']){
            swal("Simpan Gagal", json['message'], "error");
            return;
          }
          var test = json['data']
          dataTest[test['id_test']] = test;
          swal("Simpan Berhasil", "", "success");
          renderTest(dataTest);
          TestModal.self.modal('hide');
        },
        error: function(e) {}
      });
    });
  }

  
  function editTest(){
    swal(swalSaveConfigure).then((result) => {
      if(!result.value){ return; }
      buttonLoading(TestModal.saveEditBtn);
      $.ajax({
        url: `<?=site_url('TestController/editTest')?>`, 'type': 'POST',
        data: TestModal.form.serialize(),
        success: function (data){
          buttonIdle(TestModal.saveEditBtn);
          var json = JSON.parse(data);
          if(json['error']){
            swal("Simpan Gagal", json['message'], "error");
            return;
          }
          var test = json['data']
          dataTest[test['id_test']] = test;
          swal("Simpan Berhasil", "", "success");
          renderTest(dataTest);
          TestModal.self.modal('hide');
        },
        error: function(e) {}
      });
    });
  }
});
</script>