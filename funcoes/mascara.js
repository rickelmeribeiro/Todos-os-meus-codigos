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
function mCPF(cpf_adm) {
    cpf_adm = cpf_adm.replace(/\D/g, "")
    cpf_adm = cpf_adm.replace(/(\d{3})(\d)/, "$1.$2")
    cpf_adm = cpf_adm.replace(/(\d{3})(\d)/, "$1.$2")
    cpf_adm = cpf_adm.replace(/(\d{3})(\d{1,2})$/, "$1-$2")
    return cpf_adm
}

if (document.getElementById("cpf_adm")) {
    document.getElementById("cpf_adm").focus();
}
