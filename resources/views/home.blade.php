@extends('layouts.layoutUser')

@section('title','Home - iStock')

@section('header')

@endsection

@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Latest News</h2>
    
        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="{{ route('home') }}">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Home</span></li>
            </ol>
    
            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
        </div>
    </header>

    <!-- start: page -->
        
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>
                </div>
        
                <h2 class="panel-title">Current Stock Market</h2>
            </header>
            <div class="panel-body">
                @foreach($arrayRandom as $random)
                
                <input type="text" name="random[]" id="random" value="{{$random}}" style="display: none;">

                @endforeach

                <!-- Flot: Curves -->
                <div class="chart-md pt-5" id="stockChart">
                    <span class="alert alert-warning">Content is loading......</span>
                </div>
            </div>
        </section>
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>
                </div>
        
                <h2 class="panel-title">Market Article News</h2>
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-borderless table-hover table-striped table-condensed mb-none">
                        <tbody id="data-news">
                            <tr>
                                <td>
                                    <span class="alert alert-warning">Content is loading......</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        
    <!-- end: page -->
</section>

@endsection

@section('script')

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>


<script>
    loadStock();
    apinews();
    //getInputData();

    function apinews(){
        url = "http://192.168.0.158:5000/stocknews";

        console.log("my news api connect try...........");

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            crossDomain: true,
            contentType : 'application/json',
            success: function(result){
                console.log(result['results']);

                datas = result['results'];
                content = "";
                $('#data-news').html('');

                $.each( datas, function( key, value ) {
                    //console.log( "val " + value[noVal] );
                    //console.log( "title " + value['title'] );

                    title = value['title'];
                    author = value['author'];
                    article_url = value['article_url'];
                    description = value['description'];
                    published_utc = new Date(value['published_utc']);
                    image_url = value['image_url'];
                    tickersData = value['tickers'];
                    tickersCount = value['tickers'].length;

                    content += '<tr>';
                    content += '    <td style="width:20rem;padding:30px;text-align:center">';
                    content +=          '<a target="_blank" href="'+article_url+'"><img class="img-thumbnail"  src="'+image_url+'" alt="" style="width: 20rem"></a>';
                    content +=          '<p><i>Author : '+author+'</i></p>';
                    content +=      '</td>';
                    content += '    <td style="padding:30px;">';
                    content += '        <a target="_blank" href="'+article_url+'"><h3>'+title+'</h3></a>';
                    content += '        <span><i>Published on : '+published_utc+'</i></span>';
                    content += '        <br/>';
                    content += '        <p><b>';
                    content +=              description;
                    content += '        </b></p>';

                    content += '        <p>';

                    if(tickersCount && tickersCount > 0){

                        $.each( tickersData, function( key, value ) {

                            content += '        <span class="highlight">'+value+'</span>';
                        
                        });

                    }

                    content += '        </p>';

                    content += '    </td>';
                    content += '</tr>';
                    

                });

                $('#data-news').html(content);



            }
        });



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

    function loadStock(){

        var stockname = getInputData();
        todayDate  = new Date();
        monthDate  = new Date();
        oneMonthDate = monthDate.setMonth(monthDate.getMonth() - 1);

        lastDate = formatDate(todayDate);
        startDate = formatDate(oneMonthDate);
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

    function getInputData() {
        var arrayNumber = [];
        var input = document.getElementsByName('random[]');
 
        for (var i = 0; i < input.length; i++) {
            var noval = input[i].value;
            console.log("random " + noval);
            arrayNumber.push(noval);
        }

        console.log(arrayNumber);
        return arrayNumber;

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