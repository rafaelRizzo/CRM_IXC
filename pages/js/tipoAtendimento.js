let tipo_atendimento = document.querySelectorAll("#canal-atendimento")

const verifica_tipo_atendimento = () => {
    if (tipo_atendimento[0].checked) {
        return "CHAT"
    } else if (tipo_atendimento[1].checked) {
        return "TELEFONE"
    } else {
        return false
    }
}