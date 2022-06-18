<?php
//db_connection
include 'classes/db_connection.php';
include 'checker.php';


// echo date('d');
// if($_SERVER["REQUEST_METHOD"] == "GET" && $_GET['fun'] == "in") {
//     $data = $_GET['data'];
//     $key = $_GET['key'];

//     echo crypt($data,$key);
// }
// if($_SERVER["REQUEST_METHOD"] == "GET" && $_GET['fun'] == "de") {
//     $code = $_GET['code'];
    
//     if(crypt("mohammad","king") == $code)
//         echo "Right";

// }

// if($_SERVER["REQUEST_METHOD"] == "POST") {
//     $id=$_POST['id'];
//     $email=$_POST['email'];
//     $token=$_POST['token'];
//     $sql = "SELECT * FROM users WHERE email = '$email'";
//     $result = $conn->query($sql);
//     if($result->num_rows == 1) {
//         while($row = $result->fetch_assoc()){
//             $email=$row['email'];
//             $password=$row['password'];
//             }
//             $code = crypt($email.date('d'),$password);
//             if($code == $token){
//                 http_response_code(200);
//                 echo "DONE";
//             }
//     }
// }

// if($_SERVER["REQUEST_METHOD"] == "POST") {
//     if(checker($email=$_POST['email'],$token=$_POST['token'])('state'))
// }


echo checker($_POST['email'],$_POST['token'])["state"];
// var_dump($res);