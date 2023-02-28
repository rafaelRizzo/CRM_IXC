const prazo_icon = document.querySelector("#prazo-icon")

const setPrazo = () => {
    if (get_empresa_documentos() == null) {

        prazo_icon.setAttribute("data-tooltip", "Selecione a empresa para saber o prazo");
    } else {
        prazo_icon.setAttribute("data-tooltip", `Prazo: ${get_empresa_prazo()}`);
    }
}