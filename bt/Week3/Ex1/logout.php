<?php
session_start();
if ($_SESSION["IsLogin"] == false) {
    header("Location: login.html");
    exit();
}

$_SESSION["IsLogin"] = false;
echo 'Logout thành công';

?>
<div id="countdown">Chuyển về trang login trong 3 giây</div>

<script>
    var timeLeft = 3;
    var countdownElement = document.getElementById('countdown');

    var countdownInterval = setInterval(function() {
        timeLeft--;
        countdownElement.textContent = 'Chuyển về trang login trong ' + timeLeft + ' giây';
        
        if (timeLeft <= 0) {
            clearInterval(countdownInterval);
            window.location.href = 'login.html';
        }
    }, 1000); // Cập nhật mỗi giây
</script>