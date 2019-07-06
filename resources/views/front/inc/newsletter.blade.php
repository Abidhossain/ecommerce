<div class="modal_hide">
         <div class="modal fade text-center py-5 subscribeModal-lg"  id="subscribeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
               <div class="modal-content">
                  <a style="font-size: 20px;" class="pull-right mt-3" href="" title="Close" data-dismiss="modal"><i class="fa fa-close"></i></a> 
                  <div class="modal-body">
                     <div class="top-strip"></div>
                     <a class="h2" href="">HateHatei.com</a>
                     <h3 class="pt-5 mb-0 text-secondary">Newsletter</h3>
                     <p class="pb-1 text-muted"><small>Sign up to update with our latest news and products.</small></p>
                     <form>
                        <div class="input-group mb-3 w-75 mx-auto">
                           <input type="email" class="form-control" placeholder="example@gmail.com" aria-label="Recipient's username" aria-describedby="button-addon2" required>
                           <div class="input-group-append">
                              <button class="btn btn-primary" type="button" id="button-addon2"><i class="fa fa-paper-plane"></i></button>
                           </div>
                        </div>
                     </form>
                     <p class="pb-1 text-muted"><small>Your email is safe with us. We won't spam.</small></p>
                     <div class="bottom-strip"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
       <script type="text/javascript">
         $(window).on('load', function() {
         setTimeout(function(){
         $('#subscribeModal').modal('show');
         }, 1000);
         });
         $('#Reloadpage').click(function() {
         location.reload();
         }); 
         
      </script> 