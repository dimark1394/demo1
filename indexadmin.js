// Load google charts
google.charts.load('current', {'packages':['corechart', 'bar']});
google.charts.setOnLoadCallback(drawPieChart);
google.charts.setOnLoadCallback(drawBarChart);
google.charts.setOnLoadCallback(drawLineChart);
google.charts.setOnLoadCallback(drawLineChart2);
google.charts.setOnLoadCallback(drawLineChart3);
google.charts.setOnLoadCallback(drawLineChart4);


// Draw the chart and set the chart values
function drawPieChart() {
    var jsonData = $.ajax({
        url: "entries_per_activity_admin.php",
        dataType: "json",
        async: false
    }).responseText;
    var data = new google.visualization.DataTable(jsonData);
    var options = {
        title: 'Pososto drastiriotitas ana xristi',
        curveType: 'function',
        legend: { position: 'bottom' }
    };
    console.log(data);
// Instantiate and draw the chart for pizza.
    var chart = new google.visualization.PieChart(document.getElementById('piechart_div'));

    chart.draw(data, options);
}

function drawBarChart() {

    var jsonData = $.ajax({
        url: "entries_per_user.php",
        dataType: "json",
        async: false
    }).responseText;
    var data = new google.visualization.DataTable(jsonData);
    var options = {
        title: 'Pososto egraffwn ana xristi',
        curveType: 'function',
        legend: { position: 'bottom' }
    };
    console.log(data);

    var barchart = new google.visualization.BarChart(document.getElementById('barchart_div'));
    barchart.draw(data, options);

}


function drawLineChart() {
    var jsonData = $.ajax({
        url: "entries_per_month_admin.php",
        dataType: "json",
        async: false
    }).responseText;
    var data = new google.visualization.DataTable(jsonData);
    var options = {
        title: 'Pososto drastiriotitas ana mina',
        curveType: 'function',
        legend: { position: 'bottom' }
    };
    console.log(data);
// Instantiate and draw the chart for pizza.
    var chart = new google.visualization.PieChart(document.getElementById('linechart_div'));

    chart.draw(data, options);
}


function drawLineChart2() {
    var jsonData = $.ajax({
        url: "entries_per_day_admin.php",
        dataType: "json",
        async: false
    }).responseText;
    var data = new google.visualization.DataTable(jsonData);
    var options = {
        title: 'Pososto drastiriotitas ana mera',
        curveType: 'function',
        legend: { position: 'bottom' }
    };
    console.log(data);
// Instantiate and draw the chart for pizza.
    var chart = new google.visualization.PieChart(document.getElementById('linechart2_div'));

    chart.draw(data, options);
}


function drawLineChart3() {
    var jsonData = $.ajax({
        url: "entries_per_hour_admin.php",
        dataType: "json",
        async: false
    }).responseText;
    var data = new google.visualization.DataTable(jsonData);
    var options = {
        title: 'Pososto drastiriotitas ana wra',
        curveType: 'function',
        legend: { position: 'bottom' }
    };
    console.log(data);
// Instantiate and draw the chart for pizza.
    var chart = new google.visualization.PieChart(document.getElementById('linechart3_div'));

    chart.draw(data, options);
}


function drawLineChart4() {
    var jsonData = $.ajax({
        url: "entries_per_year_admin.php",
        dataType: "json",
        async: false
    }).responseText;
    var data = new google.visualization.DataTable(jsonData);
    var options = {
        title: 'Pososto drastiriotitas ana xrono',
        curveType: 'function',
        legend: { position: 'bottom' }
    };
    console.log(data);
// Instantiate and draw the chart for pizza.
    var chart = new google.visualization.PieChart(document.getElementById('linechart4_div'));

    chart.draw(data, options);
}

/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}





