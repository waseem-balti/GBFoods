<?php
session_start();
session_destroy();
header('Location: ./indexnew.php');
exit();
?>
