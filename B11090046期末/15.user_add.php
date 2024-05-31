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
    
    // 準備 SQL 語句，用於新增使用者
    $sql="insert into user(id,pwd) values('{$_POST['id']}', '{$_POST['pwd']}')";
    
    // 執行 SQL 語句，如果執行失敗，顯示新增命令錯誤訊息
    if (!mysqli_query($conn, $sql)) {
        echo "新增命令錯誤";
    }
    else {
        // 如果成功新增使用者，顯示成功訊息，並重新導向到另一個網頁
        echo "新增使用者成功，三秒鐘後回到網頁";
        echo "<meta http-equiv=REFRESH content='3; url=18.user.php'>";
    }
}
?>

