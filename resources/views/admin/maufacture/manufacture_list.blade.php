@extends('admin.admin-master')
@section('title','E-Shopper | Manufacture List')
@section('content')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Manufacture Add</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form id="insert_form">
               @csrf
               <div class="form-group">
                  <label for="manufacture_name" class="col-form-label">Manufacture Name</label>
                  <input type="text" class="form-control" name="manufacture_name" id="manufacture_name" placeholder="Manufacture Name">
               </div>
               <div class="form-group">
                  <label for="manufacture_description" class="col-form-label">Manufacture Description</label>
                  <input type="text" class="form-control" name="manufacture_description" id="manufacture_description" placeholder="Manufacture Desdription">
               </div>
               <div class="form-group">
                  <label for="publication_status" class="col-form-label">Publication Status</label>
                  <select name="publication_status" id="publication_status" class="form-control">
                  	<option value="">---Select Status---</option> 
                    <option value="0">Unpublish</option> 
                  	<option value="1">Publish</option> 
                  </select>
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
            <h4>Manufacture List 
              <button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#exampleModal">Manufacture Add</button></h4>
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th>Sl</th>
                     <th>Manufacture Name</th>
                     <th>Manufacture Description</th>
                     <th>Manufacture Status</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody id="manufacture_info">

               </tbody>
            </table>
         </div>
       </div>
      </div> 
</div> 
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Manufacture</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form id="update_form" method="post">
               @csrf 
               <input type="hidden" name="manufacture_id" id="manufacture_id">
               <div class="form-group">
                  <label for="manufacture_name" class="col-form-label">Manufacture Name</label>
                  <input type="text" class="form-control" name="manufacture_name" id="manufacture_name" placeholder="Category Name">
               </div>
               <div class="form-group">
                  <label for="manufacture_description" class="col-form-label">Manufacture Description</label>
                  <input type="text" class="form-control" name="manufacture_description" id="manufacture_description" placeholder="Category Desdription">
               </div>
               <div class="form-group">
                  <label for="publication_status" class="col-form-label">Publication Status</label>
                  <select id="publication_status" name="publication_status" class="form-control">
                  	<option value="">---Select Status---</option>
                  	<option value="1">Publish</option> 
                  	<option value="0">Unpublish</option> 
                  </select>
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
   
       $.get("{{url('manufacture-read')}}", function(data){ 
               $('#manufacture_info').empty().html(data); 
       }); 
    }
   
   window.onload = readData();
   
   /*====================Insert data by ajax=======================*/
   
   $('#insert_form').on('submit',function(e){
       e.preventDefault();
       var data = $(this).serialize();
       $.ajax({
           url : "{{url('manufacture-add')}}",
           method: 'post',
           data: data,
           dataTpye: 'json',
           success:function(data){ 
             swal('Success','Data Inserted Successfully','success');
             $('#manufacture_name').val("");
             $('#manufacture_description').val("");  
             $('#publication_status').val("");  
             $('#exampleModal').modal('hide'); 
             return readData();  
           },error:function (response) { 
             swal('Error','Opps Something Wrong !!','error');
              console.log(response);
           }
       })
   });  
   
   /*====================Edit Data By Ajax=======================*/ 

         $('#manufacture_info').delegate('#edit', 'click', function(){ 
              var id = $(this).data('id');
               console.log(id); 
           $.get('{{url('manufacture-edit')}}/' + id, function(data) { 
               $('#update_form').find('#manufacture_id').val(data.manufacture_id); 
               $('#update_form').find('#manufacture_name').val(data.manufacture_name); 
               $('#update_form').find('#manufacture_description').val(data.manufacture_description);
               $('#update_form').find('#publication_status').val(data.publication_status);
               $('#editModal').modal('show'); 
            }); 
          }) 

       //   //update with ajax

       $('#update_form').on('submit',function(e){
          e.preventDefault();
          var data = $(this).serialize();
            $.ajax({
                url : "{{url('manufacture-update')}}",
                method: 'post',
                data: data,
                dataTpye: 'json',
                success:function(data){  
               $('#editModal').modal('hide');  
                  swal('Success', 'Data Updated Successfully', 'success',{timer:800});  
                  return readData(); 
                },error:function(response){
                  swal('Error','Opps Something Wrong !!','error');
                  console.log(response);
                }
            })
        }) 

   // /*====================Delete Data By Ajax=======================*/ 
   
     $(document).on("click", ".delete" , function() {
         var manufacture_id = $(this).data("id");
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
                           url: "{{url('manufacture-delete') }}/"+manufacture_id,
                           type: 'get',
                           dataType: "JSON",
                           data: {
                               "id": manufacture_id, 
                               
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