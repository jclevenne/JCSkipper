var map = L.map('map',{zoomControl: false});

new L.TileLayer('https://{s}.tiles.mapbox.com/v3/osmbuildings.kbpalbpk/{z}/{x}/{y}.png', {
    attribution: 'Map tiles &copy; <a href="https://mapbox.com">MapBox</a>',
    maxZoom:19,
}).addTo(map);

//icon initialisation
var greenIcon = new L.Icon({
  iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-green.png',
  shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
  iconSize: [25, 41],
  iconAnchor: [12, 41],
  popupAnchor: [1, -34],
  shadowSize: [41, 41]
});
var redIcon = new L.Icon({
  iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-red.png',
  shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
  iconSize: [25, 41],
  iconAnchor: [12, 41],
  popupAnchor: [1, -34],
  shadowSize: [41, 41]
});	

//ROUTE PATH
    var distance=route.getRouteJson[0].distance;
    var journeytime=distance/5;
    // create a red polyline from an array of LatLng points
    var latlngs = [];
    var departureMarker=new L.marker([route.getRouteJson[0].routepoints[0].lat,route.getRouteJson[0].routepoints[0].lon],{ icon:greenIcon }).addTo(map);
    var iglobal;
    for (var i=0;i<route.getRouteJson[0].routepoints.length;i++)
    {
    	latlngs.push([route.getRouteJson[0].routepoints[i].lat,route.getRouteJson[0].routepoints[i].lon]);
    	iglobal=i;
    };
    var arrivalMarker=new L.marker([route.getRouteJson[0].routepoints[iglobal].lat,route.getRouteJson[0].routepoints[iglobal].lon],{ icon:redIcon }).addTo(map);
    var polyline = L.polyline(latlngs, {color: 'red'}).addTo(map);
    // zoom the map to the polyline
    map.fitBounds(polyline.getBounds(),{padding:[1,1,1,1]});

//ROUTE INFO
    $('input[id=inputDistance]').val(Math.round(distance)+" nm");
    $('input[id=inputJourneyTime]').val(Math.trunc(journeytime/24)+" days and "+Math.round(journeytime%24)+" hours");
    $('input[id=inputCost]').val(Math.round(distance/10)*30+" €");
