<!-- Content Header (Page header) -->
<section class="content-header">
	<h1><i class="fa fa-users"></i>Users</h1>
	</section>
<!-- Main Content -->
<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Data Users</h3>
			<div class="pull-right">
				<a href="<?=site_url('user/add')?>" class="btn btn-primary btn-flat">
					<i class="fa fa-user-plus"></i> Tambah
				</a>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th class="text-center" width="60px">#</th>
						<th class="text-center" width="160px">NIP</th>
						<th class="text-center" width="160px">password</th>
						<th class="text-center" width="160px">Name</th>
						<th class="text-center" width="160px">Level</th>
						<th class="text-center" width="160px">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach($row->result() as $key => $data) { ?>
					<tr>
						<td style="width:5%" class="text-center" width="60px"><?=$no++?>.</td>
						<td class="text-center" width="160px"><?=$data->username?></td>
						<td class="text-center" width="160px"><?=$data->password?></td>
						<td class="text-center" width="160px"><?=$data->name?></td>
						<td class="text-center" width="160px"><?php if($data->level == 1) {
						 echo "Admin";
						} else if($data->level == 2) {
						 echo "Agen";
						} else if($data->level == 3) {
						 echo "Manajer";
						}
						?></td>
						<td class="text-center" width="160px">
							<form action="<?=site_url('user/del')?>" method="post">
							<a href="<?=site_url('user/edit/'.$data->id)?>" class="btn btn-primary btn-xs">
								<i class="fa fa-pencil"></i> Ubah
							</a>
							<input type="hidden" name="id" value="<?=$data->id?>">
							<button onclick="return confirm('Apakah Anda Yakin Menghapus Pengguna?')" class="btn btn-danger btn-xs">
								<i class="fa fa-trash"></i> Hapus
							</a>
							</button>
							</form>
						</td>
					</tr>
					<?php
					} ?>
				</tbody>
			</table>
			
		</div>
	</div>
</section>