@extends('base')
@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h1 class = "text-center">{{$user['Ime']}} {{$user['Prezime']}}</h1>
            <br>
            <br>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Naslov</th>
                        <th>Autor</th>
                        <th>Datum posudbe</th>
                        <th>Datum vraćanja</th>
                        <th>ID knjige</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($borrows as $borrow)
                    <tr>
                        <td>{{$borrow['Naslov']}}</td>
                        <td>{{$borrow['Autor']}}</td>
                        <td>{{date("d.m.Y", strtotime($borrow->DatumPosudbe))}}</td>
                        <td>
                        @if(strtotime($borrow->DatumVracanja) != 0)
                        {{date("d.m.Y", strtotime($borrow->DatumVracanja))}}
                        @endif
                        </td>
                        <td>{{$borrow['BookID']}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
