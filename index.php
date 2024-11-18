<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro e Consulta</title>
    <link rel="stylesheet" type="text/css" href="adicionando.css" media="screen" />
</head>
<body onload="consultar()">
    
<h2>Cadastro de Pessoas</h2>

    <!-- Botão para abrir a modal -->
    <button id="abrindoModalBtn">Clique para Inserir Dados</button>

    <!-- Janela Modal -->
    <div id="meuModal" class="modal">
        <div class="modal-content">
            <span class="close" id="fecharModalBtn">&times;</span>
            <h5>Cadastro e Consulta de Pessoas</h5>
            <input id="cpf" placeholder="CPF" /><br>    
            <input id="nome" placeholder="Nome" /><br>
            <input id="profissao" placeholder="Profissão" /><br>
            <input id="telefone" placeholder="Telefone" /><br>    
            <input id="email" placeholder="E-mail" /><br>
            <button onclick="cadastrar()">Cadastrar</button>
            <p id="resultadoacao"></p>
        </div>
    </div>

    <h2>Lista de Pessoas Cadastradas</h2>
    <div id="resultado">
        <!-- Tabela com os resultados será gerada aqui -->
    </div>

    <script>
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
                        "<button class='action-button' onclick='atualizar(" + resposta[i].id_pessoa + ")'>Atualizar</button>" +
                        "<button class='delete-button' onclick='apagar(" + resposta[i].id_pessoa + ")'>Apagar</button>" +
                        "</td></tr>";
                }
                organizar += "</tbody></table>";
                document.getElementById('resultado').innerHTML = organizar;
            }
        }

        function cadastrar() {
            var cpf = document.getElementById("cpf").value;
            var nome = document.getElementById("nome").value;
            var profissao = document.getElementById("profissao").value;
            var telefone = document.getElementById("telefone").value;
            var email = document.getElementById("email").value;
            
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
                document.getElementById("resultadoacao").innerHTML = this.responseText;
            }
            consultar();
        }

        // Funções de atualização e apagamento sem funcionalidade ainda
        function atualizar(id) {
            alert("Atualizar dados da pessoa com ID: " + id);
        }

        function apagar(id) {
            alert("Apagar dados da pessoa com ID: " + id);
        }

        // Obtendo elementos da página
        var modal = document.getElementById("meuModal");
        var btn = document.getElementById("abrindoModalBtn");
        var span = document.getElementById("fecharModalBtn");

        // Função para abrir a modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // Função para fechar a modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // Função para fechar a modal se clicar fora dela
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
     
    </script>
</body>
</html>

