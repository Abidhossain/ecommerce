<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="description" content="">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <!-- Title  -->
      <title>@yield('title')</title>
      @include('front.inc.header')
      @yield('custom_style')
   </head>
   <body>
      <!-- ***** Top Header Area Start ***** -->  
      @include('front.inc.top-header')
      <!-- ***** Top Header Area End ***** -->  
      <!-- ***** Slider Area Start ***** --> 
      @yield('slider')  
      <!-- ***** Sliders Area End ***** --> 
      <!-- ***** Popular Items Area Start ***** -->
      @yield('content')
      <!-- home banner statics area -->
      @yield('banner')
      <!-- home banner statics end -->  
      <!-- ***** Small Product Area Start ***** -->
      @yield('small_product')
      <!-- ***** Small Product Area End ***** -->  
      <!-- ***** Popular Brands Area Start ***** -->
      @include('front.inc.popular-brand')
      <!-- ***** Popular Brands Area End ***** -->
      <!-- ***** Footer Area Start ***** -->
      @include('front.inc.footer')
      <!-- ***** Footer Area End ***** -->
      <!-- News letter  area start-->
      @yield('newsletter')
      <!-- News letter  area end--> 
      @include('front.inc.script')
      @yield("script_test")
      <script> 
         // Set a warning toast, with no title
         notify()->warning('My name is Inigo Montoya. You killed my father, prepare to die!')
         
         // Set a success toast, with a title
         notify()->success('Have fun storming the castle!', 'Miracle Max Says')
         
         // Set an error toast, with a title
         notify()->error('I do not think that word means what you think it means.', 'Inconceivable!')
         
         // Override global config options from 'config/notify.php'
         
         notify()->success('We do have the Kapua suite available.', 'Turtle Bay Resort', ['timeOut': 5000])
         
         // for pnotify driver
         notify()->alert('We do have the Kapua suite available.', 'Turtle Bay Resort', ['timeOut': 5000]) 
           
      </script>
   </body>
</html>