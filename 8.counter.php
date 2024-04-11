<?php
#可嘗試把session_start():註解，比較有何不同
    session_start();
    if (!isset($_SESSION["counter"]))
        $_SESSION["counter"]=1;
    else
        $_SESSION["counter"]++;

    echo "counter=".$_SESSION["counter"];
    echo "<br><a href=9.reset_counter.php>重置counter</a>";
?>

<!-- 要讀取/操作session變數之前，需呼叫session_start()，才能夠跨網頁
$_SESSION['變數'] = 值。設定Session變數 -->