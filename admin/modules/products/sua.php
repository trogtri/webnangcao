<?php
$sql_sua_danhmuc = "SELECT * FROM tb_danhmuc WHERE id_danhmuc='$_GET[iddanhmuc]' LIMIT 1";
$query_sua_danhmuc =  mysqli_query($mysqli,$sql_sua_danhmuc);
?>
<p class="them">CHỈNH SỬA DANH MỤC</p>
<table class="bangthem" border="1" width="100%" style="border-collapse:collapse;">
 <form method="POST" action="modules/products/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc']?>">
    <?php
    while($dong = mysqli_fetch_array($query_sua_danhmuc)){
    ?>
    <tr>
        <td>Tên danh mục</td>
        <td><input type="text" value="<?php echo $dong['tendanhmuc']?>" name="tendanhmuc"></td>
    </tr>
    <tr>
        <td>Mô tả</td>
        <td><input type="text" value="<?php echo $dong['mota']?>" name="mota"></td>
    </tr>
    <tr>
        <td colspan="3"><input type="submit" name="suadanhmuc" value="Edit Danh mục"></td>
    </tr>
    <?php
    }
    ?>
 </form>
</table>
