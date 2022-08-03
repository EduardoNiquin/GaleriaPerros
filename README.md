# Página de galería de perros
Página web que despliega una galería de razas de perros con sus datos obtenidos de una base de datos SQL utilizando PHP y BootStrap.
Para verla puedes ingresar a `http://galeriadeperros.rf.gd`

## Prerrequisitos:

#### ***1-XAMPP***
#### ***Instalamos Xampp, seleccionamos instalar PHP, Apache y SQL únicamente para este caso.***
#### ***Les damos a iniciar a los servicios para arrancar nuestra base SQL y poder acceder a PHPMyAdmin.***

![image](https://user-images.githubusercontent.com/68208770/182721439-32d9d1bf-bb61-4449-bc3c-9e63651aded1.png)

#### ***2-Crear base de datos***

**Accedemos a:** `http://localhost/phpmyadmin/`
#### ***Creamos una nueva base de datos, en este caso la llamaremos "dogs".***
![image](https://user-images.githubusercontent.com/68208770/182723144-f75624b5-c3c8-47a7-a209-7bf33916a54c.png)
#### ***Ahora crearemos una nueva tabla llamada "Breeds", y le asignaremos 3 columnas.***
![image](https://user-images.githubusercontent.com/68208770/182723806-06951d33-7d61-4051-b9be-58f1c4db099b.png)
#### ***Aquí tenemos dos opciones, podemos importar la base dogs que fue subida al respositorio pero ahora lo haremos a mano así que seleccionamos SQL para darle las instrucciones correspondientes.***
![image](https://user-images.githubusercontent.com/68208770/182726450-b4bb2404-f349-4c17-9d45-c95588c81944.png)
#### ***Abrimos el documentos "dogs.sql" y copiamos desde la línea 5 hasta el final, lo pegamos en la página y le damos a continuar.***
![image](https://user-images.githubusercontent.com/68208770/182726761-106370bd-5f5b-41cf-83d1-905bbb8a474a.png)

#### ***Una vez hecho esto podemos verificar yendo a la base de datos y selccionando la fila tabla Breeds, deberían aparecer todos los datos.***
![image](https://user-images.githubusercontent.com/68208770/182726942-9c9e4180-7f43-4a12-926e-f3e8e5653d80.png)

#### ***3-Añadir BootStrap***
**Accedemos a:** `https://getbootstrap.com/docs/5.2/getting-started/introduction/`
#### ***Copiamos el código tanto del CSS como del JS y lo añadimos en el head y el body del index.php correspondientemente.***
![image](https://user-images.githubusercontent.com/68208770/182728624-4f9bcba8-e1f5-4d10-bddb-c613be555a63.png)

## 3-Abrir la página y poder visualizar sus archivos:
#### ***Para poder ejecutar la página y crear una debes crear una carpeta en "htdocs", luego guardar los archvos de tu web en esa carpeta la cual puedes trabajar utilizando tu IDE preferido como VStudio o IntelliJ.***
![image](https://user-images.githubusercontent.com/68208770/182731309-89bc5718-fc8f-46f9-8fa6-46d30ab06822.png)



## Explicación del código y su funcionamiento:

### ***conexión.php :***
```
<?php
$servidor = "localhost:3307";
$usuario = "root";
$password = "root";
$db = "dogs";
$conexion = mysqli_connect($servidor, $usuario, $password, $db);
?>
```
**$servidor: sirve para editar la ip donde está almacenada nuestra base de datos, en este caso localhost con el puerto 3307 como indica Xampp.**

**$usuario: sirve para editar el nombre de usuario que ingresa a la base de datos, en este caso root. (este dato se ingresa al instalaxar Xampp).**

**$password: sirve para editar la contraseña con la que ingresa a la base de datos, en este caso root. (este dato se ingresa al instalaxar Xampp).**

**$db: sirve para editar el nombre de la base de datos, en este caso llamada dogs.**

**$conexion: es la variable que realizará la petición de la conexión mediante SQL con las credenciales asignadas por sus variables.**

### ***Index.php :***
```
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
  ```
**El el _nav_ le asignamos la clase navbar con expand-lg para asignar el tamaño de pantalla donde aparecerá y el bg-dark para hacerlo oscuro.**

**En el _li_ "nav-item" podemos agregar _a_ que serán las pantabras en nuestra navbar las cuales con href podemos enviar a otras páginas, en este caso lo dejamos con # para que no reenvíe a ninguna dirección.**

**Por último en el form tenemso una búsqueda input con un button cuyos atributos pueden ser editados en su clase (para más leer la documentación de BootStrap).**
```
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
```
**Creamos un container el cual tendrá toda nuestra Grid con las Cards correspondientes donde visualizaremos a los perros y su raza.**

**Partimos creando una row.**

**Luego ejecutamos el código PHP el cual hace la query a la nuestra base de datos para así obtener un arreglo de los datos almacenado en resultado.**

**creamos un While para que "mientras existan datos haga X cosa".**

**Entonces por cada datos creamos una columna lg-3 y col-6 para que en pantallas medias/grandes se vean 4 columnas y en pequeñas 2.**

**Dentro de ésta creamos una Card con sus estilos en la clase.**

**La carta contiene una imagen y un h5 con el nombre de la raza que serán la variale ImagenURL y Raza, las cuales están en la tabla Breeds de nuestra db.**

```
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
```
**Aquí contenemos el Modal para al momento de hacer click sobre una imagen esta aparezca por el frente.**

**Creamos la clase modal con un contenido y un header vacíos.**

**En el modal-body crearemos la imagen que por defecto obtiene una imagen X (esto no importa porque al final cambiará por cada perro).**

**Por último añadimos el archivo main.js a la página.**

### ***main.js :***
```
document.addEventListener("click",function (e){
    if(e.target.classList.contains("card-img-top")){
    const src = e.target.getAttribute("src");
    document.querySelector(".modal-img") . src = src;
    const myModal = new bootstrap.Modal(document.getElementById('gallery-modal'));
    myModal.show();
    }
})
```
**addEventListener "click" hace que al hacer click éste ejecute un evento.**

**Esto solo pasará sí se le hace click a algo que contenga la clase "card-img-top" (que es la clase de la card con al foto del perro).**

**Luego hará una petición query para cambiar la source de .modal-img que antes hacía referencia a una imagen al azar.**

**Creamos una constante myModal con BootStrap para ubicar por id el nombre de nuestra modal, en este caso "gallery-modal" .**

**Y por último muestra el modal en pantalla con .show() .**

## Visualizar página para trabajar en ella:

**Accedemos a:** `http://localhost/NOMBRE_CARPETA_QUE_HAYAS_CREADO_EN_HTDOCS/index.php`

# Para visualizar la página en producción puedes visitar: `http://galeriadeperros.rf.gd`




