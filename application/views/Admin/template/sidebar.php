  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url('assets/dist/img/user2-160x160.jpg')?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$username?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?=base_url('admin')?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="<?=base_url('admin/jadwal-keberangkatan')?>">
            <i class="fa fa-calendar"></i> <span>Jadwal Keberangkatan</span>
          </a>
        </li>
        <li>
          <a href="<?=base_url('admin/armada-bus')?>">
            <i class="fa fa-bus"></i> <span>Armada</span>
          </a>
        </li>
        <li>
          <a href="<?=base_url('admin/konfirmasi-pembayaran')?>">
            <i class="fa fa-bus"></i> <span>Konfirmasi Pembayaran</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->
