@php $i = 1; @endphp
@foreach($sub_nav_infos as $data)
<tr>
   <td>{{$i++}}</td>
   <td>{{$data->sub_nav_name}}</td>  
   <td>{{$data->sub_nav_url}}</td>  
   <td>{{$data->main_nav_name}}</td>  
   <td>  
      <a href="" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#editModal" id="edit" data-id="{{$data->sub_nav_id}}">Edit</a>
      <a class="delete btn btn-sm btn-danger text-white" data-id="{{$data->sub_nav_id}}" data-token="{{csrf_token()}}" >Delete</a>
   </td>
</tr> 
@endforeach
