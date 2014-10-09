
@extends('base')
@section('content')
@if(isset($user) && isset($book))
<div class="alert alert-success">
    <h4>Korisnik <strong>{{$user}}</strong> je posudio/la <strong>{{$book}}</strong></h4>
    </div>
@endif
    <div class="row">
        <div class="col-md-4 col-md-offset-2">
            <h1 class = "text-center">Učenik</h1>
            <br>
            <br>
            <div class="form-horizontal">
              <div class="form-group">
                <label class="col-sm-2 control-label">Ime</label>
                <div class="col-sm-5">
                  <input disabled type="text" class="form-control input-lg" id = "ime">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Prezime</label>
                <div class="col-sm-5">
                  <input disabled type="text" class="form-control input-lg" id = "prezime">
                </div>
              </div>
            </div>
        </div>
        <div class="col-md-4">
            <h1 class = "text-center">Knjiga</h1>
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
        </div>
        
    </div>
    <br>
    <br>
    <br>
<div style="text-align:center;">
<button type="button" class="btn btn-info btn-lg" id = "rucno">Ručni unos</button></div>
 

<script>
    $(document).ready(function() {
        $("#unos").keyup(function (e)
        {
            if (e.keyCode == 13)
            {
                var content = $("#unos").val();
                if(content[0] == 'U')
                {
                    $.ajax( "/api/korisnik/" + content.slice(1))
                        .done(function(data) {
                            $("#ime").val(data.Ime);
                            $("#prezime").val(data.Prezime);
                            $("#user").val(data.UserID);

                            if($("#book").val() != "" && $("#user").val() != "")
                            {
                                $("#form").submit();
                            }
                        });

                }
                else if (content[0] == 'K')
                {
                    $.ajax( "/api/knjiga/" + content.slice(1))
                        .done(function(data) {
                            $("#naslov").val(data.Naslov);
                            $("#autor").val(data.Autor);
                            $("#book").val(data.BookID);

                            if($("#book").val() != "" && $("#user").val() != "")
                            {
                                $("#form").submit();
                            }
                        });
                }
                $("#unos").val("");
            }

        });
        $("#submit").click(function() {
          $("#form").submit();
        });

        $("#unos").blur(function() {
          setTimeout(function() { $("#unos").focus(); }, 0);
        });

        $("#rucno").click(function() {
          //show prompt
          $("#unos").val(prompt("Unesite barkod:"));

          //trigger api events
          var e = jQuery.Event("keyup");
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
<form method="POST" action="/knjiga/posudi" id ="form">
<input id ="unos" name = "unos" autofocus style = "position: absolute; left: -99em;">
<input id ="user" name = "user" style = "visibility: hidden;">
<input id ="book" name = "book" style = "visibility: hidden;">
</form>
@stop
