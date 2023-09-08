<?php include('header.php')?>
<script>
        function refresh_code(){ 
            document.getElementById("imgcode").src="captcha.php"; 
        } 
</script>
<div class="parent">
<form action="/functions.php?op=register" name="register" method="post" onsubmit="return chock(this);">
    <h2><label for="gem_name" style="font-weight:bold;">註冊</label></h2>
    <input type="hidden" id="gem_id" name="gem_id" value="<?php echo $_GET['gem_id'];?>">
    <h2><?php echo $gems[$_GET['gem_id']-1]['name'];?></h2>

    <div class="row mb-3">
        <label for="name" class="col-sm-4 col-form-label">暱稱</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
    </div>

    <div class="row mb-3">
        <label for="email" class="col-sm-4 col-form-label">郵件</label>
        <div class="col-sm-8">
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
    </div>

    <div class="row mb-3">
        <label for="password" class="col-sm-4 col-form-label">密碼</label>
        <div class="col-sm-8">
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
    </div>

    <div class="row mb-3">
        <label for="check" class="col-sm-4 col-form-label">確認密碼</label>
        <div class="col-sm-8">
            <input type="password" class="form-control" id="check" name="check" required>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-6 col-form-label">請輸入下圖字樣</label>
        <div class="col-sm-6">
            <input type="text" class="form-control"name="checkword" id="checkword" size="10" maxlength="10" require>
        </div>
    </div>
    
    <h6>
        <img id="imgcode" src="testt.php" style="width: 240px; height: 60px;" onclick="refresh_code()" /><br />
        點擊圖片可以更換驗證碼
    </h6>

    <input type="submit" class="btn-check" id="buyBtn">
    <label class="btn btn-primary" for="buyBtn">註冊</label>



</form>
</div>
    <script>
    function chock() {
        var x = document.forms['register']['password'].value;
        var y = document.forms['register']['check'].value;
        if(x.length<6){
            alert("密碼長度不足");
            return false;
        }
        if (x != y) {
            alert("請確認密碼是否輸入正確");
            return false;
        }
    }
    </script>