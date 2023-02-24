<p class="them">THÊM SẢN PHẨM</p>
<table class="bangthem" border="1" width="100%" style="border-collapse:collapse;">
 <form method="POST" action="modules/productssanpham/xuly.php" enctype="multipart/form-data">
    <tr>
        <td>Sản phẩm</td>
        <td><input type="text" name="tensanpham"></td>
    </tr>
    <tr>
        <td>Mã sản phẩm</td>
        <td><input type="text" name="masanpham"></td>
    </tr>
    <tr>
        <td>Giá tiền</td>
        <td><input type="text" name="giatien"></td>
    </tr>
    <tr>
        <td>Mô tả</td>
        <td><textarea rows="5" name="mota"></textarea></td>
    </tr>
    <tr>
        <td>Số lượng</td>
        <td><input type="text" name="soluong"></td>
    </tr>
    <tr>
        <td>Hình ảnh</td>
        <td><input type="file" name="hinhanh"></td>
    </tr>
    <tr>
        <td>Danh mục sản phẩm</td>
        <td>
            <select name="danhmuc">
                <?php
                $sql_danhmuc = "SELECT * FROM tb_danhmuc ORDER BY id_danhmuc DESC";
                $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
                while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                ?>
                <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                <?php
                }
                ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>Tình trạng</td>
        <td>
            <select name="tinhtrang">
                <option value="1">Hiện sản phẩm</option>
                <option value="0">Ẩn sản phẩm</option>
            </select>
        </td>
    </tr>

    <tr>
        <td colspan="3"><input type="submit" name="themsanpham" value="Add new products"></td>
    </tr>
 </form>
</table>
