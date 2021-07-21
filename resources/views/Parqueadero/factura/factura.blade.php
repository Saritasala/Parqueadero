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
                        {{-- /<img style="height:90px ; width: 90px "
                            src="{{ config('app.myUrl') . 'storage/' . $data->getCommerce->getUser->photo }}" alt=""> --}}
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
                        <h3>Orden Compra : {{ $data['element']->name }}
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
                        <b style="font-size:8px;color:#999">EMPELADO </b><br /><span style="font-size:14px">
                            {{ $data['element']->getUser->name . ' ' . $data['element']->getUser->last_name}}</span>
                    </td>
                    <td width="25%">
                        <b style="font-size:8px;color:#999">FECHA </b><br /><span
                            style="font-size:14px">{{ $data['element']->date }}</span>
                    </td>
                    <td width="25%">
                        <b style="font-size:8px;color:#999">REFERENCIA </b><br /><span style="font-size:14px">
                            {{ $data['element']->reference}}</span>
                    </td>
                    <td width="25%">
                        <b style="font-size:8px;color:#999">METODO DE PAGO </b><br /><span style="font-size:14px">
                            {{ $data['element']->getPayment->name}}</span>
                    </td>
                    
                </tr>
            </table>

            <table border="0" cellpadding="0" width="100%">
                <tr>
                    <td width="50%">
                        <b style="font-size:8px;color:#999">DIRECCION </b><br /><span
                            style="font-size:14px">{{ $data['element']->direccion}}</span>
                    </td>
                

                </tr>
            </table>
        </div>

    </div>

    <div style="text-align: left; padding: 5px; font-family: tahoma; font-size: 14px;"><b>Detalle de la Compra </b>
    </div>

    <!-- detalle de la compra --->
    <div style="padding: 10px;">






        <div class='panel-products-view' id='pnl-products-car' data-cantidad='".$items_."' style='font-size:10pt'>

            <table width='100%'>
                @foreach ($data['pedido'] as $item)

                    <tr>
                        <td width='50%'>
                            <h4>{{$item->getProduct->title}} <small>(1x
                                {{$item->getProduct->precio}})</small>
                                x({{ $item->stock}})</h4>
                        </td>
                        

                        <td style='text-align:right'>
                            ${{ number_format($item->total) }}
                        </td>
                    </tr>
                @endforeach

            </table>

        </div><br />
        <hr />



        <table width='100%' style='font-size:10pt'>
            
            <tr>
                <td width='70%'></td>
                <td width='15%'>Costo de Envio : </td>
                <td width='15%'>
                    Sin Costo 
                </td>
            </tr>
            <tr>
                <td width='70%'></td>
                <td width='15%'>Total Compra :</td>
                <td width='15%'>${{ number_format($data['element']->total) }}</td>
            </tr>

        </table>





    </div>
    <!--- End detail ------>



</body>


</html>
