function irParaCriarConta() {
    window.location.href = "src/page/criarConta.html";
}

function voltarIndex() {
    window.location.href = "../../index.html";
}

function validateInput() {
    if (validaCamposPreenchidos() == true) {
        window.alert("Preencha todos os campos!");
    } else if (validaEmail() == false) {
        window.alert("E-mail inválido!");
    } else if (validaCpf() == false) {
        window.alert("CPF inválido!");
    } else if (validaTelefone() == false) {
        window.alert("Telefone inválido!");
    } else if (validaCep() == false) {
        window.alert("Cep inválido!");
    } else {
        window.location.href = "../../homePageUser.html";
    }
}

function validaCamposPreenchidos() {
    const nomeInput = document.getElementById('nome').value;
    const emailInput = document.getElementById("email").value;
    const telInput = document.getElementById("telefone").value;
    const cpfInput = document.getElementById("cpf").value;
    const cepInput = document.getElementById("cep").value;
    const endInput = document.getElementById("endereco").value;
    const senhaInput = document.getElementById("senha").value;

    if (
        nomeInput.trim() === '' ||
        emailInput.trim() === '' ||
        telInput.trim() === '' ||
        cepInput.trim() === '' ||
        cpfInput.trim() === '' ||
        endInput.trim() === '' ||
        senhaInput.trim() === ''
    ) {
        return true;
    } else {
        return false;
    }
}

function validaEmail() {
    const emailInput = document.getElementById("email").value;
    const regexEmail = /^[\w.-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/g;
    return regexEmail.test(emailInput);
}

function validaTelefone() {
    const telInput = document.getElementById("telefone").value;
    const regexTelefone = /^(\(?\d{2}\)?)?\s?9?\s?\d{4}\-?\d{4}$/g;
    return regexTelefone.test(telInput);
}

function validaCpf() {
    const cpfInput = document.getElementById("cpf").value;
    const regexCpf = /^(?:(?:(?:\d{3}\.){2}\d{3}|\d{9})[-.]?\d{2}|000\.000\.000-00)$/g;
    return regexCpf.test(cpfInput);
}

function validaCep() {
    const cepInput = document.getElementById("cep").value;
    const cepRegex = /^\d{2}\.?\d{3}-?\d{3}$/g;
    return cepRegex.test(cepInput);
}