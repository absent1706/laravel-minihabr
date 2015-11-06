<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Blog Home - Start Bootstrap Template</title>

  <!-- Bootstrap Core CSS -->
  <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="{{ URL::asset('css/main.css') }}"  rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

      </head>

      <body>

       <!-- Static navbar -->
       <nav class="navbar navbar-default">
        <div class="container">
          <div class="col-md-offset-1">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

              <a class="navbar-brand" href="{{ route('home') }}">MiniHabr</a>
              <div class="input-group search">
                <input type="text" class="form-control" size="50">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="button">
                    <span class="glyphicon glyphicon-search"></span>
                  </button>
                </span>
              </div>
            </div>
            <div id="navbar" class="navbar-collapse collapse">

                {{-- Show if authorized --}}
{{--              <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('articles.create') }}" title="Write a new article"><span class="glyphicon glyphicon-pencil glyphicon-big"></span><big class="hidden-lg hidden-md hidden-sm">&nbsp;New article</big></a></li>
                <li><a href="notifications.html" title="View notifications"><span class="glyphicon glyphicon-bell glyphicon-big"></span><span class="badge">2</span><big class="hidden-lg hidden-md hidden-sm">&nbsp;Notifications</big></a></li>


                 <li class="dropdown">
                  <a href="#" class="dropdown-toggle navbar-avatar" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <img src="http://lorempixel.com/36/36/people/1/" class="img-rounded">
                    <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a href="user-1.html">My profile</a></li>
                    <li><a href="settings.html"><span class="glyphicon glyphicon-cog"></span>Settings</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="/session/destroy">Log out</a></li>
                  </ul>
                </li>
              </ul>--}}
            </div><!--/.nav-collapse -->
          </div><!--/.container-fluid -->
        </div>
      </nav>

      <!-- Page Content -->
      <div class="container">

        <div class="row">

          <!-- Blog Entries Column -->
          <div class="col-md-8 col-md-offset-1">

            @yield('content')

          </div>

          <!-- Blog Sidebar Widgets Column -->
          <div class="col-md-3">
            @include('categories.index')
          </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
          <div class="row">
            <div class="col-lg-12">
              <p>Copyright &copy; Your Website 2014</p>
            </div>
            <!-- /.col-lg-12 -->
          </div>
          <!-- /.row -->
        </footer>

      </div>
      <!-- /.container -->

      <!-- jQuery -->
      <script src="{{ URL::asset('js/jquery.js') }}"></script>

      <!-- Bootstrap Core JavaScript -->
      <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

    </body>

    </html>
