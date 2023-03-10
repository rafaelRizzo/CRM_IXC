


const modalErroRedf = () => {
    document.querySelector(".dados-altera-senha-sucesso").classList.remove("move")
    setTimeout(() => {
        document.querySelector(".dados-altera-senha-sucesso").style.display = "none"
    }, 50)

    setTimeout(() => {
        document.querySelector(".dados-altera-senha-invalidos").style.display = "flex"

        setTimeout(() => {
            setTimeout(() => {
                document.querySelector(".dados-altera-senha-invalidos").classList.add("move")
            }, 200)
        }, 100);

        setTimeout(() => {
            document.querySelector(".dados-altera-senha-invalidos").classList.remove("move")

            setTimeout(() => {
                document.querySelector(".dados-altera-senha-invalidos").style.display = "none"
            }, 200)
        }, 5000);
    }, 100);
}

const modalSucessoRedf = () => {
    document.querySelector(".dados-altera-senha-invalidos ").classList.remove("move")
    setTimeout(() => {
        document.querySelector(".dados-altera-senha-invalidos ").style.display = "none"
    }, 50)

    setTimeout(() => {
        document.querySelector(".dados-altera-senha-sucesso").style.display = "flex"

        setTimeout(() => {
            setTimeout(() => {
                document.querySelector(".dados-altera-senha-sucesso ").classList.add("move")
            }, 200)
        }, 100);

        setTimeout(() => {
            document.querySelector(".dados-altera-senha-sucesso").classList.remove("move")

            setTimeout(() => {
                document.querySelector(".dados-altera-senha-sucesso").style.display = "none"
            }, 200)
        }, 5000);
    }, 100)
}

const modalSucessoRedloop = () => {
    document.querySelector(".dados-altera-senha-invalidos ").classList.remove("move")
    setTimeout(() => {
        document.querySelector(".dados-altera-senha-invalidos ").style.display = "none"
    }, 50)

    document.querySelector(".dados-altera-senha-sucesso").classList.remove("move")
    setTimeout(() => {
        document.querySelector(".dados-altera-senha-sucesso").style.display = "none"
    }, 50)



    setTimeout(() => {
        document.querySelector(".dados-altera-senha-loop").style.display = "flex"

        setTimeout(() => {
            setTimeout(() => {
                document.querySelector(".dados-altera-senha-loop ").classList.add("move")
            }, 200)
        }, 100);

        setTimeout(() => {
            document.querySelector(".dados-altera-senha-loop").classList.remove("move")

            setTimeout(() => {
                document.querySelector(".dados-altera-senha-loop").style.display = "none"
            }, 200)
        }, 5000);
    }, 100)
}

const btnRedSenha = document.getElementById("btn-redefinir-senha")

btnRedSenha.addEventListener("click", (e) => {
    e.preventDefault()

    let redefinindoAgente = document.getElementById("usuario-redefinicao-senha")
    let palavraSecretaAgente = document.getElementById("palavra-secreta")

    if (redefinindoAgente.value != "" && palavraSecretaAgente.value != "" &&
        redefinindoAgente.value.length > 0 && palavraSecretaAgente.value.length > 0) {
        $.ajax({
            url: "../../login/redefinirSenha/redefinir.php",
            // M??todo da requisi????o
            method: "POST",
            // Dados que ser??o passados ?? requisi????o
            data: {
                redefinindoAgente: redefinindoAgente.value,
                palavraSecretaAgente: palavraSecretaAgente.value
            },
            dataType: "json",
            beforeSend: function () {
                // Retiro o foco do input sennha pois assim n??o o usuario n??o fica com o enter segurado e spammando requisi????o atoa
                $("#senha").blur()
                // Aplico o loading at?? ser concluido 
                loader.style.display = 'flex'
                setTimeout(() => {
                    loader.style.opacity = '1'
                }, 100);
            }
        }).done(function (res) {
            console.log(res)

            // Retiro o loading elegantemente rs
            setTimeout(() => {
                loader.style.opacity = '0'
            }, 100);

            setTimeout(() => {
                loader.style.display = 'none'
            }, 1000);
            // Retiro o loading elegantemente rs

            // Trato o retorno da requisi????o no JS apenas para redirecionar a p??gina.
            if (res == 'true') {
                document.querySelector("a.modal-close").click()
                palavraSecretaAgente.value = ""
                modalSucessoRedf()
            } else if (res == 'senha-ja-redefinida') {
                document.querySelector("a.modal-close").click()
                palavraSecretaAgente.value = ""
                modalSucessoRedloop()
            }
            else {
                // Aqui limpo o input da senha para n??o ficarem spammando requisi????o atoa.
                // E mostro que algo est?? errado, usuario ou palavra secrete.
                palavraSecretaAgente.value = ""
                modalErroRedf()
            }
        })
    }

})
