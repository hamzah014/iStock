@extends('layouts.layoutUser')

@section('title','Dashboard - iStock')

@section('header')

@endsection

@section('content')

<section role="main" class="content-body">
<header class="page-header">
    <h2>Dashboard</h2>
</header>

<!-- start: page -->
<div class="row">
    <div class="col-md-12">
        <section class="panel">
        
			<h2 class="mt-none">Dashboard Charts</h2>
			<p class="mb-lg"></p>
			
			<div class="row">
				<div class="col-md-4">
					<section class="panel">
						<header class="panel-heading bg-white">
							<div class="panel-heading-icon bg-primary mt-sm">
								<i class="fa fa-user"></i>
							</div>
						</header>
						<div class="panel-body">
							<h3 class="text-semibold mt-none text-center">Registered User : {{ count($users) }}</h3>
						</div>
					</section>
				</div>
				<div class="col-md-4">
					<section class="panel">
						<header class="panel-heading bg-white">
							<div class="panel-heading-icon bg-info mt-sm">
								<i class="fa fa-users"></i>
							</div>
						</header>
						<div class="panel-body">
							<h3 class="text-semibold mt-none text-center">Data Company : {{ count($companies) }}</h3>
						</div>
					</section>
				</div>
				<div class="col-md-4">
					<section class="panel">
						<header class="panel-heading bg-white">
							<div class="panel-heading-icon bg-secondary mt-sm">
								<i class="fa fa-briefcase"></i>
							</div>
						</header>
						<div class="panel-body">
							<h3 class="text-semibold mt-none text-center">Company Sector : {{ count($sectors) }}</h3>
						</div>
					</section>
				</div>
			</div>
            
        </section>
    </div>
</div>
<!-- end: page -->
</section>

@endsection

@section('script')

<script src="{{ asset('assets/javascripts/ui-elements/examples.charts.js') }}"></script>

@endsection