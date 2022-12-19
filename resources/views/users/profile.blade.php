@extends('layouts.layoutUser')

@section('title','Profile - iStock')

@section('header')


@endsection

@section('content')

<section role="main" class="content-body">
<header class="page-header">
    <h2>Profile</h2>
</header>

<!-- start: page -->
<section class="panel">
	<header class="panel-heading">
		<div class="panel-actions">
			<a href="#" class="fa fa-caret-down"></a>
		</div>

		<h2 class="panel-title">User Profile</h2>
	</header>
	<div class="panel-body">
        <div class="tabs">
            <ul class="nav nav-tabs tabs-primary">
                <li class="active">
                    <a href="#info" data-toggle="tab">User Information</a>
                </li>
                <li class="">
                    <a href="#account" data-toggle="tab">Account Information</a>
                </li>
            </ul>
            <div class="tab-content">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div id="info" class="tab-pane active">
                    <form class="form-horizontal" action="{{ route('trader.profile.update',Auth::user()->id) }}" method="post">
                        @method('POST') 
                        @csrf
                        <h4 class="mb-xlg">Personal Information</h4>
                        <fieldset>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="profileFirstName">Full Name <span class="text-danger">*</span> </label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="profileAddress">Birthdate <span class="text-danger">*</span> </label>
                                <div class="col-md-8">
                                    <input type="date" class="form-control" id="birthdate" name="birthdate" value="@php if(!empty($profile)){ echo $profile->birthdate; } @endphp">
                                </div>
                            </div>
                        </fieldset>
                        <hr class="dotted tall">
                        <h4 class="mb-xlg">About Yourself</h4>
                        <fieldset>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="profileBio">Biographical Info</label>
                                <div class="col-md-8">
                                    <textarea name="bio" class="form-control" rows="3" id="bio">@php if(!empty($profile)){ echo $profile->bio; } @endphp</textarea>
                                </div>
                            </div>
                        </fieldset>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-md-9 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-default">Reset</button>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
                <div id="account" class="tab-pane">

                    <form class="form-horizontal" action="{{ route('trader.password.reset',Auth::user()->id) }}" method="post">
                        @csrf
                        
						<h4 class="mb-xlg">Change Password</h4>
						<fieldset class="mb-xl">
							<div class="form-group">
								<label class="col-md-3 control-label" for="profileNewPassword">New Password</label>
								<div class="col-md-8">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">    
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="profileNewPasswordRepeat">Repeat New Password</label>
								<div class="col-md-8">
                                    <input id="password-confirm" type="password" class="form-control" name="repeat_password" required autocomplete="new-password">
								</div>
							</div>
						</fieldset>
						<div class="panel-footer">
							<div class="row">
								<div class="col-md-9 col-md-offset-3">
									<button type="submit" class="btn btn-primary">Submit</button>
									<button type="reset" class="btn btn-default">Reset</button>
								</div>
							</div>
						</div>

                    </form>

                </div>

            </div>
        </div>
        
	</div>
</section>
<!-- end: page -->
</section>

@endsection

@section('script')

@endsection