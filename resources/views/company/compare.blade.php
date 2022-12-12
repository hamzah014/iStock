@extends('layouts.layoutUser')

@section('title','Company - iStock')

@section('header')

@endsection

@section('content')

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Company</h2>
    </header>
    
    <!-- start: page -->
    <section class="panel">
    	<header class="panel-heading">
    		<h2 class="panel-title">Compare Stock Price Company</h2>
    	</header>
    
        <form action="{{ route('company.store') }}" method="post">
            @method('POST') 
            @csrf
        
            <div class="panel-body">
                <p class="text-bold">Please choose company to make comparison on their stock price.</p>
                
                <div class="row pt-3">
						
                    <div class="form-group">
                        <label class="col-md-12 control-label text-bold">Date range</label>
                        <div class="col-md-6">
                            <div class="input-daterange input-group">
                                <span class="input-group-addon">From</span>
                                <input type="text" class="form-control" name="start">
                                <span class="input-group-addon">to</span>
                                <input type="text" class="form-control" name="end">
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label text-bold">Sector</label>
                            <select name="sector" id="sector" class="form-control">
                                <option value="">Select one sector</option>
                            
                                @foreach($companies as $company=>$value)
                            
                                <option value="{{ $company }}">{{ $company }}</option>
                            
                                @endforeach
                            
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label text-bold">Sector</label>
                            <select name="sector" id="sector" class="form-control">
                                <option value="">Select one sector</option>
                            
                                @foreach($companies as $company=>$value)
                            
                                <option value="{{ $company }}">{{ $company }}</option>
                            
                                @endforeach
                            
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="panel-footer">
                <button type="submit" class="btn btn-primary">Add Company</button>
            </footer>
        </form>
    </section>
<!-- end: page -->
</section>

@endsection

@section('script')


@endsection