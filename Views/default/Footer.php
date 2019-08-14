<!-- Footer -->
  <footer class="bg-light py-5">
    <div class="container">
      <div class="small text-center text-muted">Palacios System</div>
    </div>
   </footer>
<!-- Footer -->
   
  </div>

  </div><!--contenido de la pagina-->

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Quieres cerrar sesion</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
          <a class="btn btn-primary" href=" <?php echo URL; ?>UsuarioEDC/destroysession">Si</a>
        </div>
      </div>
    </div>
  </div>

  <!------------------------------------------------VENTANA MODAL CAMBIAR PASSWORD ------------------------------------------------------>         
<div class="modal fade" id="modalCpassusua" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <!--Header de la ventana-->
                <div class="modal-header">
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  </button>
                </div>
                <!--contenido de la ventana-->
                <div class="modal-body">
                  <form class="" id="Cpass" name="Cpass" method="POST">
                      <input type="Password" name="cPassword" id="cPassword" class="form-control" placeholder="Nueva Contraseña" required="" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" >
                        <div class="input-group">
                        <input type="Password" name="cPassword2" id="cPassword2" class="form-control" placeholder="Repetir Contraseña" required="" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" ><span id="verificar" class="form-check-label"></span></div>
                      
                  </form><br/>
                  <div id="alerta">
                        <img id="loaderc" src="../Views/default/img/loader.gif" height="30" width="30"><span id="mensajec"></span>
                  </div>
                </div>
                <!--Footer de la ventana-->
                <div class="modal-footer">
                  <button type="submit" id="passwdusua" class="btn btn-primary" onclick="cambia_passwdusua()" >Guardar</button>
                  
                </div>
              </div>
            </div>
          </div>

<!---------------------------------------------FIN VENTANA MODAL CAMBIAR PASSWORD -------------------------------------------------------->

</body>

</html>

<script>
   

  $(document).ready(function(){
    $('#Password2').keyup(verificarusua); 
    $('#Password').keyup(verificarusua);  
   
  });


 //comparar password 
  function verificarusua(){
    var repeatpass= document.getElementById('Password2').value;
    var repeatclave= repeatpass.length;
    if (repeatclave>0) {
      var Contraseña= $('#Password').val();
      var confirmar= $('#Password2').val();
      if (Contraseña != confirmar) {
        $('#verificar').html('<img src="../Views/default/img/incorrecto.png" height="30" width="35">');
        document.getElementById('passwdusua').disabled=true;
      }else{
        $('#verificar').html('<img src="../Views/default/img/check-icon.jpg" height="35" width="40"> ');
        document.getElementById('passwdusua').disabled=false;
      }
    }
  }

   //script para cambiar password
    
      cambia_passwdusua=function(CI){
        alert(CI);
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
 
</script>


