@extends('layouts.app')
@section('content')
<div class="container">
<button class="btn btn-success m-3"><a href="/product/create" class="text-reset text-decoration-none">Add Product</a></button>

<table class="table table-success table-hover">
    <tr>
      <th>Nama</th>
      <th>Harga</th>
      <th>Stock</th>
      <th>Action</th>
    </tr>
    @foreach ($product as $p)
    <tr>
      <td>{{$p->nama}}</td>
      <td>{{$p->harga}}</td>
      <td><span class="badge bg-success">{{$p->stock}}</span></td>
      <td>
          <div class="btn-group" role="group">
            <a class="btn btn-warning text-rest text-decoration-none" href="/product/{{$p->id}}/edit">Edit</a>
            <form action="/product/{{$p->id}}" method="POST">
            @csrf
            @method('delete')
            <input class="btn btn-danger" type="submit" value="Delete">
            </form>
          </div>
      </td>
    </tr>
    @endforeach
</table>

</div>
@endsection