<?php 
require __DIR__ . '/vendor/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\PrintConnectors\CupsPrintConnector;

$connector = new NetworkPrintConnector("192.168.2.145", 9100);
//$connector = new CupsPrintConnector("BEMA_TICKET");
$printer = new Printer($connector);
$printer -> pulse();
$total = $venta->total;
setlocale(LC_ALL,"es_ES");
$hora= date ("h:i:s a");
$fecha= date ("d/m/Y");
$efectivo= $_POST['efectivo'];
//Encabezado

$printer -> selectPrintMode();
$printer -> setTextSize(2, 1);
$printer -> text("Ticket #: ".$venta->num_documento." \n");
//$printer -> text("LIBRERIA Y PAPELERIA \n");
//$printer -> text("ABRAHAM LINCOLN \n");
//$printer -> setTextSize(1, 1);
//$printer -> text("1a Calle Ote #16, Usulutan \n");
//$printer -> text("NIT : 0000-000000-000-0\n");
//$printer -> text("NRC : 7484-5 \n");
//$printer -> text("Digna Ysabel Ferrufino de Caminos\n");
//$printer -> text("GIRO : Venta de libro y otros\n");
//$printer -> text("RESOLUCION : CR-40152-2017\n");
//$printer -> text("DEL 11SD08700186/1 AL 11SD08700186/10000 \n");
//$printer -> feed();

//Datos de la venta
$printer -> setJustification(Printer::JUSTIFY_LEFT);
$printer -> setEmphasis(true);
$printer -> setTextSize(1, 1);
$printer -> text("Cliente: ".$venta->nombre." \n");

$printer -> text("Fecha: ".$fecha." Hora: ".$hora." \n");
$printer -> text("Cajero: ".$this->session->userdata("nombre")."  \n");
$printer -> feed();
$printer -> setEmphasis(false);
$printer -> setTextSize(1, 1);
//Detalle venta
$printer -> text("------------------------------------------");
$printer -> setEmphasis(true);
$printer -> text("CANT |       DETALLE     | PRECIO | TOTAL\n");
$printer -> setEmphasis(false);
$printer -> text("------------------------------------------");
$printer -> setTextSize(1, 1);
foreach($detalles as $detalle):

$printer -> text("".str_pad($detalle->cantidad, 4, " ", STR_PAD_RIGHT)."  ".str_pad(cortar($detalle->nombre), 21, " ", STR_PAD_RIGHT)." ".str_pad((number_format($detalle->precio,2)), 6, " ", STR_PAD_RIGHT)." ".str_pad((number_format($detalle->importe,2)), 6, " ", STR_PAD_LEFT)."".$detalle->tipo."\n");

endforeach;
foreach($detalles1 as $detalle1):

$printer -> text("".str_pad($detalle1->cantidad, 4, " ", STR_PAD_RIGHT)."  ".str_pad(cortar($detalle1->nombre), 21, " ", STR_PAD_RIGHT)." ".str_pad((number_format($detalle1->precio,2)), 6, " ", STR_PAD_RIGHT)." ".str_pad((number_format($detalle1->importe,2)), 6, " ", STR_PAD_LEFT)."".$detalle1->tipo."\n");

endforeach;

$cambio= number_format($total-$efectivo,2);
$gravado= number_format($gravados->gravado,2);
$exento= number_format($exentos->exento,2);

$printer -> setEmphasis(false);
$printer -> text("------------------------------------------");
$printer -> setEmphasis(true);
$printer -> text("G = Gravado       E = EXENTO\n");
$printer -> text("VENTAS GRAVADAS                  $ ".str_pad($gravado, 6, " ", STR_PAD_LEFT)."\n");
$printer -> text("VENTAS EXENTAS                   $ ".str_pad($exento, 6, " ", STR_PAD_LEFT)."\n");
//$printer -> text("VENTAS NO SUJETAS                $\n");
$printer -> text("SUB-TOTAL                        $ ".str_pad($total, 6, " ", STR_PAD_LEFT)."\n");
$printer -> setTextSize(1, 1);
$printer -> text("TOTAL A PAGAR                    $ ".str_pad($total, 6, " ", STR_PAD_LEFT)."\n");
$printer -> setTextSize(1, 1);
$printer -> feed();
$printer -> text("EFECTIVO:                        $ ".str_pad(number_format($efectivo,2), 6, " ", STR_PAD_LEFT)."\n");
$printer -> text("CAMBIO:                          $ ".str_pad($cambio, 6, " ", STR_PAD_LEFT)."\n");
$printer -> text("LE ATENDIO: ".$venta->usuario_v."\n");
$printer -> feed(2);
$printer -> setJustification(Printer::JUSTIFY_CENTER);
$printer -> setEmphasis(true);
$printer -> setTextSize(1, 1);
$printer -> text("¡Gracias por su compra!\n");
$printer -> feed();
$printer -> cut();

$printer -> close();

function cortar($string, $length=NULL)
{
    //Si no se especifica la longitud por defecto es 50
    if ($length == NULL)
        $length = 18;
    $stringDisplay = substr($string, 0, $length);
    if (strlen(strip_tags($string)) > $length)
        $stringDisplay .= '';
    return $stringDisplay;
}

?>


