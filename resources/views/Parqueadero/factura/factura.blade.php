<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Orden de Compra</title>
    <style>
        h1 {
            text-align: center;
            text-transform: uppercase;
        }

        .contenido {
            font-size: 14px;
        }

        #primero {
            background-color: #ccc;
        }

        #segundo {
            color: #44a359;
        }

        #tercero {
            text-decoration: line-through;
        }

        h4 {
            margin-top: 2px;
            margin-bottom: 2px;
        }

    </style>
</head>

<body>
    <div class="contenido">
        <div style="border:1px solid #333; padding: 5px 10px;">
            <table border="0" cellpadding="0" width="100%">
                <tr>
                    <td width="25%">
                       <img style="height:100px ; width: 100px" src="https://1.bp.blogspot.com/-OaXBk3g5SDU/YRsu8R9wW1I/AAAAAAAAAQs/psEqndaoWRMSeumZBryo8wp7MSVpQNLggCLcBGAsYHQ/w390-h390/photo_2021-08-16_22-11-38.jpg">
                      
                    </td>
                    <td width="25%" style="padding-bottom: 10px;margin-bottom: 0">
                        <h2 style="text-align: center">PARKING

                        </h2>
                        <h3 style="text-align: center;margin: 0 ;color:gray">

                            NIT: 132218253
                        </h3>
                        <h3 style="text-align: center;margin: 0 ;color:gray">

                            celular: 3135304055
                        </h3>
                    </td>
                    <td width="25%">
                        <h3>Placa del vehiculo : {{ $data['vehiculo']->placa }}
                        </h3>
                    </td>
                </tr>

            </table>
        </div>

    </div>



    <div class="contenido">
        <div style="border:1px solid #333; padding: 5px 10px;">
            <table border="0" cellpadding="0" width="100%">
                <tr>
                    <td width="50%">
                        <b style="font-size:8px;color:#999">EMPELADO </b><br /><span style="font-size:14px">{{ $data['vehiculo']->getUser->name . ' ' .  $data['vehiculo']->getUser->last_name }}</span>
                        
                    </td>
                    <td width="25%">
                        <b style="font-size:8px;color:#999">FECHA </b><br /><span
                           style="font-size:14px">{{ $data['vehiculo']->fecha_entrada }}</span>
                            
                        </span> 
                    </td>
                    <td width="25%">
                    <b style="font-size:8px;color:#999">Cliente </b><br /><span style="font-size:14px">{{ $data['vehiculo']->getCliente->name . ' ' . $data['vehiculo']->getCliente->last_name }}</span>
                           
                    </td>
                    <td width="25%">
                        <b style="font-size:8px;color:#999">METODO DE PAGO </b><br /><span style="font-size:14px"> Efectivo </span>
                           
                    </td>
                    
                </tr>
            </table>

            <table border="0" cellpadding="0" width="100%">
                <tr>
                    <td width="50%">
                        <b style="font-size:8px;color:#999">CEDULA DEL USUARIO </b><br /><span
                            style="font-size:14px"> {{$data['vehiculo']->getUser->cedula }}</span>
                         
                        </span>
                    </td>
                

                </tr>
            </table>
        </div>

    </div>

    <div style="text-align: left; padding: 5px; font-family: tahoma; font-size: 14px;"><b>Detalle de la Compra </b>
    </div>
    <div style="padding: 10px;">


        <div class='panel-products-view' id='pnl-products-car' data-cantidad='".$items_."' style='font-size:10pt'>

            <table width='100%'>
                    <tr>
                        <td width='50%'>
                            <h4>Placa : {{$data['vehiculo']->placa}} <br>
                                Modelo: {{$data['vehiculo']->modelo}}<br>
                                Color: {{$data['vehiculo']->color}}<br>
                                Fecha de salida: {{$data['vehiculo']->fecha_salida}}<br>
                                Fecha de entrada: {{$data['vehiculo']->fecha_entrada}}<br>
                                Hora de entrada: {{$data['vehiculo']->hora}}<br>
                                Hora de salida: {{$data['vehiculo']->hora_salida}}<br>
                                Parqueadero: {{$data['vehiculo']->getParqueo->nombre}}<br>

                            </h4>
                        </td>
                        <td style='text-align:right'>
                            Horas totales: {{$data['total']}}
                            
                        </td>
                    </tr>
                   
            </table>

        </div><br />
        <hr />



        <table width='100%' style='font-size:10pt'>
            
            <tr>
                <td width='70%'></td>
                <td width='15%'>Tiempo de cobro  : {{$data['total3']}}</td>
                <td width='15%'>
                <span
                    style="font-size:11px"> {{$data['vehiculo']->getParqueo->time }}</span>
                </td>
            </tr>
            <tr>
                <td width='70%'></td>
                <td width='15%'>Total a pagar : {{$data['dato'] }}</td>
              
            </tr>

        </table>





    </div>
    <!--- End detail ------>



</body>


</html>
