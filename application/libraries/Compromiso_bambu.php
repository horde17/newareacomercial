<?php
date_default_timezone_set('America/Los_Angeles');

class Compromiso_bambu {

    function __construct() {
        
    }
    
    /**
     * 
     * @param string $nombre Nombre del cliente
     * @param string $apellidos Apellidos del Cliente
     * @param string $cedula Cedula Del Cliente
     * @param string $expedicion Expedición de la cedula del Cliente
     * @param string $estadocivil Estado civil del cliente
     * @param int $apartamento Apartamento que se va a vender
     * @param int $areaapto Area del apartamento
     * @param double $apto_precio Precio del apartamentp
     * @param int $num_deposito Numero del Deposito asignado al departamento
     * @param string $torre Torre donde se encuentra el Apartamento
     * @param array $cuotas_iniciales Array con las cuotas Iniciales
     * @param array $cuotas_restantes Array Con las cuotas restantes
     * @param int $parqueadero Numero de Parqueadero(s) asignados al Apartamento
     * @param int $num_sotano El sotano asignado a los parqueadero(s) del apartamento
     * @param date $fecha_firma Fecha cuando se va a firmar la escrituracion
     * @param date $fecha_entrega Fecha de entrega del apartamento
     * @param string $linderos Linderos Particulares del Apartamento
     * @param type $hora_firma Hora de la Firma del Apartamento
     * @param type $num_notaria Numero de Notaria a Firmar 
     * @return string Texto en pdf Retorna el texto para la creación del pdf
     */

    public function crear_pdf_compromiso($nombre, $apellidos, $cedula, $expedicion, $estadocivil, $apartamento, $areaapto, $apto_precio, $num_deposito, $torre, $cuotas_iniciales, $cuotas_restantes, $parqueadero, $num_sotano, $fecha_firma, $fecha_entrega, $linderos, $hora_firma, $num_notaria) {
        $CI = get_instance();
        $CI->load->library("number2word");
        $today = date("Y-m-d");
        $numeroletra = new Number2word();
        $txtcuoini = "";
        foreach ($cuotas_iniciales as $key) {
            $txtcuoini .= " La Suma de " . $numeroletra->num2word($key['valor_couta']) . " pesos moneda legal Colombiana ($" . (string) (number_format($key['valor_couta'], 0, "", ".")) . ")";
            $txtcuoini .= " que seran pagados la fecha " . $numeroletra->fechaALetras((string) $key['fecha_pago_cuota']) . " depositados en la Fiducia No. 0860-631 de Bancolombia";
        }

        foreach ($cuotas_restantes as $key) {
            $txtcuoini .= " La Suma de " . $numeroletra->num2word($key['valor_cuota']) . " pesos moneda legal Colombiana ($" . (string) (number_format($key['valor_cuota'], 0, "", ".")) . ")";
            $txtcuoini .= " que seran pagados la fecha " . $numeroletra->fechaALetras((string) $key['fecha_pago_cuota']);
            if ((string) $key['credito_id'] == "5") {
                $txtcuoini .= "mediante el crédito bancario otorgado por" . $key['entidad_bancaria'];
            }
        }

        $texto = '<p align="CENTER">
    <a name="_GoBack"></a>
    
    <strong>DOCUMENTO DE PROMESA DE COMPRAVENTA</strong>
</p>
<p align="CENTER">
    <strong>PROYECTO EDIFICIO BAMBU PROPIEDAD HORIZONTAL</strong>
</p>
<p align="JUSTIFY">
    Entre los suscritos a saber, de un lado, <strong>JORGE IVAN ARIAS LOPEZ</strong>, mayor y vecino de Manizales, identificado con la cédula de ciudadanía
número 10.258.151 de Manizales, quien obra en nombre y representación de la sociedad que en Manizales gira hoy bajo la razón social de    <strong>ASESORIAS, CONSTRUCCIONES, CONSULTORIAS, LOGISTICA Y SERVICIOS S.A.S. “ASCOLSER S.A.S.”</strong>, Nit 900.548.307-3, sociedad con domicilio
    principal en la ciudad de Manizales, legalmente constituida mediante documento número 000001 de los accionistas de Manizales del 17 agosto de 2012,
    inscrita en la Cámara de Comercio, el 23 de Agosto de 2012 bajo el número 00063227 del libro IX, en su calidad de gerente y representante legal Y</p>
<p align="JUSTIFY">JAIRO YOHANNY POSADA TRUJILLO, mayor de edad, vecino de Manizales, identificado con la cédula de ciudadanía número 10.282.502 expedida en Bogota, quien
    obra en nombre y representación del <strong>CONSORCIO J5 INGENIERIA Y ARQUITECTURA, Nit</strong> 900.560.424-6, y quienes en adelante se denominarán para
todos los efectos de esta promesa de compraventa, <strong>LOS PROMITENTES VENDEDORES</strong>; y de la otra parte, el señor(a)    <strong style="text-transformation:uppercase;"> ' . $nombre . " " . $apellidos . '</strong> mayor de edad, vecino(a) de la ciudad de Manizales, identificad(a) con la cédula de ciudadanía Nº ' . $cedula . '
    expedida en ' . $expedicion . ' , de estado civil ' . $estadocivil . ' quien en la celebración de esta promesa de compraventa obra en nombre propio, y para todos los fines del
    mismo se denominara <strong>EL(LA) PROMITENTE COMPRADOR(A)</strong>, se celebra el siguiente documento de compraventa regido por las siguientes cláusulas:
</p>
<p align="JUSTIFY">
    <strong>CLAUSULA PRIMERA: OBJETO DEL NEGOCIO Y DESCRIPCION DEL BIEN. LOS PROMITENTES VENDEDORES</strong>
    se obligan a transferir a <strong>EL(LA) PROMITENTE COMPRADOR(A) a</strong> título de venta y estos se obligan a adquirir del primero el inmueble Nº ' . $apartamento . ' en
    el edificio BAMBU , ubicado en Avenida Alberto Mendoza Hoyos N 87-62. El inmueble prometido en venta está identificado en los planos con el Nº ' . $apartamento . ' Torre ' . $torre . '
    con un área total construida aproximada de ' . $areaapto . ' M2, y los Parqueadero(s) identificado(s) en los planos con el (los) Nº ' . $parqueadero . ' sótano ' . $num_sotano . ' y el uso exclusivo
del Deposito(s) identificado(s) en los planos con el (los) Nº ' . $num_deposito . ' del mismo edificio, comprendidos dentro de los siguientes linderos especiales:<strong>APARTAMENTO 302: </strong>' . $linderos .'

<strong>PARAGRAFO PRIMERO.</strong>No obstante hacerse mención expresa del área y los linderos prometida en venta los contratantes convienen en celebrarla como cuerpo cierto.    <strong>PARAGRAFO SEGUNDO.</strong> 
La compraventa también incluye el porcentaje que corresponde sobre los bienes de dominio común en la proporción
    determinada para cada bien de dominio exclusivo que se señalaran en el reglamento de propiedad horizontal. <strong>PARAGRAFO TERCERO</strong>. El proyecto
    edificio BAMBU se encuentra en construcción en un lote de terreno identificado con el registro Catastral No las fichas catastrales en mayor extensión
    números 1-01-0328-0006-000 y 1-01-0328-0005-000 y la matrícula inmobiliaria número 100-202359, determinado por los siguientes linderos: identificados así:
    ### Partiendo del mojón uno (1) ubicado en el extremo noreste del lote a una distancia de un metro (1m) de la vía que de Manizales comunica con el Tolima,
    se continúa en línea paralela y a una distancia de un metro (1m) de la vía mencionada con dirección sur y una longitud aproximada de ciento dos coma seis
    metros (102,6 m) lindando con la avenida Alberto Mendoza Hoyos, hasta el mojón número dos (2) ubicado frente a un poste de luz cerca a la entrada al parque
    Bicentenario, del mojón número dos (2) se continúa en línea recta pasando por el poste de luz en dirección sureste en una longitud aproximada de nueve coma
    cero cinco metros (9,05m) , hasta encontrar el mojón número tres (3) ubicado al borde de una vía carreteable que comunica con el barrio el Chachafruto, del
    mojón número tres (3) se continúa paralelo bordeando la vía carreteable en dirección noreste en una longitud aproximada de noventa y nueve coma cero cinco
    metros (99.05 m) , hasta encontrar el mojón número cuatro (4) ubicado sobre la misma margen del carreteable, del mojón número cuatro (4) se continúa en
    línea recta con dirección noreste en una longitud aproximada de sesenta y nueve coma sesenta y un metros (69.61 m) lindando con el conjunto residencial
Bosques de Santamaría, hasta llegar al mojón número uno (1) punto de partida. ### <strong>TRADICIÓN: </strong>Adquirió la sociedad    <strong>ASESORIAS, CONSTRUCCIONES, CONSULTORIAS, 
LOGISTICA Y SERVICIOS S.A.S. “ASCOLSER S.A.S.”</strong>, por compra hecha a DIANA MATILDE PRIETO BAQUERO y
    otro, por medio de la escritura pública número 6327 del 12 de Agosto de 2013 otorgada en la Notaría Segunda de Manizales, en dos lotes de terreno
    identificados con las matrículas inmobiliarias números 100-122288 y 100-123913, pero a través del mismo instrumento se realizó englobe en un solo predio y
    se inscribió al folio de matrícula inmobiliaria número 100-202359, que es el que identifica al lote de terreno sobre el cual se construyó el edificio y la
construcción por haberla levantado a sus propias expensas el <strong>CONSORCIO J5 INGENIERIA Y ARQUITECTURA </strong>.    <strong>CLAUSULA SEGUNDA: ESPECIFICACIONES DEL PROYECTO.</strong> El Edificio BAMBU es un proyecto de vivienda ubicado en la ciudad de Manizales, El
    conjunto contará con: Tres sótanos de parqueaderos, áreas comunes, compuestas de salón social con baño y cocina, área de BBQ, juegos infantiles, Gimnasio (
    con dotación básica) URBANISMO: Portería, El proyecto tendrá una portería para todo el conjunto, adicionalmente una puerta para acceder a los parqueaderos.
</p>

<p align="JUSTIFY">
    El edificio cuenta con doble servicio de ascensores, motobombas para inyección de agua potable, red de incendios, tanques de reserva de agua, planta
    eléctrica para áreas comunes salones de reuniones, plazoletas y jardines. <strong>EL (LA) PROMITENTE COMPRADOR(A) </strong>manifiesta y declara(n) que
    conoce(n) y acepta los planos aprobados por la Curaduría Urbana, los cuales servirán de base para la identificación exacta del inmueble, a menos que
    separadamente se haga constar alguna modificación convenida y las especificaciones técnicas de acabados del apartamento, ofrecidos por el consorcio, en
caso de presentarse modificaciones se formalizaran mediante el OTROSI de precio y acabados, En el caso de que a    <strong>EL(LA) PROMITENTE COMPRADOR(A)</strong> 
se le entregue un catálogo promocional y unos planos ambientados, no servirá para exigir ningún tipo de
obligación a <strong>LOS PROMITENTES VENDEDORES</strong> ya que esto será simplemente con fines publicitarios. <strong>PARAGRAFO PRIMERO</strong>.    <strong>LOS PROMITENTES VENDEDORES</strong> 
se obliga a entregar las obras de urbanismo y servicios públicos del proyecto edificio BAMBU de conformidad con
    las exigencias de la oficina de Planeación, curaduría urbana Aguas de Manizales, Chec y Secretaría de Obras Públicas del municipio de Manizales, tales
    como: agua y energía eléctrica, <strong>PARAGRAFO SEGUNDO</strong>. En la compraventa prometida, no se incluye el medidor de gas, ni los derechos de
    conexión, cuya instalación y pagos serán de cargo exclusivo de <strong>EL (LA) PROMITENTE COMPRADOR(A)</strong>; tampoco se entregarán las divisiones de
    los baños, ni espejos <strong>CLAUSULA TERCERA:</strong> entre las partes se acuerda para el(los) INMUEBLE(S) un precio de ' . $numeroletra->num2word($apto_precio) . ' PESOS MONEDA LEGAL COLOMBIANA (' . $apto_precio . ')    <strong>'
        . 'CLAUSULA CUARTA: FORMA DE PAGO. EL(LA) PROMITENTE COMPRADOR(A) </strong>'
        . 'cancelarán el inmueble de la siguiente manera: ' . $txtcuoini . ' <strong>PARAGRAFO PRIMERO:</strong> Para efectos del cumplimiento en el pago de las cuotas aquí pactadas,<strong>
                    EL(LA) PROMITENTE COMPRADOR(A)</strong> 
                    firmará un pagaré y en caso de mora en uno o cualquiera de los pagos, dará lugar para que    <strong>
                    LOS PROMITENTES VENDEDORES</strong> cobre interés moratorio equivalente a la tasa máxima permitida por la Ley, y que fije la superintendencia
    Financiera. <strong>PARAGRAFO SEGUNDO:</strong> La mora en el pago de dos cuotas consecutivas de las indicadas, en caso de existir más de dos, antes o
    después de la entrega del inmueble, dará lugar por parte de <strong>LOS PROMITENTES VENDEDORES</strong>, a resolver el contrato y a retener a título de
    sanción el porcentaje estipulado en la cláusula penal, sin perjuicio de ejercer las demás acciones aquí contempladas, la fecha que determina la resolución
    del contrato será la misma en la cual se verifique el incumplimiento del pago.
</p>
<p align="JUSTIFY">
    <strong>CLAUSULA QUINTA:</strong>
    Los inmuebles objeto de esta promesa le serán entregados a <strong>EL(LA) PROMITENTE COMPRADOR(A)</strong> libres de derechos de hipoteca, usufructo,
    censo, uso o habitación, servidumbres, gravámenes, limitaciones o condiciones de dominio, embargos, pleitos pendientes y en general, de todo factor que
    pudiera afectar el derecho de <strong>EL(LA) PROMITENTE COMPRADOR(A) </strong>sobre el inmueble. <strong>EL(LA) PROMITENTE COMPRADOR(A) </strong> no podrá
    ofertar públicamente en medios tales como prensa, revistas, televisión, radio, inmobiliarias entre otras el bien prometido en venta hasta tanto no se
    encuentre a paz y salvo con el valor total del apartamento y previa firma de la respectiva escritura de venta. El incumplimiento de esta cláusula será
    causal de multa establecida en la cláusula penal. <strong>CLAUSULA SEXTA:</strong> Los bienes objeto de esta <strong>PROMESA DE COMPRAVENTA</strong>, le
    serán entregados por <strong>LOS PROMITENTES VENDEDORES</strong> a <strong>EL(LA) PROMITENTE COMPRADOR(A) </strong> a paz y salvo por todo concepto, en
    especial por impuestos de valorización, tasas contribuciones, acueducto y alcantarillado, energía etc., por consiguiente, los que se causen a partir de la
    entrega del inmueble serán a cargo de <strong>EL(LA) PROMITENTE COMPRADOR(A)</strong>.

    <strong>CLAUSULA SÉPTIMA:</strong>
La respectiva escritura pública de compraventa será otorgada en la notaría ' . $num_notaria . ' del círculo de Manizales, a    <strong>EL(LA) PROMITENTE COMPRADOR(A) </strong> 
    el día ' . $numeroletra->num2word(date("d", strtotime($fecha_firma))) . ' (' . date("d", strtotime($fecha_firma)) . ') de ' . date("m", strtotime($fecha_firma)) . ' de ' . date("y", strtotime($fecha_firma)) . ', a las ' . $hora_firma . '., sin perjuicio de poderse anticipar, previo
    acuerdo entre las partes. <strong>PARAGRAFO:</strong> Acuerdan las partes que la única prueba válida de constancia de asistencia a la Notaria, será
    certificación escrita del Notario. <strong>CLAUSULA OCTAVA:</strong> Los Gastos Notariales que demandan la subsiguiente escritura de compraventa, serán por
    cuenta de <strong>LOS PROMITENTES VENDEDORES</strong> y de <strong>EL(LA) PROMITENTE COMPRADOR(A)</strong>, por partes iguales. Los gastos de venta que
sean liquidados por concepto de la Oficina de Registro de Instrumentos Públicos y la boleta de rentas serán por cuenta de    <strong>EL (LA) PROMITENTE COMPRADOR(A). PARAGRAFO PRIMERO:</strong> 
En todo caso, <strong>EL (LA) PROMITENTE COMPRADOR(A)</strong> se harán responsables
de todos los impuestos, incluida la cuota de propiedad horizontal a partir del momento de la entrega material del inmueble.<strong>CLAUSULA NOVENA: ENTREGA MATERIAL DEL INMUEBLE.</strong> 
El inmueble objeto de este contrato será entregado por    <strong>LOS PROMITENTES VENDEDORES</strong> 
a <strong>EL(LA) PROMITENTE COMPRADOR(A)</strong> el día ' . $numeroletra->num2word(date("d", strtotime($fecha_entrega))) . '(' . date("d", strtotime($fecha_entrega)) . ') de ' . date("m", strtotime($fecha_entrega)) . ' de ' . date("Y", strtotime($fecha_entrega)) . '
    siempre y cuando no exista por
parte <strong>EL(LA) PROMITENTE COMPRADOR(A)</strong> mora en el pago de las cuotas pactadas en este contrato. No obstante el señalamiento de estos plazos,    <strong>LOS PROMITENTES VENDEDORES</strong> 
contarán con un periodo de gracia de noventa (90) días más para efectuar dicha entrega a partir del día
    veintiséis (26) de Marzo de 2015 como se dice al principio de esta cláusula. Lo anterior no causa la resolución del presente contrato ni obligación de
    reconocer valor alguno a título de pena, Se exceptúa de este caso los eventos de fuerza mayor o caso fortuito y hechos de la naturaleza, huelgas o paros
    decretados por los empleados del Estado, por el personal de sus proveedores, contratistas o subcontratistas, tardanza por parte de las Empresas Públicas de
esta ciudad en la instalación de los servicios públicos de gas, energía, acueducto y alcantarillado o demora de planeación en recibir la urbanización.<strong>LOS PROMITENTES VENDEDORES</strong> 
podrán realizar la entrega del bien, con anterioridad a las fechas arriba fijadas dando previo aviso a    <strong>
EL(LA) PROMITENTE COMPRADOR(A)</strong>, en un plazo no inferior a 15 días hábiles, quien deberá comparecer a recibir el bien negociado en la fecha
indicada en dicho aviso. En caso de que <strong>LA PROMITENTE COMPRADORA</strong> no se presenten a recibir el inmueble en el término indicado,    <strong>
LOS PROMITENTES VENDEDORES</strong> tendrán derecho a considerar que el bien ha sido recibido a entera satisfacción, desde el día del vencimiento
    del plazo fijado para la entrega en la notificación escrita, a partir de la cual empezarán a correr los términos para el cobro de los pagos previstos en
    ésta cláusula. Se entiende que cuando el inmueble no se entrega por encontrarse <strong>EL(LA) PROMITENTE COMPRADOR(A)</strong> en mora no hay
incumplimiento de parte de <strong>LOS PROMITENTES VENDEDORES</strong> en la fecha de entrega estipulada en esta cláusula.    <strong>CLAUSULA DECIMA: PENAL.</strong> 
El incumplimiento por cualquiera de las partes de la totalidad o de alguna de las obligaciones derivadas del
    presente contrato, da derecho a aquella que hubiere cumplido o se hubiere allanado a cumplir las obligaciones a su cargo, para exigir inmediatamente, a
    título de pena, a quien no cumplió o no se allanó a cumplir el pago de una suma equivalente al diez (10%) por ciento del precio total estipulado en la
cláusula tercera. <strong>PARAGRAFO PRIMERO:</strong> En caso de devolución de dinero, ésta se hará por parte    <strong>DE LOS PROMITENTES VENDEDORES</strong> 
en un término de noventa (90) días hábiles, contados a partir del momento de la resolución de éste contrato;
    en caso de que <strong>EL(LA) PROMITENTE COMPRADOR(A)</strong> no se haga presente para recibir el dinero <strong>LOS PROMITENTES VENDEDORES</strong>
    consignará el valor que resulte de la liquidación del presente <strong>CONTRATO DE PROMESA DE COMPRAVENTA</strong>, una vez se descuente el valor
correspondiente a la multa, quedando <strong>LOS PROMITENTES VENDEDORES</strong> a paz y salvo por todo concepto con    <strong>EL(LA) PROMITENTE COMPRADOR(A)</strong>, 
sin necesidad de requerimiento ni constitución en mora, derechos éstos a los cuales renuncian ambas partes
    en su recíproco beneficio. Por el pago de la pena se extingue la obligación principal, la cual no podrá ser exigida separadamente. En el evento de
demandarse la resolución del contrato por el incumplimiento o mora de <strong>LA PROMITENTE COMPRADORA</strong>,    <strong>LOS PROMITENTES VENDEDORES</strong> 
podrán retener la suma pactada como cláusula penal, de las sumas ya recibidas como anticipo en ejecución de
    este contrato, e imputarlas el valor de dicha cláusula penal <strong>CLAUSULA DÉCIMA PRIMERA: LOS PROMITENTES VENDEDORES</strong> declaran que el edificio
BAMBU tiene Licencia de Construcción de la Segunda Curaduría Urbana de Manizales según resolución Nº 220202-2013 del 22 de Agosto de 2013.    <strong>CLAUSULA DECIMA SEGUNDA: 
REGIMEN DE COPROPIEDAD.</strong> El proyecto Edificio BAMBU, estará sometido a régimen de copropiedad, con el lleno de los
    requisitos exigidos por la Ley 675 de 2001. <strong>EL(LA) PROMITENTE COMPRADOR(A) </strong>declara expresamente su conformidad con dicho régimen y acepta
    desde el momento de recibir las unidades prometidas en venta a someterse a sus disposiciones. <strong>CLAUSULA DECIMA TERCERA: REFORMAS.</strong> Cualquier
    reforma a efectuar al apartamento deberá ser autorizada por escrito por el CONSORCIO J5 INGENIERIA Y ARQUITECTURA. y debe ceñirse estrictamente a los
planos aprobados por la curaduría urbana de Manizales, y al reglamento de Copropiedad del Edificio, en caso contrario,    <strong>LOS PROMITENTES VENDEDORES</strong> 
no se harán responsables de los perjuicios que esta ocasione. En beneficio de los propietarios del Edificio, se
    hacen constar las siguientes prohibiciones, que regirán en todo tiempo para el comprador o sus causahabientes o sucesores en el dominio. A) No será
    permitido cambiar ventanas, vidrios o hacer balcones en las fachadas de los inmuebles, ni desconocer las disposiciones de la oficina de planeación para
    garantizar la privacidad de las unidades y evitar registro. B). los parqueaderos privados no podrán dividirse físicamente con muros medianeros. C) no podrá
    cambiarse el color ni el material de las fachadas; a no ser que sea decidido por mayoría en la asamblea general de copropietarios; si hay algún cambio
    estos deberán aplicarse a todo el edificio. <strong>CLAUSULA DECIMA CUARTA: CONTRIBUCION DE IMPUESTOS Y SERVICIOS.</strong> A partir de la fecha de la
entrega material, o del día en el cual sea entregado el inmueble por medio de un acta firmada entre las partes,    <strong>EL(LA) PROMITENTE COMPRADOR(A) </strong>se harán cargo 
de los impuestos prediales y el pago de servicios, tales como energía, teléfono, acueducto,
alcantarillado, gas, tasa de aseo, administración, etc. Se hace constar de manera expresa que también será a cargo de    <strong>EL(LA) PROMITENTE COMPRADOR(A)</strong>, de acuerdo al 
porcentaje de copropiedad, los impuestos de valorización que se derramen en cualquier
momento sobre el inmueble a partir de la fecha de la escritura, ya se trate de nuevas obras o de reajustes de las anteriores.    <strong>PARAGRAFO PRIMERO.</strong> Cuando <strong>
LOS PROMITENTES VENDEDORES</strong> cancelan el Impuesto Predial por anticipado, procederá luego a
    facturar a <strong>EL(LA) PROMITENTE COMPRADOR(A)</strong> el valor del Impuesto Predial que le corresponde desde la entrega del inmueble hasta la
    terminación del mes, trimestre o semestre según el caso, y proporcional al número de días. <strong>CLAUSULA DECIMA QUINTA: DESTINACION.</strong> Las
    unidades son destinadas para vivienda, parqueo y cuarto útil (deposito); el uso de estas unidades no podrá cambiarse.
    <strong>CLAUSULA DECIMA SEXTA: CESION DE DERECHOS. LOS PROMITENTES VENDEDORES</strong>
se reservan el derecho de aceptar o no la cesión de los derechos que surjan del presente contrato.    <strong>CLAUSULA DECIMA SEPTIMA: CUOTA DE ADMINISTRACION. EL(LA) PROMITENTE COMPRADOR(A)</strong> declara(n) expresamente que a partir de la fecha de la
    entrega material del inmueble, se comprometen a pagar la cuota de administración proporcional, las cuotas extraordinarias y las que se fijen por concepto
de la puesta en funcionamiento de la COPROPIEDAD, de acuerdo con el reglamento de copropiedad mientras se define la administración del edificio;<strong>LOS PROMITENTES VENDEDORES</strong> ejercerán dicha función y será a ella a quien se le pague la Administración.    <strong>CLAUSULA DECIMA OCTAVA:</strong> Con la firma de este documento <strong>EL(LA) PROMITENTE COMPRADOR(A),</strong> declara(n) que los recursos
    destinados para la compra de los inmuebles objeto de la presente <strong>PROMESA DE COMPRAVENTA</strong>, no provienen de ninguna actividad ilícita de las
contempladas en el Código Penal Colombiano o en cualquier otra norma que lo modifique o lo adicione. Además    <strong>EL(LA) PROMITENTE COMPRADOR(A) </strong>no permitirá(n) que terceros efectúen depósitos a sus cuentas con fondos provenientes de las actividades
    ilícitas contempladas en el Código Penal Colombiano o en cualquier norma que lo adicione, ni efectuará transacciones destinadas a tales actividades o a
    favor de personas relacionadas con la misma. <strong>CLAUSULA DECIMA NOVENA: EL(LA) PROMITENTE COMPRADOR(A)</strong> declara que conoce esta minuta con
    antelación a la firma de este documento y firman en señal de aceptación, por las partes, en la ciudad de Manizales a los '.$numeroletra->num2word(date("d", strtotime($today))).' ('.date("d", strtotime($today)).') días del mes de
    '.$numeroletra->fechaALetras2(date("m", strtotime($today))).'l año '.date("Y", strtotime($today)).'.
</p>
</p></p></p></p></p>

<table>
<tr>
<td>
    <strong>JAIRO YOHANNY POSADA</strong>    
    <br>
    Representante Legal
    <br>
    CC. 10.282.502
</td>
<td>   

    <strong>EL(LA) PROMITENTE COMPRADOR(A)</strong>
    <br>
    ' . $nombre . " " . $apellidos . '
        <br>
        CC.' . $cedula . '</td></tr></table>';

        return $texto;
    }

}
