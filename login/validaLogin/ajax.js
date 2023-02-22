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

document.querySelector("form").addEventListener("submit", (e) => {
    e.preventDefault()

    usuario = document.getElementById("usuario").value
    senha = document.getElementById("senha").value

    if (usuario == "") {
        modalErro()
    } else if (usuario.length > 0 && senha.length > 0) {
        $.ajax({
            url: "../../login/validaLogin/validarLogin.php",
            method: "POST",
            data: {
                usuario: usuario,
                senha: senha
            },
            dataType: "json",
            beforeSend: function () {
                $("#senha").blur()
                loader.style.display = 'flex'

                setTimeout(() => {
                    loader.style.opacity = '1'
                }, 100);
            }
        }).done(function (res) {
            console.log(res)

            setTimeout(() => {
                loader.style.opacity = '0'
            }, 100);

            setTimeout(() => {
                loader.style.display = 'none'
            }, 200);

            if (res == 'true') {
                modalSucesso()
                setTimeout(() => {
                    window.location.assign("./pages/suporte");
                }, 1000);
            } else {
                senha = ''
                modalErro()
            }
        })
    } else {
        modalErro()
    }
})