function carregaMenu(page) {
    fetch('controle.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'controle=' + encodeURIComponent(page),
    })
        .then(response => response.text())
        .then(data => {
            document.getElementById('carregaConteudo').innerHTML = data;
        })
        .catch(error => console.error('Error na requisição:', error));

}


function abrirModalJsCliente(id, inID, nomeModal, abrirModal = 'A', addEditDel, formulario) {
    const formDados = document.getElementById(`${formulario}`)

    const ModalInstacia = new bootstrap.Modal(document.getElementById(`${nomeModal}`))
    if (abrirModal === 'A') {
        ModalInstacia.show();
        const inputid = document.getElementById(`${inID}`);
        if (inID !== 'nao') {
            inputid.value = id;
        }

        const submitHandler = function (event) {
            event.preventDefault();

            const form = event.target;
            const formData = new FormData(form);

            const fileInput = document.getElementById('foto_produto');
            formData.append('foto', fileInput.files[0]);

            const fileInput2 = document.getElementById('foto_produto_edit');
            formData.append('foto', fileInput2.files[0]);

            formData.append('controle', `${addEditDel}`)
            if (inID !== 'nao') {
                formData.append('id', `${id}`)
            }
            fetch('controle.php', {
                method: 'POST', body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                    if (data.success) {
                        ModalInstacia.hide();
                        location.reload()
                        carregaMenu("listarPessoa");
                        location.reload()
                        ModalInstacia.hide();
                    } else {
                        ModalInstacia.hide();
                        location.reload()
                        location.reload()
                        ModalInstacia.hide();
                        ModalInstacia.hide();
                        carregaMenu("listarPessoa");
                    }
                })
                .catch(error => {
                    ModalInstacia.hide();
                    location.reload()
                    ModalInstacia.hide();
                    carregaMenu("listarPessoa");
                    console.error('Erro na requisição:', error);
                });


        }
        formDados.addEventListener('submit', submitHandler);


    } else {
        location.reload()
        ModalInstacia.hide();
    }

}

function ValidaCPF() {
    var RegraValida = document.getElementById("cpf_adm").value;
    var cpfValido = /^(([0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2})|([0-9]{11}))$/;
    if (cpfValido.test(RegraValida) === true) {
        console.log("CPF Válido");
    } else {
        console.log("CPF Inválido");
    }
}

function fMasc(objeto, mascara) {
    obj = objeto
    masc = mascara
    setTimeout("fMascEx()", 1)
}

function fMascEx() {
    obj.value = masc(obj.value)
}

const handlePhone = (event) => {
    let input = event.target
    input.value = phoneMask(input.value)
}

const phoneMask = (value) => {
    if (!value) return ""
    value = value.replace(/\D/g, '')
    value = value.replace(/(\d{2})(\d)/, "($1) $2")
    value = value.replace(/(\d)(\d{4})$/, "$1-$2")
    return value
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

// function fazerLogin() {
//     var cpf = document.getElementById("cpf").value;
//     var senha = document.getElementById("senha").value;
//     var alertlog = document.getElementById("alertlog");
//
//     if (cpf === "") {
//         alertlog.style.display = "block";
//         alertlog.innerHTML =
//             "CPF não digitado.";
//         return;
//     } else if (senha === "") {
//         alertlog.style.display = "block";
//         alertlog.innerHTML =
//             "Senha não digitada.";
//         return;
//     } else if (senha.length < 8) {
//         alertlog.style.display = "block";
//         alertlog.innerHTML = "Mínimo de 8 digitos.";
//         return;
//     } else {
//         alertlog.style.display = "none";
//     }
//     mostrarProcessando();
//     fetch("login.php", {
//         method: "POST",
//         headers: {
//             "Content-Type": "application/x-www-form-urlencoded",
//         },
//         body:
//             "cpf=" +
//             encodeURIComponent(cpf) +
//             "&senha=" +
//             encodeURIComponent(senha),
//     })
//         .then((response) => response.json())
//         .then((data) => {
//             if (data.success) {
//                 setTimeout(function () {
//                     window.location.href = "dashboard.php";
//                 }, 2000);
//                 //alert(data.message);
//                 alertlog.classList.remove("erroBonito");
//                 alertlog.classList.add("acertoBonito");
//                 alertlog.innerHTML = data.message;
//                 alertlog.style.display = "block";
//             } else {
//                 alertlog.style.display = "block";
//                 alertlog.innerHTML = data.message;
//             }
//             esconderProcessando();
//         })
//         .catch((error) => {
//             console.error("Erro na requisição", error);
//         });
// }
// // FUNCAO DE LOADING
// function mostrarProcessando() {
//     var divProcessando = document.createElement("div");
//     divProcessando.id = "processandoDiv";
//     divProcessando.style.position = "fixed";
//     divProcessando.style.top = "10%";
//     divProcessando.style.left = "50%";
//     divProcessando.style.transform = "translate(-50%, -50%)";
//     divProcessando.innerHTML =
//         '<img src="./img/loading.gif" width="70px" alt="Processando..." title="Processando...">';
//     document.body.appendChild(divProcessando);
// }
// // FUNCAO DE ESCONDER O LOADING
// function esconderProcessando() {
//     var divProcessando = document.getElementById("processandoDiv");
//     if (divProcessando) {
//         document.body.removeChild(divProcessando);
//     }
// }


function mostrarsenha() {
    var inputPass = document.getElementById('senha');
    var btnShowPass = document.getElementById('btn-senha');

    if (inputPass.type === 'password') {
        inputPass.setAttribute('type', 'text');
        btnShowPass.classList.replace('bi-eye-slash', 'bi-eye');
    } else {
        inputPass.setAttribute('type', 'password');
        btnShowPass.classList.replace('bi-eye', 'bi-eye-slash');
    }
}

function mostrarsenhaalterar() {
    var inputPass = document.getElementById('senha-alterar');
    var btnShowPass = document.getElementById('btn-senha-alterar');

    if (inputPass.type === 'password') {
        inputPass.setAttribute('type', 'text');
        btnShowPass.classList.replace('bi-eye-slash', 'bi-eye');
    } else {
        inputPass.setAttribute('type', 'password');
        btnShowPass.classList.replace('bi-eye', 'bi-eye-slash');
    }
}


function Cadastrar() {
    alert("Dados Cadastrados com Sucesso!");
}

function Editar() {
    alert("Dados Editados com Sucesso!");
}

function Excluir() {
    alert("Dados Excluídos com Sucesso!");
}

function atacado(i) {
//ADD dados para a másrcara
    var decimais = 2;
    var separador_milhar = '.';
    var separador_decimal = ',';

    var decimais_ele = Math.pow(10, decimais);
    var thousand_separator = '$1' + separador_milhar;
    var v = i.value.replace(/\D/g, '');
    v = (v / decimais_ele).toFixed(decimais) + '';
    var splits = v.split(".");
    var p_parte = splits[0].toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, thousand_separator);
    (typeof splits[1] === "undefined") ? i.value = p_parte : i.value = p_parte + separador_decimal + splits[1];

}

var ALERT_TITLE = "Atualização Feita...";
var ALERT_BUTTON_TEXT = "Fechar";

if (document.getElementById) {
    window.alert = function (txt) {
        createCustomAlert(txt);
    }
}

function createCustomAlert(txt) {
    d = document;

    if (d.getElementById("modalContainer")) return;

    mObj = d.getElementsByTagName("body")[0].appendChild(d.createElement("div"));
    mObj.id = "modalContainer";
    mObj.style.height = d.documentElement.scrollHeight + "px";

    alertObj = mObj.appendChild(d.createElement("div"));
    alertObj.id = "alertBox";
    if (d.all && !window.opera) alertObj.style.top = document.documentElement.scrollTop + "px";
    alertObj.style.left = (d.documentElement.scrollWidth - alertObj.offsetWidth) / 2 + "px";
    alertObj.style.visiblity = "visible";

    h1 = alertObj.appendChild(d.createElement("h1"));
    h1.appendChild(d.createTextNode(ALERT_TITLE));

    msg = alertObj.appendChild(d.createElement("p"));
    //msg.appendChild(d.createTextNode(txt));
    msg.innerHTML = txt;

    btn = alertObj.appendChild(d.createElement("a"));
    btn.id = "closeBtn";
    btn.appendChild(d.createTextNode(ALERT_BUTTON_TEXT));
    btn.href = "#";
    btn.focus();
    btn.onclick = function () {
        removeCustomAlert();
        return false;
    }


    alertObj.style.display = "block";

}

function removeCustomAlert() {
    document.getElementsByTagName("body")[0].removeChild(document.getElementById("modalContainer"));
    location.reload()
}

function ful() {
    alert('Alert this pages');
}

function setClassStyle(className, attribute, value) {
    var a = document.getElementsByClassName(className);
    for (var i = 0; i < a.length; i++)
        a[i].style[attribute] = value;
}

//Use Add or Remove class instead of style
function toggleNav() {
    if (document.querySelector(".sidemenu").hasAttribute("is-open")) {
        document.getElementsByClassName("sidemenu")[0].style.width = "50px";
        setClassStyle("text-wrapper", "display", "none");
        document.querySelector(".sidemenu").removeAttribute("is-open");
        document.querySelector(".sidemenu").setAttribute("is-closed", "");
    } else {
        document.getElementsByClassName("sidemenu")[0].style.width = "250px";
        setClassStyle("text-wrapper", "display", "initial");
        document.querySelector(".sidemenu").removeAttribute("is-closed");
        document.querySelector(".sidemenu").setAttribute("is-open", "");
    }
}

function redireciona(page) {
    window.location.href = page
}

function fecharModal(page) {
    carregaMenu(`${page}`)
}


function abrirModalJsProdutos(nomeModal, abrirModal = 'A') {
    const ModalInstacia = new bootstrap.Modal(document.getElementById(`${nomeModal}`))
    if (abrirModal === 'A') {
        ModalInstacia.show();
    } else {
        location.reload()
    }

}

function abrirModalJsAdm(id, inID, nomeModal, abrirModal = 'A', addEditDel, formulario, idNome, inNome, idEmail, inEmail, idCpf, inCpf) {
    const formDados = document.getElementById(`${formulario}`)
    var alertlog = document.getElementById("alertlog");


    const ModalInstacia = new bootstrap.Modal(document.getElementById(`${nomeModal}`))
    if (abrirModal === 'A') {
        ModalInstacia.show();
        const inputid = document.getElementById(`${inID}`);
        if (inID !== 'nao') {
            inputid.value = id;
        }
        const nome = document.getElementById(`${inNome}`);
        if (inNome !== 'nao') {
            nome.value = idNome;
        }
        const email = document.getElementById(`${inEmail}`);
        if (inEmail !== 'nao') {
            email.value = idEmail;
        }
        const cpf = document.getElementById(`${inCpf}`);
        if (inCpf !== 'nao') {
            cpf.value = idCpf;
        }


        const submitHandler = function (event) {
            event.preventDefault();

            const form = event.target;
            const formData = new FormData(form);

            const fileInput = document.getElementById('foto_adm');
            formData.append('foto', fileInput.files[0]);

            const fileInput2 = document.getElementById('foto_adm_edit');
            formData.append('foto', fileInput2.files[0]);

            formData.append('controle', `${addEditDel}`)
            if (inID !== 'nao') {
                formData.append('id', `${id}`)
            }
            fetch('controle.php', {
                method: 'POST', body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                    if (data.success) {
                        alertlog.classList.remove("erroBonito");
                        alertlog.classList.add("acertoBonito");
                        alertlog.innerHTML = data.message;
                        alertlog.style.display = "block";
                        ModalInstacia.hide();
                        location.reload()
                        carregaMenu("listarPessoa");
                        location.reload()
                        ModalInstacia.hide();
                    } else {
                        alertlog.style.display = "block";
                        alertlog.innerHTML = data.message;
                        ModalInstacia.hide();
                        location.reload()
                        location.reload()
                        ModalInstacia.hide();
                        ModalInstacia.hide();
                        carregaMenu("listarPessoa");
                    }
                })
                .catch(error => {
                    ModalInstacia.hide();
                    location.reload()
                    ModalInstacia.hide();
                    carregaMenu("listarPessoa");
                    console.error('Erro na requisição:', error);
                });


        }
        formDados.addEventListener('submit', submitHandler);


    } else {
        location.reload()
        ModalInstacia.hide();
    }

}

function abrirModalJsProduto(id, inID, nomeModal, abrirModal = 'A', addEditDel, formulario, idNome, inNome, idValor, inValor, idDescricao, inDescricao) {
    const formDados = document.getElementById(`${formulario}`)

    const ModalInstacia = new bootstrap.Modal(document.getElementById(`${nomeModal}`))
    if (abrirModal === 'A') {
        ModalInstacia.show();
        const inputid = document.getElementById(`${inID}`);
        if (inID !== 'nao') {
            inputid.value = id;
        }
        const nome = document.getElementById(`${inNome}`);
        if (inNome !== 'nao') {
            nome.value = idNome;
        }
        const valor = document.getElementById(`${inValor}`);
        if (inValor !== 'nao') {
            valor.value = idValor;
        }

        const desc = document.getElementById(`${inDescricao}`);
        if (inDescricao !== 'nao') {
            desc.value = idDescricao;
        }


        const submitHandler = function (event) {
            event.preventDefault();

            const form = event.target;
            const formData = new FormData(form);
            const fileInput = document.getElementById('foto_produto');
            formData.append('foto', fileInput.files[0]);

            const fileInput2 = document.getElementById('foto_produto_edit');
            formData.append('foto', fileInput2.files[0]);

            formData.append('controle', `${addEditDel}`)
            if (inID !== 'nao') {
                formData.append('id', `${id}`)
            }
            fetch('controle.php', {
                method: 'POST', body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                    if (data.success) {
                        ModalInstacia.hide();
                        location.reload()
                        carregaMenu("listarPessoa");
                        location.reload()
                        ModalInstacia.hide();
                    } else {
                        ModalInstacia.hide();
                        location.reload()
                        location.reload()
                        ModalInstacia.hide();
                        ModalInstacia.hide();
                        carregaMenu("listarPessoa");
                    }
                })
                .catch(error => {
                    ModalInstacia.hide();
                    location.reload()
                    ModalInstacia.hide();
                    carregaMenu("listarPessoa");
                    console.error('Erro na requisição:', error);
                });


        }
        formDados.addEventListener('submit', submitHandler);


    } else {
        location.reload()
        ModalInstacia.hide();
    }

}

function abrirModalJsContato(id, inID, nomeModal, abrirModal = 'A', addEditDel, formulario, idNome, inNome, idNumero, inNumero) {
    const formDados = document.getElementById(`${formulario}`)

    const ModalInstacia = new bootstrap.Modal(document.getElementById(`${nomeModal}`))
    if (abrirModal === 'A') {
        ModalInstacia.show();
        const inputid = document.getElementById(`${inID}`);
        if (inID !== 'nao') {
            inputid.value = id;
        }
        const nome = document.getElementById(`${inNome}`);
        if (inNome !== 'nao') {
            nome.value = idNome;
        }
        const numero = document.getElementById(`${inNumero}`);
        if (inNumero !== 'nao') {
            numero.value = idNumero;
        }


        const submitHandler = function (event) {
            event.preventDefault();

            const form = event.target;
            const formData = new FormData(form);

            formData.append('controle', `${addEditDel}`)
            if (inID !== 'nao') {
                formData.append('id', `${id}`)
            }
            fetch('controle.php', {
                method: 'POST', body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                    if (data.success) {
                        ModalInstacia.hide();
                        location.reload()
                        carregaMenu("listarPessoa");
                        location.reload()
                        ModalInstacia.hide();
                    } else {
                        ModalInstacia.hide();
                        location.reload()
                        location.reload()
                        ModalInstacia.hide();
                        ModalInstacia.hide();
                        carregaMenu("listarPessoa");
                    }
                })
                .catch(error => {
                    ModalInstacia.hide();
                    location.reload()
                    ModalInstacia.hide();
                    carregaMenu("listarPessoa");
                    console.error('Erro na requisição:', error);
                });


        }
        formDados.addEventListener('submit', submitHandler);


    } else {
        location.reload()
        ModalInstacia.hide();
    }

}

function abrirModalJsBanner(id, inID, nomeModal, abrirModal = 'A', addEditDel, formulario) {
    const formDados = document.getElementById(`${formulario}`)

    const ModalInstacia = new bootstrap.Modal(document.getElementById(`${nomeModal}`))
    if (abrirModal === 'A') {
        ModalInstacia.show();

        const submitHandler = function (event) {
            event.preventDefault();

            const form = event.target;
            const formData = new FormData(form);

            formData.append('controle', `${addEditDel}`)
            fetch('controle.php', {
                method: 'POST', body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                    if (data.success) {
                        ModalInstacia.hide();
                        carregaMenu("listarPessoa");
                        location.reload()
                    } else {
                        ModalInstacia.hide();
                        location.reload()
                        carregaMenu("listarPessoa");
                    }
                })
            .catch(error => {
                ModalInstacia.hide();
                location.reload()
                carregaMenu("listarPessoa");
                console.error('Erro na requisição:', error);
            });


        }
        formDados.addEventListener('submit', submitHandler);


    } else {
        location.reload()
        ModalInstacia.hide();
    }

}




