@extends('template2')

@section('content')
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/sb-admin-2.min.css') }}"> 
  </head>
  <body> 
    <div class="container mt-5">
        <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
            <label for="" class="form-label">Nama Menu</label>
            <input type="text" class="form-control" name="nama_menu" id="nama_menu" value="{{ $menufood->nama_menu}}" >  
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Harga Menu</label>
            <input type="text" class="form-control" name="harga_menu" id="harga_menu"  value="{{ $menufood->harga_menu }}">
          </div>
  
          <div class="mb-3">
            <label for="" class="form-label">Foto</label>
            <input type="file" class="form-control" name="foto" id="foto" >
          </div>
  
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
  {{-- </body>
  </html> --}}
@endsection
