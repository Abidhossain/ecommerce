@extends('admin.admin-master')
@section('title','E-Shopper | Category List') 
@section('content')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Sub Navbar Add</h5>
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
                     <label for="sub_nav_name" class="col-form-label">Sub Nav Name</label>
                     <input type="text" class="form-control" name="sub_nav_name" id="sub_nav_name" placeholder="Navbar Name">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                     <label for="sub_nav_url" class="col-form-label">Sub Nav Url</label>
                     <input type="text" class="form-control" name="sub_nav_url" id="sub_nav_url" placeholder="Navbar Name">
                  </div>
                </div>
                <div class="col-md-6">
                  
                  <div class="form-group">
                     <label for="main_nav_id" class="col-form-label">Main Nabvar Id</label>
                     <select name="main_nav_id" id="main_nav_id" class="form-control"> 
                       <option value="">---Select Menu---</option>  
                       @foreach($sub_navbar as $nav)
                       <option value="{{$nav->main_nav_id}}">{{$nav->main_nav_name}}</option> 
                       @endforeach
                     </select>
                  </div>
                </div>
                <div class="col-md-6">
                  
                  <div class="form-group">
                     <label for="sub_nav_status" class="col-form-label">Publication Status</label>
                     <select name="sub_nav_status" id="sub_nav_status" class="form-control"> 
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
             <h4>Sub Menu List <button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#exampleModal">Sub Menu Add</button> </h4>      
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th>Sl</th>
                     <th>Sub Menu Name</th>
                     <th>Sub Menu Url</th> 
                     <th>Parent Name</th> 
                     <th width="20%">Action</th>
                  </tr>
               </thead>
               <tbody id="sub_nav_info"> 
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
   
       $.get("{{url('sub-nav-read')}}", function(data){ 
               $('#sub_nav_info').empty().html(data); 
       }); 
    }
   
   window.onload = readData();
   
   /*====================Insert data by ajax=======================*/
   
   $('#insert_form').on('submit',function(e){
       e.preventDefault();
       var data = $(this).serialize();
       $.ajax({
           url : "{{url('sub-nav-add-process')}}",
           method: 'post',
           data: data,
           dataTpye: 'json',
           success:function(data){ 
             swal('Success','Data Inserted Successfully','success');
             $('#sub_nav_name').val(""); 
             $('#sub_nav_url').val("");  
             $('#main_nav_id').val("");  
             $('#sub_nav_status').val("");  
             $('#exampleModal').modal('hide'); 
             return readData();  
           },error:function (response) { 
             swal('Error','Opps Something Wrong !!','error');
           }
       })
   });  
    
</script>
     
@endsection