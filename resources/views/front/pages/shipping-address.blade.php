@extends('front.front-master')
@section('title','Home | E-shopper')
@section('content')

<section class="product_list_area mt-5 mb-5">  

  <!-- Shipping Page Start -->   
          <div class="account_area">
              <div class="container">
                  <div class="row"> 
                      <!-- register area start --> 
                      <div class="col-lg-7 col-md-7 clearfix">
                          <div class="login_title">
                              <h3>Shipping Address</h3>
                          </div>
                          <div class="login_form form_register"> 
                              <form  action="{{url('customer-shipping-process')}}" method="post">
                              @csrf
                                    <div class="row">
                                      <div class="col-md-6">
                                  <div class="login_input form-group">
                                      <label for="shipping_first_name">First Name <span class="required">*</span></label>
                                      <input id="shipping_first_name" class="form-control" name="shipping_first_name" type="text"   title="First Name" placeholder="Customer Name" required>
                                      </div>
                                    </div>
                                      <div class="col-md-6">
                                  <div class="login_input form-group">
                                      <label for="shipping_last_name">Last Name <span class="required">*</span></label>
                                      <input id="email" class="form-control" name="shipping_last_name" type="text"   required="" title="Customer Email" placeholder="Last Name">
                                      </div>
                                    </div>
                                    
                                        <div class="col-md-6">
                                    <div class="login_input form-group">
                                        <label for="shipping_email">Email <span class="required">*</span></label>
                                        <input id="email" class="form-control" name="shipping_email" type="text"   required="" title="Customer Email" placeholder="Last Name">
                                        </div>
                                      </div> 
                                      <div class="col-md-6">
                                  <div class="login_input form-group">
                                      <label for="ship_phone">Phone<span class="required">*</span></label>
                                      <input id="shipping_phone" class="form-control" name="shipping_phone" type="text" pattern="\d*" maxlength="11" minlength="11"   required="" title="Shipping Phone" placeholder="Shipping Phone">
                                      </div>
                                    </div>
                                      <div class="col-md-6">
                                  <div class="login_input form-group">
                                      <label for="shipping_country">Country <span class="required">*</span></label>
                                      <input id="shipping_country" class="form-control" name="shipping_country" type="text" readonly value="Bangladesh" title="Country">
                                      </div>
                                    </div>
                                      <div class="col-md-6">
                                  <div class="login_input form-group">
                                      <label for="shipping_city">City <span class="required">*</span></label>
                                      <input id="shipping_city" class="form-control" name="shipping_city" type="text" title="Shipping City">
                                      </div>
                                    </div>  
                                        
                                      <div class="col-md-6">
                                  <div class="login_input form-group">
                                      <label for="shipping_thana">Thana <span class="required">*</span></label>
                                      <input id="shipping_thana" class="form-control" name="shipping_thana" type="text" required title="Ship Thana" value="">
                                      </div>
                                    </div>
                                  <div class="col-md-6">
                                        
                                  <div class="login_input form-group">
                                      <label for="shipping_village">Village<span class="required">*</span></label>
                                      <input id="shipping_village" class="form-control" name="shipping_village" type="text" required="" title="Ship Village" placeholder="Village">
                                  </div>
                                      </div> 
                                      <div class="col-md-6">
                                  <div class="login_input form-group">
                                      <label for="shipping_street_no">Street No <span class="required">*</span></label>
                                      <input id="shipping_street_no" class="form-control" name="shipping_street_no" type="text" required="" title="Ship Street No" placeholder="Street No , Holding No">
                                      </div>
                                    </div>
                                  <div class="col-md-6">
                                        
                                  <div class="login_input form-group">
                                      <label for="shipping_house_no">House & Flat No<span class="required">*</span></label>
                                      <input id="shipping_house_no" class="form-control" type="text" name="shipping_house_no" title="Ship House No" placeholder="House No , Flat No"> 
                                  </div>
                                      </div>
                                        
                                  </div>
                            
                                  <div class="login_submit">
                                      <button type="submit">Update Shipping & Continue</button>
                                  </div>
                              </form>
                          </div>
                      </div>
                      <div class="col-md-4 col-lg-5 clearfix"> 
                          <div class="login_title">
                              <h3>Shpping Accounts</h3>
                          </div>
                      	<table class="table table-bordered">
                      		<thead>
                      			<tr>
                      				<th>P/Name</th>
                      				<th>Unit</th>
                      				<th>Qty</th>
                              <th>Size</th>
                      				<th>Total</th>
                      			</tr>
                      		</thead>
                      		<tbody class="text-right">
                      			@foreach($contents as $c_contents)
                      			<tr>
                      				<td class="text-center">{{$c_contents->name}}</td>
                      				<td class="text-center">{{$c_contents->price}}</td>
                      				<td class="text-center">{{$c_contents->qty}}</td>
                              <td class="text-center">{{$c_contents->options->size}}</td>
                      				<td >{{$c_contents->total}}</td>
                      			</tr>
                      			@endforeach
                      			<tr>
                      				<td colspan="4">Sub Total:</td>
                      				<td>{{Cart::subtotal()}}</td>
                      			</tr> 
                      			<tr>
                      				<td colspan="4">Shipping Cost:</td>
                      				<td>{{Cart::tax()}}</td>
                      			</tr>
                      			<tr>
                      				<td colspan="4">Total:</td>
                      				<td>{{Cart::total()}}</td>
                      			</tr>
                      		</tbody>
                      	</table> 
                      <!-- register area end -->
                  </div>
              </div>
          </div>
  <!-- Shipping Page End --> 
</section>  
<!-- *****  Login Register Area End ***** -->    
@endsection