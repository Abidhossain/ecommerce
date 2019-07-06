<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
      <title>@yield('title')</title>
      <meta content="Admin Dashboard" name="description">
      <meta content="Themesbrand" name="author">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      @include('admin.inc.header')
      @yield('custom_css')
   </head>
   <body>
      <!-- Begin page -->
      <div id="wrapper">
         <!-- Top Bar Start -->
         @include('admin.inc.top-header')
         <!-- Top Bar End --> 
         <!-- ========== Left Sidebar Start ========== -->
         @include('admin.inc.sidebar')
         <!-- Left Sidebar End -->
         <!-- ============================================================== -->
         <!-- Start right Content here -->
         <!-- ============================================================== -->
         <div class="content-page">
            <!-- Start content -->
            <div class="content">
               <div class="container-fluid">
                  <div class="page-title-box">
                     <div class="row align-items-center">
                        <div class="col-sm-6">
                           <h4 class="page-title">@yield('page_title')</h4>
                           <ol class="breadcrumb">
                              <li class="breadcrumb-item active">@yield('sub_title')</li>
                           </ol>
                        </div> 
                     </div>
                  </div>
                  @yield('content')
                  <!-- end row -->
               </div>
               <!-- container-fluid -->
            </div>
            <!-- content -->
            @include('admin.inc.footer')
         </div>
         <!-- ============================================================== -->
         <!-- End Right content here -->
         <!-- ============================================================== -->
      </div>
      <!-- END wrapper -->
      @include('admin.inc.script')
      @yield('custom_script')
   </body> 
</html>