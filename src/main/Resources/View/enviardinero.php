<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>REALIZA ENVÍO | WESTER INKA</title>
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap/css/bootstrap-grid.min.css" rel="stylesheet">
        <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> 

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="intranet/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="intranet/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contáctenos</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

    
      
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Realizar Envío</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    
      <div class="container-fluid">
        
          <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">CONVERSOR DE MONEDAS</h3>
              </div>
              
              <div class="card-body">
                  <div class="form-group">
                    <label for="moneda_de_envio">Moneda de Envío:</label>
                     <select name="moneda_de_envio" id="moneda_de_envio" class="form-select" onchange="actualizarTipoCambio()">
                     <?php require_once '../../PHP/Functions/ListarPaises.php'; ?>
                     </select>
                    <label for="nombre_pais">País de Destino:</label>
                     <select name="nombre_pais" id="nombre_pais" class="form-select" onchange="actualizarTipoCambio()">
                     <?php require_once '../../PHP/Functions/ListarMonedaPaises.php'; ?>
                     </select>   
                    <label id="tipoCambioLabel"></label>
                     <input type="hidden" id="id_paises" name="id_paises"> <br><br>

                    <label for="cantidadEnvio">Cantidad a Enviar:</label>
                    <input type="number" id="cantidadEnvio" name="cantidadEnvio" class="form-control"><br>
                    <button type="button" id="calcularBtn" class="btn btn-primary" onclick="calcularEnvio()">Calcular</button>   
                  </div>
                  
                  <div class="form-check">
                      <label class="result-label" for="cantidadRecibida">Cantidad Recibida:</label>
                     <input type="text" id="cantidadRecibida" name="cantidadRecibida" class="result-input" readonly>

                    <label class="result-label" for="comision">Comisión 10%:</label>
                     <input type="text" id="comision" name="comision" class="result-input" readonly>

                    <label class="result-label" for="total">Total a Pagar:</label>
                     <input type="text" id="total" name="total" class="result-input" readonly>
                      
                  </div>
              </div>
           </div>
           <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-JfK3jD0zL/wmx0D3HhpibNhj5gO+1bYfOBFC+ftaW7rXH2jI6Hy/aI3axfR5NskW" crossorigin="anonymous"></script> 
            
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">DATOS DEL BENEFICIARIO</h3>
              </div>
              <div class="card-body">
                    <div class="form-group">
                    <label for="nombres">Nombres</label>
                    <input type="nombres" class="form-control" id="nombres">
                    <label for="apellidos">Apellidos</label>
                    <input type="apellidos" class="form-control" id="apellidos">
                    </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">El cliente aceptó los términos y condiciones</label>
                  </div>
              </div>
            
            
            </div>
          
          
          <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">DATOS DEL REMITENTE</h3>
              </div>
              <div class="card-body">
                    <div class="form-group">
                    <label for="nombres">Nombres</label>
                    <input type="text" class="form-control" id="nombres">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos">
                    </div>
              </div>
            
            <div class="card-body">
                    <div class="form-group">
                    <label for="departamento">Departamento</label>
                    <input type="text" class="form-control" id="departamento">
                    <label for="distrito">Distrito</label>
                    <input type="text" class="form-control" id="distrito">
                    <label for="provincia">Provincia</label>
                    <input type="text" class="form-control" id="provincia">
                    <label for="celular">Celular</label>
                    <input type="text" class="form-control" id="celular">
                    </div>
            </div>

            
            </div>
            
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">DOCUMENTO DE IDENTIFICACIÓN</h3>
              </div>
              <div class="card-body">
                    <div class="form-group">
                    <label for="tipo_doc">Tipo de documento</label>
                    <input class="form-select" id="tipo_doc" onchange="listadocumentos()>
                    <?php require_once '../../PHP/Functions/ListarDocumento.php'; ?>
                    <label for="num_doc">Número de documento</label>
                    <input type="text" class="form-control" id="num_doc">
                    </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Yo, el agente representante, he verificado la información del cliente</label>
                  </div>
              </div>
            
            <div class="card-body">
                    <div class="form-group">
                    <label for="fec_nac">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="fec_nac">
                    <label for="fec_cad">Fecha de Caducidad</label>
                    <input type="date" class="form-control" id="fec_cad">
                    <label for="fec_emi">Fecha de emisión</label>
                    <input type="date" class="form-control" id="fec_emi">
                    </div>
            </div>

            <div class="card-body">
                    <div class="form-group">
                    <label for="ocupacion">Ocupación</label>
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" name="ocupacion" id="ocupacion">Por favor seleccione</button><br>
                    </div>
                    <div class="form-group">
                    <label for="relacion">Relación con el Destinatario</label>
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" name="relacion" id="relacion">Por favor seleccione</button><br>
                    </div>
                    <div class="form-group">
                    <label for="motivo">Motivo de la transacción</label>
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" name="motivo" id="motivo">Por favor seleccione</button><br>
                    </div>
                    <div class="form-group">
                    <label for="pais_nac">País de Nacimiento</label>
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" name="pais_nac" id="pais_nac">Por favor seleccione</button><br>
                    </div>
                    </div>
            </div>
            
            
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">DATOS DEL BENEFICIARIO</h3>
              </div>
              <div class="card-body">
                    <div class="form-group">
                    <label for="nom_ben">Nombres</label>
                    <input type="text" class="form-control" id="nom_ben">
                    <label for="ape_ben">Apellidos</label>
                    <input type="text" class="form-control" id="ape_ben">
                    </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">El cliente aceptó los términos y condiciones</label>
                  </div>
              </div>
            
            
            </div>
          </div>
         
        </div>
    
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2024 <a href="https://www.westernunion.com/pe/en/home.html">WesternUnion</a>.</strong> Derechos reservados y autorizados
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="intranet/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="intranet/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="intranet/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="intranet/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="intranet/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
