<!DOCTYPE html>

<html>

<head>
    <title>WebGIS GeoJson</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaflet Tutorial</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.0/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <link rel="stylesheet" href="http://localhost/geojsonwebgis/leaflet-search-master/src/leaflet-search.css"/>
    <link rel="stylesheet" href="../src/leaflet-search.css" />
    <link rel="stylesheet" href="style.css" />
    <style>
                #map{
                    height: 100vh;
                    width: 100%;
                }

                .info {
            padding: 6px 8px;
            font: 14px/16px Arial, Helvetica, sans-serif;
            background: white;
            background: rgba(255,255,255,0.8);
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
            border-radius: 5px;
        }
            .info h4 {
            margin: 0 0 5px;
            color: #777;
        }

            .legend {
            line-height: 18px;
            color: #555;
        }
            .legend i {
            width: 18px;
            height: 18px;
            float: left;
            margin-right: 8px;
            opacity: 0.7;
        }
     </style>

</head>


<body>
<div id="map"></div>
</body>
</html>

    <script src="http://localhost/geojsonwebgis/leaflet-search-master/src/leaflet-search.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin="">

    </script>

     <script>
         var data = [
		{"loc":[-5.35803,105.31435], "title":"Institut Teknologi Sumatera"},
        {"loc":[105.31435,-5.35803], "title":"Institut Teknologi Sumatera111"}];
        
        var map = new L.Map('map', {zoom: 15, center: new L.latLng(-5.35755,105.30218) });

        map.addLayer(new L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=UDn82m3Ffc1Uqtzptwew', {
         attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>',}));

         
            var singleMarker = L.marker([-5.35755,105.30218]);
            singleMarker.addTo(map);
            var popup = singleMarker.bindPopup('Ini Lokasi Saya')
            popup.addTo(map); 
    
        var markersLayer = new L.LayerGroup();	//layer contain searched elements
	    map.addLayer(markersLayer);   
        var controlSearch = new L.Control.Search({
		position:'topright',		
		layer: markersLayer,
		initial: false,
		zoom: 12,
		marker: false
	});

	map.addControl( controlSearch );

    for(i in data) {
		var title = data[i].title;	//value searched
		var	loc = data[i].loc;		//position found
		var	marker = new L.Marker(new L.latLng(loc), {title: title} );//se property searched
		marker.bindPopup('title: '+ title );
		markersLayer.addLayer(marker);
	}

  </script>

