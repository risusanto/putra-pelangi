  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Laman awal</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Selamat datang, <strong><?=$profile->nama?></strong>! | <a onclick="deleteData()">Bersihkan Pemberitahuan</a></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
        </div>
        <?php foreach ($notif as $row): ?>
          <div class="callout callout-warning">
                <h4>Pesanan dibatalkan</h4>

                <p><?=$row->pesan?></p>
          </div>
        <?php endforeach; ?>
        <div class="box-footer">
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script type="text/javascript">

      function deleteData() {
          swal({
          title: "Bersihkan Pemberitahuan?",
          text: " ",
          type: "warning",
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
                  url: '<?= base_url('dashboard/index') ?>',
                  type: 'POST',
                  data: {
                      delete: true
                  },
                  success: function() {
                      window.location = '<?= base_url('dashboard/index') ?>';
                  }
              });
          }
          });
      }

  </script>
