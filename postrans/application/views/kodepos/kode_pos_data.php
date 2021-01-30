<!-- Content Header (Page header) -->
<section class="content-header">
	<h1><i class="fa fa-map"></i>  Daftar Kode Pos</h1><small>Berdasarkan Kabupaten</small>
	</section>
<!-- Main Content -->
<section class="content">
	<?php $this->view('messages')?>
	<div class="box">
		<div class="box-header">
			<h3 class="box-title fa fa-map"> List Kode</h3>
			<div class="pull-right">
				<a href="<?=site_url('barang')?>" class="btn btn-warning btn-flat">
					<i class="fa fa-undo"></i> Kembali
				</a>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
						<th class="text-center" width="60px">#</th>
						<th class="text-center" width="160px">Kabupaten</th>
						<th class="text-center" width="160px">Kode Pos</th>
						<th class="text-center" width="160px">Provinsi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach($row->result() as $key => $data) { ?>
					<tr>
						<td style="width:5%" class="text-center" width="60px"><?=$no++?>.</td>
						<td class="text-center" width="160px"><?=$data->kabupaten?></td>
						<td class="text-center" width="160px"><?=$data->kode_pos?></td>
						<td class="text-center" width="160px"><?=$data->provinsi?></td>
					</tr>
					<?php
					} ?>
				</tbody>
			</table>
			
		</div>
	</div>
</section>