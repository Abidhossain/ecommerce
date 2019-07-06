@extends('admin.admin-master')
@section('title','E-Shopper | Order Management') 
@section('custom_css')
<style>
	.badge{
		border-radius:0px;
		padding: 8px;
	}
</style>
@endsection
@section('content')

<div class="row">
   <div class="col-md-12">    
   <div class="card">
      <div class="card-body"> 
             <h4>Order List  </h4>      
            <table class="table table-bordered text-center">
               <thead>
                  <tr>
                     <th>Sl</th>
                     <th>Customer Name</th>
                     <th>Shipping Mail</th>
                     <th>Order Price</th>
                     <th>Order Status</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody id=""> 
               	<?php $i=1 ?>
               	@foreach($order_info as $order)
               		<tr>
               			<td>{{$i++}}</td>
               			<td>{{$order->name}}</td>
                        <td>{{$order->email}}</td>
               			<td>{{$order->order_total}}</td>
               			<td>
               				<?php 
               					if ($order->order_status == 1) { ?>
               					<span href="" class="badge badge-success">Order Placed</span>
               					<?php }else{ ?>
               					<span href="" class="badge badge-warning">Pending</span>
               					<?php } ?>
               			</td>
               			<td>
               				<?php 
               					if ($order->order_status == 1) { ?>
               					<a href="" class="btn btn-success btn-sm"><i class="fa fa-thumbs-up"></i></a>
               					<?php }else{ ?>
               					<a href="{{url('order-place')}}/{{$order->order_id}}" class="btn btn-danger btn-sm"><i class="fa fa-thumbs-down"></i></a>
               					<?php } ?>
               				<a href="{{url('order-view-id')}}/{{$order->order_id}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
               			</td> 
               		</tr>
               	@endforeach
               </tbody>
            </table>
            {{$order_info->links()}}
         </div> 
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
@endsection