@extends('front.front-master')
@section('title','Home | E-shopper')
@section('content')
<!-- ***** Page Header Start***** --> 
<div style="padding-left:0px;padding-right: 0px;margin-bottom: 5%;" class="container-fluid">
   <div class="page_image">
      <p class="page_name text-center">Login / Register</p>
      <p class="page_title text-center">If you are not registered please login first.</p>
   </div>
</div>
<!-- ***** Page Header End***** -->  
<!-- ***** Login Register Area Start ***** -->  
<section class="product_list_area mb-5">
   <div class="container">
      <div class="row">
         <!--login area start-->
         <div class="col-lg-6 col-md-6">
            <div class="account_form">
               <div class="login_title">
                  <h2>login</h2>
               </div>
               <div class="login_form login">
                  <form action="{{url('customer-login-process')}}" method="post">
                     @csrf
                     <div class="login_input form-group">
                        <label for="customer_phone">Phone Number<span  class="required">*</span></label>
                        <input class="form-control" pattern="\d*" maxlength="11" minlength="11" type="text" name="customer_phone" id="customer_phone" placeholder="Phone Number"> 
                        @if ($errors->has('customer_phone'))
                        <div class="error">{{ $errors->first('customer_phone') }}
                        </div>
                        @endif
                     </div>
                     <div class="login_input form-group">
                        <label for="login_password">Passwords  <span  class="required">*</span></label>
                        <input class="form-control" type="password" name="login_password" placeholder="Enter Password">
                        @if ($errors->has('login_password'))
                        <div class="error">{{ $errors->first('login_password') }}
                           @endif
                        </div>
                        <div class="login_submit">
                           <button type="submit">login</button>
                           <label for="remember">
                           <input id="remember" type="checkbox">
                           Remember me
                           </label>
                           <a href="#">Lost your password??</a>
                        </div>
                  </form>
                  </div>
               </div>
            </div>
            <!--login area end-->
            <!--register area start-->
            <div class="col-lg-6 col-md-6">
               <div class="login_title">
                  <h2>Register</h2>
               </div>
               <div class="login_form form_register">
                  <?php ?>
                  <form action="{{url('customer-registration-process')}}" method="post">
                     @csrf
                     <div class="row">
                        <div class="col-md-6">
                           <div class="login_input form-group">
                              <label for="name">Name<span class="required">*</span></label>
                              <input class="form-control" type="text" name="name" id="name" required="" placeholder="Customer Full Name" value="{{old('name')}}">
                              @if ($errors->has('name'))
                              <div class="error">{{ $errors->first('name') }}</div>
                              @endif
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="login_input form-group">
                              <label for="email">Email address <span class="required">*</span></label>
                              <input class="form-control" type="email" name="email" id="email" required="" placeholder="Email Address" value="{{old('email')}}">
                              @if ($errors->has('email'))
                              <div class="error">{{ $errors->first('email') }}</div>
                              @endif
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="login_input form-group">
                              <label for="phone">Phone Number <span class="required">*</span></label>
                              <input class="form-control" pattern="\d*" maxlength="11" minlength="11" type="text" name="phone" id="phone"  required="" placeholder="Phone Number" value="{{old('phone')}}"> 
                              @if ($errors->has('phone'))
                              <div class="error">{{ $errors->first('phone') }}</div>
                              @endif
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="login_input form-group">
                              <label for="city">City<span class="required">*</span></label>
                              <input class="form-control" type="text" name="city" id="city"  required="" placeholder="City Name" value="{{old('city')}}">
                              @if ($errors->has('city'))
                              <div class="error">{{ $errors->first('city') }}</div>
                              @endif
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="login_input form-group">
                              <label for="password">Password <span  class="required">*</span></label>
                              <input class="form-control" type="password" name="password" id="password" required="" placeholder="Password">
                              @if ($errors->has('password'))
                              <div class="error">{{ $errors->first('password') }}</div>
                              @endif
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="login_input form-group">
                              <label for="confirm_password">Re-Type Password <span  class="required">*</span></label>
                              <input class="form-control" type="password" id="confirm_password" name="confirm_password" placeholder="Re Type Password">
                              @if ($errors->has('confirm_password'))
                              <div class="error">{{ $errors->first('confirm_password') }}</div>
                              @endif
                              <p style="padding: 10px;" style="" id='message'></p>
                           </div>
                        </div>
                     </div>
                     <div class="login_submit">
                        <button type="submit">Register</button>
                     </div>
                  </form>
               </div>
            </div>
            <!--register area end-->
         </div>
      </div>
   </div>
</section>
<!-- *****  Login Register Area End ***** -->    
@endsection
@section('script_test')
<script type="text/javascript">  
   $('#password, #confirm_password').on('keyup', function () {
       if ($('#password').val() == $('#confirm_password').val()) {
           $('#message').html('Password Matched').css('color', 'green');
       } else {
           $('#message').html('Password Not Matching').css('color', 'red');
       }
   });
</script>
@endsection