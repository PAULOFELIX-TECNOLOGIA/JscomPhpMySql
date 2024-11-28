<?php

class CadEscola{
    private $matricula;
    private $nomeal;
    private $nasc;
    private $turma;
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
public function getnomeal()
{
    return $this->nomeal;
}
public function setnomeal($NA)
{
    $this->nomeal = $NA;
}
//-----------------------------
public function getnasc()
{
    return $this->nasc;
}
public function setnasc($NC)
{
    $this->nasc = $NC;
}
//-----------------------------
public function getturma()
{
    return $this->turma;
}
public function setturma($TM)
{
    $this->turma = $TM;
}
//----------------------------

//Metodo - Gravar os dados no Banco
public function Incluir()
{
    include_once "conexao.php";

    try{
        $Comando=$conexao->prepare("insert into Pet (matricula,nomeal,nasc,turma) values (?,?,?,?)");
        $Comando->bindParam(1,$this->matricula);
        $Comando->bindParam(2,$this->nomeal);
        $Comando->bindParam(3,$this->nasc);
        $Comando->bindParam(4,$this->turma);

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
        $Comando=$conexao->prepare("Delete into Pet (matricula,nomeal,nasc,turma) values (?,?,?,?)");
        $Comando->bindParam(1,$this->matricula);
        $Comando->bindParam(2,$this->nomeal);
        $Comando->bindParam(3,$this->nasc);
        $Comando->bindParam(4,$this->turma);

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