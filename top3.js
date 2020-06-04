google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var jsonData = $.ajax({
        url: "top3scorers.php",
        dataType: "json",
        async: false
    }).responseText;
    var data = new google.visualization.DataTable(jsonData);
    var options = {
        title: 'These are the top 3 ecologist of the month',
        curveType: 'function',
        legend: { position: 'bottom' }
    };
    console.log(data);
    var chart = new google.visualization.Table(document.getElementById(''));

    chart.draw(data, options);
}