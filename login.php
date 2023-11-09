
<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Login</title>
  <link href="public/login.css" rel="stylesheet" type="text/css" />
</head>

<body>


<?php
session_start();
require_once "connect.php";
if(isset($_POST["Login"])) {
    $txt_username = $_POST["txt_username"];
    $txt_password = $_POST["txt_password"];
    $sql = "SELECT * FROM dangkithanhvien WHERE Username = '$txt_username' and Password = '$txt_password'";
    $rel = mysqli_query($conn, $sql);
    if (mysqli_num_rows($rel) > 0) {
        echo "bạn đã đăng nhập thành công";
        header('Location: ./index.php');
        $_SESSION['txt_username'] = $txt_username;
        $res = getRes($rel);
        $_SESSION['quyen'] = $res[0]['quyen'];
    }
    else { echo "Không đăng nhập thành công";
    }
}
         //kiểm tra thông tin ng dùng vào ô check và lưu
         /* $remeber = isset($_POST["txt_check"])?$_POST["txt_check"] :"";
        if(!empty($_POST["txt_check"])) {
             setcookie("txt_username", $txt_username, time()+600);
             setcookie("txt_password", $txt_password, time()+600);
             echo "Đã ghi nhớ thành công";
             }
         else echo "Không ghi nhớ thành công";*/
     
?>

<div class="container">
<div class="box form-box"> 
<header>Login</header>
<form action="" method="post"> 
<div class="field input"> 
<label for="username">Username</label>
<input type="text" name="txt_username" id="username" autocomplete="off" required="required"/>
<div class="field input"> 
<label for="password">Password</label>
<input type="password" name="txt_password" id="password" autocomplete="off" required="required"/>
<div class="field"> 
<input type="submit" class="btn" name="Login" value="Đăng nhập"/>
<input type="reset" class="btn" name="Reset" value="Reset"/>

<div class="links" name="btn_login"> 
Don't have a account? <a href="register.php">Sign up</a>
</div>
</div>
</form>
</div>
</div>
</body>
</html>
