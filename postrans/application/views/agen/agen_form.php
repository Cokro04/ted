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
					<form action="<?= site_url('agen/process') ?>" method="post">
						<div class="form-group">
							<label>Nama Pos *</label>
							<input type="hidden" name="id" value="<?= $row->agen_id ?>">
							<input type="text" name="agen_name" value="<?= $row->name ?>" class="form-control" required>
							<input type="hidden" name="id_user" value="<?= $this->session->userdata('userid') ?>" class="form-control">
						</div>
						<div class="form-group">
							<label>Alamat *</label>
							<textarea name="addr" class="form-control" required><?= $row->address ?></textarea>
						</div>
						<div class="form-group">
							<label>Keterangan *</label>
							<textarea name="desc" class="form-control"><?= $row->description ?></textarea>
						</div>
						<div class="form-group">
							<label>Kode POS *</label>
							<input type="text" name="kode" value="<?= $row->kode_pos ?>" class="form-control" required>
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