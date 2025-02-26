<?php
	session_start();
	include 'dbconf.php';
	if (!isset($_SESSION['login']))
		header('Location: login-ui.php');
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $_SESSION['judul'];?> | <?php echo $_SESSION['desc'];?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="lte/bootstrap/css/bootstrap.min.css">
   <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="lte/plugins/datepicker/datepicker3.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="lte/dist/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="lte/dist/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="lte/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="lte/dist/css/skins/_all-skins.min.css">
  <link rel="icon" href="logoptatm.png">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition fixed skin-green sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b><?php echo $_SESSION['judul'];?></b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><?php echo $_SESSION['judul'];?></b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo $_SESSION['foto'];?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo ucwords($_SESSION['user']);?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo $_SESSION['foto'];?>" class="img-circle" alt="User Image">

                <p>
                  <?php 
					  echo ucwords($_SESSION['user']);?> - <?php echo ucwords($_SESSION['level']);
					  $date = date_create($_SESSION['since']);
				  ?> 
				  <small>Member Since, <?php echo date_format($date, 'd M Y');?></small>
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <!--a href="#" class="btn btn-default btn-flat">Profile</a-->
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Logout</a>
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
          <img src="<?php echo $_SESSION['foto'];?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo ucwords($_SESSION['user']);?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="dashboard-ui.php">
            <i class="fa fa-windows"></i> <span>Dashboard</span>
          </a>
        </li>
		<li>
          <a href="hasil.php">
            <i class="fa fa-laptop"></i> <span>Hasil Perhitungan</span>
          </a>
        </li>
		<?php if($_SESSION['level']=='admin'){?>
		<li>
          <a href="kriteria.php">
            <i class="fa fa-book"></i> <span>Data Kriteria</span>
          </a>
        </li>
		<li class="active">
          <a href="karyawan.php">
            <i class="fa fa-users"></i> <span>Data Karyawan</span>
          </a>
        </li>
		<li>
          <a href="penilaian.php">
            <i class="fa fa-list"></i> <span>Data Penilaian</span>
          </a>
        </li>
		<li>
          <a href="user.php">
            <i class="fa fa-user"></i> <span>Data User</span>
          </a>
        </li>
		<?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="text-success">
        Dashboard
        <small><?php echo $_SESSION['desc'];?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard-ui.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="karyawan.php">Data Karyawan</a></li>
        <li class="active">Tambah Karyawan Baru</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title text-success"><i class="fa fa-users"> </i> Tambah Karyawan Baru</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <!--button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button-->
          </div>
        </div>
        <!-- form start -->
            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="proses-karyawan.php">
              <div class="row">
			   <div class="col-lg-6 col-xs-12">
			  <div class="box-body">
			   
                <div class="form-group">
                  <label for="nama" class="col-sm-2 control-label">Nama</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" required />
                  </div>
                </div>
				<div class="form-group">
                  <label for="Alamat" class="col-sm-2 control-label">Alamat</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" required />
                  </div>
                </div>
				<div class="form-group">
                  <label for="jenis_kelamin" class="col-sm-2 control-label">Jenis Kelamin</label>

                  <div class="col-sm-10">
					<select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
						<option value='laki-laki'>Laki-laki</option>
						<option value='perempuan'>Perempuan</option>
					</select>
                  </div>
                </div>
				<div class="form-group">
                  <label for="jabatan" class="col-sm-2 control-label">Jabatan</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Jabatan" required />
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="reset" class="btn btn-warning">Reset</button>
				<a type="button" class="btn btn-danger" href="karyawan.php">Cancel</a>
                <button type="submit" class="btn btn-success pull-right">Proses</button>
              </div>
              <!-- /.box-footer -->
			  </div>
		  </div><!-- row -->
            </form>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> <?php echo $_SESSION['judul'].".".date('Y').".a"?>
    </div>
    <strong>Copyright &copy; <?php echo date('Y');?></strong> <?php echo $_SESSION['creator']?>. All rights
    reserved.
  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="lte/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="lte/bootstrap/js/bootstrap.min.js"></script>
<!-- bootstrap datepicker -->
<script src="lte/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- SlimScroll -->
<script src="lte/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="lte/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="lte/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="lte/dist/js/demo.js"></script>
<!-- Page script -->
<script>
  $(function () {
	 //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });  
 });
</script>
</body>
</html>
