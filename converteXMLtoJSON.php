<?php
function xmltojson($xml, $arrayJSON) {
    $i=0;
    foreach($xml as $node => $value) {
        if ($value->children()) {#verifica que no possui filhos
        
            $arrayJSON[$node][$i] = array();
            
            if ($value->attributes()) {//#verifica a existencia de atributos
                foreach ($value->attributes() as $attr => $valueAttr) {
                    $arrayJSON[$node][$i][$attr] = (string)$valueAttr;
                }//#fim foreach
            }//#fim if

            $arrayJSON[$node][$i] = xmltojson($value->children(), $arrayJSON[$node][$i]);
        } else {
            $arrayJSON[$node] = (string)$value;
        }#fim if/else
    }#fim foreach
    return $arrayJSON;
}

$stringXML = $_REQUEST['xml'];
if ($stringXML != '') {
    file_put_contents("xml.xml", $stringXML);
    $xml = simplexml_load_file("xml.xml");

    $arrayJSON = xmltojson($xml, array());
    print_r(json_encode($arrayJSON));
} else {
    echo 'Conteudo invalido.';
}
?>