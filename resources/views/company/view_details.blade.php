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
		<h2 class="panel-title">Details Company</h2>
	</header>
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="tabs">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#overview" data-toggle="tab"><i class="fa fa-info-circle"></i> Overview</a>
                    </li>
                    <li>
                        <a href="#stock" data-toggle="tab"><i class="fa fa-bar-chart-o"></i> Stock Data</a>
                    </li>
                    <li>
                        <a href="#predict" data-toggle="tab"><i class="fa fa-bar-chart-o"></i> Stock Price Prediction</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="overview" class="tab-pane active">
                        <p>Details of Company</p>
                    
						<div class="table-responsive row">
						    <div class="col-md-6">
						    	<table class="table mb-none table-bordered">
						    		<tbody>
						    			<tr>
                                            <th>Symbol</th>
						    				<td>{{ $company->symbol }}</td>
						    			</tr>
                                        <tr>
                                            <th>Name</th>
						    				<td>{{ $company->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Sector</th>
						    				<td>{{ $company->sector }}</td>
                                        </tr>
						    		</tbody>
						    	</table>
						    </div>
						</div>
                    </div>
                    <div id="stock" class="tab-pane">
                        <p>Stock Market Data - {{ $company->symbol }}</p>
                        <div class="panel-body">

							<input type="text" name="stockname" id="stockname" hidden value="{{ $company->symbol }}">

							<div class="row pt-3">
								<div class="col-sm-6">
									<div class="form-group">
										<label class="control-label text-bold">Start Date</label>
										<input type="date" name="startDate" id="startDate" class="form-control">
									</div>
								</div>
							</div>

							<div class="row pt-3">
								<div class="col-sm-6">
									<div class="form-group">
										<label class="control-label text-bold">Last Date</label>
										<input type="date" name="lastDate" id="lastDate" class="form-control">
									</div>
								</div>
							</div>

							<div class="row pt-3">
								<div class="col-sm-6">
									<div class="form-group">
										<button class="btn btn-sm btn-info" onclick="testdata()">Search Data</button>
										<div id="loading-section">
											{{-- <span class="bg-warning well-sm well-warning"><i class="fa fa-spinner fa-spin"></i> Data is loading....</span> --}}
										</div>
									</div>
								</div>
							</div>
							<br/>
							<br/>
            
                            <!-- Flot: Curves -->
                            <div class="chart-md pt-5" id="chart"></div>
            
                        </div>
                    </div>
                    <div id="predict" class="tab-pane">
                        <p>Stock Price Prediction Data - {{ $company->symbol }}</p>
                        <div class="panel-body">

							<input type="text" name="stockname" id="stockname" hidden value="{{ $company->symbol }}">

							<div class="row pt-3">
								<div class="col-sm-6">
									<div class="form-group">
										<h4>Date Range Data :</h4>
									</div>
								</div>
							</div>
							<div class="row pt-3">
								<div class="col-sm-6">
									<div class="form-group">
										<label class="control-label text-bold">From</label>
										<input type="date" name="fromDate" id="fromDate" class="form-control">
									</div>
								</div>
							</div>

							<div class="row pt-3">
								<div class="col-sm-6">
									<div class="form-group">
										<label class="control-label text-bold">To</label>
										<input type="date" name="toDate" id="toDate" class="form-control">
									</div>
								</div>
							</div>

							<div class="row pt-3" style="padding-top: 20px">
								<div class="col-sm-6">
									<div class="form-group">
										<h4>Time Range Prediction :</h4>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label class="control-label text-bold">Time Predicition</label>
										
										<div class="form-group row">
											<div class="col-md-6">
												<input type="number" class="form-control" min="0" id="rangeNo" name="rangeNo" placeholder="Please enter number of range period.">
											</div>
											<div class="col-md-6">
												<select name="rangeType" id="rangeType" class="form-control">
													<option value="">Select type</option>
													<option value="day">Day</option>
													<option value="week">Week</option>
													<option value="month">Month</option>
													<option value="year">Year</option>
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="row" style="padding-top: 30px">
								<div class="col-sm-6">
									<div class="form-group">
										<button class="btn btn-sm btn-info" type="button" onclick="predictDatas()">Search Data</button>
										<div id="loading-section-predict">
											{{-- <span class="bg-warning well-sm well-warning"><i class="fa fa-spinner fa-spin"></i> Data is loading....</span> --}}
										</div>
									</div>
								</div>
							</div>
							<br/>
							<br/>
            
                            <!-- Flot: Curves -->
                            <div class="chart-md pt-5" id="predictChart"></div>
            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end: page -->

@endsection

@section('script')

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>

	var dataapi = [];

	function showChart(datass,stock){
		
		var options = {
		series: [{
		name: 'candle',
		data: datass
		}],
		chart: {
		height: 350,
		type: 'candlestick',
		},
		title: {
		text: 'Stock Data Information - '+stock,
		align: 'left'
		},
		tooltip: {
		enabled: true,
		},
		xaxis: {
			type: 'Value',
			labels: {
				formatter: function(val) {
				return formatDate(val);
				}
		}
		},
		yaxis: {
			type: 'Date',
			tooltip: {
				enabled: true
			}
		}
		};


		var chart = new ApexCharts(document.querySelector("#chart"), options);
		chart.render();
		
		$("#loading-section").html('');

	}

    function showLine(actualData,predictData,dateData){
        
		console.log(actualData);
		console.log(dateData);
        var options = {
        series: [{
            name: "Actual",
            data: actualData
        },
        {
            name: "Prediction",
            data: predictData
        }
        ],
        chart: {
        height: 350,
        type: 'line',
        zoom: {
            type: 'x',
            enabled: true,
            autoScaleYaxis: true
        },
        },
        title: {
        text: 'Stock Market Price Prediction',
        align: 'left'
        },
        markers: {
        size: 0,
        hover: {
            sizeOffset: 6
        }
        },
        xaxis: {
        categories: dateData
        },
        grid: {
        borderColor: '#f1f1f1',
        }
        };

        var chart = new ApexCharts(document.querySelector("#predictChart"), options);
        chart.render();
		
		$("#loading-section-predict").html('');

    }

	
	function testdata(){

		$("#loading-section").html('<span class="bg-warning well-sm well-warning"><i class="fa fa-spinner fa-spin"></i> Data is loading....</span>');

		var stockname = $('#stockname').val();
		var startDate = $('#startDate').val();
		var lastDate = $('#lastDate').val();
		console.log("stock "+stockname);
		console.log("start "+startDate);
		console.log("last "+lastDate);
		$('#chart').html('');
			
		url = "http://127.0.0.1:5000/stockData";

		datas = {
			'stock':stockname,
			'startDate':startDate,
			'lastDate':lastDate
		};

		if(startDate && lastDate){
	
			$.ajax({
				url: url,
				type: 'POST',
				dataType: 'json',
				data: JSON.stringify(datas),
				crossDomain: true,
				contentType : 'application/json',
				success: function(result){

					dataapi = [];

					console.log("start result");
					console.log(result);
						
					console.log( "length " + Object.keys(result['Date']).length );

					var arrayLength = Object.keys(result['Date']).length;
					var loop = 0;

					if(arrayLength < 1){

						$('#chart').html('<span class="alert alert-danger">Sorry, there is no stock data available yet.</span>');

					}else{

						for (let i = 0; i < arrayLength; i++) {
							
							console.log( "date " + result['Date'][i] );
							console.log( "Open " + result['Open'][i] );
							console.log( "Close " + result['Close'][i] );
							console.log( "High " + result['High'][i] );
							console.log( "Low " + result['Low'][i] );

							var dateval     = result['Date'][i];
							var openval     = result['Open'][i].toFixed(2);
							var closeval    = result['Close'][i].toFixed(2);
							var highval     = result['High'][i].toFixed(2);
							var lowval      = result['Low'][i].toFixed(2);

							var arraydata = {
												x: new Date(dateval),
												y: [openval,highval,lowval,closeval]
											};

							dataapi.push(arraydata);

						}

						console.log(dataapi);
						showChart(dataapi,stockname);

					}


				}
			});
	
		}
	
	}

	function predictDatas(){

		$("#loading-section-predict").html('<span class="bg-warning well-sm well-warning"><i class="fa fa-spinner fa-spin"></i> Data is loading....</span>');

        var stockname = $('#stockname').val();
        var fromDate = $('#fromDate').val();
        var toDate = $('#toDate').val();
        var rangeNo = $('#rangeNo').val();
        var rangeType = $('#rangeType').val();
        console.log("stock "+stockname);

		var period = 0;

		if(rangeType == "year"){

			period = rangeNo * 365;

		}else if(rangeType == "month"){

			period = rangeNo * 30;

		}else if(rangeType == "week"){

			period = rangeNo * 7;

		}else{

			period = rangeNo;

		}
            
        url = "http://127.0.0.1:5000/fbprophet";

        datas = {
		    'stock':stockname,
		    'startDate':fromDate,
		    'lastDate':toDate,
		    'period':period
        };
        
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: JSON.stringify(datas),
            crossDomain: true,
            contentType : 'application/json',
            success: function(result){

                actualData = [];
                predictData = [];
                dateData = [];

                console.log("start result");
                console.log(result);
                    
                console.log( "length " + Object.keys(result['ds']).length );

                var arrayLength = Object.keys(result['ds']).length;
                var loop = 0;

				if(arrayLength < 1){

					$('#chart').html('<span class="alert alert-danger">Sorry, there is no stock data available yet.</span>');

				}else{

                	for (let i = 0; i < arrayLength; i++) {
					
                	    console.log( "date " + result['ds'][i] );
                	    console.log( "predict " + result['yhat'][i] );
                	    console.log( "actual " + result['y'][i] );

                	    var dateval         = formatDate(result['ds'][i]);
                	    var predictVal      = (result['yhat'][i]).toFixed(2);

                	    if(result['y'][i] == null){
                	        actualVal = null;
                	    }else{
                	        var actualVal       = (result['y'][i]).toFixed(2);
                	    }

                	    actualData.push(actualVal);
                	    predictData.push(predictVal);
                	    dateData.push(dateval);

                	}
				}
                console.log(actualData);
                console.log(predictData);
                console.log(dateData);
                showLine(actualData,predictData,dateData);


            }
        });
        
	
	}

	function formatDate(date){
		var d = new Date(date),
			month = '' + (d.getMonth() + 1),
			day = '' + d.getDate(),
			year = d.getFullYear();

		if (month.length < 2) 
			month = '0' + month;
		if (day.length < 2) 
			day = '0' + day;

		return [day, month, year].join('-');
	}



</script>



@endsection