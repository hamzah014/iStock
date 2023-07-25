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
    		<h2 class="panel-title">Comparison Prediction Stock Price Company</h2>
    	</header>
    
        <div>
        
            <div class="panel-body">
                <p class="text-bold">Please choose company to make comparison on their stock price.</p>
                <hr/>
                
                <div class="row">
						
                    <div class="form-group">
                        <label class="col-md-12 control-label text-bold">Date range</label>
                        <div class="col-md-6">
                            <div class="input-daterange input-group">
                                <span class="input-group-addon">From</span>
                                <input type="date" class="form-control" name="startDate" id="startDate">
                                <span class="input-group-addon">To</span>
                                <input type="date" class="form-control" name="endDate" id="endDate">
                            </div>
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
							<label class="control-label text-bold">Number of Period Predicition</label>
							
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
                <div class="row" style="padding-top: 20px">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label text-bold">Company</label>
                            <select name="random[]" id="sector" class="form-control">
                                <option value="">Select one company</option>
                            
                                @foreach($companies as $company)
                            
                                <option value="{{ $company->symbol }}">{{ $company->symbol }} ({{ $company->name }})</option>
                            
                                @endforeach
                            
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label text-bold">Company</label>
                            <select name="random[]" id="sector" class="form-control">
                                <option value="">Select one company</option>
                            
                                @foreach($companies as $company)
                            
                                <option value="{{ $company->symbol }}">{{ $company->symbol }} ({{ $company->name }})</option>
                            
                                @endforeach
                            
                            </select>
                        </div>
                        {{-- <div style="display: none">
                            <div class="form-group" id="section-sector">
                                <label class="control-label text-bold">Company</label>
                                <select name="random[]" id="sector" class="form-control">
                                    <option value="">Select one company</option>
                                
                                    @foreach($companies as $company)
                                
                                    <option value="{{ $company->symbol }}">{{ $company->symbol }} ({{ $company->name }})</option>
                                
                                    @endforeach
                                
                                </select>
                                <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                            </div>
                        </div> --}}

                        <div id="multiple-sector">
                        </div>
                    </div>
                </div>
            </div>
            <footer class="panel-footer">
                <div id="error-section">
                    {{-- <i class="text-danger">** Please complete date range.</i><br/>
                    <i class="text-danger">** Please select atleast 2 company.</i> --}}
                </div>
            </footer>
            <footer class="panel-footer">
                <button onclick="compareCompany()" class="btn btn-success">Make Comparison</button>
                <button onclick="addCompany()" class="btn btn-primary">Add Company</button>
            </footer>
        </div>
    </section>
        
    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="fa fa-caret-down"></a>
            </div>
    
            <h2 class="panel-title">Comparison Current Stock Market</h2>
        </header>
        <div class="panel-body">
            <!-- Flot: Curves -->
            <div class="chart-md pt-5" id="stockChart">
                <span class="alert alert-warning">Choose company to compare....</span>
            </div>
        </div>
    </section>

<!-- end: page -->
</section>

@endsection

@section('script')

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>

    var currentCount = 0;

    function addCompany(){

        $('#multiple-sector').append(getCloneSelect());

    }
    
    function getCloneSelect(){

        currentCount++;

        var selects =   '<div class="form-group" id="company'+currentCount+'">' +                                                                 
                        '         <label class="control-label text-bold">Company</label>  ' +       
                        '         <select name="random[]" id="sector" class="form-control">' +
                        '             <option value="">Select one company</option>' +
                        '             @foreach($companies as $company)' +
                        '             <option value="{{ $company->symbol }}">{{ $company->symbol }} ({{ $company->name }})</option>' +
                        '             @endforeach' +
                        '         </select>' +
                        '         <button class="btn btn-danger btn-sm" onclick="closeDiv(\'company'+currentCount+'\')"><i class="fa fa-trash-o"></i></button>' +
                        '     </div>';

        return selects;

    }

    function closeDiv(name){
        console.log("delete" + name);
        $('#' + name + '').remove();
    }


    function testline(datas,dateData,datapred){

        // dataada = actualData.length - period;
        // datapred = actualData.length - dataada;
        var options = {
            series: datas,
            chart: {
                height: 350,
                type: 'line',
            },
            forecastDataPoints: {
                count: datapred
            },
            stroke: {
                width: 5,
                curve: 'smooth'
            },
            xaxis: {
                type: 'datetime',
                categories: dateData
            },
            title: {
                text: 'Comparison Prediction Data',
                align: 'center',
                style: {
                    fontSize: "16px",
                    color: '#666'
                }
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'dark',
                    gradientToColors: [ '#FDD835'],
                    shadeIntensity: 1,
                    type: 'horizontal',
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 100, 100, 100]
                },
            },
            legend: {
                position: 'top',
                horizontalAlign: 'right',
                floating: true,
                offsetY: -25,
                offsetX: -5
            }
        };

        var chart = new ApexCharts(document.querySelector("#stockChart"), options);
        chart.render();

    }


    function compareCompany() {

        $('#stockChart').html('<span class="alert alert-warning">Please wait for data....</span>');

        var stocks = getInputData();
        startDate  = $('#startDate').val();
        lastDate  = $('#endDate').val();
        var rangeNo = $('#rangeNo').val();
        var rangeType = $('#rangeType').val();

        $("#error-section").html("");

        console.log(stocks)

        if(!startDate || !lastDate){

            console.log("date kosong");
            $("#error-section").html('<i class="text-danger">** Please complete date range.</i><br/>');

        }else if(stocks == false){

            console.log("date kosong");
            $("#error-section").html('<i class="text-danger">** Please select atleast 2 company.</i><br/>');

        }else{

            $('#stockChart').html('');    

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
            
            allData = [];
            datapred = 0;
            dateData = [];

            jQuery.each(stocks, function(index, stockname) {
                
                console.log("stock " + stockname);
                datas = {
                    'stock':stockname,
                    'startDate':startDate,
                    'lastDate':lastDate,
                    'period':period
                };
            
                let {actualData,predictData,dateData} = getAPI(datas);
                console.log("return api");
                console.log(predictData);

                result = {
                    name : stockname,
                    data : actualData
                };

                allData.push(result);

                dataada = actualData.length - period;
                datapred = actualData.length - dataada;

            });

            console.log(allData);

            testline(allData,dateData,datapred);

        }

        
        
    }

    
    function getAPI(datas){

        url = "http://127.0.0.1:5000/fbprophet";

        actualData = [];
        predictData = [];
        dateData = [];

        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            async: false,
            data: JSON.stringify(datas),
            crossDomain: true,
            contentType : 'application/json',
            success: function(result){

                console.log("start result");
                console.log(result);
                    
                //console.log( "length " + Object.keys(result['Date']).length );

                var arrayLength = Object.keys(result['ds']).length;
                var loop = 0;

                for (let i = 0; i < arrayLength; i++) {
                    
                    console.log( "date " + result['ds'][i] );
                    console.log( "predict " + result['yhat'][i] );
                    console.log( "actual " + result['y'][i] );

                    var dateval         = formatDate(result['ds'][i]);
                    var predictVal      = result['yhat'][i];

                    if(result['y'][i] == null){
                        actualVal = predictVal;
                    }else{
                        var actualVal       = result['y'][i];
                    }

                    actualData.push(actualVal.toFixed(2));
                    predictData.push(predictVal.toFixed(2));
                    dateData.push(dateval);

                }

                console.log(actualData);
                console.log(predictData);
                console.log(dateData);
                //testline(actualData,predictData,dateData,years);

            }
        });

        return {actualData,predictData,dateData};

    }


    function getInputData() {
        var arrayNumber = [];
        var input = document.getElementsByName('random[]');
 
        for (var i = 0; i < input.length; i++) {
            var noval = input[i].value;
            console.log("random " + noval);

            if(noval || noval != ""){
                arrayNumber.push(noval);
            }
        }

        console.log("len arr - "+ arrayNumber.length);
        if(arrayNumber.length < 2){
            return false;

        }else{
            return arrayNumber;
        }

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

		return [year, month, day].join('-');
	}


</script>
@endsection