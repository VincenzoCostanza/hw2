function onJson(json){
    console.log(json);
    for(evento of json){
        const contenitore=document.querySelector('.contenitore');
        const cuore_spezzato=document.createElement('img');
        cuore_spezzato.src='images/cuore_spezzato.jpg';
        cuore_spezzato.classList.add('immagine_cuore');
        const div_interno=document.createElement('div');
        div_interno.classList.add('div_interno');
        const div=document.createElement('div');
        div.classList.add('blocco_gioc');
        const titolo=document.createElement('p');
        titolo.textContent=evento.titolo;
        const immagine=document.createElement('img');
        immagine.classList.add('imm_gioc');
        immagine.src='images/'+evento.immagine;   
        div_interno.appendChild(titolo);
        div_interno.appendChild(cuore_spezzato);
        div.appendChild(div_interno);
        div.appendChild(immagine);
        contenitore.appendChild(div);
        cuore_spezzato.dataset.id=evento.titolo;
        cuore_spezzato.dataset.value=evento.immagine;
        cuore_spezzato.addEventListener('click',rimuoviDaiPreferiti);
    }
}

function rimuoviDaiPreferiti(event){
    const cuore_spezzato=event.currentTarget;
    const titolo=cuore_spezzato.dataset.id;
    const immagine=cuore_spezzato.dataset.value;
    fetch('rimuoviDaiPreferiti/'+titolo+'/'+immagine).then(onResponse).then(onJsonRimuovi);
}

function onJsonRimuovi(json){
    const contenitore=document.querySelector('.contenitore');
    contenitore.innerHTML="";
    for(evento of json){
        const contenitore=document.querySelector('.contenitore');
        const cuore_spezzato=document.createElement('img');
        cuore_spezzato.src='images/cuore_spezzato.jpg';
        cuore_spezzato.classList.add('immagine_cuore');
        const div_interno=document.createElement('div');
        div_interno.classList.add('div_interno');
        const div=document.createElement('div');
        div.classList.add('blocco_gioc');
        const titolo=document.createElement('p');
        titolo.textContent=evento.titolo;
        const immagine=document.createElement('img');
        immagine.classList.add('imm_gioc');
        immagine.src='images/'+evento.immagine;      
        div_interno.appendChild(titolo);
        div_interno.appendChild(cuore_spezzato);
        div.appendChild(div_interno);
        div.appendChild(immagine);
        contenitore.appendChild(div);
        cuore_spezzato.dataset.id=evento.titolo;
        cuore_spezzato.dataset.value=evento.immagine;
        cuore_spezzato.addEventListener('click',rimuoviDaiPreferiti);
    }
}

function onResponse(response){
    return response.json();
}

fetch('prendiIpreferiticompetizioni').then(onResponse).then(onJson);
fetch('prendiIpreferitiPost').then(onResponse).then(onJson);

