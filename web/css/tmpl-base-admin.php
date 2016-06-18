<?php
header('Content-type: text/css');

$params = require_once("/../../components/core/template/config.php");
$params = $params['params']['admin'];

function css3_props($property, $value) {
 $css3 = "	-webkit-".$property.": ".$value.";\n"
     .   "	-moz-".$property.": ".$value.";\n"
     .   "	-o-".$property.": ".$value.";\n"
     .   "	-khtml-".$property.": ".$value.";\n"
     .   "	".$property.": ".$value.";\n";

 echo $css3;
} ?>
#demo {
<?php css3_props("box-shadow", "#ccc 5px 5px 10px"); ?>
}
