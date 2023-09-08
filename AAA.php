<!DOCTYPE html>
<html>

<head>
	<title>統一編號檢查</title>
</head>

<body>
	<h1>統一編號檢查</h1>
	<form>
		<label>請輸入統一編號:</label>
		<input type="text" name="gui_number" required>
		<input type="submit" value="檢查">
	</form>
	<?php
	if (isset($_GET['gui_number'])) {
		$gui_number = $_GET['gui_number'];

		$cx = array(1, 2, 1, 2, 1, 2, 4, 1);
		$cnum = str_split($gui_number);
		$sum = 0;

		function cc($num)
		{
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
			echo '<p>統編錯誤，要有 8 個數字</p>';
		} else {
			$isValid = true;
			foreach ($cnum as $index => $item) {
				if (ord($item) < 48 || ord($item) > 57) {
					echo '<p>統編錯誤，要有 8 個 0-9 數字組合</p>';
					$isValid = false;
					break;
				}
				$sum += cc($item * $cx[$index]);
			}
			if ($isValid) {
				if ($sum % 5 === 0) {
					echo '<p>統編正確</p>';
				} else if ($cnum[6] === '7' && ($sum + 1) % 5 === 0) {
					echo '<p>統編正確2</p>';
				} else {
					echo '<p>統編錯誤</p>';
				}
			}
		}
	}

	?>
</body>

</html>