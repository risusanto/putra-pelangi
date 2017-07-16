  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Jadwal Keberangkatan
        <small>Anda dapat mengelola jadwal keberangkatan bus</small>
      </h1>
      <?= $this->session->flashdata('msg') ?>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Jadwal Keberangkatan <button type="button" class="btn glyphicon glyphicon-plus" data-toggle="modal" data-target="#add"></button></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>#</th>
                  <th style="width: 80px">ID</th>
                  <th>Rute</th>
                  <th>Waktu</th>
                  <th>Tanggal</th>
                  <th>Pengemudi</th>
                  <th>Telepon Pengemudi</th>
                  <th>No. Polisi Bus</th>
                  <th>Penumpang</th>
                  <th>Status</th>
                </tr>
                <?php $i = 1; foreach ($keberangkatan as $row):?>
                <tr>
                  <td><?=$i?></td>
                  <td >KB<?=$row->id_rute?></td>
                  <td><?=$row->asal?> - <?=$row->tujuan?> </td>
                  <td><span class="label label-success"><?=$row->waktu?></span></td>
                  <td><?=$row->tanggal?></td>
                  <td><?=$row->nama?></td>
                  <td><?=$row->telepon?></td>
                  <td><?=$row->no_polisi?></td>
                  <td><?=$this->log_tiket_m->countTicket(['id_keberangkatan'=>$row->id_keberangkatan])?> / <?=$row->kapasitas?></td>
                  <?php if ($row->status == 1):?>
                  <td><span class="label label-success">siap</span></td>
                  <?php elseif ($row->status == 2):?>
                  <td><span class="label label-warning">ditunda</span></td>
                  <?php elseif($row->status == 3):?>
                  <td><span class="label label-danger">berangkat</span></td>
                  <?php else:?>
                  <td>tidak diketahui</td>
                  <?php endif;?>
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
