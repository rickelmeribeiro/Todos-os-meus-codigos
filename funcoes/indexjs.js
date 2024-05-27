function mostrarsenha() {
    var inputPass = document.getElementById('senha');
    var iconeOlho = document.getElementById('iconeOlho');


    if (inputPass.type === 'password') {
        inputPass.setAttribute('type', 'text');
        iconeOlho.classList.remove('mdi-eye');
        iconeOlho.classList.add('mdi-eye-off');
    } else {
        inputPass.setAttribute('type', 'password');
        iconeOlho.classList.remove('mdi-eye-off');
        iconeOlho.classList.add('mdi-eye');

    }
}

function fazerLogin() {
    var email = document.getElementById("email").value;
    var senha = document.getElementById("senha").value;

    var alertlog = document.getElementById("alertlog");

    if (email === "") {
        alertlog.style.display = "block";
        alertlog.innerHTML =
            "Email não digitado.";
        return;
    } else if (senha === "") {
        alertlog.style.display = "block";
        alertlog.innerHTML =
            "Senha não digitada.";
        return;
    } else if (senha.length < 8) {
        alertlog.style.display = "block";
        alertlog.innerHTML = "A senha precisa ter 8 dígitos";
        return;
    } else {
        alertlog.style.display = "none";
    }
    fetch("login.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        body:
            "email=" +
            encodeURIComponent(email) +
            "&senha=" +
            encodeURIComponent(senha),
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {

                // alert(data.message);
                alertlog.classList.remove("erroBonito");
                alertlog.classList.add("acertoBonito");
                alertlog.innerHTML = data.message;
                alertlog.style.display = "block";
                setTimeout(function () {
                    mostrarProcessando();
                }, 900);
                setTimeout(function () {
                    window.location.href = "dashboard.php";
                }, 4000);
            } else {
                alertlog.style.display = "block";
                alertlog.innerHTML = data.message;
            }
            // esconderProcessando();
        })
        .catch((error) => {
            console.error("Erro na requisição", error);
        });
}

function mostrarProcessando() {
    var divFundoEscuro = document.createElement('div');
    divFundoEscuro.id = 'fundoEscuro';
    divFundoEscuro.style.position = 'fixed';
    divFundoEscuro.style.top = '0';
    divFundoEscuro.style.left = '0';
    divFundoEscuro.style.width = '100%';
    divFundoEscuro.style.height = '100%';
    divFundoEscuro.style.backgroundColor = 'rgba(0,0,0,0.7)';
    document.body.appendChild(divFundoEscuro);

    var divProcessando = document.createElement("div");
    divProcessando.id = "processandoDiv";
    divProcessando.style.position = "fixed";
    divProcessando.style.top = "50%";
    divProcessando.style.left = "50%";
    divProcessando.style.transform = "translate(-50%, -50%)";
    divProcessando.innerHTML = '<img src="./img/loadin.gif" width="200" alt="Processando..." title="Processando...">';
    document.body.appendChild(divProcessando);
}

function esconderProcessando() {
    var divProcessando = document.getElementById("processandoDiv");
    if (divProcessando) {
        document.body.removeChild(divProcessando);
    }
}

function btnEnter() {
}

    document.getElementById('senha').addEventListener('keydown', function (event) {
        if (event.key === 'Enter') {
            document.getElementById('btn-entere').click();
        }
    });


