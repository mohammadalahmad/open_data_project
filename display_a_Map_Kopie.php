<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map Demp</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
     <!-- Make sure you put this AFTER Leaflet's CSS -->
     <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
    <style>
      #map { height: 800px; width: 800px; }
    </style>
</head>

<body>
  <div id="map"></div>
  <script>

      var map = L.map('map').setView([47.34696736, 9.87779935], 10);
      L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 100,
      attribution: '&copy; <a href="">OpenStreetMap</a>'
      }).addTo(map);
        <?php 
         $url1 = "museen_vorarlberg.json";
         $content1 = file_get_contents($url1);
         $json1 = json_decode($content1, true);

         $url2 = "historische_wege_vorarlberg.json";
         $content2 = file_get_contents($url2);
         $json2 = json_decode($content2, true);

        for ($i = 0; $i < count($json1["features"]); $i++) { ?> 
             var marker = L.marker([<?php echo $json1["features"][$i]["geometry"]["coordinates"][0][1] ?>, 
                                    <?php echo $json1["features"][$i]["geometry"]["coordinates"][0][0] ?>]).addTo(map);
            marker.bindPopup("<bUAS Technikum> </b><b><?php echo $json1["features"][$i]["properties"]["name"]?>   <br><b>Ort:</b> <?php echo  $json1["features"][$i]["properties"]["ort"] ?>!</b>").openPopup();
           
            
            <?php  } for ($i = 0; $i < count($json2["features"]); $i++) {  ?> 
            var marker = L.marker([<?php echo $json2["features"][$i]["geometry"]["coordinates"][0][0][1] ?>, 
                                    <?php echo $json2["features"][$i]["geometry"]["coordinates"][0][0][0] ?>]).addTo(map);
            
             marker.bindPopup("<bUAS Technikum> </b><b><?php echo $json2["features"][$i]["id"] ?> <br><b>Type:</b> <?php echo  $json1["features"][$i]["geometry"]["type"] ?> !</b>").openPopup();
             
             <?php    for ($i = 0; $i < count($json2["features"]); $i++) { } ?> 
    
             var myLines = [{
                    "type": "LineString",
                    "coordinates": [[-100, 40], [-105, 45], [-110, 55]]
                }, {
                    "type": "LineString",
                    "coordinates": [[-105, 40], [-110, 45], [-115, 55]]
                }];

                var myStyle = {
                    "color": "#ff7800",
                    "weight": 5,
                    "opacity": 0.65
                };

                $.getJSON('historische_wege_vorarlberg.json', function(data) {

                  L.geoJSON(data, {
                      style: myStyle
                  }).addTo(map);

                  });


                      
        <?php  }  ?> 

  </script>

  <?php
 
  ?>

</body>
</html>