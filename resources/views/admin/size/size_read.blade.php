@php $i = 1; @endphp
@foreach($size_infos as $data)
<tr>
   <td>{{$i++}}</td>
   <td>{{$data->product_size}}</td>   
   <td>
   	<?php
   		if($data->publication_status == 1){ ?>
   		 <a href="{{url('size-inactive')}}/{{$data->size_id}}" class="badge badge-success" title="Inactive">Active</a>
   		<?php }elseif($data->publication_status == 0){ ?>
          <a href="{{url('size-active')}}/{{$data->size_id}}" class="badge badge-warning text-white" title="Active">Inctive</a> 
   		<?php } ?>
   </td>   
   <td>  
      <a href="" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#editModal" id="edit" data-id="{{$data->size_id}}">Edit</a>
      <a class="delete btn btn-sm btn-danger text-white" data-id="{{$data->size_id}}" data-token="{{csrf_token()}}" >Delete</a>
   </td>
</tr> 
@endforeach
