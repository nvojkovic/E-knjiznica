@extends('base')
@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h1 class = "text-center">Pretraži učenika</h1>
            <br>
            <br>
            <br>
            <table class="table table-bordered table-hover" id = "search">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ime i prezime</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td><a href = "user/show/{{$user['UserID']}}">{{$user['Ime']}} {{$user['Prezime']}}</a></td>
                        <td>{{$user['UserID']}}</td>
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
