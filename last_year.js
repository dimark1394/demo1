google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var jsonData = $.ajax({
        url: "eco_year.php",
        dataType: "json",
        async: false
    }).responseText;
    var data = new google.visualization.DataTable(jsonData);
    var options = {
        title: 'Your scores this last year',
        curveType: 'function',
        legend: { position: 'bottom' }
    };
    console.log(data);
    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

    chart.draw(data, options);
}


//     $.ajax({
//         type:'GET',
//         url: 'eco_year.php',
//         success: function (data) {
//
//             var response = JSON.parse(data)
//             // console.log(data)
//             //var test = new Array();
//             // for(i=0;i<response.length;i++){
//             //
//             //     let mainOb = new Object();
//             //     let jsonArg1 = new Object();
//             //     jsonArg1.v = response[i]['month'];
//             //     let jsonArg2 = new Object();
//             //     jsonArg2.v = response[i]['score'];
//             //     let pluginArrayArg = new Array();
//             //     pluginArrayArg.push(jsonArg1);
//             //     pluginArrayArg.push(jsonArg2);
//             //     mainOb.c = pluginArrayArg;
//             //     test.push(mainOb)
//             //     // console.log(response[i])
//             // }
//
//
//
//
//              console.log(response)
//
//             var lol = new google.visualization.DataTable({
//                 cols: [{id: 'month', label: 'Month', type: 'string'},
//                     {id: 'score', label: 'Score', type: 'number'}],
//                 rows: test
//             }, 10);
//             // arrayToDataTable([
//             //     ['Month', 'score'],
//             //     ['January',  10],
//             //     ['February',  24],
//             //     ['March',  23],
//             //     ['April',  50],
//             //     ['May',  50],
//             //     ['June',  63],
//             //     ['Juy',  30],
//             //     ['August',  80],
//             //     ['September',  23],
//             //     ['October',  12],
//             //     ['November',  10],
//             //     ['December',  18]
//             // ]);
//
//             var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
//
//             chart.draw(lol, options);
//         },
//         error: function (data) {
//             console.log("data")
//         }
//     })
//
//     var options = {
//         title: 'Your scores this last year',
//         curveType: 'function',
//         legend: { position: 'bottom' }
//     };
//
//
// }