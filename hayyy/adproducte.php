<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <Link href="public/stylee.css" rel="stylesheet" type="text/css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

  <?php 
  //Quản lý danh mục loại hàng hóa
  require_once "connect.php";
  require_once "view/header1.php";
  $txt_maloaisp = isset($_POST["txt_maloaisp"]) ?$_POST["txt_maloaisp"] : "";
  $txt_tenloaisp = isset($_POST["txt_tenloaisp"]) ?$_POST["txt_tenloaisp"] : "";
  $txt_motaloaisp = isset($_POST["txt_motaloaisp"]) ?$_POST["txt_motaloaisp"] : "";

  if(isset($_POST["btn_save"])) {
      $sql = "SELECT * FROM adproducttype WHERE Ma_loaisp = '$txt_maloaisp'";
      $rel = mysqli_query($conn, $sql);
      if(mysqli_num_rows($rel) > 0) {
          echo "đã tồn tại mã loại sp này";
      }
      else {
          $sql1 = "INSERT INTO adproducttype VALUE ('$txt_maloaisp', '$txt_tenloaisp', '$txt_motaloaisp')";
          $rel = mysqli_query($conn, $sql1);
          echo "bạn đã thêm thành công";
          header('Location: dongsp.php');
      }
  }
    ?>
  <form action="" method="post" class="container">
    <h2>Them dong san pham</h2>
    <table>
      <tr>
        <td>
          <input type="text" name="txt_maloaisp" placeholder="Mã loại sản phẩm" />
        </td>

        <td>
          <input type="text" name="txt_tenloaisp" placeholder="Tên loại sản phẩm" />
        </td>

        <td>
          <input type="text" name="txt_motaloaisp" placeholder="Mô tả loại sản phẩm" />
        </td>

        <td>
          <input name="btn_save" type="submit" value="them" />
        </td>
      </tr>
    </table>


  </form>
</body>

</html>
