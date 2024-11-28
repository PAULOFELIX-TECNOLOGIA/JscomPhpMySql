<?php
include_once "clsProf.php";
$Cad = new CadEscola();

$codprof  = filter_input(INPUT_GET,"codprof",FILTER_VALIDATE_INT);
$nomeprof  = filter_input(INPUT_GET,"nomeprof",FILTER_SANITIZE_SPECIAL_CHARS);
$disci  = filter_input(INPUT_GET,"disci",FILTER_SANITIZE_SPECIAL_CHARS);
$cargahr   = filter_input(INPUT_GET,"cargahr",FILTER_SANITIZE_SPECIAL_CHARS);

$Cad->setcodprof($codprof);
$Cad->setnomeprof($nomeprof);
$Cad->setdisci($disci);
$Cad->setcargahr($cargahr);

if (isset($_GET["Incluir"]))
{
    echo $Cad->Incluir();
}
else if (isset($_GET["Apagar"]))
{
    echo $Cad->Apagar();
}