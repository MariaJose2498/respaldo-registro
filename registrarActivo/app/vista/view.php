<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GESTION DE ACTIVOS DEL ESTADIO </title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
      <style>
        body {
            background-image: url('assets/img/unnamed.webp');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }
      </style>
        
</head>
<body>

<div class="container">
  <?php if(isset($mensaje)) { ?>
    <div class="alert alert-info alert-dismissible fade show" role="alert">
      <?php echo $mensaje; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php } ?>

  <?php if(isset($editar_activo)){ ?>
    <div class="row text-center d-flex justify-content-center">
      <div class="col-md-6 card">
        <div class="card-header">
          <h1>Editar Solicitud</h1>
        </div>
        <div class="card-body">
          <form method="POST">
            <div class="modal-body d-flex flex-column gap-4">
              <input class="form-control" type="text" name="nombre" placeholder="Nombre del Activo " value="<?php echo $editar_activo['nombre']?>">
              <input class="form-control" type="text" name="descripcion" placeholder="Descripcion del Activo con Caracteristica" value="<?php echo $editar_activo['descripcion']?>">
              <select class="form-control" name="tipo">
                <option value="" selected hidden>Seleccionar tipo</option>
                <option value="Equipo">Equipo</option>
                <option value="Herramienta">Herramienta</option>
                <option value="Otro">Otro</option>
              </select>
               <select class="form-control" name="estado">
                <option value="" selected hidden>Seleccionar Estado</option>
                <option value="Disponible">Disponible</option>
                <option value="No Disponible">No disponible</option>
                <option value="En Mantenimiento">En Mantenimiento</option>
              </select>
              
              <div class="d-flex gap-2">
                <button type="submit" class="btn btn-secondary">Cancelar</button>
                <button type="submit" class="btn btn-success" name="editar" value="<?php echo $editar_activo['id_activo']?>">Editar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <?php }else{ ?>
    

    <div class="card mt-5">
      <div class="card-head">
        <h1 class="text-center">GESTION DE ACTIVOS DEL ESTADIO </h1>
      </div>
      <div class="card-body">
        <button type="button" class="btn btn-primary my-2" data-bs-toggle="modal" data-bs-target="#formulario_activo">
          Registrar activo
        </button>
        <div class="table-responsive">
          <table class="table table-hover table-striped text-center table-bordered">
            <thead>
              <tr>
                <th>Id del activo</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Tipo</th>
                <th>Estado del activo</th>
                
              </tr>
            </thead>
            <tbody>
              <form method="POST">
                <?php if(isset($activos)) { foreach ($activos as $item) { ?>
                  <tr>
                    <td> <?php echo $item['id_activo'] ?> </td>
                    <td> <?php echo $item['nombre'] ?> </td>
                    <td> <?php echo $item['descripcion'] ?> </td>
                    <td> <?php echo $item['tipo'] ?> </td>
                    <td> <?php echo $item['estado'] ?> </td>

                    <td>
                      <button class="btn btn-success" title="editar" type="submit" name="seleccion" value="<?php echo $item['id_activo'] ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                          <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                          <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                        </svg>
                      </button>
                      <button class="btn btn-danger" title="Eliminar" type="submit" name="eliminar" value="<?php echo $item['id_activo'] ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                          <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                        </svg>
                      </button>
                    </td>
                  </tr>
                <?php }}else{ ?>
                  <tr>
                    <td colspan="6"><h2>No se registro correctamente el activo :</h2> </td>
                  </tr>
                <?php } ?>
              </form>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  <?php } ?>

  <!-- Modal -->
  <div class="modal fade" id="formulario_activo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Registro</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST">
          <div class="modal-body d-flex flex-column gap-4"> 
            <input class="form-control" type="text" name="nombre" placeholder="nombre" required>
            <input class="form-control" type="text" name="descripcion" placeholder="descripcion" required>
            <select class="form-control" name="tipo">
              <option value="" selected hidden>Seleccionar tipo</option>
              <option value="Equipo">Equipo</option>
              <option value="Herramienta">Herramienta</option>
              <option value="Otro">Otro</option>
            </select>
            <select class="form-control" name="estado">
                <option value="" selected hidden>Seleccionar Estado</option>
                <option value="Disponible">Disponible</option>
                <option value="No Disponible">No disponible</option>
                <option value="En Mantenimiento">En Mantenimiento</option>
              </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
            <button type="submit" class="btn btn-primary" name="enviar">REGISTRAR</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="assets\bootstrap\js\bootstrap.bundle.min.js"></script>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 


