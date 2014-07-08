<div id="da-content-area">
    <div class="da-panel-widget">
        <div class="grid_d">
            <h1><?php echo $lugar?></h1>
            <div class="datagrid">

                <table  id="listacliente">
                    <thead>
                        <tr>
                            <th colspan="6">Estado de Ventas de Apartamentos

                                <select id="proyectos">
                                    <option value="0">--Seleccion el proyecto--</option>
                                    <?php foreach ($proyectos as $key) { ?>

                                        <option value="<?php echo $key["id_proyecto"]; ?>"><?php echo $key["pro_nombre"]; ?></option>
                                    <?php } ?>

                                </select>
                                <input type="submit" value="Mostrar Estado de Ventas del Proyecto" id="search_ficha" />

                            </th>
                        </tr>                        
                </table>
                <div style=" display: none; "title="Estado de Ventas" id="ventas_meses">

                </div>
                

            </div>


        </div>
    </div>
</div>
<div title="Por Favor Corriga El Error" id="Error">

</div>
<script>
    $("#search_ficha").click(function() {
        if ($("#proyectos").val() == "0") {
            alertdialog();
            $("#ventas_meses").hide('slow');
            
            return false;
        } else {
            google.load("visualization", "1", {packages: ["corechart"]});
            $.ajax({
                url: "<?php echo base_url() ?>admin/mostrar_ventas_etapa/",
                data: {proyecto: $("#proyectos").val()},
                type: "POST"
            }).done(function(answer) {
                var data = google.visualization.arrayToDataTable(JSON.parse(answer));
                var options = {
                    title: 'Porcentaje de Ventas Por Etapas del Proyecto',
                    'width': 800,
                    'height': 300
                };
                var chart = new google.visualization.PieChart(document.getElementById('ventas_meses'));
                chart.draw(data, options);
                $("#ventas_meses").show('slow');
            });
            
        }
    });

    function alertdialog() {
        $("#Error").html("<p>Por Favor Eliga Un Proyecto</p>");
        $("#Error").dialog({
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
                    text: "OK",
                    click: function() {
                        $(this).dialog("close");
                        $("#" + "proyectos").focus();
                    }
                }
            ]
        });
    }
</script>