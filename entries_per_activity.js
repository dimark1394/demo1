google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var jsonData = $.ajax({
        url: "entries_per_activity.php",
        dataType: "json",
        async: false
    }).responseText;
    var data = new google.visualization.DataTable(jsonData);
    var options = {
        title: 'Number of entries per activity',
        curveType: 'function',
        legend: { position: 'bottom' }
    };
    console.log(data);
    var chart = new google.visualization.PieChart(document.getElementById('entries_per_activity'));

    chart.draw(data, options);
}