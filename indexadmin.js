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
    var data = google.visualization.arrayToDataTable([
        ['Activity', 'Percentage'],
        ['WALKING', 8],
        ['STILL', 2],
        ['CAR', 2],

    ]);

// Set options for pie chart.
    var piechart_options = {title:'Ποσοστό εγγραφών ανά δραστηριότητα',
        width:400,
        height:300};

// Instantiate and draw the chart for pizza.
    var piechart = new google.visualization.PieChart(document.getElementById('piechart_div'));
    piechart.draw(data, piechart_options);
}

function drawBarChart() {

    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Topping');
    data.addColumn('number', 'Slices');
    data.addRows([
        ['Mark', 3],
        ['Nikos', 1],
        ['Vag', 1],

    ]);



    var barchart_options = {title:'Barchart: Ποσοστό εγγαρφών ανά χρήστη',
        width:400,
        height:300,
        legend: 'none'};

    var barchart = new google.visualization.BarChart(document.getElementById('barchart_div'));
    barchart.draw(data, barchart_options);

}


function drawLineChart() {
    var data = google.visualization.arrayToDataTable([
        ['Month', 'Percentage'],
        ['January', 18],
        ['February', 28],
        ['March', 58],
        ['April', 8],
        ['May', 12],
        ['June', 5],
        ['July', 75],
        ['August', 5],
        ['Septmber', 8],
        ['Octomber', 7],
        ['November', 45],
        ['December', 75],

    ]);

    // Set options for pie chart.
    var linechart_options = {title:'Ποσοστό εγγραφών ανά μήνα', curveType: 'function', legend: {position: 'bottom'},
        width:400,
        height:300};

    // Instantiate and draw the chart for pizza.
    var linechart = new google.visualization.LineChart(document.getElementById('linechart_div'));
    linechart.draw(data, linechart_options);
}


function drawLineChart2() {
    var data = google.visualization.arrayToDataTable([
        ['Day', 'Percentage'],
        ['Monday', 55],
        ['Tuesday', 12],
        ['Wendsday', 15],
        ['Thursday', 36],
        ['Friday', 2],
        ['Saturday', 1],
        ['Sunday', 20],


    ]);

    // Set options for pie chart.
    var linechart_options = {title:'Ποσοστό εγγραφών ανά ημέρα', curveType: 'function', legend: {position: 'bottom'},
        width:400,
        height:300};

    // Instantiate and draw the chart for pizza.
    var linechart = new google.visualization.LineChart(document.getElementById('linechart2_div'));
    linechart.draw(data, linechart_options);
}


function drawLineChart3() {
    var data = google.visualization.arrayToDataTable([
        ['Time', 'Percentage'],
        ['00', 0],
        ['01', 0],
        ['02', 0],
        ['03', 0],
        ['04', 0],
        ['05', 0],
        ['06', 0],
        ['07', 0],
        ['08', 12],
        ['09', 15],
        ['12', 36],
        ['13', 2],
        ['14', 1],
        ['15', 20],
        ['16', 55],
        ['17', 12],
        ['18', 15],
        ['19', 36],
        ['20', 0],
        ['21', 0],
        ['22', 0],
        ['23', 0],



    ]);

    // Set options for pie chart.
    var linechart_options = {title:'Ποσοστό εγγραφών ανά ώρα', curveType: 'function', legend: {position: 'bottom'},
        width:400,
        height:300};

    // Instantiate and draw the chart for pizza.
    var linechart = new google.visualization.LineChart(document.getElementById('linechart3_div'));
    linechart.draw(data, linechart_options);
}


function drawLineChart4() {
    var data = google.visualization.arrayToDataTable([
        ['Year', 'Percentage'],
        ['2015', 12],
        ['2016', 25],
        ['2017', 32],
        ['2018', 55],
        ['2019', 80],
        ['2020', 75]



    ]);

    // Set options for pie chart.
    var linechart_options = {title:'Ποσοστό εγγραφών ανά έτος', curveType: 'function', legend: {position: 'bottom'},
        width:400,
        height:300};

    // Instantiate and draw the chart for pizza.
    var linechart = new google.visualization.LineChart(document.getElementById('linechart4_div'));
    linechart.draw(data, linechart_options);
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


