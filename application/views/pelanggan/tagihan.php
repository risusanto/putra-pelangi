<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Tagihan
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Daftar Tagihan</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>ID</th>
                <th>Waktu Keberangkatan</th>
                <th>Tanggal Keberangkatan</th>
                <th>Plat Bus</th>
                <th>Status</th>
                <th>Opsi</th>
              </tr>
              </thead>
              <tbody>
              <?php foreach ($pesanan as $row):?>
              <?php if ($row->status != 3):?>
              <tr>
                <td>PP-<?=$row->id_pesanan?></td>
                <td><?=$row->waktu?></td>
                <td><?=$row->tanggal?></td>
                <td><?=$this->bus_m->get_row(['id_bus' => $row->id_bus])->no_polisi?></td>
                <td><?=$row->status_pembayaran?></td>
                <td>
                  <a href="<?=base_url('dashboard/invoice/'.$this->encrypt->encode($row->id_pesanan))?>" class="btn btn-block btn-success">Invoice</a>
                </td>
              </tr>
              <?php endif;?>
              <?php endforeach;?>
              </tbody>
              <tfoot>
              <tr>
                <th>ID</th>
                <th>Waktu Keberangkatan</th>
                <th>Tanggal Keberangkatan</th>
                <th>Plat Bus</th>
                <th>Status</th>
                <th>Pilihan</th>
              </tr>
              </tfoot>
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
