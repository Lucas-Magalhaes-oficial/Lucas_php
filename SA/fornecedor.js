var formEl = document.getElementById("meuform");

// Captura o evento de submit
captura_eventos(formEl, 'submit', formValid);

// Função para adicionar eventos com compatibilidade
function captura_eventos(objeto, evento, funcao){
    if (objeto.addEventListener){
        objeto.addEventListener(evento, funcao, true);
    } else if(objeto.attachEvent){
        objeto.attachEvent('on' + evento, funcao);
    }
}

// Cancela envio do formulário
function cancela_evento(evento){
    if (evento.preventDefault){
        evento.preventDefault();
    } else {
        window.event.returnValue = false;
    }
}

// Verifica se pelo menos um radio ou checkbox foi marcado
function verificaCampos(campo){
    let checado = false;
    for (let i = 0; i < campo.length; i++) {
        if (campo[i].checked) {
            checado = true;
        }
    }

    if (!checado) {
        alert("Marque o campo: " + campo[0].name);
        return false;
    }

    return true;
}

// Validação principal
function formValid(event){
    let campoNome = formEl.textname.value.trim();
    let campoCidade = formEl.cidades;
    let campoRadios = formEl.querySelectorAll('input[name="Sexo"]');
    let campoCheckbox = formEl.querySelectorAll('input[name="rede"]');

    if (campoNome.length === 0) {
        alert("O campo Nome é obrigatório.");
        cancela_evento(event);
        return false;
    }

    if (campoCidade.selectedIndex === 0) {
        alert("Selecione uma cidade.");
        cancela_evento(event);
        return false;
    }

    if (!verificaCampos(campoRadios)) {
        cancela_evento(event);
        return false;
    }

    if (!verificaCampos(campoCheckbox)) {
        cancela_evento(event);
        return false;
    }

    alert("Formulário válido. Enviando...");
    return true;
}
