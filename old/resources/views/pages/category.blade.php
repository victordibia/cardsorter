@extends('app') @section('title')
<title>cardSORTER | Categories</title>
@endsection @section('contenttitle')
<h1>
	Categories <small> Definitions of constructs/categories</small>
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
	<li class="active">Here</li>
</ol>
@endsection @section('content')
<!-- Default box -->
<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Instructions</h3>
		<div class="box-tools pull-right">
			<button class="btn btn-box-tool" data-widget="collapse"
				data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i>
			</button>
			<button class="btn btn-box-tool" data-widget="remove"
				data-toggle="tooltip" title="Remove">
				<i class="fa fa-times"></i>
			</button>
		</div>
	</div>
	<div class="box-body">Each of the boxes below represent a theme. Please
		read each theme and ensure you understand it carefully . When you have
		read all themes, you may proceed to try some some card sorting.</div>
	<!-- /.box-body -->

</div>
<!-- /.box -->
 
<!-- /.box -->

<div class="row">
	<div class="col-md-12">
		<!-- Custom Tabs -->
		<div class="nav-tabs-custom ">
		<?php if($projects->count() > 0) {?>
			<ul class="nav nav-tabs">
				@foreach ($projects as $project)
				<li class=""><a href="#tab_{{ $project->id }}" data-toggle="tab">{{
						$project->title }}</a></li> @endforeach
				<li class="pull-right"><a href="#" class="text-muted"><i
						class="fa fa-gear"></i></a></li>
			</ul>
			<div class="tab-content">
				@foreach ($projects as $project)
				<div class="tab-pane" id="tab_{{ $project->id }}">
					<div class="callout callout-success">
						<p>{{ $project->description }}</p>
					</div>
					
					<div class="row constructbox" style="margin: 0px;">	
	    <?php 	    	 
					$groupname = "";
					$colorindex = 0;
					$colors = array (
							"#3c8dbc",
							"#00c0ef",
							"#00a65a",
							"#f39c12",
							"#f56954",
							" #d2d6de",
							" #0000FF",
							"#7F00FF",
							" #FF0000" 
					);
					?>
        @foreach ($categories as $category)
        <?php   if ($category->projectid == $project->id ) {
								
								if ($groupname != $category->codegroup) {
									$groupname = $category->codegroup;
									$colorindex = ($colorindex + 1) % count ( $colors );
								}
								?>
		<div class="col-md-4" style="padding: 5px;">
			<div style="border: 1px solid #ccc;">
				<div class="codeboxb"  style="border-bottom:3px solid <?php echo $colors[$colorindex] ;?>; min-height: 120px;">
					<div class="greenback">{{ $category->title }}</div>
					<div style="padding: 10px;">{{ $category->description }}</div>
				</div>
			</div>
		</div>	
		<?php };?>
		@endforeach
	
	</div>
				</div>
				<!-- /.tab-pane -->
				@endforeach

			</div>
			<!-- /.tab-content -->
		</div>
		<!-- nav-tabs-custom -->
		<?php }
		else {?>
		<div class="box">
			<div class="box-body"> No current projects.</div>
		</div>
		<?php }?>
	</div>
	<!-- /.col -->
</div>

@endsection @section('pagescripts')
<script src="{{ asset('js/category.js') }}"></script>
@endsection @endsection
