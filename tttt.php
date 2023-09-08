<?php include('header.php')?>
    
    <h1>寶石預定</h1>
    <h2><?php echo date('n');?>月優惠</h2>
    <?php
    $sql = "SELECT * FROM `login`";
    $result = mysqli_query($dbConnection,$sql) or die("Error");

    //$data_nums = mysqli_num_rows($result); //統計總比數
    $data_nums=count($gems);
    $per = 4; //每頁顯示項目數量
    $pages = ceil($data_nums/$per); //取得不小於值的下一個整數
    if (!isset($_GET["page"])){ //假如$_GET["page"]未設置
        $page=1; //則在此設定起始頁數
    } else {
        $page = intval($_GET["page"]); //確認頁數只能夠是數值資料
    }
    $start = ($page-1)*$per; //每一頁開始的資料序號


    
    session_start();
    $name=$_SESSION['name'];
    if($_SESSION){
    echo "<h1>歡迎! ".$name."</h1><br/>";
    }
    //貨品資訊
    $ii=1;
    $per_page=2;
    $start = ($page - 1) * $per_page;

// 計算當前頁的商品數據的結束索引
    $end = $start + $per_page;
    echo '<div class="flex-grid">';
// 顯示當前頁的商品數據
    for ($i = $start; $i < $end && $i < count($gems); $i++) { 
        $ii++;
        echo '<div class="col">';
        echo '<img src="/image/'. $gems[$i]['image'].'"/>
        <p>
        名稱:' .$gems[$i]['name'].'<br>
        價格:$'.$gems[$i]['price'].'<br>
        <a href="/order.php?gem_id='.$gems[$i]['gem_id'].'"class="buyBtn">預訂'.$gems[$i]['name'].'</a><br></div>';
        if ($ii>5){
            break;
        
    }
}
    //echo "<a href=\"tttt.php?pages=".$i."\">".$i."</a>&nbsp; </div>";
    ?>
    </div>
    <div class="page-normal" >
        <?php
        echo "<br /><a href=?page=1>首頁</a> ";
        echo "第 ";
        for( $i=1 ; $i<=$pages ; $i++ ) {
            if ( $page-3 < $i && $i < $page+3 ) {
                echo "<a href=?page=".$i.">".$i."</a> </span>";
            }
        } 
        echo " 頁 <a href=?page=".$pages.">末頁</a><br/>";
        echo '<h6>共 '.$data_nums.' 筆-在 '.$page.' 頁-共 '.$pages.' 頁</h6>';
        ?>
    </div>

<?php include('footer.php')?>