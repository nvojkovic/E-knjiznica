@extends('base')
@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h1 class = "text-center">Traži knjige po godini kupnje</h1>
            @if(!isset($books))
                <br>
                <br>
                <form class="form-horizontal" role="form" action = "/knjiga/godina" method = "POST">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Odaberi godinu:</label>
                    <div class="col-sm-10">
                      <select class="form-control" id = "godina" name = "godina">
                        <option value="2013">2013.</option>
                        <option value="2014">2014.</option>
                        <option value="2015">2015.</option>
                        <option value="2016">2016.</option>
                        <option value="2017">2017.</option>
                        <option value="2018">2018.</option>
                        <option value="2019">2019.</option>
                        <option value="2020">2020.</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Tip nabave:</label>
                    <div class="col-sm-10">
                      <select class="form-control" id = "tip" name = "tip">
                        @foreach($types as $type)
                        <option value="{{$type['Nabava']}}">{{$type['Nabava']}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group" class="text-align">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success btn-lg">Prikaži</button>
                    </div>
                  </div>
                </form>
            @endif

            @if(isset($books))
            <br>
            <br>
            <center><h4><strong>Broj primjeraka: </strong> {{count($books)}}</h4></center>
            <br>
            <table class="table table-bordered table-hover" id = "search">
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
                        @if(isset($book->DatumPosudbe))
                            {{$book['Ime']}} {{$book['Prezime']}}
                        @else
                            Nije posuđena
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
