<?php
session_start();
include('../../admin/config/config.php');
//themsoluong
if(isset($_GET['cong'])){
    $id=$_GET['cong'];
    foreach($_SESSION['cart'] as $cart_item){
        if($cart_item['id']!=$id){
            $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giatien' => $cart_item['giatien'], 'hinhanh' => $cart_item['hinhanh'], 'masanpham' => $cart_item ['masanpham']);
            $_SESSION['cart'] = $product;
        }else{
            if($cart_item['soluong']<10){
                $tangsoluong = $cart_item['soluong'] + 1;
                $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $tangsoluong, 'giatien' => $cart_item['giatien'], 'hinhanh' => $cart_item['hinhanh'], 'masanpham' => $cart_item ['masanpham']);
        }else{
            $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giatien' => $cart_item['giatien'], 'hinhanh' => $cart_item['hinhanh'], 'masanpham' => $cart_item ['masanpham']);
        }
        $_SESSION['cart']=$product;
    }
}
header('Location:../../index.php?quanly=giohang');
}
//trusoluong
if(isset($_GET['tru'])){
    $id=$_GET['tru'];
    foreach($_SESSION['cart'] as $cart_item){
        if($cart_item['id']!=$id){
            $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giatien' => $cart_item['giatien'], 'hinhanh' => $cart_item['hinhanh'], 'masanpham' => $cart_item ['masanpham']);
            $_SESSION['cart'] = $product;
        }else{
            $tangsoluong = $cart_item['soluong'] - 1;
            if($cart_item['soluong']>1){
                
                $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $tangsoluong, 'giatien' => $cart_item['giatien'], 'hinhanh' => $cart_item['hinhanh'], 'masanpham' => $cart_item ['masanpham']);
        }else{
            $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giatien' => $cart_item['giatien'], 'hinhanh' => $cart_item['hinhanh'], 'masanpham' => $cart_item ['masanpham']);
        }
        $_SESSION['cart']=$product;
    }
}
header('Location:../../index.php?quanly=giohang');
}
//xoasanpham
if(isset($_SESSION['cart'])&& isset($_GET['xoa'])){
    $id=$_GET['xoa'];
    foreach($_SESSION['cart'] as $cart_item){
        if($cart_item['id']!=$id){
            $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giatien' => $cart_item['giatien'], 'hinhanh' => $cart_item['hinhanh'], 'masanpham' => $cart_item ['masanpham']);
        }
    $_SESSION['cart'] = $product;
    header('Location:../../index.php?quanly=giohang');
    }
}
//xoa tat cả
if(isset($_GET['xoatatca'])&&$_GET['xoatatca']==1){
    unset($_SESSION['cart']);
    header('Location:../../index.php?quanly=giohang');
}
//them sản phẩm vào giỏ hàng
if (isset($_POST['themgiohang'])) {
    // session_destroy();
    $id = $_GET['idsanpham'];
    $soluong = 1;
    $sql = "SELECT * FROM tb_sanpham WHERE id_sanpham='" . $id . "' LIMIT 1 ";
    $query = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($query);
    if ($row) {
        $new_product = array(array('tensanpham'=>$row['tensanpham'], 'id' => $id, 'soluong' => $soluong, 'giatien' => $row['giatien'], 'hinhanh' => $row['hinhanh'], 'masanpham' => $row['masanpham']));
        //kiem tra session gio hang ton tai
        if (isset($_SESSION['cart'])) { 
            $found = false;
            foreach ($_SESSION['cart'] as $cart_item) {
                //neu du lieu trung 
                if ($cart_item['id'] == $id) {
                    $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $soluong+1, 'giatien' => $cart_item['giatien'], 'hinhanh' => $cart_item['hinhanh'], 'masanpham' => $cart_item ['masanpham']);
                    $found = true;
                } else {
                    //neu du lieu khong trung
                    $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giatien' => $cart_item['giatien'], 'hinhanh' => $cart_item['hinhanh'], 'masanpham' => $cart_item ['masanpham']);
                }

            }
            if($found == false){
                //lien ket du lieu new_product  voi product
                $_SESSION['cart']=array_merge($product,$new_product);
            }else{
                $_SESSION['cart']=$product;
            }
        } else {
            $_SESSION['cart'] = $new_product;
        }
    }
    header('Location:../../index.php?quanly=giohang');
    // print_r($_SESSION['cart']);
}


?>