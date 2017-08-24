  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pilih Perjalanan
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Perjalanan</h3>
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
                  <th>Plat Bus</th>
                  <th>Sisa Kursi</th>
                  <th>Pilihan</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($keberangkatan as $row):?>
                <?php $pilihan = $this->pilihan_rute_m->get(['id_keberangkatan' => $row->id_keberangkatan])?>
                <?php if ($row->status != 3):?>
                <tr>
                  <td>KB<?=$row->id_keberangkatan?></td>
                  <td>
                  <?php foreach ($pilihan as $key):?>
                    <ol><?=$this->rute_m->get_row(['id_rute' => $key->id_rute])->asal?> - <?=$this->rute_m->get_row(['id_rute' => $key->id_rute])->tujuan?></ol>
                  <?php endforeach;?>
                  </td>
                  <td><?=$row->waktu?></td>
                  <td><?=$row->tanggal?></td>
                  <td><?=$row->no_polisi?></td>
                  <td><?=$this->log_tiket_m->countTicket(['id_keberangkatan'=>$row->id_keberangkatan])?> / <?=$row->kapasitas?></td>
                  <td>
                    <a href="<?=base_url('admin/pilih-rute/'.$row->id_keberangkatan)?>" class="btn btn-block btn-success">Pesan</a>
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
                  <th>Plat Bus</th>
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
