@extends('layouts.layoutUser')

@section('title','Company - iStock')

@section('header')

@endsection

@section('content')

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Company</h2>
    </header>

    <!-- default / right -->
    <div class="row">
        <div class="col-md-12">
            <div class="tabs">
                <ul class="nav nav-tabs">
                    <li class="@if(!$errors->get('datafile')) active  @endif">
                        <a href="#popular" data-toggle="tab"><i class="fa fa-star"></i> Single Submission</a>
                    </li>
                    <li class="@if($errors->get('datafile')) active  @endif">
                        <a href="#recent" data-toggle="tab">Multiple Submission</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="popular" class="tab-pane @if(!$errors->get('datafile')) active  @endif">
                                            
                        <section class="panel">
                            <header class="panel-heading">
                                <h2 class="panel-title">Register Company</h2>
                            </header>
                        
                            <form action="{{ route('company.store') }}" method="post">
                                @method('POST') 
                                @csrf
                            
                                <div class="panel-body">
                                    <p class="text-bold">Please complete the form to register new company.</p>
                                
                                    <hr/>
                                    @if ($errors->any())
                                        @if (!$errors->get('datafile'))
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    @endif
                                    
                                    <div class="row pt-3">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label text-bold">Company Name</label>
                                                <input type="text" name="name" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-3">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label text-bold">Symbol</label>
                                                <input type="text" name="symbol" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label text-bold">Sector</label>
                                                <select name="sector" id="sector" class="form-control">
                                                    <option value="">Select one sector</option>
                                                
                                                    @foreach($sectors as $sector=>$value)
                                                
                                                    <option value="{{ $sector }}">{{ $sector }}</option>
                                                
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
                    </div>
                    <div id="recent" class="tab-pane @if($errors->get('datafile')) active  @endif">
                    
                                            
                        <section class="panel">
                            <header class="panel-heading">
                                <h2 class="panel-title">Register Company</h2>
                            </header>
                        
                            <form action="{{ route('company.storeMultiple') }}" method="post" enctype="multipart/form-data">
                                @method('POST') 
                                @csrf
                            
                                <div class="panel-body">
                                    <p class="text-bold">Please complete the form to register new company.</p>
                                
                                    <hr/>
                                    @foreach ($errors->get('datafile') as $msg) 

                                        <div class="alert alert-danger">
                                            {{$msg}}
                                        </div>
                                    @endforeach
                                    
                                    <div class="row pt-3">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label text-bold">Company Data</label>
                                                <input type="file" name="datafile" class="form-control" accept=".csv" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <footer class="panel-footer">
                                    <button type="submit" class="btn btn-primary">Add Company</button>
                                </footer>
                            </form>
                        </section>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- start: page -->
<!-- end: page -->
</section>

@endsection

@section('script')


@endsection