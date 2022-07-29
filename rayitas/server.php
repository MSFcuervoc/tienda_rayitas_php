<?php
$hostname = "localhost";
$username = "davsalas_rayita";
$password = "Norma1994";
$database = "davsalas_rayitas";
$conn = new mysqli($hostname, $username, $password, $database);
if ($conn ->connect_error) {
die('Error de Conexión (' . $conn->connect_errno . ') ' . $conn->connect_error);
}
?>

