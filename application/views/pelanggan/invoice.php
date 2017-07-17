<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Invoice
      <small>#PP-<?=$invoice->id_pesanan?></small>
    </h1>
  </section>
  <?= $this->session->flashdata('msg') ?>
  <div class="pad margin no-print">
    <div class="callout callout-info" style="margin-bottom: 0!important;">
      <h4><i class="fa fa-info"></i> Note:</h4>
      Silahkan klik tombol print dibawah untuk melakukan pembayaran ditempat, jika anda kesulitan melakukan print, maka tunjukkan laman ini pada admin
    </div>
  </div>

  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> PT Putra Pelangi Perkasa.
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        Kepada:
        <address>
          <strong><?=$profile->nama?></strong><br>
          <?=$profile->alamat?><br>
          Telepon: <?=$profile->telepon?><br>
          Email: <?=$profile->email?>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <br>
        <b>ID Pesanan:</b> PP-<?=$invoice->id_pesanan?><br>
        <b>Batas Pembayaran:</b> <?=$invoice->batas_waktu?><br>
        <b>Rekening:</b> <?=$rekening?>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>#</th>
            <th>No. Kursi</th>
            <th>Rute Perjalanan</th>
            <th>Harga Tiket</th>
          </tr>
          </thead>
          <tbody>
        <?php $i = 1; foreach ($pesanan as $row): ?>
          <?php $rute = $this->rute_m->get_row(['id_rute' => $row->id_rute]) ?>
          <tr>
            <td><?=$i++?></td>
            <td><?=$row->kursi?></td>
            <td><?=$rute->asal?> - <?=$rute->tujuan?></td>
            <td>Rp. <?=number_format($rute->biaya,2,",",".")?></td>
          </tr>
        <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-6">
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          Anda dapat melakukan pembayaran dengan dua metode yaitu langsung membayar ditempat, atau melalui transfer bank, untuk
          melakukan metode pembayaran ditempat, harap membawa bukti invoice ini, dengan cara mengklik 'Print'. jika anda mengalami kesulitan
          melakukan print, cukup tunjukkan laman ini pada admin yang bertugas.
        </p>
      </div>
      <!-- /.col -->
      <div class="col-xs-6">
        <p class="lead">Harap dibayar sebelum: 2/22/2014</p>

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Subtotal:</th>
              <td>Rp. <?=number_format($total,2,",",".")?></td>
            </tr>
            <tr>
              <th>Total Pembayaran:</th>
              <td>Rp. <?=number_format($total,2,",",".")?></td>
            </tr>
            <tr>
              <th>Total Pembayaran:</th>
              <td>Rp. <?=number_format($total,2,",",".")?></td>
            </tr>
            <tr>
              <th>Status:</th>
              <td><?=$invoice->status_pembayaran?></td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="row no-print">
      <div class="col-xs-12">
        <a href="<?=base_url('dashboard/print_tiket/'.$this->uri->segment(3))?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
        <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#add"><i class="fa fa-credit-card"></i> Konfirmasi
        </button>
      </div>
    </div>
  </section>
  <!-- /.content -->
  <div class="clearfix"></div>
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="add" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Formulir Konfirmasi</h4>
        </div>
        <div class="modal-body">
          <?=form_open_multipart('dashboard/invoice/'.$this->uri->segment(3))?>
              <div class="box-body">
                <div class="form-group">
                  <label>Tanggal Pembayaran</label>
                  <input type="date" name="tanggal_pembayaran" class="form-control">
                </div>
                <div class="form-group">
                  <label>Jumlah Pembayaran</label>
                  <input type="number" name="jumlah_pembayaran" class="form-control">
                </div>
                <div class="form-group">
                  <label>Bukti Pembayaran</label>
                  <input type="file" name="userfile" class="form-control">
                </div>
                <div class="form-group">
                  <label>Pesan Tambahan</label>
                  <input type="text" name="pesan" class="form-control">
                </div>
              </div>
              <!-- /.box-body -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
          <input type="submit" name ="add" class="btn btn-primary" value="Simpan">
        <?=form_close()?>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
