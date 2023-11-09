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
      $sql = "select * from customer where makh = '$id';";
      $rel = mysqli_query($conn, $sql);
      $res = getRes($rel);
      // $res = $res;
      // $tenkh = $res[0]["tenkh"];
      // var_dump($res);
        ?>

  <form action="" method="post" enctype="multipart/form-data">
    <table width="600" height="200" style="text-align: center;" class="dkitv">
      <tr>
        <td colspan="2" style="text-align:center; font-size: 20px">
          <h2>Thay đổi thông tin khách hàng</h2>
        </td>

      </tr>
      <tr>
        <td>Fullname</td>
        <td><input type="text" name="txt_fullname" placeholder="Nhập đầy đủ họ tên"
            value="<?php echo $res[0]["tenkh"]?>" />
        </td>
      </tr>

      <tr>
        <td>SDT</td>
        <td><input type="text" name="txt_password" placeholder="So dien thoai" value="<?php echo $res[0]["phone"]?>" />
        </td>
      </tr>

      <tr>
        <td>Email</td>
        <td><input type="text" name="txt_email" value="<?php echo $res[0]["email"]?>" /></td>
      </tr>

      <tr>
        <td>Địa chỉ liên hệ</td>
        <td>
          <textarea name="txt_address" rows="8" cols="18"
            placeholder="Nhập địa chỉ"><?php echo $res[0]["diachi_lienhe"]?></textarea>
        </td>
      </tr>
      <tr>
        <td>Địa chỉ giao hàng</td>
        <td>
          <textarea name="txt_address_gh" rows="8" cols="18"
            placeholder="Nhập địa chỉ"><?php echo $res[0]["diachi_giaohang"]?></textarea>
        </td>
      </tr>
      <tr>
        <td colspan="2" style="text-align: center"><input name="Login" type="submit" value="Cập nhât" />
          <input name="Reset" type="reset" value="reset" />
        </td>
      </tr>


    </table>

  </form>
      <?php


        $txt_fullname = "";
        $txt_email = "";
        $txt_address = "";
        $txt_address_gh = "";
        if(isset($_POST["Login"])) {
            $txt_fullname = $_POST["txt_fullname"];
            $txt_email = $_POST["txt_email"];
            $txt_password = $_POST['txt_password'];
            $txt_address=$_POST["txt_address"];
            $txt_address_gh=$_POST["txt_address_gh"];

            $sql = "UPDATE `customer` SET `tenkh`='$txt_fullname',
        `phone`='$txt_password',`Email`='$txt_email',
        `diachi_lienhe`='$txt_address',`diachi_lienhe`='$txt_address_gh' WHERE makh = '$id'";
            $rel = mysqli_query($conn, $sql);
                echo "Đã thay doi thanh cong ";
    
        }
  }
  else {
      $sql = "select * from customer;";
      $rel = mysqli_query($conn, $sql);
      $res = getRes($rel);
        ?>
  <div class="container">
    <h2 style="border: 2px solid #ddd; margin-bottom:5px">Danh sách khách hàng</h2>
    <table class="table">
      <tr>
        <th width="200px">Tên</th>
        <th width="200px">STD</th>
        <th width="200px">Email</th>
        <th width="200px">Action</th>
      </tr>
      <?php
        for( $i = 0; $i < count($res); $i++ ) {
            ?>
      <tr>
        <td><?php echo $res[$i]["tenkh"]?></td>
        <td><?php echo $res[$i]["phone"]?></td>
        <td><?php echo $res[$i]["email"]?></td>

        <td><button><a href=" ?id=<?php echo $res[$i]['makh']?>" style="text-decoration: none;  color:black;">Update</a></button></td>
      </tr>
            <?php   
        }
  }

    ?>
    </table>
  </div>
</body>

</html>
