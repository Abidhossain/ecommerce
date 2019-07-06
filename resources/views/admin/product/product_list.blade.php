 @extends('admin.admin-master')
@section('title','E-Shopper | Manufacture List')
@section('content')
<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-body">
            <h4>Product List</h4>
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th>Sl</th>
                     <th>Product Name</th>
                     <th>Product Code</th>
                     <th>Product Image</th>
                     <th>Category Name</th>
                     <th>Manufacture Name</th>
                     <th>Product Price</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody id="product_info">
                  @php $i=1 @endphp
                  @foreach($product_list as $data)
                  <tr>
                     <td>{{$i++}}</td>
                     <td>{{$data->product_name}}</td>
                     <td>{{$data->product_code}}</td>
                     <td><img src="{{$data->product_image}}" height="40px" width="55px"></td>
                     <td> <?php  echo  \App\Http\Controllers\StaticFunctionController::getName($data->category_id); ?> 
                     </td>
                     <td> <?php  echo  \App\Http\Controllers\StaticFunctionController::getManufacture($data->manufacture_id); ?> 
                     </td>
                     <td>{{$data->price}}</td>
                     <td>   
                        <a href="" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#editModal" id="edit" data-id="{{$data->product_id}}">Edit</a>
                        <a class="delete btn btn-sm btn-danger text-white"  data-id="{{$data->product_id}}" data-token="{{csrf_token()}}" >Delete</a>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
            {{$product_list->links()}}
         </div>
      </div>
   </div>
</div>
<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title mt-0" id="myLargeModalLabel">Large modal</h5>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
         </div>
         <div class="modal-body">
            <form id="update_form" method="post" action="{{url('product-update')}}" enctype="multipart/form-data">
               @csrf

              <input type="hidden" name="product_id" id="product_id">
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group"><label>Product Name</label>
                        <input type="text" name="product_name" id="product_name" class="form-control" data-parsley-type="text" required  placeholder="Type something">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group"><label>Product Code</label>
                        <input type="text" name="product_code" id="product_code" class="form-control" data-parsley-type="text" required  placeholder="Type something">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label>Category Name</label>
                        <select name="category_id" id="category_id" class="form-control" data-parsley-type="text" required>
                           <option value="">---Select Category---</option>
                           @foreach($category_name as $data)
                           <option value="{{$data->category_id}}">{{$data->category_name}}</option>
                           @endforeach
                        </select>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label>Manufacture Name</label>
                        <select name="manufacture_id" id="manufacture_id" class="form-control" data-parsley-type="text" required>
                           <option value="">---Select Name---</option>
                           @foreach($manufacture_name as $data)
                           <option value="{{$data->manufacture_id}}">{{$data->manufacture_name}}</option>
                           @endforeach
                        </select>
                     </div>
                  </div> 
              <div class="col-md-6">
                 <div class="form-group"><label>Size Name</label>
                    <select name="product_size" id="product_size" class="form-control" data-parsley-type="text" required>
                    <option value="">---Select Name---</option>
                    @foreach($size_name as $data)
                    <option value="{{$data->product_size}}">{{$data->product_size}}</option>
                    @endforeach
                  </select>
                 </div>
              </div> 
                  <div class="col-md-6">
                     <div class="form-group"><label>Product Short Description</label>
                        <textarea name="short_desc" id="short_desc" type="text" class="form-control" data-parsley-type="text" required  placeholder="Type something"></textarea>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group"><label>Product Long Description</label>
                        <textarea name="long_desc" id="long_desc" type="text" class="form-control" data-parsley-type="text" required  placeholder="Type something"></textarea>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group"><label>Product Price</label>
                        <input name="price" id="price" type="text" class="form-control" data-parsley-type="text" required  placeholder="Type something">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group"><label>Product Image</label>
                        <input name="product_image" type="file" class="form-control" data-parsley-type="file">
                     </div>
                  </div>
                  <div class="col-md-6"> 
                  <br><img src="" height="60" width="80" class="product_image" id="product_image" alt="image"
               class="img-fluid d-block thumb-lg" width="150"/> 
                  </div>
               </div>
               <button type="submit" class="btn btn-sm btn-warning" name="submit" id="submit">Submit</button> 
               <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button> 
            </form>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection
@section('custom_script')
<script type="text/javascript">
   $.ajaxSetup({
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
   });
    
   
    /*====================Edit Data By Ajax=======================*/ 
   
         $('#product_info').delegate('#edit', 'click', function(){ 
              var id = $(this).data('id');
               console.log(id); 
           $.get('{{url('product-edit')}}/' + id, function(data) { 
               $('#update_form').find('#product_id').val(data.product_id); 
               $('#update_form').find('#product_name').val(data.product_name); 
               $('#update_form').find('#product_code').val(data.product_code); 
               $('#update_form').find('#manufacture_id').val(data.manufacture_id); 
               $('#update_form').find('#category_id').val(data.category_id); 
               $('#update_form').find('#product_size').val(data.product_size); 
               $('#update_form').find('#long_desc').val(data.long_desc); 
               $('#update_form').find('#price').val(data.price); 
               $('#update_form').find('#short_desc').val(data.short_desc);  
            $('#update_form').find('#product_image').attr('src',data.product_image);
               $('#editModal').modal('show'); 
            }); 
          }) 
   

     //   //update with ajax

       // $('#update_form').on('submit',function(e){
       //    e.preventDefault();
       //    var data = $(this).serialize();
       //      $.ajax({
       //          url : "",
       //          method: 'post',
       //          data: data,
       //          dataTpye: 'json',
       //          success:function(data){  
       //         $('#editModal').modal('hide');  
       //            swal('Success', 'Data Updated Successfully', 'success',{timer:800});
       //              return location.reload(); 
       //          },error:function(response){
       //            swal('Error','Opps Something Wrong !!','error');
       //            console.log(response);
       //          }
       //      })
       //  }) 
   // /*====================Delete Data By Ajax=======================*/ 
   
     $(document).on("click", ".delete" , function() {
         var product_id = $(this).data("id");
         var token = $(this).data("token");
        // console.log(manufacture_id);
           Swal.fire({
               title: 'Are you sure?',
               text: "You won't be able to revert this!",
               type: 'warning',
               showCancelButton: true,
               confirmButtonColor: '#3085d6',
               cancelButtonColor: '#d33',
               confirmButtonText: 'Yes, delete it!'
           }).then((result) => {
               if (result.value) {
                   $.ajax({
                           url: "{{url('product-delete')}}/"+product_id,
                           type: 'get',
                           dataType: "JSON",
                           data: {
                               "id": product_id, 
                               
                           },
                           success: function ()
                           {  
                               Swal.fire({
                               position: 'center',
                               type: 'success',
                               title: 'Your work has been saved',
                               showConfirmButton: true,
                               timer: 2000
                               });
                               return location.reload(); 
                            }
                   });
              }
            }) 
      }); 
</script>
 @if(Session::has('success'))
        <script>
            Swal.fire('success',"{{Session::get('success') }}",'success');
        </script>
    @endif
    @if(Session::has('error'))
        <script>
             Swal.fire('error',"{{Session::get('error') }}",'error');
        </script>
    @endif
@endsection