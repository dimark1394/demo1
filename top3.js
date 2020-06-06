google.charts.load('current', {'packages':['table']});
google.charts.setOnLoadCallback(drawTable);

function drawTable() {
    var jsonData = $.ajax({
        url: "top3scores.php",
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
    var table = new google.visualization.Table(document.getElementById(''));

    table.draw(data, options);
}