<html>
<head>
    <title>修改使用者</title>
</head>
<body>
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
        
        // 查詢要修改的使用者資料
        $result=mysqli_query($conn, "select * from user where id='{$_GET['id']}'");
        
        // 取得查詢結果的第一行資料
        $row=mysqli_fetch_array($result);
        
        // 顯示修改使用者的表單，包含原有帳號、密碼以及新密碼的輸入框
        echo "
        <form method='post' action='20.user_edit.php'>
            <input type='hidden' name='id' value='{$row['id']}'>
            帳號：{$row['id']}<br> 
            密碼：<input type='text' name='pwd' value='{$row['pwd']}'><p></p>
            <input type='submit' value='修改'>
        </form>
        ";
    }
?>
</body>
</html>

