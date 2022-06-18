<?php
//db_connection
include 'classes/db_connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $idFrom = $_POST['idFrom'];
    $idTo = $_POST['idTo'];
    $desc = $_POST['desc'];
    $amount = $_POST['amount'];
    $status = $_POST['status'];

    $sql = "INSERT INTO debtsrecord (idFrom,idTo,description,amount,CreationDate,status)
        VALUES ('$idFrom','$idTo','$desc','$amount',CURRENT_TIMESTAMP(),'$status')";
    if ($conn->query($sql) === TRUE) {
        http_response_code(200);
        // $data = [];
        // header('Content-Type: application/json; charset=utf-8');
        // echo json_encode($data);
    }    
}
