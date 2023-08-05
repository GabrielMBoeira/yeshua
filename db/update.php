<?php
session_start();
require_once('connect.php');

$conn = Connection::newConnection();
$id = mysqli_real_escape_string($conn, $_GET['client']);

if (isset($_GET['client'])) {

    $sql = "UPDATE clients SET status = ? WHERE id = ?";

    $status = 'inactive';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $status, $id);

    if ($stmt->execute()) {
        header('location: ../admin/painel.php');
    } else {

        $_SESSION['msg'] =  "<div class='alert alert-danger mb-5' role='alert'> Erro ao finalizar atendimento! </div>";
        header('location: ../admin/painel.php');

    }
} 

$conn->close();