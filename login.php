<?php
//db_connection
include 'classes/db_connection.php';

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
    // $row = $result->fetch_assoc();

    if($result->num_rows > 0) {
        http_response_code(200);
        while($row = $result->fetch_assoc()){
        $id=$row['id'];
        $email=$row['email'];
        $password=$row['password'];
        }
        $data = ['id'=> $id,'email'=>$email,'token' => crypt($email.date('d'),$password)];
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }else {
        // var_dump(http_response_code(405));
        http_response_code(401);
        $error = "Your Email/Mobile Number or Password is invalid";
        echo $error;
    }
 }
