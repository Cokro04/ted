<!-- Content Header (Page header) -->
<section class="content-header">
	<h1><i class="fa fa-archive"></i> Data Barang</h1><small>Tambah barang</small>
</section>
<!-- Main Content -->
<section class="content">
	<?php $this->view('messages') ?>
	<div class="box">
		<div class="box-header">
			<h3 class="box-title fa fa-archive"> Daftar barang</h3>
			<div class="pull-right">
				<a href="<?= site_url('barang/add') ?>" class="btn btn-primary btn-flat">
					<i class="fa fa-plus"></i> Tambah Barang
				</a>
				<?php
				if ($this->fungsi->user_login()->id_agen != '') { ?>
					<a href="<?= site_url('barang/save') ?>" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Simpan</a>
				<?php }
				?>
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
							<a href="<?= site_url('barang/edit/' . $data->barang_id) ?>" class="btn btn-primary btn-xs">
								<i class="fa fa-pencil"></i> Ubah
							</a>
							<a href="<?= site_url('barang/del/' . $data->barang_id) ?>" onclick="return confirm('Yakin Ingin Menghapus Data?')" class="btn btn-danger btn-xs">
								<i class="fa fa-trash"></i> Hapus
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