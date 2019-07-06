@extends('front.front-master')
@section('title','Home | E-shopper')
@section('custom_style')
<link href="{{asset('admin/assets/')}}/css/sweetalert2.css" rel="stylesheet" type="text/css">
@endsection
@section('content')

            <div class="container">
            	<div class="section-title mt-3">
            	   <h3>Thanks For Shopping</h3>
            	   <h5>We will contact with you within 3 hours !!</h5>
            	</div>
            </div>

@endsection
@section('script_test')
<script src="{{asset('admin/assets/')}}/js/sweetalert2.min.js"></script>

   @if(Session::has('success')) 
       <script type="text/javascript">
       	 Swal.fire('Thanks for shopping',"{{Session::get('success') }}",'success'); 
       </script>
    @endif
    @if(Session::has('error')) 
         <script type="text/javascript">
         	Swal.fire('error',"{{Session::get('error') }}",'error'); 
         </script>
    @endif 
@endsection