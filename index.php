<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function consultar(){
            
           const xhttp = new XMLHttpRequest();
           
           xhttp.open("GET", "controle.php?getPessoa");
           xhttp.send();
           
           xhttp.onload = function(){
            var resposta = JSON.parse(this.responseText);
            var organizar = "";
            for(var i=0; i<resposta.length; i++){
                organizar = organizar + "CPF: "+resposta[i].cpf_pessoa
                + " - Nome: "+resposta[i].nome_pessoa
                + " - Profissão: "+resposta[i].profissao_pessoa
                + " - telefone: "+resposta[i].telefone_contato
                + " - email: "+resposta[i].email_contato
            }
            document.getElementById('resultado').innerHTML=
            organizar;
           }
        }

        function cadastrar(){
        var cpf = document.getElementById("cpf").value;
        var nome = document.getElementById("nome").value;
        var nome = document.getElementById("profissao").value;
        var telefone = document.getElementById("telefone").value;
        var nome = document.getElementById("email").value;
        const xhttp = new XMLHttpRequest();
        xhttp.onload= function(){
            document.getElementById("resultadoacao").innerHTML = this.responseText;
        }
        xhttp.open("POST", "controle.php?cadPessoa", true);

        // Definindo o cabeçalho para enviar dados no formato x-www-form-urlencoded
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // Criando os dados a serem enviados no corpo da requisição
        var data = "cpf=" + encodeURIComponent(cpf) +
               "&nome=" + encodeURIComponent(nome) +
               "&profissao=" + encodeURIComponent(profissao) +
               "&telefone=" + encodeURIComponent(telefone) +
               "&email=" + encodeURIComponent(email);

        // Enviando os dados via POST
        xhttp.send(data);
        consultar();
    }
    

    </script>
</head>
<body onload="consultar()">
    <p id="resultado"></p>
    <input id="cpf" placeholder="CPF"/><br>    
    <input id="nome" placeholder="Nome"/><br>
    <input id="profissao" placeholder="Profissão"/><br>
    <input id="telefone" placeholder="Telefone"/><br>    
    <input id="email" placeholder="E-mail"/><br>
    <button onclick="cadastrar()">Cadastrar</button>

    <p id="resultadoacao"></p>

</body>
</html>