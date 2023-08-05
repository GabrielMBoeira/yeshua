<?php
session_start();
require_once('templates/header.php');
?>

<main id="main">

   <section id="hero" class="d-flex align-items-center">
      <div class="container position-relative text-center" id="create">

         <?php
         if (isset($_SESSION['msg'])) {
            print_r($_SESSION['msg']);
            unset($_SESSION['msg']);
         }
         ?>

         <div class="row d-flex justify-content-center align-items-center">

            <form action="src/db/login.php" method="post">
               <div class="col-lg-8 mt-5 mt-lg-0">
                  <form action="forms/contact.php" method="post" role="form" class="">
                     <div class="section-title">
                        <h2>Administrador</h2>
                        <p>Login</p>
                     </div>
               </div>
               <div class="row justify-content-center align-items-center">
                  <div class="col-md-6 form-group">
                     <input type="text" name="login" class="form-control" id="login" placeholder="Digite seu login" required>
                  </div>
               </div>
               <div class="row mt-3 justify-content-center align-items-center">
                  <div class="col-md-6 form-group">
                     <input type="password" name="password" class="form-control" id="password" placeholder="Digite sua senha" required>
                  </div>
               </div>
               <div class="my-3"></div>
               <div class="row">
                  <div class="text-center m-1">
                     <button type="submit" class="submitAgenda" name="submitLogin">Entrar</button>
                  </div>
               </div>
            </form>

         </div>
      </div>
   </section>

</main>