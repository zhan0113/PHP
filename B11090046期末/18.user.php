<html>
<head>
    <title>使用者管理</title>
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
        // 顯示使用者管理的標題以及新增使用者和回佈告欄列表的連結
        echo "<h1>使用者管理</h1>
            [<a href=14.user_add_form.php>新增使用者</a>] [<a href=11.bulletin.php>回佈告欄列表</a>]<br>";
        
        // 連接到資料庫
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
        
        // 查詢資料庫中的使用者資料
        $result=mysqli_query($conn, "select * from user");
        
        // 顯示使用者清單的表格
        echo "<table border=1>
                <tr><td></td><td>帳號</td><td>密碼</td></tr>";
        
        // 使用 while 迴圈遍歷查詢結果，顯示每個使用者的資料以及修改和刪除的連結
        while ($row=mysqli_fetch_array($result)){
            echo "<tr><td><a href=19.user_edit_form.php?id={$row['id']}>修改</a>||<a href=17.user_delete.php?id={$row['id']}>刪除</a></td><td>{$row['id']}</td><td>{$row['pwd']}</td></tr>";
        }
        
        echo "</table>";
    }
?> 
</body>
</html>

