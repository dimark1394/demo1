<?php
session_start();
if(!isset($_SESSION['uiduser'])){
    header('location: loginpage.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<title>My profile </title>


<head>
    <title>LogInPageUser</title>
    <meta name="viewport" http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"/>
    <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"> </script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"/>
    <script src="https://cdn.jsdelivr.net/npm/heatmapjs@2.0.2/heatmap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/leaflet-heatmap@1.0.0/leaflet-heatmap.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="userpage.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="js/vendor/jquery.ui.widget.js"></script>
    <script src="js/jquery.iframe-transport.js"></script>
    <script src="js/jquery.fileupload.js"></script>
    <script src="entries_per_activity.js"></script>

</head>
<body background="images/rio.jpg">
<header>
    <nav>
        <a class="welcomemsg">Hello again!</a>
        <a id="logoutuser" href="logoutuser.php">Logout</a>
        <a class="infouser">Username: <?php echo $_SESSION['uiduser'] ?>  Email: <?php echo $_SESSION['usermail'] ?> </a>

    </nav>
</header>

<main>
    <div id="mapcontainer">
        <a id="maptitle">Upload your location json file for Patras city</a>
        <div id="mapid"></div>
        <script type="text/javascript" src="map.js"></script>
<!--        <script src="showmeheatmap.js"></script>-->
        <form id="upload" >
            Choose your json file :
            <input type="file" name="uploadingfile" id="uploadedfile" accept=".json" required/>
            <button name="submitupload" id="submitupload">Sumbit your JSON file!</button>
            <a id="progress"></a><br>
            <div id="error"></div><br>
            <div id="files"></div>

        </form>
        <div id="entries_per_activity" style="width: 700px; height: 300px"></div>
        <table id="t02">
            <tr>
                <th>Type</th>
                <th>Busiest Day</th>
                <th>Count</th>
            </tr>
            <br>
            <table id="t03">
                <tr>
                    <th>Type</th>
                    <th>Busiest Hour</th>
                    <th>Count</th>
                </tr>
            </table>
        </table>
    </div>
    <script src="upload.js"></script>
    <div class="datepicker">
        <h3>Select your range of dates</h3>
        <form id="heatmap" name="heatmap">
        <input type="text" name="datefilter" id="datefilter" value="" />
        <br> <br>
            <input type="submit" name="heatmapsumbit" id="heatmapsubmit" value="Submit your heatmap">
            <div id="#heat"></div>
        </form>
        <script type="text/javascript">
            $(function() {

                $('input[name="datefilter"]').daterangepicker({
                    timePicker: true,
                    timePicker24Hour:true,
                    autoUpdateInput: false,
                    locale: {
                        cancelLabel: 'Clear'
                    }
                });

                $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
                    $(this).val(picker.startDate.format('DD-MM-YYYY HH:mm:ss') + ' - ' + picker.endDate.format('DD-MM-YYYY HH:mm:ss'));
                });

                $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
                    $(this).val('');
                });

            });
        </script>
    </div>





    <div id="highscores">
        <a id="highscoresmsg">These are the top three ecologists of the month</a>
        <table id="t01">
            <tr>
                <th>Place</th>
                <th>Last name</th>
                <th>First name</th>
            </tr>
            <tr>
                <td>1st</td>
                <td>lastname1</td>
                <td>firstname1</td>
            </tr>
            <tr>
                <td>2nd</td>
                <td>lastname1</td>
                <td>firstname1</td>
            </tr>
            <tr>
                <td>3rd</td>
                <td>lastname3</td>
                <td>firstname3</td>
            </tr>

        </table>

        <script defer async type="text/javascript" src="last_year.js"></script>
        <div id="curve_chart" style="width: 700px; height: 300px"></div>

        <script src="datespan.js"></script>
        <script src="eco.js"></script>
        <!-- Apikonisi stixion xristi -->
        <div class="container2">
            <div class="box">
                <div class="icon" id="box1"><i class="fa fa-leaf" aria-hidden="true"></i></div>
                <div class="content" id="eco">
                    <h3>Eco Score</h3>
                    <p><span id="eco"></span></p>
                </div>
            </div>

            <div class="box2">
                <div class="icon2" id="box2"><i class="fa fa-address-book" aria-hidden="true"></i></div>
                <div class="content2">
                    <h3>User Info</h3>

                    <p><span id="lastupload"></span><span id="startdate"></span><span id="enddate"></span></p>



                </div>
            </div>




        </div>



    </div>



</main>




</body>

</html>
