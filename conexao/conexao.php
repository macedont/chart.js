<?php

$user = 'root';
$database = 'vendas';
$pass = '';
$server = 'localhost';
$dsn = ("mysql:host=$server; dbname=$database");

$pdo = new PDO($dsn, $user, $pass);