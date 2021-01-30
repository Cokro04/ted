<!-- Content Header (Page header) -->
<section class="content-header">
	<h1><i class="fa fa-mail"></i> Pesan</h1>
</section>
<!-- Main Content -->
<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title"></h3>
			<div class="pull-right">
				<a href="<?= site_url('pesan') ?>" class="btn btn-warning btn-flat">
					<i class="fa fa-undo"></i> Kembali
				</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4  col-md-offset-4">
					<form action="<?= site_url('pesan/process') ?>" method="post">
						<div class="form-group">
							<label>Pesan *</label>
							<input type="hidden" name="id" value="<?= $id ?>">
							<textarea name="pesan" class="form-control"><?= $row->pesan ?></textarea>
						</div>
						<div class="form-group">
							<button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat">
								<i class="fa fa-paper-plane"> Kirim Peasn</i>
							</button>
							<button type="reset" class="btn btn-flat">Ulang</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>