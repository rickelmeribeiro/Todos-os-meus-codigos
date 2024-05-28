<!-- BOTAO DE LOGIN -->
 <button type="button" class="btn btn-lg" onclick="fazerLogin();">Login</button>
    <!-- FIM BOTAO DE LOGIN -->


    <!-- ALERTA -->
    <div class="erroBonito p-1 text-center" role="alert" id="alertlog" style="display: none;">
    </div>
    <!-- FIM ALERTA -->



    <!-- BOTAO DE MOSTRAR SENHA -->
    <button id="iconeOlho" type="button"
            style="background: transparent; border: transparent; box-shadow: none"
            class="mdi mdi-eye  mt-0 p-0" onclick="mostrarsenha();"></button>
    <!-- FIM BOTAO DE MOSTRAR SENHA -->


    <!-- FOOTER DO LOGIN -->
<?php
date_default_timezone_set('America/Sao_Paulo');
echo date('H:i');
?>
    <!-- FIM FOOTER DO LOGIN -->


    <!-- LINKS DO HEAD -->
    <link rel="stylesheet" href="./css/indexcss.css">
    <link rel="shortcut icon" type="imagex/png" href="./img/CAMINHO">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- FIM LINKS DO HEAD -->



    <!-- LINK DO FOOTER -->
    <script src="./func/indexjs.js"></script>
    <!-- FIM LINK DO FOOTER -->

