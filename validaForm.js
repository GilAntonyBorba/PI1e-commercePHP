
const btnEl = document.querySelector("#btn-form");
btnEl.addEventListener("click", function(e){
    e.preventDefault()
    validaForm()
    
});

const validaForm = () =>{
    const spanNome = document.getElementById('spanNome');
    const spanEmail = document.getElementById('spanEmail');
    const spanPassword = document.getElementById('spanPassword');
    const spanPasswordConfirm = document.getElementById('spanPasswordConfirm');
    const spanCheckbox = document.getElementById('checkboxError');
    const spanRadiobox = document.getElementById('RadioError');

    let pCheckbox = document.getElementById('pCheck');
    let pRadio = document.getElementById('pRadio');

    //para não manter as mensagens de erro mesmo que eelas estejam certas (quando vc submeter o formulário de novo)
    spanNome.textContent = "";
    spanEmail.textContent = "";
    spanPassword.textContent = "";
    spanPasswordConfirm.textContent = "";
    spanCheckbox.textContent = "";

    let name = document.querySelector("#InputName");
    let email = document.querySelector("#InputEmail");
    let password = document.querySelector("#InputPassword");
    let passwordConfirm = document.querySelector("#InputPasswordConfirm");
    let radioOptions = document.querySelectorAll('input[name="conheciaAntes"]');
    let radioChoosed;
    let checkboxes = document.querySelectorAll('input[name="conheceu[]"]');
   

    name.classList.remove("inputDestacado");
    email.classList.remove("inputDestacado");
    password.classList.remove("inputDestacado");
    passwordConfirm.classList.remove("inputDestacado");
    pCheckbox.classList.remove("pDestacado");
    pRadio.classList.remove("pDestacado");




    // NAME-=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=
    if(name.value === ""){
        spanNome.textContent = 'Usuário deve ser preenchido';
        name.classList.add("inputDestacado");
        return;
    }else if(name.value.indexOf(' ')<=0){
        spanNome.textContent = 'Usuário deve conter pelo menos dois termos (nome e sobrenome, separados por um espaço em branco)';
        name.classList.add("inputDestacado");
        return;
    }else{
        name.classList.remove("inputDestacado");
    }

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
    //Confirmação de Senha
    if(passwordConfirm.value!=password.value){
        spanPasswordConfirm.textContent = 'A confirmação de senha não confere';
        passwordConfirm.classList.add("inputDestacado");
        return;
    }

    //Radio-=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=
    let radioChecked = false;
    for (let radio of radioOptions) {
        if (radio.checked) {
            radioChecked = true;
            radioChoosed = radio.value;
            break;
        }
    }
    if (!radioChecked) {
        spanRadiobox.textContent = 'Por favor, selecione pelo menos uma opção em "Já nos conhecia anteriormente"';
        spanRadiobox.style.display = 'block'; // Exibe a mensagem de erro
        pRadio.classList.add('pDestacado');
        return;
    }else{
        spanRadiobox.textContent = ''; // Limpa a mensagem de erro
        spanRadiobox.style.display = 'none'; // Oculta a mensagem de erro
        pRadio.classList.remove("pDestacado");
    }


    //Checkboxes-=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=
    let cont=0;
    for (let i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            cont++;
        }
    }
    if(cont==0){
        spanCheckbox.textContent = 'Por favor, selecione pelo menos uma opção em "Por onde nos conheceu"';
        spanCheckbox.style.display = 'block'; // Exibe a mensagem de erro
        pCheckbox.classList.add("pDestacado");
        return;        
    }else {
        spanCheckbox.textContent = ''; // Limpa a mensagem de erro
        spanCheckbox.style.display = 'none'; // Oculta a mensagem de erro
        pCheckbox.classList.remove("pDestacado");
    }

    //Salvando no navegador-=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=
    const user = {
        nome: name.value,
        email: email.value
    }
    //alert(`Nome: ${user.nome} - Email: ${user.email}`);
    localStorage.setItem("@User", JSON.stringify(user))

    //Chama o modal-=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=
    const myModal = new bootstrap.Modal(document.getElementById('createAccountModal'));
    let mod_nameEl = document.querySelector("#mod-name");
    let mod_emailEl = document.querySelector("#mod-email");
    let mod_passwordEl = document.querySelector("#mod-password");
    let mod_radioEl = document.querySelector("#mod-radio");
    let mod_checksEl = document.querySelector("#mod-checks");

    mod_nameEl.textContent = "Nome: " + name.value;
    mod_emailEl.textContent = "Email: " + email.value;
    mod_passwordEl.textContent = "Senha: " + password.value;
    mod_radioEl.textContent = "Nos conhecia anteriormente? " + radioChoosed;
    mod_checksEl.textContent = "Por onde nos conheceu? ";

    let contModChecks=0;
    for(let checks of checkboxes){
        if (checks.checked) {
            contModChecks++;
            if(contModChecks === 1){
                mod_checksEl.textContent += checks.value;
            }
            if(contModChecks > 1){
                mod_checksEl.textContent += ", " + checks.value;
            }
        }
    }
    
    myModal.show();

    // Ouvinte do botão de limpar
    const btnModLimparEl = document.getElementById("btn-mod-limpar");
    btnModLimparEl.addEventListener('click', function() {
        name.value = '';
        email.value = '';
        password.value = '';
        passwordConfirm.value = '';
        for(let checks of checkboxes){
            checks.checked = false;
        }
        for (let radio of radioOptions) {
            radio.checked = false;
        }
    });

    //Direcionando para a outra página-=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=
    const btnModEnviarEl = document.getElementById("btn-mod-env");
    btnModEnviarEl.addEventListener('click', function(){
        document.getElementById('form-create-account').submit();
    })

}