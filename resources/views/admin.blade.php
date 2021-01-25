@extends('templates.templateadmin')

@section('content')
  <div class="add-bar-button mt-2">
    <a class="btn btn-success" href="{{url('admin/create')}}">
      <i class="fas fa-plus-circle"> Add product</i>
    </a>
  </div>
    <div class="container text-center py-2">
      @csrf
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Picture</th>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Category</th>
                <th scope="col">Quantity</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $p)
              <tr>
              <th scope="row">{{$p->id}}</th>
                <td><img src="{{$p->image}}" alt="Image" class="img-fluid"></td>
                <td>{{$p->name}}</td>
                <td>{{$p->price}}</td>
                <td>{{$p->relCategory->name}}</td>
                <td>{{$p->quantity}}</td>
                <td>{{$p->image}}</td>
                <td>
                <!--a href="{{url("admin/$p->id")}}">
                    <button class="btn btn-dark">View</button>
                  </a-->
                  <a class="btn btn-primary" href="{{url("admin/$p->id/edit")}}">
                    <i class="fas fa-user-edit"> Edit</i>
                  </a>
                  <a class=" js-del btn btn-danger" href="{{url("admin/$p->id")}}">
                    <i class="fas fa-trash"> Delete</i>
                  </a>
                </td>
              </tr>
              @endforeach  
            </tbody>
            <!-- Previous and Next buttons paginate -->
          </table>
          {{$products->links()}}
    </div>
    <script src="{{url("assets/js/deleteProduct.js")}}"></script>
@endsection