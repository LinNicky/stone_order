<?php include('header.php')?>
    <h2>登入</h2>
    <div class="parent">
    <form action="functions.php?op=checkLogin" method="post">
        <div class="row mb-3">
        <label for="email" class="col-sm-4 col-form-label">郵件</label>
        <div class="col-sm-8">
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
    </div>

        <div class="row mb-3">
            <label for="password" class="col-sm-4 col-form-label">密碼:</label>
            <div class="col-sm-8">
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
        </div>

        <input type="submit" class="btn-check" id="buyBtn">
            <label class="btn btn-primary" for="buyBtn">登入</label>
        </form>
    </div>
<?php include('footer.php')?>