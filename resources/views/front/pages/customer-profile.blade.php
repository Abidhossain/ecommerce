@extends('front.front-master')
@section('title','Home | E-shopper')
@section('content')
<section class="user_account mb-5 mt-5">
   <!--   My Account Start -->
   <div style="margin-left: -5px;" class="my-account-wrapper pb-20">
      <div class="container">
         <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
               <main id="primary" class="site-main">
                  <div class="user-dashboard pb-50">
                     <div class="user-info mb-30">
                        <div class="row align-items-center no-gutters">
                           <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                              <div class="single-info">
                                 <p class="user-name">Hello <span>{{Session::get('name')}}</span>
                              </div>
                           </div>
                           <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                              <div class="single-info">
                                 <p>Need Assistance? <br><a href="#">Hot Line : 01783859296</a></p>
                              </div>
                           </div>
                           <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                              <div class="single-info">
                                 <a href="#">Your Email : {{Session::get('email')}}</a>
                              </div>
                           </div>
                           <div class="col-12 col-sm-12 col-md-6 col-lg-2 col-xl-3">
                              <div class="single-info justify-content-lg-center">
                                 Not {{Session::get('name')}} ??&nbsp;&nbsp;&nbsp; <span class="badge badge-primary"><a style="color: #fff;" href="{{url('logout')}}">Logout</a></span>
                              </div>
                           </div>
                        </div>
                        <!-- end of row -->
                     </div>
                     <!-- end of user-info -->
                     <div class="main-dashboard">
                        <div class="row">
                           <div class="col-12 col-sm-12 col-md-12 col-lg-2">
                              <ul class="nav flex-column dashboard-list" role="tablist">
                                 <li><a class="nav-link active" data-toggle="tab" href="#dashboard">Dashboard</a></li>
                                 <li> <a class="nav-link" data-toggle="tab" href="#orders">Orders</a></li>
                                 <li><a class="nav-link" data-toggle="tab" href="#downloads">History</a></li>
                                 <li><a class="nav-link" data-toggle="tab" href="#account-details">Account details</a></li>
                              </ul>
                              <!-- end of dashboard-list -->
                           </div>
                           <div class="col-12 col-sm-12 col-md-12 col-lg-10">
                              <!-- Tab panes -->
                              <div class="tab-content dashboard-content">
                                 <div id="dashboard" class="tab-pane fade show active">
                                    <h3>Dashboard </h3>
                                    <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details.</a></p>
                                 </div>
                                 <!-- end of tab-pane -->
                                 <div id="orders" class="tab-pane fade">
                                    <h3>Orders</h3>
                                    <div class="table-responsive">
                                       <table class="table">
                                          <thead>
                                             <tr>
                                                <th>Serial No</th>
                                                <th>Order No</th>
                                                <th>Date</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <?php $i = 1 ?> 
                                             <tr> 
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                                 <!-- end of tab-pane -->
                                 <div id="downloads" class="tab-pane fade">
                                    <h3>Order History</h3>
                                    <div class="table-responsive">
                                       <table class="table">
                                          <thead>
                                             <tr>
                                                <th>Serial No</th>
                                                <th>Order No</th>
                                                <th>Date</th>
                                                <th>Total</th>
                                             </tr>
                                          </thead>
                                          <tbody><?php $i = 1 ?> 
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                                 <!-- end of tab-pane -->
                                 <div id="address" class="tab-pane">
                                    <p>The following addresses will be used on the checkout page by default.</p>
                                    <h4 class="billing-address">Billing address</h4>
                                    <a class="btn btn-secondary my-4" href="#">edit</a>
                                    <p>HasTech</p>
                                    <p>Bangladesh</p>
                                 </div>
                                 <!-- end of tab-pane -->
                                 <div id="account-details" class="tab-pane fade">
                                    <h3>Account details </h3>
                                    <div class="login-form">
                                       <form action="{{url('update-cutomer-info')}}" method="post">
                                          @csrf
                                          <input type="hidden" name="customer_id" value="{{Session::get('customer_id')}}">
                                          <div class="form-group row">
                                             <label for="f-name" class="col-12 col-sm-12 col-md-4 col-lg-3 col-form-label">Full Name</label>
                                             <div class="col-12 col-sm-12 col-md-8 col-lg-6">
                                                <input type="text" class="form-control" id="name" name="name" required value="{{Session::get('name')}}">
                                             </div>
                                          </div>
                                          <div class="form-group row">
                                             <label for="email" class="col-12 col-sm-12 col-md-4 col-lg-3 col-form-label">Email Address</label>
                                             <div class="col-12 col-sm-12 col-md-8 col-lg-6">
                                                <input type="text" class="form-control" id="email" name="email" required value="{{Session::get('email')}}">
                                             </div>
                                          </div>
                                          <div class="form-group row">
                                             <label for="phone" class="col-12 col-sm-12 col-md-4 col-lg-3 col-form-label">Phone Number</label>
                                             <div class="col-12 col-sm-12 col-md-8 col-lg-6">
                                                <input  pattern="\d*" maxlength="11" minlength="11" type="text" class="form-control" id="phone" name="phone" required value="{{Session::get('phone')}}">
                                             </div>
                                          </div>
                                          <div class="form-check row p-0 mt-5">
                                             <div class="col-12 col-sm-12 col-md-8 offset-md-4 col-lg-6 offset-lg-3">
                                                <div class="custom-checkbox">
                                                   <input class="form-check-input" type="checkbox" id="offer">
                                                   <span class="checkmark"></span>
                                                   <label class="form-check-label" for="offer">Receive offers from our partners</label>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="form-check row p-0 mt-4">
                                             <div class="col-12 col-sm-12 col-md-8 offset-md-4 col-lg-6 offset-lg-3">
                                                <div class="custom-checkbox">
                                                   <input class="form-check-input" type="checkbox" id="subscribe" required>
                                                   <span class="checkmark"></span>
                                                   <label class="form-check-label" for="subscribe">Sign up for our newsletter<br>Subscribe to our newsletters now and stay up-to-date with new collections, the latest lookbooks and exclusive offers..</label>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="register-box d-flex justify-content-end mt-half">
                                             <button type="submit" class="btn btn-secondary float-left">Save</button>
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                                 <!-- end of tab-pane -->                                        
                              </div>
                           </div>
                        </div>
                        <!-- end of row -->
                     </div>
                     <!-- end of main-dashboard -->
                  </div>
                  <!-- end of user-dashboard -->
               </main>
               <!-- end of #primary -->
            </div>
         </div>
         <!-- end of row -->
      </div>
      <!-- end of container -->
   </div>
   <!-- End of My Account Wrapper -->
</section>
@endsection