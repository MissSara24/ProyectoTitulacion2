<?php
include_once 'user.php';
if(isset($_SESSION['rol'])){
    switch($_SESSION['rol']){
        case 1:
            header('location: admin.php');
        break;

        case 2:
        header('location: teacher.php');
        break;

        default:
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Gestor de Proyectos Escolares</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container" style="padding-left:450px;">
          <h2 class=" navbar-brand my-4" >Sistema de Gestion de Proyectos de Titulación</h2>
        </div>
    </nav>
    <section>
      <main>
      <div class="container">
        <img src="assets/scss/UPIICSA_LOGO.jpg"style="width: 150px; margin-left: 570px; margin-top: 70px" alt="logo">
          <div class="row justify-content-center">
              <div class="col-lg-5">
                <hr class="my-4">
                  <div class="card shadow-lg border-0 rounded-lg mt-5">
                      <div class="card-header"><h3 class="text-center font-weight-light my-4">Sign in</h3></div>
                      <div class="card-body">
                          <form action="" method="POST">
                            <?php
                              if(isset($errorLogin)){
                               echo $errorLogin;
                              }
                            ?>
                              <div class="form-floating mb-3">
                                  <input class="form-control" type="email" name="correo"  placeholder="name@example.com" />
                                  <label for="inputEmail">Email address</label>
                              </div>
                              <div class="form-floating mb-3">
                                  <input class="form-control" type="password" name ="password"  placeholder="Password" />
                                  <label for="inputPassword">Password</label>
                              </div>
                              <div class="text-center">
                                <p class="mb-5 pb-lg-2" style="color: #000;">Don't have an account? <a href="register.php"
                      style="color: #198754;">Register here</a></p>
                              </div>
                                <p>
                                <input type="submit" class="btn btn-outline-success" style="margin-left: 210px" value="LOG IN">
                                </p>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </main>
  </section>
<footer class="py-5 bg-dark" style="margin-top: 200px">
  <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Instituto Politecnico Nacional</p></div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
</body>
</html>