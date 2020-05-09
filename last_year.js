google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Month', 'Score'],
        ['January',  10],
        ['February',  24],
        ['March',  23],
        ['April',  50],
        ['May',  50],
        ['June',  63],
        ['Juy',  30],
        ['August',  80],
        ['September',  23],
        ['October',  12],
        ['November',  10],
        ['December',  18]
    ]);

    var options = {
        title: 'Your scores this last year',
        curveType: 'function',
        legend: { position: 'bottom' }
    };

    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

    chart.draw(data, options);
}