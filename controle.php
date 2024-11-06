<?php
    // Configura os cabeçalhos para permitir requisições de diferentes origens (CORS)
    //CORS: Permite que requisições originadas de outros domínios acessem a API
    header('Access-Control-Allow-Origin: *');
    //Methods HTTP: Especifica os métodos HTTP permitidos (GET, POST, OPTIONS)
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    //Headers: Define os cabeçalhos permitidos nas requisições (Content-Type)
    header('Access-Control-Allow-Headers: Content-Type');
    //Content-Type: Define o tipo de conteúdo da resposta como JSON
    header("Content-Type: application/json; charset=UTF-8");
   
    // Inclui os arquivos com as classes Pessoa e PessoaDAO
    include "pessoa.php";
    include "pessoaDAO.php";
    
    // Cria instâncias das classes
    $pessoa = new Pessoa();
    $pessoaDAO = new PessoaDAO();
    
    // Extrai os dados da pessoa da requisição e cria um objeto Pessoa
    $pessoa->setCpf(filter_input(INPUT_POST ,'cpf'));
    $pessoa->setNome(filter_input(INPUT_POST ,'nome'));
    $pessoa->setProfissao(filter_input(INPUT_POST ,'profissao'));
    $pessoa->setTelefone(filter_input(INPUT_POST ,'telefone'));
    $pessoa->setEmail(filter_input(INPUT_POST ,'email'));

    // Verifica se a ação é consultar todas as pessoas
    if(isset($_GET['getPessoa'])){
         // Consulta todas as pessoas no banco de dados e retorna em formato JSON
        echo json_encode($pessoaDAO->consultar());
    }else if(isset($_GET['cadPessoa'])){
        // Insere a pessoa no banco de dados e retorna o resultado em JSON
        echo json_encode($pessoaDAO->cadastrar($pessoa));
    }else if(isset($_GET['delPessoa'])){
        echo json_encode($pessoaDAO->deletar($pessoa));
    }else if(isset($_GET['atuPessoa'])){
        echo json_encode($pessoaDAO->atualizar($pessoa));
    } 
    

    