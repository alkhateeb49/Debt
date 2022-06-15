<?php
//db_connection
include 'db_connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email="";
    $phone="";
    if(isset($_POST['email']))
        $email = $_POST['email'];
    if(isset($_POST['phone']))
        $phone = $_POST['phone'];

    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE (email = '$email' or phone = '$phone') and Password = '$password'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if($result->num_rows > 0) {
        http_response_code(200);
        echo "right";
    }else {
        // var_dump(http_response_code(405));
        http_response_code(401);
        $error = "Your Email/Mobile Number or Password is invalid";
        echo $error;
    }
 }
