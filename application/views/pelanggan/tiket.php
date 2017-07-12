<?php $kode = $this->uri->segment(3);?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Simple Tables
      <small>preview of simple tables</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Tables</a></li>
      <li class="active">Simple</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Pilih Kursi</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <table class="table table-condensed">
              <tr>
                <th style="width: 40px"></th>
                <th style="width: 40px"></th>
                <th style="width: 40px"></th>
                <th style="width: 40px"></th>
                <th style="width: 40px"></th>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><button type="button" class="btn btn-block btn-primary btn-flat">CC</button></td>
                <td><button type="button" class="btn btn-block btn-info btn-flat">Sopir</button></td>
              </tr>
              <?php $k = 1; for($x = 1; $x <= 9; $x++): ?>
                <tr>
                  <?php for($z = 0; $z <= 4; $z++): ?>
                    <?php if ($z != 2): ?>
                      <?php if ($this->log_tiket_m->cek_kursi($k)): ?>
                        <td><button type="button" class="btn btn-block btn-danger btn-flat"><?=$k++?></button></td>
                        <?php else: ?>
                          <td><button type="button" class="btn btn-block btn-flat"><?=$k++?></button></td>
                      <?php endif; ?>
                    <?php else: ?>
                      <td></td>
                    <?php endif; ?>
                  <?php endfor; ?>
                </tr>
              <?php endfor; ?>
                <tr>
                  <?php $k = 37; for($x = 1; $x <= 1; $x++): ?>
                  <?php for($z = 0; $z <= 3; $z++): ?>
                    <?php if ($z < 3): ?>
                      <td><button type="button" class="btn btn-block btn-danger btn-flat"><?=$k++?></button></td>
                    <?php endif; ?>
                  <?php endfor; ?>
                <?php endfor; ?>
                  <td></td>
                  <td><button type="button" class="btn btn-block btn-success btn-flat">Toilet</button></td>
                </tr>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
      <div class="col-md-6">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Simple Full Width Table</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <table class="table">
              <tr>
                <th style="width: 10px">#</th>
                <th>Task</th>
                <th>Progress</th>
                <th style="width: 40px">Label</th>
              </tr>
              <tr>
                <td>1.</td>
                <td>Update software</td>
                <td>
                  <div class="progress progress-xs">
                    <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                  </div>
                </td>
                <td><span class="badge bg-red">55%</span></td>
              </tr>
              <tr>
                <td>2.</td>
                <td>Clean database</td>
                <td>
                  <div class="progress progress-xs">
                    <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                  </div>
                </td>
                <td><span class="badge bg-yellow">70%</span></td>
              </tr>
              <tr>
                <td>3.</td>
                <td>Cron job running</td>
                <td>
                  <div class="progress progress-xs progress-striped active">
                    <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                  </div>
                </td>
                <td><span class="badge bg-light-blue">30%</span></td>
              </tr>
              <tr>
                <td>4.</td>
                <td>Fix and squish bugs</td>
                <td>
                  <div class="progress progress-xs progress-striped active">
                    <div class="progress-bar progress-bar-success" style="width: 90%"></div>
                  </div>
                </td>
                <td><span class="badge bg-green">90%</span></td>
              </tr>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
