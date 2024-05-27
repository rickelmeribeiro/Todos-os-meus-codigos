<?php
include_once "./config/conexao.php";
include_once "./config/constante.php";
include_once "./func/func.php";
?>
<button type="button" class="btn btn-primary rounded-1" data-bs-toggle="modal" onclick="abrirModalJsBanner('1','id','ModalEditBanner','A','editBanner','frmeditBanner')" >
    <span class="mdi mdi-database-edit">Alterar Banner</span>
</button>
<br>
<br>
<?php
$listarBanner = listarGeral('*', 'banner');
if ($listarBanner) {
    foreach ($listarBanner

             as $banner) {
        $id = $banner->idbanner;
        $foto1 = $banner->foto1;
        $foto2 = $banner->foto2;
        $foto3 = $banner->foto3;
        ?>

<!--        <input type="hidden" value="--><?php //echo $id?><!--" name="id" id="id">-->
        <img src="./img/<?php echo $foto1?>" alt="" width="30%" name="imagem1" id="imagem1" >

        <br>
        <br>
<!--        <input type="hidden" value="--><?php //echo $id?><!--" name="id" id="id">-->
        <img src="./img/<?php echo $foto2?>" alt="" width="30%" name="imagem2" id="imagem2" >

        <br>
        <br>
<!--        <input type="hidden" value="--><?php //echo $id?><!--" name="id" id="id">-->
        <img src="./img/<?php echo $foto3?>" alt="" width="30%" name="imagem3" id="imagem3" >

        <?php
    }
} else {
    ?>
    <h1>NÃO POSSUIR BANNER!</h1>
    <?php
}
?>

<script src="./func/func.js"></script>
