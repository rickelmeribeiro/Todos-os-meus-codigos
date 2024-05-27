<?php


$listarFotoeNome = listarGeral('idadm, nome, foto', 'adm');
if ($listarFotoeNome) {
    foreach ($listarFotoeNome as $itemfotoenome) {
        $id = $itemfotoenome->idadm;
        if ($id === $idadm) {
            $nome = $itemfotoenome->nome;
            $foto = $itemfotoenome->foto;

            if ($_SESSION['idadm']) {
                $id = $_SESSION['idadm'];
                ?>
                <span style="font-size: 150%;">ADM:<span
                        class="text-success"><?php echo $nome ?></span></span>
                <img src="./img/<?php echo $foto ?>" class="rounded-5" width="5%">
                <?php
            } else {
                echo 'FOTO NAO ENCONTRADA';
            }
        }
    }
} else {
    ?>
    <h1>NENHUM ADM CONECTADO</h1>
    <?php
}
?>