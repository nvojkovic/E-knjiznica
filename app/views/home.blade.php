@extends('base')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            E-knjižnica <small>Pregled statistike</small>
        </h1>
    </div>
</div>
<div class="row">
<div class="col-lg-2 col-md-6">
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="row">
            <div class="col-xs-3">
                <i class="glyphicon glyphicon-user" style="font-size:55px;"></i>
            </div>
            <div class="col-xs-9 text-right">
                <div class="huge">{{$userCount}}</div>
                <div>aktivnih korisnika<br><br></div>
            </div>
        </div>
    </div>
</div>
</div>     
<div class="col-lg-2 col-md-6">
    <div class="panel " style="background-color:#39cccc; color:#FFFFFF;">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="glyphicon glyphicon-book" style="font-size:55px;"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge">{{$studentBookCount}}</div>
                    <div>primjeraka učeničke literature</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-2 col-md-6">
    <div class="panel panel-green">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="glyphicon glyphicon-book" style="font-size:55px;"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge">{{$teacherBookCount}}</div>
                    <div>primjeraka nastavničke literature</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-2 col-md-6">
    <div class="panel panel-yellow">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="glyphicon glyphicon-film" style="font-size:55px;"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge">124</div>
                    <div>primjeraka AV građe<br><br></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-2 col-md-6">
    <div class="panel panel-red">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-support fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge">{{$activeBorrowCount}}</div>
                    <div>aktivnih posudbi<br><br></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-2 col-md-6">
    <div class="panel"  style="background-color:#85144b; color:#FFFFFF;">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-support fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge">{{$AVCount}}</div>
                    <div>primjeraka AV građe<br><br></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Prikaz posudbi po mjesecima</h3>
            </div>
            <div class="panel-body">
                <div id="morris-area-chart"></div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function() {

    // Area Chart
    Morris.Area({
        element: 'morris-area-chart',
        data: {{$data}},
        xkey: 'day',
        ykeys: ['count'],
        labels: ['Broj posudbi'],
        pointSize: 2,
        hideHover: 'auto',
        resize: true
    });
});
</script>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
@stop