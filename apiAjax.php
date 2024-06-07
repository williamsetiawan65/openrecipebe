<?php
header('Content-Type: application/json; charset=utf-8');
$url = "http://openrecipe.000webhostapp.com/api.php?request=".$_GET["par1"]."&option=".$_GET["par2"]."&limit=".$_GET["par3"]."&offset=".$_GET["par4"];
$result = file_get_contents($url);
echo $result;
?>