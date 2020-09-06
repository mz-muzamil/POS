@extends('layouts.main')

@section('content')
<div id="content-wrapper" class="d-flex flex-column">
	<div id="content">
		@include('partials.top_nav')
		<div class="container-fluid">
			<div class="d-sm-flex align-items-center justify-content-between mb-4">
				<h1 class="h3 mb-0 text-gray-800">{{$title}}</h1>
				<a href="{{route('add')}}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add Supplier</a>
			</div>
		</div>
		<div class="container-fluid">
			<div class="supliers-listing">
				@if(Session::has('message'))
				<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
				@endif
				<div class="table-responsive">					
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Name or Company</th>
								<th>Contact Person</th>
								<th>Email</th>
								<th class="text-center">Phone Number</th>
								<th class="text-center">Phone WhatsApp</th>
								<th class="text-center">Status</th>
								<th class="text-center">Address</th>
								<th class="text-center">Date Ceated</th>
								<th colspan="2" class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							@if(!empty($suppliers))
								@foreach($suppliers as $supplier)
									<tr>
										<td>{{$supplier['name']}}</td>
										<td>{{$supplier['contact_person']}}</td>
										<td>{{$supplier['email']}}</td>
										<td class="text-center">{{$supplier['phone_number']}}</td>
										<td class="text-center">{{$supplier['phone_whatsApp']}}</td>
										<td class="text-center">
											@if($supplier['status'] == 1)
													<span class="text-primary">Active</span>
												@else
												<span class="text-danger">Inactive</span>
											@endif
										</td>
										<td class="text-center">
											<div class="table-col-long-text" style="max-width: 150px;">
												{{$supplier['address']}}
											</div>
										</td>
										<td class="text-center">{{date("j F, Y", strtotime($supplier['created_at']))}}</td>
										<td><a class="btn btn-sm btn-primary btn-block text-white" href="{{ route('edit', $supplier['id']) }}"><i class="fas fa-pencil-alt"></i></a></td>
										<td>
											<button type="button" onclick="func_delete_supplier({{ $supplier['id'] }})" class="btn btn-sm btn-danger btn-block text-white del_supplier"><i class="fas fa-trash-alt"></i>
											</button>
											<form id="form_delete_supplier_{{ $supplier['id'] }}" method="post" action="{{ route('delete_supplier') }}">
												@csrf
												<input type="hidden" id="supplier_id" name="supplier_id" value="{{ $supplier['id'] }}"/>
											</form>
										</td>
									</tr>
								@endforeach
							@else
							<tr>
								<td colspan="9" class="text-center">No record found</td>
							</tr>
							@endif
						</tbody>
					</table>
					<div class="w-100 pagination-wrp">
						{{$suppliers->links()}}
					</div>
				</div>
			</div>
		</div>
	</div>
	@include('partials.copy_right')
</div>
@endsection

@section('footer_scripts')
<script type="text/javascript">

	$(document).ready(function(){
		
	});
	
	function func_delete_supplier(supplier_id) {
		alertify.confirm(
			'Are you sure?',
			'Are you sure you want to delete this supplier?',
			function () {
				$('#form_delete_supplier_' + supplier_id).submit();
			},
			function () {
				alertify.error('Cancelled!');
			}
		);
	}

</script>
@endsection
