@extends('front.front-master')
@section('title','Home | E-shopper')
@section('content')
<!-- Start cart Wrapper -->
<div class="container">
   <div class="shopping-cart-wrapper ">
      <div class="row">
         <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <main id="primary" class="site-main">
               <div class="shopping-cart">
                  <div class="row">
                     <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="section-title mt-3">
                           <h3>Shopping Cart</h3>
                        </div>
                        <?php 
                           if (Cart::count() < 1) { ?>
                           <p>Your shopping cart is empty !!</p>
                        <?php }else{ ?>

                              <div class="table-responsive">
                                 <table class="table table-bordered">
                                    <thead>
                                       <tr>
                                          <td>Image</td>
                                          <td>Product Name</td>
                                          <td>Quantity</td>
                                          <td>Unit Price</td>
                                          <td>Total</td>
                                          <td>Remove</td>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($contents  as $c_contents)
                                       <tr>
                                          <td>
                                             <a href="product-details.html"><img height="40px" width="40px" src="{{$c_contents->options->image}}" alt="Cart Product Image" title="Compete Track Tote" class="img-thumbnail"></a>
                                          </td>
                                          <td>{{$c_contents->name}}
                                             <span>Code:{{$c_contents->options->code}}</span> 
                                          </td>
                                          <td>
                                             <div class="input-group btn-block">
                                                <div class="product-qty mr-3">
                           <form action="{{url('cart-update-process')}}" method="POST"> 
                           @csrf
                           <input type="hidden" name="rowId" value="{{$c_contents->rowId}}">
                           <input style="width: 50px;height: 35px;" class="cart_input" type="number" min="1" name="qty" value="{{$c_contents->qty}}"> &nbsp; 
                           <button type="submit" class="btn-primary upd_button" style="height:35px;width:35px;cursor: pointer;" ><i class="fa fa-refresh"></i></button>
                           </form>
                           </div> 
                           </div>
                           </td>
                           <td>{{$c_contents->price}}.00 Tk</td>
                           <td>{{$c_contents->total}}.00 Tk</td>
                           <td> <a style="font-size: 25px;height:40px;width:40px;" href="{{url('cart-destroy/'.$c_contents->rowId)}}" ><i class="fa fa-trash"></i></a></td>
                           </tr> 
                           @endforeach 
                           </tbody>
                           </table>
                           </div>
                           </form> 
                           <div class="cart-amount-wrapper">
                              <div class="row">
                                 <div class="col-12 col-sm-12 col-md-4 offset-md-8">
                                    <table class="table table-bordered">
                                       <tbody>
                                          <tr>
                                             <td><strong>Sub-Total:</strong></td>
                                             <td>{{Cart::subtotal()}} </td>
                                          </tr>
                                          <tr>
                                             <td><strong>Tax:</strong></td>
                                             <td>
                                                <span>{{Cart::tax()}} </span>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td><strong>Total:</strong></td>
                                             <td>
                                                {{Cart::total()}} 
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                           <div class="mt-4 row">
                              <div class="col-md-8"></div>
                              <div class="col-md-2">
                               <button class="ship_btn btn btn-warning" ><a class="text-white" href="{{url('/home/')}}">Back To Shopping</a></button> 
                              </div> 
                              <div class="col-md-2"> 
                              <?php
                              $customer_id = Session::get('customer_id');
                              $shipping_id = Session::get('shipping_id');
                                 if ($customer_id == !'' && $shipping_id == !'' ) { ?>
                                     <button class="ship_btn btn btn-success float-right" ><a class="text-white" href="{{url('payment')}}">Checkout</a></button>
                                 
                              <?php }elseif($customer_id == !'' && $shipping_id == ''){ ?>
                               <button class="ship_btn btn btn-success float-right" ><a class="text-white" href="{{url('customer-shipping')}}">Checkout</a></button>
                              <?php }else{ ?>
                                 <button class="ship_btn btn btn-success float-right" ><a class="text-white" href="{{url('customer-login')}}">Checkout</a></button>
                              <?php } ?>
                              </div>

                           </div>
                        </div>
                        <?php } ?>
                  </div>
               </div>
               <!-- end of shopping-cart -->
            </main>
            <!-- end of #primary -->
         </div>
      </div>
      <!-- end of row -->
   </div>
   <!-- end of container -->
</div>
<!-- End cart Wrapper --> 
<!-- ***** Cart Area End***** -->    
@endsection