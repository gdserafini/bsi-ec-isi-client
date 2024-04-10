const regexEmail = /^[\w.-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
const regexPhone = /^(\(?\d{2}\)?)?\s?9?\s?\d{4}\-?\d{4}$/;
const regexCpfCnpj = /^(?:(?:(?:\d{3}\.){2}\d{3}|\d{9})[-.]?\d{2}|(?:\d{2}\.?\d{3}\.?\d{3}\/?\d{4}-?\d{2}))$/;
const regexCEP = /^\d{2}\.?\d{3}-?\d{3}$/;
const regexPassword = /^(?=.*\d).{8,}$/;

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
function irParaEditarConta() {
    window.location.href = "editarConta.html";
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

function validatePatterns(){
    const fields = ['nome', 'email', 'telefone', 'cpf', 'senha', 'confirmarSenha'];
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
    const fields = ['nome', 'email', 'telefone', 'cpf', 'senha', 'confirmarSenha'];
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
/**
function validatePassword() {
    var senha = document.getElementById("senha").value;
    var confirmarSenha = document.getElementById("confirmarSenha").value;

    if (senha != confirmarSenha) {
      document.getElementById("confirmarSenha").setCustomValidity("As senhas não coincidem!");
    } else {
      document.getElementById("confirmarSenha").setCustomValidity('');
    }
  }
 */

// validar login

function validarLogin() {
    var nome = document.getElementById('nome').value;
    var email = document.getElementById('email').value;
    var senha = document.getElementById('senha').value;
    if (nome.length < 3) {
        return false;
    } 
    if (!email.match(/^[\w.-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/)) {
        return false;
    }
    if (!senha.match(/^(?=.*\d).{8,}$/)) {
        return false;
    }
    else {
        return true;
        window.location.href = "homeUsers.html";
}
}