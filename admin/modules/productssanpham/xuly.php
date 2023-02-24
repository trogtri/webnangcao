<?php
include('../../config/config.php');
$tensanpham = $_POST['tensanpham'];
$masanpham = $_POST['masanpham'];
$giatien = $_POST['giatien'];
$mota = $_POST['mota'];
$soluong = $_POST['soluong'];

//xu ly hinh anh
$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$hinhanh = time().'_'.$hinhanh;
$danhmuc = $_POST['danhmuc'];
$tinhtrang = $_POST['tinhtrang'];


if(isset($_POST['themsanpham'])){
    //them
    $sql_them = "INSERT INTO tb_sanpham (tensanpham,masanpham,giatien,mota,soluong,hinhanh,id_danhmuc,tinhtrang) VALUE 
    ('".$tensanpham."','".$masanpham."','".$giatien."','".$mota."','".$soluong."','".$hinhanh."','".$danhmuc."','".$tinhtrang."')";
    mysqli_query($mysqli,$sql_them);
    move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
    header('Location:../../index.php?action=productssanpham&query=them');
}elseif(isset($_POST['suasanpham'])){
    //sua
    if($hinhanh!=''){
        move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
    
    $sql_update = "UPDATE tb_sanpham SET tensanpham='".$tensanpham."',masanpham='".$masanpham."',giatien='".$giatien."',mota='".$mota."',soluong='".$soluong."',hinhanh='".$hinhanh."',id_danhmuc='".$danhmuc."',tinhtrang='".$tinhtrang."' WHERE id_sanpham='$_GET[idsanpham]'";
    //xoa anh cu
    $sql = "SELECT * FROM tb_sanpham WHERE id_sanpham = '$_GET[idsanpham]' LIMIT 1";
    $query = mysqli_query($mysqli,$sql);
    while($row = mysqli_fetch_array($query)){
        unlink('uploads/'.$row['hinhanh']);
    }
}else{
        $sql_update = "UPDATE tb_sanpham SET tensanpham='".$tensanpham."',masanpham='".$masanpham."',giatien='".$giatien."',mota='".$mota."',soluong='".$soluong."',id_danhmuc='".$danhmuc."',tinhtrang='".$tinhtrang."' WHERE id_sanpham='$_GET[idsanpham]'"; 
    }
    mysqli_query($mysqli,$sql_update);
    header('Location:../../index.php?action=productssanpham&query=them');
}else{
    $id=$_GET['idsanpham'];
    $sql = "SELECT * FROM tb_sanpham WHERE id_sanpham = '$id' LIMIT 1";
    $query = mysqli_query($mysqli,$sql);
    while($row = mysqli_fetch_array($query)){
        unlink('uploads/'.$row['hinhanh']);
    }
    $sql_xoa="DELETE FROM tb_sanpham WHERE id_sanpham='".$id."'";
    mysqli_query($mysqli,$sql_xoa);
    header('Location:../../index.php?action=sanpham&query=them');
}
?>
