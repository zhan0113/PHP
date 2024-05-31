<html>
    <head><title>新增使用者</title></head>
    <body>
<?php 
// 啟用 PHP 的錯誤報告，0 為不顯示錯誤訊息
error_reporting(0);

// 開始 PHP session
session_start();

// 如果沒有登入，顯示請登入帳號的訊       
    if (!$_SESSION["id"]) {
        echo "請登入帳號";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{    
        echo "
            <form action=15.user_add.php method=post>
                帳號：<input type=text name=id><br>
                密碼：<input type=text name=pwd><p></p>
                <input type=submit value=新增> <input type=reset value=清除>
            </form>
        ";
    }
?>
    </body>
</html>
