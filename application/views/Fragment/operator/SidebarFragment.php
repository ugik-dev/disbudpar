<div id="wrapper">

<nav class="navbar-default navbar-static-side" role="navigation">
  <div class="sidebar-collapse">
    <ul class="nav metismenu" id="side-menu">
      <?= $this->load->view('Fragment/SidebarHeaderFragment', NULL, TRUE);?>
      <li id="dashboard">
        <a href="<?=site_url('OperatorController/')?>"><i class="fa fa-home"></i> <span class="nav-label">Beranda</span></a>
      </li>
      <li id="statistikCagarbudaya">
        <a href="<?=site_url('OperatorController/statistikcagarbudaya')?>"><i class="fa fa-home"></i> <span class="nav-label">Statistik Cagar Budaya</span></a>
      </li>
      <li id="senibudaya">
        <a href="<?=site_url('OperatorController/senibudaya')?>"><i class="fa fa-home"></i> <span class="nav-label">Seni Dan budaya</span></a>
      </li>
      <li id="museum">
        <a href="<?=site_url('OperatorController/museum')?>"><i class="fa fa-home"></i> <span class="nav-label">Museum</span></a>
      </li>
      <li id="saranaprasarana">
        <a href="<?=site_url('OperatorController/saranaprasarana')?>"><i class="fa fa-home"></i> <span class="nav-label">Sarana Dan Prasarana</span></a>
      </li>
      <li id="objek">
        <a href="<?=site_url('OperatorController/objek')?>"><i class="fa fa-home"></i> <span class="nav-label">Objek Wisata</span></a>
      </li>
      <li id="penginapan">
        <a href="<?=site_url('OperatorController/penginapan')?>"><i class="fa fa-home"></i> <span class="nav-label">Penginapan</span></a>
      </li>
      </li>
      <li id="biro">
        <a href="<?=site_url('OperatorController/biro')?>"><i class="fa fa-home"></i> <span class="nav-label">Biro Wisata</span></a>
      </li>
      </li>
      <li id="usaha">
        <a href="<?=site_url('OperatorController/usaha')?>"><i class="fa fa-home"></i> <span class="nav-label">Usaha dan Jasa</span></a>
      </li>
      <li id="panduan">
        <a href="<?=site_url('AdminController/panduan')?>"><i class="fa fa-question"></i> <span class="nav-label">Panduan</span></a>
      </li>
      <li id="logout">
        <a href="#" class="logout"><i class="fa fa-sign-out"></i> <span class="nav-label">Logout</span></a>
      </li>
  </div>
</nav>
<script>
$(document).ready(function() {});
</script>