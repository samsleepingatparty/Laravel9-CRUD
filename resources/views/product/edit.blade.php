@extends('layouts.app')

@section('content')
<div class="container">  
<h1>Create Product</h1>
<form action="/product/{{$product->id}}" method="POST">
    @method('put')
    @csrf
    <div class="mb-3">
      <label for="Nama" class="form-label"></label>
      <input type="text" name="nama" placeholder="Nama" value="{{$product->nama}}">
    </div>

    <div class="mb-3">
      <label for="Harga" class="form-label"></label>
      <input type="text" name="harga" placeholder="Harga" value="{{$product->harga}}">
    </div>
    
    <select class="form-select" name="stock">
      <option value="">---</option>
      <option value="Ready" @if($product->stock=="Ready") selected @endif>Ready</option>
      <option value="No" @if($product->stock=="No") selected @endif>Not Ready</option>
    </select>
    <br>
    <br>  

    <button type="submit" name="submit" value="Update" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection