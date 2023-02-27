//DOM
let usuario, senha

const loader = document.querySelector(".container-loader")

const modalErro = () => {
    document.querySelector(".logado-sucesso ").classList.remove("move")
    setTimeout(() => {
        document.querySelector(".logado-sucesso ").style.display = "none"
    }, 50)

    setTimeout(() => {
        document.querySelector(".dados-invalidos").style.display = "flex"

        setTimeout(() => {
            setTimeout(() => {
                document.querySelector(".dados-invalidos").classList.add("move")
            }, 200)
        }, 100);

        setTimeout(() => {
            document.querySelector(".dados-invalidos").classList.remove("move")

            setTimeout(() => {
                document.querySelector(".dados-invalidos").style.display = "none"
            }, 200)
        }, 5000);
    }, 100);
}

const modalSucesso = () => {
    document.querySelector(".dados-invalidos ").classList.remove("move")
    setTimeout(() => {
        document.querySelector(".dados-invalidos ").style.display = "none"
    }, 50)

    setTimeout(() => {
        document.querySelector(".logado-sucesso ").style.display = "flex"

        setTimeout(() => {
            setTimeout(() => {
                document.querySelector(".logado-sucesso ").classList.add("move")
            }, 200)
        }, 100);

        setTimeout(() => {
            document.querySelector(".logado-sucesso ").classList.remove("move")

            setTimeout(() => {
                document.querySelector(".logado-sucesso ").style.display = "none"
            }, 200)
        }, 5000);
    }, 100)
}
//DOM

document.querySelector("form").addEventListener("submit", (e) => {
    // Função pra cancelar o envio padrão, pois não vou querer fazer padrão...
    e.preventDefault()

    usuario = document.getElementById("usuario").value
    senha = document.getElementById("senha").value

    if (usuario == "") {
        modalErro()
    } else if (usuario.length > 0 && senha.length > 0) {
        // Só fará a requisição se os campos forem válidos.
        $.ajax({
            url: "../../login/validaLogin/validarLogin.php",
            // Método da requisição
            method: "POST",
            // Dados que serão passados à requisição
            data: {
                usuario: usuario,
                senha: senha
            },
            dataType: "json",
            beforeSend: function () {
                // Retiro o foco do input sennha pois assim não o usuario não fica com o enter segurado e spammando requisição atoa
                $("#senha").blur()
                // Aplico o loading até ser concluido 
                loader.style.display = 'flex'
                setTimeout(() => {
                    loader.style.opacity = '1'
                }, 100);
            }
        }).done(function (res) {
            // console.log(res) Descomente somente para debug

            // Retiro o loading elegantemente rs
            setTimeout(() => {
                loader.style.opacity = '0'
            }, 100);

            setTimeout(() => {
                loader.style.display = 'none'
            }, 1000);
            // Retiro o loading elegantemente rs

            // Trato o retorno da requisição no JS apenas para redirecionar a página.
            if (res == 'true') {
                modalSucesso()
                setTimeout(() => {
                    window.location.assign("./pages/setores");
                }, 1000);
            }
            // Trato o retorno da requisição no JS apenas para redirecionar a página.
            else if (res == 'mudarSenha') {
                modalSucesso()
                setTimeout(() => {
                    window.location.assign("./login/alteraSenha");
                }, 1000);
            }
            else {
                // Aqui limpo o input da senha para não ficarem spammando requisição atoa.
                document.getElementById("senha").value = ""
                // E mostro que algo está errado, login ou senha.
                modalErro()
            }
        })
    } else {
        // Mostra modal que precisa preencher o agente e a senha.
        modalErro()
    }
})