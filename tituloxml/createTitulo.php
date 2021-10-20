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
$institucion = $consulta->getInstitucion();
$carrera = $consulta->getCarrera();
$profesionista = $consulta->getProfesionista();
$expedicion = $consulta->getExpedicion();
$antecedente = $consulta->getAntecedente();
// echo json_encode($antecede55nte);4dm1nr3d2021.   id 180
// echo json_encode($expedicion);
// print_r($carrera);
// echo json_encode($carrera[0]);
// echo json_encode($attribute_array);
// echo json_encode($institucion[0]['cveInstitucion']);


$xml = new XMLWriter();
$xml->openUri("php://output");
// El método de salida también se puede establecer en una dirección de archivo xml y directamente en un archivo
$xml->setIndentString('  ');
$xml->setIndent(true);

$xml->startDocument('1.0', 'utf-8');
// Comienza a crear archivos
// nodo raíz
$xml->startElement('TituloElectronico');
foreach ($header as $key => $value) {
    $xml->writeAttribute($key,$value);

}//Header xml
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
$xml->writeAttribute('cveInstitucion',$institucion[0]['cveInstitucion']);
$xml->writeAttribute('nombreInstitucion',$institucion[0]['nombreInstitucion']);
$xml->endElement();//nodo Institucion

$xml->startElement('Carrera');
foreach ($carrera[0] as $key => $value) {
     $xml->writeAttribute($key,$value);

}
$xml->endElement();//nodo Carrera

$xml->startElement('Profesionista');
foreach ($profesionista[0] as $key => $value) {
    $xml->writeAttribute($key,$value);

}
$xml->endElement();//nodo Profesionista

$xml->startElement('Expedicion');
foreach ($expedicion[0] as $key => $value) {
    $xml->writeAttribute($key,$value);

}
$xml->endElement();//nodo Expedicion

$xml->startElement('Antecedente');
foreach ($antecedente[0] as $key => $value) {
    $xml->writeAttribute($key,$value);

}
$xml->endElement();//nodo Antecedente

$xml->endElement(); // nodo TituloElectronico
$xml->endDocument();

header('Content-Type: text/xml');

$xml->flush();




?>