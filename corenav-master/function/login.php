<?php

include "../server_connect/connect.php";

$id = $_POST[id];
$pw = $_POST[pw];

$sql="select * from user where id='$id';";
$result = mysql_query($sql, $connect);
$row = mysql_fetch_array($result);

if($row){
    if($row[pw] == $pw){
        // Login Success
        $_SESSION[id] = $id;
    }else{
        // Login Failed
        echo "<script> alert('Member information does not match.')</script>";
    }
}
else{
    echo "<script> alert('There is no membership information')</script>";
}

echo "<script> location.replace('../index.php')</script>";

?>