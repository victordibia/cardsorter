<?php require_once('Connections/conncard.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_conncard, $conncard);
$query_rscodes = "SELECT * FROM constructs";
$rscodes = mysql_query($query_rscodes, $conncard) or die(mysql_error());
$row_rscodes = mysql_fetch_assoc($rscodes);
$totalRows_rscodes = mysql_num_rows($rscodes);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>cardSORTER | Codes</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/card.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <!-- ADD THE CLASS layout-boxed TO GET A BOXED LAYOUT -->
  <body class="hold-transition skin-green layout-boxed sidebar-mini">
    <!-- Site wrapper -->
   
    <div class="wrapper">
        
        <?php include("header.php"); ?>
        
        <!-- =============================================== -->
        
        <!-- Left side column. contains the sidebar -->
        <?php include("sidebar.php"); ?>
        
        <!-- =============================================== -->
        
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Code Book
              <small>Definitions of constructs/categories. </small></h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="#">Layout</a></li>
              <li class="active">Boxed</li>
            </ol>
          </section>
          
          <!-- Main content -->
          <section class="content">
            
            <!-- Default box -->
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Instructions</h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                  <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">Each of the boxes below represent a theme. Please read each theme and ensure you understand it carefully . When you have read all themes, you may proceed to try some some card sorting.</div><!-- /.box-body -->
              
            </div><!-- /.box -->
            
            <div class="row"><!-- ./col -->
               <?php do { ?>
              <div class="col-md-4">
                <div class="box codebox">
                  <div class="box-header with-border">
                    <i class="fa fa-text-width"></i>
                    <h3 class="box-title"><?php echo $row_rscodes['title']; ?> </h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <?php echo $row_rscodes['description']; ?>
                  </div><!-- /.box-body -->
                </div><!-- /.box -->
              </div><!-- ./col -->
               <?php } while ($row_rscodes = mysql_fetch_assoc($rscodes)); ?>
            </div><!-- /.row -->
            
            
            
          </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
        
        <?php include("footer.php"); ?>
        
        <!-- Control Sidebar -->
        <?php include("controlsidebar.php"); ?><!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
      </div>
     
<!-- ./wrapper -->

   
  </body>
</html>
<?php
mysql_free_result($rscodes);
?>
