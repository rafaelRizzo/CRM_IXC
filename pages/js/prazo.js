const prazo_icon = document.querySelector("#prazo-icon")

prazo_icon.addEventListener("click", () => {
    if (get_empresa_documentos() == null) {
        M.toast({ html: "Selecione a empresa que gostaria de saber o prazo" });
    } else {
        M.toast({ html: get_empresa_prazo() });

    }
})