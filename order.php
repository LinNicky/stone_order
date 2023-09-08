<?php include('header.php')?>

<form action="/functions.php?op=createOrder" method="post">
    <label for="gem_id">預定名單</label>
    <input type="hidden" id="gem_id" name="gem_id" value="<?php echo $_GET['gem_id'];?>">
    <h2><?php echo $gems[$_GET['gem_id']-1]['name'];?></h2>

    <label for="name">你的稱呼</label>
    <input type="text" name="name" id="name"><br>

    <label for="email">你的信箱</label>
    <input type="email" name="email" id="email" require><br>

    <label for="quantity">購買數量</label>
    <input type="number" name="quantity" id="quantity" min="1" max="5" value="1"><br>

    <input class="buyBtn" type="submit" value="下單確定">
    <input class="buyBtn" type="reset" value="重設" name="submit">
</form>


<?php include('footer.php')?>