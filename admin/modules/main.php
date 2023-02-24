<div class="clear"></div>
<div class="main">
<?php
    if(isset($_GET['action']) && $_GET['query']){
        $tam = $_GET['action'];
        $query = $_GET['query'];
    }else{
        $tam = '';
        $query = '';
    }
    if($tam=='danhmucsanpham'&& $query=='them'){
        include('modules/products/them.php'); 
        include('modules/products/lietke.php'); 
    }elseif($tam=='danhmucsanpham'&& $query=='sua'){
        include('modules/products/sua.php'); 
    }elseif($tam=='productssanpham'&& $query=='them'){
        include('modules/productssanpham/them.php');
        include('modules/productssanpham/lietke.php'); 
    }elseif($tam=='productssanpham'&& $query=='sua'){
        include('modules/productssanpham/sua.php');
    }
    else{
        include('modules/dashboard.php');
    }
?>
</div>
<style>
    .clear{
        clear: both;
    }
</style>