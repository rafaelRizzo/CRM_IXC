let select_empresa = document.querySelector("#empresa")


select_empresa.addEventListener("change", () => {
    console.log(get_empresa_all_infos())
    console.log(get_empresa_selecionada())
    console.log(get_empresa_sistema())
    console.log(get_empresa_documentos())
    console.log(get_empresa_informativo())
    console.log(get_empresa_prazo())
    console.log(get_empresa_host())
    console.log(get_empresa_token())
    setDocumentos()
    setPrazo()
    toogle_alert()
})