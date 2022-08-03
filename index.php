<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>titulo</title>
    <link rel="stylesheet" href="estilos/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

  <!-- NavBar -->
    <nav class="navbar navbar-expand-lg bg-dark">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
              <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#">Enlace</a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Buscar raza" aria-label="Search">
              <button class="btn btn-outline-success text-white" type="submit">Buscar</button>
            </form>
        </div>
      </div>
  </nav>


  <!-- Grid y Cards -->
    <div class="container text-center">
    <div class="row gy-2">
        <?php
            include ("conexion.php");
            $query = "SELECT * FROM breeds";
            $resultado = $conexion -> query($query);
            while($row = $resultado -> fetch_assoc()){
              ?>
                <div class="col-lg-3 col-6">
                    <div class="card mt-3 mb-3 p-1 shadow-sm border-dark h-100">
                        <img src="<?php echo $row['ImagenURL']; ?>" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title text-white" id="titulo-card"><?php echo $row['Raza']; ?></h5>
                        </div>
                    </div>
                </div>   
              <?php
            }
        ?>
    </div> 

  <!-- Modal -->
  <div class="modal fade" id="gallery-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <img src="logo-precision-white.svg" class="modal-img" alt="modal img">
        </div>
        </div>
      </div>
    </div>
  </div>

  <script src="main.js"></script>
</body>

</html>