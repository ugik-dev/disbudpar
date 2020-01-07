
<style>
.zoom {
  padding: 0;
  background-color: transparent;
  transition: transform .2s; /* Animation */
  width: 100%;
  height: auto;
  margin: 0 auto;
}

.zoom:hover {
  transform: scale(1.1); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
</style>
<div class="wrapper wrapper-content animated fadeInRight">
<div class="tabs-container">
        
 

  <div class="ibox">
    <div class="ibox-content" id="input_modal">
      <div class="form-inline">
        <div class="form-group mb-2">
          <select class="dropdown-item" id="tahun_input" name="tahun_input" required="required"></select>
        </div>
        <div class="form-group mx-sm-3 mb-2" id="header_approv"> </div>
        <a type="" class="btn btn-light my-1 mr-sm-2" id="export_pengunjung_btn" href=""><i class="fal fa-download"></i> Export PDF</a>
    
      </div>
      <form class="form" id="pengujung_form" onsubmit="return false;">
        <input type="hidden" id="id_transportasi" name="id_transportasi" readonly="readonly">
    
        <div id="input_data_pengunjung">
         
        </div>
      </form>
    </div>
  </div>

 


<script>
$(document).ready(function() {
  // $('#transportasi').addClass('active');

 var id_transportasi;
  var dataProfil;
  var dataTahun

  getProfil();


 var swalApprovConfigure = {
    title: "Konfirmasi Approv",
    text: "Yakin akan Approv data ini?",
    type: "info",
    showCancelButton: true,
    confirmButtonColor: "#18a689",
    confirmButtonText: "Ya, Approv!",
  };

  var toolbar = {
    'form': $('#toolbar_form'),
    'id_transportasi': $('#id_transportasi2'),
    'showBtn': $('#show_btn'),
  }

  var FDataTable = $('#FDataTable').DataTable({
    'columnDefs': [],
    deferRender: true,
    "order": [[ 0, "desc" ]]
  });


  var InputModal = {

    'form': $('#input_modal').find('#pengujung_form'),
    'addBtn': $('#input_modal').find('#add_btn'),
    'save_pengunjung': $('#input_modal').find('#save_pengunjung'),
    'id_transportasi': $('#input_modal').find('#id_transportasi'),
    'id_data_transportasi': $('#input_modal').find('#id_data_transportasi'),
    'nomor': $('#input_modal').find('#nomor'),
    'tahun': $('#input_modal').find('#tahun_input'),
    'bulan': $('#input_modal').find('#bulan'),
    'nama': $('#input_modal').find('#nama'),
    'domestik_l': $('#input_modal').find('#domestik_l'),
    'mancanegara_l': $('#input_modal').find('#mancanegara_l'),
    'domestik_p': $('#input_modal').find('#domestik_p'),
    'mancanegara_p': $('#input_modal').find('#mancanegara_p'),
    'jumlah': $('#input_modal').find('#jumlah'),
    
    
  }



  var swalSaveConfigure = {
    title: "Konfirmasi simpan",
    text: "Yakin akan menyimpan data ini?",
    type: "info",
    showCancelButton: true,
    confirmButtonColor: "#18a689",
    confirmButtonText: "Ya, Simpan!",
  };
  var swalNotApprov = {
    title: "Konfirmasi simpan",
    text: "Yakin akan menyimpan data ini?",
    type: "info",
    showCancelButton: true,
    confirmButtonColor: "#red",
    confirmButtonText: "Ya, Simpan!",
  };


  var dataTransportasi = {};
  var dataJenis = {};

  toolbar.form.submit(function(event){
    event.preventDefault();
    switch(toolbar.form[0].target){
      case 'show':
        getTransportasi();
        break;
      case 'add':
        showTransportasiModal();
        break;
    }
  });
  
  function getProfil(){
    $.ajax({
      url: `<?=site_url('TransportasiController/getProfil')?>`, 'type': 'GET',
      data: {},
      success: function (data){
        var json = JSON.parse(data);
        dataProfil = json['data'];
      
        id_transportasi = dataProfil['id_transportasi']; 
        var idT = document.getElementById("id_transportasi");
        idT.value = dataProfil['id_transportasi']; 
            
       },
      error: function(e) {}
    });
  }
 
  function getTransportasi(){
    buttonLoading(toolbar.showBtn);
    console.log(toolbar.form.serialize());
    $.ajax({
      url: `<?=site_url('TransportasiController/getAllTransportasi')?>`, 'type': 'GET',
      data: {id_transportasi : id_transportasi},
      success: function (data){
        buttonIdle(toolbar.showBtn);
        var json = JSON.parse(data);
        if(json['error']){
          swal("Simpan Gagal", json['message'], "error");
          return;
        }
        dataTransportasi = json['data'];
        renderTransportasi(dataTransportasi);
      },
      error: function(e) {}
    });
  }

  function getInputPengunjung(){
    document.getElementById("export_pengunjung_btn").href = '<?= site_url('OperatorController/ExportPengunjung?tb=transportasi&id_data=')?>'+id_transportasi+`&tahun=`+InputModal.tahun.val();
    console.log(toolbar.form.serialize());
    $.ajax({
      url: `<?=site_url('TransportasiController/getAllTransportasi')?>`, 'type': 'GET',
      data: {id_transportasi : id_transportasi, tahun: InputModal.tahun.val() },
      success: function (data){
        //buttonIdle(toolbar.showBtn);
        var json = JSON.parse(data);
        if(json['error']){
          swal("Simpan Gagal", json['message'], "error");
          return;
        }


       data = json['data'];
      renderInputPengunjung(data);
      },
      error: function(e) {}
    });
  }
  function renderInputPengunjung(data){
        if(data == null || typeof data != "object"){
          console.log("User::UNKNOWN DATA");
          return;
        }
        var i = 1;
        var tmpdl = 0;
        var tmpdp = 0;
        var tmpml = 0;
        var tmpmp = 0;
        var tmpjumlah = 0;
        var tmppajak = 0;
        var tmpretribusi = 0;
        var intputhtml = `<div class="form-row">
              <div class="col-2">
              <label>Bulan </label>
              </div>
              <div class="col">
                <label>Domestik Laki-laki </label>
              </div>
              <div class="col">
              <label>Domestik Perempuan </label>
              </div>
              <div class="col">
              <label>Mancanegara Laki-laki </label>
              </div>
              <div class="col">
              <label>Mancanegara Perempuan </label>
              </div>
              <div class="col">
              <label>Total Pengunjung</label>
              </div>
              
            </div>`;
        Object.values(data).forEach((d) => {
          tmpdl += Number(d['domestik_l']);
          tmpdp += Number(d['domestik_p']);
          tmpml += Number(d['mancanegara_l']);
          tmpmp += Number(d['mancanegara_p']);
          tmpjumlah += Number(d['jumlah']);
        
          intputhtml +=`
          <div class="form-row">
              <div class="col-2">
                <label>${d['nama_bulan']} :</label>
                <input type="number" class="form-control" name="id_data_desawisata${i}" value="${d['id_data_desawisata']}" hidden>
                <input type="number" class="form-control" name="bulan${d['bulan']}" placeholder="id_bulan" value="${d['bulan']}" hidden>
                <input type="number" class="form-control" name="tahun" placeholder="tahun" value="${d['tahun']}" hidden>
              </div>
              <div class="col">  
                <input type="number" class="form-control" name="domestik_l${i}" placeholder="" value="${d['domestik_l']}">
              </div>
              <div class="col">
                <input type="number" class="form-control" name="domestik_p${i}" placeholder="" value="${d['domestik_p']}">
              </div>
              <div class="col">
                <input type="number" class="form-control" name="mancanegara_l${i}" placeholder="" value="${d['mancanegara_l']}">
              </div>
              <div class="col">
                <input type="number" class="form-control" name="mancanegara_p${i}" placeholder=""  value="${d['mancanegara_p']}">
              </div>
              <div class="col">
                <input type="number" class="form-control" placeholder="0"  value="${d['jumlah']}" disabled>
              </div>
            
            </div>
          `;
          i++;
          tmpapprov=d['nomor'];
        });
        intputhtml +=`
          <div class="form-row">
              <div class="col-2">
                <label>Jumlah :</label>
              </div>
              <div class="col">  
                <input type="number" class="form-control" name="domestik_l${i}" placeholder="0" value="${tmpdl}" disabled>
              </div>
              <div class="col">
                <input type="number" class="form-control" name="domestik_p${i}" placeholder="0" value="${tmpdp}" disabled>
              </div>
              <div class="col">
                <input type="number" class="form-control" name="mancanegara_l${i}" placeholder="0" value="${tmpml}" disabled>
              </div>
              <div class="col">
                <input type="number" class="form-control" name="mancanegara_p${i}" placeholder="0"  value="${tmpmp}" disabled>
              </div>
              <div class="col">
                <input type="number" class="form-control" placeholder="0"  value="${tmpjumlah}" disabled>
              </div>
              
            </div>
            <div class="form-row" style=" padding-top: 10px;">
              <div class="col-2">
                <label> Pajak : </label>
              </div>
              <div class="col-4">
                <input type="number" class="form-control" name="pajak12" placeholder=""  value="${data[tmpapprov]['pajak']}">
              </div>
              <div class="col-2">
                <label> Retribusi : </label>
              </div>
              <div class="col-4">
                <input type="number" class="form-control" name="retribusi12" placeholder=""  value="${data[tmpapprov]['retribusi']}">
              </div>
            </div>
          `;
    
    <?php if($this->session->userdata('id_role')=='4'){ ?>
    intputhtml +=`  <button type="submit" class="btn btn-success my-1 mr-sm-2" id="save_pengunjung"  data-loading-text="Loading..." onclick="this.form.target='save'"><i class="fal fa-save"></i> Simpan Data</button> 
   `;
   <?php } ?>
   <?php if($this->session->userdata('id_role')=='5'){ ?>
    intputhtml +=`  <button type="submit" class="btn btn-success my-1 mr-sm-2" id="approv_pengunjung"  data-loading-text="Loading..." onclick="this.form.target='approv'"><i class="fal fa-save"></i>Approv</button> 
   `;
    <?php } ?>
      var input_data_pengunjung = document.getElementById("input_data_pengunjung");  
        input_data_pengunjung.innerHTML = intputhtml;
        var header_approv = document.getElementById("header_approv");  
      if(data[tmpapprov]['approv'] == '0' || data[tmpapprov]['approv'] == null  ){
        header_approv.innerHTML = `<h5><span class="badge badge-warning">Data Belum di Approv</span></h5>`;
      }else{
        header_approv.innerHTML = `<h5><span class="badge badge-info">Data Sudah Approv</span></h5>`;  
      };
  }

      
    InputModal.form.submit(function(event){
    event.preventDefault();
    switch(InputModal.form[0].target){
      case 'save':
        console.log('tombol save')
        saveInputPengunjung();
        break;
        case 'approv':
        console.log('tombol save')
        approvInputPengunjung();
        break;
    }
  });

  function approvInputPengunjung(){
    swal(swalApprovConfigure).then((result) => {
      if(!result.value){ return; }
      buttonLoading(InputModal.save_pengunjung);
      $.ajax({
        url: `<?=site_url('TransportasiController/approvPengunjung')?>`, 'type': 'POST',
        data: InputModal.form.serialize(),
        success: function (data){
          buttonIdle(InputModal.save_pengunjung);
          var json = JSON.parse(data);
          if(json['error']){
            swal("Simpan Gagal", json['message'], "error");
            return;
          }
          swal("Approv Berhasil", "", "success");
            getInputPengunjung();
        },
        error: function(e) {}
      });
    });
    }

  function saveInputPengunjung(){
    swal(swalSaveConfigure).then((result) => {
      if(!result.value){ return; }
      buttonLoading(InputModal.save_pengunjung);
      $.ajax({
        url: `<?=site_url('TransportasiController/savePengunjung')?>`, 'type': 'POST',
        data: InputModal.form.serialize(),
        success: function (data){
          buttonIdle(InputModal.save_pengunjung);
          var json = JSON.parse(data);
          if(json['error']){
            swal("Simpan Gagal", json['message'], "error");
            return;
          }
          swal("Simpan Berhasil", "", "success");
          //var dataPengunjung = json['data']
          //dataTransportasi[detailtransportasi['nomor']] = detailtransportasi;
          
          getInputPengunjung();
          // TransportasiModal.self.modal('hide');
        },
        error: function(e) {}
      });
    });
    }

  // function renderTransportasi(data){
  //   if(data == null || typeof data != "object"){
  //     console.log("User::UNKNOWN DATA");
  //     return;
  //   }
  //   var i = 0;
    
  //   var renderData = [];
  //   Object.values(data).forEach((detailtransportasi) => {
  //     renderData.push([detailtransportasi['nomor'], detailtransportasi['tahun'],detailtransportasi['nama_bulan'],detailtransportasi['domestik'], detailtransportasi['mancanegara'],detailtransportasi['jumlah']]);
  //   });
  //   FDataTable.clear().rows.add(renderData).draw('full-hold');
  // }
    
    getTahun();  
    function getTahun(){
    return $.ajax({
      url: `<?php echo site_url('TransportasiController/getTahun/')?>`, 'type': 'GET',
      data: {},
      success: function (data){
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }
        dataTahun = json['data'];
        renderTahunSelection(dataTahun);
      },
      error: function(e) {}
    });
  }

  $("#tahun_input").click(function(e) {
     registerTahunSelectionChange();
  });

  function registerTahunSelectionChange(){
    InputModal.tahun.on('change', function(e){
      getInputPengunjung();
     
  }); 

  }
  function renderTahunSelection(data){
     console.log("Masuk Tahun")
    InputModal.tahun.empty();
    InputModal.tahun.append($('<option>', { value: "", text: "Tahun"}));
    data.forEach((d) => {
      if(d['tahun'] >= dataProfil['tahun_terdata']){
      InputModal.tahun.append($('<option>', {
        value: d['tahun'],
        text: d['tahun'],
      }));  
      InputModal.tahun.val(d['tahun']); 
      
    }
    });
    getInputPengunjung();
    }


  
  //  getAllJenis();  
  // function getAllJenis(){
  //   return $.ajax({
  //     url: `<?php echo site_url('TransportasiController/getAllJenisOption/')?>`, 'type': 'GET',
  //     data: {},
  //     success: function (data){
  //       var json = JSON.parse(data);
  //       if(json['error']){
  //         return;
  //       }
  //       dataJenis = json['data'];
  //       renderJenisSelection(dataJenis);
  //     },
  //     error: function(e) {}
  //   });
  // }


  // function renderJenisSelection(data){
  //   EditModal.edit_id_jenis.empty();
  //   EditModal.edit_id_jenis.append($('<option>', { value: "", text: "-- Pilih Jenis --"}));
  //   Object.values(data).forEach((d) => {
  //     EditModal.edit_id_jenis.append($('<option>', {
  //       value: d['id_jenis_transportasi'],
  //       text: d['id_jenis_transportasi'] + ' :: ' + d['nama_jenis_transportasi'],
  //     }));
  //   });
  // }


});
</script>