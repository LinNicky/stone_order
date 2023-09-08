<?php include('header.php')?>
    <h2>登入</h2>
    <div class="container">
        <div class="row tm-mt-big">
            <div class="col-6 mx-auto tm-login-col">
                <form action="functions.php?op=login" method="post" class="tm-login-form">
                    <div class="input-group mt-3">
                        <label for="email" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Email</label>
                        <input class="form-control validate" type="email" name="email" id="email" require><br>
                    </div>
                    
                    <div class="input-group mt-3">
                        <label for="password" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Password</label>
                        <input  class="form-control validate" type="password" name="password" id = "password" require><br>
                    </div>
                    <div class="input-group mt-3">
                    <input class="btn btn-primary d-inline-block mx-auto" type="reset" value="重設" name="submit">
                    <input class="btn btn-primary d-inline-block mx-auto" type="submit" value="登入">
                    </div>
                    <div class="input-group mt-3" >
                        <a href="/register.php" style="color: #6f42c1;">還未註冊?快來成為我們的一員!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>