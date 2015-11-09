
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>cardSORTER | Welcome</title>
<!-- Tell the browser to be responsive to screen width -->
<meta
	content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
	name="viewport">
<!-- Bootstrap 3.3.5 -->
<link rel="stylesheet"
	href="{{ asset('/bootstrap/css/bootstrap.min.css') }}">
<!-- Font Awesome -->
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet"
	href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('/css/AdminLTE.min.css') }} ">
<link rel="stylesheet" href="{{ asset('/css/card.css') }} ">
<!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
<link rel="stylesheet"
	href="{{ asset('/css/skins/skin-green.min.css') }} ">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-green layout-top-nav">
	<div class="wrapper">

		<header class="main-header">
			<nav class="navbar navbar-static-top">
				<div class="container">
					<div class="navbar-header">
						<a href="{{ url('/') }}" class="navbar-brand"><b>card</b>SORTER</a>
						<button type="button" class="navbar-toggle collapsed"
							data-toggle="collapse" data-target="#navbar-collapse">
							<i class="fa fa-bars"></i>
						</button>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse pull-left"
						id="navbar-collapse">
						<ul class="nav navbar-nav">
							<li class="active"><a href="{{ url('/demo') }}"> <i class="fa fa-flask"></i>  Demo <span
									class="sr-only">(current)</span></a></li>
							<li><a href="http://github.com/chuvidi2003/cardsorter/" target="_blank"> <i class="fa fa-github"></i> Github</a></li>

						</ul>

					</div>
					<!-- /.navbar-collapse -->
					<!-- Navbar Right Menu -->
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							<!-- Messages: style can be found in dropdown.less-->
							
							<!-- /.messages-menu -->

							<!-- Notifications Menu -->


							<!-- User Account Menu -->

						</ul>
					</div>
					<!-- /.navbar-custom-menu -->
				</div>
				<!-- /.container-fluid -->
			</nav>
		</header>
		<!-- Full Width Column -->
		<div class="content-wrapper">
			<div class="container">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h1>
						 
					<br/>
					</h1>

				</section>

				<!-- Main content -->
				<section class="content">
					 

					<div class="row">


						<div class="col-md-12">
							<div class="box box-solid">
								 
								<!-- /.box-header -->
								<div class="box-body">
									<div id="carousel-example-generic" class="carousel slide"
										data-ride="carousel">
										<ol class="carousel-indicators">
											<li data-target="#carousel-example-generic" data-slide-to="0"
												class="active"></li>
											<li data-target="#carousel-example-generic" data-slide-to="1"
												class=""></li>
											<li data-target="#carousel-example-generic" data-slide-to="2"
												class=""></li>
										</ol>
										<div class="carousel-inner">
											<div class="item active">
												<div class="greencarousel">
													<div class="carouseltext" style="padding-top: 140px;">Hi There!</div>
													<div class="carouseltext">I'm Creating Something Sciency</div>
													<div class="carouseltext" style="padding-top: 0px;"> <i class="fa fa-flask"></i> </div>
												</div>
												<div class="carousel-caption"></div>
											</div>
											<div class="item ">
												<div class="greencarousel">
													<div class="carouseltext" style="padding-top: 150px;">Its a
														tool ..</div>
													<div class="carouseltext">For Social Science Research!</div>
												</div>
												<div class="carousel-caption"></div>
											</div>
											<div class="item">
												<div class="greencarousel">
													<div class="carouseltext" style="padding-top: 150px;">Its!
													</div>
													<div class="carouseltext">cardSORTER!</div>
												</div>
												<div class="carousel-caption"></div>
											</div>
										</div>
										<a class="left carousel-control"
											href="#carousel-example-generic" data-slide="prev"> <span
											class="fa fa-angle-left"></span>
										</a> <a class="right carousel-control"
											href="#carousel-example-generic" data-slide="next"> <span
											class="fa fa-angle-right"></span>
										</a>
									</div>
								</div>
								<!-- /.box-body -->
							</div>
							<!-- /.box -->
						</div>
						<!-- /.col -->
					</div>



				</section>
				<!-- /.content -->
			</div>
			<!-- /.container -->
		</div>
		<!-- /.content-wrapper -->
		 
	</div>
	<!-- ./wrapper -->

	<!-- jQuery 2.1.4 -->
	<!-- jQuery 2.1.4 -->
	<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<!-- Bootstrap 3.3.5 -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<!-- AdminLTE App -->
	<script src="js/app.min.js"></script>
	<script src="js/sidebar.js"></script>
	<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="plugins/fastclick/fastclick.min.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/app.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js"></script>
</body>
</html>
