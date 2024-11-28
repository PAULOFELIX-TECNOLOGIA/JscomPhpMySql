<?php
include_once "clsGrade.php";
$Cad = new CadEscola();

$semes  = filter_input(INPUT_GET,"semes",FILTER_VALIDATE_INT);
$disci  = filter_input(INPUT_GET,"disci",FILTER_SANITIZE_SPECIAL_CHARS);
$turma  = filter_input(INPUT_GET,"turma",FILTER_SANITIZE_SPECIAL_CHARS);
$hr   = filter_input(INPUT_GET,"hr",FILTER_SANITIZE_SPECIAL_CHARS);


$Cad->setsemes($semes);
$Cad->setdisci($disci);
$Cad->setturma($turma);
$Cad->sethr($hr);

if (isset($_GET["Incluir"]))
{
    echo $Cad->Incluir();
}
else if (isset($_GET["Apagar"]))
{
    echo $Cad->Apagar();
}