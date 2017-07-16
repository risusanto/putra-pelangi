<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Invoice</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?=base_url('assets/bootstrap/css/bootstrap.min.css')?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('assets/dist/css/AdminLTE.min.css')?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> PT Putra Pelangi Perkasa.
          <small class="pull-right">Date: 2/10/2014</small>
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
        <b>Batas Pembayaran:</b> 2/22/2014<br>
        <b>Rekening BNI:</b> 968-34567 (a.n Ari Susanto)
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
        <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
        <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
        </button>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
