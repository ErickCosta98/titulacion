<?php
require_once'titulo.php';
// conjunto de propiedades
$header = [
    'xmlns'=>"https://www.siged.sep.gob.mx/titulos/",
    'xmlns:xsi'=>"http://www.w3.org/2001/XMLSchema-instance",
    'version'=>"1.0",
    'folioControl'=>"20121023SICERT0151610X0042086X00013",
    'xsi:schemaLocation'=>"https://www.siged.sep.gob.mx/titulos/ schema.xsd"
];
$consulta = new Titulo();

$attribute_array = $consulta->getResponsables();

echo json_encode($attribute_array);


$xml = new XMLWriter();
$xml->openUri("tit.xml");
// El método de salida también se puede establecer en una dirección de archivo xml y directamente en un archivo
$xml->setIndentString('  ');
$xml->setIndent(true);

$xml->startDocument('1.0', 'utf-8');
// Comienza a crear archivos
// nodo raíz
$xml->startElement('TituloElectronico');
foreach ($header as $key => $value) {
    $xml->writeAttribute($key,$value);

}
$xml->startElement('FirmaResponsables');
// for ($i=0; $i < count($attribute_array) ; $i++) {
    foreach ($attribute_array as $key => $value) {
    $xml->startElement('FirmaResponsable');
    
    foreach ($attribute_array[$key] as $akey => $aval) {
        // echo $akey.'<br>';
     // Establecer valor de atributo
    $xml->writeAttribute($akey, $aval);
    }
    $xml->fullEndElement();// nodo FirmaResponsables
    // $xml->startElement('FirmaResponsable1');
    // $xml->fullEndElement();// nodo FirmaResponsables
    
}

$xml->endElement();// nodo FirmaResponsables
$xml->startElement('Institucion');
$xml->endElement();//nodo Institucion
$xml->startElement('Carrera');
$xml->endElement();//nodo Carrera
$xml->startElement('Profesionista');
$xml->endElement();//nodo Profesionista
$xml->startElement('Expedicion');
$xml->endElement();//nodo Expedicion
$xml->startElement('Antecedente');
$xml->endElement();//nodo Antecedente

$xml->endElement(); // nodo TituloElectronico
$xml->endDocument();

// header('Content-Type: text/xml');

$xml->flush();




?>