
<?php 
require __DIR__ . '/vendor/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\PrintConnectors\CupsPrintConnector;

//$connector = new CupsPrintConnector("BEMA_TICKET");
$connector = new CupsPrintConnector("LX-350");
$printer = new Printer($connector);
//$printer -> pulse();
$total = $venta->total;
setlocale(LC_ALL,"es_ES");
$hora= date ("h:i:s a");
$fecha1= date ("d/m/y");
$fech2 = explode("/", $fecha1);
$fecha = $venta->fecha;
$fech1 = explode("-", $fecha);
$year= substr("$fech1[0]", -2);

//Encabezado

$printer -> text("   \n");
$printer -> text("   \n");
$printer -> text("   \n");
$printer -> text("   \n");
$printer -> text("   \n");
$printer -> text("   \n");
$printer -> text("   \n");
$printer -> text("   \n");
$printer -> text("   \n");
$printer -> text("   \n");
$printer -> text("                   ".$fech1[2]."          ".$fech1[1]."         ".$year." \n");
$printer -> text("   \n");
$printer -> text("     ".cortar4($venta->nombre)." \n");
$printer -> text("       ".cortar2($venta->direccion)." \n");
$printer -> text("       ".str_pad($venta->departamento, 23, " ", STR_PAD_RIGHT)."    ".str_pad($venta->nrc, 8, " ", STR_PAD_RIGHT)."\n");
$printer -> text("       ".str_pad($venta->nit, 23, " ", STR_PAD_RIGHT)."    ".str_pad(cortar3($venta->giro), 8, " ", STR_PAD_RIGHT)."\n");
$printer -> text("                -\n");
$printer -> text("                         -\n");
$printer -> text("   \n");

$iva13 = 1.13;


foreach($detalles as $detalle):

$printer -> text("  ".str_pad($detalle->cantidad, 4, " ", STR_PAD_RIGHT)." ".str_pad(cortar($detalle->nombre), 25, " ", STR_PAD_RIGHT)."  ".str_pad(number_format(($detalle->precio/$iva13),4), 7, " ", STR_PAD_RIGHT)."      ".str_pad(number_format(($detalle->importe/$iva13),4), 8, " ", STR_PAD_LEFT)."\n");
endforeach;

foreach($detalles1 as $detalle1):
$printer -> text("  ".str_pad($detalle1->cantidad, 4, " ", STR_PAD_RIGHT)." ".str_pad(cortar($detalle1->nombre), 25, " ", STR_PAD_RIGHT)."  ".str_pad($detalle1->precio, 5, "   ", STR_PAD_RIGHT)."  ".str_pad($detalle1->importe, 8, " ", STR_PAD_RIGHT)."\n");
endforeach;

$maxproducto= 18;
$cantproduct1= count($detalles);
$cantproduct2= count($detalles1);
$cantproduct= $cantproduct1+$cantproduct2;
$totalespac = $maxproducto-$cantproduct;
$space= str_repeat("\n", $totalespac);
$numletra = num2letras($total);
$valnum = explode(" ", $numletra);
$primlinea = ("".$valnum[0]." ".$valnum[1]." ".$valnum[2]." ".$valnum[3]."");
$seglinea = ("".$valnum[4]." ".$valnum[5]." ".$valnum[6]." ".$valnum[7]."");

$porcent13 = 0.13;
$gravado= number_format($gravados->gravado,2);
$exento= number_format($exentos->exento,2);
$iva = (($gravado/$iva13)*$porcent13);

$printer -> text("".$space."");

$printer -> text("                                    ".str_pad(number_format($exento, 2, '.', ','), 8, " ", STR_PAD_LEFT)." $ ".str_pad(number_format(($gravado/$iva13),4), 8, " ", STR_PAD_LEFT)." \n");
$printer -> text("   ".str_pad($primlinea, 34, " ", STR_PAD_RIGHT)."        $ ".str_pad(number_format($iva,4), 8, " ", STR_PAD_LEFT)."\n");
$printer -> text("     ".str_pad($seglinea, 38, " ", STR_PAD_RIGHT)."  $ ".str_pad(number_format($gravado, 4, '.', ','), 8, " ", STR_PAD_LEFT)."\n");
$printer -> text("                                             $ ".str_pad(number_format(0, 2, '.', ','), 8, " ", STR_PAD_LEFT)." \n");
$printer -> text("                                             $ ".str_pad(number_format(0, 2, '.', ','), 8, " ", STR_PAD_LEFT)." \n");
$printer -> text("                                             $ ".str_pad(number_format(0, 2, '.', ','), 8, " ", STR_PAD_LEFT)." \n");
$printer -> text("                                             $ ".str_pad(number_format($exento, 2, '.', ','), 8, " ", STR_PAD_LEFT)." \n");
$printer -> text("                                             $ ".str_pad(number_format($total, 2, '.', ','), 8, " ", STR_PAD_LEFT)." \n");

$printer -> text("   \n");
$printer -> text("   \n");


$printer -> close();

$connector1 = new NetworkPrintConnector("192.168.2.62", 9100);
$printer1 = new Printer($connector1);
$printer1 -> pulse();
$printer1 -> close();

function cortar($string, $length=NULL)
{
    //Si no se especifica la longitud por defecto es 50
    if ($length == NULL)
        $length = 25;
    $stringDisplay = substr($string, 0, $length);
    if (strlen(strip_tags($string)) > $length)
        $stringDisplay .= '';
    return $stringDisplay;
}

function cortar2($string, $length=NULL)
{
    //Si no se especifica la longitud por defecto es 50
    if ($length == NULL)
        $length = 49;
    $stringDisplay = substr($string, 0, $length);
    if (strlen(strip_tags($string)) > $length)
        $stringDisplay .= '';
    return $stringDisplay;
}

function cortar3($string, $length=NULL)
{
    //Si no se especifica la longitud por defecto es 50
    if ($length == NULL)
        $length = 22;
    $stringDisplay = substr($string, 0, $length);
    if (strlen(strip_tags($string)) > $length)
        $stringDisplay .= '';
    return $stringDisplay;
}

function cortar4($string, $length=NULL)
{
    //Si no se especifica la longitud por defecto es 50
    if ($length == NULL)
        $length = 50;
    $stringDisplay = substr($string, 0, $length);
    if (strlen(strip_tags($string)) > $length)
        $stringDisplay .= '';
    return $stringDisplay;
}

function num2letras($num, $fem = false, $dec = true) { 
   $matuni[2]  = "DOS"; 
   $matuni[3]  = "TRES"; 
   $matuni[4]  = "CUATRO"; 
   $matuni[5]  = "CINCO"; 
   $matuni[6]  = "SEIS"; 
   $matuni[7]  = "SIETE"; 
   $matuni[8]  = "OCHO"; 
   $matuni[9]  = "NUEVE"; 
   $matuni[10] = "DIEZ"; 
   $matuni[11] = "ONCE"; 
   $matuni[12] = "DOCE"; 
   $matuni[13] = "TRECE"; 
   $matuni[14] = "CATORCE"; 
   $matuni[15] = "QUINCE"; 
   $matuni[16] = "DIECISEIS"; 
   $matuni[17] = "DIECISIETE"; 
   $matuni[18] = "DIECIOCHO"; 
   $matuni[19] = "DIECINUEVE"; 
   $matuni[20] = "VEINTE"; 
   $matunisub[2] = "DOS"; 
   $matunisub[3] = "TRES"; 
   $matunisub[4] = "CUATRO"; 
   $matunisub[5] = "QUIN"; 
   $matunisub[6] = "SEIS"; 
   $matunisub[7] = "SETE"; 
   $matunisub[8] = "OCHO"; 
   $matunisub[9] = "NOVE"; 

   $matdec[2] = "VEINT"; 
   $matdec[3] = "TREINTA"; 
   $matdec[4] = "CUARENTA"; 
   $matdec[5] = "CINCUENTA"; 
   $matdec[6] = "SESENTA"; 
   $matdec[7] = "SETENTA"; 
   $matdec[8] = "OCHENTA"; 
   $matdec[9] = "NOVENTA"; 
   $matsub[3]  = 'MILL'; 
   $matsub[5]  = 'BILL'; 
   $matsub[7]  = 'MILL'; 
   $matsub[9]  = 'TRILL'; 
   $matsub[11] = 'MILL'; 
   $matsub[13] = 'BILL'; 
   $matsub[15] = 'MILL'; 
   $matmil[4]  = 'MILLONES'; 
   $matmil[6]  = 'BILLONES'; 
   $matmil[7]  = 'DE BILLONES'; 
   $matmil[8]  = 'MILLONES DE BILLONES'; 
   $matmil[10] = 'TRILLONES'; 
   $matmil[11] = 'DE TRILLONES'; 
   $matmil[12] = 'MILLONES DE TRILLONES'; 
   $matmil[13] = 'DE TRILLONES'; 
   $matmil[14] = 'BILLONES DE TRILLONES'; 
   $matmil[15] = 'DE BILLONES DE TRILLONES'; 
   $matmil[16] = 'MILLONES DE BILLONES DE TRILLONES'; 
   
   //Zi hack
   $float=explode('.',$num);
   $num=$float[0];

   $num = trim((string)@$num); 
   if ($num[0] == '-') { 
      $neg = 'menos '; 
      $num = substr($num, 1); 
   }else 
      $neg = ''; 
   while ($num[0] == '0') $num = substr($num, 1); 
   if ($num[0] < '1' or $num[0] > 9) $num = '0' . $num; 
   $zeros = true; 
   $punt = false; 
   $ent = ''; 
   $fra = ''; 
   for ($c = 0; $c < strlen($num); $c++) { 
      $n = $num[$c]; 
      if (! (strpos(".,'''", $n) === false)) { 
         if ($punt) break; 
         else{ 
            $punt = true; 
            continue; 
         } 

      }elseif (! (strpos('0123456789', $n) === false)) { 
         if ($punt) { 
            if ($n != '0') $zeros = false; 
            $fra .= $n; 
         }else 

            $ent .= $n; 
      }else 

         break; 

   } 
   $ent = '     ' . $ent; 
   if ($dec and $fra and ! $zeros) { 
      $fin = ' coma'; 
      for ($n = 0; $n < strlen($fra); $n++) { 
         if (($s = $fra[$n]) == '0') 
            $fin .= ' cero'; 
         elseif ($s == '1') 
            $fin .= $fem ? ' UNA' : ' UN'; 
         else 
            $fin .= ' ' . $matuni[$s]; 
      } 
   }else 
      $fin = ''; 
   if ((int)$ent === 0) return 'cero ' . $fin; 
   $tex = ''; 
   $sub = 0; 
   $mils = 0; 
   $neutro = false; 
   while ( ($num = substr($ent, -3)) != '   ') { 
      $ent = substr($ent, 0, -3); 
      if (++$sub < 3 and $fem) { 
         $matuni[1] = 'UNA'; 
         $subcent = 'as'; 
      }else{ 
         $matuni[1] = $neutro ? 'UN' : 'UNO'; 
         $subcent = 'OS'; 
      } 
      $t = ''; 
      $n2 = substr($num, 1); 
      if ($n2 == '00') { 
      }elseif ($n2 < 21) 
         $t = ' ' . $matuni[(int)$n2]; 
      elseif ($n2 < 30) { 
         $n3 = $num[2]; 
         if ($n3 != 0) $t = 'I' . $matuni[$n3]; 
         $n2 = $num[1]; 
         $t = ' ' . $matdec[$n2] . $t; 
      }else{ 
         $n3 = $num[2]; 
         if ($n3 != 0) $t = ' Y ' . $matuni[$n3]; 
         $n2 = $num[1]; 
         $t = ' ' . $matdec[$n2] . $t; 
      } 
      $n = $num[0]; 
      if ($n == 1) { 
         $t = ' CIENTO' . $t; 
      }elseif ($n == 5){ 
         $t = ' ' . $matunisub[$n] . 'IENT' . $subcent . $t; 
      }elseif ($n != 0){ 
         $t = ' ' . $matunisub[$n] . 'CIENT' . $subcent . $t; 
      } 
      if ($sub == 1) { 
      }elseif (! isset($matsub[$sub])) { 
         if ($num == 1) { 
            $t = ' MIL'; 
         }elseif ($num > 1){ 
            $t .= ' MIL'; 
         } 
      }elseif ($num == 1) { 
         $t .= ' ' . $matsub[$sub] . '?N'; 
      }elseif ($num > 1){ 
         $t .= ' ' . $matsub[$sub] . 'ONES'; 
      }   
      if ($num == '000') $mils ++; 
      elseif ($mils != 0) { 
         if (isset($matmil[$sub])) $t .= ' ' . $matmil[$sub]; 
         $mils = 0; 
      } 
      $neutro = true; 
      $tex = $t . $tex; 
   } 
 $tex = $neg . substr($tex, 1) . $fin; 
   //Zi hack --> return ucfirst($tex);
   $end_num=ucfirst($tex).' '.$float[1].'/100 DOLARES';
   return $end_num;
} 

 

?>




