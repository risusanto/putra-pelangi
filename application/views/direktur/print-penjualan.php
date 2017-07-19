<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$title?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?=base_url('assets/bootstrap/css/bootstrap.min.css')?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('assets/css/font-awesome.min.css')?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url('assets/css/ionicons.min.css')?>">
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
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>#</th>
            <th>Rute</th>
            <th>Waktu</th>
            <th>Tanggal</th>
            <th>Pengemudi</th>
            <th>No. Kursi</th>
            <th>Plat Bus</th>
            <th>Pembeli</th>
            <th>Harga</th>
          </tr>
          </thead>
          <tbody>
            <?php $total = 0; $i = 1; foreach ($tiket as $row):?>
              <?php $rute = $this->rute_m->get_row(['id_rute' => $row->id_rute]);
              $bus = $this->bus_m->get_row(['id_bus' => $row->id_bus]);
               ?>
            <?php if ($row->status_pembayaran == 'LUNAS'): ?>
              <tr>
                <td><?=$i++?></td>
                <td><?=$rute->asal?> - <?=$rute->tujuan?> </td>
                <td><span class="label label-success"><?=$row->waktu?></span></td>
                <td><?=$row->tanggal?></td>
                <td><?=$bus->nama?></td>
                <td><?=$row->kursi?></td>
                <td><?=$bus->no_polisi?></td>
                <td><?=$this->pelanggan_m->get_row(['email' => $row->pelanggan])->nama?></td>
                <td>Rp. <?=number_format($rute->biaya,2,",",".")?></td> <?php $total = $total + $rute->biaya; ?>
              </tr>
            <?php endif; ?>
            <?php endforeach;?>
            <tr>
              <td><strong>Total</strong></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td><strong>Rp. <?=number_format($total,2,",",".")?></strong></td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
