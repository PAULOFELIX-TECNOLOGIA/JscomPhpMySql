<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Escolar</title>
</head>
<body onload="consultar()">

 
    <h1> Sistema Escolar </h1>

    <div>
        <input id="matricula" placeholder="Matricula"/>
        <input id="nomeal" placeholder="Nome do Aluno:"/>
        <input id="nasc" placeholder="Nasc:"/>
        <input id="turma" placeholder="Turma:"/>
        <button onclick="incluir">Incluir</button>
    </div>
    
    <div>
        <input id="codprof" placeholder="Código do Professor:"/>
        <input id="nomeprof" placeholder="Nome do Professor:"/>
        <input id="disc" placeholder="Disciplina:"/>
        <input id="cargahr" placeholder="Carga horária:"/>
        <button onclick="incluir">Incluir</button>
    </div>

    <div>
        <input id="semes" placeholder="Semestre:"/>
        <input id="disci" placeholder="Disciplina:"/>
        <input id="turma" placeholder="Turma:"/>
        <input id="hr" placeholder="Horário:"/>
        <button onclick="incluir">Incluir</button>
    </div>

    
    <div>
        <input id="matricula" placeholder="Matricula:"/>
        <input id="disci" placeholder="Disciplina:"/>
        <input id="nota" placeholder="Nota 1:"/>
        <input id="nota2" placeholder="Nota 2:"/>
        <button onclick="incluir">Incluir</button>
    </div>
    
    
    
    <script>
        function consultar() {
            const xhttp = new XMLHttpRequest();
            xhttp.open("GET", "controle.php?getSistemaEscolar");
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
 
        function incluir() {
            var matricula = document.getElementById("matricula").value;
            var nomeal = document.getElementById("nomeal").value;
            var nasc = document.getElementById("nasc").value;
            var turma = document.getElementById("turma").value;
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
    </script>
</body>
</html>