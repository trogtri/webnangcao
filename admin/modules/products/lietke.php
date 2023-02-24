<?php
$sql_lietke_danhmuc = "SELECT * FROM tb_danhmuc ORDER BY id_danhmuc DESC";
$query_lietke_danhmuc =  mysqli_query($mysqli,$sql_lietke_danhmuc);
?>
<p>LIỆT KÊ DANH MỤC SẢN PHẨM</p>
<table style="width:100%" border="1" style="border-collapse:collapse;">
    <tr>
        <th>ID</th>
        <th>Tên danh mục</th>
        <th>Mô tả</th>
        <th>Quản lí</th>
    </tr>
    <?php
    $i=0;
    while($row = mysqli_fetch_array($query_lietke_danhmuc)){
        $i++;
    ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['tendanhmuc'] ?></td>
        <td><?php echo $row['mota'] ?></td>
        <td>
            <a href="modules/products/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc']?>">Xóa</a> | <a href="?action=danhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id_danhmuc']?>">Sửa</a>
        </td>
    </tr>
    <?php
    }
    ?>
</table>