@extends('layouts.app')

@section('content')
<div id="sides">
    <div id="left" class="bg-light border-right navbar-dark bg-dark">
        <div class="sidebar-heading far fa-list-alt"> 
            SHOP BY CATEGORY
        </div>
        <div class="list-group list-group-flush">
            @foreach($categories as $c)
                <a class="list-group-item far navbar-dark bg-dark" href= "{{ route('products.index', ['category'=> $c->id]) }}">
                    {{ $c->name }}
                </a>
            @endforeach
        </div> 
    </div>   
    
    <div class="container" id="right">
        <div class="row text-center py-3">
            @foreach($products as $p)
                <div class="col-md-3 col-sm-6 my-3 my-md-0">
                    <div class="cart-prod shadow">
                        <div class="img-prod">
                            <a href="{{ route('products.show', $p->id) }}">
                                <img class="img-fluid card-img-top p-2" src="{{$p->image}}" alt="image">
                            </a>
                        </div>
                        <div class="card body pt-4">
                            <h5 class="card-title">{{$p->name}}</h5>
                            <!--<p class="card-text">{{$p->description}}</p>-->
                            <h5><span class="price"> $ {{$p->price}}</span></h5>
                            <div>
                                <form action= "{{ route('cart.store', $p) }}" method= "POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value= "{{$p->id}}" >
                                    <input type="hidden" name="name" value= "{{$p->name}}" >
                                    <input type="hidden" name="price" value= "{{$p->price}}" >
                                    <button type="submit" class="btn btn-warning my-3" name="add">Add to cart<i class="fas fa-shopping-cart"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection