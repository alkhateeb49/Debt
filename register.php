<?php
//db_connection
include 'classes/db_connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $pic = $_POST['pic'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email' or phone = '$phone'";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
        $error = "Email or Mobile Number already exists";
        http_response_code(405);
        echo $error;
    }else {
        $sql = "INSERT INTO users (email,name,phone,pic,CreationDate,password)
        VALUES ('$email','$name','$phone','$pic',CURRENT_TIMESTAMP(),'$password')";

        if ($conn->query($sql) === TRUE) {
            
            $sql = "SELECT * FROM users WHERE (email = '$email' or phone = '$phone') and Password = '$password'";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){
                $id=$row['id'];
                $email=$row['email'];
                $password=$row['password'];
                }
            http_response_code(200);
            // echo "done";
            $data = ['id'=> $id,'email'=>$email,'token' => crypt($email.date('d'),$password)];
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($data);
        } else {
            http_response_code(405);
            echo "Error: " . $sql . $conn->error;
        }

          }
 }
