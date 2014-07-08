<style type="text/css">
    .labelform {
        font-weight: bold;
        font-family: sans-serif; 
        font-size: 14px;
    }

</style>

<script type="text/javascript">
    function controlformularios() {
        if ($('#nombre').val() == '') {
            $("#labelnombre").append("Se te ha olvidado algo?");
            $('#nombre').focus();
            return false;
        }
        if ($('#apellidos').val() == '') {
            $("#labelapellidos").append("Se te ha olvidado algo?");
            $('#apellidos').focus();
            return false;
        }
        if ($('#cedula').val() == '') {
            $("#labelcedula").append("Se te ha olvidado algo?");
            $('#cedula').focus();
            return false;
        }
        if ($('#password').val() == '') {
            $("#labelpassword").append("Se te ha olvidado algo?");
            $('#password').focus();
            return false;
        }
        if ($('#direccion').val() == '') {
            $("#labeldireccion").append("Se te ha olvidado algo?");
            $('#direccion').focus();
            return false;
        }
        if ($('#telefono').val() == '') {
            $("#labeltelefono").append("Se te ha olvidado algo?");
            $('#telefono').focus();
            return false;
        }        
        
        if($("#password").val()!= $("#rpassword").val()){
            $("#labelrpassword").append("No coinciden las contraseñas");
            $('#rpassword').focus();
            alert("Las Contraseñas no coinciden");
            return false;
        }

    }
    
    function eliminarlabel(id){
        if($('#'+id).val()!=''){
            $('#label'+id).remove('');
        }
    }
    
    
</script>

<div id="da-content-area">
    <div class="grid_d">
        <div class="da-panel-widget">
            <div class="grid_d">
                <div id="da-login-box-content">
                    <div class="grid_d">
                        <h1>Crear Un Nuevo Asesor De Ventas</h1>
                        <form id="da-login-form" enctype="multipart/form-data" onsubmit="return controlformularios();" method="post" action="<?php echo base_url(); ?>cliente/actualizar_info_cuenta/">

                            <label class="labelform" for="nombre">Nombre</label>
                            <br/>
                            <input type="text" class="inputtext" value="<?php echo $persona[0]['ase_nombre']?>" name="nombre" id="nombre" onblur="eliminarlabel(this.id);" placeholder="nombres"/>
                            <label id="labelnombre" ></label>
                            <br/>
                            <label class="labelform" for="apellidos">Apellidos</label>
                            <br/>
                            <input type="text" value="<?php echo $persona[0]['ase_apellido']?>" class="inputtext" name="apellidos" id="apellidos" onblur="eliminarlabel(this.id);"  placeholder="apellidos"/>
                            <label id="labelapellidos"></label>
                            <br/>
                            <label class="labelform" for="cedula">Cedula</label>
                            <br/>
                            <input type="text" class="inputtext" value="<?php echo $persona[0]['ase_cedula']?>" name="cedula" id="cedula" onblur="eliminarlabel(this.id);"  placeholder="Cedula" />
                            <label id="labelcedula"></label>
                            <br/>                        
                            <label class="labelform" for="password">Nueva Contraseña</label>
                            <br/>
                            <input type="password" class="inputtext" name="password" id="password" onblur="eliminarlabel(this.id);"  placeholder="Contraseña" />
                            <label id="labelpassword"></label>
                            <br/>
                            <label class="labelform" for="rpassword">Repita Nueva Contraseña</label>
                            <br/>
                            <input type="password" class="inputtext" name="rpassword" id="rpassword" onblur="eliminarlabel(this.id);"  placeholder="Contraseña" />
                            <label id="labelrpassword"></label>
                            <br/>
                            <label class="labelform" for="direccion">Dirección</label>
                            <br/>
                            <input type="text" class="inputtext" value="<?php echo $persona[0]['ase_direccion']?>" name="direccion" id="direccion" onblur="eliminarlabel(this.id);"  placeholder="Dirección"/>
                            <label id="labeldireccion"></label>
                            <br/>
                            <label class="labelform" for="telefono">Telefono</label>
                            <br/>
                            <input type="tel" class="inputtext" value="<?php echo $persona[0]['ase_telefono']?>" name="telefono" id="telefono" onblur="eliminarlabel(this.id);" placeholder="Telefono" />
                            <label id="labeltelefono"></label>
                            <br/>
                            <label class="labelform" for="Imagen Asesor">Imagen</label>
                            <br/>
                            <div id='file_browse_wrapper'>                                
                                <input type='file' name="file_browse" value="./uploads/asesores/<?php echo $persona[0]['ase_foto']?>"  id='file_browse' />
                                <label  id="labelfile_browse"></label>                                
                            </div>
                            <br/>
                            <input type="submit" id="enviarasesor" class="buttonsubmit" value="Enviar"/>
                            <input type="reset" class="buttonreset" value="Cancelar"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

