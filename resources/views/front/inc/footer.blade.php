<footer class="footer_area home-3  text-dark">
         <div class="container-fluid">
            <div class="row">
               <div class="col-12 col-md-6 col-lg">
                  <div class="single_footer_area">
                     <div class="footer_heading mb-30 mt-5">
                        <h5>About us</h5>
                     </div>
                     <div class="footer_content">
                        <p>Bigshop is international fashion &amp; accessories online shop. We provide 100% quality products for your needs.</p>
                        <p>Phone: +880 123 777 444</p>
                        <p>Email: support@bigshop.com</p>
                     </div>
                     <div class="footer_social_area mt-15">
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a>
                     </div>
                  </div>
               </div>
               <div class="col-12 col-md-6 col-lg">
                  <div class="single_footer_area">
                     <div class="footer_heading mb-30 mt-5">
                        <h5>Account</h5>
                     </div>
                     <ul class="footer_widget_menu">
                        <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Your Account</a></li>
                        <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Free Shipping Policy</a></li>
                        <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Your Cart</a></li>
                     </ul>
                  </div>
               </div>
               <div class="col-12 col-md-6 col-lg">
                  <div class="single_footer_area">
                     <div class="footer_heading mb-30 mt-5">
                        <h5>Support</h5>
                     </div>
                     <ul class="footer_widget_menu">
                        <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Help</a></li>
                        <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Product Support</a></li>
                        <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Terms &amp; Conditions</a></li>
                     </ul>
                  </div>
               </div>
               <div class="col-12 col-md-6 col-lg">
                  <div class="single_footer_area">
                     <div class="footer_heading mb-30 mt-5">
                        <h5>Join Our Mailing List</h5>
                     </div>
                     <div class="subscribtion_form">
                        <form action="#" method="post">
                           <input type="email" name="mail" class="mail" placeholder="Your E-mail Addrees">
                           <button type="submit" class="submit"><i class="fa fa-check" aria-hidden="true"></i></button>
                        </form>
                     </div>
                  </div>
                  <div class="single_footer_area mt-30">
                     <!-- <div class="footer_heading mb-15">
                        <h6>Download our Mobile Apps</h6>
                        </div> -->
                     <div class="apps_download">
                        <!--  <a href="#"><img src="img/core-img/play-store.png" alt="Play Store"></a>
                           <a href="#"><img src="img/core-img/app-store.png" alt="Apple Store"></a>  -->
                        <h5  class="mt-4">Payment Method</h5>
                        <img style="height:25px;" src="{{asset('public/front/img/payment-method/payment.png')}}" alt="Apple Store">
                     </div>
                  </div>
               </div>
            </div>
            <hr>
            @php $copyright = DB::table('copyrights')->first(); @endphp
            <div class="container">
               <div class="row">
                  <div class="col-md-12 col-xs-12 col-sm-12">
                     <p class="copyright text-center pull-right">Copyright © @php echo date('Y') @endphp <a href="{{$copyright->hyper_link}}">{{$copyright->copyright_text}}</a> All Right Reserved</p>
                  </div>
               </div>
            </div>
         </div>
      </footer>