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
                        <a class="nav-link" aria-current="page" href="/">Perulangan</a>
                        <a class="nav-link active" href="{{ route('api.rajaongkir') }}">API Raja Ongkir</a>

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
                            <form action="{{route('api.rajaongkir')}}" method="get">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Anda</label>
                                    <input type="text" class="form-control" id="nama" name="nama" aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Kirim Ke</label>
                                    <select class="form-select" aria-label="Default select example" name="province">
                                        <option value="" holder>Pilih Provinsi</option>
                                        @foreach ($province as $rowprovince)
                                        <option value="{{ $rowprovince->id }}">{{ $rowprovince->province }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <select class="form-select" aria-label="Default select example" id="destination"name="destination">
                                        <option value="" holder>Pilih Kota</option>

                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="weight" class="form-label">Berat Paket</label>
                                            <input type="number" class="form-control" id="weight" name="weight" aria-describedby="emailHelp" required>
                                            <small>Dalam gram contoh = 1700 /1,7 KG</small>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="courier" class="form-label">Pilih Kurir</label>
                                            <select class="form-select" aria-label="Default select example" id="courier"name="courier">
                                                <option value="" holder>Pilih Kurir</option>
                                                <option value="jne">JNE</option>
                                                <option value="tiki">TIKI</option>
                                                <option value="pos">POS Indonesia</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary btn-block">Hitung Ongkir</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card" style="margin-top: 50px;">
                        <div class="card-body">

                            <div class="card-title">Nama Pengirim : {{ $nama }}
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Service</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Estimasi</th>
                                        <th scope="col">Note</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if ($data)
                                            @foreach($data as $key => $row)
                                            <tr>
                                                <td>{{ $row['service'] }}</td>
                                                <td>{{ $row['description'] }}</td>
                                                <td>{{ $row['cost'][0]['value'] }}</td>
                                                <td>{{ $row['cost'][0]['etd'] }}</td>
                                                <td>{{ $row['cost'][0]['note'] }}</td>
                                            </tr>
                                            @endforeach
                                        @endif

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
    <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('select[name="province"]').on('change',function(){
                var cityId=$(this).val();
                if(cityId){
                    $.ajax({
                        type: "GET",
                        url: "getCity/ajax/"+cityId,
                        dataType: "json",
                        success: function (response) {
                            $('select[name="destination"]').empty();
                            $.each(response, function (key, value) {
                                $('select[name="destination"]').append(
                                    '<option value="'+key+'">'+value+'</option>'
                                );
                            });
                        }
                    });
                }else{
                    $('select[name="destination"]').empty();
                }
                // console.log(cityId);
            });
        });
    </script>
  </body>
</html>
