<!-- MASCARA DE CPF -->
<div class="mb-3">
    <label for="NOMEIGUAL" class="form-label">CPF:</label>
    <input autocomplete="off" type="text" onkeydown="fMasc( this, mCPF );"
           class="form-control cpf_adm" id="NOMEIGUAL" name="NOMEIGUAL" maxlength="14" required
           placeholder="000.000.000-00">
</div>
<!-- FIM MASCARA DE CPF -->

<!-- MASCARA DE VALOR -->
<div class="mb-3">
    <label for="NOMEIGUAL" class="form-label">Valor:</label>
    <input autocomplete="off" type="text" onkeyup="atacado(this);" class="form-control"
           id="NOMEIGUAL" name="NOMEIGUAL" required placeholder="0,00">
</div>
<!-- FIM MASCARA DE VALOR -->

<!-- MASCARA DE NUMERO DE TELEFONE -->
<div class="mb-3">
    <label for="NOMEIGUAL" class="form-label">Número:</label>
    <input autocomplete="off" type="tel" maxlength="15" onkeyup="handlePhone(event)"
           class="form-control phone" id="NOMEIGUAL"
           name="NOMEIGUAL" required placeholder="(00) 00000-0000">
</div>
<!-- FIM MASCARA DE NUMERO DE TELEFONE -->