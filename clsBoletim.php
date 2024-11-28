<?php

class CadEscola{
    private $matricula;
    private $disci;
    private $nota;
    private $nota2;
//-----------------------------
public function getmatricula()
{
    return $this-> matricula;
}
public function setmatricula($MT)
{
    $this->matricula = $MT;
}
//-----------------------------
public function getdisci()
{
    return $this->disci;
}
public function setdisci($DC)
{
    $this->disci = $DC;
//-----------------------------
}public function getnota()
{
    return $this->nota;
}
public function setnota($NT)
{
    $this->nota = $NT;
}
//-----------------------------
public function getnota2()
{
    return $this->nota2;
}
public function setnota2($NT2)
{
    $this->nota2 = $NT2;
}
//----------------------------

//Metodo - Gravar os dados no Banco
public function Incluir()
{
    include_once "conexao.php";

    try{
        $Comando=$conexao->prepare("insert into boletim values (?,?,?,?)");
        $Comando->bindParam(1,$this->matricula);
        $Comando->bindParam(3,$this->disci);
        $Comando->bindParam(2,$this->nota);
        $Comando->bindParam(4,$this->nota2);


        if($Comando->execute())
        {
            $Retorno = "Gravado com sucesso";
        }
    }catch (PDOException $Erro)
    {
        $Retorno = "Erro " . $Erro->getMessage();
    }
    return $Retorno;
}

public function Apagar()
{
    include_once "conexao.php";

    try {
        $Comando = $conexao->prepare("DELETE FROM boletim WHERE matricula = ?");
        $Comando->bindParam(1,$this->matricula);

        if($Comando->execute())
        {
            $Retorno = "Apagado com sucesso";
        }
    }
    catch (PDOException $Erro)
    {
        $Retorno = "Erro " . $Erro->getMessage();
    }
    return $Retorno;
}

public function Consultar()
{
    include_once "conexao.php";

    try
    {
        $Comando=$conexao->prepare
        ("SELECT b.matricula, b.disci, b.nota, b.nota2, a.nomeal, a.nasc, a.turma, g.semes, g.disci, g.hr FROM boletim b
        LEFT JOIN aluno a ON a.matricula = b.matricula
        LEFT JOIN grade g ON g.disci = b.disci 
        ");//where b.matricula = ?
    $Comando->bindParam(1,$this->matricula);

    if($Comando->execute())
    {
        $Retorno = $Comando->fetchAll(PDO::FETCH_ASSOC);
    }
    }
    catch(PDOException $Erro)
    {
        $Retorno = "Erro" . $Erro->getMessage();
    }
    return $Retorno;
}
}