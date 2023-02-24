<p>Chi Tiết Sản Phẩm</p>
<?php
    $sql_chitiet = "SELECT * FROM tb_sanpham,tb_danhmuc WHERE tb_sanpham.id_danhmuc=tb_danhmuc.id_danhmuc AND tb_sanpham.id_sanpham='$_GET[id]'  
    LIMIT 1 ";
    $query_chitiet = mysqli_query($mysqli, $sql_chitiet);
    while ($row_chitiet = mysqli_fetch_array($query_chitiet)) {
?>
<div class="wrapper_chitiet">
    <div class="hinhanh_sanpham">
    <img width="100%" src="admin/modules/productssanpham/uploads/<?php echo $row_chitiet['hinhanh'] ?>">
    </div>
    <form method="POST" action="pages/main/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham']?>">
        <div class="chitiet_sanpham">
            <h3 style="margin:0"><?php echo $row_chitiet['tensanpham'] ?></h3>
            <p>Mã sản phẩm: <?php echo $row_chitiet['masanpham'] ?></p>
            <p>Giá tiền: <?php echo number_format( $row_chitiet['giatien'],0,',','.').'VND' ?></p>
            <p>Số lượng: <?php echo $row_chitiet['soluong'] ?></p>
            <p>Danh Mục: <?php echo $row_chitiet['tendanhmuc'] ?></p>
            <p><input class="addcart" name="themgiohang" type="submit" value="Thêm giỏ hàng"></p>
        </div>
    </form>
</div>
<?php
}
?>