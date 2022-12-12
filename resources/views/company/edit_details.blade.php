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
		<h2 class="panel-title">Edit Company</h2>
	</header>

    <form action="{{ route('company.update',$company->id) }}" method="post">
        @method('POST') 
        @csrf

        <div class="panel-body">
            <p class="text-bold">Please complete the form to update the company.</p>

            <hr/>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row pt-3">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label text-bold">Company Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $company->name }}">
                    </div>
                </div>
            </div>
            <div class="row p-3">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label text-bold">Symbol</label>
                        <input type="text" name="symbol" class="form-control" value="{{ $company->symbol }}">
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

                            <option @if($sector == $company->sector) selected @endif value="{{ $sector }}">{{ $sector }}</option>

                            @endforeach

                        </select>
                    </div>
                </div>
            </div>
        </div>
        <footer class="panel-footer">
            <button type="submit" class="btn btn-primary">Update Company</button>
        </footer>
    </form>
</section>
<!-- end: page -->
</section>

@endsection

@section('script')


@endsection