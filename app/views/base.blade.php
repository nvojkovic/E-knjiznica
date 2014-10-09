<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>E-knjižnica</title>

    <link href="{{ URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('css/sb-admin.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('css/plugins/morris.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('font-awesome-4.1.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('js/select/select2.css')}}" rel="stylesheet"/>

    <!-- jQuery Version 1.11.0 -->
    <script src="{{ URL::asset('js/jquery-1.11.0.js')}}"></script>
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">E-knjižnica</a>
            </div>
            <ul class="nav navbar-right top-nav">
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="glyphicon glyphicon-book"></i> Knjige <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li><a href="/knjiga/dodaj">Dodaj knjigu</a></li>
                            <li><a href="/knjiga/otpisi">Otpiši knjigu</a></li>
                            <li><a href="/knjiga/posudi">Posudi knjigu</a></li>
                            <li><a href="/knjiga/vrati">Vrati knjigu</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="glyphicon glyphicon-user"></i> Učenici <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo2" class="collapse">
							<li><a href="/ucenik/dodaj">Dodaj učenika</a></li>
							<li><a href="/ucenik/povecajrazrede">Povećaj razrede</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo3"><i class="glyphicon glyphicon-credit-card"></i> Naljepnice & iskaznice <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo3" class="collapse">
                            <li><a href="/naljepnice">Ispiši naljepnice</a></li>
                            <li><a href="/iskaznice">Ispiši iskaznice</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo4"><i class="glyphicon glyphicon-film"></i> AV građa <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo4" class="collapse">
                            <li><a href="/av/dodaj">Dodaj AV građu</a></li>
                            <li><a href="/av/posudi">Posudi AV građu</a></li>
                            <li><a href="/av/ispisi">Ispiši naljepnice za AV građu</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo5"><i class="glyphicon glyphicon-stats"></i> Statistika <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo5" class="collapse">
                            <li><a href="/knjiga/povijest">Povijest knjige</a></li>
                            <li><a href="/ucenik/povijest">Povijest učenika</a></li>
                            <li><a href="/knjiga/trazi">Traži knjige</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="/kontakt"><i class="glyphicon glyphicon-envelope"></i> Kontakt autora</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">
            	@yield('content')
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


    <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ URL::asset('js/select/select2.js')}}"></script>
    <!-- Morris Charts JavaScript -->
    <script src="{{ URL::asset('js/plugins/morris/raphael.min.js')}}"></script>
    <script src="{{ URL::asset('js/plugins/morris/morris.min.js')}}"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $(document).keypress(function(e) {
            //if 'p' is pressed
            if(e.which == 112 && !$("input").is(':focus')) {
                window.location.replace("/knjiga/posudi");
            }
            //if 'v' is pressed
            else if(e.which == 118 && !$("input").is(':focus')) {
                window.location.replace("/knjiga/vrati");
            }
        });
    });

    </script>
</body>

</html>
