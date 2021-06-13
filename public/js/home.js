
function aggiornaLike(json,span_like){
    console.log(json);
    span_like.textContent=json;
}

function GuardaiLike(event){
    const span_num_like=event.currentTarget;
    const div_int=span_num_like.parentNode;
    const post_id=div_int.querySelector('.immagine_cuore').dataset.id;
    fetch('GuardaLike/'+post_id).then(onResponse).then(function (json){return onApriModale(json)});
}

function onApriModale(json){
    console.log(json);
    
    const div_modale=document.querySelector('#modale');
    const div_mod=document.createElement('div');
    div_mod.classList.add('div_modale');
    const scritta=document.createElement('p');
    scritta.textContent='Le persone a cui piace:';
    scritta.classList.add('user');
    div_mod.appendChild(scritta);
    const div_persone=document.createElement('div');
    for(evento of json){
        const username=document.createElement('p');
        username.classList.add('p_modale');
        username.textContent=evento.username;
        div_persone.appendChild(username);
    }
    div_persone.classList.add('persone_like');
    div_mod.appendChild(div_persone);
    div_modale.appendChild(div_mod);
    div_modale.classList.remove('nascosto');
    document.body.classList.add('no-scroll');
    window.addEventListener('keydown',chiudiModale);
}    


function chiudiCommenti(event){
    if(event.keyCode === 27){
        const div=document.querySelector('#commenti');
        div.classList.add('nasconditi');
        document.body.classList.remove('no-scroll');
        const past_messages=div.querySelector('.past_messages');
        const div_interni=past_messages.querySelectorAll('div');
        for(div_interno of div_interni){
            const paragrafi=div_interno.querySelectorAll('p');
            for(paragrafo of paragrafi){
                paragrafo.remove();
            }
            div_interno.remove();
        }

    }    
}

function inserisciInCommenti(json){
    console.log(json);
    const div=document.querySelector('#commenti');
    const past_messages=div.querySelector('.past_messages');
    past_messages.innerHTML="";
    for(evento of json){
        const div=document.querySelector('#commenti');
        const past_messages=div.querySelector('.past_messages');
        const div_commento=document.createElement('div');
        div_commento.classList.add('messaggio');
        const username=document.createElement('p');
        username.classList.add('user');
        username.textContent=evento.username;
        const commento=document.createElement('p');
        commento.textContent=evento.commento;
        commento.classList.add('comm');
        div_commento.appendChild(username);
        div_commento.appendChild(commento);
        past_messages.appendChild(div_commento);
    }
}

function aggiornaCommentiPresenti(json){
    console.log(json);
    for(evento of json){
        const div=document.querySelector('#commenti');
        const past_messages=div.querySelector('.past_messages');
        const div_commento=document.createElement('div');
        div_commento.classList.add('messaggio');
        const username=document.createElement('p');
        username.classList.add('user');
        username.textContent=evento.username;
        const commento=document.createElement('p');
        commento.classList.add('comm');
        commento.textContent=evento.commento;
        div_commento.appendChild(username);
        div_commento.appendChild(commento);
        past_messages.appendChild(div_commento);
    }
}

function chiudiModale(event){
    if(event.keyCode === 27){ 
        const modale=document.querySelector('#modale');
        const div_modale=modale.querySelector('.div_modale');
        div_modale.remove();
        const scritta=div_modale.querySelector('p');
        scritta.remove();
        modale.classList.add('nascosto');
        document.body.classList.remove('no-scroll');
        const usernames=div_modale.querySelectorAll('.p_modale');
        for(username of usernames){
            username.classList.add('nascosto');
        }
        
    }
}

function unlikePost(event){
    cuore_imm=event.currentTarget;
    const postid=cuore_imm.dataset.id;
    const div_internos=cuore_imm.parentNode;
    const span_like=div_internos.querySelector('.numero_like');
    fetch("unlikePost/"+postid).then(onResponse).then(function (json){return aggiornaLike(json,span_like)});
    cuore_imm.removeEventListener('click',unlikePost);
    cuore_imm.addEventListener('click',LikePost);
}

function LikePost(event){
    console.log(event);
    const cuore_imm=event.currentTarget;
    const postid=cuore_imm.dataset.id;
    const div_internos=cuore_imm.parentNode;
    const span_like=div_internos.querySelector('.numero_like');
    fetch("LikePost/"+postid).then(onResponse).then(function (json){return aggiornaLike(json,span_like)});

    cuore_imm.removeEventListener('click',LikePost);
    cuore_imm.addEventListener('click',unlikePost);
}

function commentaPost(event){
    const immagine_commento=event.currentTarget;  
    const div_interno=immagine_commento.parentNode;
    const span_commento=div_interno.querySelector('.numero_commenti');
    span_commento.dataset.id=immagine_commento.dataset.id;
    const form=document.forms['scrivi_commenti'];
    form.commento.dataset.id=event.currentTarget.dataset.id;
    const post_id=form.commento.dataset.id;
    const contenitore=document.querySelector('#commenti');
    const past_messages=contenitore.querySelector('.past_messages');
    past_messages.classList.add('singolo_messaggio');
    contenitore.classList.remove('nasconditi');
    document.body.classList.add('no-scroll');
    fetch('VedereCommentiPrecedenti/'+post_id).then(onResponse).then(aggiornaCommentiPresenti);
    form.addEventListener('submit',InviaCommento);
    window.addEventListener('keydown',chiudiCommenti); 
}

function InviaCommento(event){
    const form=document.forms['scrivi_commenti'];
    const commento=form.commento.value;
    const id_post=form.commento.dataset.id;
    const articoli=document.querySelectorAll('.immagine_articolo');
    for(articolo of articoli){
        const contenitore=articolo.querySelector('.contenitore_like');
        const span_commento=contenitore.querySelector('.numero_commenti');
        if(span_commento.dataset.id===id_post){
            fetch('InserisciCommento/'+commento+'/'+id_post).then(onResponse).then(function (json){return inserisciInCommenti(json)});
            event.preventDefault();
            fetch('NumCommenti/'+id_post).then(onResponse).then(function (json){return AggiornaNumeroCommenti(json,span_commento)});
            form.commento.value="";
        }
    }
}

function AggiornaNumeroCommenti(json,span_commenti){
    span_commenti.textContent=json;
}

function aggiungiInPreferiti(event){
    const stella=event.currentTarget;
    const titolo=stella.dataset.id;
    const img=stella.dataset.value;
    fetch('inserisciInPreferiti/'+titolo+'/'+img);
}

function onJson(json){
    for(evento of json){
        const section=document.querySelector('.blocco_articoli');
        const div=document.createElement('div');
        const img=document.createElement('img');
        const stella=document.createElement('img');
        stella.src='images/stella.png';
        stella.classList.add("immagine_cuores");
        const span_like=document.createElement('span');
        const div_interno=document.createElement('div');
        const immagine_commento=document.createElement('img');
        immagine_commento.dataset.id=evento.id;
        immagine_commento.src="images/commento.png";
        immagine_commento.classList.add("immagine_cuore");
        div_interno.classList.add('contenitore_like');
        span_like.classList.add('numero_like');
        span_like.textContent=evento.num_like;
        const span_commento=document.createElement('span');
        span_commento.classList.add('numero_commenti');
        span_commento.textContent=evento.num_commenti;
        const immagine_like=document.createElement('img');
        immagine_like.dataset.id=evento.id;
        immagine_like.src="images/cuore.jpg";
        immagine_like.classList.add("immagine_cuore");
        div.classList.add('immagine_articolo');
        img.src="images/"+evento.immagine;
        img.dataset.id=evento.titolo;
        const titolo=document.createElement('h1');
        titolo.textContent=evento.titolo;
        stella.dataset.id=evento.titolo;
        stella.dataset.value=evento.immagine;
        const descrizione=document.createElement('p');
        descrizione.textContent=evento.descrizione;
        div_interno.appendChild(stella);
        div_interno.appendChild(immagine_commento);
        div_interno.appendChild(span_commento); 
        div_interno.appendChild(immagine_like);
        div_interno.appendChild(span_like);
        div.appendChild(div_interno);
        div.appendChild(img);
        div.appendChild(titolo);
        div.appendChild(descrizione);
        section.appendChild(div);
        immagine_like.addEventListener("click",LikePost);
        
        immagine_commento.addEventListener("click",commentaPost);
        span_like.addEventListener("click",GuardaiLike);
        stella.addEventListener("click",aggiungiInPreferiti);
    }
}


function onResponse(response){
    console.log(response);
    return response.json();
}

fetch('caricamento_articoli').then(onResponse).then(onJson);