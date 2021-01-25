@extends('templates.template')

@section('content')
<div class="col-md-5 mt-3 pb-4">
    <div class="card">
        <header class="card-header">
            <h4 class="card-title mt-2">Product Info</h4>
        </header>
        <div class="col s20 m12">
            <div class="row text-left py-8">
                <div class="img-single m-3 border rounded">
                    <img class="img-single-prod" src= "../{{$product->image}}" alt="image">
                </div>  
                <div class="m-3">  
                    <h5 class="card-title">{{$product->name}}</h5>
                    <p class="card-text">{{$product->description}}</p>
                    <span class="price"> $ {{$product->price}}</span>
                    <br>
                    <form action= "{{ route('cart.store', $product) }}" method= "POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value= "{{$product->id}}" >
                        <input type="hidden" name="name" value= "{{$product->name}}" >
                        <input type="hidden" name="price" value= "{{$product->price}}" >
                        <button type="submit" class="btn btn-warning my-3" name="add">Add to cart<i class="fas fa-shopping-cart"></i></button>                   
                    </form>    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
