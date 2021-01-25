@extends('templates.templateadmin')

@section('content')
  <div class="add-bar-button mt-2">
    <a class="btn btn-success" href="{{url('adminCategories/createCategories')}}">
      <i class="fas fa-plus-circle"> Add category</i>
    </a>
  </div>
    <div class="container text-center py-2">
      @csrf
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Category</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($categories as $c)
              <tr>
              <th scope="row">{{$c->id}}</th>
                <td>{{$c->name}}</td>
                <td>{{$c->description}}</td>
                <td>
                  <a class="btn btn-primary" href="{{url("adminCategories/$c->id/edit")}}">
                    <i class="fas fa-user-edit"> Edit</i>
                  </a>
                  <a class=" js-del btn btn-danger" href="{{url("adminCategories/$c->id")}}">
                    <i class="fas fa-trash"> Delete</i>
                  </a>
                </td>
              </tr>
              @endforeach  
            </tbody>
            <!-- Previous and Next buttons paginate -->
          </table>
          {{$categories->links()}}
    </div>
    <script src="{{url("assets/js/deleteCategory.js")}}"></script>
@endsection