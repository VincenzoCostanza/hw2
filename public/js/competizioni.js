
function onPreferiti(event){
    const cuore=event.currentTarget;
    const nome=cuore.dataset.id;
    const img=cuore.dataset.value;
    fetch('inserisciInPreferiti/'+nome+'/'+img);
}

function onJsonCompetizioni(json){
    for(evento of json){
        const immagine= document.createElement('img');
        immagine.src='images/cuore.jpg';
        immagine.classList.add("immagine_cuore");
        immagine.dataset.id=evento.id;
        const div=document.createElement('div');
        div.classList.add('blocco');
        const div_1=document.createElement('div');
        div_1.classList.add('imm-h1');
        const h1=document.createElement('h1');
        h1.classList.add('titolo');
        h1.textContent=evento.titolo;
        h1.dataset.id=evento.titolo;
        const image=document.createElement('img');
        image.classList.add('altezza');
        image.classList.add('coppa');
        image.src='images/'+evento.immagine;
        image.dataset.id='images/'+evento.immagine;
        const p=document.createElement('p');
        p.textContent=evento.descrizione;
        p.classList.add('nascondi');
        const cont =document.querySelector('#flex-cont');
        const dettaglio= document.createElement('span');
        dettaglio.classList.add('dett');
        dettaglio.innerText="Mostra più dettagli";
        div_1.appendChild(h1);
        div_1.appendChild(immagine);
        div.appendChild(div_1);
        div.appendChild(image);
        div.appendChild(p);
        div.appendChild(dettaglio);
        cont.appendChild(div);
        immagine.dataset.id=evento.titolo;
        immagine.dataset.value=evento.immagine;
        dettaglio.addEventListener("click",onDettaglio);
        immagine.addEventListener("click",onPreferiti);
    }
}

function onDettaglio(event){
    const nascondi_mostra=event.currentTarget;
    nascondi_mostra.querySelector('span');
    nascondi_mostra.classList.add('dett');
    nascondi_mostra.innerText="Meno dettagli";
    const contenitore= nascondi_mostra.parentNode;
    const p= contenitore.querySelector('p');
    p.classList.remove('nascondi');
    
    const image=contenitore.querySelector('.coppa');
    if(nascondi_mostra.innerText=== "Meno dettagli"){
        image.classList.remove('altezza');
        image.classList.add('altezza_1');
        
    }


    nascondi_mostra.removeEventListener("click",onDettaglio);
    nascondi_mostra.addEventListener("click",onMeno);
    
}

function onMeno(event){
    const nascondi_meno=event.currentTarget;
    console.log(nascondi_meno);
    nascondi_meno.querySelector('span');
    nascondi_meno.classList.add('dett');
    nascondi_meno.innerText="Mostra più dettagli";
    const contenitore= nascondi_meno.parentNode;
    const p= contenitore.querySelector('p');
    p.classList.add('nascondi');

    const image=contenitore.querySelector('.coppa');
    if(nascondi_meno.innerText === "Mostra più dettagli"){
        image.classList.remove('altezza_1');
        image.classList.add('altezza');
    }

    nascondi_meno.removeEventListener("click",onMeno);
    nascondi_meno.addEventListener("click",onDettaglio);
}

function onResponse(response){
    console.log(response);
    return response.json();
}

fetch('caricamento_competizioni').then(onResponse).then(onJsonCompetizioni);