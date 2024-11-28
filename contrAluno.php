<?php
include_once "clsAluno.php";
$Cad = new CadEscola();

$matricula  = filter_input(INPUT_GET,"matricula",FILTER_VALIDATE_INT);
$nomeal  = filter_input(INPUT_GET,"nomeal",FILTER_SANITIZE_SPECIAL_CHARS);
$nasc  = filter_input(INPUT_GET,"nasc");
$turma   = filter_input(INPUT_GET,"turma",FILTER_SANITIZE_SPECIAL_CHARS);


$Cad->setmatricula($matricula);
$Cad->setnomeal($nomeal);
$Cad->setnasc($nasc);
$Cad->setturma($turma);

if (isset($_GET["Incluir"]))
{
    echo $Cad->Incluir();
}
else if (isset($_GET["Apagar"]))
{
    echo $Cad->Apagar();
}