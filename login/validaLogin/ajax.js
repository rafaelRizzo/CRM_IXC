document.querySelector("form").addEventListener("submit", (e) => {
    e.preventDefault()
    console.log("vou enviar em....")

    let usuario, senha
    usuario = document.querySelector("#usuario").value
    senha = document.querySelector("#senha").value
    if (usuario != "" && senha != "") {
        $.ajax({
            url: "./validarLogin.php",
            method: "POST",
            data: {
                usuario: document.querySelector("#usuario").value,
                senha: document.querySelector("#senha").value
            },
            dataType: "json",
            beforeSend: function () {
            }
        }).done(function (res) {
            console.log(res)

            if (res == 'true') {
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
            } else {
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
            }
        })
    } else {
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
    }
})


