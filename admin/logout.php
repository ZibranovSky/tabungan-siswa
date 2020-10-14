<?php
session_start();
unset($_SESSION['idtabsis']);
unset($_SESSION['usertabsis']);
unset($_SESSION['passtabsis']);
unset($_SESSION['namatabsis']);
unset($_SESSION['telepontabsis']);
unset($_SESSION['pototabsis']);

echo "<script>window.location='../'</script>";
//session_destroy();

?>
