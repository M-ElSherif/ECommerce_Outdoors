@extends('templates.templateadmin')

@section('content')
  <h1 class="text-center">@if(isset($product))Edit @else New product @endif</h1><hr>
  <div class="col-8 m-auto">
    @if(@isset($product))
      <form name="formUpdate" id="formUpdate" method="post" enctype="multipart/form-data" action="{{url("admin/$product->id")}}">
        @method('PUT')
    @else
      <form name="formInsert" id="formInsert" method="post" enctype="multipart/form-data" action="{{url('admin')}}">
    @endif
      @csrf
      <input class="form-control" type="text" name="name" placeholder="Product: " value="{{$product->name ?? ''}}" required>
      <select class="form-control" name="id_cat" id="id_cat" required>
        <option value="{{$product->relCategory->cat_id ?? ''}}">{{$product->relCategory->name ?? 'Category'}}</option>
        @foreach ($categories as $c)
          <option value="{{$c->id}}">{{$c->name}}</option>
        @endforeach
      </select>
      <input class="form-control" type="text" name="description" placeholder="Description: " value="{{$product->description ?? ''}}" required>
      <input class="form-control" type="file" name="image" placeholder="Image Name: " value="{{$product->image ?? ''}}" required>
      <input class="form-control" type="text" name="price" placeholder="Price: " value="{{$product->price ?? ''}}" required>
      <input class="form-control" type="text" name="quantity" placeholder="Quantity: " value="{{$product->quantity ?? ''}}" required>
      <input class="btn btn-primary" type="submit" value="@if(isset($product))Update @else Insert @endif">
    </form>
  </div>
@endsection