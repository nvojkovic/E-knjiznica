
@extends('base')
@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h1 class = "text-center">Povijest učenika</h1>
            @if(!isset($history))
                <br>
                <br>
                <h4 class = "text-center">Skenirajte iskaznicu ili ručno unesite barkod:</h4>
                <br>
                <div style="text-align:center;"><button type="button" class="btn btn-info btn-lg" id = "rucno">Ručni unos</button></div>
            @endif

            @if(isset($history))
            <br>
            <h4 class = "text-center"><strong>Ime i prezime: </strong>{{$user->Ime}} {{$user->Prezime}}</h4>
            @if(isset($grade->Broj))
            <h4 class = "text-center"><strong>Razred: </strong>{{$grade->Broj}}. {{$grade->Slovo}}</h4>
            @endif
            <br>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Naslov knjige</th>
                        <th>Autor</th>
                        <th>Datum posudbe</th>
                        <th>Datum povratka</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($history as $item)
                    <tr>
                        <td>{{$item['Naslov']}}</td>
                        <td>{{$item['Autor']}}</td>
                        <td>{{$item['DatumPosudbe']}}</td>
                        <td>{{$item['DatumVracanja']}}</td>
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
                $("#user").val(content.slice(1));
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
@if(!isset($history))
<form method="POST" action="/ucenik/povijest" id ="form">
<input id ="unos" name = "unos" autofocus style = "position: absolute; left: -99em;">
<input id ="user" name = "user" style = "visibility: hidden;">
@endif
</form>
@stop
