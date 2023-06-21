@extends('template2')

@section('content')

<div class="container pb-0 pt-5">
  <div class="row">
    <div class="col col-md-8">
      <a href="{{ url('menufood/add') }}"><button class="btn btn-primary d-flex justify-content-end">Tambah Data</button></a>
    </div>
    <div class="container d-flex justify-content-center pt-2">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Menu</th>
          <th scope="col">Harga Menu</th>
          <th scope="col">Foto</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($menufood as $item)
        
        <tr>
          <th>{{ $loop->iteration }}</th>
          <td>{{ $item->nama_menu}}</td>
          <td>{{ $item->harga_menu }}</td>
          <td>
            <img src="\storage\{{ $item->foto }}" alt="" width="100" height="100"></td>
          <td>
            <a href="menufood/delete/{{ $item -> id }}"><button class="btn btn-danger">HAPUS</button></a>
            <a href="menufood/edit/{{ $item -> id }}"><button class="btn btn-success">EDIT</button></a>
          </td>
        </tr>
       
        @endforeach
        
      </tbody>
    </table>
</div>
</div>
</div>
@endsection    

