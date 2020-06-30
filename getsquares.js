let savedsquares = [];
$(document).ready(function () {
    $("#getsquares").click(function () {
        console.log('pressed');
        var featureGroup = L.featureGroup().addTo(mymap);
        var drawControl = new L.Control.Draw({
            edit: {
                featureGroup: featureGroup
            },
            draw: {
                polygon : false,
                polyline : false,
                circle : false,
                marker: false
            }
        }).addTo(mymap);

        mymap.on('draw:created', function(e) {

            // Each time a feaute is created, it's added to the over arching feature group
            featureGroup.addLayer(e.layer);
            savedsquares.push(e.layer.getLatLngs());
        });

    $("#savesquares").click(function (e) {
       console.log(savedsquares);
    });
    })
})