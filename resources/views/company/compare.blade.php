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
                                <span class="input-group-addon">to</span>
                                <input type="date" class="form-control" name="endDate" id="endDate">
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

    
    function showLine(datastock,dateData){
        
        console.log(datastock);
        console.log(dateData);
        var options = {
            series: datastock,
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
            text: 'Stock Market Price',
            align: 'center'
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

        var chart = new ApexCharts(document.querySelector("#stockChart"), options);
        chart.render();

    }

    function compareCompany() {

        var stockname = getInputData();
        startDate  = $('#startDate').val();
        lastDate  = $('#endDate').val();

        $("#error-section").html("");

        if(!startDate || !lastDate){

            console.log("date kosong");
            $("#error-section").html('<i class="text-danger">** Please complete date range.</i><br/>');

        }else if(stockname == false){

            console.log("date kosong");
            $("#error-section").html('<i class="text-danger">** Please select atleast 2 company.</i><br/>');

        }else{
                
            console.log(startDate);
            console.log(lastDate);
            $('#stockChart').html('');
                
            url = "http://192.168.0.158:5000/getStocks";

            datas = {
                'stock':stockname,
                'startDate':startDate,
                'lastDate':lastDate
            };

            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: JSON.stringify(datas),
                crossDomain: true,
                contentType : 'application/json',
                success: function(result){

                    console.log(result);

                    arrayAll = [];
                    arrayDate = [];
                    arrayData = [];

                    $.each( stockname, function( key, value ) {
                        //console.log( key + ": " + value[0] );
                        name = value;
                        $.each( result, function( key1, value1 ) {
                            keys = key1;
                            if(keys.search("'Close', '"+name+"'") != -1){
                                console.log("close " + name);
                                console.log(value1);

                                var dataVal = [];

                                $.each( value1, function( key2, value2 ) {
                                    if(value2 == null){
                                        dataVal.push("0");
                                    }else{
                                        dataVal.push(value2.toFixed(2));
                                    }
                                });

                                var arraydata = {
                                                    name: name,
                                                    data: dataVal
                                                };

                                arrayData.push(arraydata);

                            }

                        });
                        
                    });

                    //get date data
                    $.each( result, function( key, value ) {

                        keys = key;

                        if(keys.search("'Date', ''") != -1){
                            //console.log("date")
                            //console.log(value);
                            dateVal = value;
                            $.each( dateVal, function( key1, value1 ) {
                                //console.log(formatDate(values));
                                fDate = formatDate(value1);
                                arrayDate.push(fDate);
                            });
                        }
                        
                    });

                    // console.log("date ");
                    // console.log(arrayDate);
                    // console.log("data ");
                    // console.log(arrayData);

                    showLine(arrayData,arrayDate);

                }
            });

        }

        
        
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