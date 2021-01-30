<!-- Content Header (Page header) -->
<section class="content-header">
	<h1><i class="fa fa-truck"></i>  Agen</h1><small>Penyedia Barang</small>
	</section>
<!-- Main Content -->
<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Data Agen</h3>
			<div class="pull-right">
				<a href="<?=site_url('agen/add')?>" class="btn btn-primary btn-flat">
					<i class="fa fa-plus"></i> Tambah
				</a>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th class="text-center" width="60px">#</th>
						<th class="text-center" width="160px">Nama Pos</th>
						<th class="text-center" width="160px">Alamat</th>
						<th class="text-center" width="160px">Keterangan</th>
						<th class="text-center" width="160px">Kode POS</th>
						<th class="text-center" width="160px">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach($row->result() as $key => $data) { ?>
					<tr>
						<td style="width:5%" class="text-center" width="60px"><?=$no++?>.</td>
						<td class="text-center" width="160px"><?=$data->name?></td>
						<td class="text-center" width="160px"><?=$data->address?></td>
						<td class="text-center" width="160px"><?=$data->description?></td>
						<td class="text-center" width="160px"><?=$data->kode_pos?></td>
						<td class="text-center" width="160px">
							<a href="<?=site_url('agen/edit/'.$data->agen_id)?>" class="btn btn-primary btn-xs">
								<i class="fa fa-pencil"></i> Ubah
							</a>
							<a href="<?=site_url('agen/del/'.$data->agen_id)?>" onclick="return confirm('Yakin Ingin Menghapus Data?')" class="btn btn-danger btn-xs">
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