let mymap = L.map('mapid')
let osmUrl='https://tile.openstreetmap.org/{z}/{x}/{y}.png';
let osmAttrib='Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors';
let osm = new L.TileLayer(osmUrl, {attribution: osmAttrib});
mymap.addLayer(osm);
//sintetagmenes kai zoom
mymap.setView([38.246242, 21.7350847], 12);
var myArray = [];
$(document).ready(function () {
    $("#heatmap").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "getlocations.php",
            dataType: 'JSON',
            data: {
                datefilter: $("#datefilter").val()
            },
            success: function (data) {
                var test = data;
                $.each(test, function (i, object) {
                    myArray.push({"lat": object.lat, "lng": object.lng, "count": object.count})
                });
                console.log(myArray);var testData = {
                    max:8,
                    data: myArray
                };
                let cfg = {
                    // radius should be small ONLY if scaleRadius is true (or small radius is intended)
                    // if scaleRadius is false it will be the constant radius used in pixels
                    "radius": 40,
                    "maxOpacity": 0.8,
                    // scales the radius based on map zoom
                    "scaleRadius": false,
                    // if set to false the heatmap uses the global maximum for colorization
                    // if activated: uses the data maximum within the current map boundaries
                    //   (there will always be a red spot with useLocalExtremas true)
                    "useLocalExtrema": false,
                    // which field name in your data represents the latitude - default "lat"
                    latField: 'lat',
                    // which field name in your data represents the longitude - default "lng"
                    lngField: 'lng',
                    // which field name in your data represents the data value - default "value"
                };

                let heatmapLayer =  new HeatmapOverlay(cfg);

                mymap.addLayer(heatmapLayer);
                heatmapLayer.setData(testData);
            }
        })
    })
})

// var testData = {
//     max:8,
//     data: myArray
// };
// let cfg = {
//     // radius should be small ONLY if scaleRadius is true (or small radius is intended)
//     // if scaleRadius is false it will be the constant radius used in pixels
//     "radius": 40,
//     "maxOpacity": 0.8,
//     // scales the radius based on map zoom
//     "scaleRadius": false,
//     // if set to false the heatmap uses the global maximum for colorization
//     // if activated: uses the data maximum within the current map boundaries
//     //   (there will always be a red spot with useLocalExtremas true)
//     "useLocalExtrema": false,
//     // which field name in your data represents the latitude - default "lat"
//     latField: 'lat',
//     // which field name in your data represents the longitude - default "lng"
//     lngField: 'lng',
//     // which field name in your data represents the data value - default "value"
// };
//
// let heatmapLayer =  new HeatmapOverlay(cfg);
//
// mymap.addLayer(heatmapLayer);
// heatmapLayer.setData(testData);

