<?php
//db_connection
include 'classes/db_connection.php';
function checker($email,$token){
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $GLOBALS['conn']->query($sql);
    if($result->num_rows == 1) {
        while($row = $result->fetch_assoc()){
            $id=$row['id'];
            $email=$row['email'];
            $password=$row['password'];
            }
            $code = crypt($email.date('d'),$password);
            if($code == $token){
                return ['state'=>true,'id'=>$id];
            }
    }
    return ['state'=>false,'id'=>0];
}