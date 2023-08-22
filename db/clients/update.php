<?php
session_start();
require_once('../connect.php');
require_once('../../models/Client.php');
require_once('../../mail/send.php');

$conn = Connection::newConnection('db');
$client = new Client();
$id = mysqli_real_escape_string($conn, $_GET['client']);

if (isset($_GET['client'])) {

   if ($client->update($conn, $id)) {
      
      //Enviando email para 3º registro
      $thirdRegistry = $client->getThirdRegistry($conn);

      if ($thirdRegistry) {
         if ($thirdRegistry['email']) {
            sendEmail($thirdRegistry['email']);
         }
      }

      header('location: ../../admin/painel.php');

   } else {
      $_SESSION['msg'] =  "<div class='alert alert-danger mb-5' role='alert'> Erro ao finalizar atendimento! </div>";
      header('location: ../../admin/painel.php');
   }
}
