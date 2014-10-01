@extends('base')
@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h1 class = "text-center">Traži knjigu</h1>
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
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Naslov</th>
                        <th>Autor</th>
                        <th>Posuđena?</th>
                        <th>ID knjige</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                    <tr>
                        <td>{{$book['Naslov']}}</td>
                        <td>{{$book['Autor']}}</td>
                        <td>
                        @if(isset($book->borrow->DatumPosudbe))
                            Da
                        @else
                            Ne
                        @endif
                        </td>
                        <td>{{$book['BookID']}}</td>
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
