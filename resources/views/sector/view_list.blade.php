@extends('layouts.layoutUser')

@section('title','Screener - iStock')

@section('header')

<link rel="stylesheet" href="{{ asset('assets/vendor/select2/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatables-bs3/assets/css/datatables.css') }}" />

@endsection

@section('content')

<section role="main" class="content-body">
<header class="page-header">
    <h2>Sector</h2>
</header>

<!-- start: page -->
<section class="panel">
	<header class="panel-heading">
		<div class="panel-actions">
			<a href="#" class="fa fa-caret-down"></a>
		</div>

		<h2 class="panel-title">All Sector</h2>
	</header>
	<div class="panel-body">
		<table class="table table-bordered table-striped mb-none text-center" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
			<thead>
				<tr>
					<th class="text-center">#</th>
					<th class="text-center">Categories</th>
					<th class="text-center">Action</th>
				</tr>
			</thead>
			<tbody>
				@php
					$no = 1;	
				@endphp
				@foreach($sectors as $sector=>$value)
				<tr>
					<td>{{ $no++ }}</td>
					<td>{{ $sector }}</td>
					<td class="text-center">
						<a class="btn btn-sm btn-info" href="{{ route('sector.company.list',$sector) }}"><i class="fa fa-eye"></i> View</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</section>
<!-- end: page -->
</section>

@endsection

@section('script')

<script src="{{ asset('assets/vendor/select2/select2.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatables/media/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatables-bs3/assets/js/datatables.js') }}"></script>

<script src="{{ asset('assets/javascripts/tables/examples.datatables.default.js') }}"></script>
<script src="{{ asset('assets/javascripts/tables/examples.datatables.row.with.details.js') }}"></script>
<script src="{{ asset('assets/javascripts/tables/examples.datatables.tabletools.js') }}"></script>

@endsection