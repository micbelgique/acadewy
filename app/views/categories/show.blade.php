@extends('layouts.default')

@section('content')

	<ol class="breadcrumb">
   		<li><a href="/">Home</a></li>
   		{{ $parentLiList }}
	</ol>

	<h1>Categories</h1>

	<div class="col-sm-3">
      <ul class="list-group">
      	<li class="list-group-item" style="background-color:#87c656;color:white;font-weight:bold;text-align:center">Our communities</li>
       	{{ $categoriesTreeHtml }}
      </ul>
    </div><!--/.nav-collapse -->
    
@stop