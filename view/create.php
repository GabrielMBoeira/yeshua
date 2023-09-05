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
                     <input type="text" name="name" class="form-control" maxlength="100" id="name" required>
                  </div>
               </div>
               <div class="row mt-3">
                  <div class="col-md-6 form-group d-flex flex-column justify-content-start align-items-start">
                     <label for="phone">Telefone</label>
                     <input type="text" name="phone" class="form-control" maxlength="20" id="phone" required>
                  </div>
                  <div class="col-md-6 form-group date_nasc d-flex flex-column justify-content-start align-items-start">
                     <label for="email">Email</label>
                     <input type="email" class="form-control" name="email" maxlength="60" placeholder="Enviaremos email para chamar você.." id="email">
                  </div>
               </div>
               <div class="row mt-3">
                  <div class="col-md-12 form-group d-flex flex-column justify-content-start align-items-start">
                     <label for="service">Tipo de serviço</label>
                     <select name="service" class="form-control" id="service" required>
                        <option value=""></option>
                        <option value="Corte Moderno">Corte Moderno</option>
                        <option value="Corte Tradicional">Corte Tradicional</option>
                        <option value="Só Maquina">Só Maquina</option>
                        <option value="Barba">Barba</option>
                        <option value="Sombrancelha">Sombrancelha</option>
                        <option value="Acabamento">Acabamento</option>
                        <option value="Corte Moderno + Barba">Corte Moderno + Barba</option>
                        <option value="Corte Tradicional + Barba">Corte Tradicional + Barba</option>
                        <option value="Só Máquina + Barba">Só Máquina + Barba</option>
                     </select>
                  </div>
               </div>
               <div class="my-3"></div>
               <div class="row">
                  <div class="text-center m-1">

                     <?php if ($statusCompany === 'open') { ?>
                        <button type="submit" class="submitAgenda" name="submitCreate">Cadastrar atendimento</button>
                     <?php } else { ?>
                        <span type="submit" class="submitAgendaClose" id="closed" name="submitCreate" onclick="closed()">Agenda Fechada</span>
                     <?php } ?>

                  </div>
               </div>
            </form>

         </div>
      </div>
   </section>

</main>

<script>

   function closed() {
      alert('Agenda está fechada!')
   }

</script>