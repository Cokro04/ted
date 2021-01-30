<!-- Content Header (Page header) -->
<section class="content-header">
	<h1><i class="fa fa-truck"></i> barang</h1><small>Pengirim Barang</small>
</section>
<!-- Main Content -->
<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title"><?= ucfirst($page) ?> Data</h3>
			<div class="pull-right">
				<a href="<?= site_url('barang') ?>" class="btn btn-warning btn-flat">
					<i class="fa fa-undo"></i> Kembali
				</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4  col-md-offset-4">
					<form action="<?= site_url('barang/process') ?>" method="post">
						<div class="form-group">
							<label>Kode Barang *</label>
							<input type="hidden" name="id_outbound" value="0">
							<input type="hidden" name="status" value="BM">
							<input type="hidden" name="id" value="<?= $row->barang_id ?>">
							<input type="text" name="barang_id" value="<?= $id_barang ?>" class="form-control" readonly>

						</div>


						<input type="hidden" name="id_user" value="<?= $this->session->userdata('userid'); ?>">

						<div class="form-group">
							<label>Jenis *</label>
							<select name="jenis" class="form-control" required>
								<option value="">- Pilih -</option>
								<option value="Pecah Belah">Pecah Belah</option>
								<option value="Bukan Pecah Belah">Bukan Pecah Belah</option>
							</select>
						</div>
						<div class="form-group">
							<label>Isi *</label>
							<textarea name="isi" class="form-control"><?= $row->isi ?></textarea>
						</div>
						<div class="form-group">
							<label>Berat *</label>
							<input type="number" name="berat" value="<?= $row->berat ?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Alamat *</label>
							<input type="text" name="alamat" value="<?= $row->alamat ?>" class="form-control" required>
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