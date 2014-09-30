
@extends('base')
@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h1 class = "text-center">Povijest knjige</h1>
            @if(!isset($history))
                <br>
                <br>
                <h4 class = "text-center">Skenirajte knjigu ili ručno unesite barkod:</h4>
                <br>
                <div style="text-align:center;"><button type="button" class="btn btn-info btn-lg" id = "rucno">Ručni unos</button></div>
            @endif

            @if(isset($history))
            <br>
            <h4 class = "text-center"><strong>Naslov: </strong> {{$book->Naslov}}</h4>
            <h4 class = "text-center"><strong>Autor: </strong> {{$book->Autor}}</h4>
            <br>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Ime i prezime</th>
                        <th>Datum posudbe</th>
                        <th>Datum povratka</th>
                        <th>ID učenika</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($history as $item)
                    <tr>
                        <td>{{$item['Ime']}} {{$item['Prezime']}}</td>
                        <td>{{$item['DatumPosudbe']}}</td>
                        <td>{{$item['DatumVracanja']}}</td>
                        <td>{{$item['UserID']}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
        
    </div>
    <br>
    <br>
    <br>

 

<script>
    $(document).ready(function() {
        $("#unos").keyup(function (e)
        {
            if (e.keyCode == 13)
            {
                var content = $("#unos").val();
                $("#book").val(content.slice(1));
                $("#unos").val("");
                $("#form").submit();
            }
        });

        $("#unos").blur(function() {
          setTimeout(function() { $("#unos").focus(); }, 0);
        });

        $("#rucno").click(function() {
          //show prompt
          $("#unos").val(prompt("Unesite barkod:"));

          //trigger api events
          var e = jQuery.Event("keydown");
          e.which = 13; // # Some key code value
          $("#unos").trigger(e);
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
<br>
<br>
<br>
<br>
<form method="POST" action="/knjiga/povijest" id ="form">
<input id ="unos" name = "unos" autofocus style = "position: absolute; left: -99em;">
<input id ="book" name = "book" style = "visibility: hidden;">
</form>
@stop
