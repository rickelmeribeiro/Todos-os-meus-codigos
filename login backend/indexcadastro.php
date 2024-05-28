<?php
include_once "./config/constante.php";
include_once "./config/conexao.php";
include_once "./func/func.php";
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link rel="stylesheet" href="./indexcss.css">
    <script src="https://kit.fontawesome.com/ab00d86059.js" crossorigin="anonymous"></script>
    <!--    <link rel="shortcut icon" type="imagex/png" href="./img/CAMINHO">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.0.96/css/materialdesignicons.min.css"
          &gt;>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<div class="container meio">
    <div class="login-container">
        <form method="post" action="cadastro_back.php" name="frmCadastro" id="frmCadastro">
            <h2>Área de Cadastro</h2>
            <div class="input-div one">
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
                <div>
                    <h5>Nome</h5>
                    <input type="text" name="nome" id="nome" autocomplete="off" required class=" input">
                </div>
            </div>
            <div class="input-div one">
                <div class="i">
                    <i class="	fa fa-envelope"></i>
                </div>
                <div>

                    <h5>Email</h5>
                    <input type="email" name="email" id="email" autocomplete="off" required class=" input">
                </div>
            </div>
            <div class="input-div one">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div>
                    <h5>Senha</h5>

                    <input type="password" name="senha" id="senha" autocomplete="off" required class="placered input"
                           maxlength="8" placeholder="A senha precisa ter 8 dígitos!">

                    <button id="iconeOlho" type="button"
                            class="mdi mdi-eye"
                            style="background: transparent; border: transparent; box-shadow: none;margin-top: 4%;margin-left: 98%;cursor: pointer"
                            onclick="mostrarsenha();"></button>

                </div>
            </div>
            <div class="input-div one">
                <div class="i">
                    <i class="fas fa-id-card"></i>
                </div>

                <div>

                    <h5>CPF</h5>
                    <input type="text" name="cpf" id="cpf" onkeydown="fMasc( this, mCPF );" maxlength="14"  autocomplete="off" required class="input cpf_adm semfocus">
                </div>
            </div>
            <div class="erroBonito p-1 text-center" role="alert" id="alertlog" style="display: none;">
            </div>
            <button type="submit" class="btn btn-lg">Cadastro</button>
            <a href="index.php" style="background: transparent; border: transparent; box-shadow: none;"
               onclick="redireciona('index.php')">Já possui cadastro? Faça Login!</a>

        </form>
    </div>
</div>

<script src="./func/index.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
