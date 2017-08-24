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
                    <a href="<?=base_url('admin/pesan-tiket/'.$this->encrypt->encode($row->id_keberangkatan).'/'.$row->id_rute)?>" class="btn btn-primary">Pesan</a>
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