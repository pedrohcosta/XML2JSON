<?php
  
$xml = simplexml_load_file("teste2.xml");

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

$arrayJSON = array();
$arrayJSON = xmltojson($xml, $arrayJSON);
print_r(json_encode($arrayJSON));
?>