@extends('base')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Dodaj učenika
        </h1>
    </div>
</div>
@if(isset($message))
<div class="alert alert-success">
    <strong>{{$message}}</strong>
    </div>
@endif

<div class="col-md-6">
<form class="form-horizontal" role="form" action = "/ucenik/dodaj" method = "POST">
  <div class="form-group">
    <label class="col-sm-2 control-label">Ime</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name = "Ime">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Prezime</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name = "Prezime">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Razred</label>
    <div class="col-sm-10">
      <select class="form-control" name = "Razred">
        @foreach ($grades as $grade)
            <option value = "{{$grade->ID}}">{{$grade->Broj}}. {{$grade->Slovo}}</option>
        @endforeach
      </select>
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