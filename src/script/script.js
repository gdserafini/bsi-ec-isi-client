const regexEmail = /^[\w.-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
const regexPhone = /^(\(?\d{2}\)?)?\s?9?\s?\d{4}\-?\d{4}$/;
const regexCPF = /^(?:(?:(?:\d{3}\.){2}\d{3}|\d{9})[-.]?\d{2}|000\.000\.000-00)$/;
const regexCEP = /^\d{2}\.?\d{3}-?\d{3}$/;
const regexPassword = /^(?=.*\d).{8,}$/;

//funções de navegação a serem implementadas futuramente
const goToLogin = () => {};
const goToAbout = () => {};
const goToLocalRegistration = () => {};
const goToLocals = () => {};
//

function irParaCriarConta() {
    window.location.href = "src/page/criarConta.html";
}

function voltarIndex() {
    window.location.href = "../../index.html";
}

function validateInput() {
    if (!validateFieldsV2()) {
        window.alert("Preencha todos os campos!");
    }else if(!validateRegex(/^.{3,}$/, 'nome')){
        alert('Nome inválido, precisa ter 3 ou mais caracteres.');
    } else if (!validateRegex(regexEmail, 'email')) {
        window.alert("E-mail inválido!");
    } else if (!validateRegex(regexCPF, 'cpf')) {
        window.alert("CPF inválido!");
    } else if (!validateRegex(regexPhone, 'telefone')) {
        window.alert("Telefone inválido!");
    } else if (!validateRegex(regexCEP, 'cep')) {
        window.alert("Cep inválido!");
    } 
    else if(!validateRegex(regexPassword, 'senha')){
        alert('Senha inválida, precisa ter 8 ou mais caracteres e ao menos 1 número.')
    }
    else {
        window.location.href = "../../homePageUser.html";
    }
}

function validateFieldsV2(){
    const fields = [
        'nome', 'email', 'telefone', 
        'cpf', 'cep', 'endereco', 'senha'
    ];
    return fields.every(
        field =>  document.getElementById(field).value.trim() !== ''
    );
}

function validateRegex(regex, field){
    return regex.test(document.getElementById(field).value);
}