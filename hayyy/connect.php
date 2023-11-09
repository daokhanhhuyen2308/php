<?php
//kbao biến
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = "website";
$conn = mysqli_connect($hostname, $username, $password, $dbname);
mysqli_set_charset($conn, 'utf8');
if(!$conn) {
    die('Không thể kết nối với csdl'. mysqli_error($conn));
    exit();
}

  
function getRes($result)
{
    $res = array();
    foreach($result as $key => $value){
        $res[$key] = $value;
    }
    return $res;
}
?>
