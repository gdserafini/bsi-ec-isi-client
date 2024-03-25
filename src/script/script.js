const regexEmail = /^[\w.-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
const regexPhone = /^(\(?\d{2}\)?)?\s?9?\s?\d{4}\-?\d{4}$/;
const regexCpfCnpj = /^(?:(?:(?:\d{3}\.){2}\d{3}|\d{9})[-.]?\d{2}|(?:\d{2}\.?\d{3}\.?\d{3}\/?\d{4}-?\d{2}))$/;
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
        if(!termsChecked()){ 
            alert('Aceite os termos de uso para criar a conta'); 
        }else{window.alert("Preencha todos os campos");}
    }else if(!validateRegex(/^.{3,}$/, 'nome')){
        alert('Nome inválido, deve ter 3 ou mais caracteres');
    } else if (!validateRegex(regexEmail, 'email')) {
        window.alert("E-mail inválido, deve estar no formato texto@texto.com(.br)");
    } else if (!validateRegex(regexCpfCnpj, 'cpf')) {
        window.alert("CPF inválido, deve estar no formato 0000000000/000.000.000-00");
    } else if (!validateRegex(regexPhone, 'telefone')) {
        window.alert("Telefone inválido, deve estar no formato 00000000000/(00) 00000-0000");
    } 
    else if(!validateRegex(regexPassword, 'senha')){
        alert('Senha inválida, precisa ter 8 ou mais caracteres e ao menos 1 número.')
    }
    else if(!termsChecked()){ 
        alert('Aceite os termos de uso para criar a conta'); 
    }
    else {
        logSignupSubmit();
        window.location.href = "../../homeUsers.html";
    }
}

function termsChecked(){
    return document.getElementById('use-term').checked;
}

function validateFieldsV2(){
    const fields = [
        'nome', 'email', 'telefone', 
        'cpf', 'senha'
    ];
    return fields.every(
        field =>  document.getElementById(field).value.trim() !== ''
    );
}

function validateRegex(regex, field){
    return regex.test(document.getElementById(field).value);
}

function logSignupSubmit(){
    const name = document.getElementById('nome').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('telefone').value;
    const code = document.getElementById('cpf').value;
    console.log(
        `form submit: name: ${name}, email: ${email}, code: ${phone}, phone: ${code}, password: @encrypted`);
}