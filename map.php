<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Map </title>
    
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    
    <script>
        
    var marker;
      function initialize() {
        var infoWindow = new google.maps.InfoWindow;
        
        var mapOptions = {
          mapTypeId: google.maps.MapTypeId.ROADMAP
        } 
 
        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        var bounds = new google.maps.LatLngBounds();

        // Retrieve data from database
        <?php
            
                $lat = $_GET['lat'];
                $lon = $_GET['long'];
                echo ("addMarker($lat, $lon);\n"); 
               
          ?>
          
        // Proses of making marker 
        function addMarker(lat, lng, info) {
            var lokasi = new google.maps.LatLng(lat, lng);
            bounds.extend(lokasi);
            var marker = new google.maps.Marker({
                map: map,
                position: lokasi
            });       
            map.fitBounds(bounds);
            bindInfoWindow(marker, map, infoWindow, info);
         }
        
        // Displays information on markers that are clicked
        function bindInfoWindow(marker, map, infoWindow, html) {
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
        }
 
        }
      google.maps.event.addDomListener(window, 'load', initialize);
    
    </script>
    
</head>
<body onload="initialize()">
 <br />    <br /> 
<div class="container" style="margin-top:10px"> 

    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"> Google Map </div>
                    <div class="panel-body">
                        <div id="map-canvas" style="width: 900px; height: 800px;"></div>
                    </div>
            </div>
        </div>  
    </div>
</div>  
</body>
</html>