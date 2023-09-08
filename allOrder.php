<?php include('header.php');
    session_start();

    if(!isset($_SESSION['email'])){
        header("Location:/login.php");
    }
?>
<h1>收到的訂單</h1>
<h2>你的登入郵件是<?php echo $_SESSION['email'];?></h2>
<?php
    //$orderData=file_get_contents("data.csv");
    //$orders =str_getcsv($orderData,"\r\n");
    $sql = "SELECT * FROM `order`"; 
	$result = mysqli_query($dbConnection,$sql);
    //if(mysqli_num_rows($result)>0){
        /*foreach($orders as $order){
            $signleOrder= explode(",",$order);
            echo '<div class="order"><p>';
            echo '客戶名稱 :'.$signleOrder[1].'<br>';
            echo '客戶郵件 :'.$signleOrder[2].'<br>';
            echo '訂單 :'.$gems[$signleOrder[0]-1]['name'].$signleOrder[3].'件<br>';
            echo '下單時間 :'.$signleOrder[4].'<br/>';
            echo '</p></div>';
        }*/
        if ($result) {
            // mysqli_num_rows方法可以回傳我們結果總共有幾筆資料
            if (mysqli_num_rows($result)>0) {
                // 取得大於0代表有資料
                // while迴圈會根據資料數量，決定跑的次數
                // mysqli_fetch_assoc方法可取得一筆值
                while ($row = mysqli_fetch_assoc($result)) {
                    // 每跑一次迴圈就抓一筆值，最後放進data陣列中
                    $datas[] = $row;
                }
            }
            // 釋放資料庫查到的記憶體
            mysqli_free_result($result);
        }
        if(!empty($result)){
            // 如果結果不為空，就利用print_r方法印出資料
            //print_r($datas);
            foreach($datas as $row){
                echo '<div class="order"><p>';
                echo '客戶名稱 :'.$row['client_name'].'<br>';
                echo '客戶郵件 :'.$row['client_email'].'<br>';
                echo $row['$gam_id'];
                if($row['gam_id']==1){
                    echo '訂單 :白珍珠'.$row['quantity'].'件<br>';
                }else if($row['gam_id']==2){
                    echo '訂單 :紅心寶石'.$row['quantity'].'件<br>';
                }else if($row['gam_id']==3){
                    echo '訂單 :鑽石'.$row['quantity'].'件<br>';
                }else if($row['gam_id']==4){
                    echo '訂單 :綠寶石'.$row['quantity'].'件<br>';
                }
                echo '下單時間 :'.$row['order_time'].'<br/>';
                echo '</p></div>';
			}
        }
        else {
            // 為空表示沒資料
            echo "查無資料";
        }

include('footer.php')?>