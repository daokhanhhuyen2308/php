<?php
session_start();
?>
<div class="header">
  <div class="header1">
    <?php 
    //echo "Xin chào" ."" .$_COOKIE['txt_username']. "<br>";
    echo $_SESSION['txt_username']. "<br>";
    // var_dump($_SESSION);
    // đếm số lượt truy cập
    if(isset($_SESSION['counter'])) {
        $_SESSION['counter'] +=1;
    }
    else{
        $_SESSION['counter'] = 1;
    }
    echo "Số lần truy cập:".$_SESSION['counter'];
    ?>
  </div>
  <ul class="menu1">
    <li><a href="indexx.php">Trang chủ</a></li>
    <?php
    if($_SESSION['quyen'] == '1') {
        ?>
    <li><a href="#">quan ly</a>
      <ul class="menu2">
        <li><a href="dongsp.php">dong san pham</a></li>
        <li><a href="sp.php">san pham</a></li>
      </ul>
    </li>
    <li><a href="kh.php">thong tin khach hang</a></li>
    <li><a href="donhang.php">Quan ly don hang</a></li>
  </ul>
    <?php }?>
  <div class="search">
    <form>
      <input type="text" placeholder="Tìm kiếm.." name="search">
      <button type="submit">Search</button>
    </form>
    <?php 
    if(isset($_SESSION['txt_username'])) {
        ?>
    <button style="width: 100px;
    height: 50px;
    transform: translate(0px, -10px);"><a href="logout.php"> Đăng xuất</a></button>
    <?php } ?>
  </div>
</div>
