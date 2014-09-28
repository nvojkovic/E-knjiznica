
@extends('base')
@section('content')
    <div class="row">
        <h1 class = "text-center">Kontakt autora</h1>
            <div class="col-md-6 col-md-offset-3">
                <br>
                @foreach ($messages as $message)
                    @if ($message['type'] == 'N')
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>Nikola: </strong> {{$message['text']}}</h3>
                            </div>
                        </div>
                    @else
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>Knjižničarka: </strong> {{$message['text']}}</h3>
                            </div>
                        </div>
                    @endif
                @endforeach
           </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form method="POST" action="/kontakt" id ="form">
                <h4>Poruka:</h4>
                <input type="text" class="form-control" name = "message"><br>
                <div style="text-align:center;"><button type="button submit" class="btn btn-success btn-lg">Pošalji</button></div>
            </form>
        </div>
    </div>
    <br>
    <br>
    <br>
    </div>



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
<br>
<br>
<br>
<br>
@stop
