<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>{{ isset($page_title) ? $page_title.' · MiniHabr' : 'MiniHabr' }}</title>

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
{{--           <div class="input-group search">
            <input type="text" class="form-control" size="50">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">
                <span class="glyphicon glyphicon-search"></span>
              </button>
            </span>
          </div> --}}
        </div>
        {{-- Show if authorized --}}
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            @if (Auth::check())
            <li><a href="{{ route('articles.create') }}" title="Write a new article"><span class="glyphicon glyphicon-pencil glyphicon-big"></span><big class="hidden-lg hidden-md hidden-sm">&nbsp;New article</big></a></li>
            {{-- <li><a href="notifications.html" title="View notifications"><span class="glyphicon glyphicon-bell glyphicon-big"></span><span class="badge">2</span><big class="hidden-lg hidden-md hidden-sm">&nbsp;Notifications</big></a></li> --}}


            <li class="dropdown">
              <a href="#" class="dropdown-toggle navbar-avatar" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <img src="{{ Gravatar::src(Auth::user()->email, 36) }}" class="img-rounded">
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <div class="dropdown-header">
                    Signed in as
                    <strong>{{ Auth::user()->name }}</strong>
                  </div>
                </li>
                <li class="divider"></li>
                <li><a href="{{ route('users.show', Auth::user()->id) }}"><span class="glyphicon glyphicon-user"></span>My profile</a></li>
                {{--                             <li><a href="settings.html"><span class="glyphicon glyphicon-cog"></span>Settings</a></li> --}}
                <li class="divider"></li>
                <li>{!! link_to_route('logout', 'Logout') !!}</li>
              </ul>
            </li>
            @else
            <li>
              <p class="navbar-btn">
                {!! link_to_route('register', 'Register', null, ['class' => 'btn btn-success']) !!}
              </p>
            </li>
            <li>
              <p class="navbar-btn">
                {!! link_to_route('login', 'Login', null, ['class' => 'btn btn-default']) !!}
              </p>
            </li>
            @endif

          </ul>
        </div><!--/.nav-collapse -->
      </div><!--/.container-fluid -->
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      @yield('columns')

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

  {{-- Hack for sending DELETE request when clicking on links with data-method='delete' --}}
  {{-- CSRF token is also sent --}}
  <script>
    //  solution from http://stackoverflow.com/a/28420767
    (function() {

      var laravel = {
        initialize: function() {
          this.methodLinks = $('a[data-method]');

          this.registerEvents();
        },

        registerEvents: function() {
          this.methodLinks.on('click', this.handleMethod);
        },

        handleMethod: function(e) {
          var link = $(this);
          var httpMethod = link.data('method').toUpperCase();
          var form;

          // If the data-method attribute is not PUT or DELETE,
          // then we don't know what to do. Just ignore.
          if ( $.inArray(httpMethod, ['PUT', 'DELETE']) === - 1 ) {
            return;
          }

          // Allow user to optionally provide data-confirm="Are you sure?"
          if ( link.data('confirm') ) {
            if ( ! laravel.verifyConfirm(link) ) {
              return false;
            }
          }

          form = laravel.createForm(link);
          form.submit();

          e.preventDefault();
        },

        verifyConfirm: function(link) {
          return confirm(link.data('confirm'));
        },

        createForm: function(link) {
          var form =
          $('<form>', {
            'method': 'POST',
            'action': link.attr('href')
          });

          var token =
          $('<input>', {
            'type': 'hidden',
            'name': '_token',
              'value': '{{ csrf_token() }}'
            });

          var hiddenInput =
          $('<input>', {
            'name': '_method',
            'type': 'hidden',
            'value': link.data('method')
          });

          return form.append(token, hiddenInput)
                     .appendTo('body');
        }
      };

      laravel.initialize();

    })();
  </script>
</body>

</html>
