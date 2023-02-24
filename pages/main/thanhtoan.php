<?php
session_start();
include("../../admin/config/config.php");
$id_khachhang = $_SESSION['id_khachhang'];
$code_oder = rand(0, 9999);
$insert_cart = "INSERT INTO tb_cart(id_khachhang,code_cart,cart_status) VALUE('".$id_khachhang."','".$code_oder."',1) ";
$cart_query = mysqli_query($mysqli,$insert_cart);
if($insert_cart){
//them gio hang chi tiet
foreach($_SESSION['cart'] as $key => $value ){
        $id_sanpham = $value['id'];
        $soluong = $value['soluong'];
        $insert_oder_details = "INSERT INTO tb_cart_details(id_sanpham,code_cart,soluong) VALUE('" . $id_khachhang . "','" . $code_oder . "','".$soluong."')";
        mysqli_query($mysqli, $insert_oder_details);
    }
}
unset($_SESSION['cart']);
header('Location:../../index.php?quanly=camon');
?>