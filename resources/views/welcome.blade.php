<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <nav class="nav nav-pills nav-justified" style="margin: 20px">
                        <a class="nav-link active" aria-current="page" href="/">Perulangan</a>
                        <a class="nav-link" href="{{ route('api.rajaongkir') }}">API Raja Ongkir</a>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card" >
                        <div class="card-body">
                            @if(session('sukses'))
                            <div class="alert alert-success" role="alert">
                                {{ session('sukses') }}
                            </div>
                            @endif
                            @if(session('gagal'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('gagal') }}
                            </div>
                            @endif
                            <form action="{{route('proses.data')}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="nilai" class="form-label">Input Bilangan</label>
                                    <input type="number" class="form-control" id="nilai" name="nilai" aria-describedby="emailHelp" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card" style="margin-top: 50px;">
                        <div class="card-body">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('delete.hasil') }}" class="btn btn-primary me-md-2" type="button">Delete Hasil</a>

                            </div>
                            <div class="card-title">Hasil :
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nilai</th>
                                        <th scope="col">Output</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $key => $row)
                                        <tr>
                                            <th scope="row">{{++$key}}</th>
                                            <td>{{$row->nilai}}</td>
                                            <td>{{$row->output}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
  </body>
</html>
