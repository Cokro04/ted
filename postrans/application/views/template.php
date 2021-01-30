<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pos Trans</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Data table -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/skins/_all-skins.min.css">

  <script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="<?= base_url('dashboard') ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>P</b>T</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Pos</b>Trans</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Tasks: style can be found in dropdown.less -->
            <li class="dropdown tasks-menu">

              <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?= base_url() ?>assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                <span class="hidden-xs"><?= $this->fungsi->user_login()->name ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="<?= base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                  <p>
                    <?= $this->fungsi->user_login()->name ?>
                  </p>
                  <p>NIP :
                    <?= $this->fungsi->user_login()->username ?>
                  </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                  <div class="row">
                  </div>
                  <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-right">
                    <a href="<?= site_url('auth/logout') ?>" class="btn btn-default btn-flat fa fa-sign-out">Keluar</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="<?= base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?= ucfirst($this->fungsi->user_login()->name) ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">Navigasi Utama</li>
          <li <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>><a href="<?= site_url('dashboard') ?>"><i class="fa fa-home"></i> <span>Home</span></a></li>
          <li class="treeview <?= $this->uri->segment(1) == 'barang' || $this->uri->segment(1) == 'invoice' || $this->uri->segment(1) == 'agen' ? 'active' : '' ?>">
            <a href="#">
              <i class="fa fa-dashboard"></i>
              <span>Master Data</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                <ul class="treeview-menu">
                  <!-- user_check (hak akses)-->
                  <?php if ($this->fungsi->user_login()->level == 1) { ?>
                    <li <?= $this->uri->segment(1) == 'barang' ? 'class="active"' : '' ?>><a href="<?= site_url('admin') ?>"><i class="fa fa-circle-o"></i>Tambah Barang</a></li>
                  <?php } ?>
                  <?php if ($this->fungsi->user_login()->level == 2) { ?>
                    <li <?= $this->uri->segment(1) == 'barang' ? 'class="active"' : '' ?>><a href="<?= site_url('barang') ?>"><i class="fa fa-circle-o"></i>Tambah Barang</a></li>
                  <?php } ?>
                  <?php if ($this->fungsi->user_login()->level == 1 || $this->fungsi->user_login()->level == 3) { ?>
                    <li <?= $this->uri->segment(1) == 'agen' ? 'class="active"' : '' ?>><a href="<?= site_url('agen') ?>"><i class="fa fa-circle-o"></i>Agen</a></li>
                  <?php } ?>
                </ul>
              </span>
            </a>
          </li>
          <?php if ($this->fungsi->user_login()->level == 1) { ?>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-money"></i>
                <span>Master Transaksi</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>

                  <ul class="treeview-menu">
                    <li><a href="<?= site_url('admin/brmasuk') ?>"><i class="fa fa-circle-o"></i>Barang Masuk</a></li>
                    <li><a href="<?= site_url('admin/closebook') ?>"><i class="fa fa-circle-o"></i>Tutup Buku</a></li>
                    <li><a href="<?= site_url('outbound') ?>"><i class="fa fa-circle-o"></i>Outbound</a></li>

                  </ul>
                </span>
              <?php } ?>
              <?php if ($this->fungsi->user_login()->level == 1 || $this->fungsi->user_login()->level == 3) { ?>
            <li><a href="<?= site_url('status_kirim') ?>"><i class="fa fa-truck"></i> <span>Status Pengiriman</span></a></li>
          <?php } ?>
          <li><a href="kode"><i class="fa fa-map"></i> <span>List Kode Pos</span></a></li>
          <!-- // untuk membedakan level user saat login -->
          <?php if ($this->fungsi->user_login()->level == 1) { ?>
            <li class="header">Pengaturan</li>
            <li><a href="<?= site_url('user') ?>"><i class="fa fa-user"></i> <span>Users</span></a></li>
          <?php } ?>
          <?php if ($this->fungsi->user_login()->level == 2) { ?>
            <li><a href="<?= site_url('agen') ?>"><i class="fa fa-user"></i> <span>Data Agen</span></a></li>
          <?php } ?>
          <?php if ($this->fungsi->user_login()->level == 1) { ?>
            <li><a href="<?= site_url('pesan/msg') ?>"><i class="fa fa-wechat"></i> <span>Pesan</span></a></li>
          <?php } ?>
          <?php if ($this->fungsi->user_login()->level == 2) { ?>
            <li><a href="<?= site_url('pesan/msg/' . $this->session->userdata('userid')) ?>"><i class="fa fa-wechat"></i> <span>Pesan</span></a></li>
          <?php } ?>

          <li><a href="<?= site_url('auth/logout') ?>"><i class="fa fa-sign-out"></i> <span>Keluar</span></a></li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <?php echo $contents ?>
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.0
      </div>
      <strong>Copyright &copy; 2020-2021 <a href="https://adminlte.io">Teddy Gideon Manik</a>.</strong> All rights
      reserved.
    </footer>

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="<?= base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="<?= base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url() ?>assets/dist/js/demo.js"></script>
  <script>
    $(document).ready(function() {
      $('.sidebar-menu').tree()
    })
  </script>
  <script src="<?= base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#table1').DataTable()
    })
  </script>
</body>

</html>