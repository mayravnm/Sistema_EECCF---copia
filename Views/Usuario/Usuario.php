<?php
$username = session::getsession("User");
$rol = session::getrol("rol"); 
?>

<div id="page-wrapper">
    <div id="page-inner">
<h1 class="h3 mb-2 text-gray-800">Listado de Usuarios</h1> <!--Titulo del cuerpo de la pagina-->  
    <div class="card shadow mb-4"><!--Tabla-----------------------------> 
      <div class="card-header py-12"> <!--pertenece a tabla--BUTTON PARA REGISTRAR USUARIOS---------------------------> 
        <?php if ($rol=="ADMINISTRADOR") {?>
          <div class="d-sm-flex align-items-center justify-content-between mb-4"><!--DIV PARA BOTONES-------------------------------->
          <a   class="btn btn-primary"  data-toggle="modal" data-target="#ventana2" href=""  >Registrar nuevo usuario</a>
          <a href=" <?php echo URL.'Usuario/pdf'?> " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> PDF</a>
         </div><!-- FIN DIV PARA BOTONES-------------------------------->
        <?php  } ?>

          <!--------------------------------------contenido de la ventana modal REGISTRAR ------------------------------------------------------->
          <div class="modal fade" id="ventana2">
            <div class="modal-dialog">
                <div class="modal-content">
                  <!--Header de la ventana-->
                  <div class="modal-header">
                   
                    <h4 class="modal-title" >Registrarse</h4
                      >
                  </div>
                  <div class="modal-body">
                    <form class="" id="registrar" name="registrar" method="POST"  onpaste="return false">
                      <div class="input-group">
                        <input type="text"   maxlength="8" name="CI" id="CI" class="form-control" placeholder="Cedula" required="" onkeypress=" return solonumeros(event)" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"><span id="verificarci" class="form-check-label"></span>
                        </div>
                        
                        <input type="text" name="Nombre" id="Nombre" class="form-control" placeholder="Nombre" required=""  onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" onkeypress=" return sololetras(event)">
                        <input type="text" name="Apellido" id="Apellido" class="form-control" placeholder="Apellido" required="" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" onkeypress=" return sololetras(event)">
                        <div class="Form-group"><!--div del combobox-->
                          <select class="form-control" id="cbocodigosap" name="cbocodigosap" required="" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" >
                               <?php
                               $json= file_get_contents(URL."EDC/listado");
                                $datos = json_decode($json);
                                echo "<option value='S'>Codigo SAP</option>";
                                foreach($datos as $ledc){
                                echo "
                                  <option value='$ledc->CodigoSAP'>$ledc->NombreEDC</option>";
                                } 
                                ?>
                               
                          </select>
                          </div><!--/div del combobox-->
                        <div class="input-group">
                        <input type="text" name="Usuario" id="Usuario" class="form-control" placeholder="Usuario" required="" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" ><span id="verificarusuario" class="form-check-label"></span></div>
                        <div id="contar"></div>
                        <input type="Password" name="Password" id="Password" class="form-control" placeholder="Contraseña" required="" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" >
                        <div class="input-group">
                        <input type="Password" name="Password2" id="Password2" class="form-control" placeholder="Repetir Contraseña" required="" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" ><span id="verificarpassword" class="form-check-label"></span></div>
                        <select class="form-control" id="Privilegio" name="Privilegio"   required="" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" >
                               <option value="S">Nivel de Acceso</option>
                               <option value="ADMINISTRADOR">Administrador</option>
                               <option value="USUARIO">Usuario</option>
                               
                          </select>
                      </form><br/>
                      <div id="alerta">
                        <img id="loader" src="../Views/default/img/loader.gif" height="30" width="30"><span id="mensajes"></span>
                      </div>
                     <!--Footer de la ventana-->
                    <div class="modal-footer">
                      <button type="submit" id="signin" class="btn btn-primary">Registrar</button>
                    </div>
                  </div>
                </div>
              </div>  
          </div>
<!--------------------------------------Fin de la ventana modal REGISTRAR -------------------------------------------------------> 

<!----------------------------------------------TABLA DE USUARIOS ---------------------------------------------------------------> 
      <div class="card-body">
              <div class="table-responsive">
                <div>
                  <table id="tablausua" class=" display table table-striped table-hover" >
        <thead >
            <tr>
                <th>CI</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Estacion</th>
                <th>Usuario</th>
                <th>Perfil</th>
                <?php if ($rol=="ADMINISTRADOR") {
                echo "<th>Opciones</th>";
                } ?>
            </tr>
        </thead>
        <tbody>
           <?php
                        $json  = file_get_contents(URL."Usuario/listado");
                        $datos = json_decode($json);
                        foreach($datos as $usua){
                            echo "<tr>
                            <td> ". $usua->CI."</td>
                            <td> ". $usua->Nombre."</td>
                            <td> ". $usua->Apellido."</td>
                            <td> ". $usua->NombreEDC."</td>
                            <td> ". $usua->Usuario."</td>
                            <td> ". $usua->Privilegio."</td>";
                            if ($rol=="ADMINISTRADOR") {
                             echo" 
                            <td>
                              <button  class='btn btn-primary'  title='Editar'  onclick='javascript:verventanamodalEditar($usua->CI)'> <span class='fas fa-fw fa-edit'></span> </button>
                              <button  class='btn btn-primary'  title='Cambiar Password'  onclick='javascript:verventanamodalCpass($usua->CI)'> <span class='fas fa-fw fa-key'></span> </button>
                              <button class='btn btn-primary' title='Eliminar'  onclick='javascript:preguntar($usua->CI)'"; if ($username==$usua->Usuario) { echo "disabled";} echo " > <span class='fas fa-fw fa-trash'></span> </button>

                            </td>
                            </tr>";
                            }
                      }
            ?>
        </tbody>

    </table>
              </div>
            </div>
          </div> 

<!----------------------------------------------FIN TABLA DE USUARIOS ---------------------------------------------------------------> 





<!------------------------------------------------VENTANA MODAL EDITAR --------------------------------------------------------------->         
<div class="modal fade" id="modaleditar">
            <div class="modal-dialog">
              <div class="modal-content">
                <!--Header de la ventana-->
                <div class="modal-header">
                  <h4 class="modal-title" >Editar Usuario</h4>
                </div>
                <!--contenido de la ventana-->
                <div class="modal-body">
                  <form class="" id="registrare" name="registrare" method="POST">
                    <input type="hidden" name="eCI" id="eCI" class="form-control" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" >
                      Nombre <input type="text" name="eNombre" id="eNombre" class="form-control" placeholder="Nombre" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" >
                      Apellido<input type="text" name="eApellido" id="eApellido" class="form-control" placeholder="Apellido" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" >
                      <input type="hidden" name="eCodigoSAP" id="eCodigoSAP" class="form-control" placeholder="Codigo SAP" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">
                      Usuario
                      <div class="input-group" >
                      <input type="text" name="eUsuario" id="eUsuario" class="form-control" placeholder="Usuario" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"><span id="verificarusuarioe" class="form-check-label"></span>
                    </div>
                      
                  </form><br/>
                   <div id="alerta">
                        <img id="loade" src="../Views/default/img/loader.gif" height="30" width="30"><span id="mensaje"></span>
                  </div>
                </div>
                <!--Footer de la ventana-->
                <div class="modal-footer">
                  <button type="submit" id="Actualizadatos" class="btn btn-primary" onclick="edita_usuario()" >Actualizar</button>
                  
                </div>
              </div>
            </div>
          </div>

<!---------------------------------------------FIN VENTANA MODAL EDITAR -------------------------------------------------------------->

<!------------------------------------------------VENTANA MODAL CAMBIAR PASSWORD ------------------------------------------------------>         
<div class="modal fade" id="modalCpass">
            <div class="modal-dialog">
              <div class="modal-content">
                <!--Header de la ventana-->
                <div class="modal-header">
                  <h4 class="modal-title" >Cambiar Password</h4>
                </div>
                <!--contenido de la ventana-->
                <div class="modal-body">
                  <form class="" id="Cpass" name="Cpass" method="POST">
                      <input type="Password" name="cPassword" id="cPassword" class="form-control" placeholder="Nueva Contraseña" required="" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" >
                        <div class="input-group">
                        <input type="Password" name="cPassword2" id="cPassword2" class="form-control" placeholder="Repetir Contraseña" required="" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" ><span id="verificarpasswordc" class="form-check-label"></span></div>
                      
                  </form><br/>
                  <div id="alerta">
                        <img id="loaderc" src="../Views/default/img/loader.gif" height="30" width="30"><span id="mensajec"></span>
                  </div>
                </div>
                <!--Footer de la ventana-->
                <div class="modal-footer">
                  <button type="submit" id="cpass" class="btn btn-primary" onclick="cambia_passwd()" >Guardar</button>
                  
                </div>
              </div>
            </div>
          </div>

<!---------------------------------------------FIN VENTANA MODAL CAMBIAR PASSWORD -------------------------------------------------------->

     </div><!--pertenece a tabla--FIN BUTTON PARA REGISTRAR USUARIOS---------------------------> 



    </div><!--FIN de Tabla----------------------------->
  </div><!--------Pagina inner----------------------->
</div><!--------Pagina Wrapper----------------------->


<script type="text/javascript">
  //ingresar solo numeros
  function solonumeros(e){
    key=e.keycode || e.which;
    teclado= String.fromCharCode(key);
    numeros="0123456789";
    especiales="8-37-38-46";
    teclado_especial=false;
    for(var i in especiales){
      if (key==especiales[i]) {
        teclado_especial=true;
      }
    }
    if(numeros.indexOf(teclado)==-1 && !teclado_especial){
      return false;
    }

  }

    //ingresar solo letras
  function sololetras(e){
    key=e.keycode || e.which;
    teclado= String.fromCharCode(key);
    letras= "abcdefghijklmnñopqrstuvwxyz";
    especiales="8-37-38-46";
    teclado_especial=false;
    for(var i in especiales){
      if (key==especiales[i]) {
        teclado_especial=true;
      }
    }
    if(letras.indexOf(teclado)==-1 && !teclado_especial){
      return false;
    }
  }

//comparar password y usuario
  $(document).ready(function(){
    $('#Password2').keyup(comparapassword2); 
    $('#Password').keyup(comparapassword2); 
    $('#Usuario').keyup(verificarusuario);
    $('#eUsuario').keyup(verificarusuario);
    $('#CI').keyup(verificarci);
    $('#cPassword2').keyup(cambiarpassword); 
    $('#cPassword').keyup(cambiarpassword);  
   


  });

//comparar password
  function comparapassword2(){
    var repeatpass= document.getElementById('Password2').value;
    var repeatclave= repeatpass.length;
    if (repeatclave>0) {
      var Contraseña= $('#Password').val();
      var confirmar= $('#Password2').val();
      if (Contraseña != confirmar) {
        $('#verificarpassword').html('<img src="../Views/default/img/incorrecto.png" height="30" width="35">');
        document.getElementById('signin').disabled=true;
      }else{
        $('#verificarpassword').html('<img src="../Views/default/img/check-icon.jpg" height="35" width="40"> ');
        document.getElementById('signin').disabled=false;
      }
    }
  }

  //comparar password cambiar
  function cambiarpassword(){
    var repeatpass= document.getElementById('cPassword2').value;
    var repeatclave= repeatpass.length;
    if (repeatclave>0) {
      var Contraseña= $('#cPassword').val();
      var confirmar= $('#cPassword2').val();
      if (Contraseña != confirmar) {
        $('#verificarpasswordc').html('<img src="../Views/default/img/incorrecto.png" height="30" width="35">');
        document.getElementById('cpass').disabled=true;
      }else{
        $('#verificarpasswordc').html('<img src="../Views/default/img/check-icon.jpg" height="35" width="40"> ');
        document.getElementById('cpass').disabled=false;
      }
    }
  }

  //verificar usuario
 function verificarusuario(){
    var Usuario=$(this).val();
    var usua= Usuario.length;

    $.ajax({
     type: "POST",
     url: "<?php echo URL;?>Usuario/validarusuario",
     data: 'Usuario='+Usuario, 
     success: function (response){
      if (usua<5) {
        $('#contar').html('<div class="fa fa-exclamation-triangle"> Debe ingresar min 5 caracteres</div>').fadeOut(5000);
        document.getElementById('signin').disabled=true;
        }else if(response.trim()=="1"){
        $('#verificarusuario').html('<img src="../Views/default/img/incorrecto.png" height="30" width="35">');
        $('#verificarusuarioe').html('<img src="../Views/default/img/incorrecto.png" height="30" width="35">');
        document.getElementById('signin').disabled=true;
        document.getElementById('Actualizadatos').disabled=true;
      }else if (response.trim()=="2"){
        $('#verificarusuario').html('<img src="../Views/default/img/check-icon.jpg" height="35" width="40"> ');
        $('#verificarusuarioe').html('<img src="../Views/default/img/check-icon.jpg" height="35" width="40"> ');
        document.getElementById('signin').disabled=false;
        document.getElementById('Actualizadatos').disabled=false;
      }

      }
    });
  }
    


    //verificar cedula
 function verificarci(){
    var CI=$(this).val();
    $.ajax({
     type: "POST",
     url: "<?php echo URL;?>Usuario/validarci",
     data: 'CI='+CI, 
     success: function (response){
      if(response.trim()=="1"){
         $('#verificarci').html('<img src="../Views/default/img/incorrecto.png" height="30" width="35">');
          document.getElementById('signin').disabled=true;
      }else if (response.trim()=="2"){
        $('#verificarci').html('<img src="../Views/default/img/check-icon.jpg" height="35" width="40"> ');
        document.getElementById('signin').disabled=false;
      }

      }
    });
  }


  //Registrar Usuario
  $(function(){
                $("#signin").click(function(){
                  var CI   =  document.getElementById("CI").value.trim();
                  var Nombre   = document.getElementById("Nombre").value.trim();
                  var Apellido   = document.getElementById("Apellido").value.trim();
                  var CodigoSAP   = document.getElementById("cbocodigosap").value.trim();
                  var Usuario   = document.getElementById("Usuario").value.trim();
                  var Password   = document.getElementById("Password").value.trim();
                  var Password2   = document.getElementById("Password2").value.trim();
                  var Privilegio   = document.getElementById("Privilegio").value.trim();
                      
                  if (CI=="") {
                    alertify.error("Ingresar Cedula");
                    return false;
                  }else if (Nombre==""){
                    alertify.error("Ingresar Nombre");
                    return false;
                  }else if (Apellido==""){
                    alertify.error("Ingresar Apellido");
                    return false;
                  }else if (CodigoSAP=="S"){
                    alertify.error("Ingresar Estacion");
                    return false;
                  }else if (Usuario==""){
                    alertify.error("Ingresar Usuario");
                    return false;
                  }else if (Password==""){
                    alertify.error("Ingresar Contraseña");
                    return false;
                  }else if (Password2==""){
                    alertify.error("Confirmar Contraseña");
                    return false;
                  } else if (Privilegio=="S"){
                    alertify.error("Ingresar Nivel de Acceso");
                    return false;
                  
                  }else{
                    $.ajax({
                    type:"POST",
                    url:"<?php echo URL;?>UsuarioEDC/signIn",
                    data:{CI: CI,Nombre: Nombre,Apellido: Apellido,CodigoSAP: CodigoSAP,Usuario: Usuario,Password: Password,Privilegio: Privilegio},
                    beforeSend: function(){
                      $('#loader').show();
                      $('#mensajes').html('Guardando Registro...');
                    } ,
                    success: function(response){
                        if (response==1) {
                         $('#loader').hide();
                        $('#mensajes').html(alertify.success("Usuario registrado con exito"));
                        document.location ="javascript:cargar_pagina('Usuario/presenta')";
                      }else{
                        alertify.error("La Cedula debe tener como minimo 7 digitos");


                      }
                    }
                  });
                  return false;
                  }
                });
    });

    

    //script para editar datos
   function verventanamodalEditar(CI){
    
      $.ajax({
      type:"POST",
      url:"<?php echo URL;?>Usuario/consultedit",
      data:{CI:CI},
      success:function(response){
        var xdata = response.split("#");
               
          $("#eCI").val(xdata[1]);
          $("#eNombre").val(xdata[2]);
          $("#eApellido").val(xdata[3]);
          //$('#eCodigoSAP').val(xdata[4]);
          $('#eUsuario').val(xdata[5]);
          //$('#ePassword').val(xdata[6]);

         
         } 
      });
         $("#modaleditar").modal("show");
       
    }

    //script para cambiar password
    function verventanamodalCpass(CI){
      $("#modalCpass").modal("show");
      cambia_passwd=function(){
        var Password= document.getElementById("cPassword").value.trim();
        var Password2= document.getElementById("cPassword2").value.trim();
        if (Password=="") {
          alertify.error("Debe ingresar contraseña nueva");
        }else if (Password2=="") {
          alertify.error("Debe confirmar contraseña nueva");
        }else{
          $.ajax({
            type:"POST",
            url:"<?php echo URL;?>Usuario/actualizarpasswd",
            data:{CI:CI,
                  Password:Password,
                  Password2:Password2},
            beforeSend: function(){
                      $('#loaderc').show();
                      $('#mensajec').html('Actualizando contraseña...');
                    } ,
            success:function(response){
              if (response==1) {
                  $('#loaderc').hide();
                  $('#mensajec').html(alertify.success("Contraseña actualizada con exito"));
                    document.location ="javascript:cargar_pagina('Usuario/presenta')";
              }else{
                  alertify.error("Error al actualizar contraseña");
              }
            }
          });
        }
      }
    }

    //actualizar datos
    edita_usuario = function(){
    var xCI   = document.getElementById("eCI").value.trim();
    var xNombre   = document.getElementById("eNombre").value.trim();
    var xApellido = document.getElementById("eApellido").value.trim();
    var xCodigoSAP  = document.getElementById("eCodigoSAP").value.trim();
    var xUsuario    = document.getElementById("eUsuario").value.trim();

     if (xNombre==""){
        alertify.error("Ingresar Nombre");
        return false;
      }else if (xApellido==""){
        alertify.error("Ingresar Apellido");
        return false;
      }else if (xUsuario==""){
        alertify.error("Ingresar Usuario");
        return false;
     
      }else{
        
        $.ajax({
            type:"POST",
            url:"<?php echo URL;?>Usuario/actualizar",
            data:{CI:xCI,
                  Nombre:xNombre,
                  Apellido:xApellido,
                  Usuario:xUsuario},
            beforeSend: function(){
                      $('#loade').show();
                      $('#mensaje').html('Actualizando Registro...');
                    } ,
            success:function(response){

                if(response.trim()=="1"){
                    alertify.success("Registro Actualizado Correctamente...");
                    document.location ="javascript:cargar_pagina('Usuario/presenta')";

                }else{
                  alertify.alert("Error de Actualización de Datos...");
                }
            }
        });
    }
   }


    // eliminar datos
    preguntar = function(CI){
      alertify.confirm("<p>Desea Eliminar Usuario.", function (e) {
            if (e) {
                 
                 $.ajax({
                 type:"POST",
                url:"<?php echo URL;?>Usuario/eliminar",
                data:{CI:CI},
                success:function(response){
                if(response.trim()=="1"){
                    alertify.success("Usuario Eliminado Correctamente!");
                    //document.location ="<?php echo URL; ?>Usuario/presenta";
                }
            }
        });
            } else { 
                        alertify.error("Cancelado");
            }
      }); 
      return false
    }
    
$(document).ready(function() {
    $('#tablausua').DataTable({
      "lengthMenu": [[5, 10, 10, -1], [5, 10, 20, "All"]], 
      "language": {
                 "sProcessing":     "Procesando...",
                  "sLengthMenu":     "Mostrar _MENU_ registros",
                  "sZeroRecords":    "No se encontraron resultados",
                  "sEmptyTable":     "Ningún dato disponible en esta tabla",
                  "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                  "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                  "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                  "sInfoPostFix":    "",
                  "sSearch":         "Buscar:",
                  "sUrl":            "",
                  "sInfoThousands":  ",",
                  "sLoadingRecords": "Cargando...",
                  "oPaginate": {
                      "sFirst":    "Primero",
                      "sLast":     "Último",
                      "sNext":     "Siguiente",
                      "sPrevious": "Anterior"
                  },
                  "oAria": {
                      "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                  }
            }
    });
} );
   

 



</script>

