<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro e Consulta</title>
    <style>
        /* Definindo o layout de container */
        .container {
            display: flex;
        }

        /* Sidebar lateral */
        #sidebar {
            width: 250px;
            background-color: #f8f9fa;
            padding: 20px;
        }

        .sidebar-field {
            margin-bottom: 10px;
        }

        .sidebar-item {
            display: block;
            padding: 10px;
            background-color: #e9ecef;
            text-decoration: none;
            color: black;
            border-radius: 5px;
        }

        .sidebar-item:hover {
            background-color: #007bff;
        }

        /* Conteúdo principal */
        .content {
            flex-grow: 1;
            padding: 20px;
        }

        h2 {
            font-size: 24px;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: #007bff;
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #007bff;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Menu Lateral -->
        <div id="sidebar">
            <div class="sidebar-field">
                <a href="index.php" class="sidebar-item text-dark">
                    <div class="sidebar-icon"></div> Principal
                </a>
            </div>
            <div class="sidebar-field">
                <a href="teste.php" class="sidebar-item text-dark">
                    <div class="sidebar-icon"></div> Teste
                </a>
            </div>
        </div>
<div>
	</body>