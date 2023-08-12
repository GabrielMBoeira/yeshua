<?php
session_start();
require_once('templates/header.php');
require_once('models/Company.php');
require_once('db/connect.php');

$conn = Connection::newConnection('main');
$db = new Company();
$statusCompany = $db->getStatusCompany($conn);
?>

<main id="main">

   <section id="hero" class="d-flex align-items-center">
      <div class="container position-relative text-center" id="create">
         <div class="row d-flex justify-content-center align-items-center">

            <?php
            if (isset($_SESSION['msg'])) {
               print_r($_SESSION['msg']);
               unset($_SESSION['msg']);
            }
            ?>

            <form action="db/clients/store.php" method="post" role="form">
               <div class="col-lg-8 mt-5 mt-lg-0">
                  <div class="section-title">
                     <h2>Lista de espera</h2>
                     <p>Cadastre seu atendimento</p>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12 form-group d-flex flex-column justify-content-start align-items-start">
                     <label for="name">Nome Completo</label>
                     <input type="text" name="name" class="form-control" id="name" required>
                  </div>
               </div>
               <div class="row mt-3">
                  <div class="col-md-6 form-group d-flex flex-column justify-content-start align-items-start">
                     <label for="phone">Telefone</label>
                     <input type="text" name="phone" class="form-control" id="phone" required>
                  </div>
                  <div class="col-md-6 form-group date_nasc d-flex flex-column justify-content-start align-items-start">
                     <label for="birth">Data de Nascimento</label>
                     <input type="date" class="form-control" name="birth" id="birth" required>
                  </div>
               </div>
               <div class="my-3"></div>
               <div class="row">
                  <div class="text-center m-1">

                     <?php if ($statusCompany === 'open') { ?>
                        <button type="submit" class="submitAgenda" name="submitCreate">Cadastrar atendimento</button>
                     <?php } else { ?>
                        <span type="submit" class="submitAgendaClose" name="submitCreate">Agenda Fechada</span>
                     <?php } ?>

                  </div>
               </div>
            </form>

         </div>
      </div>
   </section>

</main>