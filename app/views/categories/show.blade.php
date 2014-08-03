@extends('layouts.default')

@section('content')

	<h1>Categories</h1>

      <ul class="list-group">
      	<li class="list-group-item" style="background-color:#87c656;color:white;font-weight:bold;text-align:center">Our communities</li>
       	{{ $categoriesTreeHtml }}
      </ul>
    
@stop