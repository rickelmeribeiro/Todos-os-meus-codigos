<div class="row">
    <div class="col-2 bg-dark" style="min-height: 100vh !important;">
        <div class="container-fluid">
            <div class="card bg-dark text-white" style="width: 18rem;border: transparent">
                <div class="mt-3 mb-2 value fontegrande pointerCursor hoverzinho"
                     onclick="redireciona('listarMenu.php')">
                    <i class="fas fa-braille"></i>
                    MENU
                </div>
                <div class="mt-3 mb-2 value fontegrande pointerCursor hoverzinho" onclick="carregaMenu('listarBanner')">
                    <i class="fas fa-bacon"></i>
                    BANNER
                </div>
                <div class="mt-3 mb-2 value fontegrande pointerCursor hoverzinho"
                     onclick="carregaMenu('listarProduto')">
                    <i class="fas fa-cash-register"></i>
                    PRODUTO
                </div>
                <div class="mt-3 mb-2 value fontegrande pointerCursor hoverzinho"
                     onclick="carregaMenu('listarContato')">
                    <i class="fas fa-tty"></i>
                    CONTATO
                </div>
                <div class="mt-3 mb-2 value fontegrande pointerCursor hoverzinho" onclick="carregaMenu('listarAdm')">
                    <i class="fas fa-address-card"></i>
                    ADM
                </div>
            </div>
        </div>
    </div>
    <div class="col-10" id="carregaConteudo"></div>

</div>