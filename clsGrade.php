<?php

class CadEscola{
    private $semes;
    private $disci;
    private $turma;
    private $hr;
//-----------------------------
public function getsemes()
{
    return $this-> semes;
}
public function setsemes($SM)
{
    $this->semes = $SM;
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
}public function getturma()
{
    return $this->turma;
}
public function setturma($TM)
{
    $this->turma = $TM;
}
//-----------------------------

//-----------------------------
public function gethr()
{
    return $this->hr;
}
public function sethr($HR)
{
    $this->hr = $HR;
}
//----------------------------

//Metodo - Gravar os dados no Banco
public function Incluir()
{
    include_once "conexao.php";

    try{
        $Comando=$conexao->prepare("insert into Pet (semes,disci,turma,hr) values (?,?,?,?)");
        $Comando->bindParam(1,$this->semes);
        $Comando->bindParam(3,$this->disci);
        $Comando->bindParam(2,$this->turma);
        $Comando->bindParam(4,$this->hr);


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

    try{
        $Comando=$conexao->prepare("Delete into Pet (semes,disci,turma,hr) values (?,?,?,?)");
        $Comando->bindParam(1,$this->semes);
        $Comando->bindParam(3,$this->disci);
        $Comando->bindParam(2,$this->turma);
        $Comando->bindParam(4,$this->hr);

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
}