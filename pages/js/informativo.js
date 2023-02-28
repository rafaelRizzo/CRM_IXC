const btn_mais = document.querySelector("a.btn-floating.btn-large.waves-effect.waves-light")
const btn_informativo = document.querySelector("#informativos-icon")

const addAlertaPulse = () => {
    btn_mais.classList.add("pulse")
    btn_informativo.classList.add("red")
    btn_informativo.classList.add("pulse")
    btn_informativo.classList.add("darken-4")
}

const removeAlertaPulse = () => {
    btn_mais.classList.remove("pulse")
    btn_informativo.classList.remove("red")
    btn_informativo.classList.remove("pulse")
    btn_informativo.classList.remove("darken-4")
}

const toogle_alert = () => {
    if (select_empresa.value == get_empresa_selecionada()) {
        let empresaCache = JSON.parse(localStorage.getItem('empresas'))
        if (empresaCache[i]['informativos'] != null) {
            addAlertaPulse()
        } else {
            removeAlertaPulse()
        }
    }
}