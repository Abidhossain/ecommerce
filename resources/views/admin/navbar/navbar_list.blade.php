@extends('admin.admin-master')
@section('title','E-Shopper | Category List') 
@section('content')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Navbar Add</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form id="insert_form">
               @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                     <label for="main_nav_name" class="col-form-label">Navbar Name</label>
                     <input type="text" class="form-control" name="main_nav_name" id="main_nav_name" placeholder="Navbar Name">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                     <label for="main_nav_url" class="col-form-label">Navbar Url</label>
                     <input type="text" class="form-control" name="main_nav_url" id="main_nav_url" placeholder="Navbar Name">
                  </div>
                </div>
                <div class="col-md-6">
                  
                  <div class="form-group">
                     <label for="main_nav_status" class="col-form-label">Publication Status</label>
                     <select name="main_nav_status" id="main_nav_status" class="form-control"> 
                       <option value="">---Select Status---</option> 
                       <option value="1">Active</option> 
                       <option value="0">Inactive</option> 
                     </select>
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
<!-- /.modal -->
<div class="row">
   <div class="col-md-12">    
   <div class="card">
      <div class="card-body"> 
             <h4>Navbar List <button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#exampleModal">Navbar Add</button> </h4>      
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th>Sl</th>
                     <th>Navbar Name</th>
                     <th>Navbar Url</th> 
                     <th width="20%">Action</th>
                  </tr>
               </thead>
               <tbody id="navbar_info"> 
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
   
   /*====================Show data by ajax=======================*/
   
    function readData(){ 
   
       $.get("{{url('navbar-read')}}", function(data){ 
               $('#navbar_info').empty().html(data); 
       }); 
    }
   
   window.onload = readData();
   
   /*====================Insert data by ajax=======================*/
   
   $('#insert_form').on('submit',function(e){
       e.preventDefault();
       var data = $(this).serialize();
       $.ajax({
           url : "{{url('navbar-add-process')}}",
           method: 'post',
           data: data,
           dataTpye: 'json',
           success:function(data){ 
             swal('Success','Data Inserted Successfully','success');
             $('#main_nav_name').val(""); 
             $('#main_nav_url').val("");  
             $('#main_nav_status').val("");  
             $('#exampleModal').modal('hide'); 
             return readData();  
           },error:function (response) { 
             swal('Error','Opps Something Wrong !!','error');
           }
       })
   });  
   
   /*====================Edit Data By Ajax=======================*/ 

         $('#category_info').delegate('#edit', 'click', function(){ 
              var id = $(this).data('id');
               console.log(id); 
           $.get('{{url('category-edit')}}/' + id, function(data) { 
               $('#update_form').find('#category_id').val(data.category_id); 
               $('#update_form').find('#navbar_name').val(data.navbar_name); 
               $('#update_form').find('#category_description').val(data.category_description);
               $('#update_form').find('#navbar_type').val(data.navbar_type);
               $('#editModal').modal('show'); 
            }); 
          }) 

       //   //update with ajax

       $('#update_form').on('submit',function(e){
          e.preventDefault();
          var data = $(this).serialize();
            $.ajax({
                url : "{{url('category-update')}}",
                method: 'post',
                data: data,
                dataTpye: 'json',
                success:function(data){  
               $('#editModal').modal('hide');  
                  swal('Success', 'Data Updated Successfully', 'success',{timer:800});  
                  return readData(); 
                }
            })
        }) 

   /*====================Delete Data By Ajax=======================*/ 
   
     $(document).on("click", ".delete" , function() {
         var category_id = $(this).data("id");
         var token = $(this).data("token");
       //  console.log(id);
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
                           url: "{{url('category-delete') }}/"+category_id,
                           type: 'get',
                           dataType: "JSON",
                           data: {
                               "id": category_id, 
                               
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
                               return readData(); 
                            }
                   });
              }
            }) 
      });
</script>
     
@endsection