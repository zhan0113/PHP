<?php
    // 關閉錯誤報告，以避免在程式執行過程中顯示錯誤訊息
    error_reporting(0);

    // 啟動 session，用於處理用戶身份驗證
    session_start();

    // 檢查用戶是否已登入，如果未登入則導向登入頁面
    if (!$_SESSION["id"]) {
        echo "請登入帳號";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else {
        // 連接到資料庫
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

        // 準備 SQL 查詢，用於刪除指定的佈告
        $sql="delete from bulletin where bid='{$_GET["bid"]}'";
        
        // 執行 SQL 查詢
        if (!mysqli_query($conn,$sql)){
            echo "佈告刪除錯誤";
        } else {
            echo "佈告刪除成功";
        }

        // 重定向到佈告板頁面
        echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
    }
?>

