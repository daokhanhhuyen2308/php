<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Products</title>
  <Link href="public/main.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <?php require_once 'view/header1.php'?>

  <div class="main">
    <!-- code content -->
    <h1>Danh sách sản phẩm</h1>
    <div class="content">
      <?php 
        require_once "connect.php";
        $sql = "SELECT * FROM adproduct";
        $rel = mysqli_query($conn, $sql);
        if(mysqli_num_rows($rel) > 0) {
            while ($r = mysqli_fetch_assoc($rel)) {
                //var_dump($r);
                $anhsp = $r['anhsp'];
                $masp = $r['ma_sp'];
                $tensp = $r['tensp'];
                $giatien = $r['giaxuat'];
                $khuyenmai = $r['khuyenmai'];
                ?>
      <div class="card">
        <img src="public/images/<?php echo $anhsp;?> " width="100px" height="150px" />
        <div class="card_container">
          <h4><?php echo $tensp?></h4>
          <p>
            Price: <?php echo $giatien?><br>
            Discount: <?php echo $khuyenmai?>
          </p>
          <!-- <a href="addtocart.php?id=<?php echo $masp; ?>" style=" color:pink">Addtocart</a> -->
          <div>
            <button><a href="update_sp.php?id=<?php echo $masp; ?>" style=" color:black; text-decoration:none;">Update</a></button>
            <button><a href="delete_sp.php?id=<?php echo $masp; ?>" style=" color:black; text-decoration:none;">Delete</a></button>
          </div>
        </div>
      </div> <?php
            }
        }
        ?>
      <!-- <div class="content_left"></div>
      <div class="content_center"></div>
      <div class="content_right"></div> -->

    </div>
    <button style="width: 100px;
    height: 40px;
    font-size: large;"><a href="adproduct.php">Thêm</a></button>

</body>

</html>
