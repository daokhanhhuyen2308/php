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
        header('Location: ./indexx.php');
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
<form action="" method="post">
  <table width="200" border="1" align="center">
    <tr>
      <td colspan="2" style="text-align:center" bgcolor="#FFCCFF">
        <h3>Đăng Nhập</h3>
      </td>

    </tr>
    <tr>
      <td>Username</td>
      <td><input type="text" name="txt_username" placeholder="Tên đăng nhập" /></td>
    </tr>
    <tr>
      <td>Passwword</td>
      <td><input type="password" name="txt_password" placeholder="Mật khẩu" /></td>
    </tr>


    <tr>
      <td colspan="2">
        <input type="checkbox" name="txt_check">Remember me for 7 days
      </td>
    </tr>

    <tr>
      <td colspan="2" align="center">
        <input name="Login" type="submit" value="Đăng nhập" />
        <input name="Reset" type="reset" value="reset" />
      </td>
    </tr>
  </table>

</form>
