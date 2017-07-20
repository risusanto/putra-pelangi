  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan Pembayaran
        <small>Anda dapat melihat tiket yang telah dipesan</small>
      </h1>
      <?= $this->session->flashdata('msg') ?>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Tiket | <a href="<?=base_url('admin/print-pembayaran')?>" target="_blank">Cetak</a></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>#</th>
                  <th>Rute</th>
                  <th>Waktu</th>
                  <th>Tanggal</th>
                  <th>Pengemudi</th>
                  <th>No. Kursi</th>
                  <th>Plat Bus</th>
                  <th>Pembeli</th>
                  <th>Atas Nama</th>
                  <th>Status</th>
                </tr>
                <?php $i = 1; foreach ($tiket as $row):?>
                  <?php $rute = $this->rute_m->get_row(['id_rute' => $row->id_rute]);
                  $bus = $this->bus_m->get_row(['id_bus' => $row->id_bus]);
                   ?>
                <tr>
                  <td><?=$i++?></td>
                  <td><?=$rute->asal?> - <?=$rute->tujuan?> </td>
                  <td><span class="label label-success"><?=$row->waktu?></span></td>
                  <td><?=$row->tanggal?></td>
                  <td><?=$bus->nama?></td>
                  <td><?=$row->kursi?></td>
                  <td><?=$bus->no_polisi?></td>
                  <td><?=$this->pelanggan_m->get_row(['email' => $row->pelanggan])->nama?></td>
                  <td><?=$row->atas_nama?></td>
                  <td><?=$row->status_pembayaran?></td>
                </tr>
                <?php endforeach;?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
     </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
