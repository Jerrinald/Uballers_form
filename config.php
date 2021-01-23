<?php
$bd = new PDO('mysql:host=localhost;dbname=login_uballers', 'root', '');
$bd->query("SET NAMES 'utf8'");
$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>