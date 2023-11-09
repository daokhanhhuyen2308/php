<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Untitled Document</title>
  <Link href="public/stylee.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <!-- code header -->
  <?php require_once 'view/header1.php'?>

  <div class="main">
    <!-- code content -->
    <h1>Danh sach san pham</h1>
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
            Gia: <?php echo $giatien?><br>
            Khuyen mai: <?php echo $khuyenmai?>
          </p>
          <button><a href="addtocart.php?id=<?php echo $masp; ?>" style=" color:black">Addtocart</a></button>
        </div>
      </div>
                <?php
            }
        }
        ?>
      <!-- <div class="content_left"></div>
      <div class="content_center"></div>
      <div class="content_right"></div> -->
    </div>

    <!-- code footer -->
    <footer class="footer">

      <div class="gird_row">
        <div class="gird_coloum">
          <h2 class="footer_heading">Chăm sóc khách hàng</h2>
          <ul class="footer_list">
            <li class="footer_item">
              <a href="#" class="footer_item_link">Trung tâm trợ giúp</a>
              <a href="#" class="footer_item_link">Hướng dẫn mua hàng</a>
              <a href="#" class="footer_item_link">Closething</a>
            </li>
          </ul>
        </div>

        <div class="gird_coloum">
          <h2 class="footer_heading">Liên hệ qua</h2>
          <ul class="footer_list">
            <li class="footer_item">
              <a href="Email:closething@hehe.com" class="footer_item_link">Email:closething@hehe.com</a>
              <a href="Phone:09123678945" class="footer_item_link">Phone:09123678945</a>
              <a href="#" class="footer_item_link">Tư vấn</a>
            </li>
          </ul>
        </div>


      </div>
    </footer>

  </div>
</body>

</html>
