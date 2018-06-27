<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Rievocandum</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{ URL::asset('sufee/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('sufee/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('sufee/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('sufee/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('sufee/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('sufee/css/cs-skin-elastic.css') }}">
    <!-- <link rel="stylesheet" href="{{ URL::asset('sufee/css/bootstrap-select.less') }}"> -->
    <link rel="stylesheet" href="{{ URL::asset('sufee/scss/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('sufee/css/lib/vector-map/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/hawcons.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>


        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{ env('APP_URL') }}">{{ env('APP_NAME') }}</a>
                <a class="navbar-brand hidden" href="{{ env('APP_URL') }}">R</a>
            </div>
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ env('APP_URL') }}"> <i class="menu-icon ti-home"></i>Home</a>
                    </li>

                    <!-- /.menu-title -->
                    <h3 class="menu-title">{{ Auth::user()->name }}</h3>
                    <li>
                        <a href="#"><i class="menu-icon ti-user"></i>Profilo</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="menu-icon ti-power-off"></i>Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>

                    <!-- /.menu-title -->
                    <h3 class="menu-title">Appunti</h3>
                    <li>
                        <a href="#"><i class="menu-icon hawcons icon-document-add"></i>Scrivi appunti</a>
                    </li>
                    <li>
                        <a href="#"><i class="menu-icon hawcons icon-document-list"></i>Lista appunti</a>
                    </li>
                    <!--
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Esplora appunti</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="forms-basic.html">Per categoria</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="forms-advanced.html">Per visualizzazioni</a></li>
                        </ul>
                    </li>
                    -->
                    <li>
                        <a href="#"><i class="menu-icon hawcons icon-document-search"></i>Esplora appunti</a>
                    </li>

                    <!-- /.menu-title -->
                    <h3 class="menu-title">Flashcard</h3>
                    <li>
                        <a href="#"><i class="menu-icon hawcons icon-note-add"></i>Crea flashcard</a>
                    </li>
                    <li>
                        <a href="#"><i class="menu-icon hawcons icon-note-list"></i>Lista flashcard</a>
                    </li>
                    <!--
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Esplora flashcard</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="forms-basic.html">Per categoria</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="forms-advanced.html">Per visualizzazioni</a></li>
                        </ul>
                    </li>
                    -->
                    <li>
                        <a href="#"><i class="menu-icon hawcons icon-note-search"></i>Esplora flashcard</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7" style="display:flex;align-items:center;flex-wrap:wrap;">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <span><b>Rievocandum</b></span>
                </div>
                <div class="col-sm-5">
                    <div class="user-area dropdown float-right" class="vertical-align:middle;">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{ URL::asset('img/user_icon.png') }}" alt="User Avatar">
                        </a>
                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#">Profilo</a>
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
                        </div>
                    </div>
                </div>
            </div>

        </header><!-- /header -->

        <main>
            @yield ('content')
        </main>
    <!-- Right Panel -->

    <script src="{{ URL::asset('sufee/js/vendor/jquery-2.1.4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="{{ URL::asset('sufee/js/plugins.js') }}"></script>
    <script src="{{ URL::asset('sufee/js/main.js') }}"></script>
    <script src="{{ URL::asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script src="{{ URL::asset('vendor/unisharp/ckfinder/ckfinder.js') }}"></script>

    <!-- <script src="{{ URL::asset('sufee/js/lib/chart-js/Chart.bundle.js') }}"></script> -->
    <script src="{{ URL::asset('sufee/js/dashboard.js') }}"></script>
    <!-- <script src="{{ URL::asset('sufee/js/widgets.js') }}"></script> -->
    <script src="{{ URL::asset('sufee/js/lib/vector-map/jquery.vmap.js') }}"></script>
    <script src="{{ URL::asset('sufee/js/lib/vector-map/jquery.vmap.min.js') }}"></script>
    <script src="{{ URL::asset('sufee/js/lib/vector-map/jquery.vmap.sampledata.js') }}"></script>
    <script src="{{ URL::asset('sufee/js/lib/vector-map/country/jquery.vmap.world.js') }}"></script>
    <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script>

    <!-- <script>
        var editor = CKEDITOR.replace('editor');
        CKFinder.setupCKEditor( editor );

        CKEDITOR.instances.editor.on( 'save', function() {    
        alert("Hai salvato");
        });
    </script> -->

</body>
</html>
