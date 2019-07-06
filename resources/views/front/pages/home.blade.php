@extends('front.front-master')
@section('title','Home | E-shopper')
@section('slider')
<div class="container">
   <div class="row mt-4">
      <div class="col-md-8 mb-3">
         <script type="text/javascript" src="{{asset('public/admin/assets/js/jssor.slider.min.js')}}"></script>
         <script type="text/javascript">
            jssor_1_slider_init = function() {
            
                var jssor_1_SlideshowTransitions = [
                  {$Duration:1200,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                  {$Duration:1200,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
                ];
            
                var jssor_1_options = {
                  $AutoPlay: 1,
                  $SlideshowOptions: {
                    $Class: $JssorSlideshowRunner$,
                    $Transitions: jssor_1_SlideshowTransitions,
                    $TransitionsOrder: 1
                  },
                  $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$
                  },
                  $ThumbnailNavigatorOptions: {
                    $Class: $JssorThumbnailNavigator$,
                    $Orientation: 2,
                    $NoDrag: true
                  }
                };
            
                var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            
                /*#region responsive code begin*/
            
                var MAX_WIDTH = 955;
            
                function ScaleSlider() {
                    var containerElement = jssor_1_slider.$Elmt.parentNode;
                    var containerWidth = containerElement.clientWidth;
            
                    if (containerWidth) {
            
                        var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);
            
                        jssor_1_slider.$ScaleWidth(expectedWidth);
                    }
                    else {
                        window.setTimeout(ScaleSlider, 30);
                    }
                }
            
                ScaleSlider();
            
                $Jssor$.$AddEvent(window, "load", ScaleSlider);
                $Jssor$.$AddEvent(window, "resize", ScaleSlider);
                $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
                /*#endregion responsive code end*/
            };
         </script>
         <style>
            /* jssor slider loading skin spin css */
            .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
            }
            @keyframes jssorl-009-spin {
            from {
            transform: rotate(0deg);
            }
            to {
            transform: rotate(360deg);
            }
            }
            .jssora061 {display:block;position:absolute;cursor:pointer;}
            .jssora061 .a {fill:none;stroke:#fff;stroke-width:360;stroke-linecap:round;}
            .jssora061:hover {opacity:.8;}
            .jssora061.jssora061dn {opacity:.5;}
            .jssora061.jssora061ds {opacity:.3;pointer-events:none;}
         </style>
         <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:460px;overflow:hidden;visibility:hidden;">
            <!-- Loading Screen -->
            <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
               <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="{{asset('public/front/')}}/img/svg/spin.svg" />
            </div>
            <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:955px;height:460px;overflow:hidden;">
               @php  
                  $sliders = DB::table('sliders')->get();

                  $categories =DB::table('categories')->where('publication_status',1)->get();
               @endphp
               @foreach($sliders as $slider)
               <div>
                  <img data-u="image"  src="{{$slider->filename}}" title="{{$slider->slider_title}}" alt="{{$slider->slider_title}}" />
                  <div data-u="thumb">{{$slider->slider_title}}</div>
               </div>
               @endforeach
            </div>
            <!-- Thumbnail Navigator -->
            <div data-u="thumbnavigator" style="position:absolute;bottom:0px;left:0px;width:955px;height:50px;color:#FFF;overflow:hidden;cursor:default;background-color:rgba(0,0,0,.5);">
               <div data-u="slides">
                  <div data-u="prototype" style="position:absolute;top:0;left:0;width:955px;height:50px;">
                     <div data-u="thumbnailtemplate" style="position:absolute;top:0;left:0;width:100%;height:100%;font-family:verdana;font-weight:normal;line-height:50px;font-size:16px;padding-left:10px;box-sizing:border-box;"></div>
                  </div>
               </div>
            </div>
            <!-- Arrow Navigator -->
            <div data-u="arrowleft" class="jssora061" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
               <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                  <path class="a" d="M11949,1919L5964.9,7771.7c-127.9,125.5-127.9,329.1,0,454.9L11949,14079"></path>
               </svg>
            </div>
            <div data-u="arrowright" class="jssora061" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
               <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                  <path class="a" d="M5869,1919l5984.1,5852.7c127.9,125.5,127.9,329.1,0,454.9L5869,14079"></path>
               </svg>
            </div>
         </div>
         <script type="text/javascript">jssor_1_slider_init();</script>
      </div>
      <div class="col-md-4">
         <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12"> 
               <img class="img img-fluid banner1" src="{{asset('public/front/')}}/img/banner/banner2.jpg">  
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
               <img class="img img-fluid banner1" src="{{asset('public/front/')}}/img/banner/banner3.jpg">   
            </div>
         </div>
      </div>
   </div>
</div>
<!-- *****shipping area start ***** -->
<div class="shipping_area mb-40 mt-3">
   <div class="container">
      <div class="row">
         <div class="col-lg-4 col-md-4 col-xs-4 ">
            <div class="single_shipping">
               <div class="shippin_icone">
                  <i class="fa fa-truck"></i>
               </div>
               <div class="shipping_content">
                  <h3>Free shipping on orders over $100</h3>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-4 col-xs-4">
            <div class="single_shipping">
               <div class="shippin_icone">
                  <i class="fa fa-history"></i>
               </div>
               <div class="shipping_content">
                  <h3>30-day returns money back</h3>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-4 col-xs-4">
            <div class="single_shipping box3">
               <div class="shippin_icone">
                  <i class="fa fa-headphones"></i>
               </div>
               <div class="shipping_content">
                  <h3>24/7 online support consultations</h3>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- ***** shipping Section area end ****-->
<!-- ***** Banner Section Start Here ***** -->
<div class="banner-area pt-90 pb-160 fix mt-5">
   <div class="container">
      <div class="row">
         <div class="col-lg-4 col-md-4">
            <div class="furits-banner-wrapper mb-30 wow fadeInLeft">
               <img class="fruits_banner_img" src="{{asset('public/front/')}}/img/banner/40.jpg" alt="">
               <div class="furits-banner-content">
                  <h4>Super Natural</h4>
                  <p>Hello Wrold .Hi Bangladesh</p>
                  <a class="furits-banner-btn btn-hover" href="#">Shop Now</a>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-4">
            <div class="furits-banner-wrapper mb-30 wow fadeInUp">
               <img class="fruits_banner_img" src="{{asset('public/front/')}}/img/banner/41.jpg" alt="">
               <div class="furits-banner-content">
                  <h4>KIWI Fresh</h4>
                  <p>Hello Wrold .Hi Bangladesh</p>
                  <a class="furits-banner-btn btn-hover" href="#">Shop Now</a>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-4">
            <div class="furits-banner-wrapper mb-30 wow fadeInRight">
               <img class="fruits_banner_img" src="{{asset('public/front/')}}/img/banner/42.jpg" alt="">
               <div class="furits-banner-content">
                  <h4>Pomegranate</h4>
                  <p>Lorem Ipsum is simply dummy text of the printing.</p>
                  <a class="furits-banner-btn btn-hover" href="#">Shop Now</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- ***** Banner Area End ***** -->
@endsection
@section('content')
<div class="popular_items_area home-3 section_padding_50_20">
   @foreach($categories as $category)
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <!-- <div class="popular_section_heading mb-50 text-center section-title-furits">
               <h2 class="">Popular This Week</h2> 
               </div> -->
            <div class="shipping_area shipping_four">
               <div class="top_title">
                  <h2>{{$category->category_name}} Product</h2>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="popular_items_slides col-12">
            @php
            $products = DB::table('products')
            ->where('category_id',$category->category_id) 
            ->get();
            $sliders = DB::table('sliders')->limit(1)->get();
            @endphp
            @foreach($products as $product)
            <!-- Single Popular Item Area Start --> 
            <div class="single_popular_item">
               <div class="product_image">
                  <!-- Product Image -->
                  <img class="first_img" src="{{$product->product_image}}" alt="">
                  <img class="hover_img" src="{{$product->product_image}}" alt="">
                  <!-- Product Badge -->
                  <div class="product_badge">
                     <span class="badge-offer">Featured</span>
                  </div>
                  <!-- Wishlist -->
                  <div class="product_wishlist">
                     <a href="wishlist.html" target="_blank"><i class="ti-heart"></i></a>
                  </div>
                  <!-- Add to cart -->
                  <form action="{{url('product-details')}}" method="post">
                     @csrf 
                     <input type="hidden" name="product_id" value="{{$product->product_id}}"> 
                     <div class="product_add_to_cart">
                        <a href=""><button style="background-color: #3A3A3A;border:0px;color: #fff;cursor: pointer;" type="submit"><i class="ti-eye" aria-hidden="true"></i> Details</button></a>
                     </div>
                  </form>
               </div>
                  <form action="{{url('product-details')}}" method="post">
                     @csrf 
                     <input type="hidden" name="product_id" value="{{$product->product_id}}">  
                  <!-- Product Description -->
                  <div class="product_description">
                     <h5><a class="anchor_tag" href="#">{{$product->product_name}}</a></h5>
                     <h6>
                        {{$product->price}}.00 TK <span></span> 
                        <button type="submit" style="font-size: 14px; font-weight: bolder;cursor: pointer;border: 0px;" class="pull-right add_cart"><i class="ti-shopping-cart"> Add Cart</i></button>
                     </h6>
                  </div>
               </form>
            </div>
            @endforeach
         </div>
      </div>
   </div>
   <!-- home banner statics area --> 
  {{--  @foreach($sliders as $slider)
   <div class="container mb-50 mt-3">
      <div class="banner-statics">
         <div class="container-fluid">
            <div class="row">
               <div class="col-12">
                  <div class="single-banner-statics">
                     <a href=""><img class="img img-fluid" title="{{$slider->slider_title}}" src="{{asset('front/')}}/img/banner/ba1.jpg" alt=""></a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   @endforeach
   <!-- home banner statics end --> --}}
   @endforeach
</div>
@endsection
@section('small_product')
<section class="popular_brands_area mb-50">
   <!-- top-seller area start -->
   <div class="fruits-top-seller-area ">
      <div class="container">
         <div class="row">
            <div class="col-lg-4">
               <div class="top-seller-wrapper mb-40">
                  <div class="top-seller-title">
                     <span>Firm Fresh</span>
                     <h3>New seasonal</h3>
                  </div>
                  <div class="top-seller-contect-wrapper">
                     <div class="single-top-seller">
                        <div class="top-seller-img">
                           <a href="#"><img src="{{asset('public/front/')}}/img/product//14.jpg" alt=""></a>
                        </div>
                        <div class="top-seller-content">
                           <h5><a href="#">Pinapple Freash</a></h5>
                           <div class="fruit-price">
                              <span>$25.22</span>
                              <span class="old">$25.22</span>
                           </div>
                           <a href="#">Add to cart →</a>
                        </div>
                     </div>
                     <div class="single-top-seller">
                        <div class="top-seller-img">
                           <a href="#"><img src="{{asset('public/front/')}}/img/product//15.jpg" alt=""></a>
                        </div>
                        <div class="top-seller-content">
                           <h5><a href="#">Kropi Jussi</a></h5>
                           <div class="fruit-price">
                              <span>$25.22</span>
                              <span class="old">$25.22</span>
                           </div>
                           <a href="#">Add to cart →</a>
                        </div>
                     </div>
                     <div class="single-top-seller">
                        <div class="top-seller-img">
                           <a href="#"><img src="{{asset('public/front/')}}/img/product//16.jpg" alt=""></a>
                        </div>
                        <div class="top-seller-content">
                           <h5><a href="#">Freash Avocado</a></h5>
                           <div class="fruit-price">
                              <span>$25.22</span>
                              <span class="old">$25.22</span>
                           </div>
                           <a href="#">Add to cart →</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="top-seller-wrapper mb-40">
                  <div class="top-seller-title">
                     <span>Firm Fresh</span>
                     <h3>Best Products</h3>
                  </div>
                  <div class="top-seller-contect-wrapper">
                     <div class="single-top-seller">
                        <div class="top-seller-img">
                           <a href="#"><img src="{{asset('public/front/')}}/img/product//17.jpg" alt=""></a>
                        </div>
                        <div class="top-seller-content">
                           <h5><a href="#">Grean Lemooon</a></h5>
                           <div class="fruit-price">
                              <span>$25.22</span>
                              <span class="old">$25.22</span>
                           </div>
                           <a href="#">Add to cart →</a>
                        </div>
                     </div>
                     <div class="single-top-seller">
                        <div class="top-seller-img">
                           <a href="#"><img src="{{asset('public/front/')}}/img/product//18.jpg" alt=""></a>
                        </div>
                        <div class="top-seller-content">
                           <h5><a href="#">Red Bedena</a></h5>
                           <div class="fruit-price">
                              <span>$25.22</span>
                              <span class="old">$25.22</span>
                           </div>
                           <a href="#">Add to cart →</a>
                        </div>
                     </div>
                     <div class="single-top-seller">
                        <div class="top-seller-img">
                           <a href="#"><img src="{{asset('public/front/')}}/img/product//19.jpg" alt=""></a>
                        </div>
                        <div class="top-seller-content">
                           <h5><a href="#">Freash Blackberry</a></h5>
                           <div class="fruit-price">
                              <span>$25.22</span>
                              <span class="old">$25.22</span>
                           </div>
                           <a href="#">Add to cart →</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="top-seller-wrapper mb-40">
                  <div class="top-seller-title">
                     <span>Firm Fresh</span>
                     <h3>Top Seller</h3>
                  </div>
                  <div class="top-seller-contect-wrapper">
                     <div class="single-top-seller">
                        <div class="top-seller-img">
                           <a href="#"><img src="{{asset('public/front/')}}/img/product//20.jpg" alt=""></a>
                        </div>
                        <div class="top-seller-content">
                           <h5><a href="#">Pinapple Freash</a></h5>
                           <div class="fruit-price">
                              <span>$25.22</span>
                              <span class="old">$25.22</span>
                           </div>
                           <a href="#">Add to cart →</a>
                        </div>
                     </div>
                     <div class="single-top-seller">
                        <div class="top-seller-img">
                           <a href="#"><img src="{{asset('public/front/')}}/img/product//21.jpg" alt=""></a>
                        </div>
                        <div class="top-seller-content">
                           <h5><a href="#">Kropi Jussi</a></h5>
                           <div class="fruit-price">
                              <span>$25.22</span>
                              <span class="old">$25.22</span>
                           </div>
                           <a href="#">Add to cart →</a>
                        </div>
                     </div>
                     <div class="single-top-seller">
                        <div class="top-seller-img">
                           <a href="#"><img src="{{asset('public/front/')}}/img/product//22.jpg" alt=""></a>
                        </div>
                        <div class="top-seller-content">
                           <h5><a href="#">Freash Avocado</a></h5>
                           <div class="fruit-price">
                              <span>$25.22</span>
                              <span class="old">$25.22</span>
                           </div>
                           <a href="#">Add to cart →</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- top seller area end -->
</section>
@endsection