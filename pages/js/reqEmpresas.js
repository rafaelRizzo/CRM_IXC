// Iniciando as funções que serão usadas
const getEmpresas = () => {
    $.ajax({
        url: "./db/gets/empresa.php",
        method: "POST",
        dataType: "json",
        beforeSend: function () {
            // 
        }
    }).done(function (res) {

        // Aqui removo a option do select que informava que estava carregando.
        $("#carregando-empresas").remove()
        $(".select-wrapper ul li")[1].remove()

        if (res != 'false') {
            // Setamos a resposta da requisição em uma varivael e depois no localstorage 
            let arr = res
            localStorage.setItem('empresas', JSON.stringify(arr));

            // Aqui escrevemos a resposta pegando o array armazenado em cache
            let empresaCache = JSON.parse(localStorage.getItem('empresas'))
            for (i = 0; i < empresaCache.length; i++) {
                $(".select-wrapper ul").append(`<li><span>${empresaCache[i]['empresa']}</span></li>`)
                $("#empresa").append(`<option value="${empresaCache[i]['empresa']}">${empresaCache[i]['empresa']}</option>`)
            }
            // Chamamos novamente a função do materialize para atualizar os valores quando o input foi populado depois da requisição, pois sem ele o valor não é alterado quando selecionamos o option
            $(document).ready(function () {
                $('select').formSelect();
            });
        } // Trato caso der algum erro
        else {
            $(".select-wrapper ul").append(`<li><span>Ocorreu algum erro para buscar as empresas, atualize a página ou chame um responsável!</span></li>`)
            $("#empresa").append(`<option value="">Ocorreu algum erro para buscar as empresas, atualize a página ou chame um responsável!</option>`)
        }
    })
}

const writeCacheEmpresa = () => {
    // // Aqui removo a option do select que informava que estava carregando.
    $("#carregando-empresas").remove()

    // E uso o array que está no localstorage
    let empresaCache = JSON.parse(localStorage.getItem('empresas'))

    for (i = 0; i < empresaCache.length; i++) {
        $(".select-wrapper ul").append(`<li><span>${empresaCache[i]['empresa']}</span></li>`)
        $("#empresa").append(`<option value="${empresaCache[i]['empresa']}">${empresaCache[i]['empresa']}</option>`)
    }
    // Chamamos novamente a função do materialize para atualizar os valores quando o input foi populado depois da requisição, pois sem ele o valor não é alterado quando selecionamos o option
    $(document).ready(function () {
        $('select').formSelect();
    });
}

// Essa primeira verificação é feita pois a primeira requisição gera um cache das informações de todas as empresas, não fazendo necessário ficar fazendo requisição toda vez que a página é carregada.
// Feito isso é importante fazer algum botão onde o usuario possa gerar essa requisição novamente pois os supervisores/coordenadores podem adicionar uma nova empresa e não será mostrada caso 
if (localStorage.getItem('empresas') == null) {
    getEmpresas()
} else {
    writeCacheEmpresa()
}