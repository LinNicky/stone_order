<!DOCTYPE html>
<html>

<head>
    <title>統一編號檢查</title>
</head>

<body>
    <h1>統一編號檢查</h1>
    <form method="post">
        <label>請輸入統一編號:</label>
        <input type="text" name="gui_number" required>
        <input type="submit" name="submit" value="檢查" >
    </form>

</body>

</html>

<?php
if (isset($_POST['submit'])) {
    check_tax_number($_POST['gui_number']);
   
}

function check_tax_number($gui_number) {
    $cx = array(1, 2, 1, 2, 1, 2, 4, 1);
    $cnum = str_split($gui_number);
    $sum = 0;
    echo $gui_number;
    function cc($num) {
        $total = $num;
        if ($total > 9) {
            $s = strval($total);
            $n1 = intval(substr($s, 0, 1));
            $n2 = intval(substr($s, 1, 1));
            $total = $n1 + $n2;
        }
        return $total;
    }

    if (strlen($gui_number) !== 8) {
        return '統編錯誤，要有 8 個數字';
    }else {
        $isValid = true;

    foreach ($cnum as $index => $item) {
        if (ord($item) < 48 || ord($item) > 57) {
            return '統編錯誤，要有 8 個 0-9 數字組合';
        }
        $sum += cc($item * $cx[$index]);
    }

    if ($sum % 5 === 0) {
        return '統編正確';
    } else if ($cnum[6] === '7' && ($sum + 1) % 5 === 0) {
        return '統編正確2';
    } else {
        return '統編錯誤';
    }
}
}
echo check_tax_number($gui_number);
?>