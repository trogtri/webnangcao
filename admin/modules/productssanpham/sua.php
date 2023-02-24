<?php
    $sql_sua_sanpham = "SELECT * FROM tb_sanpham WHERE id_sanpham='$_GET[idsanpham]' LIMIT 1";
    $query_sua_sanpham =  mysqli_query($mysqli,$sql_sua_sanpham);
?>
<p class="them">SỬA SẢN PHẨM</p>
<table class="bangthem" border="1" width="100%" style="border-collapse:collapse;">
<?php
while($row = mysqli_fetch_array($query_sua_sanpham)){
?>
 <form method="POST" action="modules/productssanpham/xuly.php?idsanpham=<?php echo $row['id_sanpham']?>" enctype="multipart/form-data">
    <tr>
        <td>Tên sản phẩm</td>
        <td><input type="text" value="<?php echo $row['tensanpham'] ?>" name="tensanpham"></td>
    </tr>
    <tr>
        <td>Mã sản phẩm</td>
        <td><input type="text" value="<?php echo $row['masanpham'] ?>" name="masanpham"></td>
    </tr>
    <tr>
        <td>Giá tiền</td>
        <td><input type="text" value="<?php echo $row['giatien'] ?>" name="giatien"></td>
    </tr>
    <tr>
        <td>Mô tả</td>
        <td><textarea rows="5" name="mota"><?php echo $row['mota']?></textarea></td>
    </tr>
    <tr>
        <td>Số lượng</td>
        <td><input type="text" value="<?php echo $row['soluong'] ?>" name="soluong"></td>
    </tr>
    <tr>
        <td>Hình ảnh</td>
        <td>
            <input type="file" name="hinhanh">
            <img src="modules/productssanpham/uploads/<?php echo $row['hinhanh'] ?> " width="200px" >
        </td>
    </tr>
    <tr>
        <td>Danh mục sản phẩm</td>
        <td>
            <select name="danhmuc">
                <?php
                $sql_danhmuc = "SELECT * FROM tb_danhmuc ORDER BY id_danhmuc DESC";
                $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
                while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                    if($row_danhmuc['id_danhmuc']==$row['id_danhmuc']){
                ?>
                <option selected value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                <?php
                    }else{
                ?>
                <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                <?php
                    }
                }
                ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>Tình trạng</td>
        <td>
            <select name="tinhtrang">
                <?php
                if($row['tinhtrang']==1){
                ?>
                <option value="1" selected>Hiện sản phẩm</option>
                <option value="0">Ẩn sản phẩm</option>
                <?php
                }else{
                ?>
                <option value="1" >Hiện sản phẩm</option>
                <option value="0" selected>Ẩn sản phẩm</option>
                <?php
                }
                ?>
            </select>
        </td>
    </tr>

    <tr>
        <td colspan="3"><input type="submit" name="suasanpham" value="Sửa sản phẩm"></td>
    </tr>
 </form>
 <?php
}
 ?>
</table>
