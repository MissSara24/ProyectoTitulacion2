
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
                      <div class="card-header"><h3 class="text-center font-weight-light my-4">Register a new account</h3></div>
                      <div class="card-body">
                          <form action="addUser.php" method="POST">
                              <div class="form-floating mb-3">
                                  <input class="form-control" type="text" name="nombre"  />
                                  <label for="inputEmail">Nombre(s)</label>
                              </div>
                              <div class="form-floating mb-3">
                                  <input class="form-control" type="email" name="correo"  />
                                  <label for="inputEmail">Correo</label>
                              </div>
                              <div class="form-floating mb-3">
                                  <input class="form-control" type="password" name ="password"   />
                                  <label for="inputPassword">Contraseña</label>
                              </div>
                              <div class="form-floating mb-3">
                                  <input class="form-control" type="text" name ="carrera"   />
                                  <label for="inputPassword">Carrera. Por ejemplo: Ciencias de la Informática</label>
                              </div>
                              <div class="form-floating mb-3">
                                  <input class="form-control" type="text" name ="id_roles" />
                                  <label for="inputPassword" >Numero de rol que despeñará.(1 -Administrador o 2 -Profesor) </label>
                              </div>
                                <div class="text-center">
                                    <input type="submit" class="btn btn-outline-success" style="margin-left: 10px" value="SIGN UP">
                                </div>
                                <a href="index.php" class="btn btn-default" style="margin-left: 210px">Cancelar</a>
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