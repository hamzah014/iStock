@extends('layouts.layoutPublic')  

@section('title','Home - iStock')

@section('header')

@endsection

@section('content')

<section role="main" class="content-body">
<header class="page-header">
    <h2>Home Page</h2>
</header>

<!-- start: page -->
<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>
                    <a href="#" class="fa fa-times"></a>
                </div>

                <h2 class="panel-title">Server Usage</h2>
                <p class="panel-subtitle">It's easy to create custom graphs on JSOFT Admin Template, there are several graph types that you can use, such as lines, bars, pie charts, etc...</p>
            </header>
            <div class="panel-body">

                <!-- Flot: Curves -->
                <div class="chart chart-md" id="flotDashRealTime"></div>

            </div>
        </section>
    </div>
</div>
<!-- end: page -->
</section>

@endsection

@section('script')

@endsection