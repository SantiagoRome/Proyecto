<?php
include_once("../../model/db.php");
include_once("../../config/config.php");
session_start();
$mensaje = $_GET['mensaje'];
$usuario = $_SESSION['user'];
$conexion = new Db();
$sql = "SELECT id FROM usuario WHERE usuario='$usuario'";
$result = $conexion->conection->query($sql);
$row = $result->fetch_assoc();

$sql = "INSERT INTO foro(nombre,creador) VALUES ('$mensaje',$row[id])";
$conexion->conection->query($sql);
echo "correcto";
