<?php
session_start();
session_unset(); // menghapus semua data session
session_destroy(); // mengakhiri session

echo "<script>
    alert('Anda berhasil logout.');
    window.location.href = '../../public/login.php';
</script>";
exit;
?>