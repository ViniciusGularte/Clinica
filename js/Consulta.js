var req2;


// para usuario marcar consulta
showConsultaCategoria =function(id) {

    // Verificando Browser
    if (window.XMLHttpRequest) {
        req2 = new XMLHttpRequest();
    }
    else if (window.ActiveXObject) {
        req2 = new ActiveXObject("Microsoft.XMLHTTP");
    }

// Arquivo PHP juntamente com o valor enviado pelo botao
    var url2 = "../controller/consulta/gerarConsulta.php?id=" + id;

// Chamada do método open para processar a requisição
    req2.open("Get", url2, true);

// Quando o objeto recebe o retorno, chamamos a seguinte função;
    req2.onreadystatechange = function () {

        // Exibe a mensagem "Buscando Dados..." enquanto carrega
        if (req2.readyState == 1) {
            document.getElementById('conteudo_painel').innerHTML = 'Buscando Dados ..';
        }

        // Verifica se o Ajax realizou todas as operações corretamente
        if (req2.readyState == 4 && req2.status == 200) {

            // Resposta retornada pelo php
            var resposta2 = req2.responseText;

            // Abaixo colocamos a(s) resposta(s) na div
            document.getElementById('conteudo_painel').innerHTML = resposta2;
        }
    }
    req2.send(null);
}

//Aqui envia script para deletar a conta do usuario;
showDeletarConta =function(id) {
    //verifica se o usuario realmente quer deletar a conta
    var r = confirm("Você tem certeza disso ?");
    if (r == true) {
                jQuery.ajax({
                    type: "POST",
                    url: "../controller/deletarConta.php",
                    data: id,
                    success: function(data)
                    {
                        alert("Deletado com sucesso");
                        $('#conteudo_painel').html(data);
                    }
                });
    }
    else {
        return false;        }


}