<?php
  if(isset($_GET['trang'])){
    $page = $_GET['trang'];
 }else{
    $page = 1;
 }
 if($page==''|| $page== 1){
    $begin = 0;
 }else{
    $begin = ($page * 5) - 5;
 }
$sql_pro = "SELECT * FROM tb_sanpham,tb_danhmuc WHERE tb_sanpham.id_danhmuc=tb_danhmuc.id_danhmuc ORDER BY tb_sanpham.id_sanpham DESC LIMIT $begin,5 ";
$query_pro = mysqli_query($mysqli, $sql_pro);
?>
<h3>Sản phẩm mới nhất </h3>
<ul class="product_list">
    <?php
    while ($row = mysqli_fetch_array($query_pro)) {
    ?>
    <li>
        <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
            <img src="admin/modules/productssanpham/uploads/<?php echo $row['hinhanh'] ?>">
            <p class="title_product"><?php echo $row['tensanpham'] ?></p>
            <p class="price_product"><?php echo number_format($row['giatien'] ,0,',','.').'VND'  ?> </p>
            <p style="text-align:center;color:#d1d1d1"><?php echo $row['tendanhmuc'] ?></p>
        </a>
    </li>
    <?php
    }
    ?>
</ul>
<div style="clear: both;"></div>
<style>
    .list_trang ul{
        padding: 0;
        margin: 0;
        list-style: none;
    }
    .list_trang ul li{
        float: left;
        padding: 5px 13px;
        margin: 5px;
        background: burlywood;
        display: block;
    }
    .list_trang ul li a{
        text-decoration: none;
        color: #000;
        text-align: center;
     
    }
</style>
<?php
$sql_trang = mysqli_query($mysqli, "SELECT * FROM tb_sanpham ");
$row_count = mysqli_num_rows($sql_trang);                   
$trang= ceil( $row_count/5);
?>
<p>  Trang:<?php echo $page ?>/<?php echo $trang ?> </p>

<ul class="list_trang">
  <?php 
  for($i=1;$i<=$trang;$i++){
  ?>
    <li <?php if($i==$page) {echo 'style="background:white;"';}else{echo '';} ?>> <a  href="index.php?trang=<?php echo $i ?>"> <?php echo  $i ?> </a></li>
    <?php 
  }
  ?>

</ul>