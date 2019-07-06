@extends('front.front-master')
@section('title','Home | E-shopper')
@section('custom_style') 

@endsection
@section('content')
@php
$single_products = DB::table('products')->where('product_id',$single_product->product_id)->first();

// echo $product_size = explode(',' , $single_products->product_size);
@endphp
<!-- ***** News letter Area Start ***** -->
<section class="product_details_area mb-5">
   <div class="container">
      <!-- default start --> 
      <div class="row mt-5">
         <div class="col-md-4 col-sm-12 col-xs-12 column">
            <div class="xzoom-container">
               <img class="xzoom" id="xzoom-default" src="{{$single_products->product_image}}" />
               <div class="xzoom-thumbs">
                  <a href="{{$single_products->product_image}}"><img class="xzoom-gallery" width="80" src="{{$single_products->product_image}}"  xpreview="{{$single_products->product_image}}" title="The description goes here"></a> 
               </div>
            </div>
         </div>
         <div class="col-md-6 col-sm-12 col-xs-12 column">
            <div class="single_product_desc">
               <h4 class="title"><a href="#">{{$single_products->product_name}}</a></h4>
               <div class="single_product_ratings mb-15">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <span class="text-muted">(8 Reviews)</span>
               </div>
               <h4 class="price">{{$single_products->price}}</h4>
               <div class="form-group">
                  <form action="{{url('cart-add')}}" method="post">
                     @csrf
                     <input type="hidden" name="id" value="{{$single_products->product_id}}">
                     <input type="hidden" name="name" value="{{$single_products->product_name}}">
                     <input type="hidden" name="price" value="{{$single_products->price}}">
                     <input type="hidden" name="image" value="{{$single_products->product_image}}">
                     <input type="hidden" name="code" value="{{$single_products->product_code}}">
                     <div class="form-group col-6"> 
                     <input style="height: 32px;width:60px;float:left;" type="number" name="quantity" class="form-control" value="1" min="1"> &nbsp;
                     <button class="btn btn-warning btn-sm btn_addcart">Add Cart</button>
                     </div>
                     @php 
                     @endphp
                        <label for="size">Size : </label>

                        <select name="product_size[]">
                           <option value="">Size</option> 
                           @foreach($sizes as $size)
                           <option value="{{$size->product_size}}">{{$size->product_size}}</option>
                           @endforeach
                        </select>
                  </form>
               </div>
               <div class="short_overview">
                  <h6><b>Overview</b></h6>
                  <p class="text-justify">{{$single_products->short_desc}}</p>
               </div>
               <div class="single_product_sharing_social mb-15">
                  {{--  <i class="fa fa-facebook" aria-hidden="true"></i>
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                  <i class="fa fa-linkedin" aria-hidden="true"></i>  --}} 
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- default end --> 
</section> 
<div class="container mb-5">
   <h5><b>Descrioption</b></h5>
   <h6 class="text-justify">{{$single_products->long_desc}}</h6>
   </h6>
</div>
<!-- ***** Related Product Area Start ***** -->
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
   @endforeach
</div>
<!-- ***** Related Product Area End ***** --> 
@endsection 