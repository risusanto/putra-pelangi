  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Armada Bus
        <small>Anda dapat mengelola bus yang tersedia</small>
      </h1>
      <?= $this->session->flashdata('msg') ?>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Bus <button type="button" class="btn glyphicon glyphicon-plus" data-toggle="modal" data-target="#add"></button></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>#</th>
                  <th style="width: 100px">No. Polisi</th>
                  <th>Kapasitas</th>
                  <th>Pengemudi</th>
                  <th>Telepon Pengemudi</th>
                  <th>Opsi</th>
                </tr>
                <?php $i = 1; foreach ($bus as $row):?>
                <tr>
                  <td><?=$i?></td>
                  <td ><?=$row->no_polisi?></td>
                  <td><?=$row->kapasitas?></td>
                  <td><?=$row->nama?></td>
                  <td><?=$row->telepon?></td>
                  <td>
                      <button type="button" class="btn btn-primary fa fa-edit" data-toggle="modal" data-target="#edit" onclick="get(<?=$row->id_bus?>)"></button>
                      <button type="button" class="btn btn-danger fa fa-trash" onclick="deleteData(<?=$row->id_bus?>)"></button>
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

        <div class="modal fade" id="add" tabindex="-1" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Tambah Armada</h4>
                </div>
                <div class="modal-body">
                  <?=form_open('admin/armada-bus')?>
                      <div class="box-body">
                        <div class="form-group">
                          <label>Nomor Polisi</label>
                          <input type="nama" name="no_polisi" class="form-control" placeholder="Contoh: BG 9999 ND">
                        </div>
                        <div class="form-group">
                          <label>Nama Pengemudi</label>
                          <input type="nama" name="nama" class="form-control" placeholder="Nama pengemudi bus">
                        </div>
                        <div class="form-group">
                          <label>Telepon Pengemudi</label>
                          <input type="number" name="telepon" class="form-control" placeholder="Telepon/HP Pengemudi">
                        </div>
                        <div class="form-group">
                                <label>Kapasitas</label>
                                <select name="kapasitas" class="form-control select2" style="width: 100%;">
                                <option value="">- Pilih Kapasitas -</option>
                                <option value="35">35</option>
                                <option value="39">39</option>
                                </select>
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
                  <h4 class="modal-title">Edit Armada</h4>
                </div>
                <div class="modal-body">
                  <?=form_open('admin/armada-bus')?>
                      <div class="box-body">
                        <div class="form-group">
                          <label>Nomor Polisi</label>
                          <input type="text" value=""  name="edit_no_polisi" id="edit_no_polisi" class="form-control" placeholder="Contoh: BG 9999 ND">
                        </div>
                        <div class="form-group">
                          <label>Nama Pengemudi</label>
                          <input type="text" name="edit_nama" id="edit_nama" class="form-control" placeholder="Nama pengemudi bus">
                        </div>
                        <div class="form-group">
                          <label>Telepon Pengemudi</label>
                          <input type="number" name="edit_telepon" id="edit_telepon" class="form-control" placeholder="Telepon/HP Pengemudi">
                        </div>
                        <input type="number" name="id_bus" id="id_bus" class="form-control">
                        <div class="form-group">
                                <label>Kapasitas (Biarkan jika tidak diubah)</label>
                                <select name="kapasitas" class="form-control select2" style="width: 100%;">
                                <option value="0">- Pilih Kapasitas -</option>
                                <option value="35">35</option>
                                <option value="39">39</option>
                                </select>
                        </div>
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

        function get(id_bus) {
            $.ajax({
                url: '<?= base_url('admin/armada-bus') ?>',
                type: 'POST',
                data: {
                    id_bus: id_bus,
                    get: true
                },
                success: function(response) {
                    response = JSON.parse(response);
                    $('#edit_no_polisi').val(response.no_polisi);
                    $('#edit_nama').val(response.nama);
                    $('#edit_telepon').val(response.telepon);
                    $('#id_bus').val(response.id_bus);
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
                    url: '<?= base_url('admin/armada-bus') ?>',
                    type: 'POST',
                    data: {
                        delete: true,
                        id: id
                    },
                    success: function() {
                        window.location = '<?= base_url('admin/armada-bus') ?>';
                    }
                });
            }
            });
        }

    </script>