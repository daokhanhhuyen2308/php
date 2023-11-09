<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Thêm giỏ hàng</title>
  <Link href="public/main.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <!-- <div class="main"> -->
  <!-- code header -->
  <?php 
    // session_start();
    // session_unset();
    // $_SESSION = [];
    // unset($_SESSION);
    require_once "connect.php";
    require_once 'view/header1.php';
         //$id = $_GET["id"];
    //echo $id;
    $id = isset($_GET["id"]) ?$_GET["id"]:"";
    $sql = "SELECT * FROM adproduct WHERE ma_sp = '$id'";
    $rel = mysqli_query($conn, $sql);
         
    if(mysqli_num_rows($rel) > 0) {
        while ($r = mysqli_fetch_assoc($rel)) {
            //var_dump($r);
            if(isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id]['qty'] += 1;
            }
            else {$_SESSION['cart'][$id]['qty'] =1;
            };
            $_SESSION['cart'][$id]['ma_sp'] = $r['ma_sp'];
            $_SESSION['cart'][$id]['tensp'] = $r['tensp'];
            $_SESSION['cart'][$id]['anhsp'] = $r['ma_sp'];
            $_SESSION['cart'][$id]['giaxuat'] = $r['giaxuat'];
            $_SESSION['cart'][$id]['khuyenmai'] = $r['khuyenmai'];
        }
    }
    ?>
  <!-- code content -->
  <div class="content">
    <?php
        if(isset($_SESSION['cart'])) {
            ?>
    <form action="" method="post">
      <table width="898" style="border: 1px;">
        <tr>
          <td colspan="8">Danh sách sản phẩm của giỏ hàng</td>
        </tr>
        <tr>
          <td width="40">STT</td>
          <td width="118">Mã sản phẩm</td>
          <td width="87">Tên sản phẩm</td>
          <td width="158">Số lượng</td>
          <td width="81">Giá tiền</td>
          <td width="119">Khuyến mại</td>
          <td width="141">Thành tiền</td>
          <td width="102">Xóa</td>
        </tr>
        <?php $i = 1; $tongtien = 0; $tt=0;
            //var_dump($_SESSION["cart"]);
            foreach($_SESSION["cart"] as $k => $v){
                //var_dump($v);
                $i++;
                if($v['khuyenmai'] > 0) {
                    $tt = $v['qty'] * $v['khuyenmai'];
                }
                else {$tt = $v['qty'] * $v['giaxuat'];
                }
                $tongtien +=$tt;
                ?>
        <tr>
          <td><?php echo $i;?></td>
          <td><?php echo $v['ma_sp'];?></td>
          <td><?php echo $v['tensp'];?></td>
          <td> <input type="text" value="<?php echo $v['qty'];?>" name=qty[<?php echo $k?>] />
          </td>
          <td><?php echo $v['giaxuat'];?></td>
          <td><?php echo $v['khuyenmai'];?></td>
          <td><?php echo $tt; ?></td>
          <td>
            <a href="delete_addtocart.php?key=<?php echo $k ?>" style="color:#F99">Xóa</a>
          </td>
        </tr>
        <?php }?>
        <tr>
          <td colspan="8"><?php $tongtien += $tt;
                  echo "Tổng tiền cần thanh toán là: ".$tongtien;
            ?></td>
        </tr>
        <?php
            if (isset($_POST["btn_submit"])) {
                if ($_POST["btn_submit"] =="Cập Nhật") {
                    //echo "a";
                    //var_dump($_POST['qty']);
                    foreach ($_POST['qty'] as $key => $val) {
                           $_SESSION['cart'][$key]['qty']=$val;
                    }
                    header('location: addtocart.php');
                }
                if ($_POST["btn_submit"] =="Đặt Hàng") {
                    $makh = "kh".mt_rand(0, 10000);
                    $txt_tenkh = isset($_POST["txt_tenkh"])?$_POST["txt_tenkh"]:"";
                    $txt_email = isset($_POST["txt_email"])?$_POST["txt_email"]:"";
                    $txt_phone = isset($_POST["txt_phone"])?$_POST["txt_phone"]:"";
                    $txt_address = isset($_POST["txt_address"])?$_POST["txt_address"]:"";
                    $txt_giaohang = isset($_POST["txt_giaohang"])?$_POST["txt_giaohang"]:"";
                    $create_date = isset($_POST["create_date"])?$_POST["create_date"]:"";
                    $mahd = "hd".mt_rand(0, 10000);
                    //lưu thông tin đơn hàng
                    $sql3 = "INSERT INTO `order`(`mahd`, `makh`, `tenkh`, `tongtien`, `create_date`, `trangthai`) VALUES ('$mahd','$makh','$txt_tenkh','$tongtien','$create_date','0')";
                    $rel3 = mysqli_query($conn, $sql3);
                    //lưu thông tin kh
                    $sql4 = "INSERT INTO customer(`makh`, `tenkh`, `phone`, `email`, `diachi_lienhe`, `diachi_giaohang`) VALUES ('$makh','$txt_tenkh','$txt_phone','$txt_email','$txt_address','$txt_giaohang')"; 
                    $rel4 = mysqli_query($conn, $sql4);
                    // lưu thông tin đơn hàng
                    foreach($_SESSION['cart'] as $key1 => $val1) {
                        // var_dump($val1);
                        $ma_sp = $val1['ma_sp'];
                        $tensp = $val1['tensp'];
                        $soluong = $val1['qty'];
                        $dongia = $val1['giaxuat'];
                        $khuyenmai = $val1['khuyenmai'];
                        $sql5 = "INSERT INTO `orderdetail`(`mahd`, `masp`, `tensp`, `soluong`, `dongia`, `khuyenmai`) VALUES ('$mahd','$ma_sp','$tensp','$soluong','$dongia','$khuyenmai');";
                        $rel5 = mysqli_query($conn, $sql5);
                    }
                    echo "Đặt nhật thành công";
                    
                }
            }
            ?>
        <tr>
          <td colspan="8">
            <input name="btn_submit" type="submit" value="Cập Nhật" style="background-color: powderblue; border: 1px solid powderblue; padding: 5px;"  />
            <input name="btn_submit" type="submit" value="Đặt Hàng" style="background-color: plum; border: 1px solid plum; padding: 5px;"/>
          </td>
        </tr>
        <table>
          <tr>
            <td>Tên khách hàng</td>
            <td><input name="txt_tenkh" type="text" /></td>
          </tr>

          <tr>
            <td>Email</td>
            <td><input name="txt_email" type="text" /></td>
          </tr>

          <tr>
            <td>Phone</td>
            <td><input name="txt_phone" type="text" /></td>
          </tr>

          <tr>
            <td>Địa chỉ liên hệ</td>
            <td><input name="txt_address" type="text" /></td>
          </tr>

          <tr>
            <td>Địa chỉ giao hàng</td>
            <td><input name="txt_giaohang" type="text" /></td>
          </tr>

          <tr>
            <td>Ngày đặt hàng</td>
            <td><input name="create_date" type="date" /></td>
          </tr>
        </table>
      </table>

    </form>
    <?php
        }
        ?>



    <div class="content_left"></div>
    <div class="content_center"></div>
    <div class="content_right"></div>
  </div>

  <!-- code footer -->
  <!-- <footer class="footer">

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
  </footer> -->

  <!-- </div> -->
</body>

</html>