let mymap = L.map('mapid');
let osmUrl='https://tile.openstreetmap.org/{z}/{x}/{y}.png';
let osmAttrib='Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors';
let osm = new L.TileLayer(osmUrl, {attribution: osmAttrib});
mymap.addLayer(osm);

//sintetagmenes kai zoom
mymap.setView([38.246242, 21.7350847], 12);

$("#switch").click(function () {
    mymap.invalidateSize();
});
// $(document).ready(function () {
//     $("#heatmapadmin").submit(function (e) {
//         // let myArray = [];
//         e.preventDefault();
//         $.ajax({
//             type: "POST",
//             url: "getlocationsadmin.php",
//             data: $("#heatmapadmin").serialize(),
//             success: function (data) {
//                 drawheatmap(data[0]);
//             }
//
//         })
//     })
// })

function submitform() {
    var data = $("#heatmapadmin").serialize();

    $.ajax({
        type: 'POST',
        url: 'getlocationsadmin.php',
        dataType: 'JSON',
        data: data,
        success: function (data) {
            console.log('geiaa');
            drawheatmap(data);

        }
    });

}

function submitexport(){
    const data = $("#heatmapadmin").serialize();
    $.ajax({
        type: 'POST',
        url: 'export.php',
        data: data,
        success: function (data) {
            console.log(data);
            confirm("Your data has been exported");

        }
    });
}

function drawheatmap(data) {
    let layercount = 0;
    mymap.eachLayer(function (layer) {
        layercount++;
        if(layercount > 1 ){
            mymap.removeLayer(layer)
        }
    });
    let myArray = [];
    let cfg = {
        // radius should be small ONLY if scaleRadius is true (or small radius is intended)
        // if scaleRadius is false it will be the constant radius used in pixels
        "radius": 40,
        "maxOpacity": 0.8,
        // scales the radius based on map zoom
        "scaleRadius": false,
        // if set to false the heatmap uses the global maximum for colorization
        // if activated: uses the data maximum within the current map boundaries
        //   (there will always be a red spot with useLocalExtrema true)
        "useLocalExtrema": false,
        // which field name in your data represents the latitude - default "lat"
        latField: 'lat',
        // which field name in your data represents the longitude - default "lng"
        lngField: 'lng',
        // which field name in your data represents the data value - default "value"
    };

    $.each(data, function (i, object) {
        myArray.push({"lat": object.lat, "lng": object.lng, "count": object.count})
    });
    let testData = {
        max: 12,
        data: myArray
    };
    let heatmapLayer = new HeatmapOverlay(cfg);
    mymap.addLayer(heatmapLayer);
    heatmapLayer.setData(testData);
}