@extends('templates.templateadmin')

@section('content')
  <h1 class="text-center">@if(isset($category))Edit @else New category @endif</h1><hr>
  <div class="col-8 m-auto pb-4">
    @if(@isset($category))
      <form name="formUpdate" id="formUpdate" method="post" action="{{url("adminCategories/$category->id")}}">
        @method('PUT')
    @else
      <form name="formInsert" id="formInsert" method="post" action="{{url('adminCategories')}}">
    @endif
      @csrf
      <input class="form-control" type="text" name="name" placeholder="Category: " value="{{$category->name ?? ''}}" required>
      <input class="form-control" type="text" name="description" placeholder="Description: " value="{{$category->description ?? ''}}" required>
      <input class="btn btn-primary" type="submit" value="@if(isset($category))Update @else Insert @endif">
    </form>
  </div>
@endsection