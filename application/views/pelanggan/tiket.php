<?php $kode = $this->uri->segment(3);?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Pesan Tiket
      <small>Anda dapat memilih kursi anda</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
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
            <h3 class="box-title">Tiket Pesanan</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <table class="table">
              <tr>
                <th style="width: 10px">#</th>
                <th>ID Tiket</th>
                <th>No. Kursi</th>
                <th>Harga</th>
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
