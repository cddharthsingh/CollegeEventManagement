<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$self = WEB_ROOT . 'admin/index.php';
?>
<!DOCTYPE html>
<html>
<head>
<?php include('head.php'); ?>
</head>
<body class="hold-transition skin-blue layout-boxed">
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo WEB_ROOT; ?>" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-lg"><b>DSCE ACTIVITIES</b></span> </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <?php include('nav.php'); ?>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
   <?php include('sidebar.php'); ?>
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> DSCE Activities <small>Event calendar of College.</small> </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Calendar</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      
	  <div class="row">
	  	<div class="col-md-12">
		<?php include('messages.php'); ?>
		</div>
	  </div>
	  
	  <div class="row">
	  	<?php
			require_once $content;	 
		?>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
		<?php include('footer.php'); ?>
	</footer>
</div>
<!-- ./wrapper -->
</body>
</html>
