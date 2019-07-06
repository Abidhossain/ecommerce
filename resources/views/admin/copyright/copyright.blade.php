@extends('admin.admin-master')
@section('title','E-Shopper | Category List') 
@section('content')

<div class="row"> 
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">   
				<h4>Copyright </h4>
					<div class="row">
						<div class="col-3"></div>
						<div class="col-6">
				<form action="{{url('Copyright-update')}}" method="post">
				@csrf 
									<div class="form-group">
										<label for="copyright_text">Copyright:</label>
										<input class="form-control" type="text" name="copyright_text" id="copyright_text" placeholder="Update Copyright" value="{{$copyright->copyright_text}}" required>
									</div>
									<div class="form-group">
										<label for="hyper_link">Hyper Link:</label>
										<input class="form-control" type="text" name="hyper_link" id="hyper_link" placeholder="Hyper Link" value="{{$copyright->hyper_link}}" required>
									</div>
							         <div class="modal-footer">
							         	<button type="submit" class="btn btn-sm btn-warning" name="submit" id="submit">Update</button>  
							         </div>
				</form>
						</div>
					</div>
			</div>
		</div>
	</div>
</div>
@endsection