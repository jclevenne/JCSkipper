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

//Initialize map
var map = L.map('map',{zoomControl: false});
var newMarker=[];

map.setView([43.2931, 5.3702], 3, false);
new L.TileLayer('https://{s}.tiles.mapbox.com/v3/osmbuildings.kbpalbpk/{z}/{x}/{y}.png', {
  attribution: 'Map tiles &copy; <a href="https://mapbox.com">MapBox</a>',
  maxZoom:19,
  }).addTo(map);

// Search Control
var searchControl = new L.esri.Geocoding.Geosearch({expanded:true,useMapBounds:false,allowMultipleResults:true}).addTo(map);
var results = new L.LayerGroup().addTo(map);
searchControl.on('results', function(data){
    results.clearLayers();
    for (var i = data.results.length - 1; i >= 0; i--) {
      results.addLayer(L.marker(data.results[i].latlng));
    };
  });
setTimeout(function(){$('.pointer').fadeOut('slow');},3400);

//event Click on map
map.on('click', function addMarker(e)
{
  if (newMarker[0]==undefined)
  {
    newMarker[0] = new L.marker(e.latlng,{ icon:greenIcon, draggable: true }).addTo(map);
    $('input[name=from_point]').val('lon:'+e.latlng.lng.toFixed(4)+'lat:'+e.latlng.lat.toFixed(4));
    newMarker[0].on('drag', function (e) {$('input[name=from_point]').val('lon:'+e.latlng.lng.toFixed(4)+'lat:'+e.latlng.lat.toFixed(4));});
  }
  else if (newMarker[1]==undefined)
  {
    newMarker[1] = new L.marker(e.latlng,{ icon:redIcon, draggable: true }).addTo(map);
    $('input[name=to_point]').val('lon:'+e.latlng.lng.toFixed(4)+'lat:'+e.latlng.lat.toFixed(4));
    newMarker[1].on('drag', function (e) {$('input[name=to_point]').val('lon:'+e.latlng.lng.toFixed(4)+'lat:'+e.latlng.lat.toFixed(4));});
  }
  else {map.off('click');}
});

//event Click on Departure/Arrival icon
function addMarkerDeparture(e){
  if (newMarker[0]!=undefined){map.removeLayer(newMarker[0]);};
  var mapCenter=map.getCenter();
  newMarker[0] = new L.marker(mapCenter,{ icon:greenIcon, draggable: true }).addTo(map);
    $('input[name=from_point]').val('lon:'+mapCenter.lng.toFixed(4)+'lat:'+mapCenter.lat.toFixed(4));
    newMarker[0].on('drag', function (e) {$('input[name=from_point]').val('lon:'+e.latlng.lng.toFixed(4)+'lat:'+e.latlng.lat.toFixed(4));});
}
function addMarkerArrival(e){
  if (newMarker[1]!=undefined){map.removeLayer(newMarker[1]);};
  var mapCenter=map.getCenter();
  newMarker[1] = new L.marker(mapCenter,{ icon:redIcon, draggable: true }).addTo(map);
    $('input[name=to_point]').val('lon:'+mapCenter.lng.toFixed(4)+'lat:'+mapCenter.lat.toFixed(4));
    newMarker[1].on('drag', function (e) {$('input[name=to_point]').val('lon:'+e.latlng.lng.toFixed(4)+'lat:'+e.latlng.lat.toFixed(4));});
}

/*var overlay=new JNC.Leaflet.NavionicsOverlay({
    navKey: "Navionics_webapi_03426",
    chartType: JNC.NAVIONICS_CHARTS.NAUTICAL,
    isTransparent: false,
    zIndex: 1
});
console.log("ohohohohohoh");
//map.setView([36.140751,-5.353585], 14);
overlay.addTo(map);*/



