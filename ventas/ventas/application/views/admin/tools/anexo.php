<?php
require __DIR__ . '/pdf/fpdf.php';

class PDF extends FPDF
{

function Header()
{
    // Logo
    //$this->Image('https://elsalvadoreshermoso.com/wp-content/uploads/2019/02/escudo-de-El_Salvador.png',20,3,18,18,'PNG');
    //$this->Ln(2);
}

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

$numletra = num2letras($venta->total);




function obtenerFechaEnLetra($fecha){
    $num = date("j", strtotime($fecha));
    $anno = date("Y", strtotime($fecha));
    $mes = array('ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE');
    $mes = $mes[(date('m', strtotime($fecha))*1)-1];
    return $num.' DE '.$mes.' DEL '.$anno;
}

$fecha_venta = $venta->fecha;

$fecha_solicitud = date("Y-m-d",strtotime($venta->fecha."- 1 week"));

$pdf = new PDF();
// Títulos de las columnas
// Carga de datos
$pdf->AddFont('Garamond','','garamond.php');
$pdf->AddFont('Garamond','B','garamondb.php');
$pdf->AddFont('Garamond','I','garamondi.php');
$pdf->AddFont('Garamond','BI','garamondbi.php');
//SOLICITUD DE COTIZACION LINCOLN
$pdf->AddPage();
$pdf->SetMargins(20, 10, 15);
//$pdf->Image('https://elsalvadoreshermoso.com/wp-content/uploads/2019/02/escudo-de-El_Salvador.png',20,3,18,18,'PNG');

$pdf->SetFont('Garamond','I',16);
$pdf->cell(190,6,utf8_decode('MINISTERIO DE EDUCACIÓN'),0,1,'C',0);
$pdf->SetFont('Garamond','I',12);
$pdf->cell(171,6,utf8_decode('Solicitud de Cotización de Bienes y Servicios'),0,1,'C',0);
$pdf->SetFont('Garamond','BI',10);
$pdf->cell(35,6,utf8_decode('Institución Educativa:'),0,0,'L',0);
$pdf->SetFont('Garamond','U',11);
$pdf->cell(171,6,utf8_decode($venta->nombre),0,1,'L',0);
$pdf->SetFont('Garamond','BI',10);
$pdf->cell(8,6,utf8_decode('Sres:'),0,0,'L',0);
$pdf->SetFont('Garamond','U',11);
$pdf->cell(171,6,utf8_decode('LIBRERIA PAPELERIA Y SUPERMERCADO ABRAHAM LINCOLN'),0,1,'L',0);
$pdf->SetFont('Garamond','BI',10);
$pdf->cell(25,6,utf8_decode('Lugar y Fecha:'),0,0,'L',0);
$pdf->SetFont('Garamond','U',11);
$pdf->cell(171,6,utf8_decode("USULUTÁN ".obtenerFechaEnLetra($fecha_solicitud).""),0,1,'L',0);
$pdf->SetFont('Garamond','BI',10);
$pdf->MultiCell(190, 6,utf8_decode("Solicitamos cotización de los bienes o servicios abajo detallados, presentar oferta en original y copia a nombre:"), 0 , 'L' , false);
$pdf->SetFont('Garamond','BI',10);
$pdf->cell(18,6,utf8_decode($venta->nombre),0,1,'L',0);
$pdf->SetFont('Garamond','BI',10);
$pdf->cell(18,6,utf8_decode('Especificando las condiciones de compra.'),0,1,'L',0);
$pdf->SetFont('Garamond','B',11);
$pdf->cell(23,12, 'Cant.',1,0,'C',0);
$pdf->cell(25,12,'Unidad',1,0,'C',0);
$pdf->SetY(58);
$pdf->SetX(68);
$pdf->cell(80,12,utf8_decode('Descripción'),1,0,'C',0);
$pdf->cell(23, 12,'Precio',1,0,'C',0);
$pdf->SetY(58);
$pdf->SetX(171);
$pdf->cell(25,12,'Total',1,1,'C',0);


function cortar($string, $length=NULL)
{
    //Si no se especifica la longitud por defecto es 50
    if ($length == NULL)
        $length = 34;
    $stringDisplay = substr($string, 0, $length);
    if (strlen(strip_tags($string)) > $length)
        $stringDisplay .= '';
    return $stringDisplay;
}

$pdf->SetFont('Garamond','',11);
foreach($detalles as $detalle):

$pdf->cell(23,6,$detalle->cantidad,1,0,'C',0);
$pdf->cell(25,6,$detalle->unidad,1,0,'C',0);
$pdf->cell(80,6,utf8_decode(cortar($detalle->nombre)),1,0,'L',0);
$pdf->cell(23,6,number_format($detalle->precio,2),1,0,'C',0);
$pdf->cell(25,6,number_format($detalle->importe,2),1,1,'C',0);
endforeach;

foreach($detalles1 as $detalle1):

$pdf->cell(23,6,$detalle1->cantidad,1,0,'C',0);
$pdf->cell(25,6,$detalle1->unidad,1,0,'C',0);
$pdf->cell(80,6,utf8_decode(cortar2($detalle1->nombre)),1,0,'L',0);
$pdf->cell(23,6,number_format($detalle1->precio,2),1,0,'C',0);
$pdf->cell(25,6,number_format($detalle1->importe,2),1,1,'C',0);
endforeach;

$maxproducto= 24;
$cantproduct1= count($detalles);
$cantproduct2= count($detalles1);
$cantproduct= $cantproduct1+$cantproduct2;
$totalespac = $maxproducto-$cantproduct;

for ($i = 1; $i <= $totalespac; $i++) {
$pdf->cell(23,6,'',1,0,'C',0);
$pdf->cell(25,6,'',1,0,'C',0);
$pdf->cell(80,6,'',1,0,'L',0);
$pdf->cell(23,6,'',1,0,'C',0);
$pdf->cell(25,6,'',1,1,'C',0);
}

$pdf->SetFont('Garamond','B',11);
$pdf->cell(151,6,'TOTAL O PASAN',1,0,'C',0);
$pdf->cell(25,6,("$ ".$venta->total.""),1,1,'C',0);
$pdf->Ln(5);
$pdf->SetFont('Garamond','BI',11);
$pdf->cell(18,6,utf8_decode('Especificar:'),0,1,'L',0);
$pdf->SetFont('Garamond','BI',11);
$pdf->cell(18,6,utf8_decode('Plazo o Fecha de Entrega: 2 DÍAS DESPUES DE CONFIRMAR PEDIDO.'),0,1,'L',0);
$pdf->cell(18,6,utf8_decode('Cotización valedera hasta: 10 DÍAS HÁBILES'),0,1,'L',0);
$pdf->cell(18,6,utf8_decode('Observaciones:'),0,1,'L',0);
$pdf->Ln(10);
$pdf->cell(18,6,utf8_decode('F:________________________________                            F:________________________________'),0,1,'L',0);
$pdf->SetFont('Garamond','I',11);
$pdf->cell(18,6,utf8_decode('                  Firma de Presidente CDE                                                                                          AUTORIZADO'),0,1,'L',0);

//FIN DE SOLICITUD DE COTIZACION LINCOLN

//SOLICITUD DE COTIZACION MONTENEGRO
$pdf->AddPage();
$pdf->SetMargins(20, 10, 15);
//$pdf->Image('https://elsalvadoreshermoso.com/wp-content/uploads/2019/02/escudo-de-El_Salvador.png',20,3,18,18,'PNG');

$pdf->SetFont('Garamond','I',16);
$pdf->cell(171,6,utf8_decode('MINISTERIO DE EDUCACIÓN'),0,1,'C',0);
$pdf->SetFont('Garamond','I',12);
$pdf->cell(171,6,utf8_decode('Solicitud de Cotización de Bienes y Servicios'),0,1,'C',0);
$pdf->SetFont('Garamond','BI',10);
$pdf->cell(35,6,utf8_decode('Institución Educativa:'),0,0,'L',0);
$pdf->SetFont('Garamond','U',11);
$pdf->cell(171,6,utf8_decode($venta->nombre),0,1,'L',0);
$pdf->SetFont('Garamond','BI',10);
$pdf->cell(8,6,utf8_decode('Sres:'),0,0,'L',0);
$pdf->SetFont('Garamond','U',11);
$pdf->cell(171,6,utf8_decode('LIBRERÍA Y VARIEDADES MONTENEGRO'),0,1,'L',0);
$pdf->SetFont('Garamond','BI',10);
$pdf->cell(25,6,utf8_decode('Lugar y Fecha:'),0,0,'L',0);
$pdf->SetFont('Garamond','U',11);
$pdf->cell(171,6,utf8_decode("USULUTÁN ".obtenerFechaEnLetra($fecha_solicitud).""),0,1,'L',0);
$pdf->SetFont('Garamond','BI',10);
$pdf->MultiCell(190, 6,utf8_decode("Solicitamos cotización de los bienes o servicios abajo detallados, presentar oferta en original y copia a nombre:"), 0 , 'L' , false);
$pdf->SetFont('Garamond','BI',10);
$pdf->cell(18,6,utf8_decode($venta->nombre),0,1,'L',0);
$pdf->SetFont('Garamond','BI',10);
$pdf->cell(18,6,utf8_decode('Especificando las condiciones de compra.'),0,1,'L',0);
$pdf->SetFont('Garamond','B',11);
$pdf->cell(23,12, 'Cant.',1,0,'C',0);
$pdf->cell(25,12,'Unidad',1,0,'C',0);
$pdf->SetY(58);
$pdf->SetX(68);
$pdf->cell(80,12,utf8_decode('Descripción'),1,0,'C',0);
$pdf->cell(23, 12,'Precio',1,0,'C',0);
$pdf->SetY(58);
$pdf->SetX(171);
$pdf->cell(25,12,'Total',1,1,'C',0);



$pdf->SetFont('Garamond','',11);
foreach($detalles as $detalle):

$pdf->cell(23,6,$detalle->cantidad,1,0,'C',0);
$pdf->cell(25,6,$detalle->unidad,1,0,'C',0);
$pdf->cell(80,6,utf8_decode(cortar($detalle->nombre)),1,0,'L',0);
$pdf->cell(23,6,number_format(($detalle->precio * 1.10),2),1,0,'C',0);
$pdf->cell(25,6,number_format(($detalle->importe * 1.10),2),1,1,'C',0);
endforeach;

foreach($detalles1 as $detalle1):

$pdf->cell(23,6,$detalle1->cantidad,1,0,'C',0);
$pdf->cell(25,6,$detalle1->unidad,1,0,'C',0);
$pdf->cell(80,6,utf8_decode(cortar2($detalle1->nombre)),1,0,'L',0);
$pdf->cell(23,6,number_format(($detalle1->precio * 1.10),2),1,0,'C',0);
$pdf->cell(25,6,number_format(($detalle1->importe * 1.10),2),1,1,'C',0);
endforeach;

$maxproducto= 24;
$cantproduct1= count($detalles);
$cantproduct2= count($detalles1);
$cantproduct= $cantproduct1+$cantproduct2;
$totalespac = $maxproducto-$cantproduct;

for ($i = 1; $i <= $totalespac; $i++) {
$pdf->cell(23,6,'',1,0,'C',0);
$pdf->cell(25,6,'',1,0,'C',0);
$pdf->cell(80,6,'',1,0,'L',0);
$pdf->cell(23,6,'',1,0,'C',0);
$pdf->cell(25,6,'',1,1,'C',0);
}

$pdf->SetFont('Garamond','B',11);
$pdf->cell(151,6,'TOTAL O PASAN',1,0,'C',0);
$pdf->cell(25,6,("$ ".number_format(($venta->total * 1.10),2).""),1,1,'C',0);
$pdf->Ln(5);
$pdf->SetFont('Garamond','BI',11);
$pdf->cell(18,6,utf8_decode('Especificar:'),0,1,'L',0);
$pdf->SetFont('Garamond','BI',11);
$pdf->cell(18,6,utf8_decode('Plazo o Fecha de Entrega: 2 DÍAS DESPUES DE CONFIRMAR PEDIDO.'),0,1,'L',0);
$pdf->cell(18,6,utf8_decode('Cotización valedera hasta: 10 DÍAS HÁBILES'),0,1,'L',0);
$pdf->cell(18,6,utf8_decode('Observaciones:'),0,1,'L',0);
$pdf->Ln(10);
$pdf->cell(18,6,utf8_decode('F:________________________________                            F:________________________________'),0,1,'L',0);
$pdf->SetFont('Garamond','I',11);
$pdf->cell(18,6,utf8_decode('                  Firma de Presidente CDE                                                                                          AUTORIZADO'),0,1,'L',0);

//FIN DE SOLICITUD DE COTIZACION MONTENEGRO







//SOLICITUD DE COTIZACION ZODIAC
$pdf->AddPage();
$pdf->SetMargins(20, 10, 15);
//$pdf->Image('https://elsalvadoreshermoso.com/wp-content/uploads/2019/02/escudo-de-El_Salvador.png',20,3,18,18,'PNG');

$pdf->SetFont('Garamond','I',16);
$pdf->cell(171,6,utf8_decode('MINISTERIO DE EDUCACIÓN'),0,1,'C',0);
$pdf->SetFont('Garamond','I',12);
$pdf->cell(171,6,utf8_decode('Solicitud de Cotización de Bienes y Servicios'),0,1,'C',0);
$pdf->SetFont('Garamond','BI',10);
$pdf->cell(35,6,utf8_decode('Institución Educativa:'),0,0,'L',0);
$pdf->SetFont('Garamond','U',11);
$pdf->cell(171,6,utf8_decode($venta->nombre),0,1,'L',0);
$pdf->SetFont('Garamond','BI',10);
$pdf->cell(8,6,utf8_decode('Sres:'),0,0,'L',0);
$pdf->SetFont('Garamond','U',11);
$pdf->cell(171,6,utf8_decode('LIBRERIA ZODIAC'),0,1,'L',0);
$pdf->SetFont('Garamond','BI',10);
$pdf->cell(25,6,utf8_decode('Lugar y Fecha:'),0,0,'L',0);
$pdf->SetFont('Garamond','U',11);
$pdf->cell(171,6,utf8_decode("USULUTÁN ".obtenerFechaEnLetra($fecha_solicitud).""),0,1,'L',0);
$pdf->SetFont('Garamond','BI',10);
$pdf->MultiCell(190, 6,utf8_decode("Solicitamos cotización de los bienes o servicios abajo detallados, presentar oferta en original y copia a nombre:"), 0 , 'L' , false);
$pdf->SetFont('Garamond','BI',10);
$pdf->cell(18,6,utf8_decode($venta->nombre),0,1,'L',0);
$pdf->SetFont('Garamond','BI',10);
$pdf->cell(18,6,utf8_decode('Especificando las condiciones de compra.'),0,1,'L',0);
$pdf->SetFont('Garamond','B',11);
$pdf->cell(23,12, 'Cant.',1,0,'C',0);
$pdf->cell(25,12,'Unidad',1,0,'C',0);
$pdf->SetY(58);
$pdf->SetX(68);
$pdf->cell(80,12,utf8_decode('Descripción'),1,0,'C',0);
$pdf->cell(23, 12,'Precio',1,0,'C',0);
$pdf->SetY(58);
$pdf->SetX(171);
$pdf->cell(25,12,'Total',1,1,'C',0);



$pdf->SetFont('Garamond','',11);
foreach($detalles as $detalle):

$pdf->cell(23,6,$detalle->cantidad,1,0,'C',0);
$pdf->cell(25,6,$detalle->unidad,1,0,'C',0);
$pdf->cell(80,6,utf8_decode(cortar($detalle->nombre)),1,0,'L',0);
$pdf->cell(23,6,number_format(($detalle->precio * 1.12),2),1,0,'C',0);
$pdf->cell(25,6,number_format(($detalle->importe * 1.12),2),1,1,'C',0);
endforeach;

foreach($detalles1 as $detalle1):

$pdf->cell(23,6,$detalle1->cantidad,1,0,'C',0);
$pdf->cell(25,6,$detalle1->unidad,1,0,'C',0);
$pdf->cell(80,6,utf8_decode(cortar2($detalle1->nombre)),1,0,'L',0);
$pdf->cell(23,6,number_format(($detalle1->precio * 1.12),2),1,0,'C',0);
$pdf->cell(25,6,number_format(($detalle1->importe * 1.12),2),1,1,'C',0);
endforeach;

$maxproducto= 24;
$cantproduct1= count($detalles);
$cantproduct2= count($detalles1);
$cantproduct= $cantproduct1+$cantproduct2;
$totalespac = $maxproducto-$cantproduct;

for ($i = 1; $i <= $totalespac; $i++) {
$pdf->cell(23,6,'',1,0,'C',0);
$pdf->cell(25,6,'',1,0,'C',0);
$pdf->cell(80,6,'',1,0,'L',0);
$pdf->cell(23,6,'',1,0,'C',0);
$pdf->cell(25,6,'',1,1,'C',0);
}

$pdf->SetFont('Garamond','B',11);
$pdf->cell(151,6,'TOTAL O PASAN',1,0,'C',0);
$pdf->cell(25,6,("$ ".number_format(($venta->total * 1.12),2).""),1,1,'C',0);
$pdf->Ln(5);
$pdf->SetFont('Garamond','BI',11);
$pdf->cell(18,6,utf8_decode('Especificar:'),0,1,'L',0);
$pdf->SetFont('Garamond','BI',11);
$pdf->cell(18,6,utf8_decode('Plazo o Fecha de Entrega: 2 DÍAS DESPUES DE CONFIRMAR PEDIDO.'),0,1,'L',0);
$pdf->cell(18,6,utf8_decode('Cotización valedera hasta: 10 DÍAS HÁBILES'),0,1,'L',0);
$pdf->cell(18,6,utf8_decode('Observaciones:'),0,1,'L',0);
$pdf->Ln(10);
$pdf->cell(18,6,utf8_decode('F:________________________________                            F:________________________________'),0,1,'L',0);
$pdf->SetFont('Garamond','I',11);
$pdf->cell(18,6,utf8_decode('                  Firma de Presidente CDE                                                                                          AUTORIZADO'),0,1,'L',0);

//FIN DE SOLICITUD DE COTIZACION ZODIAC


//ORDEN DE COMPRA
$pdf->AddPage();
$pdf->SetMargins(20, 10, 15);

//$pdf->Image('https://elsalvadoreshermoso.com/wp-content/uploads/2019/02/escudo-de-El_Salvador.png',20,13,18,18,'PNG');
$pdf->SetFont('Garamond','I',16);
$pdf->cell(171,6,utf8_decode('MINISTERIO DE EDUCACIÓN'),0,1,'C',0);
$pdf->SetFont('Garamond','I',13);
$pdf->cell(171,6,utf8_decode('Orden de Compra'),0,1,'C',0);
$pdf->SetFont('Garamond','',11);
$pdf->cell(14,6,utf8_decode('Señores:'),0,0,'L',0);
$pdf->SetFont('Garamond','B',11);
$pdf->cell(171,6,utf8_decode('LIBRERÍA PAPELERÍA Y SUPERMERCADO ABRAHAM LINCOLN'),0,1,'L',0);

$pdf->SetFont('Garamond','',11);
$pdf->cell(18,6,utf8_decode('Atentamente le solicito suministrar en nombre de:'),0,1,'L',0);
$pdf->SetFont('Garamond','B',11);
$pdf->cell(18,6,utf8_decode($venta->nombre),0,1,'L',0);
$pdf->MultiCell(190, 6,utf8_decode("Los bienes o servicios que se detallan a continuación:"), 0 , 'L' , false);
$pdf->Ln(4);
$pdf->SetFont('Garamond','BI',11);
$pdf->Cell(23,12, 'Cant.',1,0,'C',0);
$pdf->Cell(25, 12,'Unidades', 1,0,'C',0);

$pdf->SetY(50);
$pdf->SetX(68);

$pdf->cell(80,12,utf8_decode('Descripción'),1,0,'C',0);
$pdf->MultiCell(23, 12,'Precio Unit', 1 , 'C' , false);
$pdf->SetY(50);
$pdf->SetX(171);
$pdf->cell(25,12,'Total',1,1,'C',0);


function cortar1($string, $length=NULL)
{
    //Si no se especifica la longitud por defecto es 50
    if ($length == NULL)
        $length = 34;
    $stringDisplay = substr($string, 0, $length);
    if (strlen(strip_tags($string)) > $length)
        $stringDisplay .= '';
    return $stringDisplay;
}

$pdf->SetFont('Garamond','',11);
foreach($detalles as $detalle):

$pdf->cell(23,6,$detalle->cantidad,1,0,'C',0);
$pdf->cell(25,6,$detalle->unidad,1,0,'C',0);
$pdf->cell(80,6,utf8_decode(cortar1($detalle->nombre)),1,0,'L',0);
$pdf->cell(23,6,number_format($detalle->precio,2),1,0,'C',0);
$pdf->cell(25,6,number_format($detalle->importe,2),1,1,'C',0);
endforeach;

foreach($detalles1 as $detalle1):

$pdf->cell(23,6,$detalle1->cantidad,1,0,'C',0);
$pdf->cell(25,6,$detalle1->unidad,1,0,'C',0);
$pdf->cell(80,6,utf8_decode(cortar2($detalle1->nombre)),1,0,'L',0);
$pdf->cell(23,6,number_format($detalle1->precio,2),1,0,'C',0);
$pdf->cell(25,6,number_format($detalle1->importe,2),1,1,'C',0);
endforeach;

$maxproducto= 24;
$cantproduct1= count($detalles);
$cantproduct2= count($detalles1);
$cantproduct= $cantproduct1+$cantproduct2;
$totalespac = $maxproducto-$cantproduct;

for ($i = 1; $i <= $totalespac; $i++) {
$pdf->cell(23,6,'',1,0,'C',0);
$pdf->cell(25,6,'',1,0,'C',0);
$pdf->cell(80,6,'',1,0,'L',0);
$pdf->cell(23,6,'',1,0,'C',0);
$pdf->cell(25,6,'',1,1,'C',0);
}


$pdf->SetFont('Garamond','B',11);
$pdf->cell(151,6,'TOTAL',1,0,'C',0);
$pdf->cell(25,6,("$ ".$venta->total.""),1,1,'C',0);
$pdf->Ln(5);
$pdf->SetFont('Garamond','',11);
$pdf->MultiCell(190, 6,utf8_decode("Para efecto de cobro esta orden de compra, original y copia de facturas de consumidor final a nombre de:"), 0 , 'L' , false);
$pdf->SetFont('Garamond','B',11);
$pdf->cell(18,6,utf8_decode($venta->nombre),0,1,'L',0);
$pdf->SetFont('Garamond','',11); 
$pdf->cell(23,6,utf8_decode('Lugar y Fecha:'),0,0,'L',0);
$pdf->SetFont('Garamond','U',11); 
$pdf->cell(18,6,utf8_decode("USULUTÁN ".obtenerFechaEnLetra($fecha_venta).""),0,1,'L',0);
$pdf->Ln(6);
$pdf->SetFont('Garamond','I',11);
$pdf->cell(18,6,utf8_decode('_____________________________________                              F:________________________________'),0,1,'L',0);
$pdf->cell(18,6,utf8_decode('    Nombre del Encargado de Compras                                                             AUTORIZADO'),0,1,'L',0);
$pdf->Ln(6);

$pdf->cell(18,6,utf8_decode(' Digna Ysabel Ferrufino de Caminos                                              F:________________________________'),0,1,'L',0);
$pdf->cell(18,6,utf8_decode('          Nombre del Suministrante                                                                       AUTORIZADO'),0,1,'L',0);
//FIN DE ORDEN DE COMPRA

//ACTA DE RECEPCION
$pdf->AddPage();
$pdf->SetMargins(20, 5, 15);

//$pdf->Image('https://elsalvadoreshermoso.com/wp-content/uploads/2019/02/escudo-de-El_Salvador.png',20,3,18,18,'PNG');
$pdf->SetFont('Garamond','I',16);
$pdf->cell(171,6,utf8_decode('MINISTERIO DE EDUCACIÓN'),0,1,'C',0);
$pdf->SetFont('Garamond','I',13);
$pdf->cell(171,6,utf8_decode('Acta de Recepción de Bienes y/o Servicios'),0,1,'C',0);
$pdf->SetFont('Garamond','BI',11);
$pdf->Ln(8);
$pdf->Ln(3);
$pdf->cell(63,6,utf8_decode('CÓDIGO DE INFRAESTRUCTURA:'),0,0,'L',0);
$pdf->SetFont('Garamond','',12);
$pdf->cell(10,6,utf8_decode($venta->codcde),0,1,'L',0);
$pdf->SetFont('Garamond','BI',11);
$pdf->cell(34,6,utf8_decode('LUGAR Y FECHA:'),0,0,'L',0);
$pdf->SetFont('Garamond','U',11); 
$pdf->cell(18,6,utf8_decode("USULUTÁN ".obtenerFechaEnLetra($fecha_venta).""),0,1,'L',0);
$pdf->SetFont('Garamond','I',10);
$pdf->MultiCell(190, 6,utf8_decode("EL SUSCRITO DIRECTOR HACE CONSTAR QUE HA RECIBIDO DE ACUERDO A LO CONVENIDO CON:"), 0 , 'L' , false);
$pdf->SetFont('Garamond','U',10);
$pdf->cell(75,6,utf8_decode('LIBRERÍA Y PAPELERÍA ABRAHAM LINCOLN '),0,0,'L',0);
$pdf->SetFont('Garamond','I',10);
$pdf->cell(26,6,utf8_decode('LOS BIENES Y/O SERVICIOS QUE SE DETALLAN A CONTINUACIÓN:'),0,0,'L',0);

$pdf->Ln(9);
$pdf->SetFont('Garamond','BI',11);
$pdf->cell(80,12,utf8_decode('Descripción o Concepto'),1,0,'C',0);
$pdf->SetY(60);
$pdf->SetX(100);
$pdf->MultiCell(25, 6,utf8_decode('Unidad de Medida'), 1 , 'C' , false);
$pdf->SetY(60);
$pdf->SetX(125);
$pdf->MultiCell(23, 6,'Cantidad Recibida', 1 , 'C' , false);
$pdf->SetY(60);
$pdf->SetX(148);
$pdf->MultiCell(23, 6,'Precio Unitario', 1 , 'C' , false);
$pdf->SetY(60);
$pdf->SetX(171);
$pdf->cell(25,12,'Valor Total',1,1,'C',0);


function cortar2($string, $length=NULL)
{
    //Si no se especifica la longitud por defecto es 50
    if ($length == NULL)
        $length = 34;
    $stringDisplay = substr($string, 0, $length);
    if (strlen(strip_tags($string)) > $length)
        $stringDisplay .= '';
    return $stringDisplay;
}

$pdf->SetFont('Garamond','',11);
foreach($detalles as $detalle):

$pdf->cell(80,6,utf8_decode(cortar2($detalle->nombre)),1,0,'L',0);
$pdf->cell(25,6,$detalle->unidad,1,0,'C',0);
$pdf->cell(23,6,$detalle->cantidad,1,0,'C',0);
$pdf->cell(23,6,number_format($detalle->precio,2),1,0,'C',0);
$pdf->cell(25,6,number_format($detalle->importe,2),1,1,'C',0);
endforeach;

foreach($detalles1 as $detalle1):

$pdf->cell(80,6,utf8_decode(cortar2($detalle1->nombre)),1,0,'L',0);
$pdf->cell(25,6,$detalle1->unidad,1,0,'C',0);
$pdf->cell(23,6,$detalle1->cantidad,1,0,'C',0);
$pdf->cell(23,6,number_format($detalle1->precio,2),1,0,'C',0);
$pdf->cell(25,6,number_format($detalle1->importe,2),1,1,'C',0);
endforeach;

$maxproducto= 24;
$cantproduct1= count($detalles);
$cantproduct2= count($detalles1);
$cantproduct= $cantproduct1+$cantproduct2;
$totalespac = $maxproducto-$cantproduct;

for ($i = 1; $i <= $totalespac; $i++) {
$pdf->cell(80,6,'',1,0,'L',0);
$pdf->cell(25,6,'',1,0,'C',0);
$pdf->cell(23,6,'',1,0,'C',0);
$pdf->cell(23,6,'',1,0,'C',0);
$pdf->cell(25,6,'',1,1,'C',0);
}


$pdf->SetFont('Garamond','',11);
$pdf->cell(151,6,("Total en letras: ".$numletra.""),1,0,'L',0);
$pdf->SetFont('Garamond','B',11);
$pdf->cell(25,6,("$ ".$venta->total.""),1,1,'C',0);
$pdf->Ln(3);
$pdf->SetFont('Garamond','B',11);
$pdf->MultiCell(176, 15,utf8_decode("OBSERVACIONES:                                                                                                                              "), 1 , 'L' , false);

$pdf->Ln(8);
$pdf->Ln(8);
$pdf->SetFont('Garamond','',11);
$pdf->cell(18,6,utf8_decode('F:________________________________                                 F:________________________________'),0,1,'L',0);
$pdf->cell(18,6,utf8_decode('                Presidente del C.D.E.                                                                                               FIRMA'),0,1,'L',0);

//FIN DE ACTA DE RECEPCION

$pdf->Output();
?>