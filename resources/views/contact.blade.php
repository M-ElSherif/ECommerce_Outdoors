@extends('layouts.app')

@section('content')
  <div class="wrapper">
	<div class="container contact" id="contact">
		<div class="row">
			<div class="col-bd-8 pb-4">
		<header class="card-header">
			<h4>Contact form</h4>
		</header> 	
		@if (session()->has('message'))
        <div class="spacer"></div>
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif		     
				<form action= "{{ route('contact.store') }}" method="POST" id="contactform" >
				    @csrf
					<div class="form-row">
						<div class="form-group">
				    		<label class="col form-group" >Your Name:</label>
						</div>	
						<div class="form-group">
						@if (Auth::user())
				     		 <input value= "{{ Auth::user()->name }}" type="text" id="name" name="name" required class="form-control">
						@else	  
							 <input type="text" id="name" name="name" required class="form-control">
						@endif	 
				    	</div>
				  	</div>

					<div class="form-row">
						<div class="form-group">
				    		<label class="col form-group" >Your Email:</label>
						</div>	
						<div class="form-group">
						@if (Auth::user())
				     		 <input value= "{{ Auth::user()->email }}" type="text" id="email" name="email" required class="form-control">
						@else
						     <input type="text" id="email" name="email" required class="form-control">
						@endif	 
				    	</div>
				  	</div>
					<div class="form-row">
						<div class="form-group">
			    			<label class="col form-group" >Your Message:</label>
						</div>	
						<div class="form-group">
							<textarea name="message" cols="100" rows="4" id="message" required class="form-control"></textarea>
						</div>
					</div>
					
					<!--<div class="float-right">
						    <a href="#"   onclick="document.getElementById('ContactForm').submit()">Send</a>
							<a href="#"  onclick="document.getElementById('ContactForm').reset()">Clear</a>

					</div>-->

					<div class="float-right">
                        <button type="submit" class="btn btn-primary">Send</button>
				</form>
			</div>
		</div>
	</div>
	  </div>


@endsection
