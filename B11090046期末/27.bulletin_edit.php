<?php
    // 開啟 PHP 的錯誤報告，0 為不顯示錯誤訊息
    error_reporting(0);
    
    // 啟動 PHP session
    session_start();
    
    // 如果沒有登入，顯示請登入的訊息，並重新導向到登入頁面
    if (!$_SESSION["id"]) {
        echo "請登入帳號";
        echo "<meta http-equiv=REFRESH content='3; url=2.login.html'>";
    }
    else {   
        // 建立資料庫連線
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
        
        // 更新佈告的標題、內容、發布時間和類型
        if (!mysqli_query($conn, "update bulletin set title='{$_POST['title']}',content='{$_POST['content']}',time='{$_POST['time']}',type={$_POST['type']} where bid='{$_POST['bid']}'")){
            // 如果更新失敗，顯示修改錯誤訊息，並重新導向到佈告列表頁面
            echo "修改錯誤";
            echo "<meta http-equiv=REFRESH content='3; url=11.bulletin.php'>";
        }
        else {
            // 如果更新成功，顯示修改成功訊息，並重新導向到佈告列表頁面
            echo "修改成功，三秒鐘後回到佈告欄列表";
            echo "<meta http-equiv=REFRESH content='3; url=11.bulletin.php'>";
        }
    }
?>

