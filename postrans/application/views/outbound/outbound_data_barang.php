<section class="content-header">
  <h1><i class="fa fa-upload"></i> Data Outbound</h1>
</section>

<section class="content">
  <?php $this->view('messages') ?>
  <div class="box">
    <div class="box-header">
      <h3 class="box-title fa fa-upload"> Daftar Outbound</h3>
      <div class="pull-right">
        <a href="<?= site_url('outbound/add') ?>" class="btn btn-primary btn-flat">
          <i class="fa fa-plus"></i> Tambah
        </a>

        <a href="<?= site_url('dashboard') ?>" class="btn btn-warning btn-flat">
          <i class="fa fa-undo"></i> Kembali
        </a>
      </div>
    </div>
  </div>

  <div class="box">
    <div class="box-header">Form Tambaha Data Outbound</div>
    <div class="box-body">
      <form method="post" action="<?= site_url('outbound/saveBatch') ?>">
        <!-- Buat tombol untuk menabah form data -->
        <button type="button" id="btn-tambah-form">Tambah Data Form</button>
        <button type="button" id="btn-reset-form">Reset Form</button><br><br>

        <b>Data ke 1 :</b>
        <table>
          <tr>
            <td><label>Keterangan *</label>
              <select name="barang_id[]" class="custom-select">
                <option value="" selected disabled>Pilih Satuan Barang</option>
                <?php foreach ($data as $b) : ?>
                  <option value="<?= $b['barang_id'] ?>"><?= $b['barang_id'] ?></option>
                <?php endforeach; ?>
              </select>
            </td>
            <td> </td>
            <td><label>id Outbound *</label><input type="text" name="id_outbound[]" value="<?= $id_out ?>" required></td>
          </tr>
        </table>
        <br><br>

        <div id="insert-form"></div>

        <hr>
        <input type="submit" value="Simpan">
      </form>

      <!-- Kita buat textbox untuk menampung jumlah data form -->
      <input type="hidden" id="jumlah-form" value="1">
    </div>
  </div>
</section>

<script>
  $(document).ready(function() { // Ketika halaman sudah diload dan siap
    $("#btn-tambah-form").click(function() { // Ketika tombol Tambah Data Form di klik
      var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
      var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya

      // Kita akan menambahkan form dengan menggunakan append
      // pada sebuah tag div yg kita beri id insert-form
      $("#insert-form").append("<b>Data ke " + nextform + " :</b>" +
        "<table>" +
        "<tr>" +
        "<td><label>Keterangan *</label>" +
        "<select name='barang_id[]' class='custom-select'>" +
        "<option value='' selected disabled>Pilih Satuan Barang</option>" +
        "<?php foreach ($data as $b) : ?>" +
        "<option value='<?= $b["barang_id"] ?> '><?= $b["barang_id"] ?></option>" +
        "<?php endforeach; ?>" +
        "</select>" +
        "</td>" +
        "<td> </td>" +
        "<td><label>id Outbound *</label><input type='text' name='id_outbound[]' value='<?= $id_out ?>' required></td>" +
        "</tr>" +
        "</table>" +
        "<br><br>");

      $("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
    });

    // Buat fungsi untuk mereset form ke semula
    $("#btn-reset-form").click(function() {
      $("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
      $("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
    });
  });
</script>