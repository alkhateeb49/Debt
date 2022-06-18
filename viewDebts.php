<?php
//db_connection
include 'classes/db_connection.php';
include 'checker.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email=$_POST['email'];
    $token=$_POST['token'];
}

if(checker($email,$token)["state"]){
$id=checker($email,$token)["id"];
$sql = "SELECT * FROM debtsrecord WHERE idTo = '$id' or idFrom = '$id'";
// $sql = "SELECT * FROM debtsrecord";
$result = $conn->query($sql);
$data2=[];
while($row = $result->fetch_assoc()){
    http_response_code(200);
    $data = ['idTo'=> $row['idTo'],'idFrom'=> $row['idFrom'],'time'=> $row['CreationDate'],'desc'=> $row['description'],'amount'=> $row['amount'],'status'=> $row['status']];
    header('Content-Type: application/json; charset=utf-8');
    array_push($data2,$data);

}
echo json_encode($data2);
}