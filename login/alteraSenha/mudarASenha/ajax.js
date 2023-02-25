// DOM
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
// DOM

// Função para validar a primeira parte do form 
document.querySelector(".form1").addEventListener("submit", (e) => {
    // Função pra cancelar o envio padrão, pois não vou querer fazer padrão...
    e.preventDefault()

    // Declaro e defino aqui toda vez que ele fazer o submit pois o valor será atualizado toda vez, se declarasse fora o valor não seria alterado
    let senha1 = document.querySelector("#senha1")
    let senha2 = document.querySelector("#senha2")

    // Validações iniciais dos campos
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
        // Se tudo estiver ok removo o display o form 1 e mostro o form 2 para ser preenchido
        document.querySelector(".form1").style.display = 'none'
        document.querySelector(".form2").style.display = 'flex'
    }
})


document.querySelector(".form2").addEventListener("submit", (e) => {
    // Função pra cancelar o envio padrão, pois não vou querer fazer padrão...
    e.preventDefault()

    // Defini novamente somente para validar, pois o usuario pode ser mal intensionado e querer dar um inspecionar elemento para passar para frente...
    let senha1 = document.querySelector("#senha1")
    let senha2 = document.querySelector("#senha2")

    // Mais uma validação para segurança
    let palavraSecreta = document.querySelector("#palavraSecreta")

    if (senha1.value != "" && senha2.value != "" && palavraSecreta.value != "") {
        $.ajax({
            url: "../alteraSenha/mudarASenha/alteraSenha.php",
            method: "POST",
            data: {
                agent: localStorage.getItem("idAgente"),
                novaSenha: document.querySelector("#senha2").value,
                palavraSecreta: document.querySelector("#palavraSecreta").value,
            },
            dataType: "json",
            beforeSend: function () {
                // Aplico o loading até ser concluido 
                loader.style.display = "flex"
                setTimeout(() => {
                    loader.style.opacity = "1"
                }, 200);
            }
        }).done(function (res) {
            // console.log(res) Descomentar somente para debug

            // Chegará aqui se tudo estiver ok e se as credênciais foram alteradas com sucesso!
            if (res == 'true') {
                // Removo o loading após concluido
                loader.style.opacity = "0"
                setTimeout(() => {
                    loader.style.display = "none"
                    // Mostro o modal de logado
                    modalSucesso()
                    // Redireciono para outro página
                    setTimeout(() => {
                        window.location.assign("../../pages/suporte");
                    }, 1000);
                }, 1000);
            } else {
                // Chegará aqui se der algum erro ao alterar a senha do agente
                loader.style.opacity = "0"
                setTimeout(() => {
                    loader.style.display = "none"
                    alert("Ocorreu algum erro para alterar a senha, atualize a pagina e faça refaça novamente!")
                }, 1000);
            }
        })
    } else {
        // Chegará aqui se o input da palavra secreta estiver vazio.
        modalErro()
    }
})