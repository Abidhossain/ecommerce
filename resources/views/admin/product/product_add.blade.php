@extends('admin.admin-master')
@section('title','E-Shopper | Product List')
@section('custom_css')
 <link rel="stylesheet" href="{{asset('public/admin/assets/css/')}}/multiple-select.min.css">
@endsection
@section('content')
<div class="row"> 
	<div class="col-md-12">
            <h4 class="mt-0 header-title">Product Add</h4> 
      <div class="card">
         <div class="card-body">
            <form  id="insert_form" action="{{url('product-add-process')}}"  method="POST" enctype="multipart/form-data">
              @csrf
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
              	 <div class="form-group"><label>Category Name</label>
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
              	 <div class="form-group"><label>Manufacture Name</label>
              	 		<select name="manufacture_id" id="manufacture_id" class="form-control" data-parsley-type="text" required>
              	 		<option value="">---Select Name---</option>
                    @foreach($manufacture_name as $data)
                    <option value="{{$data->manufacture_id}}">{{$data->manufacture_name}}</option>
                    @endforeach
              	 	</select>
              	 </div>
              </div> 
              <div class="col-md-6"> 
                <label>Product Size</label>
                  <select name="product_size[]"  id="select" multiple="multiple"> 
                    @foreach($size_name as $size)
                    <option value="{{$size->product_size}}">{{$size->product_size}}</option>
                    @endforeach
                  </select>
 
                    
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
              	 	<input name="price" id="price" type="number" class="form-control" data-parsley-type="text" required  placeholder="Type something">
              	 </div>
              </div> 
              <div class="col-md-6">
              	 <div class="form-group"><label>Product Image1</label>
              	 	<input name="product_image" id="product_image" type="file" class="form-control" data-parsley-type="file" required>
              	 </div>
              </div>    
               </div>
               <button type="submit" class="btn btn-sm btn-warning" name="submit" id="submit">Submit</button> 
         <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button> 
            </form>
         </div>
      </div> 
  </div>     
@endsection

@section('custom_script')
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
    
<script type="text/javascript">
   $.ajaxSetup({
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
   });  
</script>
 <script src="{{asset('public/admin/assets/js/')}}/multiple-select.min.js"></script>
                     <script>
                       $(function () {
                         $('#select').multipleSelect({
                           width: 500
                         })
                       })
                     </script>
@endsection
