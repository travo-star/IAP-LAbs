<?php   
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location:login.php");
    }
?>
<html>
    <head>
        <title>Lab1</title>
        <script src="jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="validate.js"></script>
        <script type="text/javascript" src="apikey.js"></script>
        <link rel="stylesheet" type="text/css" href="validate.css">
        <!--bootstrap file//json_decode-->
        <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>


        <!--css-->
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css.map">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css.map">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css.map">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css.map">

    </head>
    <body>
        <p align='right'><a href="logout.php"></a></p>
        <hr>
        <h3>Here, we will createan API that alloiw Users/Developer to order items from external system</h3>
        </hr>
        <h4>We now put this features of allowing users to generate an API key. Click the button to generate the API key</h4>

        <button class="btn btn-primary" id="api-key-btn"> Generate API key</button> <br> <br>
        <!--This text area will hold the API key-->
        <stroing>Your API key:</stroing>(Note that if your API key is already in use by already running applications, generating a new key will stop the application from functioning) <br>
        <textarea cols="100" row="2" id="api_key" name="api_key" readonly><?php echo fetchUserApiKey();?> </textarea>

        <h3>Serve description</h3>
        We have a service/API that allows external applications to order food and also pull all order status by using order id. Let's do it.

        <hr>

    </body>
<html>