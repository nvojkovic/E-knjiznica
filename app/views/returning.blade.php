
@extends('base')
@section('content')
@if(isset($user) && isset($book))
<div class="alert alert-success">
    <h4>Korisnik <strong>{{$user}}</strong> je vratio/la <strong>{{$book}}</strong></h4>
    </div>
@endif
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h1 class = "text-center">Vrati knjigu</h1>
            <br>
            <br>
            <div class="form-horizontal">
              <div class="form-group">
                <label class="col-sm-2 control-label">Naslov</label>
                <div class="col-sm-9">
                  <input disabled type="text" class="form-control input-lg" id = "naslov">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Autor</label>
                <div class="col-sm-9">
                  <input disabled type="text" class="form-control input-lg" id = "autor">
                </div>
              </div>
            </div>
            <br>
            <div style="text-align:center;"><button type="button" class="btn btn-info btn-lg" id = "rucno">Ručni unos</button></div>
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
                if (content[0] == 'K')
                {
                    $.ajax( "/api/knjiga/" + content.slice(1))
                        .done(function(data) {
                             $("#naslov").val(data.Naslov);
                             $("#autor").val(data.Autor);
                             $("#book").val(data.ID);
                             $("#form").submit();
                        });
                }
                $("#unos").val("");
                
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
<form method="POST" action="/knjiga/vrati" id ="form">
<input id ="unos" name = "unos" autofocus style = "position: absolute; left: -99em;">
<input id ="book" name = "book" style = "visibility: hidden;">
</form>
@stop
