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
$query_rsconstructs = "SELECT * FROM constructs";
$rsconstructs = mysql_query($query_rsconstructs, $conncard) or die(mysql_error());
$row_rsconstructs = mysql_fetch_assoc($rsconstructs);
$totalRows_rsconstructs = mysql_num_rows($rsconstructs);

mysql_select_db($database_conncard, $conncard);
$query_rstraindata = "SELECT * FROM traintable";
$rstraindata = mysql_query($query_rstraindata, $conncard) or die(mysql_error());
$row_rstraindata = mysql_fetch_assoc($rstraindata);
$totalRows_rstraindata = mysql_num_rows($rstraindata);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>cardSORTER | Training</title>
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
    <link rel="stylesheet" href="plugins/iCheck/all.css">

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
              Training.
              <small>task codes</small></h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="#">Layout</a></li>
              <li class="active">Boxed</li>
            </ol>
          </section>
          
          <!-- Main content -->
          <section class="content">
            
            <div class="box">
                <div class="box-header with-border" style="padding:10px 20px 10px 20px;">
                	<div class="row">
                    	<div  class="col-md-4" > <a class="previousbutton" style="cursor:pointer" ><strong><i class="fa fa-angle-double-left"></i> Previous </strong> </a> </div>
                        <div  class="col-md-4 currenttitle" align="center"  > Card X of Y </div>
                        <div  class="col-md-4" align="right">  <a class="nextbutton" style="cursor:pointer" ><strong> Next <i class="fa fa-angle-double-right"></i> </strong> </a> </div>
                    </div>
                    
               </div>
                 <div id="loadprogress" class="loadtext"> <i class="fa fa-fw fa-hourglass"></i>  Loading saved responses .. </div>
                 <div class="progress progress-xxs">
                    <div id="progressstatus" class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 2%">
                      <span class="sr-only">60% Complete (warning)</span>
                    </div>
                  </div>
                <div class="box-body cardboxholder ">
                sdf
                </div>
               
            </div>    
            <!-- Default box -->
            <div class="row cardbox" style="display:none;">
            <?php  $i = 1 ; do { ?>
            <div class="box carditem" >
             <div class="codecard" id="<?php echo $i; ?>" , dbid="<?php echo $row_rstraindata['id']; ?>">           
              <?php echo $row_rstraindata['description']; ?>   
             </div> 
            </div>
            <?php $i++ ;  } while ($row_rstraindata = mysql_fetch_assoc($rstraindata));?>
            </div>
<!-- /.box -->
            
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Select Codes that Apply </h3></div>
              <div class="box-body constructbox"> 
              <?php 
            $groupname = "" ;
            $colorindex = 0 ;
            $colors = array("#3c8dbc","#00c0ef","#00a65a","#f39c12","#f56954"," #d2d6de"," #0000FF","#7F00FF"," #FF0000") ;
            do { 
            
            ?>
            
            <?php if ($groupname != $row_rsconstructs['group']) { 
            $groupname = $row_rsconstructs['group'] ;
            $colorindex =($colorindex + 1) % count($colors) ;
            
            ?>
            
            <?php } ?>
				<div  class="col-md-4" style="padding:10px;  ">
				<div class="codeboxb" style="border-bottom:3px solid <?php echo $colors[$colorindex] ;?>;" >
					<div class="form-group" style=" height:100%;  margin:0px;" align="center" >
                    <label class="constructs" data-placement="top"   data-toggle="tooltip"  title="<?php echo $row_rsconstructs['description']; ?>" style="width:100%; padding:10px; border: 1px solid #ccc; margin:0px;">
					<input type="checkbox"   dbid="<?php echo $row_rsconstructs['id']; ?>" name="<?php echo $row_rsconstructs['group']; ?>" > <?php echo $row_rsconstructs['title']; ?>
					</label>
                    </div> 
                </div> 
                </div>       
            <?php } while ($row_rsconstructs = mysql_fetch_assoc($rsconstructs)); ?>
					
              
              
              </div><!-- /.box-body -->
              
            </div><!-- /.box -->
            
             
            
            
            
            
             <div class="box">
                <div class="box-header with-border" style="padding:10px 20px 10px 20px;">
                	<div class="row">
                    	<div  class="col-md-4" > <a class="previousbutton" style="cursor:pointer" ><strong><i class="fa fa-angle-double-left"></i> Previous </strong> </a> </div>
                        <div  class="col-md-4 currenttitle" align="center"> Card X of Y </div>
                        <div  class="col-md-4" align="right">  <a class="nextbutton" style="cursor:pointer" ><strong> Next <i class="fa fa-angle-double-right"></i> </strong> </a> </div>
                    </div>
                    
               </div>
               
            </div>    
            
            <div id="response" class="loadtext"> </div>
            
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

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="plugins/iCheck/icheck.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/training.js"></script>
  </body>
</html>
<?php
mysql_free_result($rsconstructs);

mysql_free_result($rstraindata);
?>
