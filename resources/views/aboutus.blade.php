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
                                        <i class="fa fa-life-ring"></i>
                                    </div>
                                </div>
                                <div class="widget-summary-col">
                                    <div class="summary">
                                        <h4 class="title">Screener</h4>
                                        <div class="info">
                                            <strong class="amount">1281</strong>
                                        </div>
                                    </div>
                                    <div class="summary-footer">
                                        <a class="text-uppercase">(view all)</a>
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
                                        <i class="fa fa-life-ring"></i>
                                    </div>
                                </div>
                                <div class="widget-summary-col">
                                    <div class="summary">
                                        <h4 class="title">Sector</h4>
                                        <div class="info">
                                            <strong class="amount">1281</strong>
                                        </div>
                                    </div>
                                    <div class="summary-footer">
                                        <a class="text-uppercase">(view all)</a>
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
                                        <i class="fa fa-life-ring"></i>
                                    </div>
                                </div>
                                <div class="widget-summary-col">
                                    <div class="summary">
                                        <h4 class="title">Offered Seminar</h4>
                                        <div class="info">
                                            <strong class="amount">1281</strong>
                                        </div>
                                    </div>
                                    <div class="summary-footer">
                                        <a class="text-uppercase">(view all)</a>
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
                                        <i class="fa fa-star"></i> Donec tellus massa
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse2One" class="accordion-body collapse in">
                                <div class="panel-body">
                                    Donec tellus massa, tristique sit amet condim vel, facilisis quis sapien. Praesent id enim sit amet odio vulputate eleifend in in tortor. Donec tellus massa, tristique sit amet condim vel, facilisis quis sapien. Praesent id enim sit amet odio vulputate eleifend in in tortor. Donec tellus massa, tristique sit amet condim vel, facilisis quis sapien. Praesent id enim sit amet odio vulputate eleifend in in tortor. Donec tellus massa, tristique sit amet condim vel, facilisis quis sapien. Praesent id enim sit amet odio vulputate eleifend in in tortor. Donec tellus massa.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-accordion panel-accordion-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse2Two">
                                        <i class="fa fa-cogs"></i> Praesent id enim
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse2Two" class="accordion-body collapse">
                                <div class="panel-body">
                                    Donec tellus massa, tristique sit amet condimentum vel, facilisis quis sapien.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-accordion panel-accordion-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse2Three">
                                        <i class="fa fa-cloud"></i> Lorem ipsum dolor
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse2Three" class="accordion-body collapse">
                                <div class="panel-body">
                                    Donec tellus massa, tristique sit amet condimentum vel, facilisis quis sapien.
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