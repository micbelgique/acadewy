<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Acadewy - Let's learn together</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          {{ link_to_route('home', 'Acadewy', null, ['class' => 'navbar-brand']) }}
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li>{{ link_to('/about', 'About') }}</a></li>
          @if(Auth::guest())
            <li>{{ link_to_route('register', 'Register') }}</li>
            <li>{{ link_to_route('login', 'Log in') }}</li>
          @else
            <li>{{ link_to_route('profile.show', 'My profile', array('username' => Auth::user()->username)) }}</li>
            <li><a href="/logout">Logout</a></li>
          @endif
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">
      @yield('content')
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <!-- Affix -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/js/affix.js"></script>
  </body>
</html>