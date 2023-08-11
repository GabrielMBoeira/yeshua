<?php
session_start();
require_once('connect.php');

$conn = Connection::newConnection();
$status = mysqli_real_escape_string($conn, $_POST['status']);

if (isset($_POST['status'])) {

    $sql = "UPDATE company SET status = ? WHERE id = 1";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $status);

    if ($stmt->execute()) {
        header('location: ../admin/painel.php');
    } else {
        $_SESSION['msg'] =  "<div class='alert alert-danger mb-5' role='alert'> Erro ao finalizar atendimento! </div>";
        header('location: ../admin/painel.php');
    }
} 

$conn->close();