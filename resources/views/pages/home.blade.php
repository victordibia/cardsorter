@extends('app') @section('title')
<title>cardSORTER | Welcome</title>
@endsection @section('contenttitle')
<h1>
	cardSORTER <small>Optional description</small>
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
	<li class="active">Here</li>
</ol>
@endsection @section('content')
<!-- Default box -->
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert"
		aria-hidden="true">&times;</button>
	<h4>
		<i class="icon fa fa-check"></i> Hi There!
	</h4>
	cardSORTER is still in Beta - There may be some bugs. Please report
	them to me at victor[dot]dibia[at]gmail.com.
</div>

<div class="row">
	<div class="col-md-12">
		<div class="box  ">
			<div class="box-header with-border">
				<i class="fa fa-text-width"></i>
				<h3 class="box-title">
					<strong>Introduction</strong>
				</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">

				<p>cardSORTER is an online tool in beta stage development to
					simplify the research process of CARD SORTING that pretty much
					originates from the field of psychology. Though similar, this
					process is fairly different from the cardsorting process used to
					group and layout content for user interface research. To elaborate,</p>
				<blockquote>
					<small>Someone famous in Card sorting "involves [the] sorting [of]
						a series of cards, each labeled with a piece of content or
						functionality, into groups that make sense to users or
						participants" (Mauer & Warfel, 2002, p.2). </small>
				</blockquote>
				Closed sorting is defined as "[a methodology] in which the groupings
				are defined by the researcher and the subject is putting object
				cards into the defined groups" (Deaton, 2002, p.4). Open sorting is
				defined as "[a methodology] in which subjects can determine their
				own groupings by first sorting the cards and then labeling the
				resulting piles" (Deaton, 2002, p.4). cardSORTER is being built to
				support both open and closed sorting. The method adopted here is
				similar to thematic analysis and data coding in qualitative
				research.


			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>
	<!-- ./col -->
	<div class="col-md-12">
		<div class="box">
			<div class="box-header with-border">
				<i class="fa fa-text-width"></i>
				<h3 class="box-title">
					<strong>How it Works</strong>
				</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body clearfix">

				<p>To participate in the cardSorting process, follow 3 simple steps
				</p>

				<ol>
					<li><strong>Read Code Book </strong><br> Get familiar with the main
						themes/constructs and their meaning.</li>
					<li><strong>Training .</strong><br> Use the training tab (Code Book
						menu) to test your understanding of the codes with some cards.
						Once you've achieved decent competency, you can head over to the
						start tab.</li>
					<li><strong>Get Started</strong> <br> You may optionally login to
						continue later. Get started with assigning cards to different
						themes.</li>
				</ol>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>
	<!-- ./col -->
</div>
<!-- /.row -->

@endsection
