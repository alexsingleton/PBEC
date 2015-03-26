<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href="/favicon.ico" />

    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Postgraduate Bursary Eligibility Checker</title>
    <!--GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!--BOOTSTRAP MAIN STYLES -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--FONTAWESOME MAIN STYLE -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!--PRETTYPHOTO MAIN STYLE -->
    <link href="assets/css/prettyPhoto.css" rel="stylesheet" />
    <!--CUSTOM STYLE -->
    <link href="assets/css/style.css" rel="stylesheet" />
        <!-- CORE JQUERY LIBRARY -->
    <script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

     <!-- LEAFLET LIBRARY -->
  <script src="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.js"></script>

    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.css" />
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>

    <![endif]-->

<script type="text/javascript">
 
$(function() {
 
    $(".search_button").click(function() {
        // getting the value that user typed
        var searchString    = $("#search_box").val();
        // forming the queryString
        var data            = 'search='+ searchString;
         
        // if searchString is not empty
        if(searchString) {
            // ajax call
            $.ajax({
                type: "POST",
                url: "connect.php",
                data: data,
                beforeSend: function(html) { // this happens before actual call
                    $("#results").html('');
               },
               success: function(html){ // this happens after we get results
                    $("#results").show();
                    $("#results").append(html);
              }
            });    
        }
        return false;
    });
});
</script>










    
</head>

  <style type="text/css">
    #ward-map {
      height: 400px;
    }
  </style>



<body>


    <!--NAV SECTION -->
    <header id="header-nav" role="banner">
        <div id="navbar" class="navbar navbar-default">
            <div class="navbar-header">
                <a class="navbar-brand" href="/"><span class="glyphicon glyphicon-map-marker"></span>Postgraduate Bursary Eligibility Checker</a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav flot-nav">
                    <li><a href="index.php#PBEC-section"><span class="glyphicon glyphicon-star"></span> About</a></li>
                </ul>
            </div>
        </div>
    </header>
    <!--END NAV SECTION -->
  
   <!--SEARCH SECTION -->
    <section id="search-section">
        <div class="wrap-pad">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-offset-1" >
                    <div class="text-center">
                        <h1><span class="glyphicon glyphicon-search small-icons bk-color-green"></span>Search for your postcode...</h1>
                        <p class="lead">
				This postcode search will return a HE participation (POLAR) rate for your area and the level of deprivation (IMD). More details about this website and the data used can be found <a href="index.php#why-section"> here</a>.
                        </p>
                    </div>
                </div>
                <!-- ./ Heading div-->
                
                <div class="col-md-8 col-md-offset-2 col-sm-offset-1 ">
                    
              		 <div class="row">
              		 <div class="col-md-8 col-md-offset-2 col-sm-offset-1" >
                    <div class="text-center">
                        <h3><i class="glyphicon glyphicon-search small-icons bk-color-green"></i>Enter your postcode...</h3>
                        <form method="post"  action="connect.php">
    						<input type="text" name="search" id="search_box" class='search_box'/>
   							 <button type="submit" value="Search" class="search_button btn btn-default ">Search</button>
						</form> 
 					</div>
                  </div>
                  </div>
                  
                </div>
                <div class="row">
            			<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 ">
                    		<div id="results"></div>
  						</div>
                </div> 
                <!-- ./ Content div-->
            </div>
        </div>
    </section>
    <!--END SEARCH SECTION -->
  
 
    
    
    <!--PBEC SECTION -->
    <section id="PBEC-section">
        <div class="wrap-pad">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 " >
                    <div class="text-center">
                        <h1><span class="glyphicon glyphicon-sort small-icons bk-color-green"></span>Postgraduate Bursary Eligibility Checker (PBEC)</h1>
                        <p class="lead">
                            The PBEC was built to help students ascertain whether or not they might be eligible for bursaries provided by the <a href="http://www.hefce.ac.uk/pubs/year/2014/CL,322014/">HEFCE Postgraduate Support Scheme</a>. 
                        </p>
                    </div>
                </div>
                <!-- ./ Heading div-->
                <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 ">
	                 <div class="col-md-6  col-sm-7" >
                  <div class="list-group">
					  <li class="list-group-item active">Links</li>
					  <a href="http://geographicdatascience.com" class="list-group-item"  target="_blank">Geographic Data Science Lab</a>
					  <a href="http://rpubs.com/alexsingleton/IMD_POLAR" class="list-group-item"  target="_blank">Website Data</a>
					  <a href="http://www.hefce.ac.uk/pubs/year/2014/CL,322014/" class="list-group-item">HEFCE Postgraduate Support Scheme</a>
					  <a href="https://www.hefce.ac.uk/media/hefce/content/pubs/2012/201226/POLAR3.pdf" class="list-group-item">POLAR 3</a>
 					  <a href="http://data.gov.uk/dataset/index-of-multiple-deprivation" class="list-group-item" target="_blank">IMD England</a>
 					  <a href="http://www.gov.scot/Topics/Statistics/SIMD/DataAnalysis/Background-Data-2012" class="list-group-item" target="_blank">IMD Scotland</a>
 					   <a href="http://gov.wales/statistics-and-research/welsh-index-multiple-deprivation-indicator-data/?lang=en" class="list-group-item" target="_blank">IMD Wales</a>
					  <a href="http://www.nisra.gov.uk/deprivation/nimdm_2010.htm" class="list-group-item" target="_blank">IMD Northern Ireland</a>
				  </div>

    				</div>
   				<div class="col-md-6  col-sm-7">
   						<img src="assets/img/HE.png" class="img-responsive" alt="OAC">
                    	<p class="margin-top-20">Many universities are <a href="http://www.findamasters.com/funding/guides/hefce-postgraduate-support-scheme-institutions.aspx">offering awards</a> for postgraduate study starting in 2015, including the <a href="https://www.liv.ac.uk/study/postgraduate/finance/scholarships/postgraduate-support-scheme/">University of Liverpool</a>. A variety of criteria are used to assess eligibility for these bursaries, however, a number of universities include both the index of multiple deprivation and the POLAR classification of young participation rates within their metrics. However, finding out how your home postcode is classified can be complicated, and with luck, this site will help simplify this process.</p>    				
    				</div>
                </div>
                <!-- ./ Content div-->
            </div>
        </div>
    </section>
    <!--END PBEC SECTION -->
    
    
    

    
    
    
    
   
    
    
    
    <!--FOOTER SECTION -->
    <footer id="footer">
        <div class="row">
            <div class="col-md-12  col-sm-12">
                &copy; 2015 www.alex-singleton.com  |  All Rights Reserved
            </div>
        </div>
    </footer>
    <!--END FOOTER SECTION -->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->

    <!-- BOOTSTRAP SCRIPTS LIBRARY -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- PRETTYPHOTO  SCRIPTS  LIBRARY-->
    <script src="assets/js/jquery.prettyPhoto.js"></script>
     <!-- SCROLL REVEL  SCRIPTS  LIBRARY-->
    <script src="assets/js/scrollReveal.js"></script>
    <!-- CUSTOM SCRIPT-->
    <script src="assets/scripts/custom.js"></script>
</body>

<!--Creates a delay for carousel --> 
 <script>
  $('.carousel').carousel({
   interval: 7000
  });
 </script> 

<?php include_once("analyticstracking.php") ?>

</html>
