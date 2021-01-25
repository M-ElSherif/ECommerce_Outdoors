@extends('templates.templateadmin')

@section('content')
<div class="container text-center py-2">
    <div class="card">
        <header class="card-header">
            <h4 class="card-title mt-2">Order Info</h4>
        </header>
        <div class="col s20 m12">
            <div class="row text-left py-8">
                <div class="m-3">
                    <p class="card-text">ID:</p>
                    <p class="card-text">Customer ID:</p>
                    <p class="card-text">Customer Name:</p>
                    <p class="card-text">Date:</p>
                    <p class="card-text">Address:</p>
                    <p class="card-text">Email:</p>
                    <p class="card-text">Phone:</p>
                    <span class="price"> Total:</span>
                </div>  
                <div class="m-3">  
                    <p class="card-text">{{$order->id}}</p>
                    <p class="card-text">{{$order->customer_id}}</p>
                    <p class="card-text">{{$order->billing_firstname . " " . $order->billing_lastname}}
                    <p class="card-text">{{$order->created_at}}</p>
                    <p class="card-text">{{$order->billing_address}}</p>
                    <p class="card-text">{{$order->billing_email}}</p>
                    <p class="card-text">{{$order->billing_phone}}</p>
                    <span class="price"> $ {{$order->billing_total}}</span>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        @foreach($items as $i)
            @foreach($products as $product)
                @if($product[0]->id == $i->product_id)
                    <div class="border rounded">
                        <div class="row">
                            <div class="col-md-3 ml-4 m-3 border rounded">
                                <img class="img-single-prod" src="..\{{ $product[0]->image }}" alt="image">
                            </div>
                            <div class="cart-item-details">
                                <div class="col-md-12 mt-3">
                                    <h5 class="pt-2">{{ $product[0]->name }}</h5>
                                    <p class="pt-2">Price: $ {{ $product[0]->price }}</p>
                                    <p class="pt-2">Quantity: {{ $i->quantity }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif   
            @endforeach
        @endforeach
    </div>
</div>
@endsection
