@extends('admin.admin-master')
@section('title','E-Shopper | Order Management')   
@section('content') 
<div class="row">
   <div class="col-md-6">    
   <div class="card">
      <div class="card-body"> 
             <h4>Customer Details</h4>      
            <table class="table table-bordered text-center">
               <thead>
                  <tr> 
                     <th>Customer Name</th>
                     <th>Mobile</th> 
                  </tr>
               </thead>
               <tbody id="">  
               		<tr> 
               			<td>{{$order_infos->name}}</td>
               			<td>{{$order_infos->phone}}</td> 
               		</tr>
               </tbody>
            </table> 
         </div> 
       </div>
     </div>
</div> 
@endsection