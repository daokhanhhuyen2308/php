<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <Link href="public/main.css" rel="stylesheet" type="text/css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

  <?php 
require_once("connect.php");
require_once "view/header1.php";
$id = $_GET["id"];
$sql = "SELECT * FROM adproducttype WHERE Ma_loaisp = '$id'";
$rel = mysqli_query($conn, $sql);
$sanpham = mysqli_fetch_assoc($rel);
if (!$sanpham) {
    echo "Không tìm thấy sản phẩm";
	exit();
}
$txt_maloaisp = isset($_POST["txt_maloaisp"])?trim($_POST["txt_maloaisp"]): $sanpham["Ma_loaisp"];
$txt_tenloaisp = isset($_POST["txt_tenloaisp"])?trim($_POST["txt_tenloaisp"]): $sanpham["Ten_loaisp"];
$txt_motaloaisp = isset($_POST["txt_motaloaisp"])?trim($_POST["txt_motaloaisp"]): $sanpham["Mota_loaisp"];

if(isset($_POST["btn_update"])) {
	$sql1 = "UPDATE adproducttype SET Ma_loaisp = '$txt_maloaisp',Ten_loaisp = '$txt_motaloaisp', Mota_loaisp = '$txt_motaloaisp' WHERE Ma_loaisp = '$id'";
	$rel1 = mysqli_query($conn,$sql1);
	echo "Bạn đã cập nhập thành công";
  header('location:dongsp.php');
  exit();
	}
?>
  <form action="" method="post">
    <table width="800" style="border:1px">
      <tr>
        <td colspan="4">Danh sách loại sản phẩm</td>
      </tr>
      <tr>
        <td>Mã loại sản phẩm</td>
        <td><input type="text" name="txt_maloaisp" value="<?php echo $txt_maloaisp; ?>" /></td>
      </tr>
      <tr>
        <td>Tên loại sản phẩm</td>
        <td><input type="text" name="txt_tenloaisp" value="<?php echo $txt_tenloaisp; ?>" /></td>
      </tr>
      <tr>
        <td>Mô tả loại sản phẩm</td>
        <td>
          <textarea name="txt_motaloaisp" cols="20" rows="5" value="<?php echo $txt_motaloaisp; ?>">
    <?php echo $txt_tenloaisp; ?>
    </textarea>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <input type="submit" name="btn_update" value="Cập Nhật" />
        </td>
      </tr>
    </table>
  </form>
</body>

</html>