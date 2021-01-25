@extends('layouts.app')

@section('content')
<div class="container-fluid ml-5">
    <div class="row px-3">
        <div class="col-md-6 mt-3">
            <div class="card">
                <header class="card-header">
                    <h4 class="card-title mt-2">My Shopping Cart</h4>
                </header> 
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif

                @if (Cart::count()> 0)
                    @foreach(Cart::content() as $item)
                        <div class="border rounded">
                            <div class="row">
                                <div class="col-md-3 ml-4 m-3 border rounded">
                                    <img class="img-single-prod" src="{{ $item->model->image }}" alt="image">
                                </div>
                                <div class="cart-item-details">
                                    <div class="col-md-12 mt-3">
                                        <h5 class="pt-2">{{ $item->model->name }}</h5>
                                        <h5 class="pt-2">$ {{ $item->model->price }}</h5>
                                        <h5 class="pt-2">quantity: 1 </h5>
                                        <form action= "{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger">Remove</button>
                                        </form>    
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach   
                @else
                    <h5 class="mx-3 pt-1">No items in the shopping cart!</h5>
                @endif
            </div>
        </div>
        <div class="col-md-4 mt-3">
            <div class="card">
                @if (Auth::user())
                    <form action= "{{ route('checkout.index') }}" method= "GET">
                @else
                    <form action= "{{ route('login') }}" method= "GET">       
                @endif
                    @csrf
                    <header class="card-header">
                        <h4 class="card-title mt-2">Price Details</h4>
                    </header> 
                    <hr>
                    <div class="row price-details">
                        <div class="col-md-5 mx-3">
                            <h6>Price ({{ Cart::count() }} item(s))</h6>
                            <h6>Taxes</h6>
                            <h6>Delivery Charges</h6>
                            <hr>
                            <h6>Amount Payable</h6>
                        </div>
                        <div class="col-md-5">
                            <h6>$ {{ Cart::subtotal() }}</h6>
                            <h6>$ {{ Cart::tax() }}</h6>
                            <h6 class="text-success">FREE</h6>
                            <hr>
                            <h6>$ {{ Cart::total() }}</h6>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-warning m-3" name="checkout">Proceed to Checkout <i class="fas fa-money-check-alt"></i></button>
                        </div> 
                    </div>
                </form>
            </div>   
        </div>
    </div> 
</div>           
@endsection