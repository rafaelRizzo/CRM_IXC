<?php
session_start();

// Validação para não conseguirem acessar a URL diretamente (sem logar).
if ($_SESSION['login'] != 'true') {
    header("Location: ../../index.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM - Suporte</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified CSS -->

    <!-- Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Icons -->

    <!-- CSS -->
    <link rel="stylesheet" href="../css/cores.css">
    <link rel="stylesheet" href="../css/modais/style.css">
    <link rel="stylesheet" href="../css/recolor.css">
    <link rel="stylesheet" href="../css/loader.css">
    <link rel="stylesheet" href="../css/form.css">
    <link rel="stylesheet" href="../css/stepper.css">
    <link rel="stylesheet" href="./css/style.css">

    <!-- CSS -->

    <!-- Seta o nome do agente no localstorage (Só expira quando fecha a página) -->
    <script>
        localStorage.setItem("agente", "<?php echo $_SESSION['user']['agent']; ?>")
    </script>
    <!-- Seta o nome do agente no localstorage (Só expira quando fecha a página) -->

    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <div class="container-wizard">
        <section class="section step-wizard">
            <ul class="step-wizard-list">
                <li class="step-wizard-item current-item">
                    <span class="progress-count">1</span>
                    <span class="progress-label">Dados pessoais</span>
                </li>
                <li class="step-wizard-item">
                    <span class="progress-count">2</span>
                    <span class="progress-label">Assunto do atendimento</span>
                </li>
                <li class="step-wizard-item">
                    <span class="progress-count">3</span>
                    <span class="progress-label">Informações complementares</span>
                </li>
                <li class="step-wizard-item">
                    <span class="progress-count">4</span>
                    <span class="progress-label">Finalização</span>
                </li>
            </ul>
        </section>
    </div>
    <div class="container-form">

        <!-- Dados pessoais -->
        <form id="form1" data-step="1">
            <div class="d-flex">
                <select id="empresa" class="browser-default">
                    <option value="" selected disabled>Selecione a empresa que está atendendo.</option>
                    <option id="carregando-empresas" value="" disabled>Carregando... aguarde</option>
                </select>
            </div>

            <div class="d-flex">
                <input id="nome-cliente" type="text" placeholder="Nome do cliente" autocomplete="off">
                <input id="doc-cliente" type="text" maxlength="14" placeholder="Documento do cliente" autocomplete="off">
                <input id="telefone-cliente" type="text" data-mask="(00) 00000-0000" placeholder="Telefone do cliente" autocomplete="off">
            </div>

            <div class="d-flex">
                <input id="endereco-cliente" type="text" placeholder="Endereço do cliente" autocomplete="off">
            </div>

            <div class="container-btn-form">
                <p class="btn waves-effect waves-light" id="back">Voltar</p>
                <button class="btn waves-effect waves-light" id="next">Avançar</button>
            </div>
        </form>
        <!-- Dados pessoais -->

        <!-- Assunto do atendimento -->
        <form id="form2" data-step="2">
            <div class="d-flex">
                <select id="assunto_atendimento" class="browser-default">
                    <option value="" selected disabled>Selecione o motivo do contato
                    </option>
                    <option value="SEM CONEXÃO">Sem Conexão</option>
                    <option value="OSCILAÇÃO">Oscilação</option>
                    <option value="LENTIDÃO">Lentidão</option>
                    <option value="POSTE PEGOU FOGO">Poste pegou fogo</option>
                    <option value="FALTA DE COMUNICAÇÃO">Falta de comunicação</option>
                    <option value="DERRUBOU O APARELHO NO CHÃO">Derrubou o aparelho no chão</option>
                    <option value="APARELHO SOLTOU DA PAREDE">Aparelho soltou da parede</option>
                    <option value="APARELHO QUEIMOU">Aparelho queimou</option>
                    <option value="MANUTENÇÃO">Manutenção</option>
                    <option value="CONFIGURAÇÃO">Configuração</option>
                    <option value="TROCA DE SENHA/E/OU NOME WIFI">Troca de senha/nome do wifi
                    </option>
                    <option value="MUDANÇA DE COMODO">Mudança de cômodo</option>
                    <option value="CABO ARREBENTADO">Cabo arrebentado</option>
                    <option value="TROCAR/REFAZER DE CONECTOR">Trocar/refazer conector</option>
                    <option value="VENDA DE ROTEADOR">Venda de roteador</option>
                    <option value="JÁ TINHA ATENDIMENTO ABERTO">Já possui atendimento aberto
                    </option>
                    <option value="CONEXÃO NORMALIZADA">Conexão normalizada</option>
                    <option value="ATENDIMENTO FORA DO PRAZO">Atendimento fora do prazo</option>
                    <option value="HORÁRIO COMERCIAL">Horário comercial</option>
                    <option value="LIGAÇÃO CAIU">Ligação caiu</option>
                    <option value="OUTROS">Outros</option>
                </select>
            </div>

            <div class="container-btn-form">
                <p class="btn waves-effect waves-light" id="back">Voltar</p>
                <button class="btn waves-effect waves-light" id="next">Avançar</button>
            </div>
        </form>
        <!-- Assunto do atendimento -->

        <!-- Dados complementares -->
        <form id="form3" data-step="3">
            <div class="input-field col s12">
                <select multiple>
                    <option value="" disabled selected>Choose your option</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                </select>
                <label>Materialize Multiple Select</label>
            </div>

            <div class="container-btn-form">
                <p class="btn waves-effect waves-light" id="back">Voltar</p>
                <button class="btn waves-effect waves-light" id="next">Avançar</button>
            </div>
        </form>
        <!-- Dados complementares -->



    </div>

    <!-- Botão mais -->
    <div class="fixed-action-btn">
        <div class="container-helper">
            <a class="btn-floating btn-large waves-effect waves-light">
                <i class="large material-icons">add</i>
            </a>
        </div>
        <ul>
            <li>
                <a class="btn-floating tooltipped waves-effect waves-light" data-position="left" data-tooltip="Resetar campos">
                    <i class="material-icons">refresh</i>
                </a>
            </li>
            <li>
                <a class="btn-floating tooltipped waves-effect waves-light" data-position="left" data-tooltip="DarkMode">
                    <i class="material-icons">brightness_4</i>
                </a>
            </li>
            <li>
                <a class="btn-floating tooltipped waves-effect waves-light" id="informativos-icon" data-position="left" data-tooltip="Informativos">
                    <i class="material-icons">warning</i>
                </a>
            </li>
            <li>
                <a class="btn-floating tooltipped waves-effect waves-light" data-position="left" data-tooltip="Exportar dados pessoais">
                    <i class="material-icons">import_export</i>
                </a>
            </li>
            <li>
                <a class="btn-floating tooltipped waves-effect waves-light" id="prazo-icon" data-position="left" data-tooltip="Prazo da empresa">
                    <i class="material-icons">access_time</i>
                </a>
            </li>
            <li>
                <a href="https://docs.google.com/document/u/0/" target="_blank" id="documentos-icon" class="btn-floating tooltipped waves-effect waves-light" data-position="left" data-tooltip="Documentos da empresa">
                    <i class="material-icons">content_paste</i>
                </a>
            </li>
            <li>
                <a class="btn-floating tooltipped waves-effect waves-light" id="sync-empresas" data-position="left" data-tooltip="Sincronizar empresas">
                    <i class="material-icons">sync</i>
                </a>
            </li>
            <li>
                <a class="btn-floating tooltipped waves-effect waves-light modal-trigger" href="#minha-conta" data-position="left" data-tooltip="Minha conta">
                    <i class="material-icons">person_outline</i>
                </a>
            </li>
        </ul>
    </div>

    <!-- Modais -->

    <!-- Modal Minha Conta -->
    <div id="minha-conta" class="modal">
        <div class="modal-content center">
            <h4>Minha conta</h4>
            <p id=""><?php echo $_SESSION['user']['agent']; ?></p>
        </div>
        <div class="modal-footer">
            <button id="salvar-alteracoes-login" class="modal-close waves-effect waves-light btn-flat green">Salvar</button>
            <button class="modal-close waves-effect waves-light btn-flat red">Fechar</button>
        </div>
    </div>
    <!-- Modal Minha Conta -->

    <!-- Modais -->

    <!-- Toast -->
    <a onclick="M.toast({html: 'Selecione a empresa que gostaria de saber o prazo'})" class="btn-toast-modal"></a>
    <!-- Toast -->

    <!-- Loader -->
    <div class="container-loader">
        <div class="preloader-wrapper big active">
            <div class="spinner-layer spinner-purple-only">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Sincronizando empresas...</p>
    </div>

    <div class="container-loader-sucesso">
        <i class="material-icons">check_circle</i>
        <p>Empresas sincronizadas com sucesso!</p>
    </div>
    <!-- Loader -->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script src="../js/materialize.js"></script>
    <script src="../js/funcoesGetCache.js"></script>
    <script src="../js/reqEmpresas.js"></script>
    <script src="../js/documentos.js"></script>
    <script src="../js/prazo.js"></script>
    <script src="../js/empresaSelecionada.js"></script>
    <script src="../js/informativo.js"></script>
    <script src="../js/mascaras.js"></script>
    <script src="../js/steps.js"></script>
</body>

</html>