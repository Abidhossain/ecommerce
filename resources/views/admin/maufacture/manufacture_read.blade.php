@php $i = 1; @endphp
@foreach($manufacture_infos as $data)
<tr>
   <td>{{$i++}}</td>
   <td>{{$data->manufacture_name}}</td>  
   <td>{{$data->manufacture_description}}</td> 
   <td>
   	<?php
   		if($data->publication_status == 1){ ?>
   		 <a href="{{url('manufacture-inactive')}}/{{$data->manufacture_id}}" class="badge badge-success" title="Inactive">Active</a>
   		<?php }elseif($data->publication_status == 0){ ?>
          <a href="{{url('manufacture-active')}}/{{$data->manufacture_id}}" class="badge badge-warning text-white" title="Active">Inctive</a> 
   		<?php } ?>
   </td>   
   <td>  
      <a href="" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#editModal" id="edit" data-id="{{$data->manufacture_id}}">Edit</a>
      <a class="delete btn btn-sm btn-danger text-white" data-id="{{$data->manufacture_id}}" data-token="{{csrf_token()}}" >Delete</a>
   </td>
</tr> 
@endforeach
