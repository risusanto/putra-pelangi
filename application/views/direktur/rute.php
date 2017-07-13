  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Rute Perjalanan
        <small>Anda dapat mengelola rute perjalanan bus disini</small>
      </h1>
      <?= $this->session->flashdata('msg') ?>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Rute Perjalanan <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addRute">+</button>
             </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Rute</th>
                  <th>Harga</th>
                  <th>Opsi</th>
                </tr>
                <?php $i = 1; foreach ($rute as $row):?>
                <tr>
                  <td><?=$i++?></td>
                  <td><?=$row->asal?> - <?=$row->tujuan?></td>
                  <td>Rp. <?=number_format($row->biaya,2,",",".")?></td>
                  <td>
                    <button type="button" class="btn btn-primary fa fa-edit" data-toggle="modal" data-target="#edit" onclick="get(<?=$row->id_rute?>)"></button>
                    <button type="button" class="btn btn-danger fa fa-trash" onclick="deleteData(<?=$row->id_rute?>)"></button>
                  </td>
                </tr>
                <?php endforeach;?>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
            </div>
          </div>
          <!-- /.box -->
      </div>
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

        <div class="modal fade" id="addRute" tabindex="-1" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Tambah Rute Perjalanan</h4>
                </div>
                <div class="modal-body">
                  <?=form_open('direktur/rute-perjalanan')?>
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Asal</label>
                          <input type="text" name="asal" class="form-control" placeholder="Rute Awal">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Tujuan</label>
                          <input type="text" name="tujuan" class="form-control" placeholder="Rute Tujuan">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Biaya</label>
                          <input type="number" name="biaya" class="form-control" placeholder="Masukan Biaya Perjalanan">
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

        <div class="modal fade" id="edit" tabindex="-1" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Edit Rute Perjalanan</h4>
                </div>
                <div class="modal-body">
                  <?=form_open('direktur/rute-perjalanan')?>
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Asal</label>
                          <input type="text" value="" name="edit_asal" id="edit_asal" class="form-control" placeholder="Rute Awal">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Tujuan</label>
                          <input type="text" name="edit_tujuan" id="edit_tujuan" class="form-control" placeholder="Rute Tujuan">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Biaya</label>
                          <input type="number" name="edit_biaya" id="edit_biaya" class="form-control" placeholder="Masukan Biaya Perjalanan">
                        </div>
                        <input type="hidden" name="id_rute" id="id_rute">
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
                url: '<?= base_url('direktur/rute-perjalanan') ?>',
                type: 'POST',
                data: {
                    id: id,
                    get: true
                },
                success: function(response) {
                    response = JSON.parse(response);
                    $('#edit_asal').val(response.asal);
                    $('#edit_tujuan').val(response.tujuan);
                    $('#edit_biaya').val(response.biaya);
                    $('#id_rute').val(response.id_rute);
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
                    url: '<?= base_url('direktur/rute-perjalanan') ?>',
                    type: 'POST',
                    data: {
                        delete: true,
                        id: id
                    },
                    success: function() {
                        window.location = '<?= base_url('direktur/rute-perjalanan') ?>';
                    }
                });
            }
            });
        }

    </script>
