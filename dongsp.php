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
    ?>
  <div class="container">
    <h2 style="border: 2px solid #ddd; margin-bottom:5px">Quản lý dòng sản phẩm</h2>
    <div>
      <table class="table">
        <tr>
          <!-- <td>STT</td> -->
          <td width="50px">Mã</td>
          <td width="200px">Tên</td>
          <td width="200px">Mô tả</td>
          <td width="200px">Action</td>
        </tr>
        <?php
        $sql = "SELECT * FROM adproducttype";
        $result = mysqli_query($conn, $sql);
        $res = getRes($result);
        foreach ($res as $row) {
            // var_dump($row);
            // echo "<br>";
            ?>
        <tr>
          <td><?php echo $row["Ma_loaisp"]?></td>
          <td><?php echo $row["Ten_loaisp"]?></td>
          <td><?php echo $row["Mota_loaisp"]?></td>
          <td>

            <button><a href="./update_loaisp.php?id=<?php echo $row["Ma_loaisp"]?>" style=" color:black; text-decoration:none;">Update</a></button>
            <button><a href="delete_loaisp.php?id=<?php echo $row["Ma_loaisp"]?>" style=" color:black; text-decoration:none;" >
                Delete
              </a></button>

          </td>
        </tr>
            <?php
        }
        ?>
      </table>
      <button><a href="./adproducttype.php" style="text-decoration: none;  color:black;">Add</a></button>
    </div>
  </div>
</body>

</html>
