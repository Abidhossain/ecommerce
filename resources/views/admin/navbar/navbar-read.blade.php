@php $i = 1; @endphp
@foreach($navbar_infos as $data)
<tr>
   <td>{{$i++}}</td>
   <td>{{$data->main_nav_name}}</td>  
   <td>{{$data->main_nav_url}}</td>  
   <td>  
      <a href="" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#editModal" id="edit" data-id="{{$data->main_nav_id}}">Edit</a>
      <a class="delete btn btn-sm btn-danger text-white" data-id="{{$data->main_nav_id}}" data-token="{{csrf_token()}}" >Delete</a>
   </td>
</tr> 
@endforeach
