@extends('layouts.main')

@section('content')
<div id="content-wrapper" class="d-flex flex-column">
	<div id="content">
		@include('partials.top_nav')
		<div class="container-fluid">
			<div class="d-sm-flex align-items-center justify-content-between mb-4">
				<h1 class="h3 mb-0 text-gray-800">{{$title}}</h1>
				<a href="{{route('add_product')}}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add Product</a>
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
								<th>Sr. No</th>
								<th>Product</th>
								<th>Purchase Date</th>
								<th>Supplier</th>
								<th class="text-center">Single Item Price</th>
								<th class="text-center">Quantity</th>
								<th class="text-center">Total Amount</th>
								<th class="text-center">Amount Paid</th>
								<th class="text-center">Amount Due</th>
								<th colspan="2" class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							@if(!empty($products))
								@foreach($products as $key_product => $product)
									<tr>
										<td>{{$key_product+1}}</td>
										<td>{{$product['product_name']}}</td>
										<td>{{date("j F, Y", strtotime($product['purchase_date']))}}</td>
										<td>{{$product['supplier_id']}}</td>
										<td class="text-center">Rs, {{$product['product_price']}}</td>
										<td class="text-center">{{$product['product_quantity']}}</td>
										<td class="text-center">Rs, {{$product['total_amount']}}</td>
										<td class="text-center">Rs, {{$product['amount_paid']}}</td>
										<td class="text-center">Rs, {{$product['amount_due']}}</td>
										<td><a class="btn btn-sm btn-primary btn-block text-white" href="{{ route('edit_product', $product['id']) }}"><i class="fas fa-pencil-alt"></i></a></td>
										<td>
											<button type="button" onclick="func_delete_product({{ $product['id'] }})" class="btn btn-sm btn-danger btn-block text-white del_product"><i class="fas fa-trash-alt"></i>
											</button>
											<form id="form_delete_product_{{ $product['id'] }}" method="post" action="{{ route('delete_product') }}">
												@csrf
												<input type="hidden" id="product_id" name="product_id" value="{{ $product['id'] }}"/>
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
						{{$products->links()}}
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
	
	function func_delete_product(supplier_id) {
		alertify.confirm(
			'Are you sure?',
			'Are you sure you want to delete this product?',
			function () {
				$('#form_delete_product_' + supplier_id).submit();
			},
			function () {
				alertify.error('Cancelled!');
			}
		);
	}

</script>
@endsection
