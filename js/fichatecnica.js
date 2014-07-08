

function validateEmail() {
    var email = $("#correoelectronico").val();
    if (/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(email)) {

    } else {
        $("#dialogoalert").html("<p>Por favor escriba correo electrónico correcto</p>");
        alertdialog("Ok", 'correoelectronico');
        return false;
    }
}


$(function() {
    $("#valorcredito").priceFormat({
        prefix: '',
        thousandsSeparator: '.',
        centsSeparator: ',',
        centsLimit: 0
    });
    $("#porcentajeinicial").click(function() {
        if ($("#precio_parq").val() == "") {
            var valorapto = parseInt($("#valorapartamento").unmask());
            var porcentaje = parseInt($("#porcentajeinicial").val());
            var porcentaje1 = porcentaje / 100;
            $("#cuotainicial").val(parseInt(Math.round(valorapto * porcentaje1)));
            $("#valorcredito").val(parseInt(valorapto - (valorapto * porcentaje1)));
        } else {
            var valorapto = parseInt($("#valorapartamento").unmask()) + parseInt($("#precio_parq").unmask());

            var porcentaje = parseInt($("#porcentajeinicial").val());
            var porcentaje1 = porcentaje / 100;
            $("#cuotainicial").val(parseInt(Math.round(valorapto * porcentaje1)));
            $("#valorcredito").val(parseInt(valorapto - (valorapto * porcentaje1)));

        }
        $("#cuotainicial").priceFormat({
            prefix: '',
            thousandsSeparator: '.',
            centsSeparator: ',',
            centsLimit: 0
        });
        $("#valorcredito").priceFormat({
            prefix: '',
            thousandsSeparator: '.',
            centsSeparator: ',',
            centsLimit: 0
        });


    });
});






function alertdialog(texto, input) {
    $("#dialogoalert").dialog({
        autoOpen: true,
        show: {
            effect: "blind",
            duration: 500
        },
        hide: {
            effect: "explode",
            duration: 500
        },
        width: 400,
        buttons: [
            {
                text: texto,
                click: function() {
                    $(this).dialog("close");
                    $("#" + input).focus();
                }
            }
        ]
    });
}
$(document).ready(function() {
    $("#valorapartamento").priceFormat({
        prefix: '',
        thousandsSeparator: '.',
        centsSeparator: ',',
        centsLimit: 0
    });


    $("#valorsubsidio").priceFormat({
        prefix: '',
        thousandsSeparator: '.',
        centsSeparator: ',',
        centsLimit: 0
    });

    $("#precio_parq").priceFormat({
        prefix: '',
        thousandsSeparator: '.',
        centsSeparator: ',',
        centsLimit: 0
    });
    $("#valorcesantias").priceFormat({
        prefix: '',
        thousandsSeparator: '.',
        centsSeparator: ',',
        centsLimit: 0
    });
    $("#valorcdt").priceFormat({
        prefix: '',
        thousandsSeparator: '.',
        centsSeparator: ',',
        centsLimit: 0
    });
    $("#otrovalor").priceFormat({
        prefix: '',
        thousandsSeparator: '.',
        centsSeparator: ',',
        centsLimit: 0
    });


    $("#ingresosmensualesindependiente").priceFormat({
        prefix: '',
        thousandsSeparator: '.',
        centsSeparator: ',',
        centsLimit: 0
    });

    $("#ingresosmensuales").priceFormat({
        prefix: '',
        thousandsSeparator: '.',
        centsSeparator: ',',
        centsLimit: 0
    });

    $("#ingresospensionado").priceFormat({
        prefix: '',
        thousandsSeparator: '.',
        centsSeparator: ',',
        centsLimit: 0
    });

    $("#infosubsidio").dialog({
        autoOpen: false,
        modal: true,
        show: {
            effect: "blind",
            duration: 500
        },
        hide: {
            effect: "explode",
            duration: 500
        },
        width: 400,
        buttons: [
            {
                text: "Ok",
                click: function() {
                    $(this).dialog("close");
                    $("#" + input).focus();
                }
            }
        ]
    });

    $(function() {
        $("#estadocivil").change(function() {
            if ($("#estadocivil").val() != '1') {
                $("#conyugediv").show();
                $("#conyugeceduladiv").show();
                $("#expedicionconyugediv").show();
            }
            else {
                $("#conyugediv").hide();
                $("#conyugeceduladiv").hide();
                $("#expedicionconyugediv").hide();
            }

        });
    });

    $(function() {
        $("#subsidiofamiliar").change(function() {
            if ($("#subsidiofamiliar").val() == "Si") {
                $("#subsidiofamiliardiv1").show();

            }
            else {
                $("#subsidiofamiliardiv1").hide();

            }
        });
    });

    $(function() {
        $("#tipofinanciacion").change(function() {
            if ($("#tipofinanciacion").val() == "0" || $("#tipofinanciacion").val() == "propio") {
                $("#divcredito").hide();
                $("#diventidadfinanciera4").hide();
                $("#diventidadfinanciera3").hide();
                $("#diventidadfinanciera2").hide();
                $("#diventidadfinanciera").hide();
            }
            if ($("#tipofinanciacion").val() == "credito") {
                $("#divcredito").show();
                $("#diventidadfinanciera4").show();
                $("#diventidadfinanciera3").show();
                $("#diventidadfinanciera2").show();
                $("#diventidadfinanciera").show();
            }
        });
    });

    $(function() {
        $("#subsidio").change(function() {
            if ($("#subsidio").val() != "si") {
                $("#subsidiodiv").hide();
            }
            else {
                $("#subsidiodiv").show();
                $("#infosubsidio").dialog().dialog("open");
            }
        });
    });

    $(function() {
        $("#cesantias").change(function() {
            if ($("#cesantias").val() == "si") {
                $("#cesantiasdiv").show();
            }
            else {
                $("#cesantiasdiv").hide();
            }
        });
    });

    $(function() {
        $("#cdt").change(function() {
            if ($("#cdt").val() == "si") {
                $("#cdtdiv").show();
            }
            else {
                $("#cdtdiv").hide();
            }
        });
    });

    $(function() {
        $("#otro").change(function() {
            if ($("#otro").val() == "si") {
                $("#otrodiv").show();
                $("#otrodiv1").show();
            }
            else {
                $("#otrodiv").hide();
                $("#otrodiv1").hide();
            }
        });
    });

    $(function() {
        $("#subsidiofamiliar").change(function() {
            if ($("#subsidiofamiliar") == "si") {
                $("#subsidiofdiv").show();
                $("#subsidiofdiv1").show();
            } else {
                $("#subsidiofdiv").hide();
                $("#subsidiofdiv1").hide();
            }
        });
    });

    $(function() {
        $("#tipotrabajador").change(function() {
            if ($("#tipotrabajador").val() == "1") {
                $("#empresalaboradiv").show();
                $("#tiempoempresadiv").show();
                $("#cargoempresadiv").show();
                $("#ingresosmensualesdiv").show();
                $("#tiempoindependientediv").hide();
                $("#actividadindependientediv").hide();
                $("#ingresosmensualesindependientediv").hide();
                $("#ingresospensionadodiv").hide();
            }
            if ($("#tipotrabajador").val() == "2") {
                $("#empresalaboradiv").hide();
                $("#tiempoempresadiv").hide();
                $("#cargoempresadiv").hide();
                $("#ingresosmensualesdiv").hide();
                $("#tiempoindependientediv").show();
                $("#actividadindependientediv").show();
                $("#ingresosmensualesindependientediv").show();
                $("#ingresospensionadodiv").hide();
            }
            if ($("#tipotrabajador").val() == "3") {
                $("#empresalaboradiv").hide();
                $("#tiempoempresadiv").hide();
                $("#cargoempresadiv").hide();
                $("#ingresosmensualesdiv").hide();
                $("#tiempoindependientediv").hide();
                $("#actividadindependientediv").hide();
                $("#ingresosmensualesindependientediv").hide();
                $("#ingresosmensualesindependientediv").hide();
                $("#ingresospensionadodiv").show();
            }

            if ($("#tipotrabajador").val() == "0") {
                $("#empresalaboradiv").hide();
                $("#tiempoempresadiv").hide();
                $("#cargoempresadiv").hide();
                $("#ingresosmensualesdiv").hide();
                $("#tiempoindependientediv").hide();
                $("#actividadindependientediv").hide();
                $("#ingresosmensualesindependientediv").hide();
                $("#ingresospensionadodiv").hide();
            }


        });
    });

    $(function() {

        $("#fechaseparacion").datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1,
            dateFormat: "yy-mm-dd"

        });

        $("#fechapagoinicial").datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1,
            dateFormat: "yy-mm-dd"

        });
        $("#fechaacta").datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1,
            dateFormat: "yy-mm-dd"
        });
        $("#fechavencimiento").datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1,
            dateFormat: "yy-mm-dd"
        });


    });


    //formatear con valores enteros

    //  

    function onlynumbers(event) {
        if (event.shiftKey)
        {
            event.preventDefault();
        }

        if (event.keyCode == 46 || event.keyCode == 8) {
        }
        else {
            if (event.keyCode < 95) {
                if (event.keyCode < 48 || event.keyCode > 57) {
                    event.preventDefault();
                }
            }
            else {
                if (event.keyCode < 96 || event.keyCode > 105) {
                    event.preventDefault();
                }
            }
        }

    }
    $("#cedula").keydown(function(event) {
        onlynumbers(event);
    });
    $("#telefonofijo").keydown(function(event) {
        onlynumbers(event);
    });
    $("#celular").keydown(function(event) {
        onlynumbers(event);
    });

    $("#cuotainicial").keydown(function(event) {
        onlynumbers(event);
    });

    $("#valorsubsidio").keydown(function(event) {
        onlynumbers(event);
    });
    $("#valorcesantias").keydown(function(event) {
        onlynumbers(event);
    });
    $("#valorcdt").keydown(function(event) {
        onlynumbers(event);
    });
    $("#otrovalor").keydown(function(event) {
        onlynumbers(event);
    });

    $("#valorcredito").keydown(function(event) {
        onlynumbers(event);
    });
    $("#valorsubsidiofamiliar").keydown(function(event) {
        onlynumbers(event);
    });

    $("#ingresosmensuales").keydown(function(event) {
        onlynumbers(event);
    });
    $("#telefonoasesor").keydown(function(event) {
        onlynumbers(event);
    });
    $("#valorapartamento").keydown(function(event) {
        onlynumbers(event);
    });

    $("#habitaciones").keydown(function(event) {
        onlynumbers(event);
    });
    $("#numaparamento").keydown(function(event) {
        onlynumbers(event);
    });

    $("#numparqueadero").keydown(function(event) {
        onlynumbers(event);
    });

    $("#ingresosmensualesindependiente").keydown(function(event) {
        onlynumbers(event);
    });

    $("#ingresospensionado").keydown(function(event) {
        onlynumbers(event);
    });

    $("#ingresosmensuales").keydown(function(event) {
        onlynumbers(event);
    });




});

function corroborardatos(tab) {
    if (tab == 1) {
        if ($("#nombre").val() == "") {
            $("#dialogoalert").html("<p>Por favor escriba el nombre del cliente</p>");
            alertdialog("Ok", "nombre");
            return false;
        }

        if ($("#apellido").val() == "") {
            $("#dialogoalert").html("<p>Por favor escriba los apellidos del cliente</p>");
            alertdialog("Ok", "apellido");
            return false;
        }
        if ($("#direccion").val() == "") {
            $("#dialogoalert").html("<p>Por favor escriba la dirección del cliente</p>");
            alertdialog("Ok", "direccion");
            return false;
        }

        if ($("#cedula").val() == "") {
            $("#dialogoalert").html("<p>Por favor escriba la cédula del cliente</p>");
            alertdialog("Ok", "cedula");
            return false;
        }

        if ($("#expedicion").val() == "") {
            $("#dialogoalert").html("<p>Por favor escriba el lugar de expedición de la cédula</p>");
            alertdialog("Ok", "expedicion");
            return false;
        }
        if ($("#correoelectronico").val() == "") {
            $("#dialogoalert").html("<p>Por favor escriba el correo electrónico del cliente</p>");
            alertdialog("Ok", "correoelectronico");
            return false;
        }

        if ($("#celular").val() == "") {
            $("#dialogoalert").html("<p>Por favor escriba el telefono celular</p>");
            alertdialog("Ok", "celular");
            return false;
        }

        if ($("#estadocivil").val() != '1') {
            if ($("#nombreconyuge").val() == "") {
                $("#dialogoalert").html("<p>Por favor ingrese el nombre del conyuge</p>");
                alertdialog("Ok", "nombreconyuge");
                return false;
            }
            if ($("#cedulaconyuge").val() == "") {
                $("#dialogoalert").html("<p>Por favor ingrese la cédula del conyuge</p>");
                alertdialog("Ok", "cedulaconyuge");
                return false;
            }
            if ($("#expedicionconyuge").val() == "") {
                $("#dialogoalert").html("<p>Por favor ingrese el lugar de expedición de la cédula del coyuge</p>");
                alertdialog("Ok", "expedicionconyuge");
                return false;
            }
        }

        if ($("#proyecto").val() == "") {
            $("#dialogoalert").html("<p>Por favor eliga el proyecto </p>");
            alertdialog("Ok", "proyecto");
            return false;
        }

        if ($("#numaparamento").val() == "") {
            $("#dialogoalert").html("<p>Por favor escriba el numero de apartamento </p>");
            alertdialog("Ok", "numaparamento");
            return false;
        }

        if ($("#habitaciones").val() == "") {
            $("#dialogoalert").html("<p>Por favor escriba el numero de habitaciones del apartamento </p>");
            alertdialog("Ok", "habitaciones");
            return false;
        }

        if ($("#metroscuadrados").val() == "") {
            $("#dialogoalert").html("<p>Por favor escriba la dimension del apartamento </p>");
            alertdialog("Ok", "metroscuadrados");
            return false;
        }

        if ($("#numparqueadero").val() == "") {
            $("#dialogoalert").html("<p>Por favor escriba el numero de parqueadero asignado </p>");
            alertdialog("Ok", "numparqueadero");
            return false;
        }

        if ($("#valorapartamento").val() == "") {
            $("#dialogoalert").html("<p>Por favor escriba el valor total del apartamento </p>");
            alertdialog("Ok", "valorapartamento");
            return false;
        }
        return true;
    }
    if (tab == 2) {
        if ($("#cuotainicial").val() == "") {
            $("#dialogoalert").html("<p>Por favor ingrese el valor de la cuota inicial </p>");
            alertdialog("Ok", "cuotainicial");
            return false;
        }
        if ($("#fechaseparacion").val() == "") {
            $("#dialogoalert").html("<p>Por favor ingrese la fecha de separacion </p>");
            alertdialog("Ok", "fechaseparacion");
            return false;
        }
        if ($("#fechapagoinicial").val() == "") {
            $("#dialogoalert").html("<p>Por favor ingrese la fecha Pago Inicial </p>");
            alertdialog("Ok", "fechapagoinicial");
            return false;
        }
        if ($("#subsidio").val() == "si") {
            if ($("#valorsubsidio").val() == "") {
                $("#dialogoalert").html("<p>Por favor ingrese el valor del subsidio</p>");
                alertdialog("Ok", "valorsubsidio");
                return false;
            }
        }

        if ($("#cesantias").val() == "si") {
            if ($("#valorcesantias").val() == "") {
                $("#dialogoalert").html("<p>Por favor ingrese el valor de las cesantias</p>");
                alertdialog("Ok", "valorcesantias");
                return false;
            }
        }

        if ($("#cdt").val() == "si") {
            if ($("#valorcdt").val() == "") {
                $("#dialogoalert").html("<p>Por favor ingrese el valor del CDT</p>");
                alertdialog("Ok", "valorcdt");
                return false;
            }
        }
        if ($("#otro").val() == "si") {
            if ($("#cualotro").val() == "") {
                $("#dialogoalert").html("<p>Por favor ingrese que otra forma desea pagar el Apartamento</p>");
                alertdialog("Ok", "cualotro");
                return false;
            }
            if ($("#valorotro").val() == "") {
                $("#dialogoalert").html("<p>Por favor ingrese el valor de la forma que desea pagar el apartamento</p>");
                alertdialog("Ok", "valorotro");
                return false;
            }
        }
        return true;
    }

    if (tab == 3) {
        if ($("#tipofinanciacion").val() == "credito") {
            if ($("#valorcredito").val() == "0") {
                $("#dialogoalert").html("<p>Por favor escriba el valor del credito </p>");
                alertdialog("Ok", "valorcredito");
                return false;
            }

            if ($("#entidadfinanciera").val() == "0") {
                $("#dialogoalert").html("<p>Por favor eliga la entidad financiadora </p>");
                alertdialog("Ok", "entidadfinanciera");
                return false;
            }
            if ($("#asesor").val() == "") {
                $("#dialogoalert").html("<p>Por favor escriba el nombre del asesor del credito </p>");
                alertdialog("Ok", "asesor");
                return false;
            }
            if ($("#telefonoasesor").val() == "") {
                $("#dialogoalert").html("<p>Por favor escriba el telefono del asesor </p>");
                alertdialog("Ok", "telefonoasesor");
                return false;
            }
            if ($("#subsidiofamiliar").val() == 'si') {
                if ($("#valorsubsidiofamiliar").val() == "") {
                    $("#dialogoalert").html("<p>Por favor escriba el valor del subsidio familiar</p>");
                    alertdialog("Ok", "valorsubsidiofamiliar");
                    return false;
                }
                if ($("#telefonofamiliar").val() == "") {
                    $("#dialogoalert").html("<p>Por favor ingrese el telefono para contactarnos con su familiar </p>");
                    alertdialog("Ok", "telefonofamiliar");
                    return false;
                }
            }
        }
        return true;
    }


}



