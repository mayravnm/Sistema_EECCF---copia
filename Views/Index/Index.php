 
  <!-- Barra de Navegacion -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
      <a class="navbar-brand " href="">Sistema</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item">
            <!--a class="nav-link " data-toggle="modal" data-target="#ventana2" href="" >Registrarse</a-->
          </li>
          <li class="nav-item">
            <a  class="nav-link " data-toggle="modal" data-target="#ventana3" href="">Contacto</a>
          </li>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<!------------------------------------------------------------------- VENTANA MODAL DE REGISTRAR------------------------------------------------>
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
                        <input type="text" maxlength="8" name="CI" id="CI" class="form-control" placeholder="Cedula" required="" onkeypress=" return solonumeros(event)" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"><span id="verificarci" class="form-check-label"></span>
                        </div>
                        
                        <input type="text" name="Nombre" id="Nombre" class="form-control" placeholder="Nombre" required="" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" onkeypress=" return sololetras(event)">
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
                      </form><br/>
                      <div id="alerta">
                        <img id="loader" src="Views/default/img/loader.gif" height="30" width="30"><span id="mensajes"></span>
                      </div>
                     <!--Footer de la ventana-->
                    <div class="modal-footer">
                      <button type="submit" id="signin" class="btn btn-primary">Registrar</button>
                    </div>
                  </div>
                </div>
              </div>  
          </div>
<!------------------------------------------------------FIN VENTANA MODAL REGISTRAR------------------------------------------------>

<!----------------------------------------------------- PANTALLA GENERAL----------------------------------------------------------->
 <header class="masthead">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="col-lg-10 align-self-end">
          <h1 class="text-uppercase text-white font-weight-bold">NOMBRE DE SISTEMA</h1>
          <hr class="divider my-4">
        </div>
        <div class="col-lg-8 align-self-baseline">
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="#ventana1" data-toggle="modal" >INGRESAR</a>
          <!-- crear ventana modal login-->
          <div class="modal fade" id="ventana1">
            
              <div class="modal-dialog">
                <div class="modal-content">
                  <!--Header de la ventana-->
                  <div class="modal-header">
                   
                    <h4 class="modal-title" >Iniciar sesi&oacute;n</h4
                      >
                  </div>
                  <!--contenido de la ventana-->
                  <div class="modal-body">
                    <form class="" id="Session" name="Session" method="POST">
                      <input type="text" name="Usuariol" id="Usuariol" class="form-control" placeholder="Usuario" required="" 
                     onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" > 
                      <input type="Password" name="Passwordl" id="Passwordl" class="form-control" placeholder="Password" required="" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">
                    </form><br/>
                      <!--Footer de la ventana-->
                    <div class="modal-footer">
                      <button type="submit" id="btnlogn" class="btn btn-primary" >Iniciar sesi&oacute;n</button>
                      
                    </div>
                  </div>
                </div>
              </div>
          </div>
<!------------------------------------------------------------------- VENTANA MODAL DE CONTACTO------------------------------------>
          <div class="modal fade" id="ventana3">
            
              <div class="modal-dialog">
                <div class="modal-content">
                  <!--Header de la ventana-->
                  <div class="modal-header">
                   
                    <h4 class="modal-title" >Contactenos!</h4
                      >
                  </div>
                  <!--contenido de la ventana-->
                  <div class="modal-body">
                    <form class="" id="Session" name="Session" method="POST">
                     
                        <div class="row justify-content-center">
                            <p class="text-muted mb-12">Webmaster: Ing. Jarry Palacios</p>
                        
                        </div>
                        <div class="row justify-content-center">
                          <div class="col-lg-6 ml-auto text-center">
                            <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                            <div>0276-7628833 / 0416-1738065</div>
                          </div>
                          <div class="col-lg-6 mr-auto text-center">
                            <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                            <a class="d-block" href="mailto: jpalacios@palaciossystems.com"> jpalacios@palaciossystems.com</a><br>
                         </div>
                        </div>
                      
                    </form>
                     <!--Footer de la ventana-->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                      
                    </div>
                  </div>
                </div>
              </div>
          </div>
<!-----------------------------------------------------------------FIN VENTANA MODAL DE CONTACTO---------------------------------->
        </div>
      </div>
    </div>
  </header>
  <script>
    
    //comparar password y usuario
  $(document).ready(function(){
    $('#Password2').keyup(comparapassword2); 
    $('#Password').keyup(comparapassword2); 
    $('#Usuario').keyup(verificarusuario);
    $('#CI').keyup(verificarci); 

  });


   //script para loguearse
    $(function(){
      $("#btnlogn").click(function(){
        var Usuario = $('form[name=Session] input[name=Usuariol]')[0].value;
        var Password = $('form[name=Session] input[name=Passwordl]')[0].value;
            if (Usuario==""){
              alertify.error("Ingresar Usuario");
              return false;
            }else if (Password==""){
              alertify.error("Ingresar Contraseña");
              return false;
            }else{
              $.ajax({
              type:"POST",
              url:"<?php echo URL;?>UsuarioEDC/userlogin",
             data:{Usuario: Usuario,Password: Password},
              success: function(response){
                if (response==1) {
                  document.location ="<?php echo URL; ?>Principal/principal";
                  
                }else if (response==2) {
                
                  document.location ="<?php echo URL; ?>Principal/usuario";
                }else{
                  alertify.error("Usuario o contraseña incorrecta");
                 
              }
            }
          });
          return false;
          }
      });
    });
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



//comparar password
  function comparapassword2(){
    var repeatpass= document.getElementById('Password2').value;
    var repeatclave= repeatpass.length;
    if (repeatclave>0) {
      var Contraseña= $('#Password').val();
      var confirmar= $('#Password2').val();
      if (Contraseña != confirmar) {
        $('#verificarpassword').html('<img src="Views/default/img/incorrecto.png" height="30" width="35">');
        document.getElementById('signin').disabled=true;
      }else{
        $('#verificarpassword').html('<img src="Views/default/img/check-icon.jpg" height="35" width="40"> ');
        document.getElementById('signin').disabled=false;
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
        $('#verificarusuario').html('<img src="Views/default/img/incorrecto.png" height="30" width="35">');
        document.getElementById('signin').disabled=true;
      }else if (response.trim()=="2"){
        $('#verificarusuario').html('<img src="Views/default/img/check-icon.jpg" height="35" width="40"> ');
        document.getElementById('signin').disabled=false;
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
         $('#verificarci').html('<img src="Views/default/img/incorrecto.png" height="30" width="35">');
          document.getElementById('signin').disabled=true;
      }else if (response.trim()=="2"){
        $('#verificarci').html('<img src="Views/default/img/check-icon.jpg" height="35" width="40"> ');
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
                  }else{
                    $.ajax({
                    type:"POST",
                    url:"<?php echo URL;?>UsuarioEDC/signIn",
                    data:{CI: CI,Nombre: Nombre,Apellido: Apellido,CodigoSAP: CodigoSAP,Usuario: Usuario,Password: Password},
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
                        alertify.error("La Cedula de Identidad o el Usuario ya esta registrado");

                      }
                    }
                  });
                  return false;
                  }
                });
    });

  </script>

  


