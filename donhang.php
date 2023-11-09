<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <Link href="public/main.css" rel="stylesheet" type="text/css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

  <?php
  require_once "view/header1.php";
  require_once "connect.php";
  // lấy dl

  if(isset($_GET["id"])) {
      $id = $_GET["id"];
      $sql = "UPDATE `order` SET `trangthai`='1' WHERE mahd = '$id'";
      $result = mysqli_query($conn, $sql);
        echo "update thanh cong";

  }
  else {
      $sql = "SELECT * FROM `order`";
      $rel = mysqli_query($conn, $sql);
      $res = getRes($rel);
        ?>
  <div class="container">
    <h2>Danh sách đơn hàng</h2>
    <table class="table">
      <tr>
        <td width="100px">Mã</td>
        <td width="200px">Trạng thái</td>
        <td width="100px">Action</td>
      </tr>
      <?php
        for( $i = 0; $i < count($res); $i++ ) {
            ?>
      <tr>
        <td><?php echo $res[$i]["mahd"]?></td>
        <td><?php echo $res[$i]["trangthai"] == '0' ? "chua hoan thanh":"hoan thanh"?></td>

        <td><button><a href="?id=<?php echo $res[$i]['mahd']?>">hoan thanh</a></button></td>
      </tr>
            <?php   
        }
  }

    ?>
    </table>
  </div>
</body>

</html>
