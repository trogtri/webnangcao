<?php
if(isset($_POST['timkiem'])){
    $tukhoa =$_POST['tukhoa'];
}
$sql_pro = "SELECT * FROM tb_sanpham, tb_danhmuc WHERE tb_sanpham.id_danhmuc=tb_danhmuc.id_danhmuc AND tb_sanpham.tensanpham LIKE '%".$tukhoa."%'   ";
$query_pro = mysqli_query($mysqli, $sql_pro);

?>
<h3>Từ khóa tìm kiếm:<?php echo $_POST['tukhoa']; ?> </h3>
<ul class="product_list">
<?php
while ($row = mysqli_fetch_array($query_pro)) {

?>

<li>
        <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
            <img src="admin/modules/productssanpham/uploads/<?php echo $row['hinhanh'] ?>" alt="">
            <p class="title_product"><?php echo $row['tensanpham'] ?></p>
            <p class="price_product"><?php echo number_format($row['giatien'] ,0,',','.').'VND'  ?> </p>
            <p style="text-align:center ;color:#d1d1d1 ;"><?php echo $row['tendanhmuc'] ?></p>
        </a>
    </li>
<?php
}
?>

  

   
</ul> 