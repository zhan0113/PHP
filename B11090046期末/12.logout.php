<?php
    // 啟動 PHP session
    session_start();
    
    // 刪除 session 中的 id 變數
    unset($_SESSION["id"]);
    
    // 輸出登出成功的訊息
    echo "登出成功....";
    
    // 重新導向到登入頁面，延遲 3 秒後執行
    echo "<meta http-equiv=REFRESH content='3; url=2.login.html'>";
?>
