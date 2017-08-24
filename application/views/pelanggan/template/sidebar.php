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
          <p><?=$profile->nama?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?=base_url('dashboard')?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="<?=base_url('dashboard/perjalanan')?>">
            <i class="fa fa-bus"></i> <span>Perjalanan</span>
          </a>
        </li>
        <li>
          <a href="<?=base_url('dashboard/tagihan')?>">
            <i class="fa fa-file-text"></i> <span>Tagihan & Jadwal</span>
          </a>
        </li>
        <li>
          <a href="<?=base_url('dashboard/log')?>">
            <i class="fa fa-bus"></i> <span>Log</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->
