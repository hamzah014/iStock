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
    <h2>Dashboard</h2>
</header>

<!-- start: page -->
<section class="panel">
	<header class="panel-heading">
		<div class="panel-actions">
			<a href="#" class="fa fa-caret-down"></a>
		</div>

		<h2 class="panel-title">My Favorite Company</h2>
	</header>
	<div class="panel-body">
        <input value="{{Auth::user()->id}}" id="user_id" name="user_id" style="display: none">
		<table class="table table-bordered table-striped mb-none text-center" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
			<thead>
				<tr>
					<th class="text-center">Symbol</th>
					<th class="text-center">Name</th>
					<th class="text-center">Sector</th>
					<th class="text-center d-print-none">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($favoriteCompany as $company)
				<tr>
					<td>{{ $company->company->symbol }}</td>
					<td>{{ $company->company->name }}</td>
					<td>{{ $company->company->sector }}</td>
					<td class="text-center d-print-none">

                        <a class="btn btn-sm btn-info" href="{{ route('company.details',$company->company->id) }}"><i class="fa fa-eye"></i> View</a>
                        @php
                            $iconset = "fa fa-heart-o";
                            $fm = $favoriteComp->where('user_id',Auth::user()->id)->where('company_id',$company->company->id)->get();

                            if(count($fm) > 0){
                                $iconset = "fa fa-heart"; 
                            }
                        
                        @endphp
                        
                        <button class="btn btn-sm btn-primary" onclick="favcompany('{{$company->company->id}}')">
                            <i id="heart-{{$company->company->id}}" class="{{ $iconset }}"></i> Add Favorite
                        </button>
                    </td>
				</tr>
				@endforeach
			</tbody>
		</table>
        <button id="btn_noti" class="mt-sm mb-sm btn btn-primary" style="display:none">Add</button>
        <button id="btn_noti2" class="mt-sm mb-sm btn btn-danger" style="display:none">Delete</button>
        
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
        
    (function( $ ) {

        'use strict';
        
        /*
        Default Notifications
        */
        $('#btn_noti').click(function() {
            new PNotify({
                title: 'Add to Favorite',
                text: 'Successfully add company to favorite',
                type: 'custom',
                addclass: 'notification-warning',
                icon: 'fa fa-heart'
            });
        });

        $('#btn_noti2').click(function() {
            new PNotify({
                title: 'Remove from Favorite',
                text: 'Successfully remove company from favorite',
                type: 'custom',
                addclass: 'notification-warning',
                icon: 'fa fa-heart'
            });
        });

    }).apply( this, [ jQuery ]);


    function favcompany(compid){

        //define user id
        user_id = $('#user_id').val();

        //triggered button to popup notification
        //$('#btn_noti').click();

        //toggle icon heart
        

        $.ajax({
            url:'{{ route("favorite.store",Auth::user()->id) }}',
            type: 'GET',
            data: {
                company_id : compid,
                user_id : user_id
            },
            success: function (data){
            
                console.log("final value = "+data);

                // data = 0 - delete fav, 1 = add fav
                if(data == 0){
                    $('#btn_noti2').click();
                }else{
                    $('#btn_noti').click();
                }

                $('#heart-'+compid).toggleClass( "fa-heart fa-heart-o" );
            
            },
            error: function(x,e){
                alert(x+e);
            }
        
        
        });


    }

</script>

@endsection