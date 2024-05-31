<?php
    // 開啟 PHP 的錯誤報告，0 為不顯示錯誤訊息
    error_reporting(0);
    
    // 啟動 PHP session
    session_start();
    
    // 如果沒有登入，顯示請先登入的訊息，並重新導向到登入頁面
    if (!$_SESSION["id"]) {
        echo "please login first";
        echo "<meta http-equiv=REFRESH content='3; url=2.login.html'>";
    }
    else {
        // 建立資料庫連線
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
        
        // 準備 SQL 語句，用於新增佈告
        $sql="insert into bulletin(title, content, type, time) 
        values('{$_POST['title']}','{$_POST['content']}', {$_POST['type']},'{$_POST['time']}')";
        
        // 執行 SQL 語句，如果執行失敗，顯示新增命令錯誤訊息；否則，顯示新增佈告成功訊息，並重新導向到佈告列表頁面
        if (!mysqli_query($conn, $sql)){
            echo "新增命令錯誤";
        }
        else {
            echo "新增佈告成功，三秒鐘後回到網頁";
            echo "<meta http-equiv=REFRESH content='3; url=11.bulletin.php'>";
        }
    }
?>

