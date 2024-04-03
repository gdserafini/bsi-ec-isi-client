const regexEmail = /^[\w.-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
const regexPhone = /^(\(?\d{2}\)?)?\s?9?\s?\d{4}\-?\d{4}$/;
const regexCpfCnpj = /^(?:(?:(?:\d{3}\.){2}\d{3}|\d{9})[-.]?\d{2}|(?:\d{2}\.?\d{3}\.?\d{3}\/?\d{4}-?\d{2}))$/;
const regexCEP = /^\d{2}\.?\d{3}-?\d{3}$/;
const regexPassword = /^(?=.*\d).{8,}$/;

/*funções de navegação a serem implementadas futuramente
const goToLogin = () => {};
const goToAbout = () => {};
const goToLocalRegistration = () => {};
const goToLocals = () => {};
*/

function irParaCriarContaIndex() {
    window.location.href = "src/page/criarConta.html";
}
function irParaLoginIndex() {
    window.location.href = "src/page/login.html";
}
function irParaLogin() {
    window.location.href = "login.html";
}
function irParaLocal() {
    window.location.href = "local.html";
}
function irParaSobre() {
    window.location.href = "sobre.html";
}
function irParaLocais() {
    window.location.href = "locais.html";
}
function irParaCriarConta() {
    window.location.href = "criarConta.html";
}
function irParaSobreIndex() {
    window.location.href = "src/page/sobreIndex.html";
}
function irParaHomeUsers() {
    window.location.href = "homeUsers.html";
}
function irParaCadLocaisIndex() {
    window.location.href = "src/page/cadLocal.html";
}
function irParaLocaisIndex() {
    window.location.href = "src/page/locaisIndex.html";
}
/**
 * @deprecated Substituida pela validação do próprio HTML
 */
function validateInput() {
    if (!validateFields()) {
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
    else {logSignupSubmit();
        window.location.href = "homeUsers.html";
    }
}

function validatePatterns(){
    const fields = ['nome', 'email', 'telefone', 'cpf', 'senha'];
    return fields.every(
        field =>  {
            return (new RegExp(document.getElementById(field).pattern))
                .test(document.getElementById(field).value);
        }
    );
}

document.getElementById('cpf').addEventListener('input', function() {
    this.value = this.value.replace(/[^\d./-]/g, '');
});

document.getElementById('telefone').addEventListener('input', function() {
    this.value = this.value.replace(/[^\d-() ]/g, '');
});

/**
 * @description
 * Esta função irá realizar toda a lógica de enviar os dados
 * do formulário para o back-end. A ser implementada.
 */
function submitLogin(){
    if(validatePatterns() && termsChecked()){ return; }
}

function termsChecked(){
    return document.getElementById('use-term').checked;
}

function validateFields(){
    const fields = ['nome', 'email', 'telefone', 'cpf', 'senha'];
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