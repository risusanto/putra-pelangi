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
      <?php if ($kapasitas == 39 ): ?>

        <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Pilih Kursi, tersisa <?=$kapasitas - $this->log_tiket_m->countTicket(['id_keberangkatan'=>$this->encrypt->decode($kode)])?></h3>
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
                <?php $kursi = 0; for($x = 1; $x <= 9; $x++): ?>
                  <tr>
                    <?php for($z = 0; $z <= 4; $z++): ?>
                      <?php if ($z != 2): ?>
                        <?php $kursi++ ?>
                        <?php if ($this->log_tiket_m->cek_kursi($kursi,$this->encrypt->decode($kode))): ?>
                          <td><button type="button" class="btn btn-block btn-danger btn-flat" onclick="pesan(<?= $id_pesanan ?>,<?= $kursi ?>)"><?=$kursi?></button></td>
                          <?php else: ?>
                            <td><button type="button" class="btn btn-block btn-flat"><?=$kursi?></button></td>
                        <?php endif; ?>
                      <?php else: ?>
                        <td></td>
                      <?php endif; ?>
                    <?php endfor; ?>
                  </tr>
                <?php endfor; ?>
                  <tr>
                    <?php $kursi = 36; for($x = 1; $x <= 1; $x++): ?>
                    <?php for($z = 0; $z <= 3; $z++): ?>
                      <?php if ($z < 3): ?>
                        <?php $kursi++ ?>
                         <?php if ($this->log_tiket_m->cek_kursi($kursi,$this->encrypt->decode($kode))): ?>
                          <td><button type="button" class="btn btn-block btn-danger btn-flat" onclick="pesan(<?= $id_pesanan ?>,<?= $kursi ?>)"><?=$kursi?></button></td>
                          <?php else: ?>
                            <<?php if ($this->log_tiket_m->cek_kursi($kursi,$this->encrypt->decode($kode))): ?>
                              <td><button type="button" class="btn btn-block btn-danger btn-flat"><?=$kursi?></button></td>
                              <?php else: ?>
                                <td><button type="button" class="btn btn-block btn-flat"><?=$kursi?></button></td>
                            <?php endif; ?>
                        <?php endif; ?>
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
      <?php else: ?>

        <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Pilih Kursi, tersisa <?=$kapasitas - $this->log_tiket_m->countTicket(['id_keberangkatan'=>$this->encrypt->decode($kode)])?></h3>
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
                <?php $kursi = 0; for($x = 1; $x <= 8; $x++): ?>
                  <tr>
                    <?php for($z = 0; $z <= 4; $z++): ?>
                      <?php if ($z != 2): ?>
                        <?php $kursi++ ?>
                        <?php if ($this->log_tiket_m->cek_kursi($kursi,$this->encrypt->decode($kode))): ?>
                          <td><button type="button" class="btn btn-block btn-danger btn-flat" onclick="pesan(<?= $id_pesanan ?>,<?= $kursi ?>)"><?=$kursi?></button></td>
                          <?php else: ?>
                            <td><button type="button" class="btn btn-block btn-flat"><?=$kursi?></button></td>
                        <?php endif; ?>
                      <?php else: ?>
                        <td></td>
                      <?php endif; ?>
                    <?php endfor; ?>
                  </tr>
                <?php endfor; ?>
                  <tr>
                    <?php $kursi = 32; for($x = 1; $x <= 1; $x++): ?>
                    <?php for($z = 0; $z <= 3; $z++): ?>
                      <?php if ($z < 3): ?>
                        <?php $kursi++ ?>
                        <?php if ($this->log_tiket_m->cek_kursi($kursi,$this->encrypt->decode($kode))): ?>
                          <td><button type="button" class="btn btn-block btn-danger btn-flat" onclick="pesan(<?= $id_pesanan ?>,<?= $kursi ?>)"><?=$kursi?></button></td>
                          <?php else: ?>
                            <td><button type="button" class="btn btn-block btn-flat"><?=$kursi?></button></td>
                        <?php endif; ?>
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
      <?php endif; ?>
      <div class="col-md-6">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Tiket Pesanan <button type="button" class="btn btn-warning" onclick="batal(<?= $id_pesanan ?>)">Batal</button> <button type="button" class="btn btn-success" onclick="selesai(<?= $id_pesanan ?>)">Selesai</button></h3>
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
              <?php $total = 0; $i = 1; foreach ($pesanan as $row): ?>
                <tr>
                  <td><?=$i++?></td>
                  <td>TK<?=$row->id_log?></td>
                  <td><?=$row->kursi?></td>
                  <td>Rp. <?=number_format($biaya,2,",",".")?></td>
                </tr>
                <?php $total += $biaya ?>
              <?php endforeach; ?>
              <tr>
                <td><strong>Total</strong></td>
                <td></td>
                <td></td>
                <td><strong>Rp. <?=number_format($total,2,",",".")?></strong></td>
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

<script type="text/javascript">

    function pesan(id_pesanan,kursi) {
        swal({
        title: "Pesan kursi ini?",
        text: kursi,
        type: "info",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya",
        cancelButtonText: "Tidak",
        closeOnConfirm: true,
        closeOnCancel: true
        },
        function(isConfirm){
        if (isConfirm) {
            $.ajax({
                url: '<?= base_url('dashboard/pesan-tiket/'.$kode) ?>',
                type: 'POST',
                data: {
                    pesan: true,
                    id_pesanan: id_pesanan,
                    kursi: kursi
                },
                success: function() {
                    window.location = '<?= base_url('dashboard/pesan-tiket/'.$kode) ?>';
                }
            });
        }
        });
    }

    function batal(id_pesanan) {
        swal({
        title: "Batalkan pesanan?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya, Batalkan",
        cancelButtonText: "Tidak",
        closeOnConfirm: true,
        closeOnCancel: true
        },
        function(isConfirm){
        if (isConfirm) {
            $.ajax({
                url: '<?= base_url('dashboard/pesan-tiket/'.$kode) ?>',
                type: 'POST',
                data: {
                    batal: true,
                    id_pesanan: id_pesanan,
                },
                success: function() {
                    window.location = '<?= base_url('dashboard/perjalanan') ?>';
                }
            });
        }
        });
    }

    function selesai(id_pesanan) {
        swal({
        title: "Selesai?",
        type: "info",
        showCancelButton: true,
        confirmButtonColor: "#00ff66",
        confirmButtonText: "Ya, Selesai",
        cancelButtonText: "Tidak",
        closeOnConfirm: true,
        closeOnCancel: true
        },
        function(isConfirm){
        if (isConfirm) {
            $.ajax({
                url: '<?= base_url('dashboard/pesan-tiket/'.$kode) ?>',
                type: 'POST',
                data: {
                    selesai: true,
                    id_pesanan: id_pesanan,
                },
                success: function() {
                    window.location = '<?= base_url('dashboard/tagihan') ?>';
                }
            });
        }
        });
    }

</script>
