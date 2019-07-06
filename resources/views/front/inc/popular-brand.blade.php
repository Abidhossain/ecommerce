 <section class="popular_brands_area mb-50">
         <div class="container">
            <div class="row">
               <div class="col-12">
                  <div class="popular_section_heading mb-50 text-center section-title-furits">
                     <h2 class="">Our Brand</h2>
                  </div>
               </div>
               @php 
                  $popular_brand = DB::table('brands')->get();
               @endphp
               <div class="col-12">
                  <div class="popular_brands_slide">
                     @foreach($popular_brand as $brand_image)
                     <div class="single_brands">
                        <img src="{{$brand_image->filename}}" alt="{{$brand_image->filename}}" title="{{$brand_image->brand_title}}">
                     </div>
                      @endforeach
                  </div>
               </div>
            </div>
         </div>
      </section>