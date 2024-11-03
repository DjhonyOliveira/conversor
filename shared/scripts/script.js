// salva a sigla das moedas consultadas
let moedasSolicitadas = '';

$('#moeda1, #moeda2').change(validaSelecao);

// realiza a captura dos dados ao dar o click no botão "Conversão"
$('form').on('submit', function(ev) {
    ev.preventDefault();

    let dadosForm = null;
    let moeda1    = $('#moeda1').val();
    let moeda2    = $('#moeda2').val();

    if(moeda1 != undefined && moeda2 != undefined){
        dadosForm = {moeda1, moeda2};
        moedasSolicitadas = moeda1 + moeda2;
    }
    else{
        return false;
    }

    submit(dadosForm);  
})

// valida se as moedas selecionadas são iguais, caso sim, retorna um alerta e reseta a segunda seleção
function validaSelecao() {
    let moeda1 = $('#moeda1').val();
    let moeda2 = $('#moeda2').val();
    $("#customAlert").removeClass("show").fadeIn();

    if (moeda1 && moeda1 === moeda2) {
        $("#customAlert").addClass("show").fadeIn();
        $('#moeda2').val('');
    }
}

// realiza o submit do formulario e recebe o retorno do backend
function submit(parametros){
    let url = window.location;

    $.ajax({
        url: url.origin + '/conversor/', 
        type: 'POST',
        data: parametros,
        dataType: 'json',
        success: function(response){
            trataDados(response);
        },
        error: function(error){
            $('.result').text('Ocorreu um erro: ' + error);
        }
    });
}

// realiza o tratamento dos dados recebidos do backend
function trataDados(response){
    let moeda1     = response[moedasSolicitadas].name.split('/')[0];
    let moeda2     = response[moedasSolicitadas].name.split('/')[1];
    let conversao  = response[moedasSolicitadas].bid;
    let menorValor = response[moedasSolicitadas].low;
    let maiorValor = response[moedasSolicitadas].high;

    montaRetorno(moeda1, moeda2, conversao, menorValor, maiorValor);
};

// chama as funções para montar o retorno no frontend
function montaRetorno(moeda1, moeda2, conversao, menorValor, maiorValor){
    criaCampoConversaoEntreMoedas(moeda1, moeda2, conversao);
    criaMaiorValorPeriodo(moeda1, moeda2, maiorValor);
    criaMenorValorPeriodo(moeda1, moeda2, menorValor);
};

// cria o input com o valor de conversão de uma moeda para a outra
function criaCampoConversaoEntreMoedas(moeda1, moeda2, conversao){
    let input = document.createElement('input');
    let label = document.createElement('label')

    label.name      = 'conversao';
    label.innerText = 'Conversão de ' + moeda1 + ' para ' + moeda2;
    label.className = 'floatingInputValue'
    label.setAttribute('for', 'conversao');

    input.type      = 'text';
    input.className = 'mt-3 form-control';
    input.disabled  = true;
    input.name      = 'conversao';
    input.id        = 'conversao';
    input.value     = '1 ' + moeda1 + ' equivale a ' + parseFloat(conversao).toFixed(2) + ' ' + moeda2;

    $('.conversao').append(input);
    $('.conversao').append(label);
};

// cria o input informando o maior valor atingido no periodo
function criaMaiorValorPeriodo(moeda1, moeda2, maiorValor){
    let label = document.createElement('label');
    let input = document.createElement('input');

    label.name      = 'hightValue';
    label.innerText = 'Maior valor registrato do ' + moeda1 + ' em ' + moeda2;
    label.className = 'floatingInputValue'
    label.setAttribute('for', 'hightValue');

    input.type      = 'text';
    input.disabled  = true;
    input.name      = 'hightValue';
    input.id        = 'hightValue';
    input.className = 'form-control';
    input.value     = parseFloat(maiorValor).toFixed(2);

    $('.hightValue').append(input);
    $('.hightValue').append(label);
    
}

// cria o input validando o menor valor atingido no periodo
function criaMenorValorPeriodo(moeda1, moeda2, menorValor){
    let label = document.createElement('label');
    let input = document.createElement('input');

    label.name      = 'minValue';
    label.innerText = 'Menor valor registrato do ' + moeda1 + ' em ' + moeda2;
    label.className = 'floatingInputValue';
    label.setAttribute('for', 'minValue');

    input.type      = 'text';
    input.disabled  = true;
    input.id        = 'minValue';
    input.name      = 'minValue';
    input.className = 'form-control' ;
    input.value     = parseFloat(menorValor).toFixed(2);

    $('.minValue').append(input);
    $('.minValue').append(label);
}