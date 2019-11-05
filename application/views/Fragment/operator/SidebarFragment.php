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
        <a href="<?=site_url('OperatorController/senibudaya')?>"><i class="fa fa-home"></i> <span class="nav-label">Senibudaya</span></a>
      </li>
      <li id="museum">
        <a href="<?=site_url('OperatorController/museum')?>"><i class="fa fa-home"></i> <span class="nav-label">Museum</span></a>
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