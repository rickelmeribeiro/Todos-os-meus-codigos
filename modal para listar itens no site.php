<?php
$listarProdutos = listarGeral('nome, valor, foto, descricao', 'produto');
if ($listarProdutos) {
    $cont = 1;
    foreach ($listarProdutos

             as $produto) {
        $nome = $produto->nome;
        $valor = $produto->valor;
        $foto = $produto->foto;
        $descricao = $produto->descricao;
        ?>
        <div class="col-md-4 d-flex">
            <div class="cards mt-1 mb-5" style="background-color: #E5E4E2;border: 1px wheat solid;
" data-bs-toggle="modal"
                 onclick="abrirModalJsProdutos('ModalRoupa<?php echo $cont ?>', 'A');">
                <img src="./img/<?php echo $foto ?>" class="w-100">
            </div>
        </div>

        <div class="modal fade" id="ModalRoupa<?php echo $cont ?>" tabindex="-1"
             aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content rounded-5">
                    <div class="modal-body corpao rounded-5 pb-0"
                         style="border-radius: 80px;border: 1px solid wheat">
                        <div class="card corpao mb-3 w-100" style="border: 0px solid black;border-radius: 30px">
                            <div class="row g-0 rounded-5" style="background-color: #E5E4E2;">
                                <div class="col-md-4 ">
                                    <img src="./img/<?php echo $foto ?>" class="img-fluid rounded-start"
                                         alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body text-dark">
                                        <h2 class="card-title fontezinha"><?php echo $nome ?></h2>
                                        <h3><p class="card-text fontezinha">Descrição: <span
                                                    class="fontezinha"><?php echo $descricao ?></span>
                                            </p>
                                        </h3>
                                        <br>
                                        <h4><p class="card-text fontezinha">Valor: <span
                                                    class="text-success"><?php echo $valor ?></span></p>
                                        </h4>
                                        <button style="margin-left: 380px" class="btn btn-success">Comprar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $cont = $cont + 1;
    }
} else {
    ?>
    <h1 class="text-center bg-danger text-white">NÃO POSSUI PRODUTOS!</h1>
    <?php
}
?>