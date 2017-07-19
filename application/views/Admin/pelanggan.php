  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pelanggan
        <small>Anda dapat mengedet dan menghapus data pelanggan</small>
      </h1>
      <?= $this->session->flashdata('msg') ?>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Pelanggan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Telepon</th>
                  <th>Alamat</th>
                  <th>Opsi</th>
                </tr>
                <?php $i = 1; foreach ($pelanggan as $row):?>
                <tr>
                  <td><?=$i?></td>
                  <td ><?=$row->nama?></td>
                  <td><?=$row->email?></td>
                  <td><?=$row->telepon?></td>
                  <td><?=$row->alamat?></td>
                  <td>
                      <button type="button" class="btn btn-primary fa fa-edit" data-toggle="modal" data-target="#edit" onclick="get('<?=$row->email?>')"></button>
                      <button type="button" class="btn btn-danger fa fa-trash" onclick="deleteData('<?=$row->email?>')"></button>
                      <button type="button" class="btn btn-danger" onclick="reset_pw('<?=$row->email?>')">Reset Password</button>
                  </td>
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

        <div class="modal fade" id="edit" tabindex="-1" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Edit Data Pelanggan</h4>
                </div>
                <div class="modal-body">
                  <?=form_open('admin/daftar-pelanggan')?>
                      <div class="box-body">
                        <div class="form-group">
                          <label>Nama</label>
                          <input type="text" name="nama" id="nama" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Telepon</label>
                          <input type="number" name="telepon" id="telepon" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Email</label>
                          <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <input type="hidden" name="id" id="id" class="form-control">
                      </div>
                      <!-- /.box-body -->
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                  <input type="submit" name ="edit" class="btn btn-primary" value="Simpan">
                <?=form_close()?>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

    <script type="text/javascript">

        function get(id) {
            $.ajax({
                url: '<?= base_url('admin/daftar-pelanggan') ?>',
                type: 'POST',
                data: {
                    id: id,
                    get: true
                },
                success: function(response) {
                    response = JSON.parse(response);
                    $('#email').val(response.email);
                    $('#nama').val(response.nama);
                    $('#telepon').val(response.telepon);
                    $('#alamat').val(response.alamat);
                    $('#id').val(response.email);
                }
            });
        }

        function deleteData(id) {
            swal({
            title: "Hapus?",
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
                    url: '<?= base_url('admin/daftar-pelanggan') ?>',
                    type: 'POST',
                    data: {
                        delete: true,
                        id: id
                    },
                    success: function() {
                        window.location = '<?= base_url('admin/daftar-pelanggan') ?>';
                    }
                });
            }
            });
        }

        function reset_pw(id) {
            swal({
            title: "Reset Password?",
            text: "Password akan berubah menjadi default yaitu '123456' ",
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
                    url: '<?= base_url('admin/daftar-pelanggan') ?>',
                    type: 'POST',
                    data: {
                        reset: true,
                        id: id
                    },
                    success: function() {
                        window.location = '<?= base_url('admin/daftar-pelanggan') ?>';
                    }
                });
            }
            });
        }

    </script>
