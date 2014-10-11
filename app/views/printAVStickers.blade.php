@extends('base')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Ispiši iskaznice
        </h1>
    </div>
</div>

<div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1 class = "text-center">Odaberi učenike za ispis </h1>
            <br>
            <br>
        </div>
</div>
<div class="row">
    <div class="col-md-5 col-md-offset-3">
      	 <label class="col-sm-2 control-label">Ime i prezime</label>
      	<form action="" method="POST">
      	 <div class="form-group">
          	<select id = "unos" multiple style="width:70%;text-align:center;" name = "unos[]">
            	@foreach($av as $item)
            	<option value = {{$item->AVID}}> {{$item->Naslov}} ({{$item->AVID}})</option>
        		@endforeach
            </select>
         </div>
		  <div class="form-group">
		    <label class="col-sm-2 control-label">Početno mjesto na papiru</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name = "place" value = "1">
		    </div>
		  </div>
            <br><br><br><br>
            <button type="submit" class="btn btn-success btn-lg">Ispiši</button>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
    	$("#unos").select2();
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
