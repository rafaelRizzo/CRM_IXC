const get_empresa_all_infos = () => {
    let empresaCache = JSON.parse(localStorage.getItem('empresas'))

    for (i = 0; i < empresaCache.length; i++) {
        if (select_empresa.value == empresaCache[i]['empresa']) {
            return empresaCache[i]
        }
    }
}

const get_empresa_selecionada = () => {
    let empresaCache = JSON.parse(localStorage.getItem('empresas'))

    for (i = 0; i < empresaCache.length; i++) {
        if (select_empresa.value == empresaCache[i]['empresa']) {
            return empresaCache[i]['empresa']
        }
    }
}

const get_empresa_sistema = () => {
    let empresaCache = JSON.parse(localStorage.getItem('empresas'))

    for (i = 0; i < empresaCache.length; i++) {
        if (select_empresa.value == empresaCache[i]['empresa']) {
            return empresaCache[i]['classeSistema']
        }
    }
}

const get_empresa_documentos = () => {
    let empresaCache = JSON.parse(localStorage.getItem('empresas'))

    for (i = 0; i < empresaCache.length; i++) {
        if (select_empresa.value == empresaCache[i]['empresa']) {
            return empresaCache[i]['documentos']
        }
    }
}

const get_empresa_informativo = () => {
    let empresaCache = JSON.parse(localStorage.getItem('empresas'))

    for (i = 0; i < empresaCache.length; i++) {
        if (select_empresa.value == empresaCache[i]['empresa']) {
            return empresaCache[i]['informativos']
        }
    }
}

const get_empresa_prazo = () => {
    let empresaCache = JSON.parse(localStorage.getItem('empresas'))

    for (i = 0; i < empresaCache.length; i++) {
        if (select_empresa.value == empresaCache[i]['empresa']) {
            return empresaCache[i]['prazo']
        }
    }
}

const get_empresa_host = () => {
    let empresaCache = JSON.parse(localStorage.getItem('empresas'))

    for (i = 0; i < empresaCache.length; i++) {
        if (select_empresa.value == empresaCache[i]['empresa']) {
            return empresaCache[i]['host']
        }
    }
}

const get_empresa_token = () => {
    let empresaCache = JSON.parse(localStorage.getItem('empresas'))

    for (i = 0; i < empresaCache.length; i++) {
        if (select_empresa.value == empresaCache[i]['empresa']) {
            return empresaCache[i]['token']
        }
    }
}