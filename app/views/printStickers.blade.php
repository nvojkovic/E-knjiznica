@extends('base')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Ispiši naljepnice
        </h1>
    </div>
</div>

<div class="row">
    <div class="col-md-5 col-md-offset-3">
         
        <form action="" method="POST" class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-sm-2 control-label">ID-ovi knjiga za printanje</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id = "naslov" name = "IDs">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Mjesto početka printanja</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id = "naslov" name = "offset">
            </div>
          </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success btn-lg">Ispiši</button>
            </div>

        </form>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Naslov</th>
                    <th>Autor</th>
                    <th>ID</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $item)
                <tr>
                    <td>{{$item['Naslov']}}</td>
                    <td>{{$item['Autor']}}</td>
                    <td>{{$item['BookID']}}</td>
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