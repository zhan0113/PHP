<?php
    session_start();
    unset($_SESSION["counter"]);
    echo "counter重置成功....";
    echo "<meta http-equiv=REFRESH content='2; url=8.counter.php'>";

?>
<!-- html是靜態網頁，無法跨網頁紀錄狀態
『某甲』已經登入成功，如何紀錄登入狀態，使得在其他網頁不須一直重複登入? -->