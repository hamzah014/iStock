@extends('layouts.layoutUser')

@section('title','Screener - iStock')

@section('header')

<link rel="stylesheet" href="{{ asset('assets/vendor/select2/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatables-bs3/assets/css/datatables.css') }}" />

@endsection

@section('content')

<section role="main" class="content-body">
<header class="page-header">
    <h2>Screener</h2>
</header>

<!-- start: page -->
<section class="panel">
	<header class="panel-heading">
		<div class="panel-actions">
			<a href="#" class="fa fa-caret-down"></a>
		</div>

		<h2 class="panel-title">All Screener</h2>
	</header>
	<div class="panel-body">
		<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
			<thead>
				<tr>
					<th>Name</th>
					<th>Categories</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>CCI Cross</td>
					<td>Oversold Screeners</td>
					<td class="text-center"><a class="btn btn-sm btn-info" href="#">View Details</a></td>
				</tr>
				<tr>
					<td>Bird of Bursa</td>
					<td>Dividen Screeners</td>
					<td class="text-center"><a class="btn btn-sm btn-info" href="#">View Details</a></td>
				</tr>
				<tr>
					<td>T+ Screener</td>
					<td>Breakout Screeners</td>
					<td class="text-center"><a class="btn btn-sm btn-info" href="#">View Details</a></td>
				</tr>
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