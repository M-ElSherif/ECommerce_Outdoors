@extends('layouts.app')

<link rel="stylesheet" href={{url('assets/css/card.css')}}>
<script src="https://js.stripe.com/v3/"></script>

@section('content')
<section class="section-pagetop">
    <div class="section">
        <br>
        <h2 class="align-self-center text-center">Checkout</h2>  
        @if (session()->has('message'))
            <div class="spacer"></div>
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        @if(count($errors) > 0)
            <div class="spacer"></div>
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        {!! $error !!}
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</section>
<section class="section-content bg padding-y">
    <div class="check-out container">
        <div class="row">
            <div class="col-sm-10"></div>
                <form action= "{{ route('checkout.store') }}" method="POST" id="payment-form">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <header class="card-header">
                                    <h4 class="card-title mt-2">Billing Details</h4>
                                </header>
                                <article class="card-body">
                                    <div class="form-row">
                                        <div class="col form-group">
                                            <label>First name</label>
                                            <input value="{{$customer->firstname}}" type="text" name="first_name" id="first_name" required class="form-control">
                                        </div>
                                        <div class="col form-group">
                                            <label>Last name</label>
                                            <input value="{{$customer->surname}}" type="text" name="last_name" id="last_name" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input value="{{$customer->address}}"type="text" name="address" id="address" required class="form-control">
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label>City</label>
                                            <input value="{{$customer->city}}" type="text" name="city" id="city" required class="form-control">
                                        </div>
                                
                                        <div class="form-group col-md-4">
                                            <label>Province</label>
                                            <input value="{{$customer->province}}" type="text" name="province" id="province" required class="form-control">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Country</label>
                                            <input value="{{$customer->country}}" type="text" name="country" id="country" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group  col-md-6">
                                            <label>Post Code</label>
                                            <input value="{{$customer->postalcode}}" type="text" name="post_code" id="post_code" required class="form-control">
                                        </div>
                                        <div class="form-group  col-md-6">
                                            <label>Phone Number</label>
                                            <input value="{{$customer->phone}}" type="text" name="phone_number" id="phone_number" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input value="{{$customer->email}}" type="email" name="email" id="email" required class="form-control">
                                        <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Order Notes</label>
                                        <textarea name="note" id="note" rows="6" class="form-control"></textarea>
                                    </div>
                                </article>
                            </div>
                        </div>
                    
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="card">
                                        <header class="card-header">
                                            <h4 class="card-title mt-2">Your Order</h4>
                                        </header>
                                        <article class="card-body">
                                            <dl class="dlist-align">
                                                <dt>Total cost: </dt>
                                                <dd class="text-right h5 b"> $ {{ Cart::total() }} </dd>
                                            </dl>
                                        </article>
                                    </div>
                                </div>
                                <div class="col-md-10 mt-6">
                                    <div class="card">
                                        <header class="card-header">
                                            <h4 class="card-title mt-2">Payment</h4>
                                        </header>
                                        <div class="bg-white rounded-lg shadow-sm p-3">
                                            <!-- Credit card form content -->
                                            <div class="tab-content">

                                                <!-- credit card info-->
                                                <div id="nav-tab-card" class="tab-pane fade show active">
                                                    <div class="form-group">
                                                        <label for="username">Full name (on the card)</label>
                                                        <input type="text" name="name_on_card" id="name_on_card" required class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="card-element">Credit or debit card</label>
                                                        <div id="card-element">
                                                        <!-- a Stripe Element will be inserted here. -->
                                                        </div>
                                                        <!-- Used to display form errors -->
                                                        <div id="card-errors" role="alert"></div>
                                                    </div>
                                                    <div class="spacer"></div>
                                                    <button type="submit" class="subscribe btn btn-success btn-lg btn-block" id="place-order">Place Order</button>        
                                                </div>           
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>      
            </div>        
        </div>    
</section>

<section>
    <script>
        (function(){
            // Create a Stripe client.
            var stripe = Stripe('{{ config('services.stripe.key') }}' );
                
            // Create an instance of Elements.
            var elements = stripe.elements();
                
            // Custom styling can be passed to options when creating an Element.
            var style = {
                base: {
                    color: '#32325d',
                    fontFamily: '"Roboto", "Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '14px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };
                
            // Create an instance of the card Element.
            var card = elements.create('card', {style: style, hidePostalCode:true});
                
            // Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');
                
            // Handle real-time validation errors from the card Element.
            card.addEventListener('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                    document.getElementById('place-order').disabled = true;

                    var data = {
                        name_on_card: document.getElementById('name_on_card').value,
                        address_line1: document.getElementById('address').value,
                        address_city: document.getElementById('city').value,
                        address_state: document.getElementById('province').value,
                        address_country: document.getElementById('country').value,
                        post_code: document.getElementById('post_code').value,
                        email: document.getElementById('email').value,
                        phone: document.getElementById('phone_number').value,
                        first_name: document.getElementById('first_name').value,
                        last_name: document.getElementById('last_name').value,
                        note: document.getElementById('note').value        
                    } 
                
                stripe.createToken(card, data).then(function(result) {
                    if (result.error) {
                        // Inform the user if there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;

                        document.getElementById('place-order').disabled = false;
                    } else {
                        // Send the token to your server.
                        stripeTokenHandler(result.token);
                    }
                });
            });
                
            function stripeTokenHandler(token) {
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);        
                form.submit();
            }
            })();
        </script> 
</section>             
@endsection
