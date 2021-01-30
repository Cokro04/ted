<!-- Content Header (Page header) -->
<section class="content-header">
	<h1><i class="fa fa-archive"></i> Data Barang Masuk</h1>
</section>
<!-- Main Content -->
<section class="content">
	<?php $this->view('messages') ?>
	<div class="box">
		<div class="box-header">
			<h3 class="box-title fa fa-archive"> Daftar Barang</h3>
			<div class="row">
				<div class="col-xs-6"></div>
				<div class="col-xs-4">
					<form action="<?= site_url('admin/getAgen') ?>" method="get">
						<label>Cari :</label>
						<select name="cari" class="custom-select">
							<option value="" selected disabled>Pilih Satuan Barang</option>
							<?php foreach ($barang as $b) : ?>
								<option value="<?= $b['id_user'] ?>"><?= $b['name'] ?></option>
							<?php endforeach; ?>
						</select>
						<input type="submit" value="Cari">
					</form>
				</div>
				<div class="col-xs-2">
					<a href="<?= site_url('dashboard') ?>" class="btn btn-warning btn-flat">
						<i class="fa fa-undo"></i> Kembali
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="box-body table-responsive">
		<table class="table table-bordered table-striped" id="table1">
			<thead>
				<tr>
					<th class="text-center" width="60px">#</th>
					<th class="text-center" width="160px">Kode Barang</th>
					<th class="text-center" width="160px">Jenis</th>
					<th class="text-center" width="160px">Isi</th>
					<th class="text-center" width="160px">Berat</th>
					<th class="text-center" width="160px">Alamat</th>
					<th class="text-center" width="160px">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1;
				foreach ($row->result() as $key => $data) { ?>
					<tr>
						<td style="width:5%" class="text-center" width="60px"><?= $no++ ?>.</td>
						<td class="text-center" width="160px"><?= $data->barang_id ?></td>
						<td class="text-center" width="160px"><?= $data->jenis ?></td>
						<td class="text-center" width="160px"><?= $data->isi ?></td>
						<td class="text-center" width="160px"><?= $data->berat ?></td>
						<td class="text-center" width="160px"><?= $data->alamat ?></td>
						<td class="text-center" width="160px">

						</td>
					</tr>
				<?php
				} ?>
			</tbody>
		</table>

	</div>
	</div>
</section>