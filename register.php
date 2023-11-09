<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Register</title>
  <link href="public/login.css" rel="stylesheet" type="text/css" />
</head>
<body>


<?php
require_once("connect.php");
// lấy dl
$txt_fullname = "";
$txt_username = "";
$txt_password = "";
$gioitinh = "";
$quoctich = "";
$txt_email = "";
$txt_address = "";
$hinhanh = "";
$sothich = "";
if(isset($_POST["Login"])) {
	$txt_fullname = $_POST["txt_fullname"];
	$txt_username = $_POST["txt_username"];
	$txt_password = $_POST["txt_password"];
	$txt_email = $_POST["txt_email"];
	$gioitinh = $_POST["gioitinh"];
	$quoctich = $_POST["txt_quoctich"];
	$txt_address=$_POST["txt_address"];
	$hinhanh =$_FILES["uploadfile"]['name'];
	$voleyball = isset($_POST["txt_voleyball"])?$_POST["txt_voleyball"]:"";
	$swimming = isset($_POST["txt_swimming"])?$_POST["txt_swimming"]:"";
	$football = isset($_POST["txt_football"])?$_POST["txt_football"]:"";
	$sothich = array($voleyball, $swimming, $football);
	$sothichcd = implode(",", $sothich);
	$quyen = $_POST["quyen"];
	$sql = "SELECT * FROM dangkithanhvien WHERE Username = 'txt_username'";
	$rel = mysqli_query($conn, $sql);
	if (mysqli_num_rows($rel) > 0) {
		// echo "Đã tồn tại tên đăng nhập này ";
    echo "<div class='message'>
      <p>Tên người dùng này đã được sử dụng!</p>
       </div> <br>";
       echo "<a href='javascript:self.history.back()'><button class='button'>Trở lại</button></a>";
		}
	   else {
		   $sql = "INSERT INTO dangkithanhvien VALUE('$txt_fullname', '$txt_username', '$txt_password', '$txt_email', '$gioitinh', '$quoctich', '$txt_address','$hinhanh', '$sothichcd','$quyen' )";
		   //$sql = "INSERT INTO user_form VALUE(`Fullname`, `Username`, `Password`, `Email`, `Gioitinh`, `Quoctich`, `Diachi`, `Avatar`, `Sothich`, `quyen`)";
		   $rell = mysqli_query($conn, $sql);
		   //echo "Bạn đã thêm thành công";
       echo "<div class='message'> 
      <p>Đăng ký thành công</p>
       </div> <br>";
       echo "<a href='login.php'><button class='button'>Đăng nhập ngay</button></a>";
        }
    }
    else{
?>
<div class="container">
<div class="box form-box"> 
<header>Sign up</header>
<form action="" method="post" enctype="multipart/form-data"> 
<div class="field input"> 
<label for="fullname">Fullname</label>
<input type="text" name="txt_fullname" id="fullname" autocomplete="off" required="required"/>

<div class="field input"> 
<label for="username">Username</label>
<input type="text" name="txt_username" id="username" autocomplete="off" required="required"/>

<div class="field input"> 
<label for="password">Password</label>
<input type="text" name="txt_password" id="password" autocomplete="off" required="required"/>

<div class="field input"> 
<label for="email">Email</label>
<input type="text" name="txt_email" id="email" autocomplete="off" required="required"/>

<div class="field input"> 
<label for="gender">Gender</label>
<input type="radio" name="gioitinh" Value="Nam"/>Nam
<input name="gioitinh" type="radio"  value="Nữ" checked="checked" />Nữ
<div class="field input"> 
<label for="quoctich">Quốc tịch</label>
<input type="text" name="txt_quoctich" id="quoctich" autocomplete="off" required="required"/>


<div class="field input"> 
<label for="address">Address</label>
<input type="text" name="txt_address" id="address" autocomplete="off" required="required"/>

<div class="field avatar"> 
<label for="avatar">Avatar</label>
<?php
		if(isset($_FILES['uploadfile'])){
			$file_name = $_FILES['uploadfile']['name'];
			$file_tmp =$_FILES['uploadfile']['tmp_name'];
			if(empty($errors)==true){
move_uploaded_file($file_tmp,"public/images/".$file_name);
				echo "Thành công"; }
			else{ echo "upload không thành công";}
		}?>       
<input type="file" name="uploadfile"/>

<div class="field input"> 
<label for="">Hobbies</label>
        <input name="txt_volayball" type="checkbox" value="volayball"/>Voleyball
        <input name="txt_swimming" type="checkbox" value="swimming" />Swimming
        <input name="txt_football" type="checkbox" value="football"/>Football

<div class="field input"> 
<label for="quyen">Quyền</label>
<input type="text" name="quyen" id="quyen"/>
	
<div class="field"> 

<input type="submit" class="btn" name="Login" value="Register"/>
<div class="links" name="btn_login"> 
Already a member? <a href="login.php" >Sign in</a>
</div>
</div>
</form>
</div>
<?php } ?>
</div>
</body>
</html>
