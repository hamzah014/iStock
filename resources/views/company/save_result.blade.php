@extends('layouts.layoutUser')

@section('title','Company - iStock')

@section('header')

<link rel="stylesheet" href="{{ asset('assets/vendor/select2/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatables-bs3/assets/css/datatables.css') }}" />

<!-- Specific Page Vendor CSS -->
<link rel="stylesheet" href="{{ asset('assets/vendor/pnotify/pnotify.custom.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/magnific-popup/magnific-popup.css') }}" />

@endsection

@section('content')

@inject('favoriteComp', 'App\Models\FavoriteCompany')

<section role="main" class="content-body">
<header class="page-header">
    <h2>Company Submission</h2>
</header>

<!-- start: page -->
<section class="panel">
	<header class="panel-heading">
		<div class="panel-actions">
			<a href="#" class="fa fa-caret-down"></a>
		</div>

		<h2 class="panel-title">All Company</h2>
	</header>
	<div class="panel-body">
        <h5>Total Line : {{ $totalLine}}</h5>
        <table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
            <thead>
                <tr>
                    <th>Symbol</th>
                    <th>Name</th>
                    <th>Sector</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($arrayData as $data)
                <tr class="gradeX">
					<td>{{ $data['symbol'] }}</td>
					<td>{{ $data['name'] }}</td>
					<td>{{ $data['sector'] }}</td>
					<td>{{ $data['status'] }}</td>
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
		
<!-- Specific Page Vendor -->
<script src="{{ asset('assets/vendor/pnotify/pnotify.custom.js') }}"></script>
<script src="{{ asset('assets/vendor/magnific-popup/magnific-popup.js') }}"></script>

<script>

</script>

@endsection