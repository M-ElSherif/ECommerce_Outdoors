@extends('templates.templateadmin')

@section('content')
  <div class="container text-center py-2">
    @csrf
      <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Date</th>
              <th scope="col">Customer ID</th>
              <th scope="col">Customer Name</th>
              <th scope="col">Total Value</th>
              <th scope="col">View</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($orders as $o)
            <tr>
            <th scope="row">{{$o->id}}</th>
              <td>{{$o->created_at}}</td>
              <td>{{$o->customer_id}}</td>
              <td>{{$o->billing_firstname . " " . $o->billing_lastname}}
              <td>{{$o->billing_total}}</td>
              <td>
                <a href="{{ route('orders.show', $o->id) }}">
                  <i class="fas fa-user-edit"> View</i>
                </a>
              </td>
            </tr>
            @endforeach  
          </tbody>
          <!-- Previous and Next buttons paginate -->
        </table>
        {{$orders->links()}}
  </div>
@endsection