function ValidaCPF(){
    var RegraValida=document.getElementById("cpf_adm_edit").value;
    var cpfValido = /^(([0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2})|([0-9]{11}))$/;
    if (cpfValido.test(RegraValida) === true)	{
        console.log("CPF Válido");
    } else	{
        console.log("CPF Inválido");
    }
}
function fMasc(objeto,mascara) {
    obj=objeto
    masc=mascara
    setTimeout("fMascEx()",1)
}

function fMascEx() {
    obj.value=masc(obj.value)
}
if (document.getElementById("cpf_adm_edit")) {
    document.getElementById("cpf_adm_edit").focus();
}