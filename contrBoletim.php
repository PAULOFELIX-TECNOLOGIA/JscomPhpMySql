<?php
include_once "clsBoletim.php";
$Cad = new CadEscola();

$matricula  = filter_input(INPUT_POST,"matricula",FILTER_VALIDATE_INT);
$disci  = filter_input(INPUT_POST,"disci",FILTER_SANITIZE_SPECIAL_CHARS);
$nota   = filter_input(INPUT_POST,"nota",FILTER_SANITIZE_SPECIAL_CHARS);
$nota2  = filter_input(INPUT_POST,"nota2",FILTER_SANITIZE_SPECIAL_CHARS);

$Cad->setmatricula($matricula);
$Cad->setdisci($disci);
$Cad->setnota($nota);
$Cad->setnota2($nota2);

if (isset($_GET["Incluir"]))
{
    echo json_encode($Cad->Incluir());
}
else if (isset($_GET["Apagar"]))
{
    echo $Cad->Apagar();
}
else if (isset($_GET["Consultar"]))
{
    echo json_encode($Cad->Consultar());

    
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['notas'])) {
    // Receber as notas enviadas pelo formulário (via GET)
    $nota = $_GET['notas'];
    $nota2 = $_GET['notas'];

    // Calcule a soma das notas
    $soma_notas = array_sum($notas);

    // Calcule o número de notas
    $num_notas = count($notas);

    // Calcule a média
    $media = $soma_notas / $num_notas;

    // Exiba o resultado
    echo "A média das notas é: " . number_format($media, 2);
}

