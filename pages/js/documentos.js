const documentos_icon = document.querySelector("#documentos-icon")

const setDocumentos = () => {
    if(get_empresa_documentos() == null){

        documentos_icon.setAttribute("href", "https://docs.google.com/document/u/0/");
    }else{
        documentos_icon.setAttribute("href", get_empresa_documentos());        
    }
}