<?php

//https://pt.stackoverflow.com/questions/113010/no-access-control-allow-origin-header-usando-php

/*foreach (getallheaders() as $name => $value) {
    echo "$name: $value\n";
}*/

    header('Access-Control-Allow-Origin:*');
    header("Content-Type: application/json; charset=UTF-8");
   

    include "pessoa.php";
    include "pessoaDAO.php";
    
    $pessoa = new Pessoa();
    $pessoaDAO = new PessoaDAO();
    
    if(isset($_GET['getPeople'])){
        echo json_encode($pessoaDAO->consultar());
    }

    

    