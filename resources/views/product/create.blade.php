@extends('layouts.app')

@section('content')
<div class="container">  
<h1>Create Product</h1>
<form action="/product/store" method="POST">
    @csrf
    <div class="mb-3">
      <label for="Nama" class="form-label"></label>
      <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Nama Produk">
    </div>

    <div class="mb-3">
      <label for="Harga" class="form-label"></label>
      <input type="text" name="harga" class="form-control" id="exampleInputEmail1" placeholder="Harga">
    </div>

    <select class="form-select" name="stock">
      <option value="">---</option>
      <option value="Ready">Ready</option>
      <option value="Not">Not Ready</option>
    </select>

    <br>  

    <button type="submit" name="submit" value="Save" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection