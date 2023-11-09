<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <Link href="public/stylee.css" rel="stylesheet" type="text/css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

  <?php 
  require_once "connect.php";
  require_once "view/header1.php";
  $id = $_GET["id"];
  $sql = "SELECT * FROM adproduct WHERE ma_sp = '$id'";
  $rel = mysqli_query($conn, $sql);

  $sanpham = mysqli_fetch_assoc($rel);
  // if (!$sanpham) {
  //     echo "Không tìm thấy sản phẩm";
  //     exit();
  // }
  
  $txt_maloaisp = isset($_COOKIE["txt_maloaisp"])?trim($_COOKIE["txt_maloaisp"]): $sanpham["Ma_loaisp"];
  $txt_tensp = isset($_COOKIE["txt_tensp"])?trim($_COOKIE["txt_tensp"]): $sanpham["tensp"];
  $txt_motasp = isset($_COOKIE["txt_motasp"])?trim($_COOKIE["txt_motasp"]): $sanpham["motasp"];

  $txt_masp = isset($_COOKIE["txt_masp"])?trim($_COOKIE["txt_masp"]): $sanpham["ma_sp"];
  $txt_gianhap = isset($_COOKIE["txt_gianhap"])?trim($_COOKIE["txt_gianhap"]): $sanpham["gianhap"];
  $txt_giaxuat = isset($_COOKIE["txt_giaxuat"])?trim($_COOKIE["txt_giaxuat"]): $sanpham["giaxuat"];
  $txt_soluong = isset($_COOKIE["txt_soluong"])?trim($_COOKIE["txt_soluong"]): $sanpham["soluong"];
  $txt_khuyenmai = isset($_COOKIE["txt_khuyenmai"])?trim($_COOKIE["txt_khuyenmai"]): $sanpham["khuyenmai"];

  // if(isset($_POST["btn_update"])) {
  if(isset($_COOKIE["btn_submit"])) { 
      $txt_hinhanh = isset($_COOKIE["anhsp"])?$_COOKIE["anhsp"]:"";
    
      $sql1 = "UPDATE adproduct SET Ma_loaisp = '$txt_maloaisp',
     tensp = '$txt_tensp', motasp = '$txt_motasp', 
     anhsp = '$txt_hinhanh', gianhap = '$txt_gianhap', 
     giaxuat = '$txt_giaxuat', khuyenmai = '$txt_khuyenmai', 
     soluong = '$txt_soluong' WHERE ma_sp = '$id'";
      $rel1 = mysqli_query($conn, $sql1);
      if($rel1) {
          echo "Bạn đã cập nhập thành công";
      } else { echo"that bai"; 
      }
      // echo "Bạn đã cập nhập thành công";
      // header('location:sp.php');
      // exit();

  }
    ?>

  <div action="" method="post" enctype="multipart/form-data">
    <table width="200" border="1">
      <tr>
        <td colspan="2">Sửa Sản Phẩm</td>
      </tr>
      <tr>
        <td>Mã Loại Sản Phẩm</td>
        <td>
          <?php $sql = "SELECT * FROM adproducttype";
             $rel = mysqli_query($conn, $sql);
            ?>
          <select name="ma_loaisp" id="ma_loaisp" onChange="onChange()">
            <?php if(mysqli_num_rows($rel) > 0) {
                while ($r = mysqli_fetch_assoc($rel)) {
                    ?>
            <option value="<?php echo $r['Ma_loaisp'] ?>">
                    <?php echo $r['Ma_loaisp'] ?>
            </option>
                <?php   }
            } ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>Tên Sản Phẩm</td>
        <td><input name="tensp" type="text" id="ten_sp" value="<?php echo $txt_tensp?>"></td>
      </tr>
      <tr>
        <?php //if(isset($_POST["anhsp"])) {
            // $file_name=$_FILES["anhsp"]['name'];
            // $file_tmp=$_FILES["anhsp"]['tmp_name'];
            // if (!empty($errors)==true) {
            //     echo "upload không thành công";
            // }
            // else {
            //     move_uploaded_file($file_tmp, "images/".$file_name);
            //     echo "thành công";
            // }
        //}?>
        <td>Ảnh sản phẩm</td>
        <td><input type="file" name="anhsp" id="anhsp"></td>
      </tr>
      <tr>
        <td>Mô Tả Sản Phẩm</td>
        <td><textarea name="motasp" cols="10" rows="5" id="motasp"><?php echo $txt_motasp?></textarea></td>
      </tr>
      <tr>
        <td>Giá Nhập</td>
        <td><input name="gianhap" type="number" id="gianhap" value="<?php echo $txt_gianhap?>"></td>
      </tr>
      <tr>
        <td>Giá Xuất</td>
        <td><input name="giaxuat" type="number" id="giaxuat" value="<?php echo $txt_giaxuat?>"></td>
      </tr>
      <tr>
        <td>Khuyến Mại</td>
        <td><input name="khuyenmai" type="number" id="khuyenmai" value="<?php echo $txt_khuyenmai?>"></td>
      </tr>
      <tr>
        <td>Số Lượng</td>
        <td><input name="soluong" type="number" id="soluong" value="<?php echo $txt_soluong?>"></td>
      </tr>
      <tr>
        <td colspan="2"><button onclick="handleClick()" name="btn_submit" type="submit">them</button></td>
      </tr>

    </table>

  </div>

  <script>
  // function onChange(e) {
  //   console.log(e);
  //   ma_loaisp = e.value;
  // }
  function setCookie(cname, cvalue, exm) {
    const d = new Date();
    d.setTime(d.getTime() + (exm * 60 * 1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }

  function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }

  function handleClick() {
    // console.log("test");
    const img = document.getElementById("anhsp").files[0];
    const ma_loaisp = document.getElementById("ma_loaisp").value;
    
    const tensp = document.getElementById("ten_sp").value;
    const motasp = document.getElementById("motasp").value;
    const gianhap = document.getElementById("gianhap").value;
    const giaxuat = document.getElementById("giaxuat").value;
    const khuyenmai = document.getElementById("khuyenmai").value;
    const soluong = document.getElementById("soluong").value;
    


    setCookie("anhsp", img.name, 5);
    setCookie("txt_maloaisp", ma_loaisp, 5);
    
    setCookie("txt_tensp", tensp, 5);
    setCookie("txt_motasp", motasp, 5);
    setCookie("txt_gianhap", gianhap, 5);
    setCookie("txt_giaxuat", giaxuat, 5);
    setCookie("txt_khuyenmai", khuyenmai, 5);
    setCookie("txt_soluong", soluong, 5);
   
    setCookie("btn_submit", "ok", 5);

    const formData = new FormData();
    formData.append("image", img);
    const reader = new FileReader();
    reader.readAsDataURL(img);
    reader.addEventListener("load", (e) => {
      console.log(e.currentTarget.result);
      formData.append("img", e.currentTarget.result);
      formData.append("name", img.name);
      fetch("/handleUpload.php", {
          method: "POST",
          body: formData
        }).then((e) => {
          return e.json()
        })
        .then((e) => {
          // alert(e);
          location.reload();
        });
    });

  }
  </script>

</body>

</html>
