<?php

if(isset($_POST['dangky'])){
    $tenkhachhang = $_POST['hovaten'];
    $email = $_POST['email'];
    $diachi = $_POST['diachi'];
    $matkhau = md5($_POST['matkhau']);
    $dienthoai = $_POST['dienthoai'];
    $sql_dangky = mysqli_query($mysqli, "INSERT INTO tb_dangky(tenkhachhang,email,diachi,matkhau,dienthoai) VALUE('" . $tenkhachhang . "','" . $email . "','" . $diachi . "','" . $matkhau . "','" . $dienthoai . "')");
if($sql_dangky){
        echo '<p style="color:red">Bạn đã đăng ký thành công</p>';
        $_SESSION['dangky'] =$tenkhachhang;
        $_SESSION['id_khachhang'] =mysqli_insert_id($mysqli);
        header('Location:index.php');
}
}
?>

<p>Đăng ký thành viên</p>
<style type="text/css" > 
table.dangky tr td{
    padding: 5px;
}
</style>

<form action="" method="POST">
<table class="dangky" border="1" style="border-collapse: collapse ;">
<tr>
    <td>Họ và tên</td>
    <td><input type="text" size="30" name="hovaten"></td>
</tr>

<tr>
    <td>Email</td>
    <td><input type="text" size="30" name="email"></td>
</tr>

<tr>
    <td>Điện thoại</td>
    <td><input type="text" size="30" name="dienthoai"></td>
</tr>

<tr>
    <td>Địa chỉ</td>
    <td><input type="text" size="30" name="diachi"></td>
</tr>

<tr>
    <td>Mật khẩu</td>
    <td><input type="text" size="30" name="matkhau"></td>
</tr>

<tr>
    <td><input type="submit"  name="dangky"  value="Đăng ký"></td>
<td> <a href="index.php?quanly=dangnhap"> Đăng nhập nếu có tài khoản</a></td>

</tr>

</table>
</form>