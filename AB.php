<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>test</title>
    <script>
        function check_tax_number() {
            const gui_number = document.querySelector('.gui_number').value; // 取欄位內容
            const cx = [1, 2, 1, 2, 1, 2, 4, 1];
            const cnum = gui_number.split('');
            let sum = 0;

            function cc(num) {
                let total = num;
                if (total > 9) {
                    let s = total.toString();
                    const n1 = s.substring(0, 1) * 1;
                    const n2 = s.substring(1, 2) * 1;
                    total = n1 + n2;
                }
                return total;
            }
            if (gui_number.length !== 8) {
                alert('統編錯誤，要有 8 個數字');
                return;
            }
            cnum.forEach((item, index) => {
                if (gui_number.charCodeAt() < 48 || gui_number.charCodeAt() > 57) {
                    alert('統編錯誤，要有 8 個 0-9 數字組合');
                    return;
                }
                sum += cc(item * cx[index]);
            });
            if (sum % 5 === 0) {
                alert('統編正確');
            } else if (cnum[6] === '7' && (sum + 1) % 5 === 0) {
                alert('統編正確2');
            } else {
                alert('統編錯誤');
            }
        }
    </script>
</head>

<body>
    <input type="text" class="gui_number" name="gui_number" maxlength="8">
    <input type="button" value="驗證" onclick="check_tax_number()">
</body>

</html>