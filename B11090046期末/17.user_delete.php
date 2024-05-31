<?php
    // 開啟 PHP 的錯誤報告，0 為不顯示錯誤訊息
    error_reporting(0);
    
    // 啟動 PHP session
    session_start();
    
    // 如果沒有登入，顯示請登入帳號的訊息，並重新導向到登入頁面
    if (!$_SESSION["id"]) {
        echo "請登入帳號";
        echo "<meta http-equiv=REFRESH content='3; url=2.login.html'>";
    }
    else {   
        // 建立資料庫連線
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
        
        // 準備 SQL 語句，用於刪除使用者
        $sql="delete from user where id='{$_GET["id"]}'";
        
        // 執行 SQL 語句，如果執行失敗，顯示使用者刪除錯誤訊息；否則，顯示使用者刪除成功
        if (!mysqli_query($conn,$sql)){
            echo "使用者刪除錯誤";
        } else {
            echo "使用者刪除成功";
        }
        
        // 重新導向到另一個網頁
        echo "<meta http-equiv=REFRESH content='3; url=18.user.php'>";
    }
?>

