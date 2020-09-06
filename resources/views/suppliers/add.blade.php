@extends('layouts.main')

@section('content')
<div id="content-wrapper" class="d-flex flex-column">
	<div id="content">
		@include('partials.top_nav')
		<div class="container-fluid">
			<div class="d-sm-flex align-items-center justify-content-between mb-4">
				<h1 class="h3 mb-0 text-gray-800">Supplier - Add New</h1>
				<a href="{{route('add')}}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add Suplier</a>
			</div>
		</div>
		<div class="container-fluid">
			<div class="supliers-listing">
				<div class="form-wrp">
					<form method="POST" action="{{route('store')}}">
						@csrf
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
								<div class="form-group">
									<label>Name Or Company <span class="required">*</span></label>
									<input type="text" name="name_company" class="form-control @error('name_company') is-invalid @enderror" placeholder="Name or Company">
									@error('name_company')
									<span class="invalid-feedback text-left" role="alert">{{ $message }}</span>
									@enderror
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
								<div class="form-group">
									<label>Contact Person <span class="required">*</span></label>
									<input type="text" name="contact_person" class="form-control @error('contact_person') is-invalid @enderror" placeholder="Contact Person">
									@error('contact_person')
									<span class="invalid-feedback text-left" role="alert">{{ $message }}</span>
									@enderror
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
								<div class="form-group">
									<label>Email <span class="required">*</span></label>
									<input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="support@onericcomputing.com">
									@error('email')
									<span class="invalid-feedback text-left" role="alert">{{ $message }}</span>
									@enderror
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
								<div class="form-group">
									<label>Phone Number <span class="required">*</span></label>
									<input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" placeholder="44601010101">
									@error('phone_number')
									<span class="invalid-feedback text-left" role="alert">{{ $message }}</span>
									@enderror
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
								<div class="form-group">
									<label>Phone WhatsApp</label>
									<input type="text" name="phone_whatsApp" class="form-control" placeholder="44601010101">
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
								<div class="form-group">
									<label>Status <span class="required">*</span></label>
									<select name="status" class="custom-select select2">
                                        <option value="1" selected="true">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
								<div class="form-group">
									<label>Supplier ID <span class="required">*</span></label>
									<input type="text" name="supplier_id" class="form-control" placeholder="ONERIC00001">
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
								<div class="form-group">
									<label>Country</label>
									<select name="country" class="custom-select select2">
                                        <option selected="selected">Please Select</option>
                                        <option value="">Pakistan</option>
                                        <option value="">India</option>
                                        <option value="">Japan</option>
                                        <option value="">America</option>
                                    </select>
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
								<div class="form-group">
									<label>City <span class="required">*</span></label>
									<input type="text" name="city" class="form-control @error('city') is-invalid @enderror" placeholder="Name City">
									@error('city')
									<span class="invalid-feedback text-left" role="alert">{{ $message }}</span>
									@enderror
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
								<div class="form-group">
									<label>State <span class="required">*</span></label>
									<input type="text" name="state" class="form-control @error('state') is-invalid @enderror" placeholder="Name State">
									@error('state')
									<span class="invalid-feedback text-left" role="alert">{{ $message }}</span>
									@enderror
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
								<div class="form-group">
									<label>Postal Code</label>
									<input type="text" name="postal_code" class="form-control" placeholder="75008">
								</div>
							</div>
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
								<div class="form-group">
									<label>Address <span class="required">*</span></label>
									<textarea name="address" class="form-control textarea @error('address') is-invalid @enderror" placeholder="Enter Address" cols="30" rows="6"></textarea>
									@error('address')
									<span class="invalid-feedback text-left" role="alert">{{ $message }}</span>
									@enderror
								</div>
							</div>
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
								<div class="form-group text-right">
									<a class="btn btn-sm btn-secondary" href="{{route('suppliers')}}">Cancel</a>
									<input type="submit" name="submit" class="btn btn-sm btn-primary" value="Add">
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
