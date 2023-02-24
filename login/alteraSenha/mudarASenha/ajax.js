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

document.querySelector(".form1").addEventListener("submit", (e) => {
    e.preventDefault()

    senha1 = document.querySelector("#senha1")
    senha2 = document.querySelector("#senha2")

    if (senha1.value != senha2.value) {
        alert("As senhas devem ser iguais!")
    } else if (senha1.value == "" || senha2.value == ""
        || senha1.value.length < 8 || senha2.value.length < 8) {
        alert("As senhas devem ter no minimo 8 digitos!")
    } else if (senha1.value == "mudar123" || senha2.value == "mudar123") {
        alert("As senhas não podem ser a padrão justamente por isso você está trocando a senha...")
    } else if (senha1.value == senha2.value
        && senha1.value != "" && senha2.value != ""
        && senha1.value.length >= 8 && senha2.value.length >= 8) {
        console.log('ok')
        document.querySelector(".form1").style.display = 'none'
        document.querySelector(".form2").style.display = 'flex'
    }
})


document.querySelector(".form2").addEventListener("submit", (e) => {
    e.preventDefault()

    senha1 = document.querySelector("#senha1")
    senha2 = document.querySelector("#senha2")

    palavraSecreta = document.querySelector("#palavraSecreta")

    if (senha1.value != "" && senha2.value != "" && palavraSecreta.value != "") {
        $.ajax({
            url: "../alteraSenha/mudarASenha/alteraSenha.php",
            method: "POST",
            dataType: "json",
            beforeSend: function () {

                loader.style.display = "flex"
                setTimeout(() => {
                    loader.style.opacity = "1"
                }, 200);

            }
        }).done(function (res) {
            console.log(res)

            if (res == 'cheguei aqui') {
                loader.style.opacity = "0"
                setTimeout(() => {
                    loader.style.display = "none"
                    setTimeout(() => {
                        modalSucesso()
                    }, 1500)
                }, 1000);
            } else {
                loader.style.opacity = "0"
                setTimeout(() => {
                    loader.style.display = "none"
                    alert("Ocorreu algum erro para alterar a senha, feche e abra novamente a aba!")
                }, 1000);

            }



        })
    } else {
        modalErro()
    }

})