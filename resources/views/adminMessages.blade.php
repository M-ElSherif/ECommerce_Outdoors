@extends('templates.templateadmin')

@section('content')
  <div class="container text-center py-2">
    @csrf
      <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Date</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Message</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($contacts as $c)
            <tr>
            <th scope="row">{{$c->id}}</th>
              <td>{{$c->created_at}}</td>
              <td>{{$c->name}}</td>
              <td>{{$c->email}}</td>
              <td>{{$c->message}}</td>
            </tr>
            @endforeach  
          </tbody>
          <!-- Previous and Next buttons paginate -->
        </table>
  </div>
@endsection