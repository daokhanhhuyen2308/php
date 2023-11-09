

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
	$quoctich = $_POST["Quoctich"];
	$txt_email = $_POST["txt_email"];
	$txt_address=$_POST["txt_address"];
	$gioitinh = $_POST["gioitinh"];
	$hinhanh =$_FILES["uploadfile"]['name'];
	$shopping = isset($_POST["txt_shopping"])?$_POST["txt_shopping"]:"";
	$xemfilm = isset($_POST["txt_xemfilm"])?$_POST["txt_xemfilm"]:"";
	$dichoi = isset($_POST["txt_dichoi"])?$_POST["txt_dichoi"]:"";
	$sothich = array($xemfilm, $shopping, $dichoi);
	//chuyển sở thick từ 1 mảng thành 1 chuỗi
	$sothichcd = implode(",", $sothich);
	$sql = "SELECT * FROM dangkithanhvien WHERE Username = 'txt_username'";
	$rel = mysqli_query($conn, $sql);
	if (mysqli_num_rows($rel) > 0) {
		echo "Đã tồn tại tên đăng nhập này ";
		}
	   else {
		   $sql = "INSERT INTO dangkithanhvien VALUE('$txt_fullname', '$txt_username', '$txt_password', '$quoctich', '$txt_email', '$gioitinh',  '$txt_address','$hinhanh', '$sothichcd' )";
		   $rell = mysqli_query($conn, $sql);
		   echo "Bạn đã thêm thành công";
		   }
	
	}

?>
<form action="" method="post" enctype="multipart/form-data">
    <table width="450" height="200" align="center" class="dkitv">
  <tr>
    <td colspan="2"style="text-align:center; font-size: 20px" bgcolor="#FFCCFF"><h3>Đăng ký thành viên</h3></td>

  </tr>
  <tr>
    <td>Fullname</td>
    <td><input type="text" name="txt_fullname"placeholder="Nhập đầy đủ họ tên"/></td>
  </tr>
  
    <tr>
    <td>Username</td>
    <td><input type="text" name="txt_username"placeholder="Nhập tên đăng nhập"/></td>
  </tr>
  
  <tr>
    <td>Passwword</td>
    <td><input type="password" name="txt_password" placeholder="Mật khẩu"/></td>
  </tr>
  
  
    <tr>
    <td>Giới Tính</td>
    <td>
        <input type="radio" name="gioitinh" Value="Nam"/>Nam
        <input name="gioitinh" type="radio"  value="Nữ" checked="checked" />Nữ
        
        
    </td>
  </tr>
  
      <tr>
    <td>Quốc Tịch</td>
    <td>
      <select type="dropdow" name="Quoctich">
           <option value="Vietnam" selected="selected">Việt Nam</option>
           <option value="Canada"/>Canada</option>
           <option value="Us"/>Mĩ</option>
       </select>
    </td>
  </tr>
  
  <tr>
  <td>Email</td>
  <td><input type="text" name="txt_email"/></td>
  </tr>
  
   <tr>
    <td>Địa chỉ</td>
    <td> 
    <textarea name="txt_address" rows="8" cols="18" placeholder="Nhập địa chỉ"></textarea>
    </td>
  </tr>
  
   <tr>
    <td>Avatar</td>
 
	 <?php
		if(isset($_FILES['uploadfile'])){
			$file_name = $_FILES['uploadfile']['name'];
			$file_tmp =$_FILES['uploadfile']['tmp_name'];
			if(empty($errors)==true){
move_uploaded_file($file_tmp,"public/images/".$file_name);
				echo "Thành công"; }
			else{ echo "upload không thành công";}
		}?>       
        <td><input type="file" name="uploadfile"/></td>
  </tr>
  
   <tr>
    <td>Sở thích</td>
    <td>
        <input name="txt_shopping" type="checkbox" value="shopping"/>shopping
        <input name="txt_xemfilm" type="checkbox" value="xemfilm" />xem film
        <input name="txt_dichoi" type="checkbox" value="dichoi"/>đi chơi
    </td>
  </tr>
  
  <tr>
    <td colspan="2" align="center"><input name="Login" type="submit" value="Đăng nhập" />
        <input name="Reset" type="reset" value="reset" />
    </td>
  </tr>
  
  
</table>

  </form>