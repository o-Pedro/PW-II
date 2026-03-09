var timeid = null; //Variável que armazena a chamada da função timeout

var jogoAtivo = (true)

function iniciaJogo(){
    var url = window.location.search;

    var nivel_jogo = url.replace("?", "")

    var tempo_segundo = 0;

    if(nivel_jogo == 1){ //1 fácil -> 120 segundos
        tempo_segundo = 120;
    }
    if(nivel_jogo == 2){ //2 médio -> 60 segundos
        tempo_segundo = 60;
    }
    if(nivel_jogo == 3){ //3 díficil -> 30 segundos
        tempo_segundo = 30;
    }

    //inserindo segundos ao span
    document.getElementById('cronometro').innerHTML = tempo_segundo;

    //quantidade de balões
    var qtde_baloes = 80;

    cria_baloes(qtde_baloes);

    //imprimir quantidade de balões inteiros e estourados
    document.getElementById('baloes_inteiros').innerHTML = qtde_baloes;
    document.getElementById('baloes_estourados').innerHTML = 0;

    contagem_tempo(tempo_segundo + 1);
}

function contagem_tempo(segundos){
    segundos = segundos - 1;
    if(segundos == -1){
        clearTimeout(timeid); //para a execução da função do settimeout
        game_over();
        return false;
    }

    document.getElementById('cronometro').innerHTML = segundos;

    timeid = setTimeout("contagem_tempo("+segundos+")", 1000)
}
function game_over(){
    jogoAtivo = false
    alert("fim de jogo, volte ao menu seu bosta vai levar tiro")
}
function cria_baloes(qtde_baloes){
    for(var i = 1; i<= qtde_baloes; i++){
        var balao = document.createElement("img");
        balao.src = '../Imagens/balao_azul_pequeno.png';
        balao.style.margin = '10px'
        balao.id='b'+i;
        balao.onclick=(function(id){
            return function() {
                estourar(document.getElementById(id));
                this.onclick = null; //Desabilita cliques futuros (uma vez só)
            };

        })('b' + i);
        document.getElementById('cenario').appendChild(balao);
    }
}
function estourar(e){

    if(!jogoAtivo)return;

    var id_balao = e.id;
    document.getElementById(id_balao).src = '../Imagens/balao_azul_pequeno_estourado.png';

    pontuacao(-1);
}
function pontuacao(acao){
    var baloes_inteiros = document.getElementById('baloes_inteiros').innerHTML;
    var baloes_estourados = document.getElementById('baloes_estourados').innerHTML

    baloes_inteiros = parseInt(baloes_inteiros);
    baloes_estourados = parseInt(baloes_estourados);

    baloes_inteiros = baloes_inteiros + acao;
    baloes_estourados = baloes_estourados - acao;

    document.getElementById('baloes_inteiros').innerHTML = baloes_inteiros;
    document.getElementById('baloes_estourados').innerHTML = baloes_estourados;

    situacao_jogo(baloes_inteiros);
}
function situacao_jogo(baloes_inteiros){
    if(baloes_inteiros == 0){
        jogoAtivo = false
        alert('Parabéns, você conseguiu zerar essa bomba!')
        parar_jogo()
    }
}
function parar_jogo(){
    jogoAtivo = false
    clearTimeout(timeid);
}