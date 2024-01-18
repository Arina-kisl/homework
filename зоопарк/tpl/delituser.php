<?php
session_start();
$id = $_GET["id"];
$mysql = new mysqli('bd', 'root', '', 'tpl-register');
$result = $mysql->query("DELETE FROM `users` WHERE `users`.`id` = $id");
            header('Location: admin.php');
    
?>