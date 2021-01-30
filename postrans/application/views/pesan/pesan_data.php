<!-- Content Header (Page header) -->
<section class="content-header">
	<h1><i class="fa fa-truck"></i> Pesan</h1>
</section>
<!-- Main Content -->
<?php if ($this->fungsi->user_login()->level == 1) { ?>
	<section class="content">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Pesan</h3>
			</div>
			<div class="box-body table-responsive">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th class="text-center" width="60px">#</th>
							<th class="text-center" width="160px">Nama Pos</th>
							<th class="text-center" width="160px">Alamat</th>
							<th class="text-center" width="160px">Pesan</th>
							<th class="text-center" width="160px">Kode POS</th>
							<th class="text-center" width="160px">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($row->result() as $key => $data) { ?>
							<tr>
								<td style="width:5%" class="text-center" width="60px"><?= $no++ ?>.</td>
								<td class="text-center" width="160px"><?= $data->name ?></td>
								<td class="text-center" width="160px"><?= $data->address ?></td>
								<td class="text-center" width="160px"><?= $data->pesan ?></td>
								<td class="text-center" width="160px"><?= $data->kode_pos ?></td>
								<td class="text-center" width="160px">
									<a href="<?= site_url('pesan/kirim/' . $data->agen_id) ?>" class="btn btn-primary btn-xs">
										<i class="fa fa-pencil"></i> Kirim Peasan
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
<?php } elseif ($this->fungsi->user_login()->level == 2) { ?>
	<section class="content">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Pesan</h3>
			</div>
			<div class="box-body table-responsive">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th class="text-center" width="300px">Pesan</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($row1->result() as $key => $data) { ?>
							<tr>
								<td class="text-center" width="300px"><?= $data->pesan ?></td>
							</tr>
						<?php
						} ?>
					</tbody>
				</table>

			</div>
		</div>
	</section>
<?php } ?>