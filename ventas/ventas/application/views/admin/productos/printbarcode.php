<?php
/* Change to the correct path if you copy this example! */
require __DIR__ . '/vendor/autoload.php';
use Mike42\Escpos\Printer;
//use Mike42\Escpos\PrintConnectors\FilePrintConnector;
//use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\PrintConnectors\CupsPrintConnector;


/* Most printers are open on port 9100, so you just need to know the IP 
 * address of your receipt printer, and then fsockopen() it on that port.
 */

$connector = new NetworkPrintConnector("192.168.2.145", 9100);
    
    /* Print a "Hello world" receipt" */
$printer = new Printer($connector);
$efectivo= $_POST['efectivo'];


$printer->setBarcodeHeight(70);
$printer->setBarcodeWidth(2);
//$printer->barcode("".$producto->barcode."", Printer::BARCODE_CODE93);
$printer->barcode($producto->codigo, Printer::BARCODE_CODE93);
$printer->selectPrintMode();
$printer->feed();


$testStr = "librerialincolnsv.com";
$printer -> qrCode($testStr);

$printer -> text(" ".$efectivo." \n");


$printer -> feed();
 

$printer -> cut();

$printer -> close();

?>
