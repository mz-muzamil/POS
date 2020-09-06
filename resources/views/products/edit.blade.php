@extends('layouts.main')

@section('content')
<div id="content-wrapper" class="d-flex flex-column">
	<div id="content">
		@include('partials.top_nav')
		<div class="container-fluid">
			<div class="d-sm-flex align-items-center justify-content-between mb-4">
				<h1 class="h3 mb-0 text-gray-800">{{$title}}</h1>
			</div>
		</div>
		<div class="container-fluid">
			<div class="supliers-listing">
				<div class="form-wrp">
					<form method="POST" action="{{ route('update_product', $product['id']) }}">
						@csrf
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
								<div class="form-group">
									<label>Product <span class="required">*</span></label>
									<input type="text" name="product_name" class="form-control @error('product_name') is-invalid @enderror" placeholder="Product" value="{{ old('product_name',$product['product_name']) }}">
									@error('product_name')
									<span class="invalid-feedback text-left" role="alert">{{ $message }}</span>
									@enderror
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
								<div class="form-group">
									<label>Purchase Date <span class="required">*</span></label>
									<input type="text" name="purchase_date" class="form-control datepicker @error('purchase_date') is-invalid @enderror" value="{{ old('purchase_date',$product['purchase_date']) }}">
									@error('purchase_date')
									<span class="invalid-feedback text-left" role="alert">{{ $message }}</span>
									@enderror
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
								<div class="form-group">
									<label>Supplier <span class="required">*</span></label>
									<select name="supplier_id" class="custom-select select2 @error('supplier_id') is-invalid @enderror">
										<option value="none" selected="true">Please Select</option>
										@foreach($suppliers as $supplier)
											<option value="{{$supplier->id}}" {{ ( $supplier->id == $product['supplier_id']) ? 'selected' : '' }}>{{$supplier->name}}</option>
										@endforeach
                                    </select>
									@error('supplier_id')
									<span class="invalid-feedback text-left" role="alert">{{ $message }}</span>
									@enderror
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
								<div class="form-group">
									<label>Product Price <span class="required">*</span></label>
									<input id="product_price" type="text" name="product_price" class="form-control @error('product_price') is-invalid @enderror" placeholder="Rs, 2345" value="{{ old('product_price',$product['product_price']) }}">
									@error('product_price')
									<span class="invalid-feedback text-left" role="alert">{{ $message }}</span>
									@enderror
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
								<div class="form-group">
									<label>Quantity <span class="required">*</span></label>
									<input id="product_quantity" type="number" name="product_quantity" class="form-control" placeholder="0" value="{{ old('product_quantity',$product['product_quantity']) }}">
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
								<div class="form-group">
									<label>Total Amount <span class="required">*</span></label>
									<input id="total_amount" type="text" name="total_amount" class="form-control @error('total_amount') is-invalid @enderror" placeholder="Rs, 23432" value="{{ old('total_amount',$product['total_amount']) }}">
									@error('total_amount')
									<span class="invalid-feedback text-left" role="alert">{{ $message }}</span>
									@enderror
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
								<div class="form-group">
									<label>Amount Paid <span class="required">*</span></label>
									<input id="amount_paid" type="text" name="amount_paid" class="form-control @error('amount_paid') is-invalid @enderror" placeholder="Rs, 10000" value="{{ old('amount_paid',$product['amount_paid']) }}">
									@error('amount_paid')
									<span class="invalid-feedback text-left" role="alert">{{ $message }}</span>
									@enderror
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
								<div class="form-group">
									<label>Amount Due <span class="required">*</span></label>
									<input id="amount_due" type="text" name="amount_due" class="form-control @error('amount_due') is-invalid @enderror" placeholder="Rs, 13432" value="{{ old('amount_due',$product['amount_due']) }}">
									@error('amount_due')
									<span class="invalid-feedback text-left" role="alert">{{ $message }}</span>
									@enderror
								</div>
							</div>
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
								<div class="form-group text-right">
									<a class="btn btn-sm btn-secondary" href="{{route('products')}}">Cancel</a>
									<input type="submit" name="submit" class="btn btn-sm btn-primary" value="Update">
								</div>
							</div>
						</div>
					</form>
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
		$('#total_amount').keyup(calculate_purchase_amount);
		$('#amount_paid').keyup(calculate_purchase_amount);
		
		$("#product_quantity").bind('keyup mouseup', function () {
			var product_quantity = $(this).val();
			var product_price = $('#product_price').val();
			$('#total_amount').val(product_quantity * product_price);
			$('#amount_due').val($('#total_amount').val() - $('#amount_paid').val());
		});

	});


	function calculate_purchase_amount(e){
		if($('#amount_paid').val() ) {
			$('#amount_due').val($('#total_amount').val() - $('#amount_paid').val());
		}
	}

</script>
@endsection
