<?php
session_start();

//Check Admin
if(!isset($_SESSION['admin']) && $_SESSION['admin'] != 'logado') {
   header('location: ../login');
}


require_once('templates_admin/header.admin.php');
require_once('models/Client.php');

$conn = Connection::newConnection();
$db = new Client();
$result = $db->selectClientsActives($conn);
?>

<div id="preloader"></div>

<main id="main">

   <section id="hero" class="d-flex align-items-center">
      <div class="container position-relative text-center" id="painel-main">

         <?php
         if (isset($_SESSION['msg'])) {
            print_r($_SESSION['msg']);
            unset($_SESSION['msg']);
         }
         ?>

         <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-8 mt-5 mt-lg-0">
               <div class="section-title">
                  <h2>Atendimentos</h2>
                  <p>Lista de espera</p>
               </div>
            </div>
            <div>
               <div class="table-responsive">
                  <table class="table text-light table-list">

                     <thead>
                        <tr>
                           <th scope="col">Ordem</th>
                           <th scope="col">Nome</th>
                           <th scope="col">Telefone</th>
                           <th scope="col">Serviço</th>
                           <th scope="col">Email</th>
                           <th scope="col"></th>
                        </tr>
                     </thead>
                     <tbody>
                        <form>

                           <?php
                           if ($result->num_rows > 0) {

                              $i = 1;
                              while ($data = $result->fetch_assoc()) {
                           ?>
                                 <input type="hidden" name="client" value="<?= $data['id'] ?>">
                                 <tr>
                                    <td style="vertical-align: middle;" class="text-truncate"> <?= $i ?> </td>
                                    <td style="vertical-align: middle;" class="text-truncate"> <?= $data['name'] ?> </td>
                                    <td style="vertical-align: middle;" class="text-truncate"> <?= $data['phone'] ?> </td>
                                    <td style="vertical-align: middle;" class="text-truncate"> <?= $data['service'] ?> </td>
                                    <td style="vertical-align: middle;" class="text-truncate"> <?= $data['email'] ?> </td>
                                    <td style="vertical-align: middle;">
                                       <a type="submit" href="../db/clients/update.php?client=<?= $data['id'] ?>" name="submitAtendido" id="preload-link" class="btn btn-sm btn-atendido preload-link" style="background-color: #cda45e; color: #fff" onclick="clickLoader()">Atendido</a>
                                    </td>
                                 </tr>
                           <?php
                              $i++;
                              }
                           }
                           ?>

                        </form>
                     </tbody>

                  </table>
               </div>
            </div>

         </div>
      </div>
   </section>

</main>

<script>
   window.onload = function() {
      const preloader = document.getElementById("preloader");
      preloader.style.display = "none";
   };

   function clickLoader() {

      const preloadLinks = document.querySelectorAll(".preload-link");
      const preloader = document.getElementById("preloader");
      preloader.style.display = "flex";

      window.addEventListener("click", function() {
         preloadLinks.forEach(link => {
            link.addEventListener("click", function(event) {
               event.preventDefault();
               window.location.href = link.getAttribute("href");
            });
         });

      });
   }
</script>