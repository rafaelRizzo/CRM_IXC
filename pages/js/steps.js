// DOM

const step_itens = document.querySelectorAll(".step-wizard-item")

// DOM
const form1 = document.querySelector("#form1")
const form2 = document.querySelector("#form2")
const form3 = document.querySelector("#form3")

const fadeIn = (e) => {
    setTimeout(() => {
        e.style.display = "block"
        e.style.transform = "translate(20px, -10px)"
        setTimeout(() => {
            e.style.opacity = "1"
            e.style.transform = "translate(0px, -10px)"
        }, 100)
    }, 250)
}

const fadeOut = (e) => {
    e.style.transform = "translate(-20px, -10px)"
    setTimeout(() => {
        e.style.opacity = "0"
    }, 100)

    setTimeout(() => {
        e.style.display = "none"
    }, 200)
}

const backToStep1 = () => {
    removeSteps()
    step_itens[0].classList.add("current-item")
    fadeOut(form2)
    fadeIn(form1)
}

const backToStep2 = () => {
    removeSteps()
    step_itens[1].classList.add("current-item")
    fadeOut(form3)
    fadeIn(form2)
}

const backToStep3 = () => {

}

const backToStep4 = () => {

}

const removeSteps = () => {
    step_itens.forEach((e) => {
        e.classList.remove("current-item")
    })
}

form1.addEventListener("submit", (e) => {
    e.preventDefault()

    let i_empresa = document.querySelector("#empresa").value
    console.log(i_empresa)
    let i_nome_cliente = document.querySelector("#nome-cliente").value
    console.log(i_nome_cliente)
    let i_doc_cliente = document.querySelector("#doc-cliente").value
    console.log(i_doc_cliente)
    let i_telefone_cliente = document.querySelector("#telefone-cliente").value
    console.log(i_telefone_cliente)
    let i_endereco_cliente = document.querySelector("#endereco-cliente").value
    console.log(i_endereco_cliente)

    if (verifica_tipo_atendimento() != false &&
        i_empresa != "" &&
        i_nome_cliente != "" &&
        i_doc_cliente != "" &&
        i_telefone_cliente != "") {
        fadeOut(form1)
        removeSteps()
        step_itens[1].classList.add("current-item")
        fadeIn(form2)
    }
})

const btn_back_to_1 = document.querySelector("#form2 #back")

btn_back_to_1.addEventListener("click", () => {
    backToStep1()
})

form2.addEventListener("submit", (e) => {
    e.preventDefault()

    let i_assunto_atendimento = document.querySelector("#assunto-atendimento").value
    console.log(i_assunto_atendimento)

    if (i_assunto_atendimento != "") {
        fadeOut(form2)
        removeSteps()
        step_itens[2].classList.add("current-item")
        fadeIn(form3)
    }
})

const btn_back_to_2 = document.querySelector("#form3 #back")

btn_back_to_2.addEventListener("click", () => {
    backToStep2()
})

form3.addEventListener("submit", (e) => {
    e.preventDefault()



})