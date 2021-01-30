<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><i class="fa fa-truck"></i> Agen</h1><small>Pengirim Barang</small>
</section>
<!-- Main Content -->
<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title"><?= ucfirst($page) ?> Data</h3>
      <div class="pull-right">
        <a href="<?= site_url('agen') ?>" class="btn btn-warning btn-flat">
          <i class="fa fa-undo"></i> Kembali
        </a>
      </div>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-4  col-md-offset-4">
          <form action="<?= site_url('outbound/process') ?>" method="post">
            <div class="form-group">
              <label>Nama Pos*</label>
              <input type="hidden" name="id_outbound" value="<?= $row->id_outbound ?>">
              <input type="text" name="Nama" value="<?= $row->Nama ?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Tanggal Cetak *</label>
              <?php date_default_timezone_set('Asia/Jakarta'); ?>
              <input name="tanggal_cetak" class="form-control" value="<?= date('Y-m-d H:i:s'); ?>" readonly>
            </div>
            <div class="form-group">
              <label>Tujuan *</label>
              <textarea name="Tujuan" class="form-control"><?= $row->Tujuan ?></textarea>
            </div>
            <div class="form-group">
              <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat">
                <i class="fa fa-paper-plane">Simpan</i>
              </button>
              <button type="reset" class="btn btn-flat">Ulang</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>