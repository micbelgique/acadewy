@extends('layouts.default')

@section('content')
      
        <ol class="breadcrumb">
          <li class="active"><a href="/">Home</a></li>
        </ol>

        {{ Auth::check()
        	? '<h1>Welcome <strong>' . Auth::user()->username . '</strong>!</h1>'
        		: '<h1>Welcome, visitor!</h1>'}}
        <br/>
        <h3>Acadewy is a great platform to start learning together... at the same rythm!</h3>
        <br/>

        <div class="panel panel-default">
          <div class="panel-heading">
            <h3>Latest resources <small>({{ link_to_route('resources.index', 'View all') }})</small></h3>
          </div>
          <div class="panel-body">
            <ul>
              @foreach ($resources as $resource)
                 <li>
                  {{ link_to_action('ResourcesController@show',
                    $resource->title, $parameters = array('id' => $resource->id), $attributes = array()); }}
               </li>
            @endforeach
            </ul>
          </div>
        </div>
    </div>

    <div class="col-sm-3">
      <ul class="list-group">
            <li class="list-group-item" style="background-color:#87c656;color:white;font-weight:bold;text-align:center">Our communities</li>
          @foreach($mainCategories as $categorie)
            <li class="list-group-item">
              {{ link_to_action('CategoriesController@show', $categorie->name, $parameters = array('id' => $categorie->id), $attributes = array()); }}</li>
          @endforeach<!-- <li><a href="#">Reviews <span class="badge">1,118</span></a></li> -->
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </div>
</div>

@stop