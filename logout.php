<?php
session_start();
session_destroy();
header('Location: ./indexnewlogin.php');
exit();
?>
