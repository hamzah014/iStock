@extends('layouts.layoutUser')  

@section('title','Home - iStock')

@section('header')

@endsection

@section('content')

<section role="main" class="content-body">
<header class="page-header">
    <h2>About Us</h2>
</header>

<!-- start: page -->
<div class="row">
    <div class="col-md-12">
        <section class="panel">
            
            <div class="row">
                <div class="col-md-12 text-center">
                    <img src="{{ asset('assets/images/logo/logo.jpg') }}" alt="iStock" />
                </div>
            </div>

            <hr/>

            <div class="row">
				<div class="col-md-12 col-lg-12 col-xl-12">
					<section class="panel">
						<header class="panel-heading bg-primary">
							<div class="panel-heading-icon">
								<i class="fa fa-bar-chart-o"></i>
							</div>
						</header>
						<div class="panel-body text-center">
							<h3 class="text-semibold mt-sm text-center">HELPING PEOPLE INVEST BETTER</h3>
							<p class="text-center">
                                iStock is a technology company founded in 2022 with a vision to help people invest better. 
                                iStock is always ahead in providing robust free and premium stock screeners, 
                                research backed investment classes and a one-stop centre solutions for investors and traders to make an informed investment decision.
                            </p>
						</div>
					</section>
				</div>
            </div>

            <hr/>

            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="pb-lg">WHAT ARE WE PROVIDE?</h2>
                </div>
                <div class="col-md-3 col-xl-4">
                    <section class="panel">
                        <div class="panel-body bg-primary">
                            <div class="widget-summary">
                                <div class="widget-summary-col widget-summary-col-icon">
                                    <div class="summary-icon">
                                        <i class="fa fa-group"></i>
                                    </div>
                                </div>
                                <div class="widget-summary-col">
                                    <div class="summary">
                                        <h4 class="title">Company</h4>
                                        <div class="info">
                                            <strong class="amount">{{ count($companies) }}</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-md-3 col-xl-4">
                    <section class="panel">
                        <div class="panel-body bg-secondary">
                            <div class="widget-summary">
                                <div class="widget-summary-col widget-summary-col-icon">
                                    <div class="summary-icon">
                                        <i class="fa fa-suitcase"></i>
                                    </div>
                                </div>
                                <div class="widget-summary-col">
                                    <div class="summary">
                                        <h4 class="title">Sector</h4>
                                        <div class="info">
                                            <strong class="amount">{{ count($sectors) }}</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-md-3 col-xl-4">
                    <section class="panel">
                        <div class="panel-body bg-tertiary">
                            <div class="widget-summary">
                                <div class="widget-summary-col widget-summary-col-icon">
                                    <div class="summary-icon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>
                                <div class="widget-summary-col">
                                    <div class="summary">
                                        <h4 class="title">Current User</h4>
                                        <div class="info">
                                            <strong class="amount">{{ count($users) }}</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

            <hr/>

            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="pb-lg">FAQs</h2>
                </div>
                <div class="col-md-12">
                    <div class="panel-group" id="accordion2">
                        <div class="panel panel-accordion panel-accordion-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse2One">
                                        <i class="fa fa-question-circle"></i> What is iStock?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse2One" class="accordion-body collapse in">
                                <div class="panel-body">
                                    iStock provides "trading tools" to help investors choose the best stocks. 
                                    You can add your favorite stocks from the screener created by iStock and it will display on your dashboard. <br/>
                                    iStock also provide up-to-date news about stock market. 
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-accordion panel-accordion-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse2Two">
                                        <i class="fa fa-user"></i> How to register with iStock?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse2Two" class="accordion-body collapse">
                                <div class="panel-body">
                                    Log in to your iStock account using email and password. <br/>
                                    You can also register your account by fill in requirement details.  
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-accordion panel-accordion-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse2Three">
                                        <i class="fa fa-bar-chart-o"></i> Where can I use the prediction data of stock market?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse2Three" class="accordion-body collapse">
                                <div class="panel-body">
                                    You can use our service prediction data after completed register and log-in into our system. 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </section>
    </div>
</div>
<!-- end: page -->
</section>

@endsection

@section('script')

@endsection