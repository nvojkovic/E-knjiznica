@extends('base')
@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h1 class = "text-center">Aktivne posudbe</h1>
            @if(!isset($books))
                <br>
                <br>
                <form class="form-horizontal" role="form" action = "/knjiga/trazi" method = "POST">
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
                  <div class="form-group" class="text-align">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success btn-lg">Traži</button>
                    </div>
                  </div>
                </form>
            @endif

            @if(isset($books))
            <br>
            <br>
            <center><h4><strong>Broj trenutno posuđenih knjiga: </strong> {{count($books)}}</h4></center>
            <br>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Naslov</th>
                        <th>Autor</th>
                        <th>Učenik</th>
                        <th>Datum posudbe</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                    <tr>
                        <td>{{$book['Naslov']}}</td>
                        <td>{{$book['Autor']}}</td>
                        <td>
                        @if(isset($book->DatumPosudbe))
                            {{$book['Ime']}} {{$book['Prezime']}}
                        @else
                            Nije posuđena
                        @endif
                        </td>
                        <td>{{date('d.m.Y', strtotime($book['DatumPosudbe']))}}</td>
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
