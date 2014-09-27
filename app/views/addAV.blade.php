@extends('base')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Dodaj AV građu
        </h1>
    </div>
</div>
@if(isset($message))
<div class="alert alert-success">
    <strong>{{$message}}</strong>
    </div>
@endif

<div class="col-md-6">
  <form class="form-horizontal" role="form" action = "/av/dodaj" method = "POST">
    <div class="form-group">
      <label class="col-sm-2 control-label">Naslov</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name = "Naslov">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Autor</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name = "Autor">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Izdavač</label>
      <div class="col-sm-10">
      <textarea class="form-control" rows="3" name = "Izdavac"></textarea>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Napomena</label>
      <div class="col-sm-10">
      <textarea class="form-control" rows="3" name = "Napomena"></textarea>
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