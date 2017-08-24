  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Rute Perjalanan
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
                  <?=form_open('admin/lihat-rute/'.$this->uri->segment(3))?>
                      <div class="box-body">
                        <div class="form-group">
                                <label>Rute Perjalanan</label>
                                <select name="rute" class="form-control select2" style="width: 100%;">
                                <option value="">- Pilih Rute -</option>
                                <?php foreach ($pilih_rute as $row):?>
                                <option value="<?=$row->id_rute?>"><?=$row->asal?> - <?=$row->tujuan?></option>
                                <?php endforeach;?>
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

    <script type="text/javascript">

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
