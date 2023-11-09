<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <Link href="public/stylee.css" rel="stylesheet" type="text/css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <?php
  require_once "view/header1.php";
  ?>
  <form action="" method="post">
    <table width="200" border="1">
      <tr>
        <td colspan="4">THem loại sản phẩm</td>
      </tr>
      <tr>
        <td>Mã loại sản phẩm</td>
        <td><input type="text" name="txt_maloaisp" /></td>
      </tr>
      <tr>
        <td>Tên loại sản phẩm</td>
        <td><input type="text" name="txt_tenloaisp" /></td>
      </tr>
      <tr>
        <td>Mô tả loại sản phẩm</td>
        <td>
          <textarea name="txt_motaloaisp" cols="20" rows="5"></textarea>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <input type="submit" name="btn_update" value="them" />
        </td>
      </tr>
    </table>
  </form>

  <?php
if(!isset($_POST["txt_maloaisp"])) {
    exit();
}
require_once "connect.php";
$txt_maloaisp = trim($_POST["txt_maloaisp"]);
$txt_tenloaisp = trim($_POST["txt_tenloaisp"]);
$txt_motaloaisp = trim($_POST["txt_motaloaisp"]);
$sql = "INSERT INTO adproducttype VALUES('$txt_maloaisp','$txt_tenloaisp','$txt_motaloaisp')";
$result = mysqli_query($conn, $sql);
if($result) {
    echo "thanh cong";
}
else{
    echo "that bai";
}
?>
</body>

</html>