@extends('app') @section('title')
<title>cardSORTER | Training</title>
@endsection @section('contenttitle')
<h1>
	Training <small> Exercise </small>
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
	<li class="active">Here</li>
</ol>
@endsection @section('content')
<div class="box">
	<div class="box-header with-border"
		style="padding: 10px 20px 10px 20px;">
		<div class="row">
			<div class="col-md-4">
				<a class="previousbutton" style="cursor: pointer"><strong><i
						class="fa fa-angle-double-left"></i> Previous </strong> </a>
			</div>
			<div class="col-md-4 currenttitle" align="center">Card X of Y</div>
			<div class="col-md-4" align="right">
				<a class="nextbutton" style="cursor: pointer"><strong> Next <i
						class="fa fa-angle-double-right"></i>
				</strong> </a>
			</div>
		</div>

	</div>

	<div class="progress progress-xxs">
		<div id="progressstatus"
			class="progress-bar progress-bar-success progress-bar-striped"
			role="progressbar" aria-valuenow="70" aria-valuemin="0"
			aria-valuemax="100" style="width: 2%">
			<span class="sr-only">60% Complete (warning)</span>
		</div>
	</div>
	<div class="box-body cardboxholder "> </div>

</div>

<div class="row cardbox" style="display: none;">
             <?php  $i = 1 ;  ?>
 			@foreach ($train as $traindata)           
            <div class="box carditem">
		<div class="codecard" id="<?php echo $i;  ?>"
			, dbid="<?php echo $traindata->id; ?>">       
              <?php echo $traindata->description ; ?>   
             </div>
	</div>
            <?php $i++ ;?>
               @endforeach 
</div>
<!-- /.box -->

<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Select Codes that Apply</h3>
	</div>
	<div class="box-body constructbox categorybox"> 
        <?php   
            $groupname = "" ;
            $colorindex = 0 ;
            $colors = array("#3c8dbc","#00c0ef","#00a65a","#f39c12","#f56954"," #d2d6de"," #0000FF","#7F00FF"," #FF0000") ;
	    ?>
            
           @foreach ($categories as $category)
        <?php if ($groupname != $category->group ) { 
            $groupname = $category->group ;
            $colorindex =($colorindex + 1) % count($colors) ;
	    }
        ?>
				<div class="col-md-4" style="padding: 10px;">
			<div class="codeboxb" style="border-bottom:3px solid <?php echo $colors[$colorindex] ;?>;" >
				<div class="" style="height: 100%; margin: 0px;"
					align="center">
					<label class="category" data-placement="top"
						data-toggle="tooltip"
						title="<?php echo  $category-> description ; ?>"
						style="width: 100%; padding: 10px; border: 1px solid #ccc; margin: 0px;">
						<input type="checkbox"
						dbid="<?php echo  $category->id; ?>"
						name="<?php echo $category->group; ?>"> <?php echo  $category->title ; ?>
					</label>
				</div>
			</div>
		</div>       
          @endforeach 
              
              
              </div>
	<!-- /.box-body -->

</div>
<!-- /.box -->


<div class="box">
	<div class="box-header with-border"
		style="padding: 10px 20px 10px 20px;">
		<div class="row">
			<input type="hidden" name="_token" value="{{ Session::token() }}">
			<div class="col-md-4">
				<a class="previousbutton" style="cursor: pointer"><strong><i
						class="fa fa-angle-double-left"></i> Previous </strong> </a>
			</div>
			<div class="col-md-4 currenttitle" align="center">Card X of Y</div>
			<div class="col-md-4" align="right">
				<a class="nextbutton" style="cursor: pointer"><strong> Next <i
						class="fa fa-angle-double-right"></i>
				</strong> </a>
			</div>
		</div>

	</div>

</div>

<div id="response" class="loadtext">
	<i class="fa fa-fw fa-hourglass"></i> Loading saved responses from
	database ..
</div>



@endsection @section('pagescripts')
<script src="{{ asset('js/training.js') }}"></script>
@endsection
@endsection
