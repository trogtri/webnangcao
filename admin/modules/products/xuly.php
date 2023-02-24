<?php
include('../../config/config.php');
$tendanhmuc = $_POST['tendanhmuc'];
$mota = $_POST['mota'];
if(isset($_POST['themdanhmuc'])){
    //them
    $sql_them = "INSERT INTO tb_danhmuc(tendanhmuc,mota) VALUE ('".$tendanhmuc."','".$mota."')";
    mysqli_query($mysqli,$sql_them);
    header('Location:../../index.php?action=danhmucsanpham&query=them');
}elseif(isset($_POST['suadanhmuc'])){
    //sua
    $sql_update = "UPDATE tb_danhmuc SET tendanhmuc='".$tendanhmuc."',mota='".$mota."' WHERE id_danhmuc='$_GET[iddanhmuc]'";
    mysqli_query($mysqli,$sql_update);
    header('Location:../../index.php?action=danhmucsanpham&query=them');
}else{
    $id=$_GET['iddanhmuc'];
    $sql_xoa="DELETE FROM tb_danhmuc WHERE id_danhmuc='".$id."'";
    mysqli_query($mysqli,$sql_xoa);
    header('Location:../../index.php?action=danhmucsanpham&query=them');
}
?>
