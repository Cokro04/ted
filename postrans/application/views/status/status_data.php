<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><i class="fa fa-upload"></i> Data Outbound</h1>
</section>
<!-- Main Content -->
<section class="content">
  <?php $this->view('messages') ?>
  <div class="box">
    <div class="box-header">
      <h3 class="box-title fa fa-upload"> Daftar Outbound</h3>
      <div class="pull-right">
        <a href="<?= site_url('outbound/add') ?>" class="btn btn-primary btn-flat">
          <i class="fa fa-plus"></i> Tambah
        </a>

        <a href="<?= site_url('dashboard') ?>" class="btn btn-warning btn-flat">
          <i class="fa fa-undo"></i> Kembali
        </a>
      </div>
    </div>
  </div>
  <div class="box-body table-responsive">
    <table class="table table-bordered table-striped" id="table1">
      <thead>
        <tr>
          <th class="text-center" width="60px">#</th>
          <th class="text-center" width="160px">Kode Seal</th>
          <th class="text-center" width="160px">Nama Pos</th>
          <th class="text-center" width="160px">Tanggal Cetak</th>
          <th class="text-center" width="160px">Tujuan</th>
          <th class="text-center">Jumalah Barang</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1;
        foreach ($row->result() as $key => $data) { ?>
          <tr>
            <td style="width:5%" class="text-center" width="60px"><?= $no++ ?>.</td>
            <td class="text-center" width="160px"><?= $data->id_outbound ?></td>
            <td class="text-center" width="160px"><?= $data->Nama ?></td>
            <td class="text-center" width="160px"><?= $data->tanggal_cetak ?></td>
            <td class="text-center" width="160px"><?= $data->Tujuan ?></td>
            <td class="text-center">
              <a href="<?= site_url('status_kirim/detail/' . $data->id_outbound) ?>" class="btn btn-success btn-xs" title="Lihat data barang">
                <i class="fa fa-eye"></i> Data Barang
              </a>
            </td>
          </tr>
        <?php
        } ?>
      </tbody>
    </table>

  </div>
  </div>
</section>