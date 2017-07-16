<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Konfirmasi
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Konfirmasi</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>ID Pesanan</th>
                <th>Tanggal Pembayaran</th>
                <th>Jumlah Dibayarkan</th>
                <th>Pesan</th>
                <th>Bukti</th>
                <th>Opsi</th>
              </tr>
              </thead>
              <tbody>
              <?php foreach ($konfirmasi as $row):?>
              <tr>
                <td>PP-<?=$row->id_pesanan?></td>
                <td><?=$row->tanggal_pembayaran?></td>
                <td>Rp. <?=number_format($row->jumlah_pembayaran,2,",",".")?></td>
                <td><?=$row->pesan?></td>
                <td><a href="<?=base_url('assets/bukti/'.$row->id_konfirmasi.'.jpg')?>">bukti</a></td>
                <td>
                  <a href="<?=base_url('admin/pesanan/'.$this->encrypt->encode($row->id_pesanan))?>" target="_blank" class="btn btn-block btn-success">Lihat</a>
                  <button type="button" class="btn btn-block btn-primary" onclick="konfirmasi(<?=$row->id_konfirmasi?>)">Konfirmasi</button>
                </td>
              </tr>
              <?php endforeach;?>
              </tbody>
              <tfoot>
              <tr>
                <th>ID Pesanan</th>
                <th>Tanggal Pembayaran</th>
                <th>Jumlah Dibayarkan</th>
                <th>Pesan</th>
                <th>Bukti</th>
                <th>Opsi</th>
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

<script type="text/javascript">

    function konfirmasi(id) {
        swal({
        title: "Konfirmasi?",
        text: " ",
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
                url: '<?= base_url('admin/konfirmasi-pembayaran') ?>',
                type: 'POST',
                data: {
                    konfirmasi: true,
                    id: id
                },
                success: function() {
                    window.location = '<?= base_url('admin/konfirmasi-pembayaran') ?>';
                }
            });
        }
        });
    }

</script>
