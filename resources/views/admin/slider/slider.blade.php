@extends('admin.admin-master')
@section('title','E-Shopper | Product List')
@section('content')
	
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Slider Add</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body"> 
         	 <form  id="insert_form" action="{{url('slider-add-process')}}"  method="POST" enctype="multipart/form-data">
              @csrf 
              <div class="row">
              	
              <div class="col-md-6">
              	 <div class="form-group"><label for="filename">Product Image</label>
              	 	<input name="filename" id="filename" type="file" class="form-control" data-parsley-type="file" required>
              	 </div>
              </div>
              <div class="col-md-6"> 
              	<div class="form-group">
              		<label for="slider_title">Title</label>
					<input type="text" name="slider_title" id="slider_title" class="form-control" placeholder="Slider Title" required>
              	</div>
              </div>
              </div>  
               </div> 
         <div class="modal-footer">
         <button type="submit" class="btn btn-sm btn-warning" name="submit" id="submit">Submit</button> 
         <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>  
         </div>
         </form>
         </div> 
      </div>
   </div>
</div>
<!-- /.modal --> 
<div class="row"> 
      <div class="col-md-12">
      	   <div class="card">
      <div class="card-body">   
            <h4>Slider List 
              <button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#exampleModal">Slider Add</button></h4>
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th>Sl</th>   
                     <th>Slider Image</th>   
                     <th>Slider Title</th>   
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody id="slider_info">
               	@php $i=1 @endphp
               	@foreach($slider_info as $data)
               		<tr>
               			<td>{{$i++}}</td>
               			<td><img src="{{$data->filename}}" height="40" width="50"></td>
               			<td>{{$data->slider_title}}</td>
               			<td> 
               				<a class="delete btn btn-sm btn-danger text-white" data-id="{{$data->slider_id}}" data-token="{{csrf_token()}}" >Delete</a>
               			</td>
               		</tr>
               	@endforeach
               </tbody>
            </table>
         </div>
       </div>
      </div>
 </div>     
@endsection

@section('custom_script')
 <script type="text/javascript">

   $.ajaxSetup({
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
   });
    
   // /*====================Delete Data By Ajax=======================*/ 
   
     $(document).on("click", ".delete" , function() {
         var slider_id = $(this).data("id");
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
                           url: "{{url('slider-delete')}}/"+slider_id,
                           type: 'get',
                           dataType: "JSON",
                           data: {
                               "id": slider_id, 
                               
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
                            },error: function(response)
                            {
                              console.log(response);
                              Swal.fire({
                               position: 'center',
                               type: 'error',
                               title: 'Your work has been saved',
                               showConfirmButton: true,
                               timer: 2000
                               }); 
                            }
                   });
              }
            }) 
      });  
  </script>
   @if(Session::has('success')) 
       <script type="text/javascript">
       	 Swal.fire('success',"{{Session::get('success') }}",'success'); 
       </script>
    @endif
    @if(Session::has('error')) 
         <script type="text/javascript">
         	Swal.fire('error',"{{Session::get('error') }}",'error'); 
         </script>
    @endif 
@endsection