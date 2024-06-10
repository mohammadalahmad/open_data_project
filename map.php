<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Linestring demo 2</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>

     <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>

    <style>
        #map { height: 90vh;}
    </style>

</head>
<body>
    <div id="map"></div>

    <script>

		
		// layerGroups
		
		var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            });
		
		var baseMaps = {
			"openStreetMap": osm
		}
		
		var bregenz = L.circle([47.50075 ,9.74231], {color: 'red',
			fillColor: '#f03',
			fillOpacity: 0.5,
			radius: 500}).bindPopup('Bregenz: Population of 29.620 people, third biggest city in Vorarlberg'),
			feldkirch = L.circle([47.24999 ,9.583331], {color: 'red',
			fillColor: '#f03',
			fillOpacity: 0.5,
			radius: 700}).bindPopup('Feldkirch: Population of 35.793 people, second biggest city in Vorarlberg'),
			dornbirn = L.circle([47.41364, 9.74238], {color: 'red',
				fillColor: '#f03',
				fillOpacity: 0.5,
				radius: 1000}).bindPopup('Dornbirn: Population of 51.222 people, biggest city in Vorarlberg');
		
		var cities_layer = L.layerGroup([bregenz, feldkirch, dornbirn]);
		
		var overlayMaps = {
			"Population ranking cities": cities_layer
		}
		
		// map and layerControl
        var map = L.map('map', {
			center: [47.2412, 9.8943],
			zoom: 10,
			layers: [osm, cities_layer]
		});
		
		var layerControl = L.control.layers(baseMaps, overlayMaps).addTo(map);
		
		// Museen
		var museen_layer = L.geoJSON();
		$.getJSON('https://vogis.cnv.at/geoserver/ows?service=WFS&version=1.1.0&request=GetFeature&srsName=EPSG:4326&typeName=vogis:museen&outputFormat=application/json&maxFeatures=1000000', function(data) {
			museen_layer.addData(data) 
			});

		layerControl.addOverlay(museen_layer, "Museums");
		
		// Historische Wege
		var hist_wege_layer = L.geoJSON();
		$.getJSON('https://vogis.cnv.at/geoserver/ows?service=WFS&version=1.1.0&request=GetFeature&srsName=EPSG:4326&typeName=vogis:historische_wege&outputFormat=application/json&maxFeatures=1000000', function(data){
			hist_wege_layer.addData(data)
		});
		
		layerControl.addOverlay(hist_wege_layer, "Historic paths");
		
		// Fläche
		var flaeche_layer = L.geoJSON();
		$.getJSON('https://vogis.cnv.at/geoserver/ows?service=WFS&version=1.1.0&request=GetFeature&srsName=EPSG:4326&typeName=vogis:politisch_vlbg&outputFormat=application/json&maxFeatures=1000000', function(data){
			flaeche_layer.addData(data)
			});
		
		layerControl.addOverlay(flaeche_layer, "area");
		
		// Verwaltungsbezirke
		var verwaltungs_layer = L.geoJSON();
		$.getJSON('https://vogis.cnv.at/geoserver/ows?service=WFS&version=1.1.0&request=GetFeature&srsName=EPSG:4326&typeName=vogis:politische_bezirke&outputFormat=application/json&maxFeatures=1000000', function(data){
			verwaltungs_layer.addData(data);
		});
		
		layerControl.addOverlay(verwaltungs_layer, "Political districts");

		
		// Gerichtsbezirke
		var gericht_layer = L.geoJSON();
		$.getJSON('https://vogis.cnv.at/geoserver/ows?service=WFS&version=1.1.0&request=GetFeature&srsName=EPSG:4326&typeName=vogis:grenzen&outputFormat=application/json&maxFeatures=1000000', function(data){
			gericht_layer.addData(data);
		});
		
		layerControl.addOverlay(gericht_layer, "Legal districts");
		
		// Naturschutzgebiete
		var schutzgeb_layer = L.geoJSON();
		$.getJSON('https://vogis.cnv.at/geoserver/ows?service=WFS&version=1.1.0&request=GetFeature&srsName=EPSG:4326&typeName=vogis:schutzgebiete_naturschutz&outputFormat=application/json&maxFeatures=1000000', function(data){
			schutzgeb_layer.addData(data);
		});
		
		layerControl.addOverlay(schutzgeb_layer, "Nationalparks");
		
		// https://vogis.cnv.at/geoserver/ows?service=WFS&version=1.1.0&request=GetFeature&srsName=EPSG:4326&typeName=vogis:schutzundschongebiete&outputFormat=application/json&maxFeatures=1000000
		
		// Shopooingzentren
		var shopping_layer = L.geoJSON();
		$.getJSON('https://vogis.cnv.at/geoserver/ows?service=WFS&version=1.1.0&request=GetFeature&srsName=EPSG:4326&typeName=vogis:einkaufszentrum&outputFormat=application/json&maxFeatures=1000000', function(data){
			shopping_layer.addData(data);
		});
		
		layerControl.addOverlay(shopping_layer, "Shopping centers");
		
    </script>
 
</body>
</html>
