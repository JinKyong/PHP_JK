<?php

session_start();
unset($_SESSION[id]);

echo "<script> location.replace('../index.php')</script>";

?>