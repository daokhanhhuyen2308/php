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
  require_once "connect.php";
  
    ?>
  <div class="container">
    <h1>Quan ly dong san pham</h1>
    <div>
      <table class="table">
        <tr>
          <!-- <td>STT</td> -->
          <td width="50px">Ma</td>
          <td width="200px">Ten</td>
          <td width="200px">Mo Ta</td>
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

            <button><a href="./update_loaisp.php?id=<?php echo $row["Ma_loaisp"]?>">sua</a></button>
            <button><a href="delete_loaisp.php?id=<?php echo $row["Ma_loaisp"]?>">
                Xóa
              </a></button>

          </td>
        </tr>
            <?php
        }
        ?>
      </table>
      <button><a href="./adproducte.php">them</a></button>

    </div>
  </div>
</body>

</html>
