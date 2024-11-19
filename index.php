<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro e Consulta</title>
    <link rel="stylesheet" type="text/css" href="adicionando.css" media="screen" />
    
</head>
<body onload="consultar()">
    <?php include "menu.php"; ?>
	
<h2>Cadastro de Pessoas</h2>

<!-- Botão para abrir o modal de cadastro -->
<button id="abrindoModalBtn">Clique para Inserir Dados</button>

<!-- Modal de Cadastro -->
<div id="meuModalCadastro" class="modal">
    <div class="modal-content">
        <span class="close" id="fecharModalCadastroBtn">&times;</span>
        <h5>Cadastro de Pessoa</h5>
        <input id="cpfCadastro" placeholder="CPF" /><br>    
        <input id="nomeCadastro" placeholder="Nome" /><br>
        <input id="profissaoCadastro" placeholder="Profissão" /><br>
        <input id="telefoneCadastro" placeholder="Telefone" /><br>    
        <input id="emailCadastro" placeholder="E-mail" /><br>
        <button onclick="cadastrar()">Cadastrar</button>
        <p id="resultadoCadastro"></p>
    </div>
</div>

<h2>Lista de Pessoas Cadastradas</h2>
<div id="resultado">
    <!-- Tabela com os resultados será gerada aqui -->
</div>

<!-- Modal de Atualização -->
<div id="meuModalAtualizacao" class="modal">
    <div class="modal-content">
        <span class="close" id="fecharModalAtualizacaoBtn">&times;</span>
        <h5>Atualização de Pessoa</h5>
        <input id="cpfAtualizacao" placeholder="CPF" disabled/><br>    
        <input id="nomeAtualizacao" placeholder="Nome" /><br>
        <input id="profissaoAtualizacao" placeholder="Profissão" /><br>
        <input id="telefoneAtualizacao" placeholder="Telefone" /><br>    
        <input id="emailAtualizacao" placeholder="E-mail" /><br>
        <button onclick="salvarAtualizacao()">Atualizar</button>
        <p id="resultadoAtualizacao"></p>
    </div>
</div>

<script>
    // Função para consultar e exibir os dados cadastrados
    function consultar() {
        const xhttp = new XMLHttpRequest();
        xhttp.open("GET", "controle.php?getPessoa");
        xhttp.send();

        xhttp.onload = function() {
            var resposta = JSON.parse(this.responseText);
            var organizar = "<table><thead><tr><th>CPF</th><th>Nome</th><th>Profissão</th><th>Telefone</th><th>E-mail</th><th>Ações</th></tr></thead><tbody>";
            for (var i = 0; i < resposta.length; i++) {
                organizar += "<tr><td>" + resposta[i].cpf_pessoa + "</td>" +
                    "<td>" + resposta[i].nome_pessoa + "</td>" +
                    "<td>" + resposta[i].profissao_pessoa + "</td>" +
                    "<td>" + resposta[i].telefone_contato + "</td>" +
                    "<td>" + resposta[i].email_contato + "</td>" +
                    "<td>" +
                    "<button class='action-button' onclick='atualizar(" + resposta[i].cpf_pessoa + ")'>Atualizar</button>" +
                    "<button class='delete-button' onclick='apagar(" + resposta[i].cpf_pessoa + ")'>Apagar</button>" +
                    "</td></tr>";
            }
            organizar += "</tbody></table>";
            document.getElementById('resultado').innerHTML = organizar;
        }
    }

    // Função para cadastrar uma nova pessoa
    function cadastrar() {
        var cpf = document.getElementById("cpfCadastro").value;
        var nome = document.getElementById("nomeCadastro").value;
        var profissao = document.getElementById("profissaoCadastro").value;
        var telefone = document.getElementById("telefoneCadastro").value;
        var email = document.getElementById("emailCadastro").value;
        
        const xhttp = new XMLHttpRequest();
        xhttp.open("POST", "controle.php?cadPessoa", true);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        var data = "cpf=" + encodeURIComponent(cpf) +
            "&nome=" + encodeURIComponent(nome) +
            "&profissao=" + encodeURIComponent(profissao) +
            "&telefone=" + encodeURIComponent(telefone) +
            "&email=" + encodeURIComponent(email);

        xhttp.send(data);
      
        xhttp.onload = function() {
            document.getElementById("resultadoCadastro").innerHTML = this.responseText;
        }
        consultar();
    }

    // Função para abrir o modal de cadastro
    var modalCadastro = document.getElementById("meuModalCadastro");
    var btnCadastro = document.getElementById("abrindoModalBtn");
    var spanCadastro = document.getElementById("fecharModalCadastroBtn");

    btnCadastro.onclick = function() {
        modalCadastro.style.display = "block";
    }

    // Função para fechar o modal de cadastro
    spanCadastro.onclick = function() {
        modalCadastro.style.display = "none";
    }

    // Função para fechar a modal de cadastro se clicar fora dela
    window.onclick = function(event) {
        if (event.target == modalCadastro) {
            modalCadastro.style.display = "none";
        }
    }

    // Função para exibir os dados de uma pessoa para atualizar
    function atualizar(cpf) {
        // Buscar os dados dessa pessoa
        const xhttp = new XMLHttpRequest();
        xhttp.open("GET", "controle.php?getPessoa");
        xhttp.send();

        xhttp.onload = function() {
            var pessoa = JSON.parse(this.responseText);
            for (var i = 0; i < pessoa.length; i++) {
                if(cpf==pessoa[i].cpf_pessoa){
                    // Preencher os campos do formulário com os dados da pessoa
                    document.getElementById("cpfAtualizacao").value = pessoa[i].cpf_pessoa; // O CPF não pode ser alterado
                    document.getElementById("nomeAtualizacao").value = pessoa[i].nome_pessoa;
                    document.getElementById("profissaoAtualizacao").value = pessoa[i].profissao_pessoa;
                    document.getElementById("telefoneAtualizacao").value = pessoa[i].telefone_contato;
                    document.getElementById("emailAtualizacao").value = pessoa[i].email_contato;
                }
            }
            // Exibir o modal de atualização
            var modalAtualizacao = document.getElementById("meuModalAtualizacao");
            modalAtualizacao.style.display = "block";
        };
    }

    // Função para salvar as atualizações
    function salvarAtualizacao() {
        var cpf = document.getElementById("cpfAtualizacao").value;
        var nome = document.getElementById("nomeAtualizacao").value;
        var profissao = document.getElementById("profissaoAtualizacao").value;
        var telefone = document.getElementById("telefoneAtualizacao").value;
        var email = document.getElementById("emailAtualizacao").value;

        const xhttp = new XMLHttpRequest();
        xhttp.open("POST", "controle.php?atuPessoa", true);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        var data = "cpf=" + encodeURIComponent(cpf) +
            "&nome=" + encodeURIComponent(nome) +
            "&profissao=" + encodeURIComponent(profissao) +
            "&telefone=" + encodeURIComponent(telefone) +
            "&email=" + encodeURIComponent(email);

        xhttp.send(data);

        xhttp.onload = function() {
            document.getElementById("resultadoAtualizacao").innerHTML = this.responseText;
            consultar();
        }

        // Fechar a modal após salvar
        var modalAtualizacao = document.getElementById("meuModalAtualizacao");
        modalAtualizacao.style.display = "none";

        // Recarregar a lista de pessoas
        
    }

    // Função para fechar o modal de atualização
    var modalAtualizacao = document.getElementById("meuModalAtualizacao");
    var spanAtualizacao = document.getElementById("fecharModalAtualizacaoBtn");

    spanAtualizacao.onclick = function() {
        modalAtualizacao.style.display = "none";
    }

    // Função para fechar o modal de atualização se clicar fora dela
    window.onclick = function(event) {
        if (event.target == modalAtualizacao) {
            modalAtualizacao.style.display = "none";
        }
    }

    // Função para apagar uma pessoa
    function apagar(cpf) {
        var r = confirm("Você confirma que deseja apagar os dados?");
        if (r == true) {
            const xhttp = new XMLHttpRequest();
            xhttp.open("POST", "controle.php?delPessoa", true);
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            var data = "cpf=" + encodeURIComponent(cpf);
            xhttp.send(data);

            xhttp.onload = function() {
                document.getElementById("resultadoacao").innerHTML = this.responseText;
                consultar();
            }
        } else {
            document.getElementById("resultadoacao").innerHTML = "Saindo...";
            consultar();
        }

        consultar();
    }
</script>
</body>
</html>
