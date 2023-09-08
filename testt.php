<?php
 if(!isset($_SESSION)){ session_start(); } //檢查SESSION是否啟動
    $_SESSION['check_word'] = ''; //設置存放檢查碼的SESSION

    //設置定義為圖片
    header("Content-type: image/PNG");

    /*
      imgcode($nums,$width,$high)
      設置產生驗證碼圖示的參數
      $nums 生成驗證碼個數
      $width 圖片寬
      $high 圖片高
    */
    imgcode(6,240,60);

    //imgcode的function
    function imgcode($nums,$width,$high) {
       
        //去除了數字0和1 字母小寫O和L，為了避免辨識不清楚
        $str = "23456789abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMOPQRSTUBWXYZ";
        $code = '';
        for ($i = 0; $i < $nums; $i++) {
            $code .= $str[mt_rand(0, strlen($str)-1)];
        }

        $_SESSION['check_word'] = $code;

        //建立圖示，設置寬度及高度與顏色等等條件
        $image = imagecreate($width, $high);
        $black = imagecolorallocate($image, mt_rand(0, 200), mt_rand(0, 200), mt_rand(0, 200));
        $border_color = imagecolorallocate($image, 21, 106, 235);
        $background_color = imagecolorallocate($image, 235, 236, 237);

        //建立圖示背景
        imagefilledrectangle($image, 0, 0, $width, $high, $background_color);

        //建立圖示邊框
        imagerectangle($image, 0, 0, $width-1, $high-1, $border_color);

        //在圖示布上隨機產生大量躁點
        for ($i = 0; $i < 2000; $i++) {
            imagesetpixel($image, rand(0, $width), rand(0, $high), $black);
        }

        $font = 'times.ttf';
        if(!file_exists($font)) { exit('字型文件不存在！'); }
        
        $font_size = 30;
        //$angle = rand(-10, 10);
        $angle = 0;
        $x = 20;
        $y = 40;
        for ($i = 0; $i < $nums; $i++) {
            $letter = substr($code, $i, 1);
            $color = imagecolorallocate($image, mt_rand(0, 200), mt_rand(0, 200), mt_rand(0, 200));
            imagettftext($image, $font_size, $angle, $x, $y, $color, $font, $letter);
            $x += $font_size + rand(10, 30);
        }

        imagepng($image);
        imagedestroy($image);
    }
    ?>