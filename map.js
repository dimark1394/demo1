let mymap = L.map('mapid')
let osmUrl='https://tile.openstreetmap.org/{z}/{x}/{y}.png';
let osmAttrib='Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors';
let osm = new L.TileLayer(osmUrl, {attribution: osmAttrib});
mymap.addLayer(osm);
//sintetagmenes kai zoom
mymap.setView([38.246242, 21.7350847], 12);
$(document).ready(function () {
    $("#heatmap").submit(function (e) {
        let myArray = [];
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "getlocations.php",
            dataType: 'JSON',
            data: {
                datefilter: $("#datefilter").val()
            },
            success: function (data) {
                var test = data[0];
                $.each(test, function (i, object) {
                    myArray.push({"lat": object.lat, "lng": object.lng, "count": object.count})
                });
                if (myArray.length > 0) {
                    var testData = {
                        max: 8,
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

                    let heatmapLayer = new HeatmapOverlay(cfg);
                    drawpiechart(data[1]);

                    mymap.addLayer(heatmapLayer);
                    heatmapLayer.setData(testData);
                    var busiestdtable = document.getElementById('t02');
                    const busiestddata = data[2];
                    $.each(busiestddata, function (i, object){
                      const tr = document.createElement('tr');
                      tr.innerHTML = '<td>' + object.type + '</td>' +
                          '<td>' + object.busiest_day + '</td>' + '<td>' + object.count + '</td>' ;
                      busiestdtable.appendChild(tr);
                    });
                    const busiesthtable = document.getElementById('t03');
                    const busiesthdata = data[3];
                    $.each(busiesthdata, function (i, obj){
                        const trh = document.createElement('tr');
                        trh.innerHTML = '<td>' + obj.type + '</td>' +
                            '<td>' + obj.busiest_hour + ':00' + '</td>' + '<td>' + obj.count  + '</td>' ;
                        busiesthtable.appendChild(trh);
                    });
                }
                else {
                    alert("No entries during these Dates");
                }
            }
        })
    })
})




function drawpiechart(data) {
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    let datapie = data;
    function drawChart() {
        var jsonData = datapie;
        var data = new google.visualization.DataTable(jsonData);
        var options = {
            title: 'Number of entries per activity',
            curveType: 'function',
            legend: {position: 'bottom'}
        };
        console.log(data);
        var chart = new google.visualization.PieChart(document.getElementById('entries_per_activity'));

        chart.draw(data, options);
    }
}

