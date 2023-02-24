<?php
	session_start();
	include('config/config.php');
	if(isset($_POST['dangnhap'])){
		$username = $_POST['username'];
		$password = md5($_POST['password']); 
		$sql="SELECT * FROM tb_admin WHERE username='".$username."' AND password='".$password."' LIMIT 1 ";
		$row=mysqli_query($mysqli,$sql);
		$count=mysqli_num_rows($row);
		if($count>0){
			$_SESSION['dangnhap']=$username;
			header("Location:index.php");
		}else{
			echo '<script>alert("Tài khoản hoặc mật khẩu không đúng.Làm ơn đăng nhập lại.");</script>';
			header('location:login.php');
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        body{
            background: #ddd;
        }
        .wrapper-login{
            width:25%;
            margin: 0 auto;
        }
        table.table-login{
            width:100%;
        }
        table.table-login tr td{
            padding: 10px;
        }
    </style>
   
    <title>Đăng nhập Admin</title>
</head>
<body>
<div class="wrapper-login">
    <form action="" autocomplete="off" method="POST">
    <table border="1" class="table-login" style="text-align:center;border-collapse: collapse;">
        <tr>
            <td colspan="2"><h3>ĐĂNG NHẬP ADMIN</h3></td>
        </tr>
        <tr>
            <td>Tài Khoản</td>
            <td><input type="text" name="username"></td>
        </tr> 
        <tr>
            <td>Mật Khẩu</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="dangnhap" value="Đăng nhập"></td>
        </tr>
    </table>
    </form>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</body>

</html>




<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css1/styleadmin.css">
   
    <title>Đăng nhập Admin</title>
</head>

	// session_start();
	// include('config/config.php');
	// if(isset($_POST['dangnhap'])){
	// 	$username = $_POST['username'];
	// 	$password = $_POST['password'];
	// 	$sql="SELECT * FROM tb_admin WHERE username='".$username."' AND password='$password' LIMIT 1 ";
	// 	$row=mysqli_query($mysqli,$sql);
	// 	$count=mysqli_num_rows($row);
	// 	if($count>0){
	// 		$_SESSION['dangnhap']=$username;
	// 		header("Location:index.php");
	// 	}else{
			
	// 		echo '<script>alert("Tài khoản hoặc mật khẩu không đúng.Làm ơn đăng nhập lại.");</script>';
	// 		header('location:login.php');
	// 	}
	// }
// ?>
<body>
    <div id="page">
        
        <div class="logo">
            <ion-icon name="person-circle-outline"></ion-icon>
        </div>
         <div class="content">
            <div class="left">
              <div class="title">
               <h1> Welcome!</h1>
              </div>
              <div>
            <img width="100px" src="img/baby.png" class="logo2">
        </div>
            </div>
            <div class="right">
                <form action="login.php" autocomplete="off" method="post"> 
                    <h1>LOGIN ADMIN</h1>
                     <input type="text" name="username" id="username" placeholder="Nhập Tài Khoản"    required="required"/>        
                     <input type="password" name="password" id="password" placeholder="Nhập Mật Khẩu"  required="required" />   
                     <input type="submit" value="LOGIN" id="button" name="dangnhap" >               
                </form>
            </div>
        </form>
         </div>
        
    </div>
    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html> -->
