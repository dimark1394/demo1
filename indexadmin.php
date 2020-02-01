<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<title>My profile </title>
<!--<script>-->
<!--    function test() {-->
<!--        $(document).ready(function () {-->
<!--            $("#logout").click()-->
<!--            {-->
<!--                $.ajax({-->
<!--                    type: 'POST',-->
<!--                    url: 'logout.php',-->
<!--                    data: {-->
<!--                        logout: $("#logout").val()-->
<!--                    },-->
<!--                    success: function(data) {-->
<!--                        if(data === 'logout successfull') {-->
<!--                            alert(data);-->
<!--                            window.location.replace("loginpage.php");-->
<!--                        }-->
<!--                    }-->
<!--                })-->
<!--            }-->
<!---->
<!--        })-->
<!--    }-->
<!--</script>-->

<head>
    <title>LogInPage</title>
    <meta name="viewport" http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="indexadmin.css">
        </head>
            <body>
            <header>
            <nav>
            <a class="welcomemsg">Welcome back Admin</a>
                <a id="logout"  href="logout.php">Logout</a>
        </nav>
        </header>

        <main>

        <div class="container">
        </main>




        </body>

        </html>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
