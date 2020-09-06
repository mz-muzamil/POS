@extends('layouts.main')

@section('content')
<div id="content-wrapper" class="d-flex flex-column">
	<!-- Main Content -->
	<div id="content">
		@include('partials.top_nav')
		<div class="container-fluid">
			<div class="d-sm-flex align-items-center justify-content-between mb-4">
				<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
				<a href="javascript:;" class="btn btn-sm btn-primary"><i class="fas fa-download"></i> Generate Report</a>
			</div>
		</div>
	</div>
	@include('partials.copy_right')
</div>
@endsection
