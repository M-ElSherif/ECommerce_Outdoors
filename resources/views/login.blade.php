@extends('templates.template')

@section('content')
<form method="post">
    @csrf
<div class="col-md-5">
  <div class="form-group" >
    <label>Email</label>
    <input type="text" name="email" class="form-control p_input">
  </div>
  <div class="form-group">
    <label>Password *</label>
    <input type="password" name="password" class="form-control p_input">
  </div>

  <div class="text-center">
    <button type="submit" class="btn btn-primary btn-block btn-lg">Login</button>
  </div>

  <p class="sign-up">Don't have an Account?<a href="{{ route('register')}}"> Sign Up</a></p>
</form>
@endsection