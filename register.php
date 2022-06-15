<?php
//db_connection
include 'db_connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $pic = $_POST['pic'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email' or phone = '$phone'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if($result->num_rows > 0) {
        $error = "Email or Mobile Number already exists";
        http_response_code(405);
        echo $error;
    }else {
        $sql = "INSERT INTO users (email,name,phone,pic,CreationDate,password)
        VALUES ('$email','$name','$phone','$pic',CURRENT_TIMESTAMP(),'$password')";

        if ($conn->query($sql) === TRUE) {
            http_response_code(200);
            echo "done";
        } else {
            http_response_code(405);
            echo "Error: " . $sql . $conn->error;
        }

          }
 }
