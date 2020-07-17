<?php
include_once 'DBConnector.php';
include_once 'user.php';

if(isset($_POST['btn-save'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $city = $_POST['city_name'];

    $username = $_POST['username'];
    $password = $_POST['password'];

    $utc_timestamp = $_POST['utc_timestamp'];
    $offset = $_POST['time_zone_offset'];

    //creating a new user object
    
    $user = new user($first_name,$last_name,$city,$username,$password);
    //create object for file uploading
    $uploader = new FileUploader;
    if(!$user->valiteForm()){
        $user->createFormErrorSessions();
        header("Refresh:0");
        die();
    }


    $res = $user->save();
    //call uploadFile() function, which retuns
    $file_upload_response = $uploader->uploadFile();
    //check if operation save took occured successfully.
    if($res && $file_upload_response){
        echo"Save operation was successful";
    }else{
        echo"An error occured!";
    }
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab1</title>
    <script type="text/javascript" src="validate.js"></script>
    <link rel="stylesheet" type="text/css" href="validate.css">

    <!--incclude jquery here. Get it from end network, Google-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
    <!--your new js file comes after including ur query-->
    <script type="text/javascript" src="timezone.js"></script>
</head>
<body>
    <form method="post" name="user_details" id="user_details" onsubmit="return validateForm()" action="<?=$_SERVER['PHP_SELF']?>">
        <table align="center">

            <tr>
            <td>
                <div id="form-errors">
                    <?php 
                        session_start();
                        if(!empty($_SESSION['form_errors'])){
                            echo " " . $_SESSION['form_errors'];
                            unset($_SESSION['form_errors']);
                        }
                    ?>
                </div>            
            </td>
            </tr>

            <tr>
                <td><input type="text" name="first_name" required placeholder="First Name"/></td>
            </tr>
            <tr>
                <td><input type="text" name="last_name" required placeholder="Last Name"/></td>
            </tr>
            <tr>
                <td><input type="text" name="city_name" required placeholder="City"/></td>
            </tr>
            <tr>
                <td><input type="text" name="username" required placeholder="Username"/></td>
            </tr>
            <tr>
                <td><input type="password" name="password" required placeholder="Password"/></td>
            </tr>
            <tr>
            <td>Profile image:<input type="file" name="fileToUpload" id="fileToUpload"> </td>
            </tr>
            <tr>
                <td><button type="submit" name="btn-save"><strong>SAVE</strong></button></td>
            </tr>
            <tr>
            <td><a href="login.php">Login</a></td>
            </tr>
        </table>
    </form>
    <table align="center">
    <tr>
        <td><a href="dataview.php"><button type="submit" name="btn-read"><strong>View Users</strong></button></a></td>
    </tr>
</body>
</html>