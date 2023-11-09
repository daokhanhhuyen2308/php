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
    // if(isset($_SESSION['counter'])) {
    //     $_SESSION['counter'] +=1;
    // }
    // else{
    //     $_SESSION['counter'] = 1;
    // }
    // echo "Số lần truy cập:".$_SESSION['counter'];
    ?>
  </div>
</style>
  <!-- <div class="wrapper"> -->
    <div class="header">
        <nav class="container_header">
        	<ul class="menu_header">
            	<li><a href="index.php">Trang chủ</a></li>
              <?php
    if($_SESSION['quyen'] == '1') {
        ?>
                <li><a href="">Quản lý</a>
                <ul class="submenu">
          <li><a href="dongsp.php">Dòng sản phẩm</a></li>
          <li><a href="sp.php">Sản phẩm</a></li>
        		</ul>
        </li>        
    <li><a href="kh.php">Thông tin khách hàng</a></li>
    <li><a href="">Quản lý đơn hàng</a>
    <ul class="submenu">
    <li><a href="order.php">Hóa đơn</a></li>
          <li><a href="donhang.php">Tình trạng</a></li>
        		</ul>
  </li>
    <?php }?>
            </ul>
            <div class="menu_others">
            <?php 
    if(isset($_SESSION['txt_username'])) {
        ?>
  			<li><a href="home.php"><button class="button_logout" style="cursor:pointer;">Đăng xuất</button></a></li>
			<?php } ?>     
      </div>
        </nav> 
    </div>      
       	
