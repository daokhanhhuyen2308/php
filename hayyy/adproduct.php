<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <Link href="public/stylee.css" rel="stylesheet" type="text/css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

  <?php
  // quản lý danh mục sản phẩm
  require_once "connect.php";
  require_once "view/header1.php";
    ?>
  <div action="" method="post" enctype="multipart/form-data">
    <table width="200" border="1">
      <tr>
        <td colspan="2">Thêm Sản Phẩm</td>
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
        <td>Mã Sản Phẩm</td>
        <td><input name="ma_sp" type="text" id="ma_sp"></td>
      </tr>
      <tr>
        <td>Tên Sản Phẩm</td>
        <td><input name="tensp" type="text" id="ten_sp"></td>
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
        <td><textarea name="motasp" cols="10" rows="5" id="motasp"></textarea></td>
      </tr>
      <tr>
        <td>Giá Nhập</td>
        <td><input name="gianhap" type="number" id="gianhap"></td>
      </tr>
      <tr>
        <td>Giá Xuất</td>
        <td><input name="giaxuat" type="number" id="giaxuat"></td>
      </tr>
      <tr>
        <td>Khuyến Mại</td>
        <td><input name="khuyenmai" type="number" id="khuyenmai"></td>
      </tr>
      <tr>
        <td>Số Lượng</td>
        <td><input name="soluong" type="number" id="soluong"></td>
      </tr>
      <tr>
        <td>Ngày Nhập</td>
        <td><input name="ngay_nhap" type="date" id="ngay_nhap"></td>
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
    const ma_sp = document.getElementById("ma_sp").value;
    const tensp = document.getElementById("ten_sp").value;
    const motasp = document.getElementById("motasp").value;
    const gianhap = document.getElementById("gianhap").value;
    const giaxuat = document.getElementById("giaxuat").value;
    const khuyenmai = document.getElementById("khuyenmai").value;
    const soluong = document.getElementById("soluong").value;
    const ngay_nhap = document.getElementById("ngay_nhap").value;


    setCookie("anhsp", img.name, 5);
    setCookie("ma_loaisp", ma_loaisp, 5);
    setCookie("ma_sp", ma_sp, 5);
    setCookie("tensp", tensp, 5);
    setCookie("motasp", motasp, 5);
    setCookie("gianhap", gianhap, 5);
    setCookie("giaxuat", giaxuat, 5);
    setCookie("khuyenmai", khuyenmai, 5);
    setCookie("soluong", soluong, 5);
    setCookie("ngay_nhap", ngay_nhap, 5);
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


  <?php
  
    $ma_loaisp=isset($_COOKIE["ma_loaisp"])?$_COOKIE["ma_loaisp"]:"";
    $ma_sp=isset($_COOKIE["ma_sp"])?$_COOKIE["ma_sp"]:""; 
    $tensp=isset($_COOKIE["tensp"])?$_COOKIE["tensp"]:"";
    $anhsp=isset($_COOKIE["anhsp"])?$_COOKIE["anhsp"]:"";
    $motasp=isset($_COOKIE["motasp"])?$_COOKIE["motasp"]:"";
    $gianhap=isset($_COOKIE["gianhap"])?$_COOKIE["gianhap"]:"";
    $giaxuat=isset($_COOKIE["giaxuat"])?$_COOKIE["giaxuat"]:"";
    $khuyenmai=isset($_COOKIE["khuyenmai"])?$_COOKIE["khuyenmai"]:"";
    $soluong=isset($_COOKIE["soluong"])?$_COOKIE["soluong"]:"";
    $ngay_nhap=isset($_COOKIE["ngay_nhap"])?$_COOKIE["ngay_nhap"]:"";

    if(isset($_COOKIE["btn_submit"])) {
        $sql="SELECT * FROM adproduct where ma_sp='$ma_sp'";
        $rel=mysqli_query($conn, $sql);
        if(mysqli_num_rows($rel)>0) {
            echo "Đã tồn tại mã sản phẩm này";
            exit();
        }
        else{
            $sql1="INSERT INTO adproduct values('$ma_loaisp','$ma_sp','$tensp','$anhsp','$motasp','$gianhap','$giaxuat','$khuyenmai','$soluong','$ngay_nhap')";
        }
        $rel=mysqli_query($conn, $sql1);
        echo "Bạn đã lưu thành công";
        // var_dump($_COOKIE);
    }

    ?>
</body>

</html>
