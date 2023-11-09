<?php
require_once("connect.php");
$mahd = isset($_POST["mahd"])?$_POST["mahd"]:"";
$masp = isset($_POST["masp"])?$_POST["masp"]:"";
$tensp = isset($_POST["tensp"])?$_POST["tensp"]:"";
$soluong = isset($_POST["soluong"])?$_POST["soluong"]:"";
$dongia = isset($_POST["dongia"])?$_POST["dongia"]:"";
$khuyenmai = isset($_POST["khuyenmai"])?$_POST["khuyenmai"]:"";

if(isset($_POST["btn_save"]))
{
	$sql = "SELECT * FROM orderdetail WHERE mahd ='$mahd'";
	$rel = mysqli_query($conn,$sql);
	if(mysqli_num_rows($rel)>0)
	{
		echo "Đã tồn tại mã hóa đơn này";
	}
	else
	{
		$sql1 = "INSERT INTO orderdetail VALUE('$mahd','$masp','$tensp', '$soluong', '$dongia', '$khuyenmai')";
		$rel1 = mysqli_query($conn,$sql1);
		echo "Bạn đã thêm thành công";
	}
}
?>
<form action="" method="post">
	
    <table>
    	<tr>
        	<td>Mã hóa đơn</td>
            <td>Mã sản phẩm</td>
            <td>Tên sản phẩm</td>
            <td>Số lượng</td>
            <td>Đơn giá</td>
            <td>Khuyến mãi</td>
            <td>Xóa</td>
            <td>Sửa</td>
        </tr>
        <?php
		$sql2 = "SELECT * FROM orderdetail";
		$rel2 = mysqli_query($conn,$sql2);
		while($r = mysqli_fetch_assoc($rel2))
		{
			//var_dump($r);
		?>
            <tr>
            	<td>
                	<?php echo $r["mahd"];?>
                </td>
                <td>
                	<?php echo $r["masp"];?>
                </td>
                <td>
                	<?php echo $r["tensp"];?>
                </td>
                <td>
                	<?php echo $r["soluong"];?>
                </td>
                <td>
                	<?php echo $r["dongia"];?>
                </td>
                <td>
                	<?php echo $r["khuyenmai"];?>
                </td>
                <td>
                	<a href="delete_chitiet.php?id=<?php echo $r["mahd"] ?>">
                    	Delete
                    </a>
                </td>
                <td>
                	<a href="update_chitiet.php?id=<?php echo $r["mahd"] ?>">
                    	Update
                    </a>
                </td>
            </tr>
        <?php
		}
		?>
    </table>
</form>