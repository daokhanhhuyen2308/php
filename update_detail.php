<?php
require_once("connect.php");
$id = $_GET["id"];
$sql = "SELECT * FROM orderdetail WHERE mahd = '$id'";
$rel = mysqli_query($conn,$sql);
$hoadon = mysqli_fetch_assoc($rel);
if(!$hoadon)
{
	echo "Không tìm thấy hóa đơn";
	exit();
}
$mahd = isset($_POST["mahd"])?trim($_POST["mahd"]):$hoadon["mahd"];
$masp = isset($_POST["masp"])?trim($_POST["masp"]):$hoadon["masp"];
$tensp = isset($_POST["tensp"])?trim($_POST["tensp"]):$hoadon["tensp"];
$soluong = isset($_POST["soluong"])?trim($_POST["soluong"]):$hoadon["soluong"];
$dongia = isset($_POST["dongia"])?trim($_POST["dongia"]):$hoadon["dongia"];
$khuyenmai = isset($_POST["khuyenmai"])?trim($_POST["khuyenmai"]):$hoadon["khuyenmai"];

if(isset($_POST["btn_update"]))
{
	$sql1 = "UPDATE orderdetail SET mahd = '$mahd', masp = '$masp', tensp = '$tensp', soluong='$soluong', dongia='$dongia', khuyenmai='$khuyenmai' WHERE mahd = '$id'";
	$rel1 = mysqli_query($conn,$sql1);
	echo "Bạn đã cập nhật thành công";
}
?>
<form action="" method="post">
	<table width="800" border="1">
  <tr>
    <td colspan="2">Danh sách hóa đơn</td>
  </tr>
  <tr>
    <td>Mã hóa đơn</td>
    <td><input name="mahd" type="text" readonly value="<?php echo $mahd;?>"></td>
  </tr>
  <tr>
    <td>Mã sản phẩm</td>
    <td><input name="masp" type="text" value="<?php echo $masp;?>"></td>
  </tr>
  <tr>
    <td>Tên sản phẩm</td>
    <td><input name="tensp" type="text" value="<?php echo $tensp;?>"></td>
  </tr>
  <tr>
    <td>Số lượng</td>
    <td><input name="soluong" type="text" value="<?php echo $soluong;?>"></td>
  </tr>
  <tr>
    <td>Đơn giá</td>
    <td><input name="dongia" type="text" value="<?php echo $dongia;?>"></td>
  </tr><tr>
    <td>Khuyến mãi</td>
    <td><input name="khuyenmai" type="text" value="<?php echo $khuyenmai;?>"></td>
  </tr>
  <tr>
  	<td colspan="2">
    	<input name="btn_update" type="submit" value="Cập nhật">
    </td>
  </tr>
</table>

</form>