@extends('base')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Dodaj knjigu
        </h1>
    </div>
</div>
@if(isset($message))
<div class="alert alert-success">
    <strong>{{$message}}</strong>
    </div>
@endif

<div class="col-md-6">
<form class="form-horizontal" role="form" action = "/knjiga/dodaj" method = "POST">
  <div class="form-group">
    <label class="col-sm-2 control-label">Naslov</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id = "naslov" name = "Naslov">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Autor</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name = "Autor">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Impresum</label>
    <div class="col-sm-10">
    <textarea class="form-control" rows="3" name = "Impresum"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Materijalni opis</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name = "Materijalni">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Nakl. cjelina</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name = "NakladnaCjelina">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Napomena</label>
    <div class="col-sm-10">
    <textarea class="form-control" rows="3" name = "Napomena"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Naklada</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name = "Naklada">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">ISBN</label>
    <div class="col-sm-10">
    <textarea class="form-control" rows="3" name = "ISBN"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Signatura</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name = "Signatura">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">CIP</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name = "CIP">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Naklada</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name = "Naklada">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Izdanje</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name = "Izdanje">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Broj primjeraka</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value = "1" name = "Primjerci">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-success">Dodaj</button>
      <button type="submit" class="btn btn-danger">Odustani</button>
    </div>
  </div>
</form>
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
    <br>
    <br>
    <br>
    <br>
    <br>
@stop