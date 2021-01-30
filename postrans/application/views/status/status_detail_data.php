<!-- Content Header (Page header) -->
<section class="content-header">
	<h1><i class="fa fa-archive"></i>Detail Data Barang</h1>
</section>
<!-- Main Content -->
<section class="content">
	<?php $this->view('messages') ?>
	<div class="box">
		<div class="box-header">
			<h3 class="box-title fa fa-archive">Detail Data barang</h3>
			<div class="pull-right">
				<a href="<?= site_url('Cetak/print/' . $id) ?>" class="btn btn-warning btn-flat">
					<i class="fa fa-undo"></i> Cetak
				</a>
			</div>
		</div>
	</div>

	<div class="box">
		<div class="box-body">
			<div class="box-body table-responsive">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th class="text-center" width="60px">#</th>
							<th class="text-center" width="160px">Id Seal</th>
							<th class="text-center" width="160px">Nama Pos</th>
							<th class="text-center" width="160px">Tanggal Cetak</th>
							<th class="text-center" width="160px">Tujuan</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($out_row->result() as $key => $data) { ?>
							<tr>
								<td style="width:5%" class="text-center" width="60px"><?= $no++ ?>.</td>
								<td class="text-center" width="160px"><?= $data->id_outbound ?></td>
								<td class="text-center" width="160px"><?= $data->Nama ?></td>
								<td class="text-center" width="160px"><?= $data->tanggal_cetak ?></td>
								<td class="text-center" width="160px"><?= $data->Tujuan ?></td>
							</tr>
						<?php
						} ?>
					</tbody>
				</table>
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
							</tr>
						<?php
						} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>