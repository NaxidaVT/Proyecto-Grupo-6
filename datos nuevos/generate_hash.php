<?php
$password = "password3304";
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
var_dump($hashed_password);
?>