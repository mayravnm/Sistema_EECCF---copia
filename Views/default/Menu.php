<div id="wrapper"><!--contenido de la pagina-->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar"><!--barra lateral-->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="javascript:cargar_pagina('Principal/Principal')"><!--Logo del sistema-->
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SISTEMA</div>
      </a><!--Logo del sistema-->

    <hr class="sidebar-divider my-0"><!--Barra de division-->

    <li class="nav-item active"><!--Inicio-->
        <a class="nav-link" href="<?php echo URL; ?>Principal/principal">
          <i class="fas fa-fw fa-igloo"></i>
          <span>Inicio</span></a>
      </li> <!--FIN de Inicio-->

    <hr class="sidebar-divider"><!--Barra de division-->

    <!--MENU-------------------------------------------------------------------------------------------------------------------->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#usuarios" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-check"></i>
          <span>Usuarios</span>
        </a>
        <div id="usuarios" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="javascript:cargar_pagina('Usuario/presenta')">Listado</a>
          </div>
        </div>
      </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-check"></i>
          <span>Estacion</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo URL; ?>EDC/listar" >Listado</a>
          </div>
        </div>
      </li>

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

  </ul> <!-- Fin barra lateral-->
  <!-- FIN MENU-------------------------------------------------------------------------------------------------------------------->
  
  <!-- MOSTRAR INFORMACION------------------------------------------------------------------------------------------------------------->
  <div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
      <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow"><!-- Barra Superior-->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
          </button>
        <ul class="navbar-nav ml-auto">
       <div class="topbar-divider d-none d-sm-block"></div><!-- Division para el usuario-->
       <li class="nav-item dropdown no-arrow"><!-- Logo para el usuario y logout-->
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php 
                    Error_reporting(E_ALL ^ E_NOTICE); //eliminar notificaciones
                    session::start();
                    $username = session::getsession("User");
                    //$rol = session::getrol("rol");



                    if ($username != "") { ?> <!--llave abierta-->
                    
                     
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?php echo $username; ?></span>

                <?php  }  ?> <!--llave cerrada-->
                <img class="img-profile rounded-circle" src="../Views/default/img/avatar.jpg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item"  href="#" data-toggle="modal" data-target="#modalCpassusua" >
                  <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cambiar Contraseña
                </a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
          </li><!-- FIN Logo para el usuario y logout-->
        </ul>
      </nav><!-- FIN Barra Superior-->
    <!--------------------------------- Agregar toda la informacon----------------------------------------------------------------->
    <div class="container-fluid">




















    </div>

<!--------------------------------- FIN de Agregar toda la informacon----------------------------------------------------------------->
    </div>
    <script>
    
    function cargar_pagina(vista){
        $.ajax({
            type:"POST",
            url:"<?php echo URL;?>/"+vista,
            success: function(response){
                $("#pcontenedor").html(response);
            }
        });
    }

</script>