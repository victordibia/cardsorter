<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>cardSORTER | Welcome</title>
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
            cardSORTER Beta
            <small>Card Sorting Tool for Social Science Research</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Layout</a></li>
            <li class="active">Boxed</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          
          <!-- Default box -->
          <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>	<i class="icon fa fa-check"></i> Hi There!</h4>
                   cardSORTER is still in Beta - There may be some bugs. Please report them to me at victor[dot]dibia[at]gmail.com.
          </div>
          
          <div class="row">
            <div class="col-md-12">
              <div class="box  ">
                <div class="box-header with-border">
                  <i class="fa fa-text-width"></i>
                  <h3 class="box-title"><strong>Introduction</strong></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                 
                    <p>cardSORTER is an online tool in beta stage development to simplify the research process of CARD SORTING that pretty much originates from the field of psychology. Though similar, this process is fairly different from the cardsorting process used to group and layout content for user interface research. To elaborate,</p>
                     <blockquote><small>Someone famous in  Card sorting “involves [the] sorting [of] a series of cards, each labeled with a piece of content or functionality, into groups that make sense to users or participants” (Mauer & Warfel, 2002, p.2). </small></blockquote>
                    Closed sorting is defined as “[a methodology] in which the groupings are defined by the researcher and the subject is putting object cards into the defined groups” (Deaton, 2002, p.4). Open sorting is defined as “[a methodology] in which subjects can determine their own groupings by first sorting the cards and then labeling the resulting piles” (Deaton, 2002, p.4). cardSORTER is being built to support both open and closed sorting. The method adopted here is similar to thematic analysis and data coding in qualitative research.

                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- ./col -->
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <i class="fa fa-text-width"></i>
                  <h3 class="box-title"><strong>How it Works</strong></h3>
                </div><!-- /.box-header -->
                <div class="box-body clearfix">
                  
                  <p>To participate in the cardSorting process, follow 3 simple steps                      </p>
                  
                  <ol>
                    <li><strong>Read Code Book </strong><br>
                      
                      Get familiar with the main themes/constructs and their meaning.                      </li>
                    <li><strong>Training .</strong><br>
                      Use the training tab (Code Book menu) to test your understanding of the codes with some cards.
                      Once you've achieved decent competency, you can head over to the start tab. </li>
                    <li><strong>Get Started</strong>
                      <br>
                      You may optionally login to continue later. Get started with assigning cards to different themes. </li>
                  </ol>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- ./col -->
          </div><!-- /.row -->
          
          
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <?php include("footer.php"); ?>

      <!-- Control Sidebar -->
      <?php include("controlsidebar.php"); ?><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

  </body>
</html>
