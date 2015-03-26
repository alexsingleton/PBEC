<?php 
//Get Library
require_once './meekrodb.2.3.class.php';
require_once './log_on.php';


$postcode = $_POST['search'];
$postcode = str_replace(' ', '',$postcode);
$postcode = strtoupper($postcode);
$pcd_find = DB::queryFirstRow("SELECT * FROM ONSPD_14 WHERE pcd=%s", $postcode);



if( empty( $pcd_find ) )
{
     echo"<p class='lead '><span class='glyphicon glyphicon-remove'></span> Sorry, we could not find that postcode.</p>";
} else {

echo "<p class='lead'>The postcode '". substr($pcd_find['pcd'], 0, strlen($pcd_find['pcd']) - 3) ." ". substr($pcd_find['pcd'], -3, 3) ."' ";

echo "is found within a Ward (shown as a green polygon) where the POLAR participation rate is within the ". $pcd_find['polar_y'] ." quintile (1st=lowest; 5th=highest), and a " . ucwords($pcd_find['imd_zone_type'] )." (shown as a red polygon) where the Index of Multiple Deprivation for " . $pcd_find['imd_county'] . " is ranked " . $pcd_find['imd_rank'] ." out of " . $pcd_find['imd_zone_n'] . " (1 is the most deprived), placing this area in IMD decile " . $pcd_find['imd_decile'] .".</p>";

echo "
                    <div id=\"ward-map\"></div>
					<script>
  var bgTiles = L.tileLayer('http://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png', {
  attribution: '&copy; <a href=\"http://www.openstreetmap.org/copyright\">OpenStreetMap</a> &copy; <a href=\"http://cartodb.com/attributions\">CartoDB</a>',
    maxZoom: 18
  });

 var POLARStyle = {
    \"color\": \"#009999\",
    \"weight\": 1,
    \"opacity\": 0.65
		};
  var IMDStyle = {
    \"color\": \"#FF3300\",
    \"weight\": 1,
    \"opacity\": 0.65
		};  

  $.getJSON(\"./Boundaries/casward_2001/" . $pcd_find['casward'] .".geojson\", function(data) {
    var geojson = L.geoJson(data, {
     style: POLARStyle
    });
    
    var map = L.map('ward-map').fitBounds(geojson.getBounds());
    bgTiles.addTo(map);
    geojson.addTo(map);
   
     $.getJSON(\"./Boundaries/LSOA_DZ_SOA/" . $pcd_find['lsoa_dz_soa'] .".geojson\", function(data) { 
    var geojson = L.geoJson(data, {
     style: IMDStyle
    });

    geojson.addTo(map);

  });

  });
  </script>        

";







}

?>
