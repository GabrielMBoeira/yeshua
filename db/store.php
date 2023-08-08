<?php
session_start();
require_once('connect.php');

$conn = Connection::newConnection();
$name = mysqli_real_escape_string($conn, $_POST['name']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$birth = mysqli_real_escape_string($conn, $_POST['birth']);
$status = 'active';

if (isset($_POST['submitCreate'])) {

    $sql = "INSERT INTO clients (name, phone, birth, status) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssss', $name, $phone, $birth, $status);

    if ($stmt->execute()) {
        // $_SESSION['msg'] = "<div class='alert alert-warning mt-5' role='alert'>Atendimento cadastrado com sucesso!</div>";
        header('location: ../list.php');
    } else {
        $_SESSION['msg'] = "<div class='alert alert-danger mt-5' role='alert'>Erro ao cadastrar atendimento!</div>";
        header('location: ../create.php');
    }

    $conn->close();
}
