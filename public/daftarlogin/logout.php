<?php
    session_start();
    session_destroy();
    echo "<script>
    alert('anda telah logout!');
    location='/daftarlogin';
    </script>";
?>