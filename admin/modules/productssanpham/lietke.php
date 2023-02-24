<?php
$sql_lietke_sanpham = "SELECT * FROM tb_sanpham,tb_danhmuc WHERE tb_sanpham.id_danhmuc=tb_danhmuc.id_danhmuc ORDER BY id_sanpham DESC";
$query_lietke_sanpham =  mysqli_query($mysqli,$sql_lietke_sanpham);
?>
<p>LIỆT KÊ DANH SÁCH SẢN PHẨM</p>
<table style="width:100%"  border="1" style="border-collapse: collapse;">
    <tr>
        <th>ID</th> 
        <th>Tên sản phẩm</th>
        <th>Mã sản phẩm</th>
        <th>Giá tiền</th>
        <th>Mô tả</th>
        <th>Số lượng</th>
        <th>Hình ảnh</th>
        <th>Danh mục</th>
        <th>Tình trạng</th>
        <th>Quản lí</th>
    </tr>
    <?php
    $i=0;
        while($row = mysqli_fetch_array($query_lietke_sanpham)){
        $i++;
    ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['tensanpham'] ?></td>
        <td><?php echo $row['masanpham'] ?></td>
        <td><?php echo $row['giatien']?></td>
        <td><?php echo $row['mota'] ?></td>
        <td><?php echo $row['soluong'] ?></td>
        <td><img src="modules/productssanpham/uploads/<?php echo $row['hinhanh'] ?> " width="200px" ></td>
        <td><?php echo $row['tendanhmuc'] ?></td>
        <td><?php if ($row['tinhtrang']==1){
            echo 'Hiện sản phẩm';
        }else{
            echo 'Ẩn sản phẩm'; 
        }?>
        </td>
        <td>
            <a href="modules/productssanpham/xuly.php?idsanpham=<?php echo $row['id_sanpham']?>">Xóa</a> | <a href="?action=productssanpham&query=sua&idsanpham=<?php echo $row['id_sanpham']?>">Sửa</a>
        </td>
        
    </tr>
    <?php
    }
    ?>
</table>