@extends('templates.template')

@section('content')

<div class="col-md-12 animated bounceIn" id="registerrow">
    @if (session()->has('added_customer'))
                    <div class="alert alert-success">
                        {{ session()->get('added_customer') }}
                    </div>
    @endif
    <div class="reghead">
        Welcome To Registration
    </div>                  
    <div class="col-md-6"> 
        <div id="regform">
            <form onsubmit="return checkpas();" name="contactform" class="form-group regi-form" enctype="multipart/form-data" method="post" action="{{url('register')}}">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="col form-group">
                      <input value="" type="text" name="name" required="" pattern="^[a-zA-Z ]*$" placeholder="Enter first name" />
                    </div>
                    <div class="col form-group">
                        <input type="text" name="lastname" required="" pattern="^[a-zA-Z ]*$" placeholder="Enter last name" />
                    </div>
                </div>

                <input type="text" name="phone" required="" pattern="^[0-9]{11}+$" placeholder="Enter phone" />
                <div class="form-row">
                    <div class="col form-group">
                        <input type="text" name="address" required="" placeholder="Enter address" /> 
                    </div>
                    <div class="col form-group">
                        <input type="text" name="postalcode" required="" placeholder="Enter postal code" />                                
                    </div>
                </div>
                <input type="email" name="email" required="" placeholder="Enter email" />
                <div>
                   <input type="password" id="pass" name="password" required="" pettern="^[a-zA-Z0-9 @]{8,15}*$" placeholder="Enter Password" />                                                                          
                </div>
                <div>
                    <input type="password" id="repass" onkeyup="checkpass(this.value);" name="repassword" required="" pettern="^[a-zA-Z0-9 @]{8,15}*$" placeholder="Re-enter Password" />
                </div>
                <b id="notifypass"></b>
                <br/>
                <div class="logtext">   
                    <input type="checkbox" name="agree" checked=""  style="width:auto;height: auto;"/> I agree to the Terms and Conditions, Privacy Policy.<br/>
                </div>
                <button type="submit" name="sendreg" id="sendreg" class="sbmtbtn"> Register</button>
                <button type="reset" class="clrbtn">Clear</button>
                <br/>
                <button class="loginbtn" id="loginbtn" title="Already a Member Then Click To Login.">Click To Login</button>
            </form>
        </div>
    </div>

    <div class="col-md-6 loginfotext" id="logininfo"></div>
</div>         
@endsection
