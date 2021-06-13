function validazione(event){
    event.preventDefault();
    const errori_php=document.querySelector('.errori');
    errori_php.innerHTML="";
    const errori_js=document.querySelectorAll('.span');
    for(errore of errori_js){
        if(!errore.classList.contains('nascondi')){
            event.preventDefault();;
        }
    }
    if(form.username.value==="" || form.password.value===""){
        document.querySelector('#campi_compila').classList.remove('nascondi');
        document.querySelector('#campi_compila').textContent='compila tutti i campi!';
    }else{
        document.querySelector('#campi_compila').classList.add('nascondi');
    }
    if(errore.classList.contains('nascondi') && (form.username.value!=="" || form.password.value!=="")){
        const datiForm={method:'POST',body:new FormData(form)};
        fetch('login',datiForm).then(onResponse).then(onText);
        //se non ci sono errori mando i dati a php. adesso se text ===1(perche in php faccio ritornare 1) allora c'e un errore di username o password
    }
}

function onResponse(response){
    return response.text();
}

function onText(text){
    const errori=document.querySelector("#errore_credenziali");
    if(text==1){
        errori.classList.remove("nascondi");
    } else {
        errori.classList.add("nascondi");
        window.location.replace("home");
    }
}

function controlloUsername(event){
    const username=document.querySelector('#username');
    const span=username.querySelector('span');
    if(event.currentTarget.value==""){
        span.classList.remove('nascondi');
        span.textContent='Compilare campo';
    }else{
        span.classList.add('nascondi');
    }
}

function controlloPassword(event){
    const password=document.querySelector('#password');
    const span=password.querySelector('span');
    if(event.currentTarget.value===""){
        span.classList.remove('nascondi');
        span.textContent='Compilare campo';
    }else{
        span.classList.add('nascondi');
    }    
}

const form=document.forms['login'];
form.username.addEventListener('blur',controlloUsername);
form.password.addEventListener('blur',controlloPassword);
form.addEventListener('submit',validazione);