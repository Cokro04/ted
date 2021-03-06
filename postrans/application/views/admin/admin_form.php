<!-- Content Header (Page header) -->
<section class="content-header">
	<h1><i class="fa fa-truck"></i>  admin</h1><small>Pengirim admin</small>
	</section>
<!-- Main Content -->
<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title"><?=ucfirst($page)?> Data</h3>
			<div class="pull-right">
				<a href="<?=site_url('admin')?>" class="btn btn-warning btn-flat">
					<i class="fa fa-undo"></i> Kembali
				</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4  col-md-offset-4">
					<form action="<?=site_url('admin/process')?>" method="post">
						<div class="form-group">
							<label>Kode Barang *</label>
							<input type="hidden" name="id" value="<?=$row->barang_id?>">
							<input type="text" name="kode_barang" value="<?=$row->kode_barang?>" class="form-control" required>
						</div>
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
							<textarea name="isi" class="form-control"><?=$row->isi?></textarea>
						</div>
						<div class="form-group">
							<label>Berat *</label>
							<input type="text" name="berat" value="<?=$row->berat?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Alamat *</label>
							<input type="text" name="alamat" value="<?=$row->alamat?>" class="form-control" required>
						</div>
						<div class="form-group">
							<button type="submit" name="<?=$page?>" class="btn btn-success btn-flat">
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