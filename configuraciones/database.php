<?php
// configuracion/database.php

$dsn = "mysql:host=localhost;dbname=ssm;charset=utf8";
$usuario = "root";
$contraseña = "123456";

try {
    $conexion = new PDO($dsn, $usuario, $contraseña);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error al conectar a la base de datos: " . $e->getMessage();
    exit;
}
?>
