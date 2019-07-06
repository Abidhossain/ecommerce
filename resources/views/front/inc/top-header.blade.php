
      <!-- ***** Header Area Start ***** -->
      <header class="header_area home-3">
         <div class="top-banner">
            <div class="container">
               <div class="top-banner-left text-left">
                  <ul>
                     <li><i class="fa fa-phone" aria-hidden="true"></i> 01783-859296 &nbsp; <span class="hide_top">| &nbsp; <i class="fa fa-envelope" aria-hidden="true"></i> example@gmail.com</span></li>
                  </ul>
               </div>
               <div class="top-banner-right">
                  <ul>
                     <li><span class="location hide_top"><i class="fa fa-map-marker"></i> Faridpur , Dhaka Bangladesh &nbsp;&nbsp;</span></li>
                     <li><a class="facebook top-fb btn-sm" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                     <li><a class="facebook top-tw btn-sm" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                     <li><a class="facebook top-ln btn-sm" href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                     <li><a class="facebook top-gp btn-sm" href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                  </ul>
               </div>
               <div class="clearfix"> </div>
            </div>
         </div>
         <div class="main_header_area" id="stickyHeader">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-12">
                     <div class="mainmenu_area">
                        <nav id="bigshop-nav" class="navigation">
                           <!-- Logo Area Start -->
                           <div class="nav-header">
                              <div class="nav-toggle"></div>
                              <div class="logo_area">
                                
                                 <a href="{{url('index')}}" title=""> <img class="img logo_img" src="{{asset('public/front/img/logo/logo (1).png')}}" alt=""></a>
                              </div>
                           </div>
                           <div class="header_meta_info_area">
                              <div class="nav-search align-to-right">
                                 <div class="nav-search-button">
                                    <i class="nav-search-icon"></i>
                                 </div>
                                 <form>
                                    <div class="nav-search-inner">
                                       <input type="search" name="search" placeholder="Search for Products, Brands or Catagory">
                                    </div>
                                 </form>
                              </div>
                              <div class="hero_meta_area d-flex align-items-center align-to-right">
                                 <!-- Wishlist Area -->
                                 <div class="wishlist">
                                    <a href="wishlist.html"><i class="ti-heart icon-top"></i></a>
                                 </div>
                                 <!-- Cart Area -->
                                 <div class="cart">
                                    <a href="#" id="header-cart-btn" target="_blank"><i class="ti-bag icon-top"></i><span class="cart_quantity">{{Cart::count()}}</span></a>
                                    <!-- Cart List Area Start -->
                                    <ul class="cart-list">
                                        @php
                                          $contents = Cart::content(); 
                                       @endphp
                                       <?php foreach($contents  as $c_contents){ ?>
                                       <li>
                                          <a href="{{url('show-cart')}}" class="image"><img src="{{$c_contents->options->image}}" class="cart-thumb" alt=""></a>
                                          <div class="cart-item-desc">
                                             <h6><a href="{{url('show-cart')}}">{{$c_contents->name}}</a></h6>
                                             <p> <span class="price">{{$c_contents->price}}.00 Tk</span> 
                                          &nbsp;&nbsp;&nbsp;<a class="text-primary" href="{{url('cart-destroy/'.$c_contents->rowId)}}"><i class="fa fa-remove"></i></a></p>
                                          </div>
                                       </li> 
                                       <?php } ?>
                                       <li class="total">
                                          <span>{{Cart::total()}} Tk</span>
                                          <a href="{{url('show-cart')}}" class="btn btn-sm btn-cart">Cart</a>
                                         <?php 
                                         $customer_id = Session::get('customer_id');
                                         $shipping_id = Session::get('shipping_id');
                                             if ($customer_id == !'' && $shipping_id == !'' ) { ?>
                                                 <a href="{{url('payment')}}" class="btn btn-sm btn-checkout">Checkout</a>
                                 <?php }elseif($customer_id == !'' && $shipping_id == ''){ ?>
                                             <a href="{{url('customer-shipping')}}" class="btn btn-sm btn-checkout">Checkout</a>
                                             <?php }else{ ?> 
                                             <a href="{{url('customer-login')}}" class="btn btn-sm btn-checkout">Checkout</a>
                                             <?php } ?>
                                       </li>
                                    </ul>
                                 </div>
                                 <!-- User Area -->
                                 <div class="user_thumb">
                                    <a href="#" id="header-user-btn"><img class="img-fluid" src="{{asset('public/front/img/bg-img/user.jpg')}}" alt=""></a> 
                                    <ul class="user-meta-dropdown">
                                       <?php if(Session::get('name') == true ){ ?>  

                                       <li class="user-title"><span>Hello,</span>{{Session::get('name')}}</li>
                                             <li><a href="{{route('customer_profile')}}">My Profile</a></li>
                                             <li><a href="{{url('logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
                                       <?php }else{ ?>
                                       <li><a href="{{url('customer-login')}}">Sign In </a></li>
                                       <li><a href="{{url('customer-login')}}">Sign Up</a></li>
                                       <?php } ?>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <!-- Main Menus Wrapper -->
                           <div class="nav-menus-wrapper">
      <ul class="nav-menu nav-menu-centered">
          
         <li>
            <a href="#">Home</a>
            <ul class="nav-dropdown">
               <li>
                  <a href="" target="_blank">Gallery</a></li>
            </ul>
         </li> 
         <li>
            <a href="#">Mans</a>
            <ul class="nav-dropdown">
               <li>
                  <a href="" target="_blank">Gallery</a></li>
            </ul>
         </li> 
         <li>
            <a href="#">Womans</a>
            <ul class="nav-dropdown">
               <li>
                  <a href="" target="_blank">Gallery</a></li>
            </ul>
         </li>   
                                 <li>
                                    <a href="#">Accesories</a>
                                    <div class="megamenu-panel">
                                       <div class="megamenu-lists">
                                          <ul class="megamenu-list list-col-4">
                                             <li><a href="accordians.html" target="_blank">Accordions</a></li>
                                          </ul>
                                          <ul class="megamenu-list list-col-4">
                                             <li><a href="breadcumbs.html" target="_blank">Breadcrumbs</a></li>
                                          </ul>
                                          <ul class="megamenu-list list-col-4">
                                             <li><a href="headings.html" target="_blank">Headings</a></li>
                                          </ul>
                                          <ul class="megamenu-list list-col-4">
                                             <li><a href="modals.html" target="_blank">Modals</a></li>
                                          </ul>
                                       </div>
                                    </div>
                                 </li>
                                 <li>
                                    <a href="#">Life Style</a>
                                    <div class="megamenu-panel">
                                       <div class="megamenu-lists">
                                          <ul class="megamenu-list list-col-4">
                                             <li><a href="accordians.html" target="_blank">Accordions</a></li>
                                          </ul>
                                          <ul class="megamenu-list list-col-4">
                                             <li><a href="breadcumbs.html" target="_blank">Breadcrumbs</a></li>
                                          </ul>
                                          <ul class="megamenu-list list-col-4">
                                             <li><a href="headings.html" target="_blank">Headings</a></li>
                                          </ul>
                                          <ul class="megamenu-list list-col-4">
                                             <li><a href="modals.html" target="_blank">Modals</a></li>
                                          </ul>
                                       </div>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- ***** Header Area End ***** --> 