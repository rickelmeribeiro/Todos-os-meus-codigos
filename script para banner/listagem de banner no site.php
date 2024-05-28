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
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./img/<?php echo $foto1 ?>" class="d-block w-100" alt="BANNER" title="">
                </div>
                <div class="carousel-item">
                    <img src="./img/<?php echo $foto2 ?>"  class="d-block w-100" alt="BANNER" title="">
                </div>
                <div class="carousel-item">
                    <img src="./img/<?php echo $foto3 ?>" class="d-block w-100" alt="BANNER" title="">
                </div>
            </div>

        </div>
        </div>
        </div>
        <?php
    }
} else {
    ?>
    <h1>NÃO POSSUIR BANNER!</h1>
    <?php
}
?>