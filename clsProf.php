<?php

class CadEscola{
    private $codprof;
    private $nomeprof;
    private $disci;
    private $cargahr;
//-----------------------------
public function getcodprof()
{
    return $this-> codprof;
}
public function setcodprof($CP)
{
    $this->codprof = $CP;
}
//-----------------------------
public function getnomeprof()
{
    return $this->nomeprof;
}
public function setnomeprof($NP)
{
    $this->nomeprof = $NP;
}
//-----------------------------
public function getdisci()
{
    return $this->disci;
}
public function setdisci($DC)
{
    $this->disci = $DC;
}
//-----------------------------
public function getcargahr()
{
    return $this->cargahr;
}
public function setcargahr($CH)
{
    $this->cargahr = $CH;
}
//----------------------------

//Metodo - Gravar os dados no Banco
public function Incluir()
{
    include_once "conexao.php";

    try{
        $Comando=$conexao->prepare("insert into Pet (codprof,nomeprof,disci,cargahr) values (?,?,?,?)");
        $Comando->bindParam(1,$this->codprof);
        $Comando->bindParam(2,$this->nomeprof);
        $Comando->bindParam(3,$this->disci);
        $Comando->bindParam(4,$this->cargahr);


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
        $Comando=$conexao->prepare("Delete into Pet (codprof,nomeprof,disci,cargahr) values (?,?,?,?)");
        $Comando->bindParam(1,$this->codprof);
        $Comando->bindParam(2,$this->nomeprof);
        $Comando->bindParam(3,$this->disci);
        $Comando->bindParam(4,$this->cargahr);

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