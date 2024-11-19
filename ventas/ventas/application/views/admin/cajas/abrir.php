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

$printer -> close();


?>


