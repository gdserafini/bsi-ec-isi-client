function verificaElementos(){//funcao que chama as funcoes de verificacao
    if(verificaCPF() == false){ //verificando CPF
        return  window.alert("CPF invalido")
}
    else{
        if(verificaTefelfone() == false){ //verificando telefone
        return  window.alert("Telefone invalido")}
        else{if(verificaEmail() == false){//verificando email
            return  window.alert("Email invalido")

        }
        else{
            window.alert("Conta criada com sucesso")
        }

  

    }

}
}

function verificaEmail(){       
    var email = document.getElementById("inputemail").value;

   
    const regexEmail = /^([a-z0-9_.-]{2,})@([a-z0-9]{2,})(\.[a-z]{2,})?$/gi //declarar ragex de email
    
    return(regexEmail.test(email));

}

function verificaTefelfone(){

    var telefone = document.getElementById("imputTelefone").value;

    
    const regexTelefone = /^(\(\d{2}\)?|\d{2,3}?)?(\d{4,5}?\d{4})$/g //declarar ragex de telefone

    return(regexTelefone.test(telefone));

  

   
}

function verificaCPF(){
    var CPF = document.getElementById("imputCPF").value;

    
    const regexCPF = /^(?:(?:(?:\d{3}\.){2}\d{3}|\d{9})[-.]?\d{2}|000\.000\.000-00)$/g //declarar ragex de CPF
    return(regexCPF.test(CPF));
    
    


}

    
