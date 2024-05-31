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
        
        // 查詢要編輯的佈告資料
        $result=mysqli_query($conn, "select * from bulletin where bid={$_GET["bid"]}");
        $row=mysqli_fetch_array($result);
        
        // 初始化佈告類型的勾選狀態
        $checked1="";
        $checked2="";
        $checked3="";
        
        // 根據佈告的類型設置相應的勾選狀態
        if ($row['type']==1)
            $checked1="checked";
        if ($row['type']==2)
            $checked2="checked";
        if ($row['type']==3)
            $checked3="checked";
        
        // 顯示編輯佈告的表單，並填入原有的佈告資料
      

