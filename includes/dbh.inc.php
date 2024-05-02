<?php

$serverName = "localhost";
$dBUsername = "farnitaborjecool";
$dBPassword = "SaimonTree267548";
$dBName = "farnitabor";

$spojeni = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName); /* název funkce*/

if (!$spojeni) /* ukazuje mi to errory */
{
    die("Spojení selhalo: ".mysqli_connect_error());
}
return $spojeni;
