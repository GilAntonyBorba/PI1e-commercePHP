
const btnEl = document.querySelector("#btn-form");
btnEl.addEventListener("click", function(e){
    e.preventDefault()
    validaForm()
    
});

const validaForm = () =>{
    const spanEmail = document.getElementById('spanEmail');
    const spanPassword = document.getElementById('spanPassword');

    //para não manter as mensagens de erro mesmo que eelas estejam certas (quando vc submeter o formulário de novo)
    spanEmail.textContent = "";
    spanPassword.textContent = "";

    let email = document.querySelector("#InputEmail");
    let password = document.querySelector("#InputPassword");

    email.classList.remove("inputDestacado");
    password.classList.remove("inputDestacado");

    // EMAIL-=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=
    if(email.value == ""){
        spanEmail.textContent = 'O E-mail deve ser preenchido';
        email.classList.add("inputDestacado");
        return;
    }else if(email.value.indexOf('@') < 2){
        spanEmail.textContent = 'O E-mail deve conter o @ a partir da segunda posição';
        email.classList.add("inputDestacado");
        return;
    }else{
        email.classList.remove("inputDestacado");
    }

    // Senha-=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=
    if(password.value === ""){
        spanPassword.textContent = 'Uma senha deve ser fornecida';
        password.classList.add("inputDestacado");
        return;
    }else if(password.value.indexOf(' ') >= 0){
        spanPassword.textContent = 'A senha não deve ter espaços em branco';
        password.classList.add("inputDestacado");
        return;
    }else if(password.value.length < 8){
        spanPassword.textContent = 'A senha deve conter pelo menos 8 caracteres';
        password.classList.add("inputDestacado");
        return;
    }else{
        password.classList.remove("inputDestacado");
    }

    


    //Direcionando para a outra página-=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=
    document.getElementById('form-create-account').submit();
    // const btnModEnviarEl = document.getElementById("btn-form");
    // btnModEnviarEl.addEventListener('click', function(){
    //     document.getElementById('form-create-account').submit();
    // })

}