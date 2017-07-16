  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Rute</th>
                  <th>Waktu Keberangkatan</th>
                  <th>Tanggal Keberangkatan</th>
                  <th>No. Polisi Bus</th>
                  <th>Sisa Kursi</th>
                  <th>Pilihan</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($keberangkatan as $row):?>
                <?php if ($row->status != 3):?>
                <tr>
                  <td>KB<?=$row->id_keberangkatan?></td>
                  <td><?=$row->asal?> - <?=$row->tujuan?></td>
                  <td><?=$row->waktu?></td>
                  <td><?=$row->tanggal?></td>
                  <td><?=$row->no_polisi?></td>
                  <td><?=$this->log_tiket_m->countTicket(['id_keberangkatan'=>$row->id_keberangkatan])?> / <?=$row->kapasitas?></td>
                  <td>
                  <?php if ($profile->pesanan == 0): ?>
                    <a href="<?=base_url('dashboard/pesan-tiket/'.$this->encrypt->encode($row->id_keberangkatan))?>" class="btn btn-block btn-success">Pesan</a>
                  <?php endif; ?>
                  </td>
                </tr>
                <?php endif;?>
                <?php endforeach;?>
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Rute</th>
                  <th>Waktu Keberangkatan</th>
                  <th>Tanggal Keberangkatan</th>
                  <th>No. Polisi Bus</th>
                  <th>Sisa Kursi</th>
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

    <script type="text/javascript">

        function pesan(id) {
            swal({
            title: "Pesan Tiket?",
            text: ' ',
            type: "success",
            showCancelButton: true,
            confirmButtonColor: "#08a82c",
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak",
            closeOnConfirm: true,
            closeOnCancel: true
            },
            function(isConfirm){
            if (isConfirm) {
                $.ajax({
                    url: '<?= base_url('admin/tahun-ajaran') ?>',
                    type: 'POST',
                    data: {
                        pesan: true,
                        id: id
                    },
                    success: function() {
                        window.location = '<?= base_url('admin/tahun-ajaran') ?>';
                    }
                });
            }
            });
        }

    </script>
