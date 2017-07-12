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
                  <th>Nama Rute</th>
                  <th>Harga</th>
                  <th>Opsi</th>
                </tr>
                <?php $i = 1; foreach ($rute as $row):?>
                <tr>
                  <td><?=$i++?></td>
                  <td><?=$row->rute?></td>
                  <td>Rp. <?=number_format($row->biaya,2,",",".")?></td>
                  <td>BUTTON HERE</td>
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
                          <label for="exampleInputEmail1">Rute</label>
                          <input type="text" name="rute" class="form-control" placeholder="Masukan Rute">
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
