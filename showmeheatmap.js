// let mymap = L.map('mapid')
// let osmUrl='https://tile.openstreetmap.org/{z}/{x}/{y}.png';
// let osmAttrib='Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors';
// let osm = new L.TileLayer(osmUrl, {attribution: osmAttrib});
// mymap.addLayer(osm);
// //sintetagmenes kai zoom
// mymap.setView([38.246242, 21.7350847], 12);
// $(document).ready(function () {
//
//
//     var myArray = [];
//     $("#heatmap").submit(function (e) {
//         e.preventDefault();
//         $.ajax({
//             type: "POST",
//             url: "getlocations.php",
//             dataType: 'JSON',
//             data: {
//                 datefilter: $("#datefilter").val()
//             },
//             success: function (data) {
//                 var test = data;
//                 $.each(test, function (i, object) {
//                     myArray.push({"lat": object.lat, "lng": object.lng})
//                 });
//                 console.log(myArray);
//             }
//         })
//     })
// })
