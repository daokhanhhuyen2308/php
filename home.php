<?php 
if(isset($_POST['dangnhap'])){
	header("Location: login.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HOME</title>
<style>
@import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');
*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Open Sans', sans-serif;;
}
body{
	display: flex;
	justify-content: center;
	align-items: center;
	min-height:100vh;
	background: url("public/images/bg1.jpg") no-repeat;
	background-size: cover;
	background-position:center;
	
}
header{
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	padding: 20px 100px;
	display: flex;
	justify-content: space-between;
	align-items: center;
	z-index:99;
	}
.logo{
	font-size: 2rem;
	color:#fff;
	user-select: none;
	
	}
.navigation a{
	position: relative;
	font-size: 1.1em;
	color: #fff;
	text-decoration: none;
	font-weight: 500;
	margin-left: 40px;
	
	
}
.navigation a::after{
	content:'';
	position: absolute;
	left:0;
	bottom: -6px;
	width: 100%;
	height: 3px;
	background:#fff;
	border-radius:5px;
	transform-origin: right;
	transform: scaleX(0);
	transition:.5s;
	
	
	}
.navigation a:hover::after{
	transform-origin: left;
	transform: scaleX(1);
	
	}
.navigation .button_login{
	width: 130px;
	height: 50px;
	background: transparent;
	border: 2px solid #fff;
	outline: none;
	border-radius:8px;
	cursor:pointer;
	font-size:1.1em;
	color:#fff;
	font-weight: 500;
	margin-left:40px;
	transition: .5s;
	
}
.navigation .button_login:hover{
	background:#fff;
	color: #162938;
}
</style>
</head>
<body>
<header>
<h2 class="logo">SmartPhone Store</h2>
<nav class="navigation">
<a href="">Home</a>
<a href="">About</a>
<a href="">Services</a>
<a href="">Contact</a>
<a href="login.php">Login</a>
<!-- <input name="dangnhap" type="submit" class="button_login" value="Login"/> -->
 </nav>
</header>
</body>
</html>